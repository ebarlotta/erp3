<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/dist/css/adminlte.min.css')); ?>">
    
    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar principal -->
        
        
        <!-- Contenido principal -->
        <div class="content-wrapper">
            <!-- Contenido -->
            <section class="content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </section>
        </div>
        
        <!-- Footer -->
        <?php echo $__env->make('adminlte::partials.footer.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <!-- Scripts de AdminLTE -->
    <script src="<?php echo e(asset('vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('js'); ?>
</body>
</html><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/layouts/sinadminlte.blade.php ENDPATH**/ ?>