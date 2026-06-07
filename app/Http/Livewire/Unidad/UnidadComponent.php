<?php

namespace App\Http\Livewire\Unidad;

use App\Models\Unidad;
use Spatie\Permission\Models\Permission;
use Livewire\Component;

class UnidadComponent extends Component
{
    public $isModalOpen = false;
    public $unidad, $unidad_id;
    public $name;
    public $empresa_id, $search;

    protected $unidades;

    public function render() {
        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'unidades.Ver')->where('guard_name', $guardName)->exists();
        if(auth()->check() && $permisoExiste && auth()->user()->hasPermissionTo('unidades.Ver', $guardName)) {
            if(session('empresa_id')) {
                $this->empresa_id=session('empresa_id');
                $this->unidades = Unidad::where('empresa_id', $this->empresa_id)
                    ->where('name', 'like', '%'.$this->search.'%')
                    ->orderby('name')
                    ->paginate(7);
                return view('livewire.unidad.unidad-component',['unidades'=> $this->unidades])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() {
        $this->unidades = Unidad::where('empresa_id', '=', $this->empresa_id)
        ->where('name', 'like', '%'.$this->search.'%')
        ->orderby('name')
        ->paginate(7);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.unidad.createunidad')->with('isModalOpen', $this->isModalOpen)->with('name', $this->name);
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->unidad_id = '';

        $this->name = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Unidad::updateOrCreate(['id' => $this->unidad_id], [
            'name' => $this->name,
            'empresa_id' =>$this->empresa_id,
        ]);

        session()->flash('message', $this->unidad_id ? 'Unidad Actualizada.' : 'Unidad Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $unidad = Unidad::findOrFail($id);
        $this->id = $id;
        $this->unidad_id=$id;
        $this->name = $unidad->name;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Unidad::find($id)->delete();
        session()->flash('message', 'Unidad Eliminado.');
    }
}
