<div>
	<x-titulo>Relacionar Módulos a Empresas</x-titulo>
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
						<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
							role="alert">
							<div class="flex">
								<div>
									<p class="text-xm bg-lightgreen">{{ session('message') }}</p>
								</div>
							</div>
						</div>
					@endif
					@if ($empresaseleccionada)
					<div class="text-left">
						<button wire:click="mostrarmodal()"
							class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
							Relacionar nuevo Módulo
						</button>
					</div>
					@endif
				</div>

				@if ($isModalOpen)
					@include('livewire.empresa-modulos.createempresamodulos')
				@endif
				@if ($empresas)
					<div class="flex">
						<div class="h-full" style="width: 35%">
							<b>Empresas</b>
							@foreach ($empresas as $empresa)
								<ul>
									<li class="border text-left @if ($seleccionado == $empresa->id) bg-red-100 @endif" wire:click="CargarModulos({{ $empresa->id }})">
										<div class="w-full lg:p-3 hover:scale-105 transition-all duration-500">
											<div class="flex rounded overflow-hidden border flex-wrap">
												@if($empresa->imagen)
													<img class="block p-1 text-center justify-center m-auto rounded-md flex-none bg-cover" src="{{ asset('/'. $empresa->imagen) }}" style="width: 70px; height: 70px;">
												@else
													<img class="block p-1 text-center justify-center m-auto rounded-md flex-none bg-cover" src="{{ asset('images/sin_imagen.jpg') }}"	style="width: 70px; height: 70px;">
												@endif
												<div class="col-12 col-md-8 w-full rounded-b flex flex-col justify-between leading-normal">

													{{-- <div class="text-black pt-4 font-bold text-lg mb-2 leading-tight ml-2 md:fs-6 md:text-sm"> --}}
													<div class="@if ($seleccionado == $empresa->id) bg-red-100 @endif lg:text-lg md:font-bold md:fs-6 text-center md:text-left md:text-sm text-grey-darker text-base">
														{{ $empresa->name }}
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

						<td>
							<div style="width: 65%: border: ligthgrey solid 1px;background: aliceblue;">
								<div class="bg-transparent"><b>Módulos</b></div>
									@if($modulosdelaempresa)
										<div class="flex-wrap flex">
										@foreach ($modulosdelaempresa as $modulo)
												@if($modulo['estado_suscripcion']=="SUSCRITO")
													<div class="w-30 p-2 hover:scale-110 transition-all duration-500 hover:bg-green-300">
														<div class="flex-wrap d-flex rounded overflow-hidden border">
															<div class="">
																<div class="d-flex">
																	<img class="block flex-none bg-cover rounded-md ml-1 mt-1" src="{{ asset('images/'. $modulo['imagen']) }}" style="width: 30px; height: 30px;">
																	<div class="bg-white rounded-b leading-normal p-1" style="left: -30px; float: left;">
																		<div class="text-black font-bold text-xl mb-2 leading-tight">
																			<img class="block flex-none bg-cover"	src="{{ asset('images/activo.png') }}" width="30" height="30">
																		</div>
																	</div>
																</div>
																<div class="w-full bg-white rounded-b pl-4 flex flex-col justify-between leading-normal">
																	<div class="text-black font-bold text-sm mb-2 mt-1 leading-tight">
																		{{ $modulo['name'] }}
																	</div>
																</div>
															</div>
														</div>
													</div>
												@endif
										@endforeach
										</div>
									@else
										<p class="mt-4 bg-red-100 rounded-md mx-5">
											No hay datos para mostrar o no hay módulos relacionados con la empresa
										</p>
									@endif
								</div>
							</div>
						</td>
					</div>
				@else
					<h1>No hay datos</h1>
				@endif
			</div>
		</div>
	</div>
</div>


