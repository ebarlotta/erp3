<?php

namespace App\Http\Livewire\Reparaya;

use App\Models\Reparaya\Presupuesto;
use App\Models\Reparaya\Solicitud;
use Livewire\Component;

class PresupuestoList extends Component
{
    public Solicitud $solicitud;

    public function mount(Solicitud $solicitud)
    {
        $this->solicitud = $solicitud;
    }

    public function render()
    {
        return view('livewire.reparaya.presupuesto-list', [
            'presupuestos' => $this->solicitud->presupuestos()
                ->with(['reparador', 'moneda', 'items'])
                ->orderBy('monto')
                ->get(),
        ]);
    }
}