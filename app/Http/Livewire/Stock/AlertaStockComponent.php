<?php

namespace App\Http\Livewire\Stock;

use App\Models\StockAlmacen;
use App\Models\StockElementoAlmacen;
use App\Models\EmpresaUsuario;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class AlertaStockComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $filtro_almacen = '';
    public $empresa_id;

    // Propiedades para la sugerencia de compra
    public $isModalOpen = false;
    public $producto_nombre, $almacen_nombre, $existencia_actual, $stock_minimo, $cantidad_sugerida;

    public function render()
    {
        $guardName = 'web' . session('empresa_id');
        $permisoExiste = Permission::where('name', 'stock.alertas.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('stock.alertas.Ver', $guardName)) {
            if (session('empresa_id')) {
                $this->empresa_id = session('empresa_id');

                // Consultamos los registros que estén por debajo del mínimo
                $alertas = StockElementoAlmacen::whereHas('almacen', function ($q) {
                        $q->where('empresa_id', $this->empresa_id);
                    })
                    ->when($this->filtro_almacen, function ($q) {
                        $q->where('almacen_id', $this->filtro_almacen);
                    })
                    ->whereHas('elementoProducto', function ($q) {
                        $q->where('descripcion', 'like', '%' . $this->search . '%');
                    })
                    ->whereColumn('existencia', '<', 'stock_minimo')
                    ->with(['elementoProducto', 'almacen'])
                    ->orderByRaw('stock_minimo - existencia DESC') // Los más críticos primero
                    ->paginate(10);

                $almacenes = StockAlmacen::where('empresa_id', $this->empresa_id)->orderBy('name')->get();

                return view('livewire.stock.alerta-stock-component', [
                    'alertas' => $alertas,
                    'almacenes' => $almacenes,
                ])->extends('layouts.adminlte');
            } else {
                return view('livewire.seleccionarempresa')->extends('layouts.adminlte');
            }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar()
    {
        $this->resetPage();
    }

    public function sugerirCompra($id)
    {
        $stock = StockElementoAlmacen::with(['elementoProducto', 'almacen'])->findOrFail($id);
        
        $this->producto_nombre = $stock->elementoProducto->descripcion ?? '—';
        $this->almacen_nombre = $stock->almacen->name ?? '—';
        $this->existencia_actual = $stock->existencia;
        $this->stock_minimo = $stock->stock_minimo;
        
        // Lógica de sugerencia: diferencia para llegar al mínimo, multiplicado por 2 (un colchón de seguridad)
        // Ej: Si tengo 2 y el mínimo es 10, la diferencia es 8. 8 * 2 = 16.
        // Podés cambiar esta regla según tu negocio.
        $this->cantidad_sugerida = max(1, ceil(($stock->stock_minimo - $stock->existencia) * 2));

        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
}