<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle col-8 sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <!-- <form class="col-12"> -->
                <!-- Controles -->
                
                
                <div class="container">
                <b>Nombred del Informe:  <?php echo e($nombredelinforme); ?></b>
                <table class="border-2 table-striped table" style="width: 100%;">
                <tr>
                    <td><b>Pregunta</b></td>
                    <td style="text-align: center"><b>Respuesta</b></td>
                </tr>
                <?php $__currentLoopData = $bancopreguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pregunta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($pregunta->nombreescala=='Lógica'): ?>
                        <tr>
                            <td>
                                <?php echo e($pregunta->textopregunta); ?>

                            </td>
                            <td class="col-3" style="text-align: center" colspan=2>
                                <input class="mr-1" type="radio" name="vuelo<?php echo e($pregunta->id); ?>" wire:click="TomarRespuesta(<?php echo e($informe_id); ?>,<?php echo e($pregunta->id); ?>,1,'')">SI
                                <input class="ml-3 mr-1" type="radio" name="vuelo<?php echo e($pregunta->id); ?>" wire:click="TomarRespuesta(<?php echo e($informe_id); ?>,<?php echo e($pregunta->id); ?>,2,'')">NO
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if($pregunta->nombreescala=='Numérica'): ?>
                        <tr>
                            <td>
                                <?php echo e($pregunta->textopregunta); ?>

                            </td>
                            <td class="col-3" >
                            <form wire:submit.prevent="submit">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" wire:model="preguntaId">
                                <textarea ></textarea>
                                
                                <button type="submit">Enviar respuesta</button>
                            </form>
                            
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if($pregunta->nombreescala=='Pocentaje'): ?>
                        <tr>
                            <td>
                                <?php echo e($pregunta->textopregunta); ?>

                            </td>
                            <td class="col-3" >Cantidad porcentaje: <input class="mr-1 shadow bg-gray-300" type="textbox" size="10"></td>
                        </tr>
                    <?php endif; ?>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

                </div>


                <!-- Botones -->
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
                    
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="closeModalPreguntas()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-700 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cerrar
                        </button>
                    </span>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/geri/actores/modalpreguntas.blade.php ENDPATH**/ ?>