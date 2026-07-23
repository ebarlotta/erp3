<div>
<main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Button trigger modal -->

        <div id="cuerpo" class=" pt-4" >
            <h1 class="titulo1">Obtener Informe Web</h1>
            <label class="text-muted mb-3">Completá los datos personales y de contacto del solicitante.</label>

            {{-- Resúmen --}}
            {{-- ======= --}}
            @if($datos_solicitante || $datos_vehiculo || $seleccion_tramite || $forma_pago)
                <div class="form-group tarjeta-gris">
                    <div>
                        <div class="panel panel-info hidden-xs ng-scope" style="margin-bottom: 20px;" ng-if="resumenCtrl.solicitud.codigoTramite || resumenCtrl.solicitud.solicitante || resumenCtrl.solicitud. vehiculo || resumenCtrl.solicitud.turno || resumenCtrl.solicitud.tipoTramite">
                            {{-- <div class="panel-body"> --}}

                                <div class="col-12">
                                    <div class="d-flex flex col-12">
                                        <div class="media-left" style="margin-right: 13px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="26" height="26" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                                        </div>
                                        <label class="titulo_card text-uppercase blue-300 col-12"> Resumen de la Solicitud</label>
                                    </div>

                                    @if($datos_solicitante_validados)
                                        <div class="flex d-flex flex-wrap">
                                            <div class="text-muted text-right col-6 col-md-3 col-lg-2">Solicitante</div><div class="col-6 col-md-3 col-lg-2">{{ $apellido }}, {{ $nombre }}</div>
                                            <div class="text-muted text-right col-6 col-md-3 col-lg-2">CUIL / CUIT</div><div class="col-6 col-md-3 col-lg-2">{{ $cuil }} </div>
                                            <div class="text-muted text-right col-6 col-md-3 col-lg-2"> Email:</div><div class="col-6 col-md-3 col-lg-2">{{ $solicitante['email'] }} </div>
                                        </div>
                                    @endif
                                    @if($datos_vehiculo_validados)
                                        <div class="flex d-flex flex-wrap">
                                            <div class="text-muted text-right col-6 col-md-3 col-lg-2"> Patente:</div><div class="col-6 col-md-3 col-lg-2" style="text-transform: uppercase;"> {{ $patente }} </div>
                                            <div class="text-muted text-right col-6 col-md-3 col-lg-2"> Marca:</div><div class="col-6 col-md-3 col-lg-2" style="text-transform: uppercase;"> {{ $marca }} </div>
                                            <div class="text-muted text-right col-6 col-md-3 col-lg-2"> Modelo:</div><div class="col-6 col-md-3 col-lg-2" style="text-transform: uppercase;"> {{ $modelo }} </div>
                                            <div class="text-muted text-right col-6 col-md-3 col-lg-2"> Año:</div><div class="col-6 col-md-3 col-lg-2" style="text-transform: uppercase;"> {{ $ano }} </div>
                                        </div>
                                    @endif
                                    @if($datos_tramite_validados)
                                        <div class="flex d-flex flex-wrap">
                                            <div class="text-muted text-right col-6 col-md-3"> Trámite:</div><div class="col-9"> {{ $tramite_descripcion }} </td>
                                        </div>
                                    @endif
                                </div>

                                {{-- <table class="table table-striped margin-bottom-no col-12">
                                    <tbody> --}}
                                        {{-- <tr>
                                            <td colspan="8">
                                                <div class="d-flex flex">
                                                    <div class="media-left" style="margin-right: 13px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="26" height="26" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                                                    </div>
                                                    <label class="titulo_card text-uppercase blue-300 col-12"> Resumen de la Solicitud</label>
                                                </div>
                                            </td>
                                        </tr> --}}
                                        {{-- @if($datos_solicitante_validados)
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Solicitante</td><td>{{ $apellido }}, {{ $nombre }}</td>
                                                <td class="text-muted text-right" style="width: 15%">CUIL / CUIT</td><td>{{ $cuil }} </td>
                                                <td class="text-muted text-right" style="width: 15%"> Email:</td><td>{{ $solicitante['email'] }} </td>
                                            </tr>
                                        @endif --}}
                                        {{-- @if($datos_vehiculo_validados)
                                            <tr>
                                                <td class="text-muted text-right" style="width: 15%"> Patente:</td><td style="text-transform: uppercase;"> {{ $patente }} </td>
                                                <td class="text-muted text-right" style="width: 15%"> Marca:</td><td style="text-transform: uppercase;"> {{ $marca }} </td>
                                                <td class="text-muted text-right" style="width: 15%"> Modelo:</td><td style="text-transform: uppercase;"> {{ $modelo }} </td>
                                                <td class="text-muted text-right" style="width: 15%"> Año:</td><td style="text-transform: uppercase;"> {{ $ano }} </td>
                                            </tr>
                                        @endif --}}
                                        {{-- @if($datos_tramite_validados)
                                            <tr>
                                                <td class="text-muted text-right" style="width: 15%"> Trámite:</td><td colspan="8"> {{ $tramite_descripcion }} </td>
                                            </tr>
                                        @endif --}}
                                    {{-- </tbody>
                                </table> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            @endif

            <!--TRAMITE-->
            @if($datos_solicitante || $estado_inicial)
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex flex-wrap">
                        <div class="form-group col-12 col-md-7">
                            <h2 class="titulo1">Datos del solicitante</h2>
                            <label class="titulo_card">CUIL / CUIT</label>
                            <input class="form-control texto" type="number" tooltip="CUIL / CUIT" wire:model="cuil" id="cuil" maxlength="11" onkeypress="return soloNumeros(event)">
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
                            <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="BuscarSolicitante();">Buscar Solicitante&nbsp; 
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
                                    <p class="flex">Apellido<input class="form-control ml-3 col-11" type="text" value="{{ explode(',', $this->solicitante->name)[0] }}" disabled></p>
                                    <p class="flex">Nombre<input class="form-control ml-3 col-11" type="text" value="{{ explode(',', $this->solicitante->name)[1] ?? '' }}" disabled></p>
                                    <p class="flex">Email<input class="form-control ml-3 col-11" type="text" value="{{ $solicitante['email'] }}" disabled></p>
                                    <p class="flex">Celular<input class="form-control ml-3 col-11" type="text" value="{{ $solicitante['telefono'] }}" disabled></p>
                                    <p class="flex">Dirección<input class="form-control ml-3 col-11" type="text" value="{{$solicitante['direccion']}}" disabled></p>
                                </div>                                
                            </div>
                        @endif
                        @if($necesita_agregar_solicitante)
                            <div class="col-12 col-md-6 tarjeta-verde">
                                <label class="titulo_card mb-3">Detalles del solicitante</label><br>
                                <div style="width: 100%">
                                    <p class="flex">Apellido<input class="form-control ml-3 col-11" type="text" wire:model="agregar_apellido">@error('agregar_apellido')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Nombre<input class="form-control ml-3 col-11" type="text" wire:model="agregar_nombre"></p>@error('agregar_nombre')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Email<input class="form-control ml-3 col-11" type="text" wire:model="agregar_email"></p>@error('agregar_email')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Celular<input class="form-control ml-3 col-11" type="number" wire:model="agregar_celular" id="agregar_celular" maxlength="11" onkeypress="return soloNumeros(event)"></p>@error('agregar_celular')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Dirección<input class="form-control ml-3 col-11" type="text" wire:model="agregar_direccion"></p>@error('agregar_direccion')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex w-100" style="justify-content: flex-start;">Condición iva
                                        <select class="form-control col-11" wire:model="agregarivaid" style="width: 96%;">
                                            <option value="0">--- Seleccione una opción ---</option>
                                            @foreach ($ivas as $iva)
                                                <option value="{{ $iva->id }}">{{ $iva->descripcion}}</option>
                                            @endforeach
                                        </select>
                                        @error('agregarivaid')<p class="error-message">{{ $message }}</p>@enderror</p>

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
                                    <button type="submit" class="btn boton-warning mr-3" wire:click="Agregar_Solicitante()">Guardar</button>
                                    <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="Ocultar_Solicitante();">Cerrar</button>
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
                            <label class="titulo_card">Patente</label>
                            <input class="form-control texto" type="text" tooltip="PATENTE" wire:model="patente" oninput="convertirAMayusculas(event)">
                            <p class="text-muted">Ingresa la patente sin espacios ni guiones ni barras</p>
                            @error('patente')
                                <div class="bg-yellow-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3 mr-3" role="alert">
                                    <div class="flex">
                                        <div>
                                            <p class="text-xm bg-lightred text-danger">{{ $message }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="BuscarPatente();">Validar Vehículo&nbsp; 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                            @if (session()->has('vehiculo'))
                                <div class="bg-yellow-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3 mr-3" role="alert">
                                    <div class="flex">
                                        <div>
                                            <p class="text-xm bg-lightgreen">{{ session('vehiculo') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        @if($datos_vehiculo_validados)
                            <div class="col-12 col-md-6 tarjeta-verde">
                                <label class="titulo_card" style="margin-bottom: 20px">Detalles del Vehículo</label><br>
                                <div style="width: 100%">
                                    <p class="flex">Modelo<input class="form-control ml-3 col-11" type="text" value="{{ $modelo }}" disabled></p>
                                    <p class="flex">Marca<input class="form-control ml-3 col-11" type="text" value="{{ $marca }}" disabled></p>
                                    <p class="flex">Año<input class="form-control ml-3 col-11" type="text" value="{{ $ano }}" disabled></p>
                                    {{-- <p class="flex">Registro<input class="form-control ml-3" type="text" value="{{  }}" disabled></p> --}}
                                </div>                                
                            </div>
                        @endif

                        @if($necesita_agregar_vehiculo)
                            <div class="col-12 col-md-6 tarjeta-verde">
                                <label class="titulo_card mb-3">Debe ingresar los datos del vehículo</label><br>
                                <label class="titulo_card mb-3">Detalles del vehículo</label><br>
                                <div style="width: 100%">
                                    <p class="flex">Modelo<input class="form-control ml-3 col-11" type="text" wire:model="agregar_modelo" oninput="convertirAMayusculas(event)">@error('agregar_modelo')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Marca<input class="form-control ml-3 col-11" type="text" wire:model="agregar_marca" oninput="convertirAMayusculas(event)"></p>@error('agregar_marca')<p class="error-message">{{ $message }}</p>@enderror</p>
                                    <p class="flex">Año<input class="form-control ml-3 col-11" type="number" wire:model="agregar_ano" id="agregar_ano" maxlength="4" onkeypress="return soloNumeros(event)"></p>@error('agregar_ano')<p class="error-message">{{ $message }}</p>@enderror</p>
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
                                    <button type="submit" class="btn boton-warning mr-3" wire:click="Agregar_Vehiculo();">Guardar</button>
                                    <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="Ocultar_Vehículo();">Cerrar</button>
                                </div>
                            </div>
                        @endif
                                                    
                    </div>
                    <div class="flex d-flex">
                        <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('inicial')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>&nbsp;Volver&nbsp; 
                        </button>
                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_tramite')" @if(!$datos_vehiculo_validados) disabled @endif>Continuar&nbsp; 
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
                        <label class="titulo_card">Tipo de Trámite</label>
                        <select class="form-control" wire:model="tramiteid" wire:change="ElegirTramite" style="font-size:1.2rem; height: 3.2rem;"> 
                            {{-- wire:change="ElegirTramite({{ $tramite_id }});" --}}
                            <option value="0">--- Seleccione alguna opción ---</option>
                            @foreach($informes as $informe)
                                <option value="{{ $informe->id }}">{{ $informe->nombretramite }}</option>
                            {{-- <option value="2">INFORME ESTADO DE DOMINIO</option>
                            <option value="3">INFORME HISTORICO DE TITULARIDAD Y DE ESTADO DE DOMINIO</option> --}}
                            @endforeach
                        </select>
                    </div>
                
                    <div class="flex d-flex">
                            
                    <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('datos_vehiculo')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>&nbsp;Volver&nbsp; 
                        </button>
                        {{-- Label {{ $tramite_id }} --}}
                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('forma_pago')" @if($tramite_id=0) disabled @endif>Continuar&nbsp; 
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
                        {{-- <div class="container">
                            <div class="col-12 flex d-flex">
                                <div class="col-6">Descripción</div>
                                <div class="col-2">Precio Unitario</div>
                                <div class="col-2">Cant.</div>
                                <div class="col-2">Total</div>
                            </div>

                            @if($detalles)
                                @foreach($detalles as $detalle)
                                    <div class="col-12 flex d-flex">
                                        <div class="col-6">{{ $detalle->descripcionrequisitotipotramite}}</div>
                                        <div class="text-right pr-2 col-2">$ {{ $detalle['precio']}}</div>
                                        <div class="text-center col-2">{{ $detalle['cantidad']}}</div>
                                        <div class="text-right pr-2 col-2">$ {{ $detalle['precio'] * $detalle['cantidad']}}</div>
                                    </div>
                                @endforeach
                                    <div class="col-12 flex d-flex">
                                        <div style="background-color: lightblue; height: 30px;">
                                            <div colspan=5 class="text-right pr-2">$ {{ $total }}</div>
                                        </div>
                                    </div>
                            @else
                                <div class="col-12 flex d-flex">
                                    <div colspan="5" style="text-align: center; background-color: lightcoral">DEBE SELECCIONAR UNA OPCIÓN EN LA PANTALLA ANTERIOR</div>
                                </div>
                            @endif
                        </div> --}}
                        <table class="table-striped col-12" style="font-size: 0.9rem;">
                            <tbody>
                                <tr class="titulo_card blue-300" style="background-color: lightblue;">
                                    {{-- <td class="text-center" style="width: 9rem">Item</td> --}}
                                    <td>Descripción</td>
                                    <td class="text-right col-3">Precio Unitario</td>
                                    <td class="text-center" style="width: 14rem">Cant.</td>
                                    <td class="text-center col-3">Total</td>
                                </tr>
                                @if($detalles)
                                    @foreach($detalles as $detalle)
                                        <tr style="height: 30px;">
                                            {{-- <td class="text-center">1</td> --}}
                                            <td>{{ $detalle->descripcionrequisitotipotramite}}</td>
                                            <td class="text-right pr-2 col-3">$ {{ $detalle['precio']}}</td>
                                            <td class="text-center col-2">{{ $detalle['cantidad']}}</td>
                                            <td class="text-right pr-2 col-3">$ {{ $detalle['precio'] * $detalle['cantidad']}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <tr style="background-color: lightblue; height: 30px;">
                                        <td colspan=5 class="text-right pr-2">$ {{ $total }}</td>
                                    </tr>                                  
                                @else
                                    <tr><td colspan="5" style="text-align: center; background-color: lightcoral">DEBE SELECCIONAR UNA OPCIÓN EN LA PANTALLA ANTERIOR</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <h2 class="titulo1">Forma de Pago</h2>
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                        QR Billetera Virtual
                    </button>
                    
                    <input type="button" class="btn btn-info mt-2" name="" id="" value="Tarjeta Crédito/Débito" wire:click="Pagar();">
                    
                    <div class="flex d-flex">    
                        <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('datos_tramite')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>&nbsp;Volver&nbsp; 
                        </button>
                    </div>
                </div>
            @endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
 <script src="https://sdk.mercadopago.com/js/v2"></script>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="modal-body flex d-flex">
            <img src="/images/qr.png" alt="">
            <a href="https://mpago.la/1Y6mrX7" target="_blank"><button class="btn btn-info">Botón de Pago</button></a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar Método de Pago</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>






        </div>




        @if($OpenModal)
        {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> --}}
            <div class="modal-dialog modal-dialog-centered text-center" role="document" style="justify-content: center;">
                <div class="modal-content col-6">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Agregar Valores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">&times;</span> --}}
                    </button>
                </div>


                <div class="block mx-3 col-12">
                    <label for="">Descripción</label><br><input type="text" class="text-right col-11" wire:model="descripcion_agregar">        
                </div>
                <div class="modal-body flex d-flex">
                    <img src="/images/qr.png" alt="">
                    <a href="https://mpago.la/1Y6mrX7">
                        <button>Billetera</button>
                    </a>
                    {{-- <div class="block mx-3">
                        <label for="">Precio</label><br><input type="text" class="text-right" id="precio_modificar" wire:model="precio_agregar" wire:change="Calcular('agregar');">        
                    </div>

                    <div class="block ml-3 mr-3">
                        <label for="">Cantidad</label><br><input type="text" class="text-right" id="cantidad_modificar" wire:model="cantidad_agregar" wire:change="Calcular('agregar');">
                    </div>

                    <div class="block mx-3">
                        <label for="">Total</label><br><input type="text" class="text-right" id="total_modificar" wire:model="total_agregar" wire:change="Calcular('agregar');" value="{{ $total_agregar }}">
                    </div> --}}
https://mpago.la/1EY4ebK

<script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
data-preference-id="42071682-d672df41-8dd5-4911-8cfb-d361f55194cd" data-source="button">
</script>
                </div>
                <div class="modal-footer my-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="OpenModalAgregar();">Cerrar</button>
                    <button type="button" class="btn btn-success ml-3" wire:click="agregarValores();">Agregar</button>
                </div>
                </div>
            </div>
        @endif






    </main>

    <script>
        function soloNumeros(e) {
            var key = window.event ? e.which : e.keyCode;
            if (key < 48 || key > 57) {
                e.preventDefault();
            }
        }

        function convertirAMayusculas(e) {
            const input = e.target;
            input.value = input.value.toUpperCase();
        }

        document.getElementById('cuil').addEventListener('keypress', soloNumeros);
        document.getElementById('agregar_celular').addEventListener('keypress', soloNumeros);
        
    </script>
</div>
