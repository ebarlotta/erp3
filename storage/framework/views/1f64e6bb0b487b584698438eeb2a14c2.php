
<!DOCTYPE html>

<html lang="es">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<!-- Propio de Cart -->


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


    <title>Grocery Shoppy an Ecommerce Category Bootstrap Responsive Web Template | Home :: w3barber</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--//tags -->
    <link href="cart/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="cart/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="cart/css/font-awesome.css" rel="stylesheet">
    <!--pop-up-box-->
    <link href="cart/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!--//pop-up-box-->
    <!-- price range -->
    <link rel="stylesheet" type="text/css" href="cart/css/jquery-ui1.css">
    <!-- fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<!-- Propio de Cart -->

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    

    <!-- easy-responsive-tabs -->
    <link rel="stylesheet" type="text/css" href="cart/css/easy-responsive-tabs.css">
    <script src="cart/css/easyResponsiveTabs.js"></script>

    
    <title><?php echo e(config('app.name', session('nombre_empresa') ? session('nombre_empresa') : "BarBer")); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <!-- Scripts -->
    <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
    <script src="js/jquery.mask.js"></script>

    <script>
        $(document).ready(function() {
            //Horizontal Tab
            $('#parentHorizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>

</head>

<?php $__env->startSection('content'); ?>
    
    
        <div class="bg-gray-100 h-full">

            <!-- Page Content -->
            <main>
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
        <?php $__env->stopSection(); ?>
        <?php echo $__env->yieldPushContent('modals'); ?>

        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    </body>
    </html><?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/layouts/cart/payment.blade.php ENDPATH**/ ?>