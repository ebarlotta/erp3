<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center mt-24 pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle "></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-1 sm:align-top sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            enzo
            
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="odd">
                <td> <button class="btn btn-info" id="btn_selecionar<?php echo e($prod->id); ?>" wire:click="seleccionarproducto(<?php echo e($prod->id); ?>)"> Selecionar </button></td>
                <!-- <td>P-00001</td> -->
                <!-- <td>Digital</td> -->
                <td> <img src="<?php echo e(asset('images/'. $prod->ruta)); ?>" alt="Sin imagen" style="height: 50px;width: 50px;"> </td>
                <td><?php echo e($prod->name); ?></td>
                <td><?php echo e($prod->descripcion); ?></td>
                <td class="text-right"><?php echo e(number_format($prod->existencia, 2, ',', '.')); ?></td>
                <!-- <td>9</td> -->
                <td class="text-right"><?php echo e(number_format($prod->precio_venta, 2, ',', '.')); ?></td>
                <!-- <td>2023-02-12</td> -->
                <!-- <td>hilariweb@gmail.com</td> -->
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/ventasmostrador/modal.blade.php ENDPATH**/ ?>