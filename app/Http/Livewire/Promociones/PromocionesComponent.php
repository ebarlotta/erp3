<?php

namespace App\Http\Livewire\Promociones;

use Livewire\Component;

class PromocionesComponent extends Component
{
    

    public function render()
    {
        return view('livewire.promociones.promociones-component')->extends('layouts.sinadminlte');
    }

    public function BuscarDato() {
        if($this->modelo<>0 && strlen($this->descripcion)>3) {
            $this->cargarListado();
        }
    }

    public function CargarDatos($id) {
        $this->seleccionado = $id;
        $precio = resgistroAvaluosVehiculos::where('id','=',$this->seleccionado)
            ->select('anio'.$this->modelo . ' as avaluo', 'vehiculo')
            ->get();

        $this->nombreCompleto = $precio[0]->vehiculo;
        
        $precio = $precio[0]->avaluo*0.01;
        

        $this->registroinicial = [
            'descripcion' => 'TRANSFERENCIA',
            'PrecioUnitario' => $precio, 
            'Cantidad' => 1,
            'Total' => $precio,
        ];

        $this->detalles = registroReguisitosTipotramite::where('tipotramite_id','=',$this->tramite_seleccionado)->get();
        $this->total = registroReguisitosTipotramite::where('tipotramite_id', $this->tramite_seleccionado)
            ->selectRaw('SUM(precio * cantidad) as total')
            ->value('total');

        $this->total= $this->total+$precio;

        $this->mostrarListado=false;

    }

    public function Calcular($param) { 
        if($param=="modificar") { 
            $this->total_modificar = $this->precio_modificar * $this->cantidad_modificar; 
        } else { 
            $this->total_agregar = $this->precio_agregar * $this->cantidad_agregar; 
        }
    }

    public function cargarListado() {
        $this->listado = resgistroAvaluosVehiculos::select('id','vehiculo', 'anio'.$this->modelo .' as avaluo')
            ->where('vehiculo','like','%'.$this->descripcion.'%')
            ->orderby('vehiculo','asc')
            ->get();

        $texto = '';
        for($i=0; $i<count($this->listado);$i++) {
            if($this->listado[$i]['avaluo']>0) {
                $texto = $texto . '<tr wire:click="CargarDatos('. $this->listado[$i]['id'] .')"><td>'.$this->listado[$i]['vehiculo'].'</td><td>'.number_format($this->listado[$i]['avaluo'],0,",",".").'</td></tr>';
            }
        }
        $this->mostrarListado=true;
        $this->listado = $texto;

    }

    public function ElegirTramite() {
        $this->tramites = registroTipotramite::find($this->tramite_seleccionado);
        if($this->tramite_seleccionado == 0 ) {
            $this->tramite_descripcion = ""; 
            $this->datos_tramite_validados = false;
        } else {
            $this->tramite_descripcion = $this->tramites->nombretramite;
            $this->datos_tramite_validados = true;
        }
    }
}
