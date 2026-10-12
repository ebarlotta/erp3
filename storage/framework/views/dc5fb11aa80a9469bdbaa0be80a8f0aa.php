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
    <?php if($operacion == 'deuda'): ?> <div class="text-center mb-2"><label>Resúmen de Deudas</label></div>
    <?php else: ?> <div class="text-center mb-2"><label>Resúmen de Créditos</label></div>
    <?php endif; ?>
    <div class="text-center mb-2"><label style="font-size: 9px;">Fecha de Consulta: <?php echo e(date("d-m-Y")); ?></label><br></div>
    <br>
    <table border="1" style="font-size: 11px" cellpadding="8" cellspacing="0" style="border-collapse: collapse; font-family: sans-serif;">
    
        <tr class="bg-secondary text-white fw-bold border">
            <td class="border" style="text-align: left"><b>Nombre</b></td>
            <?php if($operacion == 'deuda'): ?> {
                <td class="border text-center"><b>Deuda</b></td> }
            <?php else: ?> {
                <td class="border text-center"><b>Crédito</b></td> }
            <?php endif; ?>
        </tr>

        <?php echo $html; ?>

     
        <tr class="bg-secondary">
            <td class="colspan-2 text-left border pl-3 text-white fw-bold">Total <?php echo e($operacion); ?> a Vendedores</td>
            <td class="border text-end text-white fw-bold">
                Total <?php echo e(number_format($saldototal, 2, ',', '.')); ?>

            </td>
        </tr>
    </table>
</body>
</html>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/compra/pdf_view.blade.php ENDPATH**/ ?>