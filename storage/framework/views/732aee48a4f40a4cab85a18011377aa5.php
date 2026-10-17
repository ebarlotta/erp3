<div>
    <div class="d-flex" style="justify-content: center;">
        <h5 class="col-12 text-center">Categorías</h5><br>
        <div class="flex d-flex flex-wrap" style="justify-content: center;">
            
        </div>
    </div>

    <div class="flex d-flex flex-wrap" style="justify-content: center;">
        <div class="flex- d-flex">
            <div class="flex d-flex">
                <label for="" class="w-full justify-center">Nombre de la Categoría</label>
                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required wire:model="menu_nombre_categoria" />
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" wire:click="AgregarCategoria();">Agregar</button>
            </div>
        </div>
        <div style="border-radius: 20px;box-shadow: 5px 5px 20px 5px #000; padding: 10px; margin: 10px;  max-width: 90%; width: 100%;">
            <div style="justify-content: center;display: flex;">
                <table class="table table-striped table-bordered w-full px-3">
                    <tr style=" width:100%">
                        <td><b>Nombre Categoría</b></td>
                        <td><b>Opciones</b></td>
                    </tr>
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="border: 2px solid gray; width:100%; margin: 3px; display: revert;">
                            <td style="background-color: white; border-radius: 10px; padding: 6px; margin: 9px; display: block;" ><?php echo e($categoria->menu_nombre_categoria); ?></td>
                            <td style="background-color: aliceblue; width:30%">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-1 px-4 rounded-full" wire:click="AgregarCategoria();">Modificar</button>
                                <?php if($categoria->menu_habilitada): ?>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold my-1 px-4 rounded-full" wire:click="HabilitarCategoria(<?php echo e($categoria->id); ?>);">Desabilitar</button>
                                <?php else: ?>
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold my-1 px-4 rounded-full" wire:click="HabilitarCategoria(<?php echo e($categoria->id); ?>);">Habilitar</button>
                                <?php endif; ?>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold my-1 px-4 rounded-full" wire:click="EliminarCategoria(<?php echo e($categoria->id); ?>);">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>                
            </div>
        </div>
    </div>
    <button class="bg-gray-500 hover:bg-gray-700 font-bold my-1 px-6 rounded-full" onclick="history.back()" style="display: block; position: fixed; bottom: 20px; right: 20px; z-index: 1;">
        Volver
    </button>
</div><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/menu/menu-categoria-component.blade.php ENDPATH**/ ?>