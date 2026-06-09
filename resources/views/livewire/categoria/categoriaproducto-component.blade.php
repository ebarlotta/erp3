<div>
    <x-titulo>Categorias de los Productos</x-titulo>


    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-1">

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

                    <div class="flex justify-around">
                        @can('categoriaproducto.Agregar','web'.session('empresa_id'))
                            <x-crear>Nueva Categoría Producto</x-crear>
                            @if ($isModalOpen)
                                @include('livewire.categoria.createcategoriaproducto')
                            @endif
                        @endcan
                        <input type="text" wire:model="search" placeholder="Introduzca Filtro" wire:keyup="Filtrar" style="height: 2.5rem; background-color: lightgray;  border-radius: 10px; padding-left: 10px; margin-left: 4px;">
                        <div class="w-1/2 justify-end">{{ $categorias->links() }}</div>
                    </div>

                    <div style="display: block">
                        <table class="table-fixed table-striped w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2" style="background-color: rgb(164, 157, 157);">Nombre de la Categoría</th>
                                    <th class="px-4 py-2" style="background-color: rgb(164, 157, 157);">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categorias)
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td class="border px-4 py-2 text-left">{{ $categoria->name }}</td>
                                            <td class="border px-4 py-2">
                                                <div class="flex justify-center">
                                                    @can('categoriaproducto.Modificar','web'.session('empresa_id'))
                                                        {{-- @if(session('categoriasdeproductos.Editar')) --}}
                                                            <!-- Editar  -->
                                                            <x-editar id="{{ $categoria->id }}"></x-editar>
                                                        {{-- @endif --}}
                                                    @endcan
                                                    @can('categoriaproducto.Eliminar','web'.session('empresa_id'))
                                                        {{-- @if(session('categoriasdeproductos.Eliminar')) --}}
                                                            <!-- Eliminar -->
                                                            <x-eliminar id="{{ $categoria->id }}"></x-eliminar>
                                                        {{-- @endif --}}
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
