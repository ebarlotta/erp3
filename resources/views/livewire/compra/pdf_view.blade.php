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
    @if ($operacion == 'deuda') <div class="text-center mb-2"><label>Resúmen de Deudas</label></div>
    @else <div class="text-center mb-2"><label>Resúmen de Créditos</label></div>
    @endif
    <div class="text-center mb-2"><label style="font-size: 9px;">Fecha de Consulta: {{ date("d-m-Y")}}</label><br></div>
    <br>
    <table border="1" style="font-size: 11px" cellpadding="8" cellspacing="0" style="border-collapse: collapse; font-family: sans-serif;">
    {{-- <table class="container col-10" style="font-size: 11px"> --}}
        <tr class="bg-secondary text-white fw-bold border">
            <td class="border" style="text-align: left"><b>Nombre</b></td>
            @if ($operacion == 'deuda') {
                <td class="border text-center"><b>Deuda</b></td> }
            @else {
                <td class="border text-center"><b>Crédito</b></td> }
            @endif
        </tr>

        {!! $html !!}
     
        <tr class="bg-secondary">
            <td class="colspan-2 text-left border pl-3 text-white fw-bold">Total {{ $operacion }} a Vendedores</td>
            <td class="border text-end text-white fw-bold">
                Total {{ number_format($saldototal, 2, ',', '.') }}
            </td>
        </tr>
    </table>
</body>
</html>
