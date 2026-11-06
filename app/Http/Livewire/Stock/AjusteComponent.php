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

class AjusteComponent extends Component
{
    use WithPagination;

    public $isModalOpen = false;
    public $empresa_id;

    // Filtros del historial
    public $search = '', $filtro_almacen = '';

    // Formulario de Ajuste
    public $almacen_id, $elemento_producto_id, $cantidad_real, $motivo;
    
    // Propiedades calculadas para la vista previa
    public $stock_teorico = 0;
    public $diferencia = 0;

    public function render()
    {
        $guardName = 'web' . session('empresa_id');
        $permisoExiste = Permission::where('name', 'stock.ajustes.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('stock.ajustes.Ver', $guardName)) {
            if (session('empresa_id')) {
                $this->empresa_id = session('empresa_id');

                // Historial de ajustes (movimientos tipo 'ajuste')
                $ajustes = StockMovimiento::whereHas('almacen', function ($q) {
                        $q->where('empresa_id', $this->empresa_id);
                    })
                    ->where('tipo', 'ajuste')
                    ->when($this->filtro_almacen, function ($q) {
                        $q->where('almacen_id', $this->filtro_almacen);
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

                return view('livewire.stock.ajuste-component', [
                    'ajustes' => $ajustes,
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

    public function Filtrar() { $this->resetPage(); }

    public function create()
    {
        $this->resetForm();
        $this->isModalOpen = true;
    }

    private function resetForm()
    {
        $this->almacen_id = '';
        $this->elemento_producto_id = '';
        $this->cantidad_real = '';
        $this->motivo = '';
        $this->stock_teorico = 0;
        $this->diferencia = 0;
    }

    // Se ejecuta automáticamente cuando cambia el almacén o el producto en el modal
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['almacen_id', 'elemento_producto_id', 'cantidad_real'])) {
            $this->calcularDiferencia();
        }
    }

    public function calcularDiferencia()
    {
        if ($this->almacen_id && $this->elemento_producto_id) {
            $stock = StockElementoAlmacen::where('almacen_id', $this->almacen_id)
                ->where('elemento_producto_id', $this->elemento_producto_id)
                ->first();
            
            $this->stock_teorico = $stock ? $stock->existencia : 0;
        } else {
            $this->stock_teorico = 0;
        }

        if (is_numeric($this->cantidad_real)) {
            $this->diferencia = $this->cantidad_real - $this->stock_teorico;
        } else {
            $this->diferencia = 0;
        }
    }

    public function store()
    {
        $this->validate([
            'almacen_id' => 'required|exists:stock_almacen,id',
            'elemento_producto_id' => 'required|exists:elemento_productos,id',
            'cantidad_real' => 'required|numeric|min:0',
            'motivo' => 'required|string|max:255', // En ajustes, el motivo es obligatorio
        ], [
            'motivo.required' => 'Debe indicar el motivo del ajuste (ej: merma, rotura, conteo físico).'
        ]);

        $this->calcularDiferencia();

        if ($this->diferencia == 0) {
            $this->addError('cantidad_real', 'La cantidad real es igual al stock del sistema. No hay nada que ajustar.');
            return;
        }

        DB::beginTransaction();
        try {
            // Buscar o crear el registro de stock
            $stock = StockElementoAlmacen::firstOrCreate(
                ['almacen_id' => $this->almacen_id, 'elemento_producto_id' => $this->elemento_producto_id],
                ['existencia' => 0, 'stock_minimo' => 0]
            );

            // Actualizar el stock real
            $stock->update(['existencia' => $this->cantidad_real]);

            // Registrar movimiento en Kardex con el tipo 'ajuste'
            StockMovimiento::create([
                'elemento_producto_id' => $this->elemento_producto_id,
                'almacen_id' => $this->almacen_id,
                'tipo' => 'ajuste',
                'motivo' => $this->motivo,
                'cantidad' => $this->diferencia, // Positivo si sobra, negativo si falta
                'saldo' => $this->cantidad_real,
                'usuario_id' => auth()->id(),
            ]);

            DB::commit();
            session()->flash('message', 'Ajuste de stock registrado correctamente.');
            $this->isModalOpen = false;
            $this->resetForm();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('general', 'Error al registrar: ' . $e->getMessage());
        }
    }
}