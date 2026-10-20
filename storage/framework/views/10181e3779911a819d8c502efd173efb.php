<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline" style="max-width: 1000px">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex flex-wrap">
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="name">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Dirección</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="direccion">
                            <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Cuit</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="cuit">
                            <?php $__errorArgs = ['cuit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">IB</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="ib">
                            <?php $__errorArgs = ['ib'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Establecimiento</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="establecimiento">
                            <?php $__errorArgs = ['establecimiento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Teléfono</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="telefono">
                            <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">actividad</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="actividad">
                            <?php $__errorArgs = ['actividad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">actividad1</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="actividad1">
                            <?php $__errorArgs = ['actividad1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Menú</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="menu">
                            <?php $__errorArgs = ['menu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="email">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>                        
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Titular</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="nombretitular">
                            <?php $__errorArgs = ['nombretitular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">DNI Titular</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="dnititular">
                            <?php $__errorArgs = ['dnititular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 mr-3">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Habilitada</label>
                            <input type="checkbox" class="shadow rounded form-control text-gray-700 leading-tight" wire:model="habilitada">
                            <?php $__errorArgs = ['habilitada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php if($imagen): ?>
                            <div class="mb-4 block text-center">
                                <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Imágen</label>
                                <img class="mx-3" src="/<?php echo e($imagen); ?>" width="70px;">
                                <?php $__errorArgs = ['imagen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-4 block text-center">
                                <input value="Actualizar Imágen" type="button" class="btn btn-info">
                            </div>
                        <?php else: ?>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Imágen</label>
                                <img class="mx-3" src="/images/sin_imagen.jpg" width="70px;">
                                <input type="file" class="shadow appearance-none border rounded w-full py-2 pl-2 -mr-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" wire:model="imagen">
                                <?php $__errorArgs = ['imagen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('empresagestion.Agregar', 'web' . session('empresa_id'))): ?>
                    
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-300 text-base leading-6 font-bold text-white-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Guardar
                            </button>
                        </span>
                    
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
</div><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/empresa-gestion/createempresa.blade.php ENDPATH**/ ?>