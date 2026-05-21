<div>
	<x-titulo>Relacionar Usuarios a distintos Módulos</x-titulo>
	<x-slot name="header">
		<div class="flex">
			<!-- //Comienza en submenu de encabezado -->

			<!-- Navigation Links -->
			{{-- @livewire('submenu') --}}
		</div>

	</x-slot>

	<div class="content-center flex">
		<div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-1">
					@if (session()->has('message'))
						<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
							<div class="flex">
								<div>
									<p class="text-xm bg-lightgreen">{{ session('message') }}</p>
								</div>
							</div>
						</div>
					@endif
					@if ($seleccionado)
					<div class="text-left">
						<button wire:click="mostrarmodal()"	class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
							Relacionar nuevo Usuario
						</button>
                        <input type="text" wire:model="search" placeholder="Introduzca Filtro" wire:keyup="Filtrar" style="height: 2.5rem; background-color: lightgray;  border-radius: 10px; padding-left: 10px; margin-left: 4px;     width: 6rem;">
					</div>
					@endif
				</div>
				@if ($isModalOpen)
					@include('livewire.modulo-usuarios.createmodulousuarios')
				@endif
				@if ($datos)
				<div class="flex">
					<div class="h-full w-1/2" >
						Módulos <br>
						@foreach ($datos as $modulo)
							<ul>
								<li class="border text-left @if ($seleccionado==$modulo->id) bg-red-100 @endif" wire:click="CargarUsuarios({{ $modulo->id }})">
									<div class="w-full lg:p-3 hover:scale-110 transition-all duration-500">
										<div class="flex rounded overflow-hidden border @if ($seleccionado==$modulo->id) bg-red-100 @endif">
											<img class="block p-1 text-center justify-center m-auto rounded-md flex-none bg-cover" src="{{ asset('images/'. $modulo->imagen) }}" style="width:70px; height: 70x;">
											<div class="@if ($seleccionado==$modulo->id) bg-red-100 @endif col-12 col-md-8 w-full rounded-b flex flex-col justify-between leading-normal">
												<div class="h-full lg:text-lg md:font-bold md:fs-6 text-left md:text-center md:text-sm text-grey-darker text-base">
                                                    {{ $modulo->name }}
                                                </div>
												{{-- <p class="text-grey-darker text-base">Read more</p> --}}
											</div>
										</div>
									</div>
								</li>
							</ul>
						@endforeach
						<div class="w-full">{{ $datos->links() }}</div>
					</div>
					<div style="width: 50%">
						<div class="bg-transparent"><b>Usuarios</b></div>
						@if ($usuariosdelmodulo)
							<div class="flex-wrap flex">
						    @foreach ($usuariosdelmodulo as $usuario)
							<ul class="w-full">
								<li class="border text-left bg-red-100">
									<div class="w-full p-2 hover:scale-110 transition-all duration-500">
										<div class="d-flex rounded overflow-hidden">
                                            <div class="d-flex flex">
                                                @if($usuario['profile_photo_path'])
                                                    <img class="block flex-none bg-cover rounded-md ml-1 mt-1" src="{{ asset($usuario['profile_photo_path']) }}" style="width: 40px; height: 40px;">
                                                @else
                                                    <img class="block flex-none bg-cover rounded-md ml-1 mt-1" src="{{ asset('images/sin_imagen.jpg') }}" style="width: 40px; height: 40px;">
                                                @endif
                                                <div class="text-black font-bold text-xl mb-2 leading-tight d-flex flex">
                                                    <img class="block bg-cover mt-2 px-1 py-1 mx-1" src="{{  asset('images/activo.png') }}" style="width: 25px; height: 25px;">
                                                    <div class="h-full lg:text-lg md:font-bold md:fs-6 text-left md:text-center md:text-sm text-grey-darker text-base">
                                                        {{ $usuario['name'] }}
                                                    </div>
                                                </div>
                                            </div>
										</div>
									</div>
								</li>
							</ul>
						@endforeach
						@endif
					</div>
				</div>
				@else
					<h1>No hay datos</h1>
				@endif
			</div>
		</div>
	</div>
</div>
