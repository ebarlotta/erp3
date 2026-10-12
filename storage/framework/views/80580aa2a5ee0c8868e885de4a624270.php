<div>
    <div class="grey-bg container-fluid">
        <section id="stats-subtitle">
        <?php if(session("mensaje")): ?>
            <div class="bg-green round-md alert alert-success">
                <?php echo e(session('mensaje')); ?>

            </div>
        <?php endif; ?>
            <!-- PRINCIPAL -->
            <!-- ========= -->
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-3">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="media-body">
                                        <div class="flex d-flex flex-wrap justify-content-beetwen">
                                            <div class="d-flex flex-wrap col-12 justify-content-center col-md-6">
                                                <select wire:model="empresaSeleccionada" class="form-control col-12 col-md-5 mt-1" wire:change="SeleccionarEmpresa()">
                                                    <option value="">Seleccionar Empresa</option>
                                                    <?php if($empresas): ?>
                                                        <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($empresa->id); ?>"><?php echo e($empresa->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <button type="button" class="mb-1 ml-1 mt-1 md:mt-1 md-mb-1 btn btn-info col-12 col-md-6" wire:click="showNew()" data-toggle="modal" data-target="#ModalNuevoRol">
                                                    Nuevo Rol
                                                </button>
                                            </div>
                                            <div class="col-12 col-md-5 md:mt-1">
                                                <input wire:model="buscar" type="text" class="form-control rounded-md col-12 md:col-6 mb-1" placeholder="Buscar" wire:keyup="Filtrar()">
                                            </div>
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <table class="table table-hover text-nowrap table-rounded">
                                            <tr>
                                                <td style="background-color: rgb(164, 157, 157);"><b>Listado de Roles</b></td>
                                                <td style="background-color: rgb(164, 157, 157);"><b>Opciones</b></td>
                                            </tr>
                                            <?php if($roles): ?>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($rol->name); ?></td>
                                                    <td>
                                                        
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit" wire:click="showEdit(<?php echo e($rol->id); ?>)" >
                                                            Editar
                                                        </button>
                                                        <button type="button" wire:click="showDelete(<?php echo e($rol->id); ?>)" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete">
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

            <!-- Modal Alta/Modificación Rol -->
            <!-- ================================== -->
            
            <div wire:ignore.self class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Alta/Modificación Roles</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <?php if(session("mensajeFaltaRol")): ?>
                                <div class="bg-yellow round-md alert alert-warning">
                                    <?php echo e(session('mensajeFaltaRol')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(session("mensajePermisoRepetido")): ?>
                                <div class="bg-yellow round-md alert alert-warning">
                                    <?php echo e(session('mensajePermisoRepetido')); ?>

                                </div>
                            <?php endif; ?>
                            <div>
                                <label for="">Nombre del Rol</label>
                                <?php if($name): ?>
                                    <input type="text" class="form-control" wire:model="nameRol">
                                <?php else: ?>
                                    <div class="flex">
                                        <input type="text" class="form-control col-8" wire:model="name">
                                        <input type="button" class="form-control btn-info col-4" value="Agregar" data-toggle="modal" data-target="#ModalConfirmaNuevoRol">
                                    </div>
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

                            <div>
                                <label for="">Módulos del sistema</label>
                                <div>
                                    <?php if($moduloshabilitados): ?>
                                        <?php $__currentLoopData = $moduloshabilitados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($modulo_seleccionado == $modulo->id): ?>
                                                <button type="button" class="btn btn-success" wire:click="SeleccionarModulo(<?php echo e($modulo->id); ?>,'<?php echo e($modulo->pagina); ?>')">
                                                    <i class="fa-solid fa-pen-to-square"></i><?php echo e($modulo->name); ?>

                                                </button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-outline-success mb-1" wire:click="SeleccionarModulo(<?php echo e($modulo->id); ?>,'<?php echo e($modulo->pagina); ?>')">
                                                    <i class="fa-solid fa-pen-to-square"></i><?php echo e($modulo->name); ?>

                                                </button>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="">Permisos Disponibles</label>
                                <div>
                                    <?php if(!is_null($permisosNoActivadoshabilitados)): ?>
                                        <?php $__currentLoopData = $permisosNoActivadoshabilitados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                                <button type="button" class="btn btn-outline-primary bg-blue-400 mb-1" style="color: white;">
                                                    <?php echo e($permiso->name); ?>

                                                    <span style="color: white; margin-left: 10px; background-color: rgb(64, 185, 9); border-radius: 3px; width: 20px; display: inline-block;vertical-align: middle;" aria-hidden="true"  title="Agregar Permiso" wire:click="AgregarPermiso(<?php echo e($permiso->permission_id); ?>)">&plus;</span>
                                                </button>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                            Ningún permiso disponible
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="">Permisos Habilitados</label>
                                <div>
                                    <?php if(($permisoshabilitados)): ?>
                                        <?php $__currentLoopData = $permisoshabilitados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permisohabilitado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <button type="button" class="btn btn-success mb-1 ml-1">
                                                <?php echo e($permisohabilitado->name); ?>

                                                <span style="margin-left: 10px; background-color: rgb(181, 26, 26); border-radius: 3px; width: 20px; display: inline-block;vertical-align: middle;" aria-hidden="true"  title="Eliminar Permiso" wire:click="EliminarPermiso(<?php echo e($permisohabilitado->permission_id); ?>,<?php echo e($permisohabilitado->role_id); ?>)">&times;</span>
                                            </button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        Ningún permiso habilitado
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="pt-3">
                                
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Modal Eliminar Rol -->
            <!-- ====================== -->
            <div wire:ignore.self class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Rol</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                Está seguro de que quiere eliminar el rol: <b><?php echo e($name); ?></b>?
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy(<?php echo e($rol_id); ?>)">
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


            <!-- Modal Nuevo Rol -->
            <!-- ======================== -->

            <div wire:ignore.self class="modal fade" id="ModalNuevoRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Coloque el Nombre del Nuevo Rol</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                <input type="text" class="form-control" wire:model="name">
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-success" data-dismiss="modal" wire:click="store()" data-toggle="modal" data-target="#ModalConfirmaNuevoRol">
                                    <i class="fa-solid fa-pen-to-square"></i>Agregar
                                </button>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Confirma Nuevo Rol -->
            <!-- ======================== -->

            <div wire:ignore.self class="modal fade" id="ModalConfirmaNuevoRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirma Crear Nuevo Rol</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                <input type="text" value="<?php echo e($name); ?>" >
                                Está seguro de agregar nuevo Rol: <b><?php echo e($name); ?></b>?
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-success" data-dismiss="modal" wire:click="store()">
                                    <i class="fa-solid fa-pen-to-square"></i>Agregar
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
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/roles/roles-component.blade.php ENDPATH**/ ?>