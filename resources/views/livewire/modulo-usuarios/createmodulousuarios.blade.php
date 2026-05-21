<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
	<div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0"
		style="background-color: beige; ">
		<div class="fixed inset-0 transition-opacity">
			<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
		</div>

		<span class="hidden sm:inline-block sm:align-middle "></span>
		<div class="inline-block align-center bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:w-3/5" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
			<form>
				<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
					<div class="">
						<div class="mb-4">
							@if($moduloseleccionado)
								<div style="width: 100%;background-color: bisque;border-radius: 20px;height: 5rem;justify-content: center;display: flex; margin: 4px;	align-items: center; text-align: center; padding-top:1px; font-size: 2rem;">
									{{ $moduloseleccionado->name }}
								</div>
                                @if (session()->has('success'))
                                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                                        role="alert">
                                        <div class="flex">
                                            <div>
                                                <p class="text-xm bg-lightgreen">{{ session('success') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="bg-red-200 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                                        role="alert">
                                        <div class="flex">
                                            <div>
                                                <p class="text-xm bg-lightred">{{ session('error') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="">
                                    <div style="display: flex; flex-wrap: wrap; width: 50%">
                                        <p>Usuarios</p>
                                        @foreach ($usuariosNOmodulo as $user)
                                        <div class="flex d-flex" style="width: max-content; background-color: bisque;border-radius: 20px; justify-content: center;display: block; margin: 4px; align-items: center; text-align: center; padding-top:1px; display: flex; padding-left:2rem; padding-right:2rem;">
                                                @if($user['profile_photo_path'])
                                                    <img src="{{ asset($user['profile_photo_path']) }}" width="40" height="20" style="border-radius: 10px; margin-right: 10px;">
                                                @else
                                                    <img src="{{ asset('images/sin_imagen.jpg') }}" width="40" height="20" style="border-radius: 10px; margin-right: 10px;">
                                                @endif
                                                {{-- <div style="position: inherit; justify-content: end; display: flex; margin-right: -21px; margin-top: 5px;" placeholder="Agregar" wire:click="AgregarUsuario({{ $user['id'] }})"> --}}
                                                <img src="{{ asset('images/activo.png') }}" width="20" height="20" wire:click="AgregarUsuario({{ $user['id'] }})">
                                                {{-- </div> --}}
                                                <p>{{ $user['name'] }}</p>
                                                <p>{{ $user['email'] }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div style="width: 50%; display: flex; flex-direction: column; align-items: flex-end;">
                                        <p>Usuarios Habilitados</p>
                                        @foreach ($usuariosdelmodulo as $usx)
                                            <div style="width: max-content; background-color: rgb(160, 233, 100);border-radius: 20px; justify-content: center;display: block; margin: 4px; align-items: center; text-align: center; padding-top:1px; padding-left:2rem; padding-right:2rem; height: 2.5rem;">
                                                <div style="position: inherit; justify-content: end; display: flex; margin-right: -21px; margin-top: 5px;" placeholder="Eliminar" wire:click="EliminarUsuario({{ $usx['id'] }})">
                                                    @if($user['profile_photo_path'])
                                                        <img src="{{ asset($user['profile_photo_path']) }}" width="40" height="20" style="border-radius: 10px; margin-right: 10px;">
                                                    @else
                                                        <img src="{{ asset('images/sin_imagen.jpg') }}" width="40" height="20" style="border-radius: 10px; margin-right: 10px;">
                                                    @endif
                                                    <img src="{{ asset('images/pasivo.jpg') }}" width="20" height="20">
                                                    <b>{{ $usx['name'] }}</b>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
							@endif
						</div>
						<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
							<x-guardar></x-guardar>
							<x-cerrar></x-cerrar>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
