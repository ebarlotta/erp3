<div>
    <div class="sm:block md:hidden lg:hidden xl:hidden">

        <?php echo session('nombre_empresa').' - ' . session('cuit') .'<br>'; ?>

        <div class="text-left" style="font-size: 15px; margin: 12px;">
            <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($modulo->name === "Compras-Ventas-Mini"): ?>
                    <a wire:click="AsignarModulo('<?php echo e($modulo->name); ?>')" href="<?php echo e(route('VentaSimple','Compras')); ?>" class="flex mb-2 transform transition duration-500 hover:scale-105 shadow "><p class="text-center">M<br>i<br>n<br>i</p>
                
                        
                    
                <?php endif; ?>
                <div class="flex d-flex m-1" wire:click="EnrutarModulo('<?php echo e($modulo->pagina); ?>')">
                    <div class="w-20" style="width:28%">
                        <img class="rounded-l-md w-36 h-36" src="<?php echo e(asset('images/'. $modulo->imagen)); ?>" style="width:100%; height:<?php echo e(100*$porc); ?>px;" >
                    </div>
                    <div class="rounded-r-md w-80" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:<?php echo e(100*$porc); ?>%;">
                        <p class="ml-3">
                            <?php echo e($modulo->name); ?>

                        </p>
                        <p class="ml-3 mr-1 text-xs" style="font-size: <?php echo e(12*$porc); ?>px">
                            <?php echo e($modulo->leyenda); ?>

                        </p>
                    </div>
                </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    
    <div class="hidden sm:hidden md:block lg:block xl:block">
        <?php echo session('nombre_empresa').'<br>'; ?>
        <div class="hidden sm:hidden md:block lg:block xl:block  mb-4 mr-2 text-left mt-6" style=" display: flex; flex-wrap: wrap; width: 100%; justify-content: center; overflow-y: scroll; height: fit-content;">
            <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a wire:click="EnrutarModulo('<?php echo e($modulo->pagina); ?>')" class="rounded-l-md flex mb-2 mt-2 transform transition duration-500 hover:scale-105" style="width:<?php echo e(55*$porc); ?>%; margin-right: 5px; margin-left: 5px;height: fit-content;">
       
                <div style="display:flex; box-shadow: 10px 5px 5px gray; width: 100%; height: fit-content;">
                
                    <div style="width:<?php echo e(33*$porc); ?>%">
                        <img class="rounded-l-md w-36 h-36" src="<?php echo e(asset('images/'. $modulo->imagen)); ?>" style="width:<?php echo e(100*$porc); ?>%; height:fit-content; min-height: <?php echo e(110*$porc*$porc); ?>px;" >
                    </div>
                    <div class="rounded-r-md" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:66%; height:fit-content; min-height: <?php echo e(110*$porc*$porc); ?>px;">   <!-- background:linear-gradient(90deg, lightblue 40%, white 60%); background:linear-gradient(d贸nde empieza, color1, 40%, color2, 60%); -->
                        
                            <p class="ml-3" style="font-size: <?php echo e(22*$porc); ?>px;">
                            <?php echo e($modulo->name); ?>

                        </p>
                        <p class="ml-3 mr-1" style="font-size: <?php echo e(0.9*$porc); ?>em;">
                            <?php echo e($modulo->leyenda); ?>

                        </p>
                    </div>
                
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <h3 class="text-lg font-semibold mb-2">Compras x Áreas</h3>
                    <canvas id="compras_areas" width="400" height="200"></canvas>
                </div>

                <!-- Gráfico de Ventas -->
                <div class="bg-white p-4 rounded-lg shadow" wire:ignore>
                    <h3 class="text-lg font-semibold mb-2">Compras x Cuentas</h3>
                    <canvas id="compras_cuentas" width="400" height="200"></canvas>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



        <script>
        // Inicializar gráficos con los datos de Laravel
        const comprasData = <?php echo json_encode($compras, 15, 512) ?>;
        const ventasData = <?php echo json_encode($ventas, 15, 512) ?>;
        console.log(comprasData);
            var ctx = document.getElementById('compras').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($compras_areas['labels'], 15, 512) ?>,
                    datasets: [{
                            label: 'Monto total comprado',
                            data: <?php echo json_encode($compras_areas['data'], 15, 512) ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        },
/*                        {
                            label: 'Data',
                            data: <?php echo json_encode($ventas['data'], 15, 512) ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: {
                                target: 'origin',
                                above: 'rgb(255, 0, 0)', // Area will be red above the origin
                                below: 'rgb(0, 0, 255)' // And blue below the origin
                            }
                        }*/
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
                    labels: <?php echo json_encode($compras_areas['labels'], 15, 512) ?>,
                    datasets: [{
                            label: 'Data',
                            data: <?php echo json_encode($compras_areas['data'], 15, 512) ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        },
/*                        {
                            label: 'Data',
                            data: <?php echo json_encode($ventas['data'], 15, 512) ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: {
                                target: 'origin',
                                above: 'rgb(255, 0, 0)', // Area will be red above the origin
                                below: 'rgb(0, 0, 255)' // And blue below the origin
                            }
                        }*/
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
                    labels: <?php echo json_encode($compras_cuentas['labels'], 15, 512) ?>,
                    datasets: [{
                            label: 'Data',
                            data: <?php echo json_encode($compras_cuentas['data'], 15, 512) ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        },
/*                        {
                            label: 'Data',
                            data: <?php echo json_encode($ventas['data'], 15, 512) ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: {
                                target: 'origin',
                                above: 'rgb(255, 0, 0)', // Area will be red above the origin
                                below: 'rgb(0, 0, 255)' // And blue below the origin
                            }
                        }*/
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
                    labels: <?php echo json_encode($ventas['labels'], 15, 512) ?>,
                    datasets: [{
                        label: 'Total Ventas Mensuales',
                        data: <?php echo json_encode($ventas['data'], 15, 512) ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
/*                        fill: {
                            target: 'origin',
                            above: 'rgb(255, 0, 0)', // Area will be red above the origin
                            below: 'rgb(0, 0, 255)' // And blue below the origin
                        }*/
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
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/modulos/modulo-component.blade.php ENDPATH**/ ?>