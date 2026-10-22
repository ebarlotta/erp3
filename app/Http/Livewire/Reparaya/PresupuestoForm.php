<?php

namespace App\Http\Livewire\Reparaya;

use App\Models\Moneda;
use App\Models\Reparaya\Presupuesto;
use App\Models\Reparaya\Solicitud;
use Livewire\Component;

class PresupuestoForm extends Component
{
    public Solicitud $solicitud;

    public $monto = '';
    public $moneda_id = '';
    public $plazo_dias = 1;
    public $garantia_meses = '';
    public $comentario = '';

    protected $rules = [
        'monto'          => 'required|numeric|min:0',
        'moneda_id'      => 'required|exists:monedas,id',
        'plazo_dias'     => 'required|integer|min:1',
        'garantia_meses' => 'nullable|integer|min:0',
        'comentario'     => 'nullable|string|max:1000',
    ];

    public function mount(Solicitud $solicitud)
    {
        $this->solicitud = $solicitud;
        $this->moneda_id = Moneda::principal()?->id;
    }

    public function guardar()
    {
        $this->validate();

        Presupuesto::create([
            'solicitud_id'   => $this->solicitud->id,
            'reparador_id'   => auth()->id(),
            'moneda_id'      => $this->moneda_id,
            'monto'          => $this->monto,
            'plazo_dias'     => $this->plazo_dias,
            'garantia_meses' => $this->garantia_meses ?: null,
            'comentario'     => $this->comentario,
            'estado'         => 'enviado',
        ]);

        $this->solicitud->update(['estado' => 'con_presupuestos']);

        session()->flash('success', 'Presupuesto enviado.');

        return redirect()->route('reparaya.reparador.dashboard');
    }

    public function render()
    {
        return view('livewire.reparaya.presupuesto-form', [
            'monedas' => Moneda::where('activo', true)->orderBy('codigo')->get(),
        ]);
    }
}