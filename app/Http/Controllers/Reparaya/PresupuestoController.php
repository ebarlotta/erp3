<?php

namespace App\Http\Controllers\Reparaya;

use App\Http\Controllers\Controller;
use App\Models\Reparaya\Cita;
use App\Models\Reparaya\Presupuesto;
use App\Models\Reparaya\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresupuestoController extends Controller
{
    public function show(Presupuesto $presupuesto)
    {
        $this->authorize('view', $presupuesto);

        return view('reparaya.presupuestos.show', compact('presupuesto'));
    }

    public function aceptar(Request $request, Presupuesto $presupuesto)
    {
        $this->authorize('aceptar', $presupuesto);

        DB::transaction(function () use ($presupuesto) {
            // 1. Aceptar el presupuesto
            $presupuesto->update(['estado' => 'aceptado']);

            // 2. Rechazar los demás de la misma solicitud
            Presupuesto::where('solicitud_id', $presupuesto->solicitud_id)
                ->where('id', '!=', $presupuesto->id)
                ->where('estado', 'enviado')
                ->update(['estado' => 'rechazado']);

            // 3. Actualizar estado de la solicitud
            $presupuesto->solicitud->update(['estado' => 'adjudicada']);
        });

        return redirect()
            ->route('reparaya.solicitudes.show', $presupuesto->solicitud_id)
            ->with('success', 'Presupuesto aceptado. Ahora podés coordinar la cita.');
    }
}