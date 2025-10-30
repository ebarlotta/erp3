<?php

namespace App\Http\Livewire\Promociones;

use Livewire\Component;

use App\Models\Promociones\zona;
use App\Models\Promociones\mediodepago;
use App\Models\Promociones\formadepago;
use App\Models\Promociones\ProductoPromocion;
use App\Models\Promociones\promocion;
use App\Models\Promociones\TipoDeCompra;
// use App\Models\Promociones\ListaProductosPromocion;
use App\Models\Promociones\listadeproducto;


class ConfiguracionesComponent extends Component
{
    public $Zonas, $TipoDeCompra, $ListaDeProductos, $MontoFijo, $PorcentajeDescuento, $TopePorTransaccion, $Periodos, $TopePorPeriodo, $TopePorTipoDePeriodo, $FormaDePago, $MedioDePago, $Requisito, $DíaDeLaSemana, $Moneda, $Retira, $Reintegro, $InformacionAdicional, $PeriodoDesde, $PeriodoHasta;
    public $titulo, $Listado=[];

    public $nombre_agregar,$direccion_agregar,$ubicaciongps_agregar,  $aplica_agregar;
    public $MostrarModal=false, $MostrarModalPromocion=false;

    public function render() {

        $this->Zonas = zona::all();
        $this->FormaDePago = FormaDePago::where('id','>',0)->select('NombreForma as nombre')->get();
        $this->MedioDePago = MedioDePago::where('id','>',0)->select('NombreMedio as nombre')->get();
        $this->ListaDeProductos = listadeproducto::where('id','>',0)->select('NombreProducto as nombre','AplicaSiNO as aplicasino')->get();
        $this->TipoDeCompra = TipoDeCompra::where('id','>',0)->select('TipoDeCompra')->distinct()->get();
        
        return view('livewire.promociones.configuraciones-component')->extends('layouts.sinadminlte');
    }

    public function CargarDatosModal($modulo) {
        switch($modulo) {
            case 'Zonas': $this->Listado = zona::all(); break;
            case 'FormaDePago': $this->Listado = FormaDePago::where('id','>',0)->select('NombreForma as nombre')->get(); break;
            case 'MedioDePago': $this->Listado = MedioDePago::where('id','>',0)->select('NombreMedio as nombre')->get();; break;
            case 'ListaDeProductos': $this->Listado = listadeproducto::where('id','>',0)->select('NombreProducto as nombre','AplicaSiNO as aplicasino')->get(); break;
            case 'TipoDeCompra': $this->Listado = TipoDeCompra::where('id','>',0)->select('TipoDeCompra')->distinct()->get(); break;


            case 'Periodos': break;
            case 'TopePorPeriodo': break;
            case 'TopePorTipoDePeriodo': break;
            case 'Requisito': break;
            case 'DíaDeLaSemana': break;
            case 'Moneda': break;
            case 'Retira': break;
            case 'Reintegro': break;

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
            case 'ListaDeProductos': $a= listadeproducto::create(['NombreProducto' => $this->nombre_agregar,'AplicaSINO'=> empty($this->aplica_agregar) ? 1 : $this->aplica_agregar ]); break;
            case 'TipoDeCompra': $a= TipoDeCompra::create(['TipoDeCompra' => $this->nombre_agregar]); break;
        }
        $this->CargarDatosModal($modulo);

        $this->reset('nombre_agregar','direccion_agregar','ubicaciongps_agregar','aplica_agregar');
    }

    public function AgregarPromocion() {

    }
}
