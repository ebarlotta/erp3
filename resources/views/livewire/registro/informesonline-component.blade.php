<div>
<main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <div id="cuerpo" class=" pt-4" >
            <h1 class="titulo1">Obtener Informe Web</h1>
            <label class="text-muted mb-3">Completá los datos personales y de contacto del solicitante.</label>

            {{-- Resúmen --}}
            {{-- ======= --}}
            @if($datos_solicitante || $datos_vehiculo || $seleccion_tramite || $forma_pago)
                <div class="form-group tarjeta-gris">            
                    <div>
                        <div class="panel panel-info hidden-xs ng-scope" style="margin-bottom: 20px;" ng-if="resumenCtrl.solicitud.codigoTramite || resumenCtrl.solicitud.solicitante || resumenCtrl.solicitud. vehiculo || resumenCtrl.solicitud.turno || resumenCtrl.solicitud.tipoTramite">
                            <div class="panel-body">
                                <table class="table table-striped margin-bottom-no">
                                    <tbody>
                                        <tr>
                                            <td colspan="8">
                                                <div class="d-flex flex">
                                                    <div class="media-left" style="margin-right: 13px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="26" height="26" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                                                    </div>
                                                    <label class="titulo_card text-uppercase blue-300"> Resumen de la Solicitud</label>
                                                </div>
                                            </td>
                                        </tr>
                                        @if($datos_vehiculo_validados)
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Solicitante</td><td colspan="3">{{ $apellido }}, {{ $nombre }}</td>
                                                <td class="text-muted text-right" style="width: 15%">CUIL / CUIT</td><td>{{ $cuil }} </td>
                                                <td class="text-muted text-right" style="width: 15%">Email</td><td colspan="3">{{ $solicitante['email'] }} </td>
                                            </tr>
                                        @endif
                                        @if($datos_vehiculo_validados)
                                            <tr>
                                                <td class="text-muted text-right" style="width: 15%"> Patente:</td><td colspan="3"> {{ $patente }} </td>
                                                <td class="text-muted text-right" style="width: 15%"> Trámite:</td><td colspan="3"> {{ $solicitante['email'] }} </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!--TRAMITE-->
            @if($datos_solicitante || $estado_inicial)
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex flex-wrap">
                        <div class="form-group col-12 col-md-6">
                            <h2 class="titulo1">Datos del solicitante</h2>
                            <label class="titulo_card" for="codigoTramite">CUIL / CUIT</label>
                            <input class="form-control texto" type="text" tooltip="CUIL / CUIT" wire:model="cuil" id="cuil" maxlength="11" onkeypress="return soloNumeros(event)">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <p class="text-muted">Ingresa el CUIL / CUIT sin espacios ni guiones.</p>

                            <button type="submit" class="btn btn-info boton-azul mr-3" wire:click="BuscarSolicitante();">Buscar Solicitante&nbsp; 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>

                            @if (session()->has('solicitante'))
                                <div class="bg-yellow-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3 mr-3" role="alert">
                                    <div class="flex">
                                        <div>
                                            <p class="text-xm bg-lightgreen">{{ session('solicitante') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if($datos_solicitante_validados)
                            <div class="col-12 col-md-6 tarjeta-verde">
                                <label class="titulo_card" style="margin-bottom: 20px">Detalles del solicitante</label><br>
                                <div style="width: 100%">
                                    <p class="flex">Apellido<input class="form-control ml-3" type="text" value="{{ $apellido }}" disabled></p>
                                    <p class="flex">Nombre<input class="form-control ml-3" type="text" value="{{ $nombre }}" disabled></p>
                                    <p class="flex">Email<input class="form-control ml-3" type="text" value="{{ $solicitante['email'] }}" disabled></p>
                                    <p class="flex">Celular<input class="form-control ml-3" type="text" value="{{ $solicitante['telefono'] }}" disabled></p>
                                    <p class="flex">Dirección<input class="form-control ml-3" type="text" value="{{$solicitante['direccion']}}" disabled></p>
                                </div>                                
                            </div>
                        @endif
                        @if($necesita_agregar_solicitante)
                            <div class="col-12 col-md-6 tarjeta-verde">
                                <label class="titulo_card mb-3">Detalles del solicitante</label><br>
                                <div style="width: 100%">
                                    <p class="flex">Apellido<input class="form-control ml-3" type="text" wire:model="agregar_apellido">@error('agregar_apellido')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Nombre<input class="form-control ml-3" type="text" wire:model="agregar_nombre"></p>@error('agregar_nombre')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Email<input class="form-control ml-3" type="text" wire:model="agregar_email"></p>@error('agregar_email')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Celular<input class="form-control ml-3" type="text" wire:model="agregar_celular" id="agregar_celular" maxlength="11" onkeypress="return soloNumeros(event)"></p>@error('agregar_celular')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Dirección<input class="form-control ml-3" type="text" wire:model="agregar_direccion"></p>@error('agregar_direccion')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex w-100" style="justify-content: flex-start;">Condición iva
                                        <select class="form-control" wire:model="agregar_iva_id" style="width: 96%;">
                                            <option value="0">--- Seleccione una opción ---</option>
                                            @foreach ($ivas as $iva)
                                                <option value="{{ $iva->id }}">{{ $iva->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        @error('agregar_iva_id')<p class="error-message">{{ $message }}</p>@enderror</p>

                                        @if (session()->has('message'))
                                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                                <div class="flex">
                                                    <div>
                                                        <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </p>
                                </div>
                                <div style="width: 100%; display: flex; justify-content: space-around;">
                                    <input class="btn btn-info btn-warning" type="button" value="Guardar" wire:click="Agregar_Solicitante()">
                                    <input class="btn btn-info boton-azul" type="button" value="Cerrar" wire:click="Ocultar_Solicitante();">
                                </div>
                            </div>
                        @endif
                    </div>

                    @if($datos_solicitante_validados)
                        <div class="tarjeta-celeste">
                            <div style="margin-right: 13px; margin-left:-20px">
                                <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="56" height="56" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                            </div>
                            <div class="media-body">
                                <h4 class="titulo2"><b>¿Los datos del solicitante son correctos?</b></h4>
                                <p class="text-muted">Para confirmar que los datos son correctos, presioná CONTINUAR;<br>si querés corregir algunos de los campos solicitados, presioná MODIFICAR DATOS y realizá nuevamente la carga.</p>
                            </div>
                        </div>
                    @endif

                    <div class="flex d-flex">
                        {{-- <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('inicial')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>&nbsp;Volver&nbsp; 
                        
                        </button> --}}
                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_vehiculo')" @if(!$datos_solicitante_validados) disabled @endif>Continuar&nbsp; &nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    </div>
                </div>
            @endif

            {{-- VEHÍCULO --}}
            @if($datos_vehiculo)
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex flex-wrap">
                        <div class="form-group col-12 col-md-6 ">
                            <h2 class="titulo1">Datos del Vehículo</h2>
                            <label class="titulo_card" for="codigoTramite">Patente</label>
                            <input class="form-control texto" type="text" tooltip="PATENTE" wire:model="patente">
                            <p class="text-muted">Ingresa la patente sin espacios ni guiones ni barras</p>
                        </div>
                        
                        @if($datos_vehiculo_validados)
                        <div class="col-12 col-md-6 tarjeta-verde">
                            <label class="titulo_card" style="margin-bottom: 20px">Detalles del Vehículo</label><br>
                            <div style="width: 100%">
                                <p class="flex">Modelo<input class="form-control ml-3" type="text" value="{{ $modelo }}" disabled></p>
                                <p class="flex">Marca<input class="form-control ml-3" type="text" value="{{ $marca }}" disabled></p>
                                <p class="flex">Año<input class="form-control ml-3" type="text" value="{{ $ano }}" disabled></p>
                                {{-- <p class="flex">Registro<input class="form-control ml-3" type="text" value="{{  }}" disabled></p> --}}
                            </div>                                
                        </div>
                        @endif
                        @if($necesita_agregar_vehiculo)
                            <div class="col-12 col-md-6 tarjeta-verde">
                                <label class="titulo_card mb-3">Detalles del vehículo</label><br>
                                <div style="width: 100%">
                                    <p class="flex">Modelo<input class="form-control ml-3" type="text" wire:model="agregar_modelo">@error('agregar_modelo')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Marca<input class="form-control ml-3" type="text" wire:model="agregar_marca"></p>@error('agregar_marca')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Año<input class="form-control ml-3" type="text" wire:model="agregar_ano" id="agregar_ano" maxlength="4" onkeypress="return soloNumeros(event)"></p>@error('agregar_ano')<p class="error-message">{{ $message }}</p>@enderror</p>
                                        @if (session()->has('message'))
                                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                                <div class="flex">
                                                    <div>
                                                        <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </p>
                                     @if (session()->has('messageVehículo'))
                                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                            <div class="flex">
                                                <div>
                                                    <p class="text-xm bg-lightgreen">{{ session('messageVehículo') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div style="width: 100%; display: flex; justify-content: space-around;">
                                    <input class="btn btn-info btn-warning" type="button" value="Guardar" wire:click="Agregar_Vehiculo();">
                                    <input class="btn btn-info boton-azul" type="button" value="Cerrar" wire:click="Ocultar_Vehículo();">
                                </div>
                            </div>
                        @endif

                        @if (session()->has('vehiculo'))
                            <div class="bg-yellow-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3 mr-3" role="alert">
                                <div class="flex">
                                    <div>
                                        <p class="text-xm bg-lightgreen">{{ session('vehiculo') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="BuscarPatente();">Validar&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                                                    
                    </div>
                    <div class="flex d-flex">
                        <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('inicial')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>&nbsp;Volver&nbsp; 
                        </button>
                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_tramite')">Continuar&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    </div> 
                </div>
            @endif

            {{-- TRAMITE --}}
            @if($seleccion_tramite)
                <div class="form-group tarjeta-gris">
                    <div class="form-group">
                        <label class="text-muted mb-3">Elegí qué trámite querés iniciar.</label>            
                        <h2 class="titulo1">Selección de Trámite</h2>
                        <label class="titulo_card" for="codigoTramite">Tipo de Trámite</label>
                        <select class="form-control" style="font-size:1.2rem; height: 3.2rem;" wire:model="tramite" >
                            <option value="0">--- Seleccione alguna opción ---</option>
                            <option value="1">INFORME DE MULTAS POR INFRACCIONES DE TRÁNSITO</option>
                            <option value="2">INFORME ESTADO DE DOMINIO</option>
                            <option value="3">INFORME HISTORICO DE TITULARIDAD Y DE ESTADO DE DOMINIO</option>
                        </select>
                    </div>
                
                    <div class="flex d-flex">
                            
                    <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('inicial')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>&nbsp;Volver&nbsp; 
                        </button>
                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('forma_pago')">Continuar&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    </div>
                </div>
            @endif
            
            {{-- PAGO --}}
            @if($forma_pago)
                <div class="form-group tarjeta-gris">
                    <div class="form-group">
                        <h2 class="titulo1">Pagar la solicitud</h2>           
                        <label class="titulo_card" for="codigoTramite">Presupuesto</label> 
                        <table class="table-striped" style="font-size: 0.9rem; width: 113%; margin-left:-20px">
                            <tbody>
                                <tr class="titulo_card blue-300" style="background-color: lightblue;">
                                    <td style="width: 9rem">Item</td>
                                    {{-- <td style="width: 28px">Item</td> --}}
                                    <td>Descripción</td>
                                    <td>Precio Unitario</td>
                                    <td style="width: 14rem">Cant.</td>
                                    <td>Total</td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td class="text-center">1</td>
                                    <td>INFORME ESTADO DE DOMINIO</td>
                                    <td class="text-right pr-2">$260,00</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right pr-2">$260,00</td>
                                </tr>
                                <tr style="height: 30px;">
                                    <td class="text-center">2</td>
                                    <td>FORMULARIO TP</td>
                                    <td class="text-right pr-2">$4.188,00</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right pr-2">$4.188,00</td>
                                </tr>
                                <tr style="background-color: lightblue; height: 30px;">
                                    <td colspan=5 class="text-right pr-2">$4.188,00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="titulo1">Forma de Pago</h2>
                    inluir formas acá
                    
                    <div class="flex d-flex">    
                        <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('datos_tramite')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>&nbsp;Volver&nbsp; 
                        </button>
                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('pago')">Continuar&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </main>

    <script>
        function soloNumeros(e) {
            var key = window.event ? e.which : e.keyCode;
            if (key < 48 || key > 57) {
                e.preventDefault();
            }
        }

        document.getElementById('cuil').addEventListener('keypress', soloNumeros);
        document.getElementById('agregar_celular').addEventListener('keypress', soloNumeros);
        
    </script>
</div>
