<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['titulo']));

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

foreach (array_filter((['titulo']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
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
            <h3 class="card-title ml-3" style="justify-content: right;"><b><?php echo e($titulo); ?></b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
            <div class="card sm:col-11 shadow-md rounded-l-md mx-2"
                style="margin: 10px 10px; box-shadow: 10px 5px 5px gray; height: max-content; border: lightgray; border-style: ridge; border-width: thin;">

                <div class="card-body" style="height: 100%; padding: 0.25rem;">
                    <div style="justify-content: center; display: flex"><h1>Costos por Menú c/2 semanas</h1></div>
                    <table class="table table-striped">
                        
                        <tr>
                            <td style="font-size:18px; align:center"><b>Nombre del menú</b></td>
                            <td style="font-size:18px; align:center"><b>Tiempo de preparación necesario</b></td>
                            <td style="font-size:18px; align:center"><b>Costo por menú</b></td>
                            <td style="font-size:18px; align:center"><b>Costo total</b></td>
                        </tr>

                        <?php $__currentLoopData = $this->Resumen['costomenues1']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $costo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($costo->nombremenu); ?></td>
                                <td><?php echo e($costo->tiempototal); ?></td>
                                <td style="justify-content: right; ">$ <?php echo e(number_format($costo->costomenu,2, ',', '.')); ?></td>
                                <td style="justify-content: right; ">$ <?php echo e(number_format($costo->costototal,2, ',', '.')); ?></td>
                                
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>

                <div class="card-body" style="height: 100%; padding: 0.25rem;">
                    <div style="justify-content: center; display: flex"><h1>Costos por Menú c/2 semanas</h1></div>
                    <table class="table table-striped">
                        
                        <tr>
                            <td style="font-size:18px; align:center"><b>Nombre del menú</b></td>
                            <td style="font-size:18px; align:center"><b>Nombre ingrediente</b></td>
                            <td style="font-size:18px; align:center"><b>Cantidad de ingrediente Necesaria</b></td>
                            <td style="font-size:18px; align:center"><b>Tiempo de preparación necesario</b></td>
                            <td style="font-size:18px; align:center"><b>Costos x Menú</b></td>
                            <td style="font-size:18px; align:center"><b>Costo Total</b></td>
                        </tr>

                        <?php $__currentLoopData = $this->Resumen['costomenues']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $costo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($costo->nombremenu); ?></td>
                                <td><?php echo e($costo->name); ?></td>
                                <td><?php echo e($costo->cantidadelementos); ?> - <?php echo e($costo->unidad); ?></td>
                                <td><?php echo e($costo->tiempototal); ?></td>
                                <td style="justify-content: right;">$ <?php echo e(number_format($costo->costomenu,2, ',', '.')); ?></td>
                                <td style="justify-content: right;">$ <?php echo e(number_format($costo->costototal,2, ',', '.')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>

                <div class="card-body mt-4" style="height: 100%; padding: 0.25rem;">
                    <div style="justify-content: center; display: flex"><h1>Costos por Ingredientes c/2 semanas</h1></div>
                    <table class="table table-striped">
                        <tr>
                            <td style="font-size:18px; align:center"><b>Nombre ingrediente</b></td>
                            <td style="font-size:18px; align:center"><b>Cantidad ingredientes necesarios</b></td>
                            <td style="font-size:18px; justify-content: center; display: grid;"><b>$ Costo Total</b></td>
                            
                        </tr>

                        <?php $c = 0; ?>
                        <?php $__currentLoopData = $this->Resumen['costoingredientes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $costo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($costo->name); ?></td>
                                <td><?php echo e($costo->cantidadelementos); ?> - <?php echo e($costo->unidad); ?></td>
                                
                                <td style="justify-content: right; display: grid; padding-right: 20%;">$ <?php echo e(number_format($costo->costototal,2, ',', '.')); ?></td>
                                <?php $c = $c + $costo->costototal ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td colspan="2" style="background-color: lightgray; font-size:18px;"><b>Costo total</b></td>
                            <td style="background-color: lightgray;font-size:18px; justify-content: center; display: grid;"><b>$ <?php echo e(number_format($c,2, ',', '.')); ?></b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/components/expedir-resumen-ingredientres-component.blade.php ENDPATH**/ ?>