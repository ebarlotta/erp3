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
<?php $component->withAttributes([]); ?>Informes <?php echo $__env->renderComponent(); ?>
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
        <?php if (isset($component)) { $__componentOriginal747bd4c1fcb906e65585a2d6307bee0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal747bd4c1fcb906e65585a2d6307bee0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.crear','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('crear'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Nuevo Informe <?php echo $__env->renderComponent(); ?>
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
            <?php echo $__env->make('livewire.tablas.createtablas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
        <?php if(session('AsignacionOk')): ?> 
            <div class="alert alert-success"><?php echo e(session('AsignacionOk')); ?>

        <?php endif; ?>
    </div>
    <div style="display: block">

        <div class="flex">

            <div class="block w-1/2">
                <p><h3>Informes Habilitados</h3></p>
                <table>
                    <?php if(count($ListadeTablas)>=1): ?>
                        <?php $__currentLoopData = $ListadeTablas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <tr>
                                <td>
                                    <div >
                                        <div style="width:100%;">
                                            <div class="w-full d-flex">
                                                <p class="shadow-md m-1 w-full" style="font-size: 18px; background-color: lightblue; border-radius: 10px; padding: 3px; width: 200px; height: 50px;"><?php echo e($tabla['name']); ?></p>

                                                <div class="flex justify-center">
                                                    <!-- Desde 640 en adelante -->
                                                    <button wire:click="edit('<?php echo e($tabla->name); ?>')" class="hidden lg:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-2 px-4 mr-2 rounded" style="heigth:10px;height: 50px;margin-top: 5px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                        </svg>
                                                        Activar
                                                    </button>
                                                    <!-- Menos 640 en adelante -->
                                                    <button wire:click="edit('<?php echo e($tabla->name); ?>')" class="lg:hidden bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-1 px-1 mt-1 rounded" style="heigth:10px;height: 50px;margin-top: 5px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                        </svg>
                                                    </button>
                                                </div>


                                                <div class="flex justify-center">
                                                    <!-- Desde 640 en adelante -->
                                                    <button wire:click="delete(<?php echo e($tabla->id); ?>)" class="hidden lg:flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-2 px-4 rounded mt-1w" style="heigth:10px;height: 50px;margin-top: 5px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                        Desactivar
                                                    </button>
                                                    <!-- Menos 640 en adelante -->
                                                    <button wire:click="delete(<?php echo e($tabla->id); ?>)" class="lg:hidden flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-1 rounded mt-1" style="heigth:10px;height: 50px;margin-top: 5px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <!-- Editar  -->
                                                
                                                <!-- Eliminar -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php if(isset($tablas)): ?>
                            <tr>
                                <td>
                                    Seleccione un usuario            
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td>
                                    Ningún informe habilitado
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/tablas/editar-tabla-component.blade.php ENDPATH**/ ?>