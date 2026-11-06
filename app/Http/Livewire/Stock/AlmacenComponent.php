<?php

namespace App\Http\Livewire\Stock;

use App\Models\StockAlmacen;
use App\Models\EmpresaUsuario;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class AlmacenComponent extends Component
{
    use WithPagination;

    public $isModalOpen = false;
    public $almacen_id;
    public $name, $direccion, $search;
    public $empresa_id;

    protected $almacenes;

    public function render()
    {
        $guardName = 'web' . session('empresa_id');
        $permisoExiste = Permission::where('name', 'almacenes.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('almacenes.Ver', $guardName)) {
            if (session('empresa_id')) {
                $this->empresa_id = session('empresa_id');
                $this->almacenes = StockAlmacen::where('empresa_id', $this->empresa_id)
                    ->where('name', 'like', '%' . $this->search . '%')
                    ->orderBy('name')
                    ->paginate(7);

                return view('livewire.stock.almacen-component', ['almacenes' => $this->almacenes])
                    ->extends('layouts.adminlte');
            } else {
                return view('livewire.seleccionarempresa')->extends('layouts.adminlte');
            }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar()
    {
        $this->almacenes = StockAlmacen::where('empresa_id', $this->empresa_id)
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate(7);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        return view('livewire.stock.createalmacen')
            ->with('isModalOpen', $this->isModalOpen);
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
        $this->almacen_id = '';
        $this->name = '';
        $this->direccion = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'direccion' => 'nullable',
        ]);

        StockAlmacen::updateOrCreate(['id' => $this->almacen_id], [
            'name' => $this->name,
            'direccion' => $this->direccion,
            'empresa_id' => session('empresa_id'),
        ]);

        session()->flash('message', $this->almacen_id ? 'Almacén Actualizado.' : 'Almacén Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $almacen = StockAlmacen::findOrFail($id);
        $this->almacen_id = $id;
        $this->name = $almacen->name;
        $this->direccion = $almacen->direccion;
        $this->openModalPopover();
    }

    public function delete($id) {
        $almacen = StockAlmacen::withCount('stocks')->find($id);
        if ($almacen->stocks_count > 0) {
            session()->flash('message', 'No se puede eliminar: el almacén tiene stock asociado.');
            return;
        }
        $almacen->delete();
        session()->flash('message', 'Almacén Eliminado.');
    }
}