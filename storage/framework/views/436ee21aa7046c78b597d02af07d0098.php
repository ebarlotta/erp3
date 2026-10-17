<div>
    <style>
        /* Estilo para las celdas de la tabla */
        td {
            border: 1px solid #ddd;
            text-align: center;
            transition: background-color 0.3s ease; /* Suaviza el cambio de color */
        }

        /* Cambia el color de fondo al pasar el ratón por encima */
        td:hover {
            background-color: #f0f0f0; /* Color de fondo al hacer hover */
        }
    </style>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle col-11 sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form class="col-12">
                <!-- Controles -->
                <?php if($mostrarinformeespecifico): ?> <?php echo $__env->make('livewire.geri.actores.informessociales', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                <?php if($ModalNuevoInforme): ?> <?php echo $__env->make('livewire.geri.actores.nuevoInforme', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                
                <div class="container">
                    <div class="row" style="margin-left: 15%">
                        <div class="col-3 mt-5 flex border border-primary shadow-0">
                            <img class="block rounded-md flex-none bg-cover mr-3 p-2" src="<?php echo e(asset('images/sin_imagen.jpg')); ?>" style="width: 100px; height: 100px;">
                            <div class="mt-2">
                                <b>Nombre: <?php echo e($name); ?></b><br>
                                <label for="">Alias: <?php echo e($alias); ?></label>
                            </div>
                        </div>
                        <div class="w-1 bg-gray-300 card shadow-0 mt-3"></div>
                        <div class="col-8 mt-5 border border-primary shadow-0">
                            <div class="flex d-flex flex-wrap">
                                
                                <?php if($tipopersona_id==1): ?>  
                                    <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Medicamentos')">Medicamentos</label>
                                    <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('PlanAlimentario')">Plan Alimentario</label>
                                    <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Descartables')">Descartables</label>
                                    <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Sociales')">Informes Sociales</label>
                                    <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Medicos')">Informes Médicos</label>
                                    <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Nutricional')">Informes Nutricionales</label>           
                                    <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('HistoriaDeVida')">Historia de Vida</label>
                                    <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Otro')">Otro</label>
                                    <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Pagos')">Pagos</label>
                                <?php else: ?>
                                    Falta Hacer
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 15%">
                        <div class="col-3" >
                            <div class="row">
                                <div class="col-12 card border border-primary shadow-0 mt-3">  
                                    <div class="card-body mt-1">
                                        <table class="col-11 table-striped" >
                                            <tr><td>Domicilio</td><td><?php echo e($domicilio); ?></td></tr>
                                            <tr><td>Documento</td><td><?php echo e($documento); ?></td></tr>
                                            <tr><td>Tipo documento</td><td><?php echo e($tipodocumento_id); ?></td></tr>
                                            <tr><td>Nacimiento</td><td><?php echo e($nacimiento); ?></td></tr>
                                            <tr><td>Sexo</td><td><?php echo e($sexo_id); ?></td> </tr>
                                            <tr><td>EMail</td><td><?php echo e($email); ?></td> </tr>
                                            <tr><td>Nacionalidad</td><td><?php echo e($nacionalidad_id); ?></td> </tr>
                                            <tr><td>Localidad</td><td><?php echo e($localidad_id); ?></td> </tr>
                                            <tr><td>Obra Social</td><td><?php echo e($beneficio_id); ?></td> </tr>
                                            <tr><td>Escolaridad</td><td><?php echo e($escolaridad_id); ?></td> </tr>
                                            <tr><td>Teléfono</td><td><?php echo e($telefono); ?></td> </tr>
                                            <tr><td>Empresa</td><td><?php echo e($nombreempresa); ?></td> </tr>
                                            <tr>
                                                <td>Activo</td>
                                                <td></td>
                                            </tr>
                                            <tr><td>FIngreso</td><td><?php echo e($fingreso); ?></td> </tr>
                                            <tr><td>FEgreso</td><td><?php echo e($fegreso); ?></td> </tr>
                                            <tr><td>Peso</td><td><?php echo e($peso); ?></td> </tr>
                                            <tr><td>Referente</td><td><?php echo e($actor_referente); ?></td> </tr>
                                            <tr><td>Cama Nª</td><td><?php echo e($cama_id); ?></td> </tr>
                                            <tr><td>Motivo Egreso</td><td><?php echo e($motivosegresos); ?></td> </tr>
                                            <tr><td>Grado Depend.</td><td><?php echo e($gradodependencia); ?></td> </tr>
                                        </table>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="w-1 bg-gray-300 card shadow-0 mt-3">
                        </div>
                        <div class="col-8 bg-gray-300 card border border-primary shadow-0 mt-3" style="display: block;">
                            <div>INFORMES DISPONIBLES</div>

                            <?php if(session()->has('message')): ?>
                                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                    <div class="flex">
                                        <div>
                                            <p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-12" style="display: flex; overflow: auto; background-color: lemonchiffon">
                                <?php if($listadoinformes): ?>                                   
                                    <?php $__currentLoopData = $listadoinformes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card sm:col-11 col-md-3 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray; height: max-content; border: lightgray; border-style: ridge; border-width: thin;" wire:click="MostrarInformes(<?php echo e($informe->id); ?>)">
                                            <div class="card-body" style=" max-height: 200px; height: 100%; padding: 0.25rem;">
                                                <p class="card-text flex">
                                                    <input type="button" wire:click="abrirModalNuevoInforme(<?php echo e($informe->id); ?>)" class="btn btn-info sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold ml-2 rounded" style="max-height: 31px;" value="+">
                                                    <b class="ml-2"><?php echo e($informe->nombreinforme); ?></b>
                                                </p>
                                                <p>Area:<?php echo e($informe->areasdescripcion); ?></p>
                                                <p><?php echo e($informe->observaciones); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    No hay informes configurados por el momento
                                <?php endif; ?>
                            </div>

                            
                                
                                <input type="button" wire:click="openModalNuevaIndicacion('Medicamentos')" class="btn btn-info sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold ml-2 rounded" style="max-height: 31px;" value="+ Agregar Medicamento">
                                <?php if($listadomedicamentos): ?>   
                                    <?php echo $visualizarMedicamentos; ?>                                
                                <?php else: ?>
                                    No hay medicamentos configurados por el momento
                                <?php endif; ?>
                            

                            
                            <div class="col-12" style="display: flex; overflow: auto; background-color: lemonchiffon">
                                
                                
                                

                                <?php if($visualizarPlanAlimentario): ?>
                                    <?php echo $visualizarPlanAlimentario; ?>

                                <?php else: ?>
                                    No hay planes configurados por el momento
                                <?php endif; ?>
                            </div>

                            
                            <div class="col-12 " style="display: flex; flex-wrap: wrap; background-color: beige; margin-top:10px">
                                <?php if($listadoinformesGenerados): ?>
                                    <?php $__currentLoopData = $listadoinformesGenerados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informe3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card sm:col-11 col-md-3 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray; height: max-content; border: lightgray; border-style: ridge; border-width: thin;" wire:click="BuscarDatosDelInforme(<?php echo e($informe3->id); ?>)">
                                            <div class="card-body" style=" max-height: 200px; height: 100%; padding: 0.25rem;">
                                                <p class="card-text flex">
                                                    <b><?php echo e($informe3->datosinforme->nombreinforme); ?></b><br>  
                                                </p>
                                                <p>Año:<?php echo e($informe3->anio); ?></p>
                                                <p>Periodo: <?php echo e($informe3->nroperiodo); ?></p>
                                                <p>Profesional: <?php echo e($informe3->datosprofesional->nombre); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    No se ha seleccionado un informe
                                    
                                        
                                    
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Botones -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <?php if (isset($component)) { $__componentOriginalf253541e01a36dd42205b332d448f648 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf253541e01a36dd42205b332d448f648 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.guardar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guardar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf253541e01a36dd42205b332d448f648)): ?>
<?php $attributes = $__attributesOriginalf253541e01a36dd42205b332d448f648; ?>
<?php unset($__attributesOriginalf253541e01a36dd42205b332d448f648); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf253541e01a36dd42205b332d448f648)): ?>
<?php $component = $__componentOriginalf253541e01a36dd42205b332d448f648; ?>
<?php unset($__componentOriginalf253541e01a36dd42205b332d448f648); ?>
<?php endif; ?>
                    
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="cerrarModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-700 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cerrar
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/geri/actores/createactores2.blade.php ENDPATH**/ ?>