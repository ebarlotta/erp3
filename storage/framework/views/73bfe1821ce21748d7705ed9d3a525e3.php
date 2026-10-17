<! DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    

    <title><?php echo e(config('app.name', session('nombre_empresa'))); ?></title>
    

    <!-- Tailwind -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <!-- Tooltips -->
    <link rel="stylesheet" href="<?php echo e(asset('css/tooltips.css')); ?>">

    <script src="cart/js/taildwind.js"></script>
    <!-- Scripts -->
    <script src="js/jquery.mask.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
    

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <!-- Scripts -->
    
</head>
<body class="font-sans antialiased">

    

    <div class="bg-gray-100 h-full">
        

        <!-- Page Heading min-h-screen -->
        

        <!-- Page Content -->
        

        <?php $__env->startSection('content'); ?>
            <main>
                <p>Welcome to this beautiful admin panel.</p>
                </main>

                <?php echo e($slot ?? 'ddd'); ?>

        
        <?php $__env->stopSection(); ?>
    </div>

    <?php echo $__env->yieldPushContent('modals'); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>

</html>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/layouts/app2.blade.php ENDPATH**/ ?>