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
<?php $component->withAttributes([]); ?>Planes Alimentarios <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $attributes = $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $component = $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
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
    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <?php if(session()->has('message')): ?>
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="flex justify-around">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('plans.Agregar','web'.session('empresa_id'))): ?>
                            <?php if (isset($component)) { $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.crear','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('crear'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Nuevo Plan Alimentario <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b)): ?>
<?php $attributes = $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b; ?>
<?php unset($__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal747bd4c1fcb906e65585a2d6307bee0b)): ?>
<?php $component = $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b; ?>
<?php unset($__componentOriginal747bd4c1fcb906e65585a2d6307bee0b); ?>
<?php endif; ?>
                            <a href="menu">
                                <button class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded flex items-center gap-2">
                                    <i class="fa fa-arrow-left"></i>
                                        Volver a los menúes
                                </button>
                            </a>
                            <?php if($isModalOpen): ?>          <?php echo $__env->make('livewire.geri.plan-alimentario.createplanalimentario', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                            <?php if($isModalOpenGestionar): ?> <?php echo $__env->make('livewire.geri.plan-alimentario.gestionarplanalimentario', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                            <?php if($isModalOpenCopiarMenuPlan): ?> <?php echo $__env->make('livewire.geri.plan-alimentario.copiarmenuplan', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>

                        <?php endif; ?>
                        <div class="w-1/2 justify-end"><?php echo e($datos->links()); ?></div>
                    </div>
                    <div style="display: block">
                        <table class="table table-sm table-bordered">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <th class="col-2 border-r px-6 dark:border-neutral-500">Nombre</th>
                                <th class="col-8 border-r px-6 dark:border-neutral-500">Descripción</th>
                                <th class="col-1 border-r px-6 dark:border-neutral-500">Fecha Desde</th>
                                <th class="col-1 border-r px-6 dark:border-neutral-500">Fecha Hasta</th>
                                <th class="col-2 border-r px-6 dark:border-neutral-500">Activo</th>
                                <th class="col-1 border-r px-6 dark:border-neutral-500">Opciones</th>
                            </thead>
                            <tbody>
                                <?php if($datos): ?>
                                    <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?php echo e($plan->nombre); ?></td>
                                            <td class="text-left pl-2" style="vertical-align: middle;"><?php echo e($plan->descripcion); ?></td>
                                            <td style="vertical-align: middle;"><?php echo e(date('d-m-Y', strtotime($plan->desde))); ?></td>
                                            <td style="vertical-align: middle;"><?php echo e(date('d-m-Y', strtotime($plan->hasta))); ?></td>
                                            <td style="vertical-align: middle;">
                                                <div class="flex justify-center">
                                                    <?php if($plan->activo==0): ?>
                                                        <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="habilitar(<?php echo e($plan->id); ?>, <?php echo e($plan->activo); ?>)">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white"></span>
                                                        </span>
                                                    <?php else: ?>
                                                        <!------- on ----->
                                                        <span class="border rounded-full border-grey bg-red-400 flex items-center cursor-pointer w-12 bg-red justify-end" wire:click="habilitar(<?php echo e($plan->id); ?>, <?php echo e($plan->activo); ?>)">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white"></span>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td style="width: 20%;">
                                                <div style="display: flex">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('plans.Gestionar','web'.session('empresa_id'))): ?>
                                                        <!-- Gestionar  -->
                                                        <?php if (isset($component)) { $__componentOriginal76ae29e313a0a5f5b6cde2f854382813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal76ae29e313a0a5f5b6cde2f854382813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.gestionar','data' => ['id' => ''.e($plan->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('gestionar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($plan->id).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal76ae29e313a0a5f5b6cde2f854382813)): ?>
<?php $attributes = $__attributesOriginal76ae29e313a0a5f5b6cde2f854382813; ?>
<?php unset($__attributesOriginal76ae29e313a0a5f5b6cde2f854382813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76ae29e313a0a5f5b6cde2f854382813)): ?>
<?php $component = $__componentOriginal76ae29e313a0a5f5b6cde2f854382813; ?>
<?php unset($__componentOriginal76ae29e313a0a5f5b6cde2f854382813); ?>
<?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('plans.Modificar','web'.session('empresa_id'))): ?>
                                                        <!-- Editar  -->
                                                        <?php if (isset($component)) { $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.editar','data' => ['id' => ''.e($plan->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('editar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($plan->id).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $attributes = $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $component = $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('plans.Eliminar','web'.session('empresa_id'))): ?>
                                                        <!-- Eliminar -->
                                                        <?php if (isset($component)) { $__componentOriginal9ddda47f568f29ef52afdb1e96730de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ddda47f568f29ef52afdb1e96730de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.eliminar','data' => ['id' => ''.e($plan->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('eliminar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($plan->id).'']); ?> <?php echo $__env->renderComponent(); ?>
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
                                <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/geri/plan-alimentario/plan-alimentario-component.blade.php ENDPATH**/ ?>