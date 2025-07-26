<?php

namespace App\Http\Livewire\Imprenta;

use Livewire\Component;

use App\Models\Imprenta\ImprentaLado as lado;
use App\Models\Imprenta\ImprentaPapel as papel;
use App\Models\Imprenta\ImprentaSistemaimpresion as sistema_impresion;
use App\Models\Imprenta\ImprentaTipodocumento as Tipodocumento;

class AdminComponent extends Component
{
    public $papeles_list, $lados_list, $sistemas_list, $tipos_list ; 
    public $vpseudo_modal;
    public $param1, $param2, $param3;

    public function render()
    {
        $this->papeles_list = json_decode(papel::where('eliminado','=',false)->get());
        $this->lados_list = json_decode(lado::where('eliminado','=',false)->get());
        $this->sistemas_list = json_decode(sistema_impresion::where('eliminado','=',false)->get());
        $this->tipos_list = json_decode(Tipodocumento::where('eliminado','=',false)->get());

        return view('livewire.imprenta.admin-component')->extends('layouts.appimprenta');
    }


    public function pseudo_modal($param) {
        $this->vpseudo_modal=$param;
        $this->param1=null;
        $this->param2=null;
        $this->param3=null;
    }

    public function hide_pseudo_modal() {
        $this->vpseudo_modal=null;
    }

    public function activar($funcion, $id, $valor) {
        switch($funcion) {
            case 'papeles': $a = papel::where('id', $id)->update(['activo' => !$valor]); break;
            case 'sistemas': $a = sistema_impresion::where('id', $id)->update(['activo' => !$valor]); break;
            case 'lados': $a = lado::where('id', $id)->update(['activo' => !$valor]); break;
            case 'tipos': $a = Tipodocumento::where('id', $id)->update(['activo' => !$valor]); break;
        }
    }

    public function agregar($funcion) {
        switch ($funcion) { 
            case 'papeles': $a = new papel;
                $a->tamano_papel = $this->param1;
                $a->gramaje = $this->param2;
                $a->precio = $this->param3;
                $a->save(); break;
            case 'sistemas': $a = new sistema_impresion();
                $a->sistema = $this->param1;
                $a->factor = $this->param2;
                $a->save(); break;
            case 'lados': $a = new lado();
                $a->lados = $this->param1;
                $a->factor = $this->param2;
                $a->save(); break;
            case 'tipos': $a = new Tipodocumento();
                $a->name = $this->param1;
                $a->save(); break;
        }
    }

    public function eliminar($funcion, $id) {
        switch ($funcion) { 
            case 'papeles': papel::where('id',$id)->update(['eliminado' => true]); break;
            case 'sistemas': sistema_impresion::where('id',$id)->update(['eliminado' => true]); break;
            case 'lados': lado::where('id',$id)->update(['eliminado' => true]); break;
            case 'tipos': Tipodocumento::where('id',$id)->update(['eliminado' => true]); break;
        }
    }
}
