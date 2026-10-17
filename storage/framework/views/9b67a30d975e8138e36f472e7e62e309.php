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
<?php $component->withAttributes([]); ?>Menúes <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $attributes = $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $component = $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="mx-auto sm:px-6 lg:px-8">
                
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4">
                    <?php if(session()->has('message')): ?>
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                            <div class="flex">
                                <div><p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($isModalOpenGestionar): ?>
                        <?php echo $__env->make('livewire.geri.menu.gestionarmenu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php else: ?>
                        <div class="flex justify-around">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu.Agregar','web'.session('empresa_id'))): ?>
                                <?php if (isset($component)) { $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.crear','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('crear'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Nuevo Menú <?php echo $__env->renderComponent(); ?>
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
                                    <?php echo $__env->make('livewire.geri.menu.createmenu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                                <a href="<?php echo e(route('elementos')); ?>">
                                    <button wire:click="create()" class="px-2 bg-green-300 hover:bg-green-400 text-white-900 font-bold rounded" style="height: 40px; margin-bottom: 10px;">
                                        Nuevo Ingrediente
                                    </button>
                                </a>
                            <div>
                                <input type="text" class="bg-blue-200 p-2 rounded" placeholder="Buscar" wire:model="search" wire:keyup="resumir($event.target.value)">
                            </div>
                            <div>
                                <input type="radio" name="opciones" value="1" wire:click="CambiarLocal(1)">Sólo Locales<br>
                                <input type="radio" name="opciones" value="0" wire:click="CambiarLocal(0)">Todos
                            </div>
                            <div class="w-1/2 justify-end"><?php echo e($datos->links()); ?></div>

                        </div>
                        <div class="px-4" style="display: block">
                            <table class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="table-primary align-middle text-center ml-2">Nombre del Menú</th>
                                        <th class="table-primary align-middle text-center col-1">Para cuántas personas</th>
                                        <th class="table-primary align-middle text-center col-1">Activo</th>
                                        <th class="table-primary align-middle text-center col-1">Mantener Público</th>
                                        <th class="table-primary align-middle text-center col-1">Tiempo de Preparción</th>
                                        <th class="table-primary align-middle text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="pl-2">
                                                <?php echo e($menu->nombremenu); ?>

                                                <?php if(session('empresa_id')<>$menu->empresa_id): ?>
                                                    <i class="nav-icon far fa-circle text-info" style="border: solid 1px aliceblue;padding: 3px;border-radius: 10px;background-color: antiquewhite;"> Público importado</i>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center col-1">
                                                <?php echo e($menu->ppersonas); ?>

                                            </td>
                                            <td class=" col-1">
                                                <div class="flex justify-center">
                                                    <?php if($menu->menuactivo): ?>
                                                        <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="habilitar(<?php echo e($menu->id); ?>, <?php echo e($menu->menuactivo); ?>)">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                        <?php else: ?>
                                                        <!------- on ----->
                                                        <span class="border rounded-full border-grey flex items-center cursor-pointer w-12 bg-red-500 justify-end"  wire:click="habilitar(<?php echo e($menu->id); ?>, <?php echo e($menu->menuactivo); ?>)">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-center">
                                                    <?php if($menu->publico): ?>
                                                        <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="publicar(<?php echo e($menu->id); ?>, <?php echo e($menu->publico); ?>)">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                        <?php else: ?>
                                                        <!------- on ----->
                                                        <span class="border rounded-full border-grey flex items-center cursor-pointer w-12 bg-red-500 justify-end"  wire:click="publicar(<?php echo e($menu->id); ?>, <?php echo e($menu->publico); ?>)">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td class="text-center col-1"><?php echo e($menu->tiempopreparacion); ?></td>
                                            <td class="" style="width: 20%;">
                                                <div style="display: flex">
                                                    <!-- Gestionar  -->
                                                    <?php if (isset($component)) { $__componentOriginal76ae29e313a0a5f5b6cde2f854382813 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal76ae29e313a0a5f5b6cde2f854382813 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.gestionar','data' => ['id' => ''.e($menu->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('gestionar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($menu->id).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal76ae29e313a0a5f5b6cde2f854382813)): ?>
<?php $attributes = $__attributesOriginal76ae29e313a0a5f5b6cde2f854382813; ?>
<?php unset($__attributesOriginal76ae29e313a0a5f5b6cde2f854382813); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76ae29e313a0a5f5b6cde2f854382813)): ?>
<?php $component = $__componentOriginal76ae29e313a0a5f5b6cde2f854382813; ?>
<?php unset($__componentOriginal76ae29e313a0a5f5b6cde2f854382813); ?>
<?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu.Modificar','web'.session('empresa_id'))): ?>
                                                        <!-- Editar  -->
                                                        <?php if (isset($component)) { $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.editar','data' => ['id' => ''.e($menu->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('editar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($menu->id).'']); ?> <?php echo $__env->renderComponent(); ?>
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
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu.Eliminar','web'.session('empresa_id'))): ?>
                                                        <!-- Eliminar -->
                                                        <?php if (isset($component)) { $__componentOriginal9ddda47f568f29ef52afdb1e96730de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ddda47f568f29ef52afdb1e96730de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.eliminar','data' => ['id' => ''.e($menu->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('eliminar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($menu->id).'']); ?> <?php echo $__env->renderComponent(); ?>
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
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/geri/menu/menu-component.blade.php ENDPATH**/ ?>