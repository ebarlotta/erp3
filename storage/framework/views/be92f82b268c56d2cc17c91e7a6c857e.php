<div>
    <div class="row justify-content-center">
        <?php if($editpregunta): ?> <?php echo $__env->make('livewire.geri.informes.editpregunta', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
        <?php if($editinforme): ?> <?php echo $__env->make('livewire.geri.informes.editinforme', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>

        <div class="card sm:col-11 col-md-5 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray;" wire:click="Mostrar('Periodos')">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Periodos</h5>
                <p class="card-text">Agregue periodos para segmentar los informes.</p>

            </div>
        </div>
        <div class="card sm:col-11 col-md-5 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray;" wire:click="Mostrar('Escalas')">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Escalas</h5>
                <p class="card-text">Diferentes tipos de escalas utilizadas.</p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
            </div>
        </div>
        <div class="card sm:col-11 col-md-5 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%; box-shadow: 10px 5px 5px gray;" wire:click="Mostrar('Informes')">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Informes</h5>
                <p class="card-text">Gestione todos los informes a utilizar.</p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
            </div>
        </div>
        <div class="card sm:col-11 col-md-5 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray;" wire:click="Mostrar('Preguntas')">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Preguntas</h5>
                <p class="card-text">Agregue todas las reguntas que va a utilizar en los informes.</p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
            </div>
        </div>

        <div class="card col-11 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style=" margin-top: 2%;box-shadow: 10px 5px 5px gray;">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Area de trabajo</h5>
                <!-- Periodos -->
                <?php if($periodosview): ?>                    
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold">Nombre</td>
                            
                        </tr>
                        <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($periodo->nombreperiodo); ?></td>
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    
                <?php endif; ?>
                <!-- Escalas -->
                <?php if($escalasview): ?>
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold">Nombre</td>
                            <td class="font-weight-bold">Tipo</td>
                            <td class="font-weight-bold">Minimo</td>
                            <td class="font-weight-bold">Máximo</td>
                            <td class="font-weight-bold col-1">
                            <div style="display: inline-flex;">
                                <div> Opciones </div>
                                    <?php if (isset($component)) { $__componentOriginal81c22d0aebee899657f9fa4d938ec5e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81c22d0aebee899657f9fa4d938ec5e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.agregar2','data' => ['id' => '1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('agregar2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => '1']); ?>Agregar <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81c22d0aebee899657f9fa4d938ec5e8)): ?>
<?php $attributes = $__attributesOriginal81c22d0aebee899657f9fa4d938ec5e8; ?>
<?php unset($__attributesOriginal81c22d0aebee899657f9fa4d938ec5e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81c22d0aebee899657f9fa4d938ec5e8)): ?>
<?php $component = $__componentOriginal81c22d0aebee899657f9fa4d938ec5e8; ?>
<?php unset($__componentOriginal81c22d0aebee899657f9fa4d938ec5e8); ?>
<?php endif; ?>
                                    <div>
                                </div>
                            </td>
                        </tr>
                        <?php $__currentLoopData = $escalas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($escala->nombreescala); ?></td>
                                <td><?php echo e($escala->tipodatos); ?></td>
                                <td><?php echo e($escala->minimo); ?></td>
                                <td><?php echo e($escala->maximo); ?></td>
                                <td class="col-1"><?php if (isset($component)) { $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.editar','data' => ['id' => ''.e($escala->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('editar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($escala->id).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $attributes = $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $component = $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                <?php endif; ?>
                <!-- Informes -->
                <?php if($informesview): ?>
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold col-4">Nombre del Informe</td>
                            <td class="font-weight-bold col-2">Período</td>
                            <td class="font-weight-bold col-2">Area</td>
                            <td class="font-weight-bold col-3">Observaciones</td>
                            <td class="font-weight-bold col-1">
                                <div style="display: inline-flex;">
                                    <div> Opciones </div>
                                    <button wire:click="agregar(3)" class="hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-1 px-2 ml-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 mr-1" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path>
                                        </svg>
                                        Agregar
                                    </button>
                                    <div>
                                </div>
                            </td>
                        </tr>
                        <?php $__currentLoopData = $informes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="col-4"><?php echo e($informe->nombreinforme); ?></td>
                                <td class="col-2"><?php echo e($informe->periodo->nombreperiodo); ?></td>
                                <td class="col-2"><?php echo e($informe->area->areasdescripcion); ?></td>
                                <td class="col-3"><?php echo e($informe->observaciones); ?></td>
                                <td class="col-1">
                                    <button wire:click="editarinforme(<?php echo e($informe->id); ?>)" class="hidden sm:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold px-4 mr-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                        Editar
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                <?php endif; ?>
                <!-- Preguntas -->
                <?php if($preguntasview): ?>
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold col-5">Texto de la Pregunta</td>
                            <td class="font-weight-bold col-1">Area</td>
                            <td class="font-weight-bold col-1">Escala Utilizada</td>
                            <td class="font-weight-bold col-2">Informe</td>
                            <td class="font-weight-bold col-1">
                            <div class="col-2" style="display: inline-flex;">
                                <div> Opciones </div>
                                <button wire:click="agregar(4)" class="hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-1 px-2 ml-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 mr-1" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path>
                                    </svg>
                                    Agregar
                                </button>
                            </td>
                        </tr>
                        <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pregunta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class=" col-5"><?php echo e($pregunta->textopregunta); ?></td>
                                <td class="col-1"><?php echo e($pregunta->nombrearea->areasdescripcion); ?></td>
                                <td class="col-1"><?php echo e($pregunta->nombreescala->nombreescala); ?></td>
                                <td class="col-2"><?php echo e($pregunta->informe->nombreinforme); ?></td>
                                <td class="col-2">
                                    
                                    
                                    <button wire:click="editarpregunta(<?php echo e($pregunta->id); ?>)" class="hidden sm:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold px-4 mr-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                        Editar
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        <a href="<?php echo e(route('actores')); ?>">
            <input type="button" class="btn btn-info" value="Volver a Gestión de Entidades">
        </a>
    </div>
</div><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/geri/informes/informe-component.blade.php ENDPATH**/ ?>