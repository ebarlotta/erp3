<div>
    <div class="sm:block md:hidden lg:hidden xl:hidden">

        <?php echo session('nombre_empresa').'<br>'; ?>

        <div class="text-left" style="font-size: 15px; margin: 12px;">
            @foreach ($modulos as $modulo)
                @if($modulo->name === "Compras-Ventas-Mini")
                    <a wire:click="AsignarModulo('{{ $modulo->name }}')" href="{{ route('VentaSimple','Compras') }}" class="flex mb-2 transform transition duration-500 hover:scale-105 shadow "><p class="text-center">M<br>i<br>n<br>i</p>
                {{-- @else
                    @if($modulo->name === "Ventas")
                    <a wire:click="AsignarModulo('{{ $modulo->name }}')" href="{{ route('VentaSimple','Ventas') }}" class="flex mb-2 transform transition duration-500 hover:scale-105 shadow "><p class="text-center">M<br>i<br>n<br>i</p>
                    @else --}}
                        {{-- <a wire:click="AsignarModulo('{{ $modulo->name }}')" href="{{ route($modulo->pagina) }}" class="flex mb-2 transform transition duration-500 hover:scale-105 shadow "> --}}
                    {{-- @endif --}}
                @endif
                <div class="flex d-flex m-1" wire:click="EnrutarModulo('{{ $modulo->pagina }}')">
                    <div class="w-20" style="width:28%">
                        <img class="rounded-l-md w-36 h-36" src="{{ asset('images/'. $modulo->imagen) }}" style="width:100%; height:{{ 100*$porc }}px;" >
                    </div>
                    <div class="rounded-r-md w-80" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:{{ 100*$porc }}%;">
                        <p class="ml-3">
                            {{ $modulo->name }}
                        </p>
                        <p class="ml-3 mr-1 text-xs" style="font-size: {{ 12*$porc }}px">
                            {{ $modulo->leyenda }}
                        </p>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
    </div>
    {{-- Modo Escritorio --}}
    <div class="hidden sm:hidden md:block lg:block xl:block">
        <?php echo session('nombre_empresa').'<br>'; ?>
        <div class="hidden sm:hidden md:block lg:block xl:block  mb-4 mr-2 text-left mt-6" style=" display: flex; flex-wrap: wrap; width: 100%; justify-content: center; overflow-y: scroll; height: fit-content;">
            @foreach ($modulos as $modulo)
            <a wire:click="EnrutarModulo('{{ $modulo->pagina }}')" class="rounded-l-md flex mb-2 mt-2 transform transition duration-500 hover:scale-105" style="width:{{ 55*$porc }}%; margin-right: 5px; margin-left: 5px;height: fit-content;">
       {{-- <a href="{{ route($modulo->pagina) }}" class="rounded-l-md flex mb-2 mt-2 transform transition duration-500 hover:scale-105" style="width:45%; margin-right: 5px; margin-left: 5px;"> --}}
                <div style="display:flex; box-shadow: 10px 5px 5px gray; width: 100%; height: fit-content;">
                {{-- <div class="flex mb-2 mt-2 transform transition duration-500 hover:scale-105 shadow  " style="width:40%; margin-right: 5px; margin-left: 5px"> --}}
                    <div style="width:{{ 33*$porc }}%">
                        <img class="rounded-l-md w-36 h-36" src="{{ asset('images/'. $modulo->imagen) }}" style="width:{{ 100*$porc }}%; height:fit-content; min-height: {{ 110*$porc*$porc }}px;" >
                    </div>
                    <div class="rounded-r-md" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:66%; height:fit-content; min-height: {{ 110*$porc*$porc }}px;">   <!-- background:linear-gradient(90deg, lightblue 40%, white 60%); background:linear-gradient(d贸nde empieza, color1, 40%, color2, 60%); -->
                        {{-- <p class="ml-3" style="font-size: 1rem"> --}}
                            <p class="ml-3" style="font-size: {{ 22*$porc }}px;">
                            {{ $modulo->name }}
                        </p>
                        <p class="ml-3 mr-1" style="font-size: {{ 0.9*$porc }}em;">
                            {{ $modulo->leyenda }}
                        </p>
                    </div>
                {{-- </div><br> --}}
                </div>
            </a>
            @endforeach
        </div>

                <!-- Contenedor de gráficos (DESPUÉS del foreach de empresas) -->
        <div class="chart-container mt-8" style="position: relative;">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Gráfico de Compras -->
                <div class="bg-white p-4 rounded-lg shadow" wire:ignore>
                    <h3 class="text-lg font-semibold mb-2">Compras</h3>
                    <canvas id="compras" width="400" height="200"></canvas>
                </div>

                <!-- Gráfico de Ventas -->
                <div class="bg-white p-4 rounded-lg shadow" wire:ignore>
                    <h3 class="text-lg font-semibold mb-2">Ventas</h3>
                    <canvas id="ventas" width="400" height="200"></canvas>
                </div>

                <!-- Gráfico de Ventas -->
                <div class="bg-white p-4 rounded-lg shadow" wire:ignore>
                    <h3 class="text-lg font-semibold mb-2">Ventas</h3>
                    <canvas id="compras_areas" width="400" height="200"></canvas>
                </div>

                <!-- Gráfico de Ventas -->
                <div class="bg-white p-4 rounded-lg shadow" wire:ignore>
                    <h3 class="text-lg font-semibold mb-2">Ventas</h3>
                    <canvas id="compras_cuentas" width="400" height="200"></canvas>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



        <script>
        // Inicializar gráficos con los datos de Laravel
        const comprasData = @json($compras);
        const ventasData = @json($ventas);
        console.log(comprasData);
            var ctx = document.getElementById('compras').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($compras['labels']),
                    datasets: [{
                            label: 'Enzo',
                            data: @json($compras['data']),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        },
                        {
                            label: 'Data',
                            data: @json($ventas['data']),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: {
                                target: 'origin',
                                above: 'rgb(255, 0, 0)', // Area will be red above the origin
                                below: 'rgb(0, 0, 255)' // And blue below the origin
                            }
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx = document.getElementById('compras_areas').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($compras_areas['labels']),
                    datasets: [{
                            label: 'Data',
                            data: @json($compras_areas['data']),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        },
                        {
                            label: 'Data',
                            data: @json($ventas['data']),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: {
                                target: 'origin',
                                above: 'rgb(255, 0, 0)', // Area will be red above the origin
                                below: 'rgb(0, 0, 255)' // And blue below the origin
                            }
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx = document.getElementById('compras_cuentas').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($compras_cuentas['labels']),
                    datasets: [{
                            label: 'Data',
                            data: @json($compras_cuentas['data']),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        },
                        {
                            label: 'Data',
                            data: @json($ventas['data']),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: {
                                target: 'origin',
                                above: 'rgb(255, 0, 0)', // Area will be red above the origin
                                below: 'rgb(0, 0, 255)' // And blue below the origin
                            }
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx = document.getElementById('ventas').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($ventas['labels']),
                    datasets: [{
                        label: 'Data',
                        data: @json($ventas['data']),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: {
                            target: 'origin',
                            above: 'rgb(255, 0, 0)', // Area will be red above the origin
                            below: 'rgb(0, 0, 255)' // And blue below the origin
                        }
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        filler: {
                            propagate: true
                        }
                    }
                }
            });
        </script>

    </div>

</div>
