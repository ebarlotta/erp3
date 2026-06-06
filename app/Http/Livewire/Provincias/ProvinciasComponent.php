<?php

namespace App\Http\Livewire\Provincias;

use App\Models\Nacionalidad;
use App\Models\Provincias;

use Livewire\Component;

class ProvinciasComponent extends Component
{
    public $provincia_descripcion, $provincia_id;
    public $search, $isModalOpen = false;
    public $nacionalidades, $nacionalidads_id;

    protected $provincias;

    public function render() {
        if(auth()->check() && auth()->user()->hasPermissionTo('provincias.Ver','web'.session('empresa_id'))) {
            if(session('empresa_id')) {
                $this->nacionalidades = Nacionalidad::all();
                $this->provincias = Provincias::where('id', '>=', 1)
                ->where('provincia_descripcion', 'like', '%'.$this->search.'%')
                ->orderby('provincia_descripcion')
                ->paginate(7);
                return view('livewire.provincias.provincias-component',['isModalOpen'=>$this->isModalOpen,'provincias'=>$this->provincias])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() {
        $this->provincias = Provincias::where('id', '>=', 1)
        ->where('provincia_descripcion', 'like', '%'.$this->search.'%')
        ->orderby('provincia_descripcion')
        ->paginate(7);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.provincias.provincias-component',['isModalOpen'=>$this->isModalOpen,'provincia_descripcion'=>$this->provincia_descripcion])->extends('layouts.adminlte');
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
        $this->provincia_id = '';
        $this->provincia_descripcion = '';
        $this->nacionalidads_id = '';
    }

    public function store()
    {
        $this->validate([
            'provincia_descripcion' => 'required',
            'nacionalidads_id' =>  'required',
        ],[
             'nacionalidads_id.required' => "Debe elegir una nacionalidad",
        ]);

        Provincias::updateOrCreate(['id' => $this->provincia_id], [
            'provincia_descripcion' => $this->provincia_descripcion,
            'nacionalidads_id' => $this->nacionalidads_id,
        ]);

        session()->flash('message', $this->provincia_id ? 'Provincia Actualizada.' : 'Provincia Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $provincia = Provincias::findOrFail($id);
        $this->id = $id;
        $this->provincia_id=$id;
        $this->provincia_descripcion = $provincia->provincia_descripcion;
        $this->nacionalidads_id = $provincia->nacionalidads_id;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Provincias::find($id)->delete();
        session()->flash('message', 'Provincia Eliminada.');
    }
}
