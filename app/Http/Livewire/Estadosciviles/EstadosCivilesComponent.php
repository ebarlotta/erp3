<?php

namespace App\Http\Livewire\Estadosciviles;

use App\Models\EstadosCiviles;
use Livewire\Component;
use Livewire\WithPagination;


class EstadosCivilesComponent extends Component
{
    public $estadocivil, $estadocivil_id;
    protected $estadosciviles;
    public $isModalOpen = false;
    public $search;

    use WithPagination;

    public function render() {
        if(auth()->check() && auth()->user()->hasPermissionTo('estadosciviles.Ver','web'.session('empresa_id'))) {
            if(session('empresa_id')) {
                $this->estadosciviles = EstadosCiviles::where('id', '>', 1)
                ->where('estadocivil', 'like', '%'.$this->search.'%')
                ->paginate(7);
                return view('livewire.geri.estadosciviles.estados-civiles-component',['isModalOpen'=> $this->isModalOpen,'estadosciviles'=>$this->estadosciviles])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() {
        $this->estadosciviles = EstadosCiviles::where('id', '>', 1)->where('estadocivil', 'like', '%'.$this->search.'%')->paginate(7);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.geri.estadosciviles.estados-civiles-component',['isModalOpen'=> $this->isModalOpen,'estadociviles'=>$this->estadosciviles])->extends('layouts.adminlte');
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
        $this->estadocivil_id = '';
        $this->estadocivil = '';
    }

    public function store()
    {
        $this->validate([
            'estadocivil' => 'required',
        ]);

        EstadosCiviles::updateOrCreate(['id' => $this->estadocivil_id], [
            'estadocivil' => $this->estadocivil,
        ]);

        session()->flash('message', $this->estadocivil_id ? 'Estado Civil Actualizado.' : 'Estado Civil Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $estadocivil = EstadosCiviles::findOrFail($id);
        $this->id = $id;
        $this->estadocivil_id=$id;
        $this->estadocivil = $estadocivil->estadocivil;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        EstadosCiviles::find($id)->delete();
        session()->flash('message', 'Estado Civil Eliminado.');
    }
}
