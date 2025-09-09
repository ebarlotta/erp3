<div>
    <main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <div id="cuerpo" class=" pt-4" >
            <h1 class="titulo1">Estimador de Costos</h1>
            
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
                                                {{-- <td colspan="3">{{ $descripciontramite }}</td> --}}
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

                                        {{-- @if($datos_turno_validados)
                                            <tr class="p-3" style="border:white 10px:">
                                                <td class="text-muted text-right" style="width: 15%">Día seleccionado del turno:</td>
                                                <td colspan="3">{{ $diaSeleccionado }}</td>
                                            </tr>
                                        @endif --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <p class="text-muted mt-3">Calculá los costos aproximados para la <b>inscripción</b> de un vehículo 0 KM o la <b>transferencia</b> de un vehículo usado.</p>
            <select  id="eleccion" class="form-control col-3 mb-3" style="font-size:1.2rem; height: 3.2rem;" wire:change="ElegirTramite()" wire:model="tramite_seleccionado" >
                <option value="0">--- Seleccione alguna opción ---</option>
                @foreach($tramites as $tramite)
                    <option value="{{ $tramite->id }}">{{ $tramite->nombretramite }}</option>
                @endforeach
            </select>
            <div class="col-12 flex d-flex">
                <div class="col-4 mb-3">
                    Modelo/Año
                    <select class="form-control col-12 mb-3" style="font-size:1.2rem; height: 3.2rem;" wire:model="modelo" wire:change="BuscarDato();" >
                        <option value="0">--- Seleccione alguna opción ---</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        
                        @foreach($tramites as $tramite)
                            <option value="{{ $tramite->id }}">{{ $tramite->nombretramite }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 mb-3">
                    Descripción
                    <input type="text" wire:model="descripcion" class="form-control col-12 mb-3" style="font-size:1.2rem; height: 3.2rem;" wire:keyup="BuscarDato();">
                </div>
            </div>
            <div class="col-12 flex d-flex">
                <div>
                    {{ $registro }}
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Descripción del Vehículo</td>
                                <td>Avalúo</td>
                            </tr>
                        </thead>
                        @if($listado)
                            @foreach($listado as $item)
                                <tr wire:click="CargarDatos({{$item->id }})">
                                    {{-- <td>{{ $item->id}}</td> --}}
                                    <td>{{ strtoupper($item->vehiculo) }}</td>
                                    <td class="text-right">{{ number_format($item->avaluo,0,",",".") }}</td>
                                </tr>
                            @endforeach
                        @else
                                No se encontraron datos aún
                        @endif
                    </table>
                </div>
            </div>

            
            <div class="form-group tarjeta-gris">
                <label class="titulo_card" for="codigoTramite">Presupuesto</label>
                @if($tramite_seleccionado<>0) 
                    <input type="button" class="btn btn-info ml-3 mb-3" value="+" title="Agregar elementos" wire:click="OpenModalAgregar();">
                @endif
                <table class="table-striped col-12" style="font-size: 0.9rem; margin-left:-20px">
                    <tbody>
                        <tr class="titulo_card blue-300" style="background-color: lightblue;">
                            <td class="text-center" style="width: 9rem">Item</td>
                            {{-- <td style="width: 28px">Item</td> --}}
                            <td>Descripción</td>
                            <td class="text-right">Precio Unitario</td>
                            <td class="text-center" style="width: 14rem">Cant.</td>
                            <td class="text-center">Total</td>
                            <td class="text-center">Opciones</td>
                        </tr>

                        @if($detalles)
                            @foreach($detalles as $detalle)
                                <tr style="height: 30px;">
                                    <td class="text-center">1</td>
                                    <td>{{ $detalle->descripcionrequisitotipotramite}}</td>
                                    <td class="text-right pr-2">$ {{ $detalle['precio']}}</td>
                                    <td class="text-center">{{ $detalle['cantidad']}}</td>
                                    <td class="text-right pr-2">$ {{ $detalle['precio'] * $detalle['cantidad']}}</td>
                                    <td class="text-right pr-2">
                                        <input type="button" class="btn btn-success" value="->" title="Modificar valores" wire:click="OpenModalModificar({{ $detalle['precio']}},{{ $detalle['cantidad']}},{{ $detalle['id']}});">
                                        <input type="button" class="btn btn-danger" value="X" title="Eliminar valores" wire:click="eliminarvalores({{ $detalle['id']}});">
                                    </td>
                                </tr>
                            @endforeach
                            <tr style="background-color: lightblue; height: 30px;">
                                <td colspan=5 class="text-right pr-2">$ {{ $total }}</td>
                                <td class="text-right pr-2"></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>    
        </div>

        @if($ModalModificar)
        {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> --}}
            <div class="modal-dialog modal-dialog-centered text-center" role="document" style="justify-content: center;">
                <div class="modal-content col-6">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Modificar Valores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body flex d-flex">
                    <div class="block mx-3">
                        <label for="">Precio</label><br>
                        <input type="text" class="text-right" id="precio_modificar" wire:model="precio_modificar" wire:change="Calcular('modificar');" value="{{ $precio_modificar }}">        
                    </div>

                    <div class="block ml-3 mr-3">
                        <label for="">Cantidad</label><br>
                        <input type="text" class="text-right" id="cantidad_modificar" wire:model="cantidad_modificar" wire:change="Calcular('modificar');" value="{{ $cantidad_modificar }}">
                    </div>

                    <div class="block mx-3">
                        <label for="">Total</label><br>
                        <input type="text" class="text-right" id="total_modificar" wire:model="total_modificar" wire:change="Calcular('modificar');" value="{{ $total_modificar }}">
                    </div>

                </div>
                <div class="modal-footer my-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="OpenModalModificar(1,1,1);">Cerrar</button>
                    <button type="button" class="btn btn-primary ml-3" wire:click="modificarValores();">Modificar</button>
                </div>
                </div>
            </div>
        @endif

        @if($ModalAgregar)
        {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> --}}
            <div class="modal-dialog modal-dialog-centered text-center" role="document" style="justify-content: center;">
                <div class="modal-content col-6">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Agregar Valores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="block mx-3 col-12">
                    <label for="">Descripción</label><br><input type="text" class="text-right col-11" wire:model="descripcion_agregar">        
                </div>
                <div class="modal-body flex d-flex">

                    <div class="block mx-3">
                        <label for="">Precio</label><br><input type="text" class="text-right" id="precio_modificar" wire:model="precio_agregar" wire:change="Calcular('agregar');">        
                    </div>

                    <div class="block ml-3 mr-3">
                        <label for="">Cantidad</label><br><input type="text" class="text-right" id="cantidad_modificar" wire:model="cantidad_agregar" wire:change="Calcular('agregar');">
                    </div>

                    <div class="block mx-3">
                        <label for="">Total</label><br><input type="text" class="text-right" id="total_modificar" wire:model="total_agregar" wire:change="Calcular('agregar');" value="{{ $total_agregar }}">
                    </div>

                </div>
                <div class="modal-footer my-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="OpenModalAgregar();">Cerrar</button>
                    <button type="button" class="btn btn-success ml-3" wire:click="agregarValores();">Agregar</button>
                </div>
                </div>
            </div>
        @endif



    </main>

    {{-- <script>
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

    </script> --}}


</div>
