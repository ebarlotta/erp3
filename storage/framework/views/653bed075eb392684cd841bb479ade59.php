<div>
    <?php if (isset($component)) { $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.titulo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('titulo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Gestión de Habitaciones <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $attributes = $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $component = $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-2 py-4">
            <?php if(session()->has('message')): ?>
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('habitaciones.Agregar','web'.session('empresa_id'))): ?>
                <?php if (isset($component)) { $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.crear','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('crear'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Nueva Habitación <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b)): ?>
<?php $attributes = $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b; ?>
<?php unset($__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal747bd4c1fcb906e65585a2d6307bee0b)): ?>
<?php $component = $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b; ?>
<?php unset($__componentOriginal747bd4c1fcb906e65585a2d6307bee0b); ?>
<?php endif; ?>
                <?php if($isModalOpen): ?>
                    <?php echo $__env->make('livewire.geri.habitacion.createhabitacion', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
            <div style="width: 100%">
            <table class="table-fixed w-full sm:max-width: 450px">  <!--  table-fixed  class="w-full     style="display: block; overflow-x: auto; sm:max-width: 450px""-->
                <thead>
                    <tr class="bg-gray-100">
                        <th class=" py-2">Habitación</th>
                        <th class=" py-2">Descripcion</th>
                        <th class=" py-2">Activa</th>
                        <th class=" py-2">Sexo</th>
                        <th class=" py-2 d-none d-lg-block">Fecha Movimiento</th>
                        <th class=" py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($habitaciones): ?>
                        <?php $__currentLoopData = $habitaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habitacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="border  py-2 text-center"><?php echo e($habitacion->nrohabitacion); ?></td>
                                <td class="border  py-2"><?php echo e($habitacion->descripcion); ?></td>
                                <td class="border  py-2">
                                    <div class="flex justify-center">
                                        <?php if($habitacion->activa): ?>
                                            <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="habilitar(<?php echo e($habitacion->id); ?>, <?php echo e($habitacion->activa); ?>)">
                                                <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white"></span>
                                            </span>
                                            <?php else: ?>
                                            <!------- on ----->
                                            <span class="border rounded-full border-grey bg-red-400 flex items-center cursor-pointer w-12 bg-red justify-end" wire:click="habilitar(<?php echo e($habitacion->id); ?>, <?php echo e($habitacion->activa); ?>)">
                                                <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white"></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="border  py-2">
                                    <div class="flex justify-center">
                                        <?php if($habitacion->sexo): ?>
                                            <img class="w-9" src="<?php echo e(asset('images/geri/avatars/boy.png')); ?>" alt="" wire:click="cambiar(<?php echo e($habitacion->id); ?> , <?php echo e($habitacion->sexo); ?>)">
                                        <?php else: ?>
                                        <!------- on ----->
                                            <img class="w-9" src="<?php echo e(asset('images/geri/avatars/girl.png')); ?>" alt="" wire:click="cambiar(<?php echo e($habitacion->id); ?>, <?php echo e($habitacion->sexo); ?>)">                                
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="border py-2 text-center d-none d-lg-block">
                                    <div class="flex justify-center">
                                        <?php echo e(date('Y-m-d', strtotime($habitacion->updated_at))); ?>

                                    </div>
                                </td>
                                <td class="border px-1 py-2">
                                    <div class=" justify-center" style="display: inline-grid;">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('habitaciones.Modificar','web'.session('empresa_id'))): ?>
                                            <!-- Editar  -->
                                            <?php if (isset($component)) { $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.editar','data' => ['id' => ''.e($habitacion->id).'','class' => 'w-8/12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('editar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($habitacion->id).'','class' => 'w-8/12']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $attributes = $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $component = $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?><br>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('habitaciones.Eliminar','web'.session('empresa_id'))): ?>
                                            <!-- Eliminar -->
                                            <?php if (isset($component)) { $__componentOriginal9ddda47f568f29ef52afdb1e96730de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ddda47f568f29ef52afdb1e96730de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.eliminar','data' => ['id' => ''.e($habitacion->id).'','class' => 'w-8/12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('eliminar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($habitacion->id).'','class' => 'w-8/12']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ddda47f568f29ef52afdb1e96730de3)): ?>
<?php $attributes = $__attributesOriginal9ddda47f568f29ef52afdb1e96730de3; ?>
<?php unset($__attributesOriginal9ddda47f568f29ef52afdb1e96730de3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ddda47f568f29ef52afdb1e96730de3)): ?>
<?php $component = $__componentOriginal9ddda47f568f29ef52afdb1e96730de3; ?>
<?php unset($__componentOriginal9ddda47f568f29ef52afdb1e96730de3); ?>
<?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        No hay habitaciones
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/geri/habitacion/habitacion-component.blade.php ENDPATH**/ ?>