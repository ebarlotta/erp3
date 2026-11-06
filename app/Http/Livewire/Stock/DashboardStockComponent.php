<?php

namespace App\Http\Livewire\Stock;

use App\Models\Elementos\Elemento;
use App\Models\Elementos\ElementoProducto;
use App\Models\StockAlmacen;
use App\Models\StockElementoAlmacen;
use App\Models\StockMovimiento;
use App\Models\EmpresaUsuario;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class DashboardStockComponent extends Component
{
    public $empresa_id;

    public function render()
    {
        $guardName = 'web' . session('empresa_id');
        $permisoExiste = Permission::where('name', 'stock.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('stock.Ver', $guardName)) {
            if (session('empresa_id')) {
                $this->empresa_id = session('empresa_id');

                // Tarjetas por almacén
                $almacenes = StockAlmacen::where('empresa_id', $this->empresa_id)
                    ->withSum('stocks as total_existencia', 'existencia')
                    ->orderBy('name')
                    ->get();
// dd($almacenes);
                // Alertas
                $bajoMinimo = StockElementoAlmacen::whereHas('almacen', function ($q) {
                        $q->where('empresa_id', $this->empresa_id);
                    })
                    ->whereColumn('existencia', '<', 'stock_minimo')
                    ->count();

                $porVencer = Elemento::where('empresa_id', $this->empresa_id)
                    ->whereNotNull('vencimiento')
                    ->whereBetween('vencimiento', [now(), now()->addDays(30)])
                    ->count();

                // $sinMovimiento = Elemento::where('empresa_id', $this->empresa_id)
                //     ->whereDoesntHave('movimientos', function ($q) {
                //         $q->where('created_at', '>=', now()->subDays(90));
                //     })
                //     ->count();
                $sinMovimiento = ElementoProducto::whereHas('elemento', function ($q) {
                        $q->where('empresa_id', $this->empresa_id);
                    })
                    ->whereDoesntHave('movimientos', function ($q) {
                        $q->where('created_at', '>=', now()->subDays(90));
                    })
                    ->count();

                $sobrestock = StockElementoAlmacen::whereHas('almacen', function ($q) {
                        $q->where('empresa_id', $this->empresa_id);
                    })
                    ->where('stock_minimo', '>', 0)
                    ->whereColumn('existencia', '>', \DB::raw('stock_minimo * 3'))
                    ->count();

                // Últimos movimientos
                $ultimosMovimientos = StockMovimiento::whereHas('almacen', function ($q) {
                        $q->where('empresa_id', $this->empresa_id);
                    })
                    ->with(['elementoProducto', 'almacen', 'usuario'])
                    ->orderByDesc('created_at')
                    ->limit(10)
                    ->get();

                return view('livewire.stock.dashboard-stock-component', [
                    'almacenes' => $almacenes,
                    'bajoMinimo' => $bajoMinimo,
                    'porVencer' => $porVencer,
                    'sinMovimiento' => $sinMovimiento,
                    'sobrestock' => $sobrestock,
                    'ultimosMovimientos' => $ultimosMovimientos,
                ])->extends('layouts.adminlte');
            } else {
                return view('livewire.seleccionarempresa')->extends('layouts.adminlte');
            }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }
}