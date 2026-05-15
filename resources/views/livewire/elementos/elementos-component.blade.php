<div>
    <x-titulo>Elementos</x-titulo>

    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="flex">
                        <div style="width: 30%; display:flex">
                            @can('elementos.Agregar')
                                <x-crear>Nuevo Elemento</x-crear>
                            @endcan

                            <input type="text" class="bg-blue-200 mx-2 mb-2 rounded pl-2" placeholder="Buscar" wire:model="search" wire:keyup="resumir($event.target.value)">
                        </div>

                        <div style="background-color: lightgray; display: flex; justify-content: space-between; border-radius:10px" class="mb-2 w-full">
                            <div class="my-auto mx-auto rounded-md p-2 @if($seleccionado=='Medicamento') bg-red-400 @endif" wire:click="cambiarSeleccion('Medicamento')" >
                                <input class="mr-2" type="radio" name="elements" value="Medicamento" checked>
                                <label class="mr-4" for="huey">Medicamento</label>
                            </div>

                            <div class="my-auto mx-auto rounded-md p-2 @if($seleccionado=='Ingrediente') bg-red-300 @endif" wire:click="cambiarSeleccion('Ingrediente')" >
                                <input class="mr-2" type="radio" name="elements" value="Ingrediente">
                                <label class="mr-4" for="huey">Ingrediente</label>
                            </div>
                            <div class="my-auto mx-auto rounded-md p-2 @if($seleccionado=='Descartable') bg-red-200 @endif" wire:click="cambiarSeleccion('Descartable')">
                                <input class="mr-2" type="radio" name="elements" value="Descartable">
                                <label class="mr-4" for="huey">Descartable</label>
                            </div>

                            <div class="my-auto mx-auto rounded-md p-2 @if($seleccionado=='Producto') bg-red-100 @endif" wire:click="cambiarSeleccion('Producto')">
                                <input class="mr-2" type="radio" name="elements" value="Producto">
                                <label class="mr-4" for="huey">Producto</label>
                            </div>

                            <div class="my-auto mx-auto rounded-md p-2 @if($seleccionado=='Articulo') bg-red-300 @endif" wire:click="cambiarSeleccion('Articulo')">
                                <input class="mr-2" type="radio" name="elements" value="Artíulo">
                                <label class="mr-4" for="huey">Artículo</label>
                            </div>
                        </div>
                        @if ($isModalOpen) @include('livewire.elementos.createelemento') @endif
                        @if ($isModalDelete) @include('livewire.elementos.deleteelemento') @endif
                        {{-- <div class="w-1/2 justify-end">{{ $datos->links() }}</div> --}}
                    </div>
                    <div class="mt-2" style="display: block">
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-1 col-5">Elemento</th>
                                    <th class="px-4 py-1 col-1 text-center">Existencia</th>
                                    <th class="px-4 py-1 col-2 text-center">Precio de Compra</th>
                                    <th class="px-4 py-1 col-1 text-center">Precio de Venta</th>
                                    <th class="py-1 col-1 text-center">Stock Mínimo</th>
                                    <th class="px-4 py-1 col-2 text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($datos)
                                    @foreach ($datos as $elemento)
                                        <tr>
                                            <td class="border px-4 py-1">{{ $elemento->name }}</td>
                                            <td class="border px-4 py-1 col-1 text-center">{{ $elemento->existencia }}</td>
                                            <td class="border px-4 py-1 col-2 text-center">{{ $elemento->precio_compra }}</td>
                                            <td class="border px-4 py-1 col-1 text-center">{{ $elemento->precio_venta }}</td>
                                            <td class="border py-1 col-1 text-center">{{ $elemento->stock_minimo }}</td>
                                            <td class="border px-4 py-1 col-2">
                                                <div class="block justify-center flex">
                                                {{--  style="width: 20%; margin: auto; justify-content: space-around;align-items: center;" --}}
                                                    @can('elementos.Modificar')
                                                        <!-- Editar  -->
                                                        <x-editar id="{{ $elemento->elemento_id }}"></x-editar>
                                                    @endcan
                                                    @can('elementos.Eliminar')
                                                        <!-- Eliminar -->
                                                        <button wire:click="delete({{ $elemento->elemento_id }})" class="lg:hidden bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 mt-1 rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        </button>
                                                        <button wire:click="delete({{ $elemento->elemento_id }})" class="hidden lg:flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 rounded mt-1w">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                            Eliminar
                                                        </button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    No hay elementos
                                @endif
                            </tbody>
                        </table>
                        {{ $datos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
