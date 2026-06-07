<?php

namespace App\Http\Livewire\Area;

use App\Models\Area;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
class AreaComponent extends Component
{

    public $isModalOpen = false;
    public $area, $area_id;
    public $name, $search;
    public $empresa_id;

    protected $areas;

    use WithPagination;

    public function render()
    {
        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'areas.Ver')->where('guard_name', $guardName)->exists();

        if (auth()->check() && $permisoExiste && auth()->user()->hasPermissionTo('areas.Ver', $guardName)) {
            if(session('empresa_id')) {
                $this->empresa_id=session('empresa_id');
                $this->areas = Area::where('empresa_id', '=', session('empresa_id'))
                ->where('name', 'like', '%'.$this->search.'%')
                ->orderby('name')
                ->paginate(7);
                return view('livewire.area.area-component',['areas' => $this->areas])->extends('layouts.adminlte');
            } else {
                return view('livewire.seleccionarempresa')->extends('layouts.adminlte');
            }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function Filtrar() {
        $this->areas = Area::where('empresa_id', '=', $this->empresa_id)
        ->where('name', 'like', '%'.$this->search.'%')
        ->orderby('name')
        ->paginate(7);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.area.createareas')->with('isModalOpen', $this->isModalOpen)->with('name', $this->name);
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
        $this->area_id = '';
        $this->name = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Area::updateOrCreate(['id' => $this->area_id], [
            'name' => $this->name,
            'empresa_id' => session('empresa_id'),
        ]);

        session()->flash('message', $this->area_id ? 'Area Actualizada.' : 'Area Creada.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);
        $this->id = $id;
        $this->area_id=$id;
        $this->name = $area->name;
        $this->openModalPopover();
    }

    public function delete($id)
    {
        Area::find($id)->delete();
        session()->flash('message', 'Area Eliminada.');
    }

}
