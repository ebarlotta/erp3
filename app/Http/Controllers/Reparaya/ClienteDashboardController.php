<?php

namespace App\Http\Controllers\Reparaya;

use App\Http\Controllers\Controller;
use App\Models\Reparaya\Solicitud;
use Illuminate\Http\Request;

class ClienteDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $solicitudes = Solicitud::with(['categoria'])
            ->where('cliente_id', $user->id)
            ->latest()
            ->get();

        $resumen = [
            'abiertas'      => $solicitudes->where('estado', 'abierta')->count(),
            'con_presupuestos' => $solicitudes->where('estado', 'con_presupuestos')->count(),
            'finalizadas'   => $solicitudes->where('estado', 'finalizada')->count(),
        ];

        return view('reparaya.cliente-dashboard', compact('solicitudes', 'resumen'));
    }
}