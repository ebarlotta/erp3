<?php

namespace App\Http\Livewire\Imprenta;

use Livewire\Component;

use App\Models\Imprenta\ImprentaEstados as Estado;
use App\Models\Imprenta\ImprentaPapel as Papel;
use App\Models\Imprenta\ImprentaPedido as Pedido;
use App\Models\Imprenta\ImprentaSistemaimpresion as sistema_impresion;

class PedidoComponent extends Component
{
    public $pedidos, $CambioEstado, $estado_id, $estados_id, $estados, $pedido_id, $pedido_name;

    public $nombre, $telefono, $direccion, $dni, $cuit, $institucion, $email, $cantidadhojas, $tipodeimpresion, $tamanopapel, $tipodepapel, $frentedorso, $cantidadejemplares, $retiraenlocal, $lugardeentrega, $geoposicion, $costoaprox;

    public $open=false, $datos=false;

    public function render()
    {
        $this->estados = Estado::all();
        $this->pedidos = Pedido::orderby('created_at','DESC')
        ->where('mostrar',1)
        ->get();

        return view('livewire.imprenta.pedido-component')->extends('layouts.appimprenta');
        return view('livewire.imprenta.pedido-component')->extends('layouts.app');
    }
    public function CargarEstado($id) {
        $this->open = true;
        $pedido = Pedido::find($id);
        // $pedido = Pedido::find($this->pedido_id);
        $this->pedido_id = $id;
        // dd($pedido);
        $this->pedido_name = $pedido->nombre;
        // $pedido = Pedido::find($id);
        // $pedido->pedido_id = $pedido->estado_id;
        // $this->MostrarCambioEstado();
    }
    
    public function CargarDatos($id) {
        $this->datos = true;
        $pedido = Pedido::find($id);
        $this->nombre = $pedido->nombre;
        $this->telefono = $pedido->telefono;
        $this->direccion = $pedido->direccion;
        $this->dni = $pedido->dni;
        $this->cuit = $pedido->cuit;
        $this->institucion = $pedido->institucion;
        $this->email = $pedido->email;
        $this->cantidadhojas = $pedido->cantidadhojas;
        $this->tipodeimpresion = sistema_impresion::find($pedido->tipodeimpresion)->get()[0]['sistema'];
        // $this->tamanopapel = $pedido->tamanopapel;
        $papel = papel::find($pedido->tipodepapel)->get();
        $this->tipodepapel = $papel[0]->gramaje .' - '. $papel[0]->tamano_papel;
        $this->frentedorso = ($pedido->frentedorso==1) ? 'Simple Faz' : 'Doble Faz';
        $this->cantidadejemplares = $pedido->cantidadejemplares;
        $this->retiraenlocal = $pedido->retiraenlocal ? 'Retira en local' : 'Entregar el domicilio';
        $this->lugardeentrega = $pedido->lugardeentrega;
        $this->geoposicion = $pedido->geoposicion;
        $this->costoaprox = $pedido->costoaprox;
    
    }
    
    public function CambiarEstado() {
        $estado = Estado::where('name','=',$this->estados_id)->get();
    // dd($estado);
        $pedido = Pedido::find($this->pedido_id);
        $pedido->estado_id = $estado[0]->id;
        $pedido->save();
        $this->OcultarCambioEstado();
    
        $this->open=false;
    }
    
    public function MostrarCambioEstado() { $this->CambioEstado = true; }
    public function OcultarCambioEstado() { $this->open=false; $this->CambioEstado = false;  }
    public function OcultarDatos() { $this->datos=false; }
    
        // public function MostrarSoyCliente() { $this->soycliente = true; }
        // public function OcultarSoyCliente() { $this->soycliente = false; }
    
        // public function MostrarPrimeraVez() { $this->primeravez = true; }
        // public function OcultarPrimeraVez() { $this->primeravez = false; }
    
        // public function MostrarPrincipal() { $this->principal = true; }
        // public function OcultarPrincipal() { $this->principal = false; }
    
        public function descargar($nombreArchivo)
        {
            $rutaArchivo = storage_path('storage/'.$nombreArchivo); //'app/public/' .
        
            if (!file_exists($rutaArchivo)) {
                abort(404, 'El archivo no existe.');
            }
        
            return response()->download($rutaArchivo);
        }
    
        public function EnviarBaul($pedido_id) {
            $pedido = Pedido::find($pedido_id);
            $pedido->mostrar = 0;
            $pedido->save();
            // $pedido = Pedido::find($pedido_id)->update(['mostrar'=>0]);
        }
    
}

