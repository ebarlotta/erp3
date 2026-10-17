<div>
    <div class="grey-bg container-fluid">
        <section id="stats-subtitle">
        <?php if(session("mensaje")): ?>
            <div class="bg-green round-md alert alert-success">
                <?php echo e(session('mensaje')); ?>

            </div>
        <?php endif; ?>
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-3">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="media-body">
                                        <div class="flex d-flex justify-content-beetwen">
                                            <div class="flex d-flex col-9">
                                                <h4>Listado de Módulos</h4>
                                                <button type="button" class="ml-3 mb-1 btn btn-info" wire:click="showNew()" data-toggle="modal" data-target="#ModalEdit">
                                                    Nuevo
                                                </button>
                                                <div class="w-1/2 justify-end"><?php echo e($modulos->links()); ?></div>
                                            </div>
                                            <div class="col-3">
                                                <input wire:model="buscar" wire:keyup="filtrar()" type="text" class="form-control rounded-md" placeholder="Buscar">
                                            </div>
                                        </div>
                                        <table class="table table-hover text-nowrap table-rounded">
                                            <tr>
                                                <td style="background-color: rgb(164, 157, 157);"><b>Módulo</b></td>
                                                <td style="background-color: rgb(164, 157, 157);"><b>Opciones</b></td>
                                            </tr>
                                            <?php if($modulos): ?>
                                                <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="d-flex" style="margin: auto"><img class="mr-3 rounded-md" src="images/<?php echo e($modulo->imagen); ?>" alt="" width="50px"> <?php echo e($modulo->name); ?></td>
                                                    <td>
                                                        <button type="button" wire:click="showEdit(<?php echo e($modulo->id); ?>)" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit">
                                                            Editar
                                                        </button>
                                                        <button type="button" wire:click="showDelete(<?php echo e($modulo->id); ?>)" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete">
                                                            Eliminar
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Alta/Modificación Módulo -->
            <!-- ================================== -->
            <div wire:ignore.self class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  col-6" role="document" style="max-width: 80%;">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Alta/Modificación Módulos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div class="flex col-12 flex-wrap">
                                <div class="col-3">
                                    <label for="">Nombre del Módulo</label>
                                    <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" wire:model="name" wire:keyup="ShowActualizar()">
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
                                <div class="col-3">
                                    <label for="">Página URL</label>
                                    <input type="text" class="form-control" value="<?php echo e(old('pagina')); ?>" wire:model="pagina" wire:keyup="ShowActualizar()">
                                    <?php $__errorArgs = ['pagina'];
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
                                <div class="col-3">
                                    <label for="">Imágen</label>
                                    <input type="text" class="form-control" value="<?php echo e(old('imagen')); ?>" wire:model="imagen" wire:keyup="ShowActualizar()">
                                    <?php $__errorArgs = ['imagen'];
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
                                <div class="col-3">
                                    <label for="">Habilitado</label>
                                    <input type="checkbox" class="form-control" value="<?php echo e(old('habilitado')); ?>" wire:model="habilitado" wire:keyup="ShowActualizar()">
                                    <?php $__errorArgs = ['habilitado'];
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
                                <div class="col-12">
                                    <label for="">Leyenda</label>
                                    <textarea wire:model="leyenda" rows="2" class="col-12" wire:keyup="ShowActualizar()" style="box-shadow: 6px 6px 17px lightblue; border-radius: 10px; background-color: lightgray;"><?php echo e(old('leyenda')); ?></textarea>
                                    
                                    <?php $__errorArgs = ['leyenda'];
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
                            <div class="mt-3">
                                <select class="form-control" wire:model="empresa_id" wire:change="combo_empresa()">
                                    <option value="0">--- Seleccione una empresa ---</option>
                                    <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($empresa->id); ?>" <?php echo e($empresa_id == $empresa->id ? 'selected' : ''); ?>><?php echo e($empresa->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    <?php $__errorArgs = ['empresa_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </select>
                            </div>
                            <?php if($empresa_id<>0): ?>
                                <div class="mt-3">
                                    <label for="">
                                    Permisos
                                    <button type="button" class="btn btn-success mb-1 ml-2">Agregar
                                        <span class="col-1 fs-3 ml-1" aria-hidden="true" style="lightcoral;border-radius: 5px; text-align: center;vertical-align: middle;background-color: lightgreen;" wire:click="showNewPermiso()" data-toggle="modal" data-target="#ModalAddPermission">&plus;</span>
                                    </button>
                                    </label><br>
                                    <?php if(count($permisos)): ?>
                                        <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <button type="button" class="btn btn-outline-success mb-1">
                                                <?php echo e($permiso->name . ' - ' . $permiso->guard_name); ?>

                                            
                                            
                                            <span style="color:white; margin-left: 10px; background-color: rgb(189, 129, 129); border-radius: 3px; width: 20px; display: inline-block;vertical-align: middle;" aria-hidden="true" title="Eliminar Permiso" wire:click="getPermisoaEliminar(<?php echo e($permiso->id); ?>, '<?php echo e($permiso->name); ?>')" data-toggle="modal" data-target="#ModalDeletePermiso" >&times;</span>
                                            
                                            </button>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
                            <?php else: ?>
                                Empresa: <?php echo e($empresa_id); ?>

                            <?php endif; ?>

                            <div class="pt-3">
                                
                                <?php if($ShowButtonActualizar): ?>
                                    <button type="button" class="btn btn-warning" wire:click="store()">
                                        <i class="fa-solid fa-pen-to-square"></i>Actualizar
                                    </button>
                                <?php endif; ?>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Agregar nuevo Permiso -->
            <!-- =========================== -->
            <div wire:ignore.self class="modal fade" id="ModalAddPermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Permiso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                <label for="">Nombre del Permiso</label>
                                <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" wire:model="nombre_permiso">
                                <?php $__errorArgs = ['nombre_permiso'];
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

                            <div class="pt-3">
                                <button type="button" class="btn btn-success"  data-dismiss="modal" wire:click="storePermiso()">
                                    <i class="fa-solid fa-pen-to-square"></i>Guardar
                                </button>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Eliminar Permiso -->
            <!-- ====================== -->
            <div wire:ignore.self class="modal fade" id="ModalDeletePermiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Permiso del Módulo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                Está seguro de que quiere eliminar el permiso del módulo: <b><?php echo e($nombre_permiso); ?></b>?
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroyPermiso(<?php echo e($idpermisoaeliminar); ?>)">
                                    <i class="fa-solid fa-pen-to-square"></i>Eliminar
                                </button>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Eliminar Módulo -->
            <!-- ====================== -->
            <div wire:ignore.self class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document" style="max-width: 80%;">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Módulo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                Está seguro de que quiere eliminar el rol: <b><?php echo e($name); ?></b>?
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy(<?php echo e($modulo_id); ?>)">
                                    <i class="fa-solid fa-pen-to-square"></i>Eliminar
                                </button>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/modulos/modulo-component.blade.php ENDPATH**/ ?>