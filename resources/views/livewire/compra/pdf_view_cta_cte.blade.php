<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resúmen de Movimientos Cuenta Corriente - {{ $operacion }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    {{-- <link rel="icon" type="image/x-icon" href="images/BarBer.png"> --}}

    {{-- <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg'/>"> --}}

</head>

<body style="font-family: Arial, Helvetica, sans-serif">
    <div class="text-center mb-2"><label>Resúmen de Movimientos Cuenta Corriente - {{ $operacion }}</label></div>
    <div class="text-center mb-2">
        <label style="font-size: 9px;">Fecha de Consulta: {{ date("d-m-Y")}}</label>
    </div>
    <table class="container col-10" style="font-size: 9px">

        {!! $html !!}

    </table>

</body>

</html>
