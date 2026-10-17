<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-3xl text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:w-1/2"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <div
                                style="width: 100%;background-color: bisque;border-radius: 20px;height: 5rem;justify-content: center;display: flex; margin: 4px;	align-items: center; text-align: center; padding-top:1px; font-size: 2rem;">
                                <?php echo e($empresaseleccionada->name); ?>

                            </div>
                            
                            <div style="display: grid; flex-wrap: wrap; justify-content: center;">
                                <?php $__currentLoopData = $usuarioSeleccionado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div style="width: max-content; background-color: rgb(160, 233, 100);border-radius: 20px;height: 5rem;justify-content: center;display: block; margin: 4px; align-items: center; text-align: center; padding-top:1px; padding-left:2rem; padding-right:2rem;">
                                        Usuario:<b><?php echo e($usx['name']); ?></b> <br>
                                        E-Mail:<b><?php echo e($usx['email']); ?></b>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <select class="form-control col-12" wire:model="id_NuevoRol" >
                                    <option value="0" selected>--- Seleccione un rol ---</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($id_rolActual==$rol->id): ?>
                                            <option value="<?php echo e($rol->id); ?>" selected><?php echo e($rol->name); ?></option>
                                        <?php else: ?>
                                            
                                            <option value="<?php echo e($rol->id); ?>"><?php echo e($rol->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="button" class="form-control btn-info" value="Actualizar Rol" wire:click="ActualizarRol()">
                            </div>
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
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="CerrarModalRoles()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Cerrar
                                </button>
                            </span>
                        </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/empresa-usuarios/adminempresausuarios-roles.blade.php ENDPATH**/ ?>