<?php

namespace App\Http\Livewire\Imprenta;

use Livewire\Component;

use App\Models\Imprenta\ImprentaSistemaimpresion as sistema_impresion;
use App\Models\Imprenta\ImprentaPedido as Pedido;
use App\Models\Imprenta\ImprentaLado as lado;
use App\Models\Imprenta\ImprentaPapel as papel;
use App\Models\erp\Cliente;

use Livewire\WithFileUploads;

class EnviarComponent extends Component
{
    use WithFileUploads;
    
    public $cliente;
    public $nombre;
    public $telefono;
    public $direccion;
    public $dni;
    public $cuit;
    public $institucion;
    public $email;
    public $archivo;
    public $photo;
    public $cantidadhojas;
    public $tipodocumento;
    public $tamanopapel;
    public $tipodepapel;
    public $tipodeimpresion;
    public $frentedorso;
    public $cantidadejemplares=1;
    public $retiraenlocal;
    public $geoposicion;
    public $observaciones;
    public $costoaprox;

    public $open=false;

    public $sistemas, $lados, $gramajes, $PrecioEstimado;

    public function render()
    {
        $this->sistemas = sistema_impresion::where('activo',true)->select('id','sistema')->get();
        $this->lados = lado::where('activo',true)->select('id','lados')->get();
        $this->gramajes = papel::where('activo',true)->select('id','tamano_papel','gramaje')->get();

        return view('livewire.imprenta.enviar-component')->with('cantidadhojas')->extends('layouts.appimprenta');
    }

    public function save() {
        // $this->validate([
        //     'photo' => 'image|max:1024', // 1MB Max
        // ]);

        $this->validate([
            'nombre' => 'required',
            'telefono' => 'required|integer',
            'direccion' => 'required',
            'dni' => 'required|integer',
            'cuit' => 'required|integer',
            'institucion' => 'required',
            'email' => 'required',
            'tipodepapel' => 'required',
            'frentedorso' => 'required',
            'cantidadejemplares' => 'required|integer',
            'tipodeimpresion' => 'required',
            
            'cantidadhojas' => 'required|integer',


        ]);

        // Buscar cliente existente por DNI o Email
        $this->cliente = Cliente::where('dni', $this->dni)
                            ->orWhere('email', $this->email)
                            ->first();

        // Si no existe, crear nuevo cliente y obtener su ID
        if (!$this->cliente) {
            $this->cliente = Cliente::create([
                'nombre' => $this->nombre,
                'dni' => $this->dni,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'geoposicion' => $this->geoposicion,
                'organizacion' => ''
            ]);
        }

        $pedidos = Pedido::create([
            'cliente_id' => $this->cliente->id, // $this->cliente,
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'dni' => $this->dni,
            'cuit' => $this->cuit,
            'institucion' => $this->institucion,
            'email' => $this->email,
            'estado_id' => 1,
            'archivo' => $this->photo->store('public/photos'),
            'cantidadhojas' => $this->cantidadhojas,
            'tipodocumento' => 1, //$this->tipodocumento,
            'tipodeimpresion' => $this->tipodeimpresion,
            'tamanopapel' => $this->tamanopapel,
            'tipodepapel' => $this->tipodepapel,
            'frentedorso' => $this->frentedorso,
            'cantidadejemplares' => $this->cantidadejemplares,
            'retiraenlocal' => 1, // $this->retiraenlocal,
            'geoposicion' => 1, //$this->geoposicion,
            'observaciones' => $this->observaciones,
            'costoaprox' =>$this->PrecioEstimado,
            'created_at' => now(),
        ]);
        if($pedidos) $this->open = true;
        session()->flash('message', 'Pedido Enviado!!!');
        
        $this->reset('archivo','photo','cantidadhojas','tipodocumento','tamanopapel','tipodepapel','tipodeimpresion','frentedorso','cantidadejemplares','retiraenlocal','geoposicion','observaciones','costoaprox');
    }

    public function EstimarPrecio() {
        // dd($this->tipodepapel);
        // dd($this->gramajes['precio']);
        if($this->tipodepapel<>0 && $this->frentedorso<>0 and $this->tipodeimpresion<>0) {
            if(is_null($this->cantidadhojas) || $this->cantidadhojas=='') $this->cantidadhojas=0;
            if(is_null($this->cantidadejemplares) || $this->cantidadejemplares=='') $this->cantidadejemplares=0;
            
            $vTipoImpresion = is_null($this->tipodeimpresion) ? 0 : sistema_impresion::where('id','=',$this->tipodeimpresion)->get('factor')[0]['factor'];    //factor
            $vLados = is_null($this->frentedorso) ? 0: lado::where('id','=',$this->frentedorso)->get('factor')[0]['factor'];    //factor
            $vTipoPapel = is_null($this->tipodepapel) ? 0 : papel::where('id','=',$this->tipodepapel)->get('precio')[0]['precio'];   // precio

            // dd($this->tipodeimpresion);
            // dd($vTipoPapel);

            $this->PrecioEstimado =  $vTipoPapel; // Tipo de papel
            $this->PrecioEstimado = $this->PrecioEstimado * $this->cantidadhojas; // Cantidad de Hojas
            $this->PrecioEstimado = $this->PrecioEstimado * $this->cantidadejemplares; // Cant. Copias
            $this->PrecioEstimado = $this->PrecioEstimado * $vTipoImpresion; // Tipo de imp B/N
            $this->PrecioEstimado = $this->PrecioEstimado * $vLados; // Frente/Dorso
        } else {
            $this->PrecioEstimado = 0;
        }
    }
}
