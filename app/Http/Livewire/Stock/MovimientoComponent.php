<?php

namespace App\Http\Livewire\Stock;

use App\Models\StockAlmacen;
use App\Models\StockElementoAlmacen;
use App\Models\StockMovimiento;
use App\Models\Elementos\ElementoProducto;
use App\Models\EmpresaUsuario;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class MovimientoComponent extends Component
{
    use WithPagination;

    public $isModalOpen = false;
    
    // Filtros
    public $search = '';
    public $filtro_almacen = '';
    public $filtro_tipo = '';
    public $elemento_producto_id_filtro;
    public $filtro_producto = '';

    // Formulario
    public $almacen_id, $elemento_producto_id, $tipo = 'entrada', $cantidad, $motivo;
    
    public $empresa_id;

    public function mount($elemento_producto_id = null)
{
    if ($elemento_producto_id) {
        if ($elemento_producto_id) {
            $this->filtro_producto = $elemento_producto_id;
        }
        // $this->elemento_producto_id_filtro = $elemento_producto_id; 
        // O asignarlo a una propiedad para filtrar el query del render
    }
}

    public function render()
    {
        $guardName = 'web' . session('empresa_id');
        $permisoExiste = Permission::where('name', 'stock.movimientos.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('stock.movimientos.Ver', $guardName)) {
            if (session('empresa_id')) {
                $this->empresa_id = session('empresa_id');

                $movimientos = StockMovimiento::whereHas('almacen', function ($q) {
                        $q->where('empresa_id', $this->empresa_id);
                    })
                    ->when($this->filtro_almacen, function ($q) {
                        $q->where('almacen_id', $this->filtro_almacen);
                    })
                    ->when($this->filtro_tipo, function ($q) {
                        $q->where('tipo', $this->filtro_tipo);
                    })
                    ->when($this->filtro_producto, function ($q) { // <-- NUEVO FILTRO
                        $q->where('elemento_producto_id', $this->filtro_producto);
                    })
                    ->whereHas('elementoProducto', function ($q) {
                        $q->where('descripcion', 'like', '%' . $this->search . '%');
                    })
                    ->with(['elementoProducto', 'almacen', 'usuario'])
                    ->orderByDesc('id')
                    ->paginate(10);

                $almacenes = StockAlmacen::where('empresa_id', $this->empresa_id)->orderBy('name')->get();
                
                $productos = ElementoProducto::select('elemento_productos.*')
                    ->join('elementos', 'elementos.id', '=', 'elemento_productos.elemento_id')
                    ->where('elementos.empresa_id', $this->empresa_id)
                    ->orderBy('elementos.name')
                    ->get();

                return view('livewire.stock.movimiento-component', [
                    'movimientos' => $movimientos,
                    'almacenes' => $almacenes,
                    'productos' => $productos,
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

    public function create()
    {
        $this->resetForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetForm()
    {
        $this->almacen_id = '';
        $this->elemento_producto_id = '';
        $this->tipo = 'entrada';
        $this->cantidad = '';
        $this->motivo = '';
    }

    public function store()
    {
        $this->validate([
            'almacen_id' => 'required|exists:stock_almacen,id',
            'elemento_producto_id' => 'required|exists:elemento_productos,id',
            'tipo' => 'required|in:entrada,salida,ajuste',
            'cantidad' => 'required|numeric|min:0.01',
            'motivo' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Buscar o crear el registro de stock
            $stock = StockElementoAlmacen::firstOrCreate(
                ['almacen_id' => $this->almacen_id, 'elemento_producto_id' => $this->elemento_producto_id],
                ['existencia' => 0, 'stock_minimo' => 0]
            );

            $cantidadFormateada = (float) $this->cantidad;
            $nuevoSaldo = $stock->existencia;

            // Calcular nuevo saldo según el tipo
            if ($this->tipo === 'entrada') {
                $nuevoSaldo += $cantidadFormateada;
                $movCantidad = $cantidadFormateada;
            } elseif ($this->tipo === 'salida') {
                if ($stock->existencia < $cantidadFormateada) {
                    $this->addError('cantidad', 'Stock insuficiente. Disponible: ' . $stock->existencia);
                    return;
                }
                $nuevoSaldo -= $cantidadFormateada;
                $movCantidad = -$cantidadFormateada;
            } else { // ajuste
                $nuevoSaldo = $cantidadFormateada; // En ajuste, la cantidad ES el nuevo saldo
                $movCantidad = $nuevoSaldo - $stock->existencia; // Diferencia
            }

            // Actualizar stock
            $stock->update(['existencia' => $nuevoSaldo]);

            // Registrar movimiento en Kardex
            StockMovimiento::create([
                'elemento_producto_id' => $this->elemento_producto_id,
                'almacen_id' => $this->almacen_id,
                'tipo' => $this->tipo,
                'motivo' => $this->motivo ?? ucfirst($this->tipo) . ' manual',
                'cantidad' => $movCantidad,
                'saldo' => $nuevoSaldo,
                'usuario_id' => auth()->id(),
            ]);

            DB::commit();
            session()->flash('message', 'Movimiento registrado con éxito.');
            $this->closeModalPopover();
            $this->resetForm();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('general', 'Error al registrar: ' . $e->getMessage());
        }
    }
}