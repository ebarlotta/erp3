<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;
use App\Models\Menu\menu_categoria as ModelCategorias;

class MenuCategoriaComponent extends Component
{

        public $categorias, $menu_nombre_categoria, $menu_categoria_id;

    public function render()
    {
        $this->categorias = ModelCategorias::all();
        return view('livewire.menu.menu-categoria-component')->layout('layouts.app');
    }

    public function AgregarCategoria() {
        $this->validate([
            'menu_nombre_categoria' => 'required',
        ]);

        ModelCategorias::updateOrCreate(['id' => $this->menu_categoria_id], [
            'menu_nombre_categoria'=>$this->menu_nombre_categoria,
        ]);        
    }

    public function EliminarCategoria($id) {
        ModelCategorias::find($id)->delete();
    }
 
    public function HabilitarCategoria($id) {
        $categoria = ModelCategorias::find($id);
        $categoria->menu_habilitada = !$categoria->menu_habilitada;
        $categoria->save();
    }

}
