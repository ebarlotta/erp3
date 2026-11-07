<?php

namespace App\Http\Livewire\Stock;

use App\Models\StockAlmacen;
use App\Models\StockElementoAlmacen;
use App\Models\StockMovimiento;
use App\Models\StockReceta;
use App\Models\Elementos\ElementoProducto;
use App\Models\EmpresaUsuario;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class ProduccionComponent extends Component
{
    use WithPagination;

    public $empresa_id;
    public $search = '';

    // Modal de Producción
    public $isModalOpen = false;
    public $almacen_id, $producto_terminado_id, $cantidad_a_fabricar = 1;
    public $detalle_receta = []; // Para mostrar los ingredientes en el modal
    public $error_stock = '';

    public function render()
    {
        $guardName = 'web' . session('empresa_id');
        $permisoExiste = Permission::where('name', 'stock.produccion.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('stock.produccion.Ver', $guardName)) {
            if (session('empresa_id')) {
                $this->empresa_id = session('empresa_id');

                // Traemos solo los productos que TIENEN una receta armada
                $productosFabricables = ElementoProducto::select('elemento_productos.*')
                    ->join('elementos', 'elementos.id', '=', 'elemento_productos.elemento_id')
                    ->where('elementos.empresa_id', $this->empresa_id)
                    ->whereHas('recetas') // Asumimos que agregaremos esta relación en el modelo
                    ->where('descripcion', 'like', '%' . $this->search . '%')
                    ->orderBy('descripcion')
                    ->paginate(10);

                $almacenes = StockAlmacen::where('empresa_id', $this->empresa_id)->orderBy('name')->get();

                return view('livewire.stock.produccion-component', [
                    'productosFabricables' => $productosFabricables,
                    'almacenes' => $almacenes,
                ])->extends('layouts.adminlte');
            } else {
                return view('livewire.seleccionarempresa')->extends('layouts.adminlte');
            }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() { $this->resetPage(); }

    public function create()
    {
        $this->resetForm();
        $this->isModalOpen = true;
    }

    private function resetForm()
    {
        $this->almacen_id = '';
        $this->producto_terminado_id = '';
        $this->cantidad_a_fabricar = 1;
        $this->detalle_receta = [];
        $this->error_stock = '';
    }

    // Se ejecuta cuando cambia el producto o la cantidad en el modal
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['producto_terminado_id', 'cantidad_a_fabricar', 'almacen_id'])) {
            $this->calcularReceta();
        }
    }

    public function calcularReceta()
    {
        $this->detalle_receta = [];
        $this->error_stock = '';

        if ($this->producto_terminado_id && $this->cantidad_a_fabricar > 0) {
            $recetas = StockReceta::where('producto_terminado_id', $this->producto_terminado_id)
                ->with('materiaPrima')
                ->get();

            foreach ($recetas as $receta) {
                $cantidad_necesaria = $receta->cantidad * $this->cantidad_a_fabricar;
                
                // Verificar stock actual de la materia prima
                $stock_mp = 0;
                if ($this->almacen_id) {
                    $stock_mp = StockElementoAlmacen::where('almacen_id', $this->almacen_id)
                        ->where('elemento_producto_id', $receta->materia_prima_id)
                        ->value('existencia') ?? 0;
                }

                $suficiente = $stock_mp >= $cantidad_necesaria;

                if (!$suficiente) {
                    $this->error_stock = 'Stock insuficiente de materias primas para fabricar esta cantidad.';
                }

                $this->detalle_receta[] = [
                    'id' => $receta->materia_prima_id,
                    'nombre' => $receta->materiaPrima->descripcion,
                    'necesario' => $cantidad_necesaria,
                    'disponible' => $stock_mp,
                    'suficiente' => $suficiente,
                ];
            }
        }
    }

    public function store()
    {
        $this->validate([
            'almacen_id' => 'required|exists:stock_almacen,id',
            'producto_terminado_id' => 'required|exists:elemento_productos,id',
            'cantidad_a_fabricar' => 'required|numeric|min:0.01',
        ]);

        $this->calcularReceta();

        if ($this->error_stock) {
            $this->addError('general', 'No hay stock suficiente de materias primas.');
            return;
        }

        DB::beginTransaction();
        try {
            // 1. Descontar Materias Primas
            foreach ($this->detalle_receta as $ingrediente) {
                $stock_mp = StockElementoAlmacen::firstOrCreate(
                    ['almacen_id' => $this->almacen_id, 'elemento_producto_id' => $ingrediente['id']],
                    ['existencia' => 0, 'stock_minimo' => 0]
                );

                $nuevo_saldo_mp = $stock_mp->existencia - $ingrediente['necesario'];
                $stock_mp->update(['existencia' => $nuevo_saldo_mp]);

                // Registrar salida en Kardex
                StockMovimiento::create([
                    'elemento_producto_id' => $ingrediente['id'],
                    'almacen_id' => $this->almacen_id,
                    'tipo' => 'salida',
                    'motivo' => 'Consumo por Fabricación',
                    'cantidad' => -$ingrediente['necesario'],
                    'saldo' => $nuevo_saldo_mp,
                    'usuario_id' => auth()->id(),
                ]);
            }

            // 2. Sumar Producto Terminado
            $stock_pt = StockElementoAlmacen::firstOrCreate(
                ['almacen_id' => $this->almacen_id, 'elemento_producto_id' => $this->producto_terminado_id],
                ['existencia' => 0, 'stock_minimo' => 0]
            );

            $nuevo_saldo_pt = $stock_pt->existencia + $this->cantidad_a_fabricar;
            $stock_pt->update(['existencia' => $nuevo_saldo_pt]);

            // Registrar entrada en Kardex
            StockMovimiento::create([
                'elemento_producto_id' => $this->producto_terminado_id,
                'almacen_id' => $this->almacen_id,
                'tipo' => 'entrada',
                'motivo' => 'Fabricación / Producción',
                'cantidad' => $this->cantidad_a_fabricar,
                'saldo' => $nuevo_saldo_pt,
                'usuario_id' => auth()->id(),
            ]);

            DB::commit();
            session()->flash('message', 'Producción registrada con éxito. Se descontaron las materias primas y se ingresó el producto terminado.');
            $this->isModalOpen = false;
            $this->resetForm();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('general', 'Error al fabricar: ' . $e->getMessage());
        }
    }
}