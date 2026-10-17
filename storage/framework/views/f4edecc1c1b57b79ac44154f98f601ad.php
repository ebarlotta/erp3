<div>
    
    <div style="background-color: rgb(160, 178, 212); padding-top:20px;padding-bottom:20px;">
        
    
        <div class="d-flex justify-center">
            <div class="bg-green-300 rounded col-3 text-center">I</div>
            <div class="col-1"></div>
            <div class="bg-red-300 rounded col-3 text-center">E</div>
            <div class="col-1"></div>
            <div class="bg-yellow-300 rounded col-3 text-center">P</div>
        </div>
        <div class="justify-center" style="display: block;text-align: center;">
            <input class="fs-12 col-6 rounded py-2 my-3" type="text" value="Monto" style="text-align: center;" wire:model="monto_simple">
            <input class="fs-10 col-6 rounded py-2 my-3" type="date" value="Fecha" style="text-align: center;">
    
            <?php $__errorArgs = ['monto_simple'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span>Faltan Datos</span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    
                <input class="fs-10 col-6 rounded py-2 my-3" type="date" value="Fecha" style="text-align: center;">
                
            <!-- Cliente -->
            <select class="bg-blue col-11 rounded h-8 my-3" wire:model="cliente_simple" style="background-color: blue; color:white;text-align: center;">
                <option value="">Cliente</option>
                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cliente->id); ?>"><?php echo e($cliente->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <!-- Area -->
            <select class="bg-green col-11 rounded h-8 my-3"  wire:model="area_simple" style="background-color: green; color:white;text-align: center;">
                <option value="">Área</option>
                <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <!-- Cuenta  -->
            <select class="bg-yellow col-11 rounded h-8 my-3"  wire:model="cuenta_simple" style="background-color: yellow; color:white;text-align: center;">
                <option value="">Cuenta</option>
                <?php $__currentLoopData = $cuentas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuenta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cuenta->id); ?>"><?php echo e($cuenta->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div style="text-align: center;">
            <label class="green col-12" style="color: green; font-size: 18px;"><b>Ingresos</b></label>
            
            <a class="text-xs font-bold uppercase px-5 py-1 shadow-lg rounded block leading-normal text-white bg-pink-600" wire:click="GuardarCompraSimple()">
    
                <button wire:click="GuardarCompraSimple()">Guardar</button>
                <input class="white bg-green-500 col-6 rounded" type="button" value="Guardar" style="color: white; font-size: 20px;">
            </a>
        </div>
    </div>
    </div><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/compra/comprasimple.blade.php ENDPATH**/ ?>