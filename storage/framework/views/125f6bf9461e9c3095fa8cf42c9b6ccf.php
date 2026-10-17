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
<?php $component->withAttributes([]); ?>Gestionar las distintas empresas <?php echo $__env->renderComponent(); ?>
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

    <span wire:loading>
        <div class=\"inset-0 fixed\">
            <div class=\"absolute flex justify-center w-full mt-6 p-18\">
                <div class=\" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2\"
                    role=\"dialog\">
                    <div class=\" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4\">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Procesando...</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Espere unos segundos mientras se procesa la información ingresada...
                            </div>
                            <div class="modal-footer">
                                
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </span>

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
                    <div class="text-left">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('empresagestion.Agregar', 'web' . session('empresa_id'))): ?>
                            <button wire:click="CrearEmpresa()"
                                class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
                                
                                Crear empresa
                            </button>
                            
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($isModalOpen): ?>
                    <?php echo $__env->make('livewire.empresa-gestion.createempresa', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>
                <?php if($datos): ?>
                    <div>
                        <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul>
                                <li class="border text-left <?php if($seleccionado == $empresa->id): ?> bg-red-100 <?php endif; ?>"
                                    wire:click="CargarDatosEmpresa(<?php echo e($empresa->id); ?>)">
                                    <div class="w-full hover:scale-105 transition-all duration-500"
                                        style="hover:background-color=pink">
                                        <div class="rounded overflow-hidden border hover:bg-red-100 d-flex flex col-12">
                                            <?php if($empresa->imagen): ?>
                                                <img class="block flex-none bg-cover col-2 p-2"
                                                    src="<?php echo e(asset('/' . $empresa->imagen)); ?>"
                                                    style="width: 70px; height: 70px; border-radius: 15px;">
                                            <?php else: ?>
                                                <img class="block flex-none bg-cover col-2 p-2"
                                                    src="<?php echo e(asset('/images/sin_imagen.jpg')); ?>"
                                                    style="width: 70px; height: 70px; border-radius: 15px;">
                                            <?php endif; ?>
                                            <div class="bg-white rounded-b ml-4 pl-4 justify-between leading-normal bg-transparent col-sm-12 col-md-8"
                                                style="margin: auto;hover:background-color=pink; 0pacity: 1;">
                                                <div
                                                    class="text-black font-bold text-lg mb-2 leading-tight bg-transparent">
                                                    <?php echo e($empresa->name); ?>

                                                </div>
                                            </div>
                                            <p class="text-grey-darker text-base col-sm-12 col-md-2"
                                                style="margin: auto"><?php echo e($empresa->cuit); ?></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="w-full"><?php echo e($datos->links()); ?></div>
                    </div>
                <?php else: ?>
                    <h1>No hay datos</h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/empresa-gestion/empresa-gestion.blade.php ENDPATH**/ ?>