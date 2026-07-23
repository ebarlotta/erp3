<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:w-3/5 ml-6"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <div style="width: 100%;background-color: bisque;border-radius: 20px;height: 4rem;justify-content: center;display: flex;	align-items: center; text-align: center; padding-top:1px; font-size: 2rem;">
                                {{ $empresaseleccionada->name }}
                            </div>
                            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                                @foreach ($usuariosNOempresa as $user)
                                    <div style="width: max-content;background-color: bisque;border-radius: 20px;height: 4rem;justify-content: center;display: block; margin: 4px; align-items: center; text-align: center; padding-top:1px; padding-left:2rem; padding-right:2rem;" wire:click="CapturarIdUsuario({{ $user->id }})">
                                        <div style="position: inherit; justify-content: end; display: flex; margin-right: -21px; margin-top: 5px;" placeholder="Agregar">
                                            <img src="{{ asset('images/pasivo.jpg') }}" width="20" height="20">
                                        </div>
                                        <p style="margin-top: -10px;">{{ $user->name }}</p>
                                        <p style="margin-top: -14px;">{{ $user->email }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                                @foreach ($usuariosdelaempresa as $usx)
                                    <div
                                        style="width: max-content; background-color: rgb(160, 233, 100);border-radius: 20px;height: 5rem;justify-content: center;display: block; margin: 4px; align-items: center; text-align: center; padding-top:1px; padding-left:2rem; padding-right:2rem;">
                                        <div style="position: inherit; justify-content: end; display: flex; margin-right: -21px; margin-top: 5px;"
                                            placeholder="Eliminar" wire:click="EliminarUsuario({{ $usx['user_id'] }})">
                                            <img src="{{ asset('images/pasivo.jpg') }}" width="20" height="20">
                                        </div>
                                        <b>{{ $usx['name'] }}</b>
                                    </div>
                                @endforeach
                            </div>
                            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                                <select name="" id="" wire:model="rol_nuevo_usuario">
                                    <option value="">--- Seleccione un rol ---</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if (session()->has('messageerrormodal'))
                            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3" role="alert">
                                <div class="flex">
                                    <div><p class="text-xm bg-lightgreen">{{ session('messageerrormodal') }}</p></div>
                                </div>
                            </div>
                        @endif
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                             {{-- <x-guardar></x-guardar> --}}
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="AgregarUsuario({{ $user->id }})" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-300 text-base leading-6 font-bold text-white-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Guardar
                                </button>
                            </span>
                            <x-cerrar></x-cerrar>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
