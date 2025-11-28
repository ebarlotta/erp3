<div>
    <x-titulo>Menúes</x-titulo>
    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="mx-auto sm:px-6 lg:px-8">
                {{-- max-w-7xl --}}
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                            <div class="flex">
                                <div><p class="text-xm bg-lightgreen">{{ session('message') }}</p></div>
                            </div>
                        </div>
                    @endif

                    @if ($isModalOpenGestionar)
                        @include('livewire.geri.menu.gestionarmenu')
                    @else
                        <div class="flex justify-around">
                            @can('menu.Agregar')
                                <x-crear>Nuevo Menú</x-crear>
                                @if ($isModalOpen)
                                    @include('livewire.geri.menu.createmenu')
                                @endif
                            @endcan
                                <a href="{{ route('elementos') }}">
                                    <button wire:click="create()" class="px-2 bg-green-300 hover:bg-green-400 text-white-900 font-bold rounded" style="height: 40px; margin-bottom: 10px;">
                                        Nuevo Ingrediente
                                    </button>
                                </a>
                            <div>
                                <input type="text" class="bg-blue-200 p-2 rounded" placeholder="Buscar" wire:model="search" wire:keyup="resumir($event.target.value)">
                            </div>
                            <div>
                                <input type="radio" name="opciones" value="1" wire:click="CambiarLocal(1)">Sólo Locales<br>
                                <input type="radio" name="opciones" value="0" wire:click="CambiarLocal(0)">Todos
                            </div>
                            <div class="w-1/2 justify-end">{{ $datos->links() }}</div>

                        </div>
                        <div class="px-4" style="display: block">
                            <table class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="table-primary align-middle text-center ml-2">Nombre del Menú</th>
                                        <th class="table-primary align-middle text-center col-1">Para cuántas personas</th>
                                        <th class="table-primary align-middle text-center col-1">Activo</th>
                                        <th class="table-primary align-middle text-center col-1">Mantener Público</th>
                                        <th class="table-primary align-middle text-center col-1">Tiempo de Preparción</th>
                                        <th class="table-primary align-middle text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datos as $menu)
                                        <tr>
                                            <td class="pl-2">
                                                {{ $menu->nombremenu }}
                                                @if(session('empresa_id')<>$menu->empresa_id)
                                                    <i class="nav-icon far fa-circle text-info" style="border: solid 1px aliceblue;padding: 3px;border-radius: 10px;background-color: antiquewhite;"> Público importado</i>
                                                @endif
                                            </td>
                                            <td class="text-center col-1">
                                                {{ $menu->ppersonas }}
                                            </td>
                                            <td class=" col-1">
                                                <div class="flex justify-center">
                                                    @if($menu->menuactivo)
                                                        <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="habilitar({{ $menu->id }}, {{ $menu->menuactivo }})">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                        @else
                                                        <!------- on ----->
                                                        <span class="border rounded-full border-grey flex items-center cursor-pointer w-12 bg-red-500 justify-end"  wire:click="habilitar({{ $menu->id }}, {{ $menu->menuactivo }})">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-center">
                                                    @if($menu->publico)
                                                        <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="publicar({{ $menu->id }}, {{ $menu->publico }})">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                        @else
                                                        <!------- on ----->
                                                        <span class="border rounded-full border-grey flex items-center cursor-pointer w-12 bg-red-500 justify-end"  wire:click="publicar({{ $menu->id }}, {{ $menu->publico }})">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-center col-1">{{ $menu->tiempopreparacion }}</td>
                                            <td class="" style="width: 20%;">
                                                <div style="display: flex">
                                                    <!-- Gestionar  -->
                                                    <x-gestionar id="{{ $menu->id }}"></x-gestionar>

                                                    @can('menu.Modificar')
                                                        <!-- Editar  -->
                                                        <x-editar id="{{ $menu->id }}"></x-editar>
                                                    @endcan
                                                    @can('menu.Eliminar')
                                                        <!-- Eliminar -->
                                                        <x-eliminar id="{{ $menu->id }}"></x-eliminar>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
