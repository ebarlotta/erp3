<?php

namespace App\Http\Livewire\Geri\Menu;

use App\Models\Geri\Menu;
use App\Models\Geri\Menuingrediente;
use App\Models\Elementos\ElementoIngrediente;
use App\Models\Elementos\Elemento;
use Spatie\Permission\Models\Permission;
use Livewire\Component;
class MenuComponent extends Component {
    public $isModalOpen = false;
    public $isModalOpenGestionar = false;
    public $isModalOpenHacerLocal = false;
    public $menu, $menu_id;
    public $menues, $nombremenu, $menuactivo=true, $tiempopreparacion;
    public $ingredientesdelmenu, $ingredientes, $ingredientea, $cantidad, $ingrediente_gestionar_id, $unidad, $publico, $ppersonas;
    public $empresa_id, $search, $hacerlocal, $menu_id_temporal;
    public $local;

    public function render() {
        $guardName = 'web' . session('empresa_id'); $permisoExiste = Permission::where('name', 'menu.Ver')->where('guard_name', $guardName)->exists();
        if(!isset($this->local)) { $this->local = 0; $this->CambiarLocal(0); }
        if(auth()->check() && $permisoExiste && auth()->user()->hasPermissionTo('menu.Ver', $guardName)) {
            if(session('empresa_id')) {
                $empresaId = session('empresa_id');
                $this->ingredientes = ElementoIngrediente::join('elementos', 'elementos.id','elemento_ingredientes.elemento_id')->orderby('elementos.name')->get();
                $this->CargarIngredientesDelMenu();
                $this->resumir();
                return view('livewire.geri.menu.menu-component',['datos'=> $this->datos])->extends('layouts.adminlte');
            } else { return view('livewire.seleccionarempresa')->extends('layouts.adminlte'); }
        } else {
            return view('SinPermiso')->extends('layouts.adminlte');
        }
    }

    public function CambiarLocal($loc) {
        $this->local = $loc;
    }

    public function resumir() {
        $empresaId = session('empresa_id');
        if($this->local==1) {
            $this->datos = Menu::where('empresa_id', session('empresa_id'))
            ->when($this->search, function ($query) {
                $query->where('nombremenu', 'LIKE', '%' . $this->search . '%');
            })
            ->orderby('nombremenu')->paginate(10);
        } else {
            $this->datos = Menu::where('empresa_id', session('empresa_id'))
            ->when($this->search, function ($query) {
                $query->where('nombremenu', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere(function ($query) use ($empresaId) {
                $query->where('publico', 1)
                ->where('empresa_id', '<>', $empresaId); })
            ->orderby('nombremenu')->paginate(10);
        }
    }

    public function CargarIngredientesDelMenu() {
        $this->ingredientesdelmenu = Elemento::join('elemento_ingredientes','elementos.id','elemento_ingredientes.elemento_id')
        ->join('menuingredientes','menuingredientes.elemento_id','elemento_ingredientes.elemento_id')
        ->join('menus','menus.id','menuingredientes.menu_id')
        ->join('unidads','elementos.unidad_id','unidads.id')
        ->select('elementos.name as nombre_elemento', 'cantidad', 'unidads.name as nombre_unidad','menus.id as menu_id','elemento_ingredientes.elemento_id as elemento_id')
        ->where('menu_id','=',$this->menu_id)
        ->where('elementos.empresa_id','=',session('empresa_id'))
        ->get();
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
        $this->isModalOpen=true;
        return view('livewire.geri.menu.createmenu')->with('isModalOpen', $this->isModalOpen)->with('menu', $this->menu);
    }

    public function show($id)
    {
        $this->openModalPopoverGestionar();
        $menu = Menu::where('id',$id)->get();
        $this->menu = $menu;
        $this->menu_id = $id;
        session('empresa_id')<>$menu[0]['empresa_id'] ? $this->hacerlocal = 1 : $this->hacerlocal = 0;

        $this->CargarIngredientesDelMenu();

        return view('livewire.geri.menu.gestionarmenu')->with('isModalOpen', $this->isModalOpen)->with('menu', $menu);
    }

    public function openModalPopoverGestionar() { $this->isModalOpenGestionar = true; }
    public function closeModalPopoverGestionar() { $this->isModalOpenGestionar = false; }
    public function openModalPopover() { $this->isModalOpen = true; }
    public function closeModalPopover() { $this->isModalOpen = false; }
    private function resetCreateForm(){ $this->menu_id = $this->tiempopreparacion = $this->nombremenu = ''; }
    public function openModalPopoverHacerLocal() { $this->isModalOpenHacerLocal = true; }
    public function closeModalPopoverHacerLocal() { $this->isModalOpenHacerLocal = false; }

    public function store()
    {
        $this->validate([
            'nombremenu' => 'required',
            'tiempopreparacion' => 'required',
            'ppersonas' => 'required',
        ]);

        $a = Menu::updateOrCreate(['id' => $this->menu_id], [
            'nombremenu' => $this->nombremenu,
            'tiempopreparacion' => $this->tiempopreparacion,
            'menuactivo' => $this->menuactivo,
            'ppersonas' => $this->ppersonas,
            'empresa_id' => session('empresa_id'),
        ]);

        $this->menu_id_temporal = $a->id;

        session()->flash('message', $this->menu_id ? 'Menu Actualizadao.' : 'Menu Creadao.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function HacerElMenuLocal($id_menu) {
        //Crear el nuevo menú
        $this->menu_id=null;
        $this->nombremenu = $this->menu[0]['nombremenu'];
        $this->tiempopreparacion = $this->menu[0]['tiempopreparacion'];
        $this->menuactivo = $this->menu[0]['menuactivo'];
        $this->ppersonas = $this->menu[0]['ppersonas'];
        $this->store();

        // Crea todos los nuevos elementos que utilizará el en nuevo menú
        // Asociar todos los elementos del viejo menú con nuevos elementos del nuevo menú
        $a = Menuingrediente::join('elementos','menuingredientes.elemento_id','=','elementos.id')->where('menuingredientes.menu_id','=', $this->menu[0]['id'])->get();

        foreach($a as $menuingrediente) {
            // Crear Nuevos elemento_ingredientes en base a los elemento_ingredientes del viejo menú
            $ele = elemento::create(['name' => $menuingrediente->name,'existencia'=> $menuingrediente->existencia, 'precio_compra'=> $menuingrediente->precio_compra,'stock_minimo'=> $menuingrediente->stock_minimo,'vencimiento'=> $menuingrediente->vencimiento,'categoria_id'=> $menuingrediente->categoria_id,'unidad_id'=> $menuingrediente->unidad_id, 'empresa_id'=> session('empresa_id')]);

            $ele_ingr = ElementoIngrediente::create(['estado_id'=>1,'elemento_id'=>$ele->id]);

            // Crear los nuevos elementos en base a los elemento_ingredientes
            Menuingrediente::create(['menu_id'=>$this->menu_id_temporal, 'elemento_id'=>$ele->id,'cantidad'=>$menuingrediente->cantidad, ]);
        }

    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $this->menu_id=$id;
        $this->nombremenu = $menu->nombremenu;
        $this->tiempopreparacion = $menu->tiempopreparacion;
        $this->menuactivo = $menu->menuactivo;
        $this->ppersonas = $menu->ppersonas;
        $this->publico = $menu->publico;

        $this->openModalPopover();
    }

    public function EliminarRelacionMenuIngrediente($menu_id,$elemento_id){
        // dd($menu_id . ' ' .$elemento_id);
        menuingrediente::where('menu_id','=',$menu_id)
        ->where('elemento_id','=',$elemento_id)
        ->delete();
        $this->CargarIngredientesDelMenu();
    }

    public function delete($id)
    {
        Menu::find($id)->delete();
        session()->flash('message', 'Menu Eliminado.');
    }

    public function BuscarUnidad() {
        $a = elemento::join('unidads','unidads.id','=','elementos.unidad_id')
        ->where('elementos.id','=',$this->ingrediente_gestionar_id)
        ->get('unidads.name');
        $this->unidad = $a[0]['name'];
    }

    public function AgregarElementoAlMenu() {
        //Si Cantidad es numerico, si es positivo, si no es nulo
        $this->validate([
            'cantidad' => 'required|min:0.00001|numeric',
            // 'ingrediente_gestionar_id' => 'required|unique:menuingredientes,elemento_id,menu_id',
        ]);
        if(is_null($this->ingrediente_gestionar_id)) {
            session()->flash('message', 'Debe seleccionar un ingrediente');
        } else {
            Menuingrediente::create([
                'menu_id' => $this->menu_id,
                'elemento_id' => $this->ingrediente_gestionar_id,
                'cantidad' => $this->cantidad,
            ]);

            $this->CargarIngredientesDelMenu();
        //     $this->ingredientesdelmenu = Ingredientes::where('menu_id',$this->menu_id)
        // ->where('ingredientes.empresa_id',session('empresa_id'))
        // ->join('menuingredientes','ingredientes.id','=','menuingredientes.elemento_id')
        // ->join('unidads','ingredientes.unidad_id','=','unidads.id')
        // ->get();
            session()->flash('message', 'Se agregó el ingrediente');
        }
    }

    public function habilitar($id,$estado)
    {
        $menu = Menu::find($id);
        if($estado) { $menu->menuactivo = 0; } else { $menu->menuactivo = 1; }
        $menu->save();
    }

    public function publicar($id,$estado)
    {
        $menu = Menu::find($id);
        if($estado) { $menu->publico = 0; } else { $menu->publico = 1; }
        $menu->save();
    }


}
