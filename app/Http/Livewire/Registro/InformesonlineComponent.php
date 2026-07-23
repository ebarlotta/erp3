<?php

namespace App\Http\Livewire\Registro;

use App\Models\erp\Cliente;
use Livewire\Component;
use App\Models\Condicioniva;
use App\Models\Elementos\ElementoVehiculo;
use App\Models\registroReguisitosTipotramite;
use App\Models\registroTipotramite;
use App\Services\MercadoPagoService;
use Illuminate\Http\Request;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Preference\PreferenceClient;
// SDK de Mercado Pago
use MercadoPago\MercadoPagoConfig;
use App\Models\registroPagos;

use MercadoPago\Resources\Preference;


// Agrega credenciales

class InformesonlineComponent extends Component
{
    public $cuil, $tramiteid, $detalles, $total, $estado_inicial=1, $ivas;
    public $datos_solicitante_validados, $solicitante, $necesita_agregar_solicitante, $agregar_apellido, $agregar_nombre, $agregar_email, $agregar_celular, $agregar_direccion, $agregarivaid, $apellido, $nombre;
    public $patente, $vehiculo, $datos_vehiculo_validados, $necesita_agregar_vehiculo, $marca, $modelo, $ano, $agregar_modelo, $agregar_marca ,$agregar_ano;
    public $resumen, $datos_solicitante, $datos_vehiculo, $seleccion_tramite, $forma_pago, $pago; 
    public $datos_tramite_validados, $tramite_descripcion, $informes;

    public $OpenModal=false, $preference, $preferenceId;
    public $loading,$error,$publicKey;

    public function render() {        
        $this->ivas = Condicioniva::where('activo','=',1)->get();
        $this->informes = registroTipotramite::where('modulo','=','informes')->get();
        return view('livewire.registro.informesonline-component')->extends('layouts.sinadminlte');
    }

    public function __construct() {
        // MercadoPagoConfig::setAccessToken(config('mercadopago.MERCADOPAGO_ACCESS_TOKEN_TEST'));
        // $this->publicKey = config('mercadopago.MERCADOPAGO_PUBLIC_KEY_TEST');
            MercadoPagoConfig::setAccessToken(config('mercadopago.MERCADOPAGO_ACCESS_TOKEN'));
            $this->publicKey = config('mercadopago.MERCADOPAGO_PUBLIC_KEY');
    }
    
    public function OpenModalQR() {
        $this->OpenModal = !$this->OpenModal;
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

    public function ElegirTramite() {
        $this->informes = registroTipotramite::find($this->tramiteid);

        if($this->tramiteid == 0 ) { 
            $this->datos_tramite_validados=0; $this->tramite_descripcion = ""; 
        } else {
            $this->datos_tramite_validados=1; 
            $this->tramite_descripcion = $this->informes->nombretramite;
            $this->detalles = registroReguisitosTipotramite::where('tipotramite_id','=',$this->tramiteid)->get();
            $this->total = registroReguisitosTipotramite::where('tipotramite_id', $this->tramiteid)
                ->selectRaw('SUM(precio * cantidad) as total')
                ->value('total');
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
                'regex:/^[A-Z0-9]{6}$/'
            ]]
            ,['required'=>'La patente es obligatoria'
        ]);

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

    public function Pagar() {
        $client = new PreferenceClient();
        $preference = $client->create([
            "items"=> array(
                array(
                "title" => "Tram. Serv. Administrativos",
                "quantity" => 1,
                "unit_price" => 10,
                // "unit_price" => $this->total,
                )
            ),
            "back_urls"=> array(
                // "success" => "https://ecosystems.ar/registro/success",
                // "success" => "https://localhost:8000/informes-online/",
                "success" => "http://localhost:8000/registro/success/",
                "failure" => "http://localhost:8000/informes-online",
                "pending" => "https://localhost:8000/pending"
            ),
            // "auto_return" => "approved",
            "external_reference" => $this->cuil .'-' . $this->patente .'-' . $this->tramite_descripcion.'Venta Online'
        ]);

    $this->preferenceId = $preference->id;

    return $this->redirect($preference->init_point);

}

public function success(Request $request)
{

     // Acceder a los parámetros via $request
        $collectionId = $request->input('collection_id');
        $collectionStatus = $request->input('collection_status');
        $paymentId = $request->input('payment_id');
        $status = $request->input('status');
        $externalReference = $request->input('external_reference');
        $preferenceId = $request->input('preference_id');
    
    // $paymentType = $request->input('payment_type');
    // $merchantOrderId = $request->input('merchant_order_id');
    // $siteId = $request->input('site_id');
    // $processingMode = $request->input('processing_mode');
    // $merchantAccountId = $request->input('merchant_account_id');
    if($collectionStatus=="approved" && $status=="approved") {
    // if ($request->has('collection_id')) {
        // dd($request);
        // dd('pepepepe');
        // Guardar los datos de la transacción
        // $paymentData = $request->all();
        
        // Procesar el pago (guardar en BD, etc.)
        
        $this->processPayment($collectionId,$collectionStatus,$paymentId,$status,$externalReference,$preferenceId );

        return view('livewire.registro.success', compact('paymentId', 'status','preferenceId'));
        
    } else {
        return view('livewire.registro.error', compact('paymentId', 'status','preferenceId'));
    }
    
    // dd($_POST);
    // $payment_id = $request->get('payment_id');
    // $status = $request->get('status');
    // $external_reference = $request->get('external_reference');
    // $otro = $this->preferenceId;
    // dd($this->preferenceId);
    // return view('livewire.registro.success', compact('payment_id', 'status','preferenceId'));


    
    // Actualizar tu orden como aprobada
    // return view('livewire.registro.success', compact('payment_id', 'status'));
}

public function processPayment($collectionId,$collectionStatus,$paymentId,$status,$externalReference,$preferenceId ) {
    registroPagos::firstOrCreate([
            'collectionId' => $collectionId,
            'collectionStatus'=> $collectionStatus,
            'paymentId'=> $paymentId,
            'status'=> $status,
            'externalReference'=> $externalReference,
            'preferenceId'=> $preferenceId,
            'total'=> $this->total,
            // 'empresa_id'=> session('empresa_id'),
        ]);
}

public function failure(Request $request)
{
    return view('payment.failure');
}

public function pending(Request $request)
{
    return view('payment.pending');
}

public function webhook(Request $request)
{
    // MercadoPago envía notificaciones POST aquí
    $data = $request->all();
    
    if ($data['type'] === 'payment') {
        $payment = MercadoPago\Payment::find_by_id($data['data']['id']);
        
        // Actualizar el estado del pago en tu base de datos
        $this->updateOrderStatus($payment->external_reference, $payment->status);
    }
    
    return response()->json(['status' => 'ok']);
}







    function ValidateCUITCUIL($cuit) {
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
