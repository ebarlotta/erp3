<?php

namespace App\Http\Livewire\Cuenta;

use App\Models\Cuenta;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use App\Models\EmpresaUsuario;

class CuentaComponent extends Component {
    public $isModalOpen = false;
    public $cuenta, $cuenta_id;
    public $name;
    public $empresa_id, $search;

    protected $cuentas;

    use WithPagination;

    public function render() {
        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'cuentas.Ver')->where('guard_name', $guardName)->exists();
        if (auth()->check() && $permisoExiste && EmpresaUsuario::PermisoHabilitado('cuentas.Ver', $guardName)) {
            if(session('empresa_id')) {
                $this->empresa_id=session('empresa_id');
                $this->cuentas = Cuenta::where('empresa_id', $this->empresa_id)
                ->where('name', 'like', '%'.$this->search.'%')
                ->orderby('name')
                ->paginate(7);
                return view('livewire.cuenta.cuenta-component',['cuentas'=> $this->cuentas])->extends('layouts.adminlte');
            } else {
                return view('livewire.seleccionarempresa')->extends('layouts.adminlte');
            }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() {
        $this->cuentas = Cuenta::where('empresa_id', '=', $this->empresa_id)
        ->where('name', 'like', '%'.$this->search.'%')
        ->orderby('name')
        ->paginate(7);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.cuenta.createcuentas')->with('isModalOpen', $this->isModalOpen)->with('name', $this->name);
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
        $this->cuenta_id = '';
        $this->name = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Cuenta::updateOrCreate(['id' => $this->cuenta_id], [
            'name' => $this->name,
            'empresa_id' => $this->empresa_id,
        ]);

        session()->flash('message', $this->cuenta_id ? 'Cuenta Actualizada.' : 'Cuenta Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        $this->id = $id;
        $this->cuenta_id=$id;
        $this->name = $cuenta->name;
        $this->openModalPopover();
    }

    public function delete($id)
    {
        Cuenta::find($id)->delete();
        session()->flash('message', 'Cuenta Eliminada.');
    }

}
