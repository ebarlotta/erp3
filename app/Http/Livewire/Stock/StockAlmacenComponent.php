<?php

namespace App\Http\Livewire\Stock;

use App\Models\StockAlmacen;
use App\Models\StockElementoAlmacen;
use App\Models\Elementos\ElementoProducto;
use App\Models\EmpresaUsuario;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class StockAlmacenComponent extends Component
{
    use WithPagination;

    public $isModalOpen = false;
    public $stock_id;
    public $almacen_id;
    public $elemento_producto_id;
    public $existencia = 0;
    public $stock_minimo = 0;
    public $search, $filtro_almacen;
    public $empresa_id;
    public $filtro_estado = '';

    protected $stocks;

    public function mount() {
        if (request()->has('filtro_estado')) {
            $this->filtro_estado = request()->get('filtro_estado');
        }
    }
    public function render()
    {
        $guardName = 'web' . session('empresa_id');
        $permisoExiste = Permission::where('name', 'stock.almacenes.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('stock.almacenes.Ver', $guardName)) {
            if (session('empresa_id')) {
                $this->empresa_id = session('empresa_id');

                $this->stocks = StockElementoAlmacen::whereHas('almacen', function ($q) {
                        $q->where('empresa_id', $this->empresa_id);
                    })
                    ->when($this->filtro_almacen, function ($q) {
                        $q->where('almacen_id', $this->filtro_almacen);
                    })
                    ->when($this->filtro_estado === 'sobrestock', function($q) {
                        $q->where('stock_minimo', '>', 0)
                        ->whereColumn('existencia', '>', DB::raw('stock_minimo * 3'));
                    })
                    ->whereHas('elementoProducto', function ($q) {
                        $q->where('descripcion', 'like', '%' . $this->search . '%');
                    })
                    ->with(['elementoProducto', 'almacen'])
                    ->orderByDesc('id')
                    ->paginate(7);

                $almacenes = StockAlmacen::where('empresa_id', $this->empresa_id)->orderBy('name')->get();

                $elementos = ElementoProducto::select('elemento_productos.*', 'elementos.name as elemento_name') // <-- Forzar el ID correcto
                    ->join('elementos', 'elementos.id', '=', 'elemento_productos.elemento_id')
                    ->where('elementos.empresa_id', $this->empresa_id)
                    ->orderBy('elementos.name')
                    ->get();
                    
                // $elementos = ElementoProducto::join('elementos', 'elementos.id', '=', 'elemento_productos.elemento_id')
                //     ->where('empresa_id', $this->empresa_id)
                //     ->orderBy('elementos.name')
                //     ->get();

                return view('livewire.stock.stock-almacen-component', [
                    'stocks' => $this->stocks,
                    'almacenes' => $almacenes,
                    'elementos' => $elementos,
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
        // La query se reconstruye en render() con search y filtro_almacen
        $this->resetPage();
    }

    public function create()
    {
        $this->resetCreateForm();
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

    private function resetCreateForm()
    {
        $this->stock_id = '';
        $this->almacen_id = '';
        $this->elemento_producto_id = '';
        $this->existencia = 0;
        $this->stock_minimo = 0;
    }

    public function store()
    {
        $this->validate([
            'almacen_id' => 'required|exists:stock_almacen,id',
            'elemento_producto_id' => [
                'required',
                Rule::exists('elemento_productos', 'id')->where(function ($query) {
                    $query->whereIn('elemento_id', function ($sub) {
                        $sub->select('id')->from('elementos')->where('empresa_id', session('empresa_id'));
                    });
                })
            ],
            'existencia' => 'required|numeric|min:0',
            'stock_minimo' => 'required|numeric|min:0',
        ]);

        // Validar duplicado (elemento + almacén) si es creación
        $existe = StockElementoAlmacen::where('almacen_id', $this->almacen_id)
            ->where('elemento_producto_id', $this->elemento_producto_id)
            ->when($this->stock_id, function ($q) {
                $q->where('id', '!=', $this->stock_id);
            })
            ->exists();

        if ($existe) {
            $this->addError('elemento_id', 'Ese elemento ya tiene stock registrado en este almacén.');
            return;
        }

        StockElementoAlmacen::updateOrCreate(['id' => $this->stock_id], [
            'almacen_id' => $this->almacen_id,
            'elemento_producto_id' => $this->elemento_producto_id,
            'existencia' => $this->existencia,
            'stock_minimo' => $this->stock_minimo,
        ]);

        session()->flash('message', $this->stock_id ? 'Stock Actualizado.' : 'Stock Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $stock = StockElementoAlmacen::findOrFail($id);
        $this->stock_id = $id;
        $this->almacen_id = $stock->almacen_id;
        $this->elemento_producto_id = $stock->elemento_producto_id;
        $this->existencia = $stock->existencia;
        $this->stock_minimo = $stock->stock_minimo;
        $this->openModalPopover();
    }

    public function delete($id)
    {
        StockElementoAlmacen::find($id)->delete();
        session()->flash('message', 'Stock Eliminado.');
    }
}