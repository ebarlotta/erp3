<div>
    <main role="main" style="background-color: #F9F9F9; !important;">
        <link rel="stylesheet" href="<?php echo e(asset('css/registro.css')); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <div id="cuerpo" class=" pt-4" >
            <h1 class="titulo1">Configuración de los valores</h1>



            <div class="col-12">
                <p class="text-muted mt-3">Seleccione un trámite</p>
                <select  id="eleccion" class="form-control col-12 col-md-6 mb-3" style="font-size:1.2rem; height: 3.2rem;" wire:change="ElegirTramite()" wire:model="tramite_seleccionado" >
                    <option value="0">--- Seleccione alguna opción ---</option>
                    <?php $__currentLoopData = $tramites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tramite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tramite->id); ?>"><?php echo e($tramite->nombretramite); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            
            <div style="border: 1px solid #bbb6b6; padding: 0.5rem; background-color: #ededed8c !important; margin-bottom: 30px;">
                <label class="titulo_card" for="codigoTramite">Presupuesto</label>
                <?php if($tramite_seleccionado<>0): ?> 
                    <input type="button" class="btn btn-info ml-3 mb-3" value="+" title="Agregar elementos" wire:click="OpenModalAgregar();">
                <?php endif; ?>
                <table class="table-striped col-12" style="font-size: 0.9rem;">
                    <tbody>
                        <tr class="titulo_card blue-300" style="background-color: lightblue;">
                            
                            
                            <td>Descripción</td>
                            <td class="text-right">Precio Unitario</td>
                            <td class="text-center" style="width: 14rem">Cant.</td>
                            <td class="text-center">Total</td>
                            <td class="text-center">Opciones</td>
                        </tr>

                        <?php if($detalles): ?>
                            <?php $__currentLoopData = $detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr style="height: 30px;">
                                    
                                    <td><?php echo e($detalle->descripcionrequisitotipotramite); ?></td>
                                    <td class="text-right pr-2">$ <?php echo e($detalle['precio']); ?></td>
                                    <td class="text-center"><?php echo e($detalle['cantidad']); ?></td>
                                    <td class="text-right pr-2">$ <?php echo e($detalle['precio'] * $detalle['cantidad']); ?></td>
                                    <td class="text-right" style="width:8rem">
                                        <input type="button" class="btn btn-success" value="->" title="Modificar valores" wire:click="OpenModalModificar(<?php echo e($detalle['precio']); ?>,<?php echo e($detalle['cantidad']); ?>,<?php echo e($detalle['id']); ?>);">
                                        <input type="button" class="btn btn-danger" value="X" title="Eliminar valores" wire:click="eliminarvalores(<?php echo e($detalle['id']); ?>);">
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr style="background-color: lightblue; height: 30px;">
                                <td colspan=4 class="text-right">$ <?php echo e($total); ?></td>
                                <td class="text-right pr-2"></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>    
        </div>

        <?php if($ModalModificar): ?>
        
            <div class="modal-dialog modal-dialog-centered text-center" role="document" style="justify-content: center;">
                <div class="modal-content col-10">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Modificar Valores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="OpenModalModificar(1,1,1);">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body flex d-flex flex-wrap">
                        <div class="block col-12 col-md-4">
                            <label for="">Precio</label><br>
                            <input type="text" class="text-right col-12" id="precio_modificar" wire:model="precio_modificar" wire:change="Calcular('modificar');" value="<?php echo e($precio_modificar); ?>">        
                        </div>

                        <div class="block col-12 col-md-4">
                            <label for="">Cantidad</label><br>
                            <input type="text" class="text-right col-12" id="cantidad_modificar" wire:model="cantidad_modificar" wire:change="Calcular('modificar');" value="<?php echo e($cantidad_modificar); ?>">
                        </div>

                        <div class="block col-12 col-md-4">
                            <label for="">Total</label><br>
                            <input type="text" class="text-right col-12" id="total_modificar" wire:model="total_modificar" wire:change="Calcular('modificar');" value="<?php echo e($total_modificar); ?>">
                        </div>
                    </div>
                    <div class="modal-footer my-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="OpenModalModificar(1,1,1);">Cerrar</button>
                        <button type="button" class="btn btn-primary ml-3" wire:click="modificarValores();">Modificar</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($ModalAgregar): ?>
            
                <div class="modal-dialog modal-dialog-centered text-center" role="document" style="justify-content: center;">
                    <div class="modal-content col-10">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Agregar Valores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  data-dismiss="modal" wire:click="OpenModalAgregar();">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="block mx-3 col-12">
                        <label for="">Descripción</label><br><input type="text" class="text-right col-11" wire:model="descripcion_agregar">        
                    </div>
                    <div class="modal-body flex d-flex flex-wrap">

                        <div class="block col-12 col-md-4">
                            <label for="">Precio</label><br><input type="text" class="text-right" id="precio_modificar" wire:model="precio_agregar" wire:change="Calcular('agregar');">        
                        </div>

                        <div class="block col-12 col-md-4">
                            <label for="">Cantidad</label><br><input type="text" class="text-right" id="cantidad_modificar" wire:model="cantidad_agregar" wire:change="Calcular('agregar');">
                        </div>

                        <div class="block col-12 col-md-4">
                            <label for="">Total</label><br><input type="text" class="text-right" id="total_modificar" wire:model="total_agregar" wire:change="Calcular('agregar');" value="<?php echo e($total_agregar); ?>">
                        </div>

                    </div>
                    <div class="modal-footer my-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="OpenModalAgregar();">Cerrar</button>
                        <button type="button" class="btn btn-success ml-3" wire:click="agregarValores();">Agregar</button>
                    </div>
                    </div>
                </div>
            
        <?php endif; ?>



    </main>

    


</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/registro/configurarregistro-component.blade.php ENDPATH**/ ?>