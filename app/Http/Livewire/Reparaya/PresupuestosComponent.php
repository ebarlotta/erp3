<?php

namespace App\Http\Livewire\Reparaya;

use App\Models\Reparaya\Solicitud;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PresupuestosComponent extends Component
{
    public $solicitud;

    public function render(Request $request)
    {
        $user = Auth::user()->id;

        if($request->solicitud<>0) {
            $this->solicitud = Solicitud::where('id', $request->solicitud)
                ->where('cliente_id', $user)
                ->first();
                // dd($presupuesto[0]->presupuestos);
                // dd($presupuesto);
            return view('livewire.reparaya.listado-presupuestos-component')->extends('layouts.reparaya');
        } else {
            return view('livewire.reparaya.presupuestos-component')->extends('layouts.reparaya');
        }
    }
}
