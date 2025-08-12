<?php

namespace App\Http\Livewire\Registro;

use Livewire\Component;

class InformesonlineComponent extends Component
{
    public $cuil, $patente, $tramite, $estado_inicial=1;

    public $resumen, $datos_solicitante, $datos_vehiculo, $seleccion_tramite, $forma_pago, $pago; 

    public function render()
    {
        return view('livewire.registro.informesonline-component')->extends('layouts.adminlte');
    }

    public function Mostrar($item) {
        switch ($item){
            case 'inicial':         $this->estado_inicial=0; $this->datos_solicitante=1; $this->datos_vehiculo=0; $this->seleccion_tramite=0; $this->forma_pago=0; $this->pago=0; break;
            case 'datos_vehiculo':  $this->estado_inicial=0; $this->datos_solicitante=0; $this->datos_vehiculo=1; $this->seleccion_tramite=0; $this->forma_pago=0; $this->pago=0; break;
            case 'datos_tramite':   $this->estado_inicial=0; $this->datos_solicitante=0; $this->datos_vehiculo=0; $this->seleccion_tramite=1; $this->forma_pago=0; $this->pago=0; break;
            case 'forma_pago':      $this->estado_inicial=0; $this->datos_solicitante=0; $this->datos_vehiculo=0; $this->seleccion_tramite=0; $this->forma_pago=1; $this->pago=0; break;
            case 'pago':            $this->estado_inicial=0; $this->datos_solicitante=0; $this->datos_vehiculo=0; $this->seleccion_tramite=0; $this->forma_pago=0; $this->pago=1; break;
        }
    }

    public function SoloNumeros() {
        
    }
}
