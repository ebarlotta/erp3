<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nro. Habitación</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Número de Habitación" wire:model="NroHabitacion">

                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nro. Cama</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Número de Cama" wire:model="NroCama">
                            <div class="flex justify-arround">
                                <div class="w-50 block mr-2">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                                    <select name="EstadoCama" id="" wire:model="EstadoCama">
                                        <option value=""></option>
                                        <option value="1">Habilitada</option>
                                        <option value="0">Desabilitada</option>
                                    </select>
                                    <!-- <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                                    <input type="text" class="shadow appearance-none border rounded w-full mr-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Estado" wire:model="EstadoCama"> -->
                                </div>
                                <div class="w50 block ml-2">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Sexo Cama</label>
                                    <select name="SexoCama" id="" wire:model="SexoCama">
                                        <option value=""></option>
                                        <option value="1">Masculino</option>
                                        <option value="0">Femenina</option>
                                    </select>

                                    <!-- 
                                    <div class="w-50 inline-flex ml-4">
                                        <input class=" mr-4" type="radio" id="male" name="gender" value="1" wire:modal="SexoCama">
                                        <img class="w-9" src="<?php echo e(asset('images/geri/avatars/boy.png')); ?>" alt="">
                                        <input class=" ml-4" type="radio" id="female" name="gender" value="0" wire:modal="SexoCamaM">
                                        <img class="w-9" src="<?php echo e(asset('images/geri/avatars/girl.png')); ?>" alt=""> -->
                                    <!-- <input type="text" class="shadow appearance-none border rounded w-full ml-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Sexo Cama" wire:model="SexoCama"> 
                                    </div>-->
                                </div>
                                <?php $__errorArgs = ['estadocivil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>
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
</div><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/geri/estadocama/createcama.blade.php ENDPATH**/ ?>