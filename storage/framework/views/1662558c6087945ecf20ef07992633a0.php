<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="font-family: Arial, Helvetica, sans-serif">
    <table class="container col-12" style="font-size: 12px; line-height: 10px">
        <tr class="fw-bold">
            <td class=" col-4 text-left">Empresa: <?php echo e($empresa->name); ?></td>
            <td class="  col-4 text-center"><u>REGISTRO IVA COMPRAS</u></td>
            <td class="  col-4 text-end">Mes: <?php echo e($mes); ?></td>
        </tr>
        <tr class="fw-bold ">
            <td class="  col-4 text-left"><?php echo e($empresa->direccion); ?></td>
            <td class="  col-4 text-center"></td>
            <td class="  col-4 text-end">Libro Nro</td>
        </tr>
        <tr class="fw-bold ">
            <td class="  col-4 text-left">Cuit:<?php echo e($empresa->cuit); ?> - IB: <?php echo e($empresa->ib); ?></td>
            <td class="  col-4 text-center"></td>
            <td class="  col-4 text-end">Página Nro</td>
        </tr>
        <tr class="fw-bold ">
            <td class="  col-4 text-left">Nro Establecimiento: <?php echo e($empresa->establecimiento); ?></td>
            <td class="  col-4 text-center"></td>
            <td class="  col-4 text-end"><?php echo e($mes); ?> - <?php echo e($anio); ?></td>
        </tr>
        <tr class="fw-bold ">
            <td class="  col-4 text-left">Condición IVA: <?php echo e($empresa->actividad1); ?></td>
            <td class="  col-4 text-center"></td>
            <td class="  col-4 text-end"></td>
        </tr>


    </table>
    <table class="container col-12 mt-1" style="font-size: 9px; line-height: 10px">
        <tr class="bg-secondary text-white fw-bold border">
            <td class="border text-center">Fecha</td>
            <td class="border text-center">Comprobante</td>
            <td class="border text-center">Vendedor</td>
            <td class="border text-center">Cuit</td>
            <td class="border text-center">Bruto</td>
            <td class="border text-center">Iva</td>
            <td class="border text-center">Exento</td>
            <td class="border text-center">Imp.Interno</td>
            <td class="border text-center">Perc.Iva</td>
            <td class="border text-center">Ret.IB</td>
            <td class="border text-center">Ret.GAN</td>
            <td class="border text-center">Total</td>
        </tr>
        <?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
            <tr>
                <td class="border text-center mr-3 pr-3"><?php echo e(substr($registro->fecha,8,2) ."-". substr($registro->fecha,5,2) ."-". substr($registro->fecha,0,4)); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e($registro->comprobante); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e($registro->name); ?></td>
                <td class="border text-center mr-3 pr-3"><?php echo e(substr($registro->cuit,0,2) ."-" . substr($registro->cuit,2,8) . "-" . substr($registro->cuit,10,1)); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e(number_format($registro->BrutoComp, 2, ',', '.')); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e(number_format($registro->MontoIva, 2, ',', '.')); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e(number_format($registro->ExentoComp, 2, ',', '.')); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e(number_format($registro->ImpInternoComp, 2, ',', '.')); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e(number_format($registro->PercepcionIvaComp, 2, ',', '.')); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e(number_format($registro->RetencionIB, 2, ',', '.')); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e(number_format($registro->RetencionGan, 2, ',', '.')); ?></td>
                <td class="border text-end mr-3 pr-3"><?php echo e(number_format($registro->NetoComp, 2, ',', '.')); ?>

                </td>
            </tr> }
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr class="bg-secondary">
            <td class="border text-end text-white fw-bold"></td>
            <td class="border text-end text-white fw-bold"></td>
            <td class="border text-end text-white fw-bold"></td>
            <td class="border text-end text-white fw-bold">Total  a Proveedores</td>
            <td class="border text-end text-white fw-bold"><?php echo e(number_format($BrutoComp, 2, ',', '.')); ?></td>
            <td class="border text-end text-white fw-bold"><?php echo e(number_format($MontoIva, 2, ',', '.')); ?></td>
            <td class="border text-end text-white fw-bold"><?php echo e(number_format($ExentoComp, 2, ',', '.')); ?></td>
            <td class="border text-end text-white fw-bold"><?php echo e(number_format($ImpInternoComp, 2, ',', '.')); ?></td>
            <td class="border text-end text-white fw-bold"><?php echo e(number_format($PercepcionIvaComp, 2, ',', '.')); ?></td>
            <td class="border text-end text-white fw-bold"><?php echo e(number_format($RetencionIB, 2, ',', '.')); ?></td>
            <td class="border text-end text-white fw-bold"><?php echo e(number_format($RetencionGan, 2, ',', '.')); ?></td>
            <td class="border text-end text-white fw-bold"><?php echo e(number_format($NetoComp, 2, ',', '.')); ?></td>
        </tr>
    </table>

</body>

</html>
<?php /**PATH /home/enzo/Escritorio/proyectos/erp3/resources/views/livewire/compra/ejmplo2.blade.php ENDPATH**/ ?>