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
<?php $component->withAttributes([]); ?>Elementos <?php echo $__env->renderComponent(); ?>
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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <?php if(session()->has('message')): ?>
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="flex">
                        <div style="width: 30%; display:flex">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('elementos.Agregar','web'.session('empresa_id'))): ?>
                                <?php if (isset($component)) { $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.crear','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('crear'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Nuevo Elemento <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b)): ?>
<?php $attributes = $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b; ?>
<?php unset($__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal747bd4c1fcb906e65585a2d6307bee0b)): ?>
<?php $component = $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b; ?>
<?php unset($__componentOriginal747bd4c1fcb906e65585a2d6307bee0b); ?>
<?php endif; ?>
                            <?php endif; ?>

                            <input type="text" class="bg-blue-200 mx-2 mb-2 rounded pl-2" placeholder="Buscar" wire:model="search" wire:keyup="resumir($event.target.value)" style="height: 2.5rem;">
                        </div>

                        <div style="background-color: lightgray; display: flex; justify-content: space-between; border-radius:4px; height: 2.5rem;" class="w-full">
                            <div class="my-auto mx-auto rounded-md p-2 <?php if($seleccionado=='Medicamento'): ?> bg-red-400 <?php endif; ?>" wire:click="cambiarSeleccion('Medicamento')" style="height: 2.5rem;">
                                <input class="mr-2" type="radio" name="elements" value="Medicamento" checked>
                                <label class="mr-4" for="huey">Medicamento</label>
                            </div>

                            <div class="my-auto mx-auto rounded-md p-2 <?php if($seleccionado=='Ingrediente'): ?> bg-red-300 <?php endif; ?>" wire:click="cambiarSeleccion('Ingrediente')" >
                                <input class="mr-2" type="radio" name="elements" value="Ingrediente">
                                <label class="mr-4" for="huey">Ingrediente</label>
                            </div>
                            <div class="my-auto mx-auto rounded-md p-2 <?php if($seleccionado=='Descartable'): ?> bg-red-200 <?php endif; ?>" wire:click="cambiarSeleccion('Descartable')">
                                <input class="mr-2" type="radio" name="elements" value="Descartable">
                                <label class="mr-4" for="huey">Descartable</label>
                            </div>

                            <div class="my-auto mx-auto rounded-md p-2 <?php if($seleccionado=='Producto'): ?> bg-red-100 <?php endif; ?>" wire:click="cambiarSeleccion('Producto')">
                                <input class="mr-2" type="radio" name="elements" value="Producto">
                                <label class="mr-4" for="huey">Producto</label>
                            </div>

                            <div class="my-auto mx-auto rounded-md p-2 <?php if($seleccionado=='Articulo'): ?> bg-red-300 <?php endif; ?>" wire:click="cambiarSeleccion('Articulo')">
                                <input class="mr-2" type="radio" name="elements" value="Artíulo">
                                <label class="mr-4" for="huey">Artículo</label>
                            </div>
                        </div>
                        <?php if($isModalOpen): ?> <?php echo $__env->make('livewire.elementos.createelemento', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                        <?php if($isModalDelete): ?> <?php echo $__env->make('livewire.elementos.deleteelemento', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <?php endif; ?>
                        
                    </div>
                    <div class="mt-2" style="display: block">
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-1 col-5">Elemento</th>
                                    <th class="px-4 py-1 col-1 text-center">Existencia</th>
                                    <th class="px-4 py-1 col-2 text-center">Precio de Compra</th>
                                    <th class="px-4 py-1 col-1 text-center">Precio de Venta</th>
                                    <th class="py-1 col-1 text-center">Stock Mínimo</th>
                                    <th class="px-4 py-1 col-2 text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($datos): ?>
                                    <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elemento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="border px-4 py-1"><?php echo e($elemento->name); ?></td>
                                            <td class="border px-4 py-1 col-1 text-center"><?php echo e($elemento->existencia); ?></td>
                                            <td class="border px-4 py-1 col-2 text-center"><?php echo e($elemento->precio_compra); ?></td>
                                            <td class="border px-4 py-1 col-1 text-center"><?php echo e($elemento->precio_venta); ?></td>
                                            <td class="border py-1 col-1 text-center"><?php echo e($elemento->stock_minimo); ?></td>
                                            <td class="border px-4 py-1 col-2">
                                                <div class="block justify-center flex">
                                                
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('elementos.Modificar','web'.session('empresa_id'))): ?>
                                                        <!-- Editar  -->
                                                        <?php if (isset($component)) { $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.editar','data' => ['id' => ''.e($elemento->elemento_id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('editar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($elemento->elemento_id).'']); ?> <?php echo $__env->renderComponent(); ?>
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
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('elementos.Eliminar','web'.session('empresa_id'))): ?>
                                                        <!-- Eliminar -->
                                                        <button wire:click="delete(<?php echo e($elemento->elemento_id); ?>)" class="lg:hidden bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 mt-1 rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        </button>
                                                        <button wire:click="delete(<?php echo e($elemento->elemento_id); ?>)" class="hidden lg:flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 rounded mt-1w">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                            Eliminar
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    No hay elementos
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo e($datos->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/elementos/elementos-component.blade.php ENDPATH**/ ?>