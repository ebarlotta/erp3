<?php

namespace App\Http\Livewire\Registro;

use Livewire\Component;
use App\Models\registroTipotramite;
use App\Models\registroReguisitosTipotramite;

class TramitesonlineComponent extends Component
{
    public $tramites, $tramite_seleccionado=null, $descripciontramite, $requisitos;
    public $datos_vehiculo, $vehiculo_validado=1;
    public $datos_solicitante=1;

    public function render()
    {
        $this->tramites = registroTipotramite::all();
        return view('livewire.registro.tramitesonline-component')->extends('layouts.adminlte');
    }

    public function cambiar_tramite() {
        //  $this->$tramite_seleccionado = $tramite_id;
        // dd($this->tramite_seleccionado);
        if($this->tramite_seleccionado <> 0) {
            $tramite = registroTipotramite::find($this->tramite_seleccionado);
            $this->descripciontramite = $tramite->descripciontramite;
            $this->requisitos = registroReguisitosTipotramite::where('tipotramite_id','=',$this->tramite_seleccionado)->get();

            $this->datos_vehiculo = 1;
        } else {
            $this->datos_vehiculo = 0;
        }
    }
}
