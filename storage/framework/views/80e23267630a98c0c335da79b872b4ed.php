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
<?php $component->withAttributes([]); ?>Gestión de Menú - <?php echo e($menu[0]['nombremenu']); ?> <?php echo $__env->renderComponent(); ?>
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
                    <div>
                        <div style="background-color: rgb(205, 207, 209); font-size: 2rem;">
                            Ingredientes del menú
                            <table class="table-striped min-w-full border text-center font-light dark:border-neutral-500" style="font-size: 1.1rem;">
                                
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <th class="col-9 border-r px-6 dark:border-neutral-500">Ingredientes</th>
                                    <th class="col-2 border-r px-6 dark:border-neutral-500">Cantidad</th>
                                    <th class="col-1 border-r px-6 dark:border-neutral-500">Unidad</th>
                                    <th class="col-1 border-r px-6 dark:border-neutral-500">Opciones</th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $ingredientesdelmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredientedelmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($ingredientedelmenu->nombre_elemento); ?></td>
                                            
                                            <td><?php echo e($ingredientedelmenu->cantidad); ?></td>
                                            <td><?php echo e($ingredientedelmenu->nombre_unidad); ?></td> <!-- Imprime la unidad -->
                                            <td>
                                                <button class="inline-flex justify-center rounded-md border border-transparent px-4 bg-red-300 text-base leading-6 font-bold text-white-900 shadow-md hover:bg-red-400 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 mt-1" wire:click="EliminarRelacionMenuIngrediente(<?php echo e($ingredientedelmenu->menu_id); ?>,<?php echo e($ingredientedelmenu->elemento_id); ?>)">Eliminar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div><br>

                        <div style="background-color:  rgb(205, 207, 209)">
                            Seleccione los ingredientes del menú
                            <table class="min-w-full border text-center font-light dark:border-neutral-500" style="font-size: 1.1rem;">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <th class="col-9 border-r px-6 dark:border-neutral-500">Ingredientes</th>
                                    <th class="col-2 border-r px-6 dark:border-neutral-500">Cantidad</th>
                                    <th class="col-2 border-r px-6 dark:border-neutral-500">Unidad</th>
                                    <th class="col-1 border-r px-6 dark:border-neutral-500">Opciones</th>
                                </thead>
                                <tbody class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <td class="border" style="padding-right: 1.4rem;">
                                            <select class="col-12 mx-3 btn bg-primary-100" style="background-color: darkgray;"  wire:model="ingrediente_gestionar_id" wire:change="BuscarUnidad">
                                                <option value="0" selected>-</option>
                                                <?php $__currentLoopData = $ingredientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingrediente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($ingrediente->id); ?>"><?php echo e($ingrediente->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['ingrediente_gestionar_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </td>
                                        <td class="border">
                                            <input type="text" class="col-11 btn" style="background-color: darkgray;" wire:model="cantidad">
                                            <?php $__errorArgs = ['cantidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </td>
                                        <td class="border">
                                            <input type="text" class="col-11 btn" style="background-color: darkgray;" wire:model="unidad" disabled>

                                        </td>
                                        <td class="border">
                                            <button wire:click="AgregarElementoAlMenu()" type="button" class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-green-300 text-base leading-6 font-bold text-white-900 shadow-sm hover:bg-green-400 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                Guardar
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=3 style="text-align: right;">
                                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto col-3 text-right">
                                                <button wire:click="closeModalPopoverGestionar()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-700 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                    Cerrar
                                                </button>
                                                <?php if($hacerlocal==1): ?>
                                                    <button wire:click="openModalPopoverHacerLocal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 ml-2 px-4 py-2 bg-orange-300 text-base leading-6 font-bold text-gray-700 shadow-sm hover:bg-orange-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                    Hacer Local
                                                    </button>
                                                <?php endif; ?>
                                            </span>
                                        </td>
                                    </tr>
                            </table>
                            <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['class' => 'max-w-lg w-full mt-10','wire:model' => 'isModalOpenHacerLocal','style' => 'margin-top: 100px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-lg w-full mt-10','wire:model' => 'isModalOpenHacerLocal','style' => 'margin-top: 100px']); ?>
                                 <?php $__env->slot('title', null, ['style' => 'margin-top: 100px; padding-top: 100px;']); ?> 
                                    Hacer Local el Menú
                                 <?php $__env->endSlot(); ?>
                                 <?php $__env->slot('content', null, []); ?> 
                                    <h2>Esta acción producirá que el menú <?php echo e($menu[0]['nombremenu']); ?> aparezca en local en la lista de menúes</h2>
                                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Está seguro de que quiere hacerlo local ? <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                                        
                                 <?php $__env->endSlot(); ?>
                                 <?php $__env->slot('footer', null, []); ?> 
                                    <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'btn bg-yellow-300 btn-warning mr-2','wire:click' => 'HacerElMenuLocal('.e($menu[0]['id']).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn bg-yellow-300 btn-warning mr-2','wire:click' => 'HacerElMenuLocal('.e($menu[0]['id']).')']); ?>Si, hacer local <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'btn btn-info','wire:click' => '$set(\'isModalOpenHacerLocal\',false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn btn-info','wire:click' => '$set(\'isModalOpenHacerLocal\',false)']); ?>Volver <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/geri/menu/gestionarmenu.blade.php ENDPATH**/ ?>