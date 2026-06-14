<div>
	{{-- @extends('layouts.app2') --}}
	<x-tituloslim>Comprobantes de Ventas - <?php echo session('nombre_empresa').'<br>'; ?></x-tituloslim>

	<script>
        $('.content-wrapper').click(function (e) {
            var get_class = $("#cust_sidebar").attr('class');
            console.log(get_mini);
            if (get_class == "control-sidebar control-sidebar-dark control-sidebar-open") {
                $('#cust_sidebar').removeClass('control-sidebar-open');
            }
        })
    </script>
    <style>
        label {
            margin-bottom: 0;
        }
        .fondoblanco {
            background-color: white;
            box-shadow: 2px 2px 5px #999;
        }
        .fondogris {
            background-color: rgba(255, 255, 255, 0.687);
            box-shadow: 2px 2px 5px #999;
        }

    </style>
	<div class="content-center block">
		<div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
			{{-- LOADING --}}
			<!-- Tabs  -->
			<div class="flex flex-wrap" id="tabs-id">
				<div class="w-full">
					<ul class="flex mb-0 list-none flex-wrap pb-2 flex-row">
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center" style="text-decoration: none;">
							@if($tabActivo==1)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(1)">
							@else
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(1)">
							@endif
								<i class="fas fa-space-shuttle text-base mr-1"></i> Gestionar Comprobantes
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							@if($tabActivo==2)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(2)">
							@else
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(2)">
							@endif
								<i class="fas fa-cog text-base mr-1"></i> Deuda a Clientes
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							@if($tabActivo==3)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(3)">
							@else
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(3)">
							@endif
								<i class="fas fa-briefcase text-base mr-1"></i> Crédito de Clientes
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							@if($tabActivo==4)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(4)">
							@else
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(4)">
							@endif
								<i class="fas fa-cog text-base mr-1"></i> Cuentas Corrientes
							</a>
						</li>
						<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
							@if($tabActivo==5)
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="CambiarTab(5)">
							@else
								<a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-pink-600 bg-white" wire:click="CambiarTab(5)">
							@endif
								<i class="fas fa-briefcase text-base mr-1"></i> Libros de Iva
							</a>
						</li>
					</ul>
					<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
						<div class="tab-content tab-space">
							<div class="{{ $tabActivo != 1 ? 'hidden' : '' }}">
								<div style="background-color: #E3F6CE" class="block">
									<!-- Botones -->
									<div class="flex justify-center">
										<div class="flex flex-wrap justify-center">
											@can('ventas.Agregar','web'.session('empresa_id'))
												<button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3" style="box-shadow: 2px 2px 5px #999;" wire:click="store">Agregar</button>
											@endcan
											@can('ventas.Modificar','web'.session('empresa_id'))
												<button class="rounded-md bg-yellow-300 px-6 py-1 mx-2 mt-3" style="box-shadow: 2px 2px 5px #999;" wire:click="openModalModify">Modificar</button>
											@endcan
											@can('ventas.Eliminar','web'.session('empresa_id'))
												<button class="rounded-md bg-red-300 px-6 py-1 mx-2 mt-3" style="box-shadow: 2px 2px 5px #999;" wire:click="openModalDelete">Eliminar</button>
											@endcan
											{{-- <button class="rounded-md bg-blue-300 px-6 py-1 mx-2 mt-3" style="box-shadow: 2px 2px 5px #999;" wire:click="Facturar();">Facturar</button> --}}
											@can('ventas.VentasAgregarProductos.Ver','web'.session('empresa_id'))
												<button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3" style="box-shadow: 2px 2px 5px #999;" wire:click="openModalAgregarDetalle">Agregar Productos</button>
											@endcan
											@can('ventas.VentasGenerarFactura.Ver','web'.session('empresa_id'))
												<button class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3" style="box-shadow: 2px 2px 5px #999;" wire:click="GenerarFactura">Generar Factura</button>
											@endcan
											<div class=" right-0">
												@if (session()->has('message'))
													<div class="rounded-md bg-green-300 px-6 mx-2 py-1 mt-3" role="alert">
															{{ session('message') }}</p>
													</div>
												@endif
												@if (session()->has('message2'))
													<div class="rounded-md bg-yellow-300 px-6 py-1 mx-2 mt-3" role="alert">
														{{ session('message2') }}
													</div>
												@endif
												@if (session()->has('message3'))
													<div class="rounded-md bg-red-300 px-6 py-1 mx-2 mt-3" role="alert">
														{{ session('message3') }}
													</div>
												@endif
											</div>
										</div>
									</div>
									<!-- Modals -->
									@if ($this->ModalDelete)
										<div class="inset-0 fixed">
											<div class="absolute flex justify-center w-full mt-10 p-18">
												<div class=" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2" role="dialog">
													<div class=" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
														Los datos van a ser eliminados, seguro que quiere continuar con la operación?
												</div>
													<div class="flex justify-end">
														<!-- Botón de Eliminar-->
														<button class="rounded-md border m-6 px-4 py-2 bg-red-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="delete()">Eliminar</button>
														<!-- Botón de Cerrar -->
														<button class="rounded-md border m-6 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="closeModalDelete()">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									@endif

									@if ($this->ModalModify)
										<div class="inset-0 fixed">
											<div class="absolute flex justify-center w-full mt-10 p-18">
												<div class=" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2" role="dialog">
													<div class=" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
														Los datos van a ser modificados, seguro que quiere continuar con la operación?
												</div>
													<div class="flex justify-end">
														<!-- Botón de Eliminar-->
														<button class="rounded-md border m-6 px-4 py-2 bg-red-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="edit()">Modificar</button>
														<!-- Botón de Cerrar -->
														<button class="rounded-md border m-6 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="closeModalModify()">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									@endif

									@if ($this->ModalAgregarDetalle)
										<div class="inset-0 fixed">
											<div class="absolute flex justify-center w-full mt-10 p-18">
												<div class=" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2" role="dialog">
													<div class=" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
														<input id="sacarelementos" class="ml-2 w-full text-xs rounded-md h-7 text-center" style="disabled" type="text" placeholder="Sacar elemntos al Stock General">
												</div>
													@if($venta_id)
														<div class="flex flex-wrap mt-3 text-xs justify-left">
															<div class="w-40 mr-1">
																<label for="gselect_productos">Producto</label><br>
																<select id="gselect_productos" class="ml-2 w-full text-xs rounded-md h-7 leading-none" wire:model="gselect_productos">
																	<option></option>
																	@foreach ($productos as $producto)
																		<option value="{{ $producto->id }}">{{ $producto->name }}</option>
																	@endforeach
																</select>
																@error('gselect_productos') <span class="text-red-500">{{ $message }}</span>@enderror
															</div>

															<div class="w-40 mr-1">
																<label for="gcantidad_prod">Cantidad</label><br>
																<input id="gcantidad_prod" class="ml-2 w-full text-xs rounded-md h-7 text-right" type="text" wire:model="gcantidad_prod">
																@error('gcantidad_prod') <span class="text-red-500">{{ $message }}</span>@enderror
															</div>

															<div class="w-40 mr-1">
																<label for="gprecio_prod">Precio</label><br>
																<input id="gprecio_prod" class="ml-2 w-full text-xs rounded-md h-7 text-right" type="text" wire:model="gprecio_prod">
																@error('gprecio_prod') <span class="text-red-500">{{ $message }}</span>@enderror
															</div>

															<div class="w-36 mt-2">
																<!-- Botón de Agregar-->
																<button class="rounded-md border px-4 py-1 mt-1 bg-green-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-geen-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="agregar_detalle()">Agregar</button>
															</div>
														</div>

														<div class="flex mt-2 ml-2">
															<table class="w-full text-xs rounded-md" style="border: solid 1px #777; background-color: beige;">
																<tr style="background-color: lightblue;">
																	<th colspan="4">Productos Relacionados</th>
																</tr>
																<tr style="background-color: lightblue;">
																	<td style="border: solid 1px #777;">Nombre del producto</td>
																	<td style="border: solid 1px #777;">Cantidad</td>
																	<td style="border: solid 1px #777;">Precio</td>
																	<td style="border: solid 1px #777;">Opc.</td>
																</tr>

																@if($glistado_prod)
																	@foreach ($glistado_prod as $detalle)
																		<tr>
																			<td class="text-left pl-3" style="border: solid 1px #777;">{{ $detalle->name }}</td>
																			<td class="text-right pr-3" style="border: solid 1px #777;">{{ number_format($detalle->cantidad, 2,'.','') }}</td>
																			<td class="text-right pr-3" style="border: solid 1px #777;">{{ number_format($detalle->precio, 2,'.','') }}</td>
																			<td style="border: solid 1px #777;"><button class="rounded-md border px-4 mt-1 bg-red-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="eliminar_detalle({{ $detalle->id }})">X</button>
																			</td>
																			</tr>
																	@endforeach
																@endif
															</table>
														</div>
													@else
														<div class="flex flex-wrap mt-3 text-xs justify-center">
															<label class="bg-red-300 p-2 rounded">Debe al menos seleccionar algún comprobante para poder relacionarlo con los productos en el stock</label>
														</div>
													@endif
													<div class="flex justify-end">
														<!-- Botón de Cerrar -->
														<button class="rounded-md border m-6 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="closeModalAgregarDetalle()">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									@endif

									@if ($this->ModalGenerarFactura)
										<div class="inset-0 fixed">
											<div class="absolute flex justify-center w-full mt-10 p-18">
												<div class=" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2" role="dialog">
													<div class=" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
														Se generará una factura que será enviada a AFIP, seguro que quiere continuar con la operación?
													</div>
													<div class="flex justify-end">
														<!-- Botón de Eliminar-->
														<button class="rounded-md border m-6 px-4 py-2 bg-red-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="GenerarFactura()">Si, generar Factura</button>
														<!-- Botón de Cerrar -->
														<button class="rounded-md border m-6 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5" wire:click="closeModalGenerarFactura()">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									@endif

									<!-- Gestionar Comprobantes -->
									<div class="flex flex-wrap mt-3 pb-2 justify-around" style="font-size: 14px;">
										<div class="w-34 mr-1">
											<label for="gfecha">Fecha</label><br>
											<input id="gfecha" class="ml-2 w-full rounded-md h-8 text-xs fondoblanco" type="date" wire:model="gfecha" style="box-shadow: 2px 2px 5px #999;">
											@error('gfecha') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-44 mr-1">
											<label for="gcliente">Cliente</label><br>
											<select id="gcliente" class="ml-2 w-full rounded-md h-8 leading-none fondogris" wire:model="gcliente" style="box-shadow: 2px 2px 5px #999;">
												<option value=" "> </option>
												@foreach ($clientes as $cliente)
													<option value="{{ $cliente->id }}">
														{{ $cliente->name }}
													</option>
												@endforeach
											</select>
											@error('gcliente') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-36 mr-1">
											<label for="gcomprobante">Comprobante</label><br>
											<input id="gcomprobante" class="ml-2 w-full rounded-md h-8 fondoblanco" type="text" wire:model="gcomprobante" style="box-shadow: 2px 2px 5px #999;">
										</div>
										<div class="w-32 mr-1">
											<label for="gpartiva">Participa Iva</label><br>
											<select id="gpartiva" class="ml-2 w-full px-1 rounded-md h-8 leading-none fondogris" wire:model="gpartiva" style="box-shadow: 2px 2px 5px #999;">
												<option value=""></option>
												<option value="Si">Si</option>
												<option value="No">No</option>
												<option value="Ganancias">Ganancias</option>
												<option value="IB">IB</option>
												<option value="BsPersonal">BsPersonal</option>
											</select>
											@error('gpartiva') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-40 mr-1">
											<label for="gdetalle">Detalle</label><br>
											<input id="gdetalle" type="text" class="ml-2 w-full rounded-md h-8 fondoblanco" wire:model="gdetalle" style="box-shadow: 2px 2px 5px #999;">
										</div>
										<div class="w-24 mr-1">
											<label for="ganio">Año</label><br>
											<select id="ganio" class="ml-2 w-full rounded-md h-8 leading-none fondogris" wire:model="ganio" style="box-shadow: 2px 2px 5px #999;">
												<option value=""></option>
												<option value="2026">2026</option>
                                                <option value="2025">2025</option>
												<option value="2024">2024</option>
												<option value="2023">2023</option>
												<option value="2022">2022</option>
												<option value="2021">2021</option>
												<option value="2020">2020</option>
												<option value="2019">2019</option>
												<option value="2018">2018</option>
												<option value="2017">2017</option>
												<option value="2016">2016</option>
												<option value="2015">2015</option>
												<option value="2014">2014</option>
												<option value="2013">2013</option>
												<option value="2012">2012</option>
											</select>
											@error('ganio') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-24 mr-1">
											<label for="gmes">Mes</label><br>
											<select id="gmes" class="ml-2 w-full px-1 rounded-md h-8 leading-none fondogris" wire:model="gmes" style="box-shadow: 2px 2px 5px #999;">
												<option value=""></option>
												<option value="1">enero</option>
												<option value="2">febrero</option>
												<option value="3">marzo</option>
												<option value="4">abril</option>
												<option value="5">mayo</option>
												<option value="6">junio</option>
												<option value="7">julio</option>
												<option value="8">agosto</option>
												<option value="9">setiembre</option>
												<option value="10">octubre</option>
												<option value="11">noviembre</option>
												<option value="12">diciembre</option>
											</select>
											@error('gmes') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-32 mr-1">
											<label for="garea">Areas</label><br>
											<select id="garea" class="ml-2 w-full px-1 rounded-md h-8 leading-none fondogris" wire:model="garea" style="box-shadow: 2px 2px 5px #999;">
												<option value=" "> </option>
												@foreach ($areas as $area)
													<option value="{{ $area->id }}">
														{{ $area->name }}
													</option>
												@endforeach
											</select>
											@error('garea') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-32 mr-1">
											<label for="gcuenta">Cuentas</label><br>
											<select id="gcuenta" class="ml-2 w-full px-1 rounded-md h-8 leading-none fondogris" wire:model="gcuenta" style="box-shadow: 2px 2px 5px #999;">
												<option value=" "> </option>
												@foreach ($cuentas as $cuenta)
													<option value="{{ $cuenta->id }}">
														{{ $cuenta->name }}
													</option>
												@endforeach
											</select>
											@error('gcuenta') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>

										<div class="mr-1 w-28">
											<label for="Bruto">Bruto</label><br>
											<input class="num ml-2 w-full text-right rounded-md h-8 fondoblanco" type="text" id="Bruto" name="Bruto" wire:model="gbruto" wire:keyup="CalcularIva()" style="box-shadow: 2px 2px 5px #999;">
											@error('gbruto') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="w-28 mr-1">
											<label for="giva">IVA</label><br>
											<select id="giva" class="ml-2 w-full rounded-md h-8 leading-none" wire:model="giva" wire:change="CalcularIva()" style="box-shadow: 2px 2px 5px #999;">
												<option value="1" selected>Iva 0%</option>
												@foreach ($ivas as $iva)
													<option value="{{ $iva->id }}">
														{{ $iva->descripcion }}
													</option>
												@endforeach
											</select>
											@error('giva') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-24">
											<label for="giva2">Iva</label><br>
											<input id="giva2" class="ml-2 w-full text-right rounded-md h-8 leading-none fondoblanco" disabled type="text" wire:model="giva2" style="box-shadow: 2px 2px 5px #999;">
											@error('giva2') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="gexento">Exento</label><br>
											<input id="gexento" class="num ml-2 w-full text-right rounded-md h-8 leading-none fondoblanco" type="text" wire:model="gexento" wire:keyup="CalcularNeto()" style="box-shadow: 2px 2px 5px #999;">
											@error('gexento') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-24">
											<label for="gimpinterno">Imp.Interno</label><br>
											<input id="gimpinterno" class="num ml-2 w-full text-right rounded-md h-8 fondoblanco" type="text" wire:model="gimpinterno" wire:keyup="CalcularNeto()" style="box-shadow: 2px 2px 5px #999;">
											@error('gimpinterno') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="gperciva">Ret/Perc.Iva</label><br>
											<input id="gperciva" class="num ml-2 w-full text-right rounded-md h-8 fondoblanco" type="text" wire:model="gperciva" wire:keyup="CalcularNeto()" style="box-shadow: 2px 2px 5px #999;">
											@error('gperciva') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="gperib">Ret/Perc.IB</label><br>
											<input id="gperib" class="num ml-2 w-full text-right rounded-md h-8 fondoblanco" type="text" wire:model="gperib" wire:keyup="CalcularNeto()" style="box-shadow: 2px 2px 5px #999;">
											@error('gperib') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="gretgan">RetGan</label><br>
											<input id="gretgan" class="num ml-2 w-full text-right rounded-md h-8 fondoblanco" type="text" wire:model="gretgan" wire:keyup="CalcularNeto()" style="box-shadow: 2px 2px 5px #999;">
											@error('gretgan') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="gneto">Neto</label><br>
											<input id="gneto" class="ml-2 w-full text-right rounded-md h-8 fondoblanco" type="text" wire:model="gneto" style="box-shadow: 2px 2px 5px #999;">
											@error('gneto') <span class="text-red-500">{{ $message }}</span>@enderror
										</div>
										<div class="mr-1 w-28">
											<label for="gmontopagado" style="font-size: 80%;" wire:click="copiarMontoPagado()">Monto Pagado</label><br>
											<input id="gmontopagado" class="num ml-2 w-full text-right rounded-md h-8 fondoblanco" type="text" wire:model="gmontopagado" style="box-shadow: 2px 2px 5px #999;">
										</div>
										<div class="mr-1 w-20">
											<label for="gcantidad">Cantidad</label><br>
											<input id="gcantidad" class="num ml-2 w-full text-right rounded-md h-8 fondoblanco" type="text" wire:model="gcantidad" style="box-shadow: 2px 2px 5px #999;">
										</div>
									</div>
									<div>

										<div class="flex flex-wrap justify-between pb-2 fondogris" style="background-color: rgb(199, 233, 233); font-size: 14px;">
											<div class="border flex-1">Mes<br>
												<select id="gfmes" class="rounded-md h-7 py-0 leading-none fondogris" wire:model="gfmes" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
													<option value=""></option>
													<option value="1">Enero</option>
													<option value="2">Febrero</option>
													<option value="3">Marzo</option>
													<option value="4">Abril</option>
													<option value="5">Mayo</option>
													<option value="6">Junio</option>
													<option value="7">Julio</option>
													<option value="8">Agosto</option>
													<option value="9">Setiembre</option>
													<option value="10">Octubre</option>
													<option value="11">Noviembre</option>
													<option value="12">Diciembre</option>
												</select>
											</div>
											<div class="border flex-1">Cliente<br>
												<select id="gfcliente" class=" rounded-md h-7 py-0 leading-none fondogris" wire:model="gfcliente" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
													<option value=""></option>
													@foreach ($clientes as $cliente)
														<option value="{{ $cliente->id }}">
															{{ $cliente->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="border flex-1">ParticipaIva<br>
												<select id="gfparticipa" class=" rounded-md h-7 py-0 leading-none fondogris" wire:model="gfparticipa" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
													<option value=""></option>
													<option value="Si">Si</option>
													<option value="No">No</option>
													<option value="Ganancias">Ganancias</option>
													<option value="BsPers">Bs. Pers.</option>
												</select>
											</div>
											<div class="border flex-1">Iva<br>
												<select id="gfiva2" class=" rounded-md h-7 py-0 leading-none fondogris" wire:model="gfiva" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
													<option value=""></option>
													@foreach ($ivas as $iva)
														<option value="{{ $iva->id }}">
															{{ $iva->descripcion }}</option>
													@endforeach
												</select>
											</div>
											<div class="border flex-1">Detalle<br>
												<select id="gfdetalle" class=" rounded-md h-7 py-0 leading-none fondogris" wire:model="gfdetalle" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
													<option value=""></option>
													@foreach ($ivas as $iva)
														<option value="{{ $iva->id }}">
															{{ $iva->descripcion }}</option>
													@endforeach
												</select>
											</div>
											<div class="border flex-1">Area<br>
												<select id="gfarea" class=" rounded-md h-7 py-0 leading-none fondogris" wire:model="gfarea" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
													<option value=""></option>
													@foreach ($areas as $area)
														<option value="{{ $area->id }}">{{ $area->name }}
														</option>
													@endforeach
												</select>
											</div>
											<div class="border flex-1">Cuenta<br>
												<select id="gfcuenta" class=" rounded-md h-7 py-0 leading-none fondogris" wire:model="gfcuenta" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
													<option value=""></option>
													@foreach ($cuentas as $cuenta)
														<option value="{{ $cuenta->id }}">{{ $cuenta->name }}
														</option>
													@endforeach
												</select>
											</div>
											<div class="border flex-1">Año<br>
												<select id="gfanio" class=" rounded-md h-7 py-0 leading-none fondogris" wire:model="gfanio" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
													<option value="2026">2026</option>
                                                    <option value="2025">2025</option>
													<option value="2024">2024</option>
													<option value="2023">2023</option>
													<option value="2022">2022</option>
													<option value="2021">2021</option>
													<option value="2020">2020</option>
													<option value="2019">2019</option>
													<option value="2018">2018</option>
													<option value="2017">2017</option>
													<option value="2016">2016</option>
													<option value="2015">2015</option>
													<option value="2014">2014</option>
													<option value="2013">2013</option>
												</select>
											</div>
											<div class="border flex-1">Asc. C/Saldo<br>
												<input id="fgascendente" class=" mr-2 rounded-sm py-0" type="checkbox" checked wire:model="fgascendente" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
												<input id="gfsaldo" class=" mr-2 rounded-sm py-0" type="checkbox" wire:model="gfsaldo" wire:change="gfiltro()" style="box-shadow: 2px 2px 5px #999;">
											</div>
										</div>

										{!! $filtro !!}
									</div>
								</div>
							</div>
							{{-- Deuda a Clientes --}}
							{{-- =================== --}}
							<div class="{{ $tabActivo != 2 ? 'hidden' : '' }}">
								<div class="flex justify-center">
									<div class="flex">
										<div class="block mb-4 justify-start">
											<label for="darea">Áreas a incluir</label><br>
											<select id="darea" class="ml-2 text-xs rounded-md h-7 leading-none mr-5" wire:model="darea">
												<option value="0">Todas</option>
												@foreach ($areas as $area)
													<option value="{{ $area->id }}">{{ $area->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="block mb-4">
											<label for="danio">Años a incluir </label><br>
											<select id="danio" class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="danio">
												<option value="0">Todos</option>
												<option value="2026">2026</option>
                                                <option value="2025">2025</option>
												<option value="2024">2024</option>
												<option value="2023">2023</option>
												<option value="2022">2022</option>
												<option value="2021">2021</option>
												<option value="2020">2020</option>
												<option value="2019">2019</option>
												<option value="2018">2018</option>
												<option value="2017">2017</option>
												<option value="2016">2016</option>
												<option value="2015">2015</option>
												<option value="2014">2014</option>
												<option value="2013">2013</option>
											</select>
										</div>
									</div>
								</div>
								<div class="block justify-center">
									<div class="flex justify-center">
										<div class="block mb-4 justify-center">
											<label for="ddesde">Desde</label> <br>
											<input id="ddesde" class="text-xs rounded-md h-7 ml-5" type="date" wire:model="ddesde">
										</div>

										<div class="block mb-4 justify-center">
											<label for="dhasta">Hasta</label> <br>
											<input id="dhasta" class="ml-2 text-xs rounded-md h-7" type="date" wire:model="dhasta"><br>
										</div>
									</div>

									<div class="flex mt-4 justify-center">
										<div class="block mb-4 justify-start">
											<button class="rounded-md bg-green-300 px-8 py-1 mx-2 mt-3" wire:click="CalcularDeudaClientes(0)">Solicitar Listado</button>
											<a href="{{ URL::to('/pdf/deuda'.'/'.$ddesde.'/'.$dhasta) }}" target="_blank">
												<button class="rounded-md bg-yellow-500 px-8 py-1 mx-2 mt-3" style="color: black;">Generar PDF</button>
											</a>
										</div>
									</div>

									<div class="flex justify-center w-full">
										@if ($MostrarDeudaClientes)
											{!! $DeudaClientesFiltro !!}
										@endif
									</div>
								</div>
							</div>
							{{-- Crédito de Clientes --}}
							{{-- ======================= --}}
							<div class="{{ $tabActivo != 3 ? 'hidden' : '' }}">
								<div class="block">
									{{-- Areas / Años --}}
									<div class="flex justify-center">
										<div class="flex">
											<div class="block mb-4 justify-start">
												<label for="carea">Àreas a incluir</label><br>
												<select id="carea" class="ml-2 text-xs rounded-md h-7 leading-none mr-5" wire:model="carea">
													<option value="0">Todas</option>
													@foreach ($areas as $area)
													<option value="{{ $area->id }}">{{ $area->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="block mb-4">
												<label for="canio">Años a incluir</label><br>
												<select id="canio" class=" text-xs rounded-md h-7 py-0 leading-none" wire:model="canio">
													<option value="0">Todos</option>
													<option value="2026">2026</option>
                                                    <option value="2025">2025</option>
													<option value="2024">2024</option>
													<option value="2023">2023</option>
													<option value="2022">2022</option>
													<option value="2021">2021</option>
													<option value="2020">2020</option>
													<option value="2019">2019</option>
													<option value="2018">2018</option>
													<option value="2017">2017</option>
													<option value="2016">2016</option>
													<option value="2015">2015</option>
													<option value="2014">2014</option>
													<option value="2013">2013</option>
												</select>
											</div>
										</div>
									</div>
									{{-- Desde / Hasta --}}
									<div class="flex justify-center">
										<div class="flex justify-center">
											<div class="block mb-4 justify-start">
												<label for="cdesde">Desde</label> <br>
												<input id="cdesde" class="text-xs rounded-md h-7 ml-5" type="date" wire:model="cdesde"><br>
											</div>

											<div class="block mb-4 justify-center">
												<label for="chasta">Hasta</label> <br>
												<input id="chasta" class="ml-2 text-xs rounded-md h-7" type="date" wire:model="chasta"><br>
											</div>
										</div>
									</div>
									{{-- Solicita / Generar --}}
									<div class="flex justify-center">
										<div class="flex mt-4 justify-center">
											<div class="block mb-4 justify-start">
												<button class="rounded-md bg-green-300 px-8 py-1 mx-2 mt-3" wire:click="CalcularCreditoClientes()">Solicitar Listado</button>
												<a href="{{ URL::to('/pdf/credito'.'/'.$cdesde.'/'.$chasta) }}" target="_blank">
													<button class="rounded-md bg-yellow-500 px-8 	py-1 mx-2 mt-3" style="color: black;">Generar PDF</button>
												</a>
											</div>
										</div>
									</div>
									{{-- Filtro --}}
									<div class="flex justify-center">
										<div class="flex justify-center w-full">
											@if ($MostrarCreditoClientes)
												{!! $CreditoClientesFiltro !!}
											@endif
										</div>
									</div>
								</div>
							</div>
							{{-- Cuentas Corrientes  --}}
							{{-- =================== --}}
							<div class="{{ $tabActivo != 4 ? 'hidden' : '' }}">
								<div class="flex justify-center">
									{{-- <img src="{{ asset('images/under-construction.jpg') }}" alt="" class="w-36"> --}}
									<div class="block mb-4 justify-start">
										<label for="ccCliente">Cliente</label><br>
										<select id="ccCliente" class="px-2 col-11 rounded-md h-8 leading-none" wire:model="ccCliente">
											<option value="0">-- Todos -- </option>
											@foreach ($ccClientes as $cliente)
												<option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
											@endforeach
										</select>
										@error('ccCliente') <span class="text-red-500">{{ $message }}</span>@enderror
									</div>
									<div class="block mb-4 justify-start">
										<label for="ccAgrupadoComp">Agrupado por:</label><br>
										<select id="ccAgrupadoComp" class="px-2 w-full rounded-md h-8 leading-none" wire:model="ccAgrupadoComp">
											<option value="1">Comprobante</option>
											<option value="0">Detalle</option>
										</select>
									</div>

									<div class="block mb-4 justify-start">
										<label for="ccdesde">Desde</label> <br>
										<input id="ccdesde" class="text-xs rounded-md h-7 ml-5" type="date" wire:model="ccdesde"><br>
									</div>

									<div class="block mb-4 justify-center">
										<label for="cchasta">Hasta</label> <br>
										<input id="cchasta" class="ml-2 text-xs rounded-md h-7" type="date" wire:model="cchasta"><br>
									</div>
									<div class="block mb-4 justify-center">
										<label for="ccmes">Mes</label> <br>
										<input id="ccmes" type="text" value="*" disabled>
									</div>
									<div class="block mb-4 justify-center">
										<label for="ccarea">Área</label> <br>
										<input id="ccarea" type="text" value="*" disabled>
									</div>
									<div class="block mb-4 justify-center">
										<label for="cccuenta">Cuenta</label> <br>
										<input id="cccuenta" type="text" value="*" disabled>
									</div>
								</div>
								<div class="flex justify-center">
									<div class="block mb-4 justify-center">
										<input id="btnCalcular" class="ml-2 text-xs rounded-md h-7 btn btn-info px-8 py-1 mx-2 mt-3" type="button" wire:click="ListarCuentasCorrientes" value="Calcular"><br>
									</div>
									<a href="{{ URL::to('/pdf/cta-cte-ventas'.'/'.$ccdesde.'/'.$cchasta) }}" target="_blank">
										<button class="ml-2 text-xs rounded-md h-7 btn btn-info px-8 py-1 mx-2 mt-3">Imprimir Resumen</button>
									</a><br>
								</div>
								{!! $CuentasCorrientesHtml !!}
							</div>
							<div class="{{ $tabActivo != 5 ? 'hidden' : '' }}">
								<div class="flex flex-auto justify-center">
									<div>
										<table>
											<tr>
												<td>
													<label for="lmes">Mes</label><br>
													<select id="lmes" class="mr-4 w-full text-xs px-1 rounded-md h-7 leading-none" wire:model="lmes" wire:change="MostrarListadeLibros()">
														<option value=""></option>
														<option value="1">enero</option>
														<option value="2">febrero</option>
														<option value="3">marzo</option>
														<option value="4">abril</option>
														<option value="5">mayo</option>
														<option value="6">junio</option>
														<option value="7">julio</option>
														<option value="8">agosto</option>
														<option value="9">setiembre</option>
														<option value="10">octubre</option>
														<option value="11">noviembre</option>
														<option value="12">diciembre</option>
													</select>
													<label for="lanio">Año</label><br>
													<select id="lanio" class="mr-4 w-full text-xs rounded-md h-7 leading-none" wire:model="lanio" wire:change="MostrarListadeLibros()">
														<option value=""></option>
														<option value="2026">2026</option>
                                                        <option value="2025">2025</option>
														<option value="2024">2024</option>
														<option value="2023">2023</option>
														<option value="2022">2022</option>
														<option value="2021">2021</option>
														<option value="2020">2020</option>
														<option value="2019">2019</option>
														<option value="2018">2018</option>
														<option value="2017">2017</option>
														<option value="2016">2016</option>
														<option value="2015">2015</option>
														<option value="2014">2014</option>
														<option value="2013">2013</option>
														<option value="2012">2012</option>
													</select>
												</td>
												<td>
													<a href="{{ URL::to('/pdf/ivaventas'.'/'.$lanio.'/'.$lmes) }}" target="_blank">
														<button class="rounded-md bg-green-300 px-8 py-1 ml-4 mt-6" style="color: black;">Imprimir Libro</button>
													</a><br>
													<button class="rounded-md bg-yellow-300 px-8 py-1 ml-4 mt-6 white" wire:click="openModalCerrarLibro()">Cerrar Libro</button>
												</td>
											</table>
										</table>
										@if($ModalCerrarLibro)
											@include('livewire.venta.modalcerrarlibroventas')
										@endif
										<div class="w-full">
											@if ($MostrarLibros)
												{!! $LibroFiltro !!}
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					
					<div class="d-flex center-block" style="justify-content: center; font-size: 80%; margin-left: 20px; margin-top: 10px; margin-bottom: 10px;">
						<div style="margin-right: 20px;">
							<div style="background-color: lightslategray; width: 20px;border-radius: 7px;height: 20px;display: inline-block;margin-right: 3px; vertical-align: middle;"></div>
							<span style="vertical-align: middle;">Registro Generado</span>
						</div>
						<div style="margin-right: 20px;">
							<div style="background-color: rgb(238, 238, 79); width: 20px;border-radius: 7px;height: 20px;display: inline-block;margin-right: 3px; vertical-align: middle;"></div>
							<span style="vertical-align: middle;">Comprobante para Emitir</span>
						</div>
						<div style="margin-right: 20px;">
							<div style="background-color: rgb(242, 120, 120); width: 20px;border-radius: 7px;height: 20px;display: inline-block;margin-right: 3px; vertical-align: middle;"></div>
							<span style="vertical-align: middle;">Comprobante Emitido</span>
						</div>
						<div style="margin-right: 20px;">
							<div style="background-color: brown; width: 20px;border-radius: 7px;height: 20px;display: inline-block;margin-right: 3px; vertical-align: middle;"></div>
							<span style="vertical-align: middle;">Comprobante Cerrado</span>
						</div>
					</div>

					{{-- <div class="d-flex center-block" style="justify-content: center">
						<div style="margin-right: 20px;"><input disabled style="background-color: lightslategray; width: 20px;border-radius: 7px;height: 20px;margin-right: 3px;">Registro Generado</div>
						<div style="margin-right: 20px;"><input disabled style="background-color: rgb(238, 238, 79); width: 20px;border-radius: 7px;height: 20px;margin-right: 3px;">Comprobante para Emitir</div>
						<div style="margin-right: 20px;"><input disabled style="background-color: rgb(242, 120, 120); width: 20px;border-radius: 7px;height: 20px;margin-right: 3px;">Comprobante Emitido</div>
						<div style="margin-right: 20px;"><input disabled style="background-color: brown; width: 20px;border-radius: 7px;height: 20px;margin-right: 3px;">Comprobante Cerrado</div>
					</div> --}}
				</div>
			</div>
		</div>
	</div>



	<div class="BotonVolver2 form-group col-md-2">
	</div>
	<footer class="text-center text-xs bg-gray-400 mt-px3 pb-2">
		Desarrollado por: Ecosystems.ar - Información de Contacto<a href="mailto:ecosystems.mail@gmail.com">
			ecosystems.mail@gmail.com</a>
		{{-- &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info"
			onclick="javascript: window.location.href='../../sistema/menu.php';">&nbsp;&nbsp;&nbsp;Volver&nbsp;&nbsp;&nbsp;</button> --}}
	</footer>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.js"></script>
	<script src="js/examples.js"></script>
</div>