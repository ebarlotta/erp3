<?php $__env->startSection('content'); ?>
   <h2>Sesión expirada</h2>
   <p>Por seguridad tu sesión caducó.</p>
   <a class="btn btn-info" href="<?php echo e(url()->previous()); ?>">Volver e intentar de nuevo</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/errors/419.blade.php ENDPATH**/ ?>