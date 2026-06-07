<?php

namespace App\Http\Livewire\Localidades;

use App\Models\Localidades;
use App\Models\Provincias;
use Spatie\Permission\Models\Permission;
use Livewire\Component;

class LocalidadesComponent extends Component {
    public $localidad_descripcion, $localidad_cp, $localidad_id;
    public $search, $isModalOpen = false;
    public $provincias, $provincia_id;
    protected $localidades;

    public function render() {
        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'localidades.Ver')->where('guard_name', $guardName)->exists();
        if(auth()->check() && $permisoExiste && auth()->user()->hasPermissionTo('localidades.Ver', $guardName)) {
            if(session('empresa_id')) {
                $this->provincias = Provincias::all();
                $this->localidades = Localidades::where('id','>=',1)
                ->with('provincia')
                ->where('localidad_descripcion', 'like', '%'.$this->search.'%')
                ->orderby('localidad_descripcion')
                ->paginate(7);
                return view('livewire.localidades.localidades-component',['isModalOpen'=>$this->isModalOpen,'localidades'=>$this->localidades])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() {
        $this->localidades = Localidades::where('id','>=',1)
            ->where('localidad_descripcion', 'like', '%'.$this->search.'%')
            ->with('provincia')
            ->orderby('localidad_descripcion')
            ->paginate(7);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.localidades.localidades-component',['isModalOpen'=>$this->isModalOpen,'localidad_descripcion'=>$this->localidad_descripcion])->extends('layouts.adminlte');
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
        $this->localidad_id = '';
        $this->localidad_descripcion = '';
        $this->localidad_cp = '';
    }

    public function store()
    {
        $this->validate([
            'localidad_descripcion' => 'required',
            'localidad_cp' => 'required',
            'provincia_id' => 'required',
        ]);

        Localidades::updateOrCreate(['id' => $this->localidad_id], [
            'localidad_descripcion' => $this->localidad_descripcion,
            'localidad_cp' => $this->localidad_cp,
            'provincia_id' => $this->provincia_id,
        ]);

        $this->Filtrar();
        session()->flash('message', $this->localidad_id ? 'Localidad Actualizada.' : 'Localidad Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $localidad = Localidades::findOrFail($id);
        $this->id = $id;
        $this->localidad_id=$id;
        $this->localidad_descripcion = $localidad->localidad_descripcion;
        $this->localidad_cp = $localidad->localidad_cp;
        $this->provincia_id = $localidad->provincia_id;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Localidades::find($id)->delete();
        session()->flash('message', 'Localidad Eliminada.');
    }
}
