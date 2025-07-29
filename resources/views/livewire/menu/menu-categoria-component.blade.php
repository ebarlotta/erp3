<div>
    <div class="d-flex" style="justify-content: center;">
        <h5 class="col-12 text-center">Categorías</h5><br>
        <div class="flex d-flex flex-wrap" style="justify-content: center;">
            {{-- <div style="background-color: antiquewhite;border-radius: 20px;box-shadow: 5px 5px 20px 5px #000; padding: 10px; margin: 10px;  max-width: 25%; width: 100%;">
                <div style="justify-content: center;display: flex;">
                    <a href="cincuentaydos/carta/1695/" style="text-decoration: none;">
                        <img src="https://ipage.ar/cartaonline/css_personalizado/logos52/CAFETERIA.png" alt="category" style="max-width: 100%; height: auto;">
                        <h5 style="margin-top: 5px; font-size: 1.2em;">Cafetería</h5>
                    </a>
                </div>
            </div>
            <div style="background-color: antiquewhite;border-radius: 20px;box-shadow: 5px 5px 20px 5px #000; padding: 10px; margin: 10px;  max-width: 25%; width: 100%;">
                <div style="justify-content: center;display: flex;">
                    <a href="cincuentaydos/carta/1695/" style="text-decoration: none;">
                        <img src="https://ipage.ar/cartaonline/css_personalizado/logos52/CAFETERIA.png" alt="category" style="max-width: 100%; height: auto;">
                        <h5 style="margin-top: 5px; font-size: 1.2em;">Cafetería</h5>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="flex d-flex flex-wrap" style="justify-content: center;">
        <div class="flex- d-flex">
            <div class="flex d-flex">
                <label for="" class="w-full justify-center">Nombre de la Categoría</label>
                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required wire:model="menu_nombre_categoria" />
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" wire:click="AgregarCategoria();">Agregar</button>
            </div>
        </div>
        <div style="border-radius: 20px;box-shadow: 5px 5px 20px 5px #000; padding: 10px; margin: 10px;  max-width: 90%; width: 100%;">
            <div style="justify-content: center;display: flex;">
                <table class="table table-striped table-bordered w-full px-3">
                    <tr style=" width:100%">
                        <td><b>Nombre Categoría</b></td>
                        <td><b>Opciones</b></td>
                    </tr>
                    @foreach ($categorias as $categoria)
                        <tr style="border: 2px solid gray; width:100%; margin: 3px; display: revert;">
                            <td style="background-color: white; border-radius: 10px; padding: 6px; margin: 9px; display: block;" >{{ $categoria->menu_nombre_categoria }}</td>
                            <td style="background-color: aliceblue; width:30%">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-1 px-4 rounded-full" wire:click="AgregarCategoria();">Modificar</button>
                                @if($categoria->menu_habilitada)
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold my-1 px-4 rounded-full" wire:click="HabilitarCategoria({{ $categoria->id }});">Desabilitar</button>
                                @else
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold my-1 px-4 rounded-full" wire:click="HabilitarCategoria({{ $categoria->id }});">Habilitar</button>
                                @endif
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold my-1 px-4 rounded-full" wire:click="EliminarCategoria({{ $categoria->id }});">Eliminar</button>
                                {{-- <input type="btn btn-success" value="Guardar">
                                <input type="btn btn-danger" value="Eliminar"> --}}
                            </td>
                        </tr>
                    @endforeach
                </table>                
            </div>
        </div>
    </div>
    {{-- <button type="submit" id="btn_submit" onclick="clicks++;if(clicks>1){return false};" class="btn btn-success" style="display: block; position: fixed; bottom: 20px; right: 20px; z-index: 1;"><i class="fas fa-save"></i> Guardar</button> --}}
    <button class="bg-gray-500 hover:bg-gray-700 font-bold my-1 px-6 rounded-full" onclick="history.back()" style="display: block; position: fixed; bottom: 20px; right: 20px; z-index: 1;">Volver</button>

    {{-- <a href="/home" class="btn btn-secondary"><i class="fa fa-undo-alt"></i> Volver</a> --}}

</div>