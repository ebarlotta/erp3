<?php

namespace App\Http\Livewire\Registro;

use App\Models\erp\Cliente;
use Livewire\Component;
use App\Models\Condicioniva;
use App\Models\Elementos\ElementoVehiculo;

class InformesonlineComponent extends Component
{
    public $cuil, $tramite, $estado_inicial=1, $ivas;

    public $datos_solicitante_validados, $solicitante, $necesita_agregar_solicitante, $agregar_apellido, $agregar_nombre, $agregar_email, $agregar_celular, $agregar_direccion, $agregar_iva_id, $apellido, $nombre;

    public $patente, $vehiculo, $datos_vehiculo_validados, $necesita_agregar_vehiculo, $marca, $modelo, $ano, $agregar_modelo, $agregar_marca ,$agregar_ano;

    public $resumen, $datos_solicitante, $datos_vehiculo, $seleccion_tramite, $forma_pago, $pago; 

    public function render()
    {
        $this->ivas = Condicioniva::where('activo','=',1)->get();
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

    public function Agregar_Solicitante() {

        $this->validate([
            'agregar_apellido' => 'required',
            'agregar_nombre' => 'required',
            'agregar_direccion' => 'required',
            'agregar_email' => 'required|email',
            'agregar_celular' => 'required',
            'agregar_iva_id' => 'required',
        ]);
        Cliente::firstOrCreate([
            'name' => $this->agregar_apellido . ', ' . $this->agregar_nombre,
            'cuil'=> $this->cuil,
            'direccion'=> $this->agregar_direccion,
            'email'=> $this->agregar_email,
            'telefono'=> $this->agregar_celular,
            'iva_id'=> $this->agregar_iva_id,
            'empresa_id'=> 1,
            // 'empresa_id'=> session('empresa_id'),
        ]);
        session()->flash('message', 'Solicitante Agregado!.');
        $this->necesita_agregar_solicitante = 0;
    }

    public function BuscarSolicitante() {
        $this->validate([
            'cuil' => 'numeric|digits:11',
        ]);
        $this->reset('apellido','nombre','agregar_apellido','agregar_nombre','agregar_email','agregar_celular','agregar_direccion');
        $this->agregar_iva_id = 0;
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
        ]);
        ElementoVehiculo::firstOrCreate([
            'patente' => $this->patente,
            'modelo'=> $this->agregar_modelo,
            'marca'=> $this->agregar_marca,
            'ano'=> $this->agregar_ano,
            'elemento_id'=> 1,
        ]);
        session()->flash('messageVehículo', 'Vehículo Agregado!.');
        $this->necesita_agregar_vehiculo = 0;
    }
    
    function ValidateCUITCUIL($cuit)
	{
		if (strlen($cuit) != 13) return false;
		
		$rv = false;
		$resultado = 0;
		$cuit_nro = str_replace("-", "", $cuit);
		
		$codes = "6789456789";
		$cuit_long = intVal($cuit_nro);
		$verificador = intVal($cuit_nro[strlen($cuit_nro)-1]);
        
		$x = 0;
		
		while ($x < 10)
		{
			$digitoValidador = intVal(substr($codes, $x, 1));
			$digito = intVal(substr($cuit_nro, $x, 1));
			$digitoValidacion = $digitoValidador * $digito;
			$resultado += $digitoValidacion;
			$x++;
		}
		$resultado = intVal($resultado) % 11;
		$rv = $resultado == $verificador;
		return $rv;
	}
}
