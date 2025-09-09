<?php

namespace App\Http\Livewire\Registro;

use Livewire\Component;
use App\Models\Condicioniva;
use App\Models\Elementos\ElementoVehiculo;
use App\Models\registroReguisitosTipotramite;
use App\Models\registroTipotramite;
use App\Models\resgistroAvaluosVehiculos;

class EstimadorComponent extends Component
{
    public $resumen, $datos_vehiculo, $seleccion_tramite, $forma_pago, $pago; 

    public $tramites, $tramite_seleccionado, $detalles, $precio_modificar, $cantidad_modificar, $total_modificar, $registro_id, $total, $tramite_descripcion;
    public $precio_agregar,$cantidad_agregar,$total_agregar, $descripcion_agregar;
    public $ModalAgregar=false, $ModalModificar=false;
    public $datos_tramite_validados=true, $datos_vehiculo_validados, $datos_solicitante_validados;

    public $listado, $descripcion, $modelo, $registro, $seleccionado;

    public function render()
    {
        $this->tramites = registroTipotramite::where('modulo','=','estimador')->get();
        $this->detalles = registroReguisitosTipotramite::where('tipotramite_id', $this->tramite_seleccionado)->get();
        return view('livewire.registro.estimador-component')->extends('layouts.sinadminlte');
    }

    public function BuscarDato() {
        if($this->modelo<>0 && strlen($this->descripcion)>3) {
            $this->listado = resgistroAvaluosVehiculos::where('anio'.$this->modelo,'<>',null)
            ->where('vehiculo','like','%'.$this->descripcion.'%')
            ->where('anio'.$this->modelo,'>', 0)
            ->select('id','vehiculo', 'anio'.$this->modelo .' as avaluo')
            ->orderby('vehiculo')
            ->get();
        }
    }

    public function CargarDatos($id) {
        $this->seleccionado = $id;
    }

    public function Calcular($param) { 
        if($param=="modificar") { 
            $this->total_modificar = $this->precio_modificar * $this->cantidad_modificar; 
        } else { 
            $this->total_agregar = $this->precio_agregar * $this->cantidad_agregar; 
        }
    }

    public function OpenModalAgregar() { $this->descripcion_agregar=$this->precio_agregar=$this->cantidad_agregar=$this->total_agregar=null; $this->ModalAgregar = !$this->ModalAgregar; }

    public function OpenModalModificar($precio,$cantidad,$id) {
        $this->ModalModificar = !$this->ModalModificar;
        $this->precio_modificar = $precio;
        $this->cantidad_modificar = $cantidad;
        $this->Calcular('modificar');
        $this->registro_id = $id;
    }

    public function ElegirTramite() {
        $this->tramites = registroTipotramite::find($this->tramite_seleccionado);
        if($this->tramite_seleccionado == 0 ) { 
            $this->tramite_descripcion = ""; 
        } else {
            $this->tramite_descripcion = $this->tramites->nombretramite;
            $this->detalles = registroReguisitosTipotramite::where('tipotramite_id','=',$this->tramite_seleccionado)->get();
            $this->total = registroReguisitosTipotramite::where('tipotramite_id', $this->tramite_seleccionado)
                ->selectRaw('SUM(precio * cantidad) as total')
                ->value('total');
        }
    }

    public function modificarValores() {    
        $a = registroReguisitosTipotramite::where('id', $this->registro_id)->update([
            'precio' => $this->precio_modificar,
            'cantidad' => $this->cantidad_modificar,
        ]);

    // Emitir evento o mostrar mensaje
    session()->flash('message', 'Valores actualizados correctamente');
    $this->OpenModalModificar(1,1,1);
}


public function eliminarvalores($id) {
    registroReguisitosTipotramite::where('id', $id)->delete();
    session()->flash('message', 'Registro eliminado');
}

    public function agregarValores() {
        registroReguisitosTipotramite::firstOrCreate([
            'descripcionrequisitotipotramite' => $this->descripcion_agregar,
            'precio'=> $this->precio_agregar,
            'cantidad'=> $this->cantidad_agregar,
            'tipotramite_id'=> $this->tramite_seleccionado,
            // 'empresa_id'=> 1,
        ]);
        
        session()->flash('message', 'Dato Agregado!.');
        $this->OpenModalAgregar();
    }
}
