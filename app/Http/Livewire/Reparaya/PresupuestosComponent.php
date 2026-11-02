<?php

namespace App\Http\Livewire\Reparaya;

use App\Models\Reparaya\Solicitud;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PresupuestosComponent extends Component
{
    public function render(Request $request)
    {
        $user = Auth::user()->id;

        $presupuesto = Solicitud::where('id', $request->solicitud)
            ->where('cliente_id', $user)
            ->get();
        dd($presupuesto);

        return view('livewire.reparaya.presupuestos-component')->extends('layouts.reparaya');
    }
}
