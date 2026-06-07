<?php

namespace App\Http\Livewire\erp\Categoria;

use App\Models\erp\Categoriaproducto;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
class CategoriaproductoComponent extends Component {
    public $isModalOpen = false;
    public $categoria, $categoria_id, $name;
    public $empresa_id, $search;

    protected $categorias;

    use WithPagination;

    public function render() {
        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'categoriaproducto.Ver')->where('guard_name', $guardName)->exists();
        if (auth()->check() && $permisoExiste && auth()->user()->hasPermissionTo('categoriaproducto.Ver', $guardName)) {
        // if(auth()->check() && auth()->user()->hasPermissionTo('categoriaproducto.Ver','web'.session('empresa_id'))) {
            if(session('empresa_id')) {
                $this->categorias = Categoriaproducto::where('empresa_id', '=', session('empresa_id'))
                    ->where('name', 'like', '%'.$this->search.'%')
                    ->orderby('name')
                    ->paginate(7);
                return view('livewire.categoria.categoriaproducto-component',['categorias'=> $this->categorias])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() {
        $this->categorias = Categoriaproducto::where('empresa_id', '=', session('empresa_id'))
        ->where('name', 'like', '%'.$this->search.'%')
        ->orderby('name')
        ->paginate(7);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.categoria.createcategoriaproducto')->with('isModalOpen', $this->isModalOpen)->with('name', $this->name);
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
        $this->categoria_id = '';

        $this->name = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Categoriaproducto::updateOrCreate(['id' => $this->categoria_id], [
            'name' => $this->name,
            'empresa_id' => session('empresa_id'),
        ]);

        session()->flash('message', $this->categoria_id ? 'Categría Actualizada.' : 'Categría Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $categoria = Categoriaproducto::findOrFail($id);
        $this->categoria_id=$id;
        $this->name = $categoria->name;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Categoriaproducto::find($id)->delete();
        session()->flash('message', 'Categría Eliminada.');
    }
}
