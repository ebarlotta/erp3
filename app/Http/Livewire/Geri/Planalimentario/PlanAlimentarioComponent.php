<?php

namespace App\Http\Livewire\Geri\Planalimentario;

use Livewire\Component;
use App\Models\Geri\Menu;
use App\Models\Geri\MenuPlan;
use App\Models\Geri\PlanAlimentario;
use App\Models\MomentosDelDia;
use Spatie\Permission\Models\Permission;
class PlanAlimentarioComponent extends Component
{
    public $isModalOpen = false, $isModalOpenGestionar = false;
    public $planalimentario, $planalimentario_id, $plan_nombre;
    public $planesalimentarios, $nombre;
    public $selectcategoria=null;
    public $selectunidad=null;
    public $descripcion, $desde, $hasta, $activo=true, $cantidad=1, $menu_elegido, $dia;
    public $listadomenues, $listadomenuesenelplan;
    public $momentos, $momento_dia_id;
    public $isModalOpenCopiarMenuPlan, $dia_copia, $momento_dia_id_copia, $CopiarMenuPlanDia,$CopiarMenuPlanMomento;
    public $empresa_id;

    public function render() {
        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'planalimentario.Ver')->where('guard_name', $guardName)->exists();
        if(auth()->check() && $permisoExiste && auth()->user()->hasPermissionTo('planalimentario.Ver', $guardName)) {   
        // if(auth()->check() && auth()->user()->hasPermissionTo('planalimentario.Ver','web'.session('empresa_id'))) {
            if(session('empresa_id')) {
                $this->empresa_id=session('empresa_id');
                $this->planesalimentarios = PlanAlimentario::where('empresa_id', $this->empresa_id)->get();
                $this->momentos = MomentosDelDia::all();
                return view('livewire.geri.plan-alimentario.plan-alimentario-component',['datos'=> PlanAlimentario::where('empresa_id', $this->empresa_id)->paginate(7),])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.geri.plan-alimentario.createplanalimentario')->with('isModalOpen', $this->isModalOpen)->with('nombre', $this->nombre);
    }

    public function openModalPopover() { $this->isModalOpen = true; }
    public function closeModalPopover() { $this->isModalOpen = false; $this->isModalOpenGestionar = false; }
    public function openisModalOpenCopiarMenuPlan() { $this->isModalOpenCopiarMenuPlan = !$this->isModalOpenCopiarMenuPlan; $this->CargarRelaciones(); }
    public function OcultarMensaje() { session()->flash('message', null); $this->CargarRelaciones();}


    // public function closeModalGestionar() { $this->isModalOpenGestionar = false; }

    public function show($plan_id) {
        $plan = PlanAlimentario::find($plan_id);
        $this->plan_nombre = $plan->nombre;
        $this->planalimentario_id = $plan_id;
        $empresaId = session('empresa_id');
        $menues = Menu::where('empresa_id', session('empresa_id'))->orWhere(function ($query) use ($empresaId) {
            $query->where('publico', 1)
            ->where('empresa_id', '<>', $empresaId); })
        ->orderby('nombremenu')
        ->get();
        $this->listadomenues = $menues;
        // dd($this->listadomenues);
        $this->CargarRelaciones();
        $this->isModalOpenGestionar = true;
    }

    public function CargarRelaciones() {
        $this->listadomenuesenelplan = MenuPlan::where('plan_id','=',$this->planalimentario_id)->orderby('dia')->orderby('momentos_del_dias.id')
        ->join('menus','menu_plans.menu_id','menus.id')
        ->join('momentos_del_dias','momentos_del_dias.id','menu_plans.momento_dia_id')
        ->get();
        // dd($this->listadomenuesenelplan );
        // ->join('momentos_del_dias','menu_plans.menu_id','menus.id')
        // ->get(['menu_plans.id','menu_id','plan_id','dia','activo','cantidad','nombremenu','tiempopreparacion','momento_dia_id']);
    }

    private function resetCreateForm(){ $this->planalimentario_id = ''; $this->nombre = ''; }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        PlanAlimentario::updateOrCreate(['id' => $this->planalimentario_id], [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'desde' => $this->desde,
            'hasta' => $this->hasta,
            'activo' => $this->activo,
            'empresa_id' => $this->empresa_id,
        ]);

        session()->flash('message', $this->planalimentario_id ? 'Plan Alimentario Actualizado.' : 'Plan Alimentario Creado.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function storeDetalle()
    {
        $this->validate([
            'menu_elegido' => 'required',
            'planalimentario_id' => 'required',
            'dia' => 'required',
            'momento_dia_id' =>'required',
            'cantidad' => 'required',
        ]);

        $menu_plan = new MenuPlan;
        $menu_plan->plan_id = $this->planalimentario_id;
        $menu_plan->menu_id = $this->menu_elegido;
        $menu_plan->dia = $this->dia;
        $menu_plan->cantidad = $this->cantidad;
        $menu_plan->momento_dia_id = $this->momento_dia_id;
        $menu_plan->save();

        session()->flash('message', $this->planalimentario_id ? 'Plan Actualizado.' : 'Plan Creado.');

        $this->CargarRelaciones();
    }

    public function edit($id)
    {
        $planalimentario = PlanAlimentario::findOrFail($id);
        $this->planalimentario_id = $id;
        $this->nombre = $planalimentario->nombre;
        $this->descripcion = $planalimentario->descripcion;
        $this->desde = $planalimentario->desde;
        $this->hasta = $planalimentario->hasta;
        $this->momento_dia_id = $planalimentario->momento_dia_id;
        $this->activo = $planalimentario->activo;

        $this->openModalPopover();

        session()->flash('message', 'Plan Alimentario Modificado.');
    }

    public function delete($id)
    {
        PlanAlimentario::find($id)->delete();

        session()->flash('message', 'Plan Alimentario Eliminado.');
    }

    public function habilitar($plan_id, $estado) {
        PlanAlimentario::where('id', $plan_id)->update(['activo' => !$estado]);

        session()->flash('message', 'Plan Alimentario Habilitado/Desabilitado.');
    }

    public function habilitarMenuPlan($menu_id, $plan_id, $dia, $momento_dia_id, $estado) {

        MenuPlan::where('menu_id', $menu_id)
        ->where('plan_id', $plan_id)
        ->where('dia', $dia)
        ->where('momento_dia_id', $momento_dia_id)
        ->update(['activo' => !$estado]);

        $this->CargarRelaciones();

        session()->flash('message', 'Plan Alimentario Habilitado/Desabilitado.');
    }

    public function deletemenuadherido($menu_id, $plan_id, $dia, $momento_dia_id) {
        MenuPlan::where('menu_id','=',$menu_id)
        ->where('plan_id','=',$plan_id)
        ->where('dia','=',$dia)
        ->where('momento_dia_id','=',$momento_dia_id)
        ->delete();

        $this->CargarRelaciones();
    }

    public function EliminarRelMenuPlan($momento_dia_id, $dia, $menu_id) {
        // SELECT * FROM `menu_plans` WHERE momento_dia_id=2 and dia=2 and menu_id=14;
        MenuPlan::where('plan_id','=',$this->planalimentario_id)
        ->where('momento_dia_id','=',$momento_dia_id)
        ->where('dia','=',$dia)
        ->where('menu_id','=',$menu_id)
        ->delete();

        session()->flash('message', 'Relación Eliminada.');

        $this->CargarRelaciones();
    }

    public function ActualizarCantidad($momento_dia_id, $dia, $menu_id, $cantidad) {
        MenuPlan::where('plan_id','=',$this->planalimentario_id)
        ->where('momento_dia_id','=',$momento_dia_id)
        ->where('dia','=',$dia)
        ->where('menu_id','=',$menu_id)
        ->update(['cantidad'=>$cantidad]);

        session()->flash('message', 'Cantidad Actualizada.');

        $this->CargarRelaciones();
    }

    public function CopiarMenuPlan($dia,$momento) {

        $this->CopiarMenuPlanDia = $dia;
        $this->CopiarMenuPlanMomento = $momento;

        $this->openisModalOpenCopiarMenuPlan();
    }

    public function CopiarMenuPlanStore() {
        $a = MenuPlan::where('plan_id', $this->planalimentario_id)
        ->where('dia', $this->CopiarMenuPlanDia)
        ->where('momento_dia_id', $this->CopiarMenuPlanMomento)
        ->get();
        foreach($a as $menuplan) {
            $b = new MenuPlan();
            $b->dia = $this->dia_copia;
            $b->momento_dia_id = $this->momento_dia_id_copia;
            $b->plan_id = $this->planalimentario_id;
            $b->momento_dia_id = $this->momento_dia_id_copia;
            $b->menu_id = $menuplan->menu_id;
            $b->cantidad = $menuplan->cantidad;
            $b->activo = $menuplan->activo;
            $b->save();
        }

        session()->flash('message', $b->id ? 'Menú Copiado':'Error');

        $this->openisModalOpenCopiarMenuPlan();
    }

}
