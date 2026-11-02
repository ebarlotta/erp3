<?php

namespace App\Http\Controllers\Reparaya;

use App\Http\Controllers\Controller;
use App\Models\Reparaya\Cita;
use App\Models\Reparaya\Presupuesto;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'presupuesto_id' => ['required', 'exists:repa_presupuestos,id'],
            'fecha_hora'     => ['required', 'date', 'after:now'],
        ]);

        $presupuesto = Presupuesto::findOrFail($data['presupuesto_id']);

        $this->authorize('crearCita', $presupuesto);

        // Evitar doble cita para el mismo presupuesto
        if ($presupuesto->cita()->exists()) {
            return back()->withErrors(['fecha_hora' => 'Este presupuesto ya tiene una cita.']);
        }

        $cita = Cita::create([
            'solicitud_id'   => $presupuesto->solicitud_id,
            'presupuesto_id' => $presupuesto->id,
            'cliente_id'     => $presupuesto->solicitud->cliente_id,
            'reparador_id'   => $presupuesto->reparador_id,
            'fecha_hora'     => $data['fecha_hora'],
            'duracion_min'   => 60,
            'estado'         => 'confirmada',
        ]);

        $presupuesto->solicitud->update(['estado' => 'en_curso']);

        return redirect()
            ->route('reparaya.citas.show', $cita)
            ->with('success', 'Cita confirmada.');
    }

    public function show(Cita $cita)
    {
        $this->authorize('view', $cita);

        return view('reparaya.citas.show', compact('cita'));
    }

    public function cancelar(Cita $cita)
    {
        $this->authorize('cancelar', $cita);

        $cita->update(['estado' => 'cancelada']);
        $cita->solicitud->update(['estado' => 'adjudicada']);

        return back()->with('success', 'Cita cancelada.');
    }
}