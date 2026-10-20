<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:max-w-md sm:w-full  md:max-w-4xl lg:max-w-5xl md:ml-10" 
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 shadow-md flex flex-wrap">
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Ingrese Nombre" wire:model="name">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1"
                            class="block text-gray-700 text-sm font-bold mb-2">Domicilio</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Domicilio" wire:model="domicilio">
                        <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1"
                            class="block text-gray-700 text-sm font-bold mb-2">DNI</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Ingrese Cuil" wire:model="dni">
                        <?php $__errorArgs = ['dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1"
                            class="block text-gray-700 text-sm font-bold mb-2">Cuil</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Ingrese Cuil" wire:model="cuil">
                        <?php $__errorArgs = ['cuil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Fecha
                            Nacimiento</label>
                        <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Fecha de Nacimiento" wire:model="nacimiento" value="<?php echo e($nacimiento); ?>">
                        <?php $__errorArgs = ['nacimiento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Fecha
                            de Ingreso</label>
                        <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Ingrese Fecha de Ingreso" wire:model="ingreso">
                        <?php $__errorArgs = ['ingreso'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Estado Civil</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="estadocivil" >
                            <option value="">-</option>
                            <option value="Separado/a">Separado/a</option>
                            <option value="Soltero/a">Soltero/a</option>
                            <option value="Viudo/a">Viudo/a</option>
                            <option value="Otro/a">Otro/a</option>
                        </select>
                        <?php $__errorArgs = ['estadocivil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Tipo Contratación</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="tipocontratacion">
                            <option value="">-</option>
                            <option value="Por Contrato">Por Contrato</option>
                            <option value="A tiempo parcial">A tiempo parcial</option>
                            <option value="Otro/a">Otro/a</option>
                        </select>
                        <?php $__errorArgs = ['tipocontratacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Régimen</label>
                        <select wire:model="regimen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">-</option>
                            <option value="Jubilación docente">Jubilación docente</option>
                            <option value="General">General</option>
                            <option value="Jubilación ordinaria">Jubilación ordinaria</option>
                            <option value="Jubilación de trabajador/a minusválido/a">Jubilación de trabajador/a
                                minusválido/a</option>
                        </select>
                        <?php $__errorArgs = ['regimen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1"
                            class="block text-gray-700 text-sm font-bold mb-2">Banco</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Ingrese Banco" wire:model="banco">
                        <?php $__errorArgs = ['banco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Número
                            de Cuenta</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Número de cuenta" wire:model="nrocuentabanco">
                        <?php $__errorArgs = ['nrocuentabanco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1"
                            class="block text-gray-700 text-sm font-bold mb-2">Teléfono</label>
                        <input type="text"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Ingrese Teléfono" wire:model="telefono">
                        <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Mensualizado</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="mensualizado" id="" wire:model="mensualizado">
                            <option value="1">Mensualizado</option>
                            <option value="0">No Mensualizado</option>
                        </select>
                        <?php $__errorArgs = ['mensualizado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Jornalizado</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="jornalizado" id="" wire:model="jornalizado">
                            <option value="1">Jornalizado</option>
                            <option value="0">No Jornalizado</option>
                        </select>
                        <?php $__errorArgs = ['jornalizado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Por Hora</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="hora" id="" wire:model="hora">
                            <option value="1">Por Hora</option>
                            <option value="0">No por hora</option>
                        </select>
                        <?php $__errorArgs = ['hora'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1"
                            class="block text-gray-700 text-sm font-bold mb-2">Unidad/</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="unidad" id="" wire:model="unidad">
                                <option value="1">Por Unidad</option>
                                <option value="0">No por Unidad</option>
                            </select>
                        <?php $__errorArgs = ['unidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Activo</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="activo" id="" wire:model="activo">
                            <option value="1">Activo</option>
                            <option value="0">Pasivo</option>
                        </select>
                        <?php $__errorArgs = ['activo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Fecha
                            de Baja</label>
                        <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="exampleFormControlInput1" placeholder="Fecha de Baja" wire:model="baja">
                        <?php $__errorArgs = ['baja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4 col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 pr-3">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Categoría Profesional</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="categoriaprofesional" id="" wire:model="categoriaprofesional">
                            <?php echo e($categoriaprofesional . 'hola'); ?>

                            <?php $__currentLoopData = $categoriasprofesionales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoriaprofesionalx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($categoriaprofesionalx->id == $categoriaprofesional): ?>
                                    <option value="<?php echo e($categoriaprofesionalx->id); ?>" selected><?php echo e($categoriaprofesionalx->name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($categoriaprofesionalx->id); ?>"><?php echo e($categoriaprofesionalx->name); ?></option>
                                <?php endif; ?>    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        
                        <?php $__errorArgs = ['categoriaprofesional'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/empleado/createempleados.blade.php ENDPATH**/ ?>