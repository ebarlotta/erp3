<?php

namespace App\Http\Controllers\Reparaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Ajustá los nombres de rol a los que uses en tu ERP
        if ($user->hasRole('reparador') || $user->role === 'reparador') {
            return redirect()->route('reparaya.reparador.dashboard');
        }

        if ($user->hasRole('admin') || $user->role === 'admin') {
            return redirect()->route('reparaya.admin.dashboard');
        }

        return redirect()->route('reparaya.cliente.dashboard');
    }
}