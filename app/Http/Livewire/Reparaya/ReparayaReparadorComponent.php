<?php

namespace App\Http\Livewire\Reparaya;

use Livewire\Component;
use App\Models\Reparaya\Reparadores;
use App\Models\Reparaya\Solicitud;
class ReparayaReparadorComponent extends Component
{

    public $solicitudes;
    
    public function dashboard()
    {
        $reparador = auth()->user()->reparador;
        $datos     = $reparador->datosDashboard();

        return view('reparador-dashboard', compact('reparador', 'datos'));
    }

    public function panel()
    {
        $reparador   = auth()->user()->reparador;
        $solicitudes = $reparador->solicitudesDisponibles()->get();

        return view('reparador-panel', compact('reparador', 'solicitudes'));
    }

    public function perfil(Reparador $reparador)
    {
        $reparador->load(['especialidades', 'resenas' => fn ($q) => $q->latest()->limit(3)]);

        return view('reparador-perfil', compact('reparador'));
    }


    public function render()
    {
        $reparador = Reparadores::where('id',5)->get();
        $this->solicitudes = Solicitud::where('estado','<>','finalizada')
            ->where('estado','<>','cancelada')
            ->orderByDesc('created_at')
            ->get();
        
        return view('livewire.reparaya.reparaya-reparador-component')->extends('layouts.reparaya');
    }

   
}
