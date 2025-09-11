<!DOCTYPE html>
<html>
<head>
    <title>Pago con MercadoPago</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <div id="checkout"></div>
    
    <script>
        const mp = new MercadoPago('{{ config("services.mercadopago.public_key") }}', {
            locale: 'es-AR'
        });
        
        mp.checkout({
            preference: {
                id: '{{ $preferenceId }}'
            },
            render: {
                container: '#checkout',
                label: 'Pagar'
            }
        });
    </script>
</body>
</html>