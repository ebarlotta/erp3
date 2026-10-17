<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
    <style>
        .fondo-par {
            background-color: #ccc7c7; /* Gris claro */
        }
        .fondo-impar {
            background-color: #cec096; /* Blanco u otro color deseado */
        }
        .importado {
            font-weight: bold !important;
            color: #007bff !important; /* azul */
        }
    </style>

    <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline" style="max-width: 86%;margin-left: 15%;">
            <form>
                <div class="bg-white px-4 pb-1 sm:p-6 sm:pb-1">
                    <div class="mb-4">
                        <div class="flex d-flex" style="justify-content: space-between;">
                            <label class="block text-gray-700 text-md font-bold mb-2"><?php echo e($plan_nombre); ?>

                            </label>
                            <p style="cursor:pointer; width:10px;" class="ml-1 m-0 border px-2 rounded bg-red-100" title="Eliminar del Plan" wire:click="closeModalPopover()">X</p>
                        </div>
                        <?php if(session()->has('message')): ?>
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen"><?php echo e(session('message')); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="bg-white px-4  pb-1 sm:pb-1">
                    <div class="col-12 flex d-flex">
                        <div class="mb-4 col-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Menúes Disponibles</label>
                            <select class="form-control" wire:model="menu_elegido" wire:change="OcultarMensaje();">
                                <option value="">-- Seleccione un menú --</option>
                                <?php $__currentLoopData = $listadomenues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    
                                    <option value="<?php echo e($menu->id); ?>"
                                        <?php if(session('empresa_id') <> $menu->empresa_id): ?>
                                            class="importado"
                                        <?php endif; ?>
                                    >
                                        <?php echo e($menu->nombremenu); ?>

                                        <?php if(session('empresa_id') <> $menu->empresa_id): ?>
                                            ( Público importado )
                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['menu_elegido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 col-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Día</label>
                            <select class="form-control" wire:model="dia" wire:change="OcultarMensaje();">
                                <option value="">-- Seleccione un día --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>

                            </select>
                            <?php $__errorArgs = ['menu_elegido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 col-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Día</label>
                            <select class="form-control" wire:model="momento_dia_id" wire:change="OcultarMensaje();">
                                <option value="">-- Seleccione un momento --</option>
                                <?php $__currentLoopData = $momentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $momento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($momento->id); ?>"><?php echo e($momento->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['menu_elegido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4 col-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                            <input class="form-control" type="number" wire:model="cantidad" value="1" wire:change="OcultarMensaje();">
                            <?php $__errorArgs = ['menu_elegido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-2 bg-white px-4 pb-1 sm:pb-1 mt-3">
                            
                            <input type="button" class="hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-2 px-4 mr-2 rounded col-12" value="Agregar" wire:click="storeDetalle()">
                        </div>
                    </div>

                    <div class="flex col-12">
                        <div class="col-12">
                            <label for="">Momentos del día</label>
                            <table class="table table-striped table-responsive" style="padding:10px;">
                                <tr>
                                    <td>Día</td>
                                    <td>Desayuno</td>
                                    <td>Almuerzo</td>
                                    <td>Merienda</td>
                                    <td>Cena</td>
                                </tr>
                                <?php for($i = 1; $i <= 14; $i++): ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>

                                        <?php $__currentLoopData = [1 => 'Desayuno', 2 => 'Almuerzo', 3 => 'Merienda', 4 => 'Cena']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $momentoId => $momentoNombre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 bg-blue-200 rounded-md" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="float: right; margin-top: -9px; margin-right: -9px;" title="Duplicar" wire:click="CopiarMenuPlan( <?php echo e($i); ?> , <?php echo e($momentoId); ?>)">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-4 8H6a2 2 0 01-2-2V6a2 2 0 012-2h6l6 6v10a2 2 0 01-2 2z" />
                                                    </svg>
                                                <?php $__currentLoopData = $listadomenuesenelplan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item->dia == $i && $item->momento_dia_id == $momentoId): ?>
                                                        <div class="flex items-center space-x-2 mb-1 p-2 border rounded shadow">
                                                            <p class="flex-grow"><?php echo e($item->nombremenu); ?></p>
                                                            <input type="number" value="<?php echo e($item->cantidad); ?>" class="w-16 border rounded text-sm px-1 bg-green-100 text-right" wire:change="ActualizarCantidad(<?php echo e($item->momento_dia_id); ?>, <?php echo e($item->dia); ?>, <?php echo e($item->menu_id); ?>, $event.target.value)">
                                                            <p style="cursor:pointer;" class="ml-1 m-0 border px-2 rounded bg-red-100" title="Eliminar del Plan" wire:click="EliminarRelMenuPlan(<?php echo e($item->momento_dia_id); ?>,<?php echo e($item->dia); ?>,<?php echo e($item->menu_id); ?>)">X</p>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endfor; ?>

                            </table>
                        </div>
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
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/geri/plan-alimentario/gestionarplanalimentario.blade.php ENDPATH**/ ?>