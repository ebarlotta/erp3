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
            <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
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
        <?php if($isModalOpen): ?>
            <?php echo $__env->make('livewire.tablas.createtablas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
        <?php if(session('AsignacionOk')): ?> 
            <div class="alert alert-success"><?php echo e(session('AsignacionOk')); ?>

        <?php endif; ?>
    </div>
    <div style="display: block">

        <div class="flex h-full">
            <span wire:loading>
				<div class="inset-0 fixed">
					<div class="absolute flex justify-center w-full mt-6 p-18">
						<div class=" bg-gray-400 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-2 shadow-lg my-2" role="dialog">
							<div class=" bg-gray-400 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
								Espere unos segundos mientras se procesa la información ingresada...
							</div>
						</div>
					</div>
				</div>
			</span>
            <div class="block w-1/4">
                <h3>Informes Habilitados</h3>
                <table class="table-fixed table-striped w-full ml-3" style="background-color: lightblue;">
                    <tbody>
                        <?php if(count($ListadeTablas)>=1): ?>
                            <?php $__currentLoopData = $ListadeTablas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex">
                                    <button class="col-8" wire:click="Visualizar('<?php echo e($tabla['name']); ?>')" style="background-color: lightskyblue; width: 90%; height: 60px; margin-top: 10px; border-radius: 7px 0px 0px 7px; margin-right: 2px; box-shadow: 4px 4px 12px rgba(0,0,0,0.42);">
                                    <?php echo e($tabla['name']); ?>

                                    </button>
                                    
									<a class="col-4" href="<?php echo e(URL::to('pdf/informes/'.$tabla['name'])); ?>" target="_blank">
                                        
                                        <button style="background-color: lightskyblue; width: 90%; height: 60px;     margin-top: 10px; border-radius: 0px 7px 7px 0px; box-shadow: 4px 4px  12px rgba(0,0,0,0.42);">
                                            
                                            PDF
                                        </button>
                                    </a>
                                </div>
                                

                                
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php if($ListadeTablas==[]): ?>
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
            <div class="block">
                <h3>Vista Previa</h3> 
                
                <div class="p-2 shadow-lg" style="background:linear-gradient(90deg, lightblue 20%, white 50%); margin: 1.25rem; border-radius: 10px;" style="width: 100%;">
                    <?php echo $visualizar; ?> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/tablas/visualizar-tabla-component.blade.php ENDPATH**/ ?>