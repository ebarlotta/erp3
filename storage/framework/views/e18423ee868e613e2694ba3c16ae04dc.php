<!DOCTYPE html>
<html>
<head>
    <title>Pago con MercadoPago</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <div id="checkout"></div>
    
    <script>
        const mp = new MercadoPago('<?php echo e(config("services.mercadopago.public_key")); ?>', {
            locale: 'es-AR'
        });
        
        mp.checkout({
            preference: {
                id: '<?php echo e($preferenceId); ?>'
            },
            render: {
                container: '#checkout',
                label: 'Pagar'
            }
        });
    </script>
</body>
</html><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/registro/payment.blade.php ENDPATH**/ ?>