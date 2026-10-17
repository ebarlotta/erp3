<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <?php if($ModalOk): ?>
                            <div class="alert alert-success">
                                <strong>
                                    Seguro que quiere asignar permisos a este usuario para el informe seleccionado?
                                </strong>
                                <div class="text-end">
                                    <button class="btn btn-primary" wire:click=AsignarInforme()> Si </button>
                                    <button class="btn btn-danger" wire:click="ModalOkAsignar(0)"> No </button>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Informes</label>
                        <?php if($user_id<>0): ?>
                            <div class="mb-4 flex">
                                <?php $__currentLoopData = $ListadeTablas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex">
                                    <?php if($item->relac_id ): ?>
                                        <div class="shadow-md m-1 flex" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 8px; height: 45px;" wire:click="ModalOkAsignar(<?php echo e($item->relac_id); ?>,<?php echo e($item->tabla_id); ?>)">
                                            <?php echo e($item->name); ?><img src="<?php echo e(asset('images/activo.png')); ?>" style="width: 30px;height: 20px;margin: 5px 10px 0px 12px; padding-right: 10px;"></div>
                                    <?php else: ?>
                                        <div class="shadow-md m-1 flex" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 8px; height: 45px;" wire:click="ModalOkAsignar(0,<?php echo e($item->tabla_id); ?>)">
                                            <?php echo e($item->name); ?><img src="<?php echo e(asset('images/pasivo.jpg')); ?>" style="width: 30px;height: 20px;margin: 5px 10px 0px 12px; padding-right: 10px;">
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            Debe seleccionar primero un usuario
                        <?php endif; ?>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    
                    <?php if (isset($component)) { $__componentOriginal0b8e008b9eeb9aa717a966287bf60513 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8e008b9eeb9aa717a966287bf60513 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cerrar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cerrar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b8e008b9eeb9aa717a966287bf60513)): ?>
<?php $attributes = $__attributesOriginal0b8e008b9eeb9aa717a966287bf60513; ?>
<?php unset($__attributesOriginal0b8e008b9eeb9aa717a966287bf60513); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b8e008b9eeb9aa717a966287bf60513)): ?>
<?php $component = $__componentOriginal0b8e008b9eeb9aa717a966287bf60513; ?>
<?php unset($__componentOriginal0b8e008b9eeb9aa717a966287bf60513); ?>
<?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/tablas/createtablas.blade.php ENDPATH**/ ?>