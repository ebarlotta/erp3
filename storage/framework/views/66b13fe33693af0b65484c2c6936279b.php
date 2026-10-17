<div>
    <?php if(session()->has('message')): ?>
        <div class="rounded-md bg-gren-300 px-6 py-1 mx-2 mt-3" role="alert" style="background-color: lightgreen;">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

<style>
    .error {
        color: red; /* Color del texto en rojo */
        font-size: 14px; /* Tamaño de fuente (opcional) */
        font-weight: bold; /* Texto en negrita (opcional) */
    }
</style>
    
    <form wire:submit.prevent="save" class="col-10 mx-auto mt-4">
        <div class="row">
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" wire:model="nombre" placeholder="Escribe tu Nombre">
                <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" wire:model="telefono" placeholder="Teléfono">
                <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" wire:model="direccion" placeholder="Dirección">
                <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" wire:model="dni" placeholder="DNI">
                <?php $__errorArgs = ['dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="CUIT">CUIT:</label>
                <input type="text" class="form-control" wire:model="cuit" placeholder="CUIT">
                <?php $__errorArgs = ['cuit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="institucion">Institución:</label>
                <input type="text" class="form-control" wire:model="institucion" placeholder="Institución">
                <?php $__errorArgs = ['institucion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="email">Email:</label>
                <input type="email" class="form-control" wire:model="email" placeholder="Email">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group col-7 mb-2 btn btn-warning ml-3" style="height: fit-content;margin-top: 2%;">
                <label for="archivo">Déjanos tu archivo:</label>
                <input type="file" wire:model="photo" class="ml-2 w-full">
                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
            </div>

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="cantidadhojas">Cantidad de Hojas:</label>
                <input type="number" class="form-control" wire:model="cantidadhojas" wire:keyup="EstimarPrecio" wire:change="EstimarPrecio" placeholder="Cantidad de Hojas">
                <?php $__errorArgs = ['cantidadhojas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="tipoImpresion">Tipo de Impresión:</label>
                <select id="tipoImpresion" class="form-control" wire:model="tipodeimpresion" wire:change="EstimarPrecio">
                    <option value="0">-- Seleccione un sistema</option>
                    <?php if(!is_null($sistemas)): ?>
                        <?php $__currentLoopData = $sistemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sistema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sistema->id); ?>"><?php echo e($sistema->sistema); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
                <?php $__errorArgs = ['tipodeimpresion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="simpleDobleFas">Simple o Doble Faz:</label>
                <select class="form-control" wire:model="frentedorso" wire:change="EstimarPrecio">
                    <option value="0">-- Seleccione un lado</option>
                    <?php $__currentLoopData = $lados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($lado->id); ?>"><?php echo e($lado->lados); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['frentedorso'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>


            

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="tipodepapel">Tipo de Papel:</label>
                <select class="form-control" wire:model="tipodepapel" wire:change="EstimarPrecio">
                    <option value="0">-- Seleccione un gramaje</option>
                    <?php if($gramajes): ?>
                        <?php $__currentLoopData = $gramajes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gramaje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($gramaje->id); ?>"><?php echo e($gramaje->gramaje); ?> - <?php echo e($gramaje->tamano_papel); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
                <?php $__errorArgs = ['tipodepapel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group col-sm-12 col-lg-6 col-xl-4 mb-2">
                <label for="cantidadEjemplares">Cantidad de Ejemplares:</label>
                <input type="number" class="form-control" wire:model="cantidadejemplares" wire:keyup="EstimarPrecio" wire:change="EstimarPrecio" placeholder="Cantidad de Ejemplares">
                <?php $__errorArgs = ['cantidadejemplares'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-4 mt-3 mb-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" wire:model="retiraenlocal" checked>
                    <label class="form-check-label" for="homePickup">Retira por El Local</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" wire:model="geoposicion">
                    <label class="form-check-label" for="deliveryService">Enviar por delivery $</label>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-4 mt-3 mb-2">
                <label for="cantidadEjemplares">Observaciones:</label>
            <textarea wire:model="observaciones" name="" id="" cols="60" rows="2"></textarea>
            
            </div>
            <div class="form-group col-sm-6 col-md-6 col-lg-4 mt-3 mb-2">
                <label for="cantidadEjemplares">Costo Aproximado: $ <?php echo e(number_format($PrecioEstimado,2,",",".")); ?></label>
            </div>
        </div>
    
        <div class="row mt-3 mx-3 text-center">
            
            
            <div class="col-md-12">
                

                <button type="submit" class="btn btn-primary mt-3 col-6">Enviar</button>
            </div>
        </div>
    </form>

    <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model' => 'open']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'open']); ?>
         <?php $__env->slot('title', null, []); ?> 
            Nuevo
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('content', null, []); ?> 
            El archivo ha sido enviado correctamente!!!
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'btn btn-info','wire:click' => '$set(\'open\',false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn btn-info','wire:click' => '$set(\'open\',false)']); ?>Cerrar <?php echo $__env->renderComponent(); ?>
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
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/imprenta/enviar-component.blade.php ENDPATH**/ ?>