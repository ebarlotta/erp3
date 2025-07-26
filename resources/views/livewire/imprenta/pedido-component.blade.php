<div>    
    @if (session()->has('message'))
        <div class="rounded-md bg-gren-300 px-6 py-1 mx-2 mt-3" role="alert" style="background-color: lightgreen;">
            {{ session('message') }}
        </div>
    @endif
    <div class="mx-4 mr-4">
        <table class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>lugardeentrega</th>
                    <th>Propietario</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                    <th style="width:40%">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido) 
                    <tr 
                    @if($pedido->estado->name=='Recibido') style="background-color: #Ed3237;" @endif
                    @if($pedido->estado->name=='En proceso') style="background-color: #F58634;" @endif
                    @if($pedido->estado->name=='Impreso') style="background-color: #00A859;" @endif
                    @if($pedido->estado->name=='Imp. en acabado') style="background-color:  #A8518A;" @endif
                    @if($pedido->estado->name=='Imp. en AcabadoExt.') style="background-color:  #9D98CA;" @endif
                    @if($pedido->estado->name=='Para Enviar') style="background-color: #00AFEF;" @endif
                    @if($pedido->estado->name=='Entregado al transporte')  class="font-weight-bold" style="background-color: #ACE1F9; " @endif
                    @if($pedido->estado->name=='Entregado al cliente')  class="font-weight-bold" style="background-color: #FEFEFE; " @endif
                    >
                        <td>
                            {{ date_format($pedido->created_at,'d-m-Y')  }}<br>
                            
                            <?php $fechaHora = $pedido->created_at;
                                    // Convertir a timestamp y restar 3 horas (3 * 3600 segundos)
                                    $timestampMenos3Horas = strtotime($fechaHora) - (3 * 3600);
                                    
                                    // Formatear la fecha y hora resultante
                                    $horaFormateada = date('H:i:s', $timestampMenos3Horas);
                                    echo $horaFormateada;
                            ?>
                        </td>
                        <td>{{ $pedido->lugardeentrega }}</td>
                        <td>{{ $pedido->nombre }}</td>
                        <td>{{ $pedido->estado->name }}</td>
                        <td>{{ $pedido->observaciones }}</td>
                        <td>
                            <div class="flex justify-center">
                                <a href="{{ url('storage/photos/' . substr($pedido->archivo,14)) }}" download>
                                    <button class="hidden lg:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-2 px-4 mr-2 rounded">Descargar</button>
                                </a>
                                
                                <!-- <a href="{{ 'storage/' . substr($pedido->archivo,7) }}" target="_blank"><button class="hidden lg:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-2 px-4 mr-2 rounded">Descargar</button></a> -->
                                <button class="hidden lg:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-2 px-4 mr-2 rounded" wire:click="CargarDatos({{ $pedido->id }})">Datos útiles de impresión</button>
                                <button type="button" class="btn btn-primary" wire:click="CargarEstado({{ $pedido->id }})">Cambiar Estado</button>
                                <button type="button" class="btn btn-warning px-2" wire:click="EnviarBaul({{ $pedido->id }})">Enviar al baúl</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                Nuevo
            </x-slot>
            <x-slot name="content">
                <select class="form-control" wire:model="estados_id" >
                    @foreach($estados as $estado)
                        <option {{ $estado->id }}>{{$estado->name}}</option>
                    @endforeach
                </select>
            </x-slot>
            <x-slot name="footer">
                <x-button class="btn btn-success" wire:click="CambiarEstado()">Cambiar</x-button>
                <x-button  class="btn btn-info" wire:click="OcultarCambioEstado()">Cerrar</x-button>
            </x-slot>
        </x-dialog-modal>

        <x-dialog-modal wire:model="datos">
            <x-slot name="title">
                Datos del Trabajo
            </x-slot>
            <x-slot name="content">
                <x-label value="nombre: {{ $nombre }}"></x-label>
                <x-label value="telefono: {{ $telefono }}"></x-label>
                <x-label value="direccion: {{ $direccion }}"></x-label>
                <x-label value="dni: {{ $dni }}"></x-label>
                <x-label value="cuit: {{ $cuit }}"></x-label>
                <x-label value="institucion: {{ $institucion }}"></x-label>
                <x-label value="email: {{ $email }}"></x-label>
                <x-label value="cantidadhojas: {{ $cantidadhojas }}"></x-label>
                <x-label value="tipodeimpresion: {{ $tipodeimpresion }}"></x-label>
                {{-- <x-label value="tamanopapel: {{ $tamanopapel }}"></x-label> --}}
                <x-label value="tipodepapel: {{ $tipodepapel }}"></x-label>
                <x-label value="frentedorso: {{ $frentedorso }}"></x-label>
                <x-label value="cantidadejemplares: {{ $cantidadejemplares }}"></x-label>
                <x-label value="retiraenlocal: {{ $retiraenlocal }}"></x-label>
                <x-label value="lugardeentrega: {{ $lugardeentrega }}"></x-label>
                <x-label value="geoposicion: {{ $geoposicion }}"></x-label>
                <x-label value="costoaprox: {{ $costoaprox }}"></x-label>
            </x-slot>
            <x-slot name="footer">
                <x-button  class="btn btn-info" wire:click="OcultarDatos()">Cerrar</x-button>
            </x-slot>
        </x-dialog-modal>
    </div>
    
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <p>
                <select class="form-control" wire:model="estados_id" >
                    @foreach($estados as $estado)
                        <option {{ $estado->id }}>{{$estado->name}}</option>
                    @endforeach
                </select>
            </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" wire:click="CambiarEstado()">Save changes</button>
            <input type="button" class="btn btn-info" value="Grabar" wire:click="CambiarEstado()">
            </div>
        </div>
        </div>
    </div> --}}
    
</div>
