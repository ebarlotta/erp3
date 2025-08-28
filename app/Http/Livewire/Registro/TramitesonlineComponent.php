<?php

namespace App\Http\Livewire\Registro;

use App\Models\Condicioniva;
use App\Models\erp\Cliente;
use Livewire\Component;
use App\Models\Elementos\ElementoVehiculo;
use App\Models\registroTipotramite;
use App\Models\registroReguisitosTipotramite;

class TramitesonlineComponent extends Component
{
    public $cuil, $tramiteid, $detalles, $total, $estado_inicial=1, $ivas, $chasis, $datos_final;

    public $datos_solicitante_validados, $solicitante, $necesita_agregar_solicitante, $agregar_apellido, $agregar_nombre, $agregar_email, $agregar_celular, $agregar_direccion, $agregarivaid, $apellido, $nombre;

    public $patente, $vehiculo, $datos_vehiculo_validados, $necesita_agregar_vehiculo, $marca, $modelo, $ano, $agregar_modelo, $agregar_marca ,$agregar_ano;

    public $resumen, $datos_solicitante, $datos_vehiculo=0, $seleccion_tramite=1, $forma_pago, $pago, $seleccionar_turno, $datos_turno_validados;

    public $datos_tramite_validados, $tramite_descripcion, $tramites;

    public $descripciontramite, $requisitos, $tramite_seleccionado;

    public $diaSeleccionado, $mes, $anio;

    public function render()
    {
        $this->ivas = Condicioniva::where('activo','=',1)->get();
        $this->tramites = registroTipotramite::where('modulo','=','tramites')->get();
        return view('livewire.registro.tramitesonline-component')->extends('layouts.adminlte');
    }

    public function Mostrar($item) {
        switch ($item){
            case 'inicial':             $this->estado_inicial=0; $this->seleccionar_turno=0; $this->datos_solicitante=0; $this->datos_vehiculo=0; $this->seleccion_tramite=1; $this->forma_pago=0; $this->pago=0; $this->datos_final=0; break;
            case 'datos_vehiculo':      $this->estado_inicial=0; $this->seleccionar_turno=0; $this->datos_solicitante=0; $this->datos_vehiculo=1; $this->seleccion_tramite=0; $this->forma_pago=0; $this->pago=0; $this->datos_final=0; break;
            case 'datos_solicitante':   $this->estado_inicial=0; $this->seleccionar_turno=0; $this->datos_solicitante=1; $this->datos_vehiculo=0; $this->seleccion_tramite=0; $this->forma_pago=0; $this->pago=0; $this->datos_final=0; break;
            case 'seleccionar_turno':   $this->estado_inicial=0; $this->seleccionar_turno=1; $this->datos_solicitante=0; $this->datos_vehiculo=0; $this->seleccion_tramite=0; $this->forma_pago=0; $this->pago=0; $this->datos_final=0; break;
            case 'forma_pago':          $this->estado_inicial=0; $this->seleccionar_turno=0; $this->datos_solicitante=0; $this->datos_vehiculo=0; $this->seleccion_tramite=0; $this->forma_pago=1; $this->pago=0; $this->datos_final=0; break;
            case 'datos_final':         $this->estado_inicial=0; $this->seleccionar_turno=0; $this->datos_solicitante=0; $this->datos_vehiculo=0; $this->seleccion_tramite=0; $this->forma_pago=0; $this->pago=0; $this->datos_final=1; break;
            case 'pago':                $this->estado_inicial=0; $this->seleccionar_turno=0; $this->datos_solicitante=0; $this->datos_vehiculo=0; $this->seleccion_tramite=0; $this->forma_pago=0; $this->pago=1; $this->datos_final=0; break;
        }
    }

    public function cambiar_tramite() {
        //  $this->$tramite_seleccionado = $tramite_id;
        // dd($this->tramite_seleccionado);
        if($this->seleccion_tramite <> 0) {
            $tramite = registroTipotramite::find($this->seleccion_tramite);
            $this->descripciontramite = $tramite->descripciontramite;
            $this->requisitos = registroReguisitosTipotramite::where('tipotramite_id','=',$this->seleccion_tramite)->get();

            $this->datos_tramite_validados = 1;
            $this->descripciontramite =  $tramite->nombretramite; // registroTipotramite::find($this->seleccion_tramite)->get('descripciontramite');
            // $this->datos_vehiculo = 1;
        } else {
            $this->datos_vehiculo = 0;
            $this->datos_tramite_validados = 0;
        }
    }

    public function Agregar_Solicitante() {
        $this->validate([
            'agregar_apellido' => 'required',
            'agregar_nombre' => 'required',
            'agregar_direccion' => 'required',
            'agregar_email' => 'required|email',
            'agregar_celular' => 'required',
            'agregarivaid' => 'required|integer|min:1',
        ], [
            'agregar_apellido.required' => 'El Apellido es obligatorio',
            'agregar_nombre.required' => 'La Nombre es obligatoria',
            'agregar_direccion.required' => 'La dirección es obligatoria',
            'agregar_email.required' => 'El correo electrónico es obligatorio',
            'agregar_celular.required' => 'El teléfono es obligatorio',
            'agregarivaid.required' => 'La condición de iva es obligatoria',
            'agregarivaid.min' => 'Debe seleccionar una condición de iva, es obligatoria',
        ]);
        Cliente::firstOrCreate([
            'name' => $this->agregar_apellido . ', ' . $this->agregar_nombre,
            'cuil'=> $this->cuil,
            'direccion'=> $this->agregar_direccion,
            'email'=> $this->agregar_email,
            'telefono'=> $this->agregar_celular,
            'iva_id'=> $this->agregarivaid,
            'empresa_id'=> 1,
            // 'empresa_id'=> session('empresa_id'),
        ]);

        $this->BuscarSolicitante();

        session()->flash('message', 'Solicitante Agregado!.');
        $this->necesita_agregar_solicitante = 0;
    }

    public function BuscarSolicitante() {
        $this->validate([
            'cuil' => 'numeric|digits:11',
        ]);
        $this->reset('apellido','nombre','agregar_apellido','agregar_nombre','agregar_email','agregar_celular','agregar_direccion');
        $this->agregarivaid = 0;
        $this->solicitante = Cliente::where('cuil','=',$this->cuil)->first();
        if($this->solicitante) {
            $this->datos_solicitante_validados = 1;
            $partes = explode(',', $this->solicitante->name);
            $this->apellido = trim($partes[0]);
            $this->nombre = isset($partes[1]) ? trim($partes[1]) : '';
            $this->necesita_agregar_solicitante = 0;
        }
        else {
            $this->datos_solicitante_validados = 0; // Oculta el cuadro de datos del solicitante
            $this->necesita_agregar_solicitante = 1;
            session()->flash('solicitante', 'No se encontraron los datos del solicitante, deberá agregarlos para poder continuar!.');
        }
    }

    public function Ocultar_Solicitante() { $this->necesita_agregar_solicitante = 0; }
    public function Ocultar_Vehículo() { $this->necesita_agregar_vehiculo = 0; }

    public function BuscarPatente() {
        $this->reset('marca','modelo','ano');
        $this->reset('agregar_modelo','agregar_marca','agregar_ano');
        
        $this->validate([
            'patente' => [
                'required',
                // 'regex:/^[A-Z0-9]{6}$/'
            ],
            'chasis' => 'required',
        ], [
            'chasis.required' => 'El Número de Chasis es obligatorio',
            'patente.required' => 'El Número de Patente es obligatorio',
        ]);
            
            // dd('ento');
        $this->vehiculo = ElementoVehiculo::where('patente','like','%'.$this->patente.'%')->first();
        if($this->vehiculo) {
            $this->datos_vehiculo_validados = 1;

            $this->marca = $this->vehiculo->marca;
            $this->modelo = $this->vehiculo->modelo;
            $this->ano = $this->vehiculo->ano;
            $this->necesita_agregar_vehiculo = 0;
        }
        else {
            $this->marca=null; $this->modelo=null; $this->ano=null;
            $this->datos_vehiculo_validados = 0; // Oculta el cuadro de datos del solicitante
            $this->necesita_agregar_vehiculo = 1;
            session()->flash('vehiculo', 'No se encontraron los datos del vehículo, deberá agregarlos para poder continuar!.');
        }
    }

    public function Agregar_Vehiculo() {
        $this->validate([
            'agregar_modelo' => 'required',
            'agregar_marca' => 'required',
            'agregar_ano' => 'required',
        ], [
            'agregar_modelo.required' => 'El modelo es obligatorio',
            'agregar_marca.required' => 'La marca es obligatoria',
            'agregar_ano.required' => 'El año del vehículo es obligatorio',
        ]);
        ElementoVehiculo::firstOrCreate([
            'patente' => $this->patente,
            'modelo'=> $this->agregar_modelo,
            'marca'=> $this->agregar_marca,
            'ano'=> $this->agregar_ano,
            'elemento_id'=> 1,
        ]);

        $this->BuscarPatente();

        session()->flash('messageVehículo', 'Vehículo Agregado!.');
        $this->necesita_agregar_vehiculo = 0;
    }

    public function seleccionarDia($dia)
    {          
        $mesHoy = date('n');
        $anioHoy = date('Y');
        $this->diaSeleccionado = str_pad($dia, 2, "0", STR_PAD_LEFT) . '/' .str_pad($mesHoy, 2, "0", STR_PAD_LEFT) . '/' . $anioHoy;
        if($this->diaSeleccionado > date('d/m/Y')) { $this->datos_turno_validados = 1; } else { $this->datos_turno_validados = 0; }

    }

     public function cambiarMes($incremento)
    {
        $nuevaFecha = strtotime("{$this->anio}-{$this->mes}-01 + {$incremento} months");
        $this->mes = date('n', $nuevaFecha);
        $this->anio = date('Y', $nuevaFecha);
        $this->generarCalendario();
        $this->diaSeleccionado = null;
    }
    
}
