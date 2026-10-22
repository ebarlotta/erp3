<?php

namespace App\Http\Controllers\Reparaya;

use App\Http\Controllers\Controller;
use App\Models\Reparaya\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        return view('reparaya.solicitudes.index');
    }

    public function create()
    {
        return view('reparaya.solicitudes.create');
    }

    public function store(Request $request)
    {
        // La validación y creación la maneja el componente Livewire
        // Este método queda como fallback o redirección
        return redirect()->route('reparaya.solicitudes.index');
    }

    public function show(Solicitud $solicitud)
    {
        // Gate::authorize('view', $solicitud); // <-- Reemplaza $this->authorize(...)
        // dd($solicitud);
        // $this->authorize('view', $solicitud);

        return view('reparaya.solicitudes.show', compact('solicitud'));
    }
}