<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;

use App\Models\Menu\menu_menu as ModelsMenu;
use App\Models\Menu\menu_categoria as ModelCategorias;

class MenuesComponent extends Component
{
    public $menus, $menu_nombre_menu, $menu_menu_id, $menu_categoria_id, $categorias;

    public function render()
    {
        $this->menus = ModelsMenu::all();
        $this->categorias = ModelCategorias::all();
        return view('livewire.menu.menues-component')->layout('layouts.app');
    }

    public function HabilitarMenu($id) {
        $menu = ModelsMenu::find($id);
        $menu->menu_habilitada = !$menu->menu_habilitada;
        $menu->save();
    }

    public function AgregarMenu() {
        $this->validate([
            'menu_nombre_menu' => 'required',
            'menu_categoria_id' => 'required',
        ]);

        ModelsMenu::updateOrCreate(['id' => $this->menu_menu_id], [
            'menu_nombre_menu'=>$this->menu_nombre_menu,
            'menu_categoria_id'=>$this->menu_categoria_id,
        ]);
    }

    public function editar() {
        // $this->menu_id = $menu_id;
        // $menu = ModelsMenu::find($menu_id);
        // dd($menu);

        return redirect('menueditar');
    }

}
