<div>
    @if (session()->has('message'))
        <div class="rounded-md bg-gren-300 px-6 py-1 mx-2 mt-3" role="alert" style="background-color: lightgreen;">
            {{ session('message') }}
        </div>
    @endif

<style>
    .error {
        color: red; /* Color del texto en rojo */
        font-size: 14px; /* Tamaño de fuente (opcional) */
        font-weight: bold; /* Texto en negrita (opcional) */
    }
</style>
    {{-- <form class="col-10 mx-auto mt-4"> --}}
    <form wire:submit.prevent="save" class="col-10 mx-auto mt-4">
        <div class="row">
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" wire:model="nombre" placeholder="Escribe tu Nombre">
                @error('nombre') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" wire:model="telefono" placeholder="Teléfono">
                @error('telefono') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" wire:model="direccion" placeholder="Dirección">
                @error('direccion') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" wire:model="dni" placeholder="DNI">
                @error('dni') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="CUIT">CUIT:</label>
                <input type="text" class="form-control" wire:model="cuit" placeholder="CUIT">
                @error('cuit') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="institucion">Institución:</label>
                <input type="text" class="form-control" wire:model="institucion" placeholder="Institución">
                @error('institucion') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="email">Email:</label>
                <input type="email" class="form-control" wire:model="email" placeholder="Email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-7 mb-2 btn btn-warning ml-3" style="height: fit-content;margin-top: 2%;">
                <label for="archivo">Déjanos tu archivo:</label>
                <input type="file" wire:model="photo" class="ml-2 w-full">
                @error('photo') <span class="error">{{ $message }}</span> @enderror
                {{-- <input type="file" class="form-control" id="archivo"> --}}
            </div>

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="cantidadhojas">Cantidad de Hojas:</label>
                <input type="number" class="form-control" wire:model="cantidadhojas" wire:keyup="EstimarPrecio" wire:change="EstimarPrecio" placeholder="Cantidad de Hojas">
                @error('cantidadhojas') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="tipoImpresion">Tipo de Impresión:</label>
                <select id="tipoImpresion" class="form-control" wire:model="tipodeimpresion" wire:change="EstimarPrecio">
                    <option value="0">-- Seleccione un sistema</option>
                    @if(!is_null($sistemas))
                        @foreach ($sistemas as $sistema)
                            <option value="{{ $sistema->id }}">{{ $sistema->sistema }}</option>
                        @endforeach
                    @endif
                </select>
                @error('tipodeimpresion') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="simpleDobleFas">Simple o Doble Faz:</label>
                <select class="form-control" wire:model="frentedorso" wire:change="EstimarPrecio">
                    <option value="0">-- Seleccione un lado</option>
                    @foreach ($lados as $lado)
                        <option value="{{ $lado->id }}">{{ $lado->lados }}</option>
                    @endforeach
                </select>
                @error('frentedorso') <span class="error">{{ $message }}</span> @enderror
            </div>


            {{-- <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="tamanoPapelCliente">Tamaño de Papel:</label>
                <select class="form-control" wire:model="tamanopapel">
                    <option selected>Seleccionar...</option>
                    <option value="1">A5</option>
                    <option value="2">A4</option>
                    <option value="3">A3</option>
                    <option value="4">Legal</option>
                    <option value="5">1/2 Oficio</option>
                    <option value="6">Oficio</option>
                </select>
            </div> --}}

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="tipodepapel">Tipo de Papel:</label>
                <select class="form-control" wire:model="tipodepapel" wire:change="EstimarPrecio">
                    <option value="0">-- Seleccione un gramaje</option>
                    @if($gramajes)
                        @foreach ($gramajes as $gramaje)
                            <option value="{{ $gramaje->id }}">{{ $gramaje->gramaje }} - {{ $gramaje->tamano_papel }}</option>
                        @endforeach
                    @endif
                </select>
                @error('tipodepapel') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="cantidadEjemplares">Cantidad de Ejemplares:</label>
                <input type="number" class="form-control" wire:model="cantidadejemplares" wire:keyup="EstimarPrecio" wire:change="EstimarPrecio" placeholder="Cantidad de Ejemplares">
                @error('cantidadejemplares') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-4 mt-3 mb-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" wire:model="retiraenlocal" checked>
                    <label class="form-check-label" for="homePickup">Retira por El Local</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" wire:model="geoposicion">
                    <label class="form-check-label" for="deliveryService">Enviar por delivery $</label>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-4 mt-3 mb-2">
                <label for="cantidadEjemplares">Observaciones:</label>
            <textarea wire:model="observaciones" name="" id="" cols="60" rows="2"></textarea>
            
            </div>
            <div class="form-group col-sm-6 col-md-6 col-lg-4 mt-3 mb-2">
                <label for="cantidadEjemplares">Costo Aproximado: $ {{ number_format($PrecioEstimado,2,",",".") }}</label>
            </div>
        </div>
    
        <div class="row mt-3 mx-3 text-center">
            {{-- <div class="col-sm-12 col-md-12 col-lg-4 btn btn-danger">
                <h4 class="marg">Costo Aprox: $ {{ $costoaprox }}</h4>
            </div> --}}
            
            <div class="col-md-12">
                {{-- <button type="submit">Save Photo</button> --}}

                <button type="submit" class="btn btn-primary mt-3 col-6">Enviar</button>
            </div>
        </div>
    </form>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Nuevo
        </x-slot>
        <x-slot name="content">
            El archivo ha sido enviado correctamente!!!
        </x-slot>
        <x-slot name="footer">
            <x-button  class="btn btn-info" wire:click="$set('open',false)">Cerrar</x-button>
        </x-slot>
    </x-dialog-modal>

</div>
