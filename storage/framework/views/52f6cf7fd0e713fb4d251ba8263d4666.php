<?php $__env->startSection; ?>('title', '<?php session('nombre_empresa') ? echo session('nombre_empresa') : echo "BarBer"; ?>')



<?php $__env->startSection('content'); ?>
    <p>Welcome to this beautiful admin panel.</p>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/adminlte.blade.php ENDPATH**/ ?>