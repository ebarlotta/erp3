<div>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Configuraciones</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            
            body {
                background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 50%, #fdbb2d 100%);
                color: #333;
                padding: 40px 20px;
                min-height: 100vh;
            }
            
            .container {
                max-width: 100%;
                /* max-width: 95%; */
                /* max-width: 1400px; */
                margin: 0 auto;
            }
            
            header {
                text-align: center;
                margin-bottom: 40px;
                color: white;
            }
            
            h1 {
                font-size: 2.8rem;
                margin-bottom: 15px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            }
            
            .subtitle {
                font-size: 1.3rem;
                opacity: 0.9;
                max-width: 800px;
                margin: 0 auto;
            }
            
            .card-header {
                text-align: center;
                padding: 25px;
                background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
                color: white;
                border-radius: 20px;
                box-shadow: 5px 5px 10px #2a0303;
            }

            .main-card {
                width: 100%;
                background: white;
                border-radius: 20px;
                overflow: hidden;
                /* box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25); */
                margin-bottom: 30px;
                box-shadow: 5px 5px 10px #999393;
                padding: 15px;
                /* box-shadow: 5px 5px 10px #665f5f; */
            }

            . content {
                padding: 0px !important;
            }
            .grid-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 25px;
                margin-bottom: 40px;
            }
            
            .grid-item {
                background: white;
                border-radius: 18px;
                overflow: hidden;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                flex-direction: column;
                box-shadow: 5px 5px 10px #2a0303;
            }
            
            .grid-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
                box-shadow: 5px 5px 10px #b44b4b;
            }
            
            .item-header {
                padding: 20px;
                text-align: center;
                background: linear-gradient(135deg, #95f0cd 0%, #08961b 100%);
                color: white;
                display: flex;
                justify-content: center;

            }
            
            .icon {
                font-size: 2.5rem;
                margin-bottom: 15px;
            }
            
            .item-title {
                font-size: 1.4rem;
                font-weight: bold;
                margin-top: 16px;
                margin-left: 14px;
            }
            
            .item-content {
                padding: 20px;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }
            
            .item-desc {
                margin-bottom: 20px;
                color: #555;
                line-height: 1.5;
                flex-grow: 1;
            }
            
            .item-details {
                background-color: #afc1d5;
                padding: 15px;
                border-radius: 8px;
                border-left: 4px solid #2575fc;
                overflow-y: auto;
                max-height: 100px;
                height: auto;
            }
            
            .item-details p {
                margin: 5px 0;
                font-size: 0.95rem;
            }
            
            .tag {
                display: inline-block;
                background: #e9ecef;
                padding: 5px 10px;
                border-radius: 15px;
                font-size: 0.8rem;
                color: #495057;
                margin-top: 15px;
            }
            
            footer {
                text-align: center;
                color: white;
                padding: 20px;
                margin-top: 40px;
                font-size: 1.1rem;
            }
            
             .month {
                font-size: 2rem;
                font-weight: bold;
                background-color: #ff6b6b;
                display: inline-block;
                padding: 8px 25px;
                border-radius: 30px;
                margin-top: 15px;
            }
            
            @media (max-width: 768px) {
                .grid-container {
                    grid-template-columns: 1fr;
                }
                
                h1 {
                    font-size: 2.2rem;
                }
                
                .subtitle {
                    font-size: 1.1rem;
                }
            }


            .modal-80 {
                width: 80%;
                max-width: none;
                height: 80%;
                border-radius: 20px;
            }
            
            .modal-80 .modal-content {
                height: 100%;
                border-radius: 20px;
            }
            
            .modal-80 .modal-body {
                overflow-y: auto;
            }
            
            /* Asegurar que el modal se centre correctamente */
            /* .modal {
                display: flex !important;
                align-items: center;
                justify-content: center;
            } */
            
            /* Botón para demostración */
            /* .demo-btn {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 15px 30px;
                font-size: 18px;
                border-radius: 8px;
            } */

            .hover-bg-light:hover {
                background-color: #f8f9fa !important;
            }

            .label {
                font-size: 0.8rem;
                display: inline-block;
            }

        </style>
    </head>
    <div class="container">
        <div class="main-card mt-3">
            <div class="card-header mb-4 flex d-flex">
                <div class="col-11 ml-2">
                    <h1>PRINCIPALES PROMOCIONES</h1>
                    <div class="month">SEPTIEMBRE</div>
                    {{-- <div class="subtitle">EN FARMACIAS Y PERFUMERÍAS*</div> --}}
                </div>
                <div class="w-20 h-20" style="background-color: #f8f9fa; border-radius: 10px; color:black;margin: auto;" wire:click="AbrirModalPromociones()">
                    <input type="button" value="+" style="font-size: 40px; /* font-weight: bold; */ width: 60px; border-radius: 10px;">
                </div>
            </div>
            <div class="grid-container">
                <!-- Zonas -->
                <div class="grid-item" wire:click="CargarDatosModal('Zonas')" data-toggle="modal" data-target="#exampleModal">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-map-marked-alt"></i></div>
                        <div class="item-title">Zonas</div>
                        {{-- <div class="item-title">20%</div> --}}
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Áreas geográficas donde aplica la promoción. Pueden ser barrios, ciudades o regiones específicas.</p>
                        <div class="item-details" style="overflow-y: auto; ">
                            @php $iconos = ['fa-check-circle', 'fa-times-circle']; @endphp
                            @foreach($Zonas as $Zona)
                                <p><i class="fas {{ $iconos[rand(0,1)] }}"></i> {{ $Zona->nombre}}</p>
                            @endforeach
                        </div>
                        <span class="tag">Geolocalización</span>
                    </div>  
                </div>
                
                <!-- FormaDePago -->
                <div class="grid-item" wire:click="CargarDatosModal('FormaDePago')">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-credit-card"></i></div>
                        <div class="item-title">Forma de Pago</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Métodos de pago aceptados para la promoción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            @php $iconos = ['fa-credit-card', 'fa-money-bill']; @endphp
                            @foreach($FormaDePago as $Forma)
                                <p><i class="fas {{ $iconos[rand(0,1)] }}"></i> {{ $Forma->nombre}}</p>
                            @endforeach
                            {{-- <p><i class="fas fa-credit-card"></i> Tarjeta de crédito</p>
                            <p><i class="fas fa-credit-card"></i> Tarjeta de débito</p>
                            <p><i class="fas fa-money-bill"></i> Efectivo</p> --}}
                        </div>
                        <span class="tag">Medios de pago</span>
                    </div>
                </div>

                <!-- MedioDePago -->
                <div class="grid-item" wire:click="CargarDatosModal('MedioDePago')">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-money-check-alt"></i></div>
                        <div class="item-title">Medio de Pago</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Instrumentos específicos de pago que participan en la promoción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            @php $iconos = ['fab fa-cc-visa', 'fab fa-cc-mastercard', 'fas fa-university']; @endphp
                            @foreach($MedioDePago as $Medio)
                                <p><i class="{{ $iconos[rand(0,2)] }}"></i> {{ $Medio->nombre}}</p>
                            @endforeach
                            {{-- <p><i class="fab fa-cc-visa"></i> Visa</p>
                            <p><i class="fab fa-cc-mastercard"></i> Mastercard</p>
                            <p><i class="fas fa-university"></i> Banco Nación</p> --}}
                        </div>
                        <span class="tag">Instrumentos financieros</span>
                    </div>
                </div>

                <!-- ListaDeProductos -->
                <div class="grid-item" wire:click="CargarDatosModal('ListaDeProductos')">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-list"></i></div>
                        <div class="item-title">Lista de Productos</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Productos específicos que participan en la promoción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            @php $iconos = ['fas fa-pills', 'fas fa-soap', 'fas fa-spray-can']; @endphp
                            @foreach($ListaDeProductos as $Producto)
                                <p><i class="{{ $iconos[rand(0,2)] }}"></i> {{ $Producto->nombre}}</p>
                            @endforeach

                            {{-- <p><i class="fas fa-pills"></i> Medicamentos</p>
                            <p><i class="fas fa-soap"></i> Productos de higiene</p>
                            <p><i class="fas fa-spray-can"></i> Perfumes</p> --}}
                        </div>
                        <span class="tag">Productos elegibles</span>
                    </div>
                </div>

                <!-- TipoDeCompra -->
                <div class="grid-item" wire:click="CargarDatosModal('TipoDeCompra')">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                        <div class="item-title">Tipo de Compra</div>
                        {{-- <div class="item-title">20%</div> --}}
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Categorías de productos o servicios que son elegibles para la promoción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            @php $iconos = ['fas fa-pills', 'fas fa-times-circle', 'fas fa-spray-can']; @endphp
                            @foreach($TipoDeCompra as $Tipo)
                                <p><i class="{{ $iconos[rand(0,2)] }}"></i> {{ $Tipo->TipoDeCompra}}</p>
                            @endforeach

                            {{-- <p><i class="fas fa-pills"></i> Farmacia</p>
                            <p><i class="fas fa-spray-can"></i> Perfumería</p>
                            <p><i class="fas fa-times-circle"></i> No aplica para electrónica</p> --}}
                        </div>
                        <span class="tag">Categorización</span>
                    </div>
                </div>
            </div>
                
            <div class="grid-container">

                <!-- MontoFijoDESCUENTO -->
                <div class="grid-item" wire:click="CargarDatosModal('MontoFijoDESCUENTO')">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-tags"></i></div>
                        <div class="item-title">Monto Fijo DESCUENTO</div>
                        <div class="item-title">20%</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Descuento de valor fijo aplicado al total de la compra, independientemente del monto.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-money-bill-wave"></i> Descuento: $500</p>
                            <p><i class="fas fa-shopping-bag"></i> Mínimo de compra: $2000</p>
                        </div>
                        <span class="tag">Descuento fijo</span>
                    </div>
                </div>
                
                <!-- PorcentajeDESCUENTO -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-percent"></i></div>
                        <div class="item-title">Porcentaje DESCUENTO</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Descuento calculado como un porcentaje del total de la compra.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-chart-pie"></i> 25% de descuento</p>
                            <p><i class="fas fa-chart-line"></i> Aplicado al total</p>
                        </div>
                        <span class="tag">Descuento porcentual</span>
                    </div>
                </div>
                
                <!-- TopePorTransaccion -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
                        <div class="item-title">Tope por Transacción</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Límite máximo de descuento aplicable en una sola transacción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-money-bill"></i> Máximo: $5.000</p>
                            <p><i class="fas fa-receipt"></i> Por transacción</p>
                        </div>
                        <span class="tag">Límite transaccional</span>
                    </div>
                </div>
                
                <!-- PeriodoDesde -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                        <div class="item-title">Periodo Desde</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Fecha de inicio en la que la promoción comienza a estar vigente.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-play-circle"></i> Inicio: 01/09/2023</p>
                            <p><i class="fas fa-clock"></i> 00:00 hs</p>
                        </div>
                        <span class="tag">Fecha inicial</span>
                    </div>
                </div>
                
                <!-- PeriodoHasta -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-calendar-times"></i></div>
                        <div class="item-title">Periodo Hasta</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Fecha de finalización de la vigencia de la promoción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-stop-circle"></i> Fin: 30/09/2023</p>
                            <p><i class="fas fa-clock"></i> 23:59 hs</p>
                        </div>
                        <span class="tag">Fecha final</span>
                    </div>
                </div>
                
                <!-- TopePorPeriodo -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-chart-bar"></i></div>
                        <div class="item-title">Tope por Periodo</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Límite máximo de descuento acumulable durante un período específico.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-calendar-week"></i> Por semana: $10.000</p>
                            <p><i class="fas fa-calendar-month"></i> Por mes: $40.000</p>
                        </div>
                        <span class="tag">Límite periódico</span>
                    </div>
                </div>
                
                <!-- TopePorTipoPeriodo -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-filter"></i></div>
                        <div class="item-title">Tope por Tipo de Periodo</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Límites específicos según diferentes tipos de períodos (diario, semanal, mensual).</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-calendar-day"></i> Diario: $2.000</p>
                            <p><i class="fas fa-calendar-week"></i> Semanal: $10.000</p>
                        </div>
                        <span class="tag">Límite segmentado</span>
                    </div>
                </div>
                
                <!-- Requisito -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-tasks"></i></div>
                        <div class="item-title">Requisito</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Condiciones que deben cumplirse para acceder a la promoción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-id-card"></i> Cliente registrado</p>
                            <p><i class="fas fa-shopping-bag"></i> Compra mínima: $2.000</p>
                            <p><i class="fas fa-credit-card"></i> Pago con tarjeta</p>
                        </div>
                        <span class="tag">Condiciones</span>
                    </div>
                </div>
                
                <!-- DíaDeLaSemana -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-calendar-day"></i></div>
                        <div class="item-title">Día de la Semana</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Días específicos en los que aplica la promoción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-calendar-check"></i> Lunes a Viernes</p>
                            <p><i class="fas fa-calendar-times"></i> Excepto feriados</p>
                        </div>
                        <span class="tag">Días hábiles</span>
                    </div>
                </div>
                
                <!-- Moneda -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-coins"></i></div>
                        <div class="item-title">Moneda</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Tipo de moneda en la que se realiza la transacción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-dollar-sign"></i> Pesos Argentinos (ARS)</p>
                            <p><i class="fas fa-dollar-sign"></i> Dólares Estadounidenses (USD)</p>
                        </div>
                        <span class="tag">Divisas</span>
                    </div>
                </div>
                
                <!-- Información -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-info-circle"></i></div>
                        <div class="item-title">Información</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Detalles adicionales y aclaraciones sobre la promoción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-exclamation-triangle"></i> Sujeto a disponibilidad</p>
                            <p><i class="fas fa-store"></i> Válido en locales adheridos</p>
                        </div>
                        <span class="tag">Aclaraciones</span>
                    </div>
                </div>
                
                <!-- Retira -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-box-open"></i></div>
                        <div class="item-title">Retira</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Modalidad de retiro de productos adquiridos con la promoción.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-store"></i> Retiro en sucursal</p>
                            <p><i class="fas fa-truck"></i> Envío a domicilio</p>
                        </div>
                        <span class="tag">Modalidad de entrega</span>
                    </div>
                </div>
                
                <!-- Reintegro -->
                <div class="grid-item">
                    <div class="item-header">
                        <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
                        <div class="item-title">Reintegro</div>
                    </div>
                    <div class="item-content">
                        <p class="item-desc">Devolución de un porcentaje o monto fijo de la compra realizada.</p>
                          <div class="item-details" style="overflow-y: auto; ">
                            <p><i class="fas fa-undo"></i> 15% de reintegro</p>
                            <p><i class="fas fa-calendar"></i> Acreditado en 72hs</p>
                        </div>
                        <span class="tag">Devolución</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        @if($MostrarModal)
            <div class="modal fade show" style="display: block;" tabindex="-1">
                <div class="modal-dialog modal-80">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $titulo }}</h5>
                            <button type="button" class="btn" wire:click="CerrarModal" style=" padding: .08rem .45rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 10px;
                background-color:  rgb(186, 183, 183);
                 ">X</button>
                        </div>
                        <div class="modal-body flex h-56 flex-col justify-between ">
                            <div>
                                <h2>Listado</h2>
                                <div class="flex d-flex" style="background-color: lightgray; height: 35px; border: black solid 1px">
                                    <div class="col-4"><b>Nombre</b></div>
                                    {{-- No aplica para: FormaDePago && MedioDePago --}}
                                    @if($titulo=="Zonas")
                                        <div class="w-full"><b>Dirección</b></div>
                                        <div class="col-3 d-none d-md-block d-lg-none"><b>Ubicación</b></div>
                                    @endif

                                    @if($titulo=="ListaDeProductos")
                                        <div class="col-3"><b>Aplica SI/NO</b></div>
                                    @endif

                                    {{-- @if($titulo=="TipoDeCompra")
                                        <div class="col-3"><b>Tipos de Compras</b></div>
                                    @endif --}}
                                    
                                    <div class="col-3 mr-1"><b>Opciones</b></div>                                   
                                </div>

                                <div class="scroll-container" style="max-height: 400px; overflow-y: auto;">
                                    @foreach ($Listado as $item)
                                        <div class="flex d-flex bg-transparent hover-bg-light transition" style="border: black solid 1px">
                                            @if($titulo=="Zonas")
                                                <div class="col-4">{{ $item->nombre }}</div>
                                                <div class="w-full">{{ $item->direccion }}</div>
                                                <div class="col-3 d-none d-md-block d-lg-none">{{ $item->ubicacionGPS }}</div>
                                            @endif

                                            @if($titulo=="FormaDePago" || $titulo=="MedioDePago")
                                                <div class="col-9">{{ $item->nombre }}</div>
                                            @endif

                                            @if($titulo=="ListaDeProductos")
                                                <div class="col-3">{{ $item->nombre }}</div>
                                                <div class="col-6">{{ $item->aplicasino }}</div>
                                            @endif

                                            @if($titulo=="TipoDeCompra")
                                                <div class="col-4">{{ $item->TipoDeCompra }}</div>
                                            @endif

                                            <div class="col-3 flex d-flex  mr-1">
                                                <input class="form-control btn btn-warning h-7 col-6 m-1" value="Modificar">
                                                <input class="form-control btn btn-danger h-7 col-6 m-1" value="Eliminar" wire:click="Eliminar({{ $item->id }})">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <h2>Agregar</h2>
                                <div class="flex d-flex">
                                    <div class="col-4">Nombre</div>
                                    @if($titulo=="Zonas")
                                        <div class="col-4 mx-1">Dirección</div>
                                        <div class="col-4 mx-1">Ubicación</div>
                                    @endif
                                    @if($titulo=="ListaDeProductos")
                                        <div class="col-4 mx-1">AplicaSINo</div>
                                    @endif
                                </div>
                                <div class="flex d-flex">
                                    <input type="text" class="form-control col-4 mx-1" wire:model="nombre_agregar">
                                    @if($titulo=="Zonas")
                                        <input type="text" class="form-control col-4 mx-1" wire:model="direccion_agregar">
                                        <input type="text" class="form-control col-4 mx-1" wire:model="ubicaciongps_agregar">
                                    @endif

                                    @if($titulo=="ListaDeProductos")
                                        <input type="text" class="form-control col-4 mx-1" wire:model="aplica_agregar">
                                    @endif
                                </div>
                                <div>
                                    <input type="button" class="form-control btn btn-info col-3 mt-2 ml-1" value="Agregar" wire:click="Agregar('{{ $titulo }}')">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="CerrarModal">Cerrar</button>
                            {{-- <button type="button" class="btn btn-primary" wire:click="guardar">Guardar</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endif


                <!-- Modal Nueva Promoción -->
        @if($MostrarModalPromocion)
            <div class="modal fade show" style="display: block;" tabindex="-1">
                <div class="modal-dialog modal-80">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Promociones Configuradas</h5>
                            <button type="button" class="btn-close" wire:click="CerrarModalPromociones"></button>
                        </div>
                        <div class="modal-body flex h-56 flex-col justify-between ">
                            <div>
                            {{-- <h2>Promociones Configuradas</h2> --}}
                                <div class="flex d-flex" style="background-color: lightgray; height: 35px; border: black solid 1px; font-size: 0.75rem;">
                                    <div class="" style="width: 7%"><b>Zona</b></div>                                    
                                    <div class="" style="width: 7%"><b>Tipo de <br>Compra</b></div>
                                    <div class="" style="width: 7%"><b>Monto Fijo <br>Descuento</b></div>
                                    <div class="" style="width: 7%"><b>Porcentaje<br> Descuento</b></div>
                                    <div class="" style="width: 7%"><b>Tope Por <br>Transacción</b></div>
                                    <div class="" style="width: 5%"><b>Periodo <br>Desde</b></div>
                                    <div class="" style="width: 5%"><b>Periodo<br> Hasta</b></div>
                                    <div class="" style="width: 7%"><b>Tope Por<br> Periodo</b></div>
                                    <div class="" style="width: 7%"><b>Tope Por Tipo <br>de Periodo</b></div>
                                    <div class="" style="width: 7%"><b>Requisitos</b></div>
                                    <div class="" style="width: 7%"><b>Dias de la<br> semana</b></div>
                                    <div class="" style="width: 3%"><b>Moneda</b></div>
                                    <div class="" style="width: 7%"><b>Lugar de <br>Retiro</b></div>
                                    <div class="" style="width: 7%"><b>Reintegro</b></div>
                                    <div class="" style="width: 3%"><b>Información<br> Adicional</b></div>
                                    <div class="" style="width: 8%"><b>Opciones</b></div>                                   
                                </div>

                                <div class="scroll-container" style="max-height: 400px; overflow-y: auto;">
                                    @foreach ($Listado as $item)
                                        <div class="flex d-flex bg-transparent hover-bg-light transition" style="border: black solid 1px">
                                            
                                            {{-- <div class="col-3">{{ $item->nombre }}</div>
                                            <div class="col-3">{{ $item->direccion }}</div>
                                            <div class="col-3">{{ $item->ubicacionGPS }}</div>

                                            <div class="col-3 flex d-flex">
                                                <input class="form-control btn btn-warning h-7 col-6 m-1" value="Modificar">
                                                <input class="form-control btn btn-danger h-7 col-6 m-1" value="Eliminar" wire:click="Eliminar({{ $item->id }})">
                                            </div> --}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                {{-- <h2>Agregar</h2> --}}
                                <h5 class="modal-title">Agregar</h5>

                                <div class="flex d-flex flex-wrap">
                                    <div class="col-2 px-1">
                                        <div class="label">Zona<br><br></div>
                                        <select name="" id="" class="form-control">
                                            @foreach($Zonas as $zona)
                                                <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" class="form-control" wire:model="nombre_agregar"> --}}
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Tipo de <br>Compra</div>
                                        <input type="text" class="form-control" wire:model="TipoDeCompra">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Monto Fijo <br>Descuento</div>
                                        <input type="number" class="form-control" wire:model="MontoFijo">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Porcentaje <br>Descuento</div>
                                        <input type="number" class="form-control" wire:model="PorcentajeDescuento">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Tope Por <br>Transacción</div>
                                        <input type="number" class="form-control" wire:model="TopePorTransaccion">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Periodo <br>Desde</div>
                                        <input type="date" class="form-control" wire:model="PeriodoDesde">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Periodo <br>Hasta</div>
                                        <input type="date" class="form-control" wire:model="PeriodoHasta">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Tope Por <br>Periodo</div>
                                        <input type="number" class="form-control" wire:model="TopePorPeriodo">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Tope Por Tipo<br>de Periodo</div>
                                        <input type="number" class="form-control" wire:model="TopePorTipoDePeriodo">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Requisitos<br><br></div>
                                        <input type="text" class="form-control" wire:model="Requisito">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Dias de la <br>semana</div>
                                        {{-- $DíaDeLaSemana --}}
                                        <input type="text" class="form-control" wire:model="nombre_agregar">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Moneda<br><br></div>
                                        <input type="text" class="form-control" wire:model="Moneda">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Lugar de <br>Retiro</div>
                                        <input type="text" class="form-control" wire:model="Retira">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Reintegro<br><br></div>
                                        <input type="number" class="form-control" wire:model="Reintegro">
                                    </div>
                                    <div class="col-2 px-1">
                                        <div class="label">Información <br>Adicional</div>
                                        <input type="text" class="form-control" wire:model="InformacionAdicional">
                                    </div>
                                </div>
                                <div>
                                    <input type="button" class="form-control btn btn-info col-3 mt-2 ml-1" value="Agregar" wire:click="AgregarPromocion()">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="CerrarModalPromociones">Cerrar</button>
                            {{-- <button type="button" class="btn btn-primary" wire:click="guardar">Guardar</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>
</div>


