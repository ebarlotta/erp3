<?php

namespace App\Http\Livewire\Reparaya;

use App\Models\Reparaya\AgendaBloqueo;
use App\Models\Reparaya\AgendaDisponibilidad;
use App\Models\Reparaya\Cita;
use App\Models\Reparaya\Presupuesto;
use Carbon\Carbon;
use Livewire\Component;

class SelectorHorario extends Component
{
    public Presupuesto $presupuesto;

    public $fecha = null;
    public $horaSeleccionada = null;

    public function mount(Presupuesto $presupuesto)
    {
        $this->presupuesto = $presupuesto;
        $this->fecha = now()->addDay()->toDateString();
    }

    public function seleccionarHora(string $hora)
    {
        $this->horaSeleccionada = $hora;
    }

    public function confirmar()
    {
        if (! $this->horaSeleccionada) {
            $this->addError('horaSeleccionada', 'Elegí un horario.');
            return;
        }

        $fechaHora = Carbon::parse("{$this->fecha} {$this->horaSeleccionada}");

        return redirect()->route('reparaya.citas.store', [
            'presupuesto_id' => $this->presupuesto->id,
            'fecha_hora'     => $fechaHora->toDateTimeString(),
        ]);
    }

    public function render()
    {
        $fecha = Carbon::parse($this->fecha);
        $reparadorId = $this->presupuesto->reparador_id;

        // Disponibilidad del día (recurrente + puntual)
        $franjas = AgendaDisponibilidad::where('reparador_id', $reparadorId)
            ->where('activo', true)
            ->where(function ($q) use ($fecha) {
                $q->where(fn ($q) => $q->where('tipo', 'recurrente')
                        ->where('dia_semana', $fecha->dayOfWeek))
                  ->orWhere(fn ($q) => $q->where('tipo', 'puntual')
                        ->whereDate('fecha', $fecha));
            })
            ->get();

        // Bloqueos del día
        $bloqueos = AgendaBloqueo::where('reparador_id', $reparadorId)
            ->whereDate('fecha_inicio', '<=', $fecha)
            ->whereDate('fecha_fin', '>=', $fecha)
            ->get();

        // Citas ya tomadas
        $citasTomadas = Cita::where('reparador_id', $reparadorId)
            ->whereDate('fecha_hora', $fecha)
            ->whereIn('estado', ['propuesta', 'confirmada'])
            ->pluck('fecha_hora')
            ->map(fn ($dt) => Carbon::parse($dt)->format('H:i'))
            ->toArray();

        // Generar slots de 60 min
        $slots = [];
        foreach ($franjas as $franja) {
            $inicio = Carbon::parse("{$this->fecha} {$franja->hora_inicio}");
            $fin = Carbon::parse("{$this->fecha} {$franja->hora_fin}");

            while ($inicio < $fin) {
                $slot = $inicio->format('H:i');
                $bloqueado = $bloqueos->contains(fn ($b) =>
                    Carbon::parse($b->fecha_inicio)->format('H:i') <= $slot &&
                    Carbon::parse($b->fecha_fin)->format('H:i') > $slot
                );
                $ocupado = in_array($slot, $citasTomadas);
                $slots[$slot] = ! $bloqueado && ! $ocupado;
                $inicio->addHour();
            }
        }

        return view('livewire.reparaya.selector-horario', [
            'slots' => $slots,
        ]);
    }
}