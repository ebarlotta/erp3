<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    


    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="js/jquery.mask.js"></script>

</head>
<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>



<?php $__env->startSection('content'); ?>
    <div class="bg-gray-100 h-full">
        <!-- Page Content -->
        <main>
            
        </main>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->yieldPushContent('modals'); ?>

</body>
</html>
<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/layouts/adminlte1.blade.php ENDPATH**/ ?>