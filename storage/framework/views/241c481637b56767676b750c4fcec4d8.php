<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resúmen de Movimientos Cuenta Corriente - <?php echo e($operacion); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    

    

</head>

<body style="font-family: Arial, Helvetica, sans-serif">
    <div class="text-center mb-2"><label>Resúmen de Movimientos Cuenta Corriente - <?php echo e($operacion); ?></label></div>
    <div class="text-center mb-2">
        <label style="font-size: 9px;">Fecha de Consulta: <?php echo e(date("d-m-Y")); ?></label>
    </div>
    <table class="container col-10" style="font-size: 9px">

        <?php echo $html; ?>


    </table>

</body>

</html>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/compra/pdf_view_cta_cte.blade.php ENDPATH**/ ?>