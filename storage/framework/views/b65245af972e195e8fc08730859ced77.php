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
<?php $component->withAttributes([]); ?>Clientes <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $attributes = $__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__attributesOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72)): ?>
<?php $component = $__componentOriginal88538ab87cb05b41e7c48dce9d7aea72; ?>
<?php unset($__componentOriginal88538ab87cb05b41e7c48dce9d7aea72); ?>
<?php endif; ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            
        </div>

     <?php $__env->endSlot(); ?>

    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-1">
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
                    <div class="flex justify-around">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clientes.Agregar','web'.session('empresa_id'))): ?>
                        
                            <?php if (isset($component)) { $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.crear','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('crear'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Nuevo Cliente <?php echo $__env->renderComponent(); ?>
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
                                <?php echo $__env->make('livewire.cliente.createclientes', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php endif; ?>
                        
                        <?php endif; ?>
                        <div style="display: block">
                            <label for="">Buscar por cuit</label>
                            <input class="shadow-md m-1" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px 5px 0px 10px;" wire:keyup="BuscarCliente()" wire:model="search" type="search" placeholder="Ingresa cuit">
                        </div>        
                        <div class="w-full"><?php echo e($clientes->links()); ?></div>
                    </div>
                    <table class="table-fixed table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2 hidden md:table-cell md:visible">Dirección</th>
                                <th class="px-4 py-2 hidden md:table-cell md:visible">Cuil</th>
                                <th class="px-4 py-2 hidden md:table-cell md:visible">Teléfono</th>
                                <th class="px-4 py-2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($clientes): ?>
                                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="border px-4 py-2 text-left"><?php echo e($cliente->name); ?></td>
                                        <td class="border px-4 py-2 text-left hidden md:table-cell md:visible"><?php echo e($cliente->direccion); ?></td>
                                        <td class="border px-4 py-2 text-left hidden md:table-cell md:visible"><?php echo e($cliente->cuil); ?></td>
                                        <td class="border px-4 py-2 text-left hidden md:table-cell md:visible"><?php echo e($cliente->telefono); ?></td>
                                        <td class="border px-4 py-2">
                                            <div class="flex justify-center">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clientes.Modificar','web'.session('empresa_id'))): ?>
                                                
                                                    <div class="sm:flex justify-center">
                                                        <!-- Editar  -->
                                                        <?php if (isset($component)) { $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.editar','data' => ['id' => ''.e($cliente->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('editar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($cliente->id).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $attributes = $__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__attributesOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2)): ?>
<?php $component = $__componentOriginal18873a6cc0913e6cd2a794c5d33044d2; ?>
<?php unset($__componentOriginal18873a6cc0913e6cd2a794c5d33044d2); ?>
<?php endif; ?>
                                                    </div>
                                                
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clientes.Eliminar','web'.session('empresa_id'))): ?>
                                                
                                                    <div class="sm:flex justify-center">
                                                        <!-- Eliminar -->
                                                        <?php if (isset($component)) { $__componentOriginal9ddda47f568f29ef52afdb1e96730de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ddda47f568f29ef52afdb1e96730de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.eliminar','data' => ['id' => ''.e($cliente->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('eliminar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => ''.e($cliente->id).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ddda47f568f29ef52afdb1e96730de3)): ?>
<?php $attributes = $__attributesOriginal9ddda47f568f29ef52afdb1e96730de3; ?>
<?php unset($__attributesOriginal9ddda47f568f29ef52afdb1e96730de3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ddda47f568f29ef52afdb1e96730de3)): ?>
<?php $component = $__componentOriginal9ddda47f568f29ef52afdb1e96730de3; ?>
<?php unset($__componentOriginal9ddda47f568f29ef52afdb1e96730de3); ?>
<?php endif; ?>
                                                    </div>
                                                
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>       
                </div>
            </div>
        </div>
    </div>
</div>           
                    


<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/cliente/cliente-component.blade.php ENDPATH**/ ?>