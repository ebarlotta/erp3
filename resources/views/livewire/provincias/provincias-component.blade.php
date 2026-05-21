<div>
    <x-titulo>Provincias</x-titulo>
    {{-- <x-slot name="header">
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            @livewire('submenu')
        </div>

    </x-slot> --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <div class="flex justify-around">
                @can('provincias.Agregar')
                    <x-crear>Nueva Provincia</x-crear>
                    @if ($isModalOpen)
                        @include('livewire.provincias.createprovincias')
                    @endif
                @endcan
                <input type="text" wire:model="search" placeholder="Introduzca Filtro" wire:keyup="Filtrar" style="height: 2.5rem; background-color: lightgray;  border-radius: 10px; padding-left: 10px; margin-left: 4px;">
                <div class="w-1/2 justify-end">{{ $provincias->links() }}</div>
            </div>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Descripción</th>
                        <th class="px-4 py-2">Nacionalidad</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($provincias as $provincia)
                    <tr>
                        <td class="border px-4 py-2">{{ $provincia->provincia_descripcion }}</td>
                        <td class="border px-4 py-2">{{ $provincia->nacionalidad->nacionalidad_descripcion }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                @can('provincias.Modificar')
                                    <!-- Editar  -->
                                    <x-editar id="{{$provincia->id}}"></x-editar>
                                @endcan
                                @can('provincias.Eliminar')
                                    <!-- Eliminar -->
                                    <x-eliminar id="{{$provincia->id}}"></x-eliminar>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
