<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
    <style>
        .fondo-par {
            background-color: #ccc7c7; /* Gris claro */
        }
        .fondo-impar {
            background-color: #cec096; /* Blanco u otro color deseado */
        }
    </style>

    <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pb-1 sm:p-6 sm:pb-1">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-md font-bold mb-2">Copiar Elemento de: {{ $plan_nombre }}</label>
                    </div>
                </div>
                <div class="bg-white px-4  pb-1 sm:pb-1">

                    <div class="col-12 flex d-flex">
                        {{-- Día --}}
                        <div class="mb-4 col-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Día</label>
                            <select class="form-control" wire:model="dia_copia">
                                <option value="">-- Seleccione un día --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                
                            </select>
                            @error('menu_elegido') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{-- Momento del Día --}}
                        <div class="mb-4 col-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Día</label>
                            <select class="form-control" wire:model="momento_dia_id_copia">
                                <option value="">-- Seleccione un momento --</option>
                                @foreach($momentos as $momento)
                                    <option value="{{ $momento->id }}">{{ $momento->descripcion}}</option>
                                @endforeach                            
                            </select>
                            @error('menu_elegido') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">                    
                    <button wire:click="CopiarMenuPlanStore()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-green-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-green-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 ml-1">Guardar</button>    
                    <button wire:click="openisModalOpenCopiarMenuPlan()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 mr-1">Cerrar</button>                
                </div>
            </form>
        </div>
    </div>
</div>
