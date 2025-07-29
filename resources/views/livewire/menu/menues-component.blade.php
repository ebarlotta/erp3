<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="flex d-flex flex-wrap" style="justify-content: center;">
        <div class="flex- d-flex  col-10">
            <div class="flex d-flex">
                <label for="" class="w-full justify-center">Nombre del Menú</label>
                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required wire:model="menu_nombre_menu" />
            </div>
            <div class="flex d-flex">
                <label for="" class="w-full justify-center">Categoría</label>
                <select class="form-control" wire:model="menu_categoria_id" style="background-color: white;border: 1px solid lightgray;border-radius: 10px;padding: 10px; margin-top: 5px;">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->menu_nombre_categoria }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex- d-flex  col-2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full col-12" wire:click="AgregarMenu();">Agregar</button>
        </div>
        <div style="border-radius: 20px;box-shadow: 5px 5px 20px 5px #000; padding: 10px; margin: 10px;  max-width: 90%; width: 100%;">
            <div style="justify-content: center;display: flex;">
                <table class="table table-striped table-bordered w-full px-3">
                    <tr style=" width:100%">
                        <td><b>Nombre Categoría</b></td>
                        <td><b>Opciones</b></td>
                    </tr>
                    @foreach($menus as $menu)
                        <tr style="border: 2px solid gray; width:100%; margin: 3px; display: revert;">
                            <td style="background-color: white; border-radius: 10px; padding: 6px; margin: 9px; display: block;" >{{ $menu->menu_nombre_menu }}</td>
                            <td style="background-color: aliceblue; width:30%">
                                <div class="flex justify-center">
                                    <!-- Desde 640 en adelante -->
                                    <a href="menueditar">
                                    <button wire:click="editar({{ $menu->id }})" class="hidden lg:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-1 px-4 mr-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                        Editar
                                    </button>
                                    </a>
                                    <!-- Menos 640 en adelante -->
                                    <a href="menueditar">
                                        <button wire:click="editar({{ $menu->id }})" class="lg:hidden bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-1 px-1 mt-1 ml-1 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </button>
                                    </a>
                                    <!-- Desde 640 en adelante -->
                                    <button wire:click="EliminarMenu({{ $menu->id }});" class="hidden lg:flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-4 rounded mt-1w">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Eliminar
                                    </button>
                                    <!-- Menos 640 en adelante -->
                                    <button wire:click="EliminarMenu({{ $menu->id }});" class="lg:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 rounded mt-1 ml-1 mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                
                                    {{-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-1 px-4 rounded-full" wire:click="AgregarMenu();">Modificar</button> --}}
                                    @if($menu->menu_habilitada)
                                        <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start h-6" wire:click="HabilitarMenu({{ $menu->id }});" style="margin-top: 7px;">
                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow"></span>
                                        </span>
                                    {{-- <button class="bg-red-500 hover:bg-red-700 text-white font-bold my-1 px-4 rounded-full" wire:click="HabilitarMenu({{ $menu->id }});">Desabilitar</button> --}}
                                    @else
                                        <span class="border rounded-full border-grey bg-red-400 flex items-center cursor-pointer w-12 bg-red justify-end h-6" wire:click="HabilitarMenu({{ $menu->id }});" style="margin-top: 7px;">
                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow"></span>
                                        </span>
                                    {{-- <button class="bg-green-500 hover:bg-green-700 text-white font-bold my-1 px-4 rounded-full" wire:click="HabilitarMenu({{ $menu->id }});">Habilitar</button> --}}
                                    @endif
                                    {{-- <button class="bg-red-500 hover:bg-red-700 text-white font-bold my-1 px-4 rounded-full" wire:click="EliminarMenu({{ $menu->id }});">Eliminar</button> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
