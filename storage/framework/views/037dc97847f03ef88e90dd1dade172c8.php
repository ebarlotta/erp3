<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Consulta AFIP FECAEA</h1>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('afip.consulta-afip');

$__html = app('livewire')->mount($__name, $__params, 'lw-166693480-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/afip/afip.blade.php ENDPATH**/ ?>