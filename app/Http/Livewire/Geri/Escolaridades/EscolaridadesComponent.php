<?php

namespace App\Http\Livewire\Geri\Escolaridades;

use App\Models\Geri\Escolaridades;
use Livewire\Component;

class EscolaridadesComponent extends Component
{

    public $escolaridadDescripcion, $escolaridad_id, $search;
    public $isModalOpen = false;

    protected $escolaridades;

    public function render() {
        // if(auth()->user()->hasPermissionTo('escolaridades.Ver','web'.session('empresa_id'))) {
            if(session('empresa_id')) {
                $this->escolaridades = Escolaridades::where('id','>=',1)
                ->where('escolaridadDescripcion', 'like', '%'.$this->search.'%')
                ->orderby('escolaridadDescripcion')
                ->paginate(7);
                return view('livewire.geri.escolaridades.escolaridades-component',['isModalOpen'=> $this->isModalOpen,'escolaridades'=>$this->escolaridades])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        // } else {
        //     return view('SinPermiso')->extends('layouts.adminlte');
        // }
    }

    public function Filtrar() {
        $this->escolaridades = Escolaridades::where('id','>=',1)
            ->where('escolaridadDescripcion', 'like', '%'.$this->search.'%')
            ->orderby('escolaridadDescripcion')
            ->paginate(7);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        return view('livewire.geri.escolaridades.escolaridades-component',['isModalOpen'=> $this->isModalOpen,'escolaridades'=>$this->escolaridades])->extends('layouts.adminlte');
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
        $this->escolaridad_id = '';
        $this->escolaridadDescripcion = '';
    }

    public function store()
    {
        $this->validate([
            'escolaridadDescripcion' => 'required',
        ]);
        Escolaridades::updateOrCreate(['id' => $this->escolaridad_id], [
            'escolaridadDescripcion' => $this->escolaridadDescripcion
        ]);

        session()->flash('message', $this->escolaridad_id ? 'Escolaridad Actualizada.' : 'Escolaridad Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $escolaridad = Escolaridades::findOrFail($id);
        $this->id = $id;
        $this->escolaridad_id = $id;
        $this->escolaridad = $escolaridad->escolaridadDescripcion;
        $this->escolaridadDescripcion = $escolaridad->escolaridadDescripcion;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Escolaridades::find($id)->delete();
        session()->flash('message', 'Escolaridad Eliminada.');
    }
}
