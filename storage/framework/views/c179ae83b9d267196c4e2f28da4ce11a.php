<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['momento','cerrado','titulo']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['momento','cerrado','titulo']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<div>
    <div class="card direct-chat direct-chat-primary">
        <div class="card-header ui-sortable-handle flex" style="cursor: move; justify-content: space-between;">
            <h3 class="card-title ml-3" style="justify-content: right;width: 30%;"><b><?php echo e($titulo); ?></b>
            <?php
                if($cerrado=='Cerrado') { echo '<br><input type="text" style="text-align: center; background-color: lightgreen; border-radius: 5px; padding: 0px 5px 0px 5px; margin-left: 7px; width: 50%; max-width: 100px; min-width: 80px; height: 22px;" value="Cerrado" disabled>'; }
            ?>
            <?php
                if($cerrado=='Abierto') { echo '<br><input type="text" style="text-align: center; background-color: lightcoral; border-radius: 5px; padding: 0px 5px 0px 5px; margin-left: 7px; width: 50%; max-width: 100px; min-width: 80px; height: 22px;" value="Abierto" disabled>'; }
            ?>
            </h3>
            <div style="justify-content: right;width: 55%;display: flex;flex-wrap: wrap-reverse;">
                <?php if($cerrado=='Abierto'): ?>
                    
                    <input type="button" class="btn ml-4 hover:scale-105 h-5" value="+ Agregar" style="margin: 6px 30px;padding: 0px 20px;background-color: lightblue;box-shadow: 3px 3px 3px grey;" wire:click="PreguntarSiAgregar('<?php echo e($momento); ?>')" title="Cerrar el servicio seleccionado">
                    
                    <input type="button" class="btn ml-4 hover:scale-105 h-5" value="Cerrar Servicio" style="margin: 6px 30px;padding: 0px 20px;background-color: beige;box-shadow: 3px 3px 3px grey;" wire:click="PreguntarSiCerrar('<?php echo e($momento); ?>')" title="Cerrar el servicio seleccionado">
                <?php endif; ?>
            </div>
            <div class="card-tools" style="margin-top: 18px; width: 5%;">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" style="border: 1px black solid">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
            <div class="card sm:col-11 shadow-md rounded-l-md transform transition duration-500 hover:scale-105 mx-2"
                style="margin: 10px 10px; box-shadow: 10px 5px 5px gray; height: max-content; border: lightgray; border-style: ridge; border-width: thin;">
                <div class="card-body" style="height: 100%; padding: 0.25rem;">
                    <table class="table table-striped">
                        <tr>
                            <td><b>Usuarios</b></td>
                            <td><b>Plan</b></td>
                            <td><b>Menú</b></td>
                            <td><b>Momento</b></td>
                            <td><b>Está ?</b></td>
                        </tr>
                        <?php

                           switch ($momento) {
                            case '1': $regs = $this->registros_desayuno; $cerrado=$this->cerradoDesayuno; break;
                            case '2': $regs = $this->registros_almuerzo; $cerrado=$this->cerradoAlmuerzo; break;
                            case '3': $regs = $this->registros_merienda; $cerrado=$this->cerradoMerienda; break;
                            case '4': $regs = $this->registros_cena; $cerrado=$this->cerradoCena; break;
                        }
                        ?>

                        <?php $__currentLoopData = $regs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr wire:click="CambiarCondicionMenu('<?php echo e($momento.'-'.$registro['indice'].'-'.$registro['actor_id'].'-'.$registro['menu_id']); ?>')">
                                

                                <td><?php echo e($registro['nombreactor']); ?></td>
                                <td><?php echo e($registro['nombreplan']); ?></td>
                                <td><?php echo e($registro['nombremenu']); ?></td>
                                <td><?php echo e($registro['descripcion']); ?></td>
                                
                                <td>
                                    <input style="width: 20px;height: 20px;" type="checkbox"
                                        <?php if($registro['presente']): ?> checked <?php endif; ?>
                                        <?php if($cerrado=='Cerrado'): ?> disabled <?php endif; ?>
                                    >
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <div wire:ignore>
                            <?php $extras = $this->menuextra[$momento]; ?>
                            <?php $__currentLoopData = $extras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ext): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr wire:click="CambiarCondicionMenu('<?php echo e($momento.'-'.$ext['presente'].'-'.$ext['actor_id'].'-'.$ext['menu_id']); ?>')">
                                    <td><?php echo e($ext['nombreactor']); ?></td>
                                    <td>-<?php echo e($ext['nombreplan']); ?></td>
                                    <td><?php echo e($ext['nombremenu']); ?></td>
                                    <td><?php echo e($ext['descripcion']); ?></td>
                                    <td>
                                        <input style="width: 20px;height: 20px;" type="checkbox"
                                            <?php if(!$ext['presente']): ?> checked <?php endif; ?>
                                            <?php if($cerrado=='Cerrado'): ?> disabled <?php endif; ?>
                                        >
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/components/expedirMomento.blade.php ENDPATH**/ ?>