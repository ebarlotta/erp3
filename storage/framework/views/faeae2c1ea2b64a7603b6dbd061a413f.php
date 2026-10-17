<div>
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
    <section class="d-flex w-full">
        <section class="w-1/5 mt-2" style="background-color: beige;">
            
            <div>
                Menu de informes
            </div>
            <div class="d-flex mx-1">
                <button class="form-control col-6"  data-toggle="modal" data-target="#AgregarInformes">+</button>
                <button class="form-control col-6">PDF</button>
            </div>
            
            <div>
                <ul>
                    <?php $__currentLoopData = $ListadeTablas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tabla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li wire:click="DibujarTabla(<?php echo e($Tabla->id); ?>)"><?php echo e($Tabla->name); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </section>
        <section class="w-4/5 mt-2" style="background-color: lightblue;">
            <div>
                <div id="encabezado">
                    <div id="tablas">
                        <div id="DatosTablas" class="d-flex col-12 mt-2">
                            <div class="grid col-5">
                                <label>Titulo</label>
                                <input class="form-control col" type="text" wire:model="txttitulo">
                            </div>
                            <div class="grid col-3">
                                <label>Cantidad de Filas</label>
                                <input class="form-control col-12" type="text" wire:model="txtcantidadfila">
                            </div>
                            <div class="grid col-3">
                                <label>Cantidad Columnas</label>
                                <input class="form-control col-12" type="text" wire:model="txtcantidadcolumna">
                            </div>
                            <div class="grid col-1">
                                <label>Opción</label>
                                <button class="form-control col-12">+</button>
                            </div>
                        </div>
                        <hr/>
                        <div id="BotoneraTablas" class="d-flex col-12 mb-3">
                            <div class="grid col-1">
                                <label>Fila</label>
                                <input wire:model="txtfila" class="form-control col-12" type="text"value="1">
                            </div>
                            <div class="grid col-1">
                                <label>Columna</label>
                                <input wire:model="txtcolumna" class="form-control col-12" type="text"value="1">
                            </div>
                            <div class="grid col-2">
                                <label>Color Fondo</label>
                                <select wire:model="txtcolorfondo" class="form-control col-12">
                                    <option value="lightblue">Celeste</option>
                                    <option value="red">Rojo</option>
                                    <option value="lightgreen">Verde</option>
                                    <option value="blue">Azul</option>
                                    <option value="lightsalmon">Marrón</option>
                                    <option value="white">Blanco</option>
                                    <option value="black">Negro</option>
                                </select>
                            </div>
                            <div class="grid col-2">
                                <label>Alineación</label>
                                <select wire:model="txtalineacion" class="form-control col-12">
                                    <option value="center">Centro</option>
                                    <option value="left">Izquierda</option>
                                    <option value="right">Derecha</option>
                                </select>
                            </div>
                            
                            
                            
                            <div class="grid col-3">
                                <label>Opción</label>
                                
                                    <input class="btn btn-info" type="button" wire:click="ActualizarDato()" value="Actualizar">
                                    
                                    
                                
                            </div>

                        </div>
                        <div class="grid col-12 mb-3">
                            <label>Fórmula / Expresión</label>
                            <textarea wire:model="txtexpresion" cols="60" rows="3"><?php echo e($txtexpresion); ?></textarea>
                        </div>
                    </div>
                    <div id="celdas">
                        <div id="DatosCeldas"></div>
                        <div id="BotoneraCeldas"></div>
                    </div>
                </div>
                <div id="areatrabajo" class="m-2 p-2" style="background-color: lightslategrey; height: 100vh; border-radius: 5px;">
                    <label for=""> Vista Previa</label>
                    <div class="p-2">
                        <?php if($mostrartabla): ?> 
                            <?php echo $mostrartabla; ?>

                        <?php else: ?>
                            Nada seleccionado
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </section>


    <!-- Modal Alta/Modificación Informes -->
    <!-- ================================== -->
    <div wire:ignore.self class="modal fade" id="AgregarInformes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: inherit">
                <div class="modal-header">
                    <h5 class="modal-title">Alta/Modificación Informes</h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="Resetear()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="px-3 py-3 d-flex flex">
                    <div class="col-10">
                        <label for="">Nombre Informe</label>
                        <input class="form-control" type="text" wire:model="name" value="<?php echo e(old('name')); ?>">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-2">
                        <label for="">Filas</label>
                        <input class="form-control" type="text" wire:model="cantidadfila" value="<?php echo e(old('cantidadfila')); ?>">
                        <?php $__errorArgs = ['cantidadfila'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="px-3 py-3 d-flex flex">
                    <div class="col-10">
                        <label for="">Encabezado</label>
                        <input class="form-control" type="text" wire:model="encabezadocolumna" value="<?php echo e(old('encabezadocolumna')); ?>">
                        <?php $__errorArgs = ['encabezadocolumna'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-2">
                        <label for="">Columnas</label>
                        <input class="form-control" type="text" wire:model="cantidadcolumna" value="<?php echo e(old('cantidadcolumna')); ?>">
                        <?php $__errorArgs = ['cantidadcolumna'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="pb-3 ml-3">
                    <button type="button" class="btn btn-success" wire:click="store()">
                        <i class="fa-solid fa-pen-to-square"></i>Guardar
                    </button>
                    <button type="button" class="btn btn-info" wire:click="Resetear()" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-pen-to-square"></i>Cerrar
                    </button>
                </div>
                <?php if(session("mensaje")): ?>
                <div class="bg-green round-md alert alert-success">
                    <?php echo e(session('mensaje')); ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/tablas/disenar-component.blade.php ENDPATH**/ ?>