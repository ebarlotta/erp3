<?php foreach ((['rowIndex']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<div <?php echo e($attributeBag); ?>><?php echo e($rowIndex+1); ?></div>
<?php /**PATH /home/casa-pc/Proyectos/erp3/vendor/rappasoft/laravel-livewire-tables/resources/views/includes/columns/increment.blade.php ENDPATH**/ ?>