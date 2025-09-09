<div>
<main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <div id="cuerpo" class=" pt-4" >
            <h1 class="titulo1">Iniciar Trámite Online</h1>
            @if($datos_tramite_validados || $datos_vehiculo_validados || $datos_solicitante_validados )
                <div class="form-group tarjeta-gris">
                    <div>
                        <div class="panel panel-info hidden-xs ng-scope" style="margin-bottom: 20px;">
                            <div class="panel-body">
                                <table class="table table-striped margin-bottom-no">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="d-flex- flex">
                                                    <div class="media-left" style="margin-right: 13px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="26" height="26" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                                                    </div>
                                                    <label class="titulo_card text-uppercase blue-300"> Resumen de la Solicitud</label>
                                                </div>
                                            </td>
                                        </tr>
                                        @if($datos_tramite_validados)
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Trámite</td>
                                                <td colspan="3">{{ $descripciontramite }}</td>
                                            </tr>
                                        @endif

                                        @if($datos_vehiculo_validados)
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Vehículo</td>
                                                <td colspan="3">{{ $modelo }} - {{ $marca }} - {{ $ano }} - {{ strtoupper($patente) }}</td>
                                            </tr>
                                        @endif

                                        @if($datos_solicitante_validados)
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Solicitante</td>
                                                <td colspan="3">{{ $solicitante['name'] .' - ' . $solicitante['direccion'] .' - '. $solicitante['telefono'] .' - '. $solicitante['email']}}</td>
                                            </tr>
                                        @endif

                                        @if($datos_turno_validados)
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Día seleccionado del turno:</td>
                                                <td colspan="3">{{ $diaSeleccionado }}</td>
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
            @if($seleccion_tramite)
                <div class="form-group tarjeta-gris">
                    <div class="form-group">
                        <label class="text-muted mb-3">Elegí qué trámite querés iniciar.</label>
                        <h2 class="titulo1">Selección de Trámite</h2>
                        <label class="titulo_card" for="codigoTramite">Tipo de Trámite</label>
                        <select  id="eleccion" class="form-control" style="font-size:1.2rem; height: 3.2rem;" wire:change="cambiar_tramite()" wire:model="tramite_seleccionado" >
                                <option value="0">--- Seleccione alguna opción ---</option>
                                @foreach ($tramites as $tramite)
                                    <option value="{{ $tramite->id }}">{{ $tramite->nombretramite }}</option>
                                @endforeach
                        </select>
                    </div>

                    @if($tramite_seleccionado)
                        <div class="tarjeta-celeste">
                            <div class="media-left" style="margin-right: 13px;">
                                <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="56" height="56" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                            </div>
                            <div class="media-body">
                                <h4 class="titulo2"><b>Descripción</b></h4>
                                <p class="text-muted">Trámite para incorporar el motor de los dominios inscriptos</p>
                                <h5 class="titulo2">Requisitos</h5>
                                <ul style="list-style-type: disc !important;">
                                    @foreach($requisitos as $requisito)
                                        <li class="text-muted">{{ $requisito->descripcionrequisitotipotramite }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_vehiculo')" @if(!$tramite_seleccionado) disabled @endif>Continuar&nbsp; &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    @endif
                </div>
            @endif

            {{-- VEHÍCULO --}}
            @if($datos_vehiculo)
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex flex-wrap">
                        <div class="form-group col-12 col-md-6">
                            <h2 class="titulo1">Datos del Vehículo</h2>
                            <label class="titulo_card" for="codigoTramite">Patente</label>
                            <input class="form-control texto" type="text" tooltip="PATENTE" maxlength="11" wire:model="patente">
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

                            <label class="titulo_card" for="codigoTramite">Chasis</label>
                            <input class="form-control texto" type="text" tooltip="CHASIS" maxlength="7" wire:model="chasis">
                            <p class="text-muted">Ingresa las últimas 7 posiciones del chasis de tu vehículo. Este dato figura en tu cédula.</p>
                            <p class="text-muted">Si la cantidad de caracteres es inferior a 7, ingresá la totalidad de los mismos.</p>
                            @error('chasis')
                                <div class="bg-yellow-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3 mr-3" role="alert">
                                    <div class="flex">
                                        <div>
                                            <p class="text-xm bg-lightred text-danger">{{ $message }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-12 col-md-6">
                            @if($datos_vehiculo_validados)
                                <div class="col-12 tarjeta-verde">
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
                                <div class="col-12 tarjeta-verde">
                                    <label class="titulo_card mb-3 bg-red-300" style="background-color: antiquewhite; padding:10px">Debe ingresar los datos del vehículo</label><br>
                                    <label class="titulo_card mb-3">Detalles del vehículo</label><br>
                                    <div style="width: 100%">
                                        <p class="flex">Modelo<input class="form-control ml-3" type="text" wire:model="agregar_modelo" oninput="convertirAMayusculas(event)">@error('agregar_modelo')<p class="error-message">{{ $message }}</p>@enderror</p>
                                        <p class="flex">Marca<input class="form-control ml-3" type="text" wire:model="agregar_marca" oninput="convertirAMayusculas(event)"></p>@error('agregar_marca')<p class="error-message">{{ $message }}</p>@enderror</p>
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
                                        <button type="submit" class="btn boton-warning mr-3" wire:click="Agregar_Vehiculo();">Guardar</button>
                                        <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="Ocultar_Vehículo();">Cerrar</button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="form-group col-12 col-md-6">

                        <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="BuscarPatente();">Validar&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                        <div class="flex d-flex">
                            <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('inicial')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                </svg>&nbsp;Volver&nbsp; 
                            </button>
                            <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_solicitante')" @if(!$datos_vehiculo_validados) disabled @endif>Continuar&nbsp; &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <!--TRAMITE-->
            @if($datos_solicitante)
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex">
                        <div class="form-group col-12 col-md-6">
                            <h2 class="titulo1">Datos del Solicitante</h2>
                            <label class="titulo_card" for="codigoTramite">CUIL / CUIT</label>
                            <input class="form-control texto" type="text" tooltip="CUIL / CUIT" maxlength="11" wire:model="cuil">
                            <p class="text-muted">Ingresa el CUIL / CUIT sin guiones ni espacios.</p>

                            <button type="submit" class="btn btn-info boton" style="background-color: #0072bc !important; color:#F9F9F9" wire:click="BuscarSolicitante()">Buscar Solicitante&nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                            @if($datos_solicitante_validados)
                                <div class="col-12">
                                    <p class="text-muted mt-3">Solicitante en cáracter de</p>
                                    <select  id="eleccion" class="form-control col-3" style="font-size:1.2rem; height: 3.2rem;" wire:change="cambiar_tramite()" wire:model="tramite_seleccionado" >
                                        <option value="0">--- Seleccione alguna opción ---</option>
                                        <option value="1">Apoderado</option>
                                        <option value="2">Curador</option>
                                        <option value="3">Representante Legal</option>
                                        <option value="4">Titular</option>
                                        <option value="5">Tutor</option>
                                        <option value="6">Acreedor Prendario</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-12 col-md-6">
                            @if($datos_solicitante_validados)
                                <div class="col-12 tarjeta-verde">
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
                                <div class="col-12 tarjeta-verde">
                                    <label class="titulo_card mb-3">Detalles del solicitante</label><br>
                                    <div style="width: 100%">
                                        <p class="flex">Apellido<input class="form-control ml-3" type="text" wire:model="agregar_apellido">@error('agregar_apellido')<p class="error-message">{{ $message }}</p>@enderror</p>
                                        <p class="flex">Nombre<input class="form-control ml-3" type="text" wire:model="agregar_nombre"></p>@error('agregar_nombre')<p class="error-message">{{ $message }}</p>@enderror</p>
                                        <p class="flex">Email<input class="form-control ml-3" type="text" wire:model="agregar_email"></p>@error('agregar_email')<p class="error-message">{{ $message }}</p>@enderror</p>
                                        <p class="flex">Celular<input class="form-control ml-3" type="text" wire:model="agregar_celular" maxlength="11" onkeypress="return soloNumeros(event)"></p>@error('agregar_celular')<p class="error-message">{{ $message }}</p>@enderror</p>
                                        <p class="flex">Dirección<input class="form-control ml-3" type="text" wire:model="agregar_direccion"></p>@error('agregar_direccion')<p class="error-message">{{ $message }}</p>@enderror</p>
                                        <p class="flex w-100" style="justify-content: flex-start;">Condición iva
                                            <select class="form-control" wire:model="agregarivaid" style="width: 96%;">
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
                    </div>

                    <div class="tarjeta-celeste">
                        <div class="col-12 block">
                            <div class="media-left flex d-flex" style="margin-right: 13px;">
                                <svg xmlns="http://www.w3.org/2000/svg" color="#3498db" width="56" height="56" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"></path></svg>
                                <div class="media-body ml-4">
                                    <h4 class="titulo2"><b>¿Los datos del solicitante son correctos?</b></h4>
                                    <p class="text-muted">Para confirmar que los datos son correctos, presioná CONTINUAR;</p>
                                    <p class="text-muted">si querés corregir algunos de los campos solicitados, presioná MODIFICAR DATOS y realizá nuevamente la carga.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex d-flex">
                        <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('datos_vehiculo')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>&nbsp;Volver&nbsp; 
                        </button>

                        <button type="submit" class="btn btn-success boton" wire:click="Mostrar('seleccionar_turno')" @if(!$datos_solicitante_validados) disabled @endif>Continuar&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </button>
                    </div>
                </div>
            @endif

            {{-- Seleccionar Turno --}}
            @if($seleccionar_turno)
                <div class="form-group tarjeta-gris">
                    <div class="flex d-flex">
                        <div class="form-group col-12">
                            <h2 class="titulo1">Seleccionar Turno</h2>
                            <h2 style="font-size: 1.5em; font-family: sans-serif; font-weight: 700; max-width: 100%; overflow-x: hidden;">Según nuestra base de datos, para este CUIT/CUIL se registraron</h2>
                            <label class="titulo_card" for="codigoTramite">Días disponibles</label>
                            <div class="calendar">

                                <x-registro.calendario-component />

                                <input class="form-control texto" type="text" tooltip="CUIL / CUIT" wire:model="diaSeleccionado">
                                <p class="text-muted">Elegí un día disponible (En Verde).</p>

                                <div class="flex d-flex">
                                    <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('datos_solicitante')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                        </svg>&nbsp;Volver&nbsp; 
                                    </button>

                                    <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_final')" @if(!$tramite_seleccionado) disabled @endif>Continuar&nbsp; &nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($datos_final)
                <div id="cuerpo" class="container">
                    <div class="well">
                        <h2>Solicitud Finalizada</h2>

                        <!--TURNO-->
                        <div class="col-sm-12">
                            <div class="alert alert-info tarjeta-celeste">
                                <div class="media">
                                    <div class="media-body">
                                        <h4>Agendá el turno</h4>
                                        {{-- <p class="margin-0"><strong>IMPORTANTE:</strong> Antes de concurrir a realizar el trámite, verificá en la página de la DNRPA https://www.dnrpa.gov.ar/portal_dnrpa/ que no se hayan dictado nuevas medidas que ordenen mantener el cierre de los Registros Seccionales.</p> --}}
                                        <p class="margin-0">Te esperamos en el registro el <strong class="lead text-primary ng-binding">{{ $diaSeleccionado }}</strong> a las <strong class="lead text-primary ng-binding">11:40</strong> hs.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--REGISTRO-->
                        <div class="col-sm-12">
                            <div class="alert alert-success tarjeta-celeste">
                                <div class="media">
                                    <div class="media-body">
                                        <h4>Lugar de la Reunión</h4>
                                        <p class="margin-0 ng-binding">GENERAL SAN MARTIN N° 1 (13003) - <strong class="lead text-primary ng-binding">ALBUERA 554  </strong>, GRAL.SAN MARTIN.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--BOTONES-->
                        <div class="form-group flex d-flex">
                            <button type="submit" class="btn boton-warning mr-3" wire:click="Mostrar('seleccionar_turno')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                </svg>&nbsp;Volver&nbsp; 
                            </button>
                            
                            <button type="submit" class="btn btn-success boton" wire:click="Mostrar('datos_final')" @if(!$datos_turno_validados) disabled @endif>Salir&nbsp; &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </button>
                        </div>
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

        function convertirAMayusculas(e) {
            const input = e.target;
            input.value = input.value.toUpperCase();
        }

        document.getElementById('cuil').addEventListener('keypress', soloNumeros);
        document.getElementById('agregar_celular').addEventListener('keypress', soloNumeros);

    </script>
</div>
