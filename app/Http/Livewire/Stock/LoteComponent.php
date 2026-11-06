<?php

namespace App\Http\Livewire\Stock;

use App\Models\StockAlmacen;
use App\Models\StockLote;
use App\Models\Elementos\ElementoProducto;
use App\Models\EmpresaUsuario;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class LoteComponent extends Component
{
    use WithPagination;

    public $search = '', $filtro_almacen = '', $filtro_estado = '';
    public $empresa_id;

    // Modal Crear/Editar
    public $isModalOpen = false;
    public $lote_id, $almacen_id, $elemento_producto_id, $lote, $vencimiento, $existencia = 0;
 
    public function mount() {
        if (request()->has('filtro_estado')) {
            $this->filtro_estado = request()->get('filtro_estado');
        }
    }

    public function render()
    {
        $guardName = 'web' . session('empresa_id');
        $permisoExiste = Permission::where('name', 'stock.lotes.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('stock.lotes.Ver', $guardName)) {
            if (session('empresa_id')) {
                $this->empresa_id = session('empresa_id');

                $query = StockLote::whereHas('almacen', function ($q) {
                        $q->where('empresa_id', $this->empresa_id);
                    })
                    ->when($this->filtro_almacen, function ($q) {
                        $q->where('almacen_id', $this->filtro_almacen);
                    })
                    ->whereHas('elementoProducto', function ($q) {
                        $q->where('descripcion', 'like', '%' . $this->search . '%')
                          ->orWhere('lote', 'like', '%' . $this->search . '%');
                    });

                // Filtro por estado de vencimiento
                if ($this->filtro_estado === 'vencidos') {
                    $query->where('vencimiento', '<', now());
                } elseif ($this->filtro_estado === 'por_vencer') {
                    $query->whereBetween('vencimiento', [now(), now()->addDays(30)]);
                }

                $lotes = $query->with(['elementoProducto', 'almacen'])
                    ->orderByRaw('vencimiento IS NULL, vencimiento ASC') // Los que tienen vencimiento primero
                    ->paginate(10);

                $almacenes = StockAlmacen::where('empresa_id', $this->empresa_id)->orderBy('name')->get();
                
                $productos = ElementoProducto::select('elemento_productos.*')
                    ->join('elementos', 'elementos.id', '=', 'elemento_productos.elemento_id')
                    ->where('elementos.empresa_id', $this->empresa_id)
                    ->orderBy('elementos.name')
                    ->get();

                return view('livewire.stock.lote-component', [
                    'lotes' => $lotes,
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
        $this->lote_id = '';
        $this->almacen_id = '';
        $this->elemento_producto_id = '';
        $this->lote = '';
        $this->vencimiento = '';
        $this->existencia = 0;
    }

    public function store()
    {
        $this->validate([
            'almacen_id' => 'required|exists:stock_almacen,id',
            'elemento_producto_id' => 'required|exists:elemento_productos,id',
            'lote' => 'required|string|max:50',
            'vencimiento' => 'nullable|date',
            'existencia' => 'required|numeric|min:0',
        ]);

        // Validar duplicado (mismo producto, mismo almacén, mismo lote)
        $existe = StockLote::where('almacen_id', $this->almacen_id)
            ->where('elemento_producto_id', $this->elemento_producto_id)
            ->where('lote', $this->lote)
            ->when($this->lote_id, function ($q) {
                $q->where('id', '!=', $this->lote_id);
            })->exists();

        if ($existe) {
            $this->addError('lote', 'Este lote ya está registrado para este producto en este almacén.');
            return;
        }

        StockLote::updateOrCreate(['id' => $this->lote_id], [
            'almacen_id' => $this->almacen_id,
            'elemento_producto_id' => $this->elemento_producto_id,
            'lote' => strtoupper($this->lote),
            'vencimiento' => $this->vencimiento ?: null,
            'existencia' => $this->existencia,
        ]);

        session()->flash('message', $this->lote_id ? 'Lote actualizado.' : 'Lote registrado.');
        $this->isModalOpen = false;
        $this->resetForm();
    }

    public function edit($id)
    {
        $lote = StockLote::findOrFail($id);
        $this->lote_id = $id;
        $this->almacen_id = $lote->almacen_id;
        $this->elemento_producto_id = $lote->elemento_producto_id;
        $this->lote = $lote->lote;
        $this->vencimiento = $lote->vencimiento ? $lote->vencimiento->format('Y-m-d') : '';
        $this->existencia = $lote->existencia;
        $this->isModalOpen = true;
    }

    public function delete($id)
    {
        StockLote::find($id)->delete();
        session()->flash('message', 'Lote eliminado del sistema.');
    }
}