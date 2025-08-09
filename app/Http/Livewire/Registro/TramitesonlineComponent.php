<?php

namespace App\Http\Livewire\Registro;

use Livewire\Component;
use App\Models\registroTipotramite;
use App\Models\registroReguisitosTipotramite;

class TramitesonlineComponent extends Component
{
    public $tramites, $tramite_seleccionado=null, $descripciontramite, $requisitos;

    public function render()
    {
        $this->tramites = registroTipotramite::all();
        return view('livewire.registro.tramitesonline-component')->extends('layouts.adminlte');
    }

    public function cambiar_tramite() {
        //  $this->$tramite_seleccionado = $tramite_id;
        $tramite = registroTipotramite::find($this->tramite_seleccionado);
        $this->descripciontramite = $tramite->descripciontramite;
        $this->requisitos = registroReguisitosTipotramite::where('tipotramite_id','=',$this->tramite_seleccionado)->get();
         }
}
