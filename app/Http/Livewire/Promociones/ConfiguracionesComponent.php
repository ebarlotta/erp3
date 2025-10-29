<?php

namespace App\Http\Livewire\Promociones;

use Livewire\Component;

use App\Models\Promociones\zona;
use App\Models\Promociones\mediodepago;
use App\Models\Promociones\formadepago;
use App\Models\Promociones\ProductoPromocion;

class ConfiguracionesComponent extends Component
{
    public $Zonas, $TipoDeCompra, $MontoFijo, $PorcentajeDescuento, $TopePorTransaccion, $Periodos, $TopePorPeriodo, $TopePorTipoDePeriodo, $FormaDePago, $MedioDePago, $Requisito, $DíaDeLaSemana, $Moneda, $Retira, $Reintegro, $InformacionAdicional, $PeriodoDesde, $PeriodoHasta;
    public $titulo, $Listado=[];

    public $nombre_agregar,$direccion_agregar,$ubicaciongps_agregar,  $aplica_agregar;
    public $MostrarModal=false, $MostrarModalPromocion=false;

    public function render() {
        return view('livewire.promociones.configuraciones-component')->extends('layouts.sinadminlte');
    }

    public function CargarDatosModal($modulo) {
        switch($modulo) {
            case 'Zonas': $this->Listado = zona::all(); break;
            case 'FormaDePago': $this->Listado = FormaDePago::where('id','>',0)->select('NombreForma as nombre')->get(); break;
            case 'MedioDePago': $this->Listado = MedioDePago::where('id','>',0)->select('NombreMedio as nombre')->get();; break;
            case 'ListaDeProductos': $this->Listado = ProductoPromocion::where('id','>',0)->select('NombreProducto as nombre','AplicaSiNO as aplicasino')->get(); break;

            case 'Periodos': break;
            case 'TopePorPeriodo': break;
            case 'TopePorTipoDePeriodo': break;
            case 'Requisito': break;
            case 'DíaDeLaSemana': break;
            case 'Moneda': break;
            case 'Retira': break;
            case 'Reintegro': break;

            case 'TipoDeCompra': break;
            case 'PorcentajeDescuento': break;
            case 'TopePorTransaccion': break;
            case 'MontoFijo': break;
        }

        $this->titulo=$modulo;

        $this->AbrirModal();
        // $this->MostrarModal = !$this->MostrarModal;
        // dd($this->Listado);
    }

    public function CerrarModal() { $this->MostrarModal =false; }
    public function AbrirModal() { $this->MostrarModal =true; }
    public function CerrarModalPromociones() { $this->MostrarModalPromocion =false; }
    public function AbrirModalPromociones() {
        $this->Zonas = zona::all();


        $this->MostrarModalPromocion =true;
    }

    public function Agregar($modulo) {
        switch($modulo) {
            case 'Zonas': $a= zona::create(['nombre' => $this->nombre_agregar, 'direccion' => $this->direccion_agregar, 'ubicacionGPS' => $this->ubicaciongps_agregar]); break;
            case 'FormaDePago': $a= FormaDePago::create(['NombreForma' => $this->nombre_agregar]); break;
            case 'MedioDePago': $a= MedioDePago::create(['NombreMedio' => $this->nombre_agregar]); break;
            case 'ListaDeProductos': $a= ProductoPromocion::create(['NombreProducto' => $this->nombre_agregar,'AplicaSINO'=>$this->aplica_agregar]); break;
        }
        $this->CargarDatosModal($modulo);

        $this->reset('nombre_agregar','direccion_agregar','ubicaciongps_agregar','aplica_agregar');
    }

    public function AgregarPromocion() {

    }
}
