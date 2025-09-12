<div>
    <main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <div id="cuerpo" class=" pt-4" >
            <h1 class="titulo1">Configuración de los valores</h1>



            <div class="col-12">
                <p class="text-muted mt-3">Seleccione un trámite</p>
                <select  id="eleccion" class="form-control col-12 col-md-6 mb-3" style="font-size:1.2rem; height: 3.2rem;" wire:change="ElegirTramite()" wire:model="tramite_seleccionado" >
                    <option value="0">--- Seleccione alguna opción ---</option>
                    @foreach($tramites as $tramite)
                        <option value="{{ $tramite->id }}">{{ $tramite->nombretramite }}</option>
                    @endforeach
                </select>
            </div>
            
            <div style="border: 1px solid #bbb6b6; padding: 0.5rem; background-color: #ededed8c !important; margin-bottom: 30px;">
                <label class="titulo_card" for="codigoTramite">Presupuesto</label>
                @if($tramite_seleccionado<>0) 
                    <input type="button" class="btn btn-info ml-3 mb-3" value="+" title="Agregar elementos" wire:click="OpenModalAgregar();">
                @endif
                <table class="table-striped col-12" style="font-size: 0.9rem;">
                    <tbody>
                        <tr class="titulo_card blue-300" style="background-color: lightblue;">
                            {{-- <td class="text-center" style="width: 9rem">Item</td> --}}
                            {{-- <td style="width: 28px">Item</td> --}}
                            <td>Descripción</td>
                            <td class="text-right">Precio Unitario</td>
                            <td class="text-center" style="width: 5rem">Cant.</td>
                            <td class="text-center">Total</td>
                            <td class="text-center">Opciones</td>
                        </tr>

                        @if($detalles)
                            @foreach($detalles as $detalle)
                                <tr style="height: 30px;">
                                    {{-- <td class="text-center">1</td> --}}
                                    <td>{{ $detalle->descripcionrequisitotipotramite}}</td>
                                    <td class="text-right">$ {{ $detalle['precio']}}</td>
                                    <td class="text-center">{{ $detalle['cantidad']}}</td>
                                    <td class="text-right" style="width:5rem">$ {{ $detalle['precio'] * $detalle['cantidad']}}</td>
                                    <td class="text-right" style="width:8rem">
                                        <input type="button" class="btn btn-success" value="->" title="Modificar valores" wire:click="OpenModalModificar({{ $detalle['precio']}},{{ $detalle['cantidad']}},{{ $detalle['id']}});">
                                        <input type="button" class="btn btn-danger" value="X" title="Eliminar valores" wire:click="eliminarvalores({{ $detalle['id']}});">
                                    </td>
                                </tr>
                            @endforeach
                            <tr style="background-color: lightblue; height: 30px;">
                                <td colspan=4 class="text-right">$ {{ $total }}</td>
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
                <div class="modal-content col-10">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Modificar Valores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="OpenModalModificar(1,1,1);">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body flex d-flex flex-wrap">
                        <div class="block col-12 col-md-4">
                            <label for="">Precio</label><br>
                            <input type="text" class="text-right col-12" id="precio_modificar" wire:model="precio_modificar" wire:change="Calcular('modificar');" value="{{ $precio_modificar }}">        
                        </div>

                        <div class="block col-12 col-md-4">
                            <label for="">Cantidad</label><br>
                            <input type="text" class="text-right col-12" id="cantidad_modificar" wire:model="cantidad_modificar" wire:change="Calcular('modificar');" value="{{ $cantidad_modificar }}">
                        </div>

                        <div class="block col-12 col-md-4">
                            <label for="">Total</label><br>
                            <input type="text" class="text-right col-12" id="total_modificar" wire:model="total_modificar" wire:change="Calcular('modificar');" value="{{ $total_modificar }}">
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
                    <div class="modal-content col-10">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Agregar Valores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  data-dismiss="modal" wire:click="OpenModalAgregar();">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="block mx-3 col-12">
                        <label for="">Descripción</label><br><input type="text" class="text-right col-11" wire:model="descripcion_agregar">        
                    </div>
                    <div class="modal-body flex d-flex flex-wrap">

                        <div class="block col-12 col-md-4">
                            <label for="">Precio</label><br><input type="text" class="text-right" id="precio_modificar" wire:model="precio_agregar" wire:change="Calcular('agregar');">        
                        </div>

                        <div class="block col-12 col-md-4">
                            <label for="">Cantidad</label><br><input type="text" class="text-right" id="cantidad_modificar" wire:model="cantidad_agregar" wire:change="Calcular('agregar');">
                        </div>

                        <div class="block col-12 col-md-4">
                            <label for="">Total</label><br><input type="text" class="text-right" id="total_modificar" wire:model="total_agregar" wire:change="Calcular('agregar');" value="{{ $total_agregar }}">
                        </div>

                    </div>
                    <div class="modal-footer my-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="OpenModalAgregar();">Cerrar</button>
                        <button type="button" class="btn btn-success ml-3" wire:click="agregarValores();">Agregar</button>
                    </div>
                    </div>
                </div>
            {{-- </div> --}}
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
