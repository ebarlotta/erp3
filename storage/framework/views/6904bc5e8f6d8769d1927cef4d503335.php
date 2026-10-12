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
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tablasver.Agregar','web'.session('empresa_id'))): ?>
                        <button class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded" wire:click="create(<?php echo e($user_id); ?>)">Nuevo Informe</button>
                        <?php if($isModalOpen): ?>
                            <?php echo $__env->make('livewire.tablas.createtablas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                        <?php if(session('AsignacionOk')): ?> 
                            <div class="alert alert-success"><?php echo e(session('AsignacionOk')); ?>

                        <?php endif; ?>
                        <div class="w-full"><?php echo e($datos->links()); ?></div>
                    </div>
                    <div style="display: block">
                        <div class="flex">
                            <div class="block w-1/2"><p><h3>Usuarios</h3></p>
                                <table class="table-fixed table-striped w-full" style="background-color: lightblue;">
                                    
                                    <tbody>
                                        <?php if($users): ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr wire:click="CargarInformesHabilitados(<?php echo e($user->user_id); ?>)" style="border: 5px solid white;" >
                                                    
                                                    <td class="border px-4 py-2 text-left w-25">
                                                        <?php if($user->avatar): ?>
                                                            <p><img src="<?php echo e($user->avatar); ?>" alt="" width="40px;" height="40px;" style="margin: 7px;"></p>
                                                        <?php else: ?>
                                                            <p><img src="images/sin_imagen.jpg" alt="" width="40px;" height="40px;" style="margin: 7px;"></p>    
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class=" w-75">
                                                        <?php echo e($user->name); ?>

                                                    </td>
                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

                                
                            </div>

                            <div class="block w-1/2">
                                <p><h3>Informes Habilitados</h3></p>
                                <table class="table-fixed table-striped w-full ml-3" style="background-color: lightgreen;">
                                    <tbody>
                                        <?php if(count($tablas)>=1): ?>
                                            <?php $__currentLoopData = $tablas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr wire:click="CargarInformesHabilitados(<?php echo e($user->user_id); ?>)" style="height: 40px; border: 5px solid white;">
                                                    <td>
                                                        <?php echo e($tabla['name']); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                
                                            
                                        <?php else: ?>
                                            <?php if($tablas==[]): ?>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/tablas/tablas-component.blade.php ENDPATH**/ ?>