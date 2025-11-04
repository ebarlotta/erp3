@extends('adminlte::page')
{{-- @import "tailwindcss"; --}}

<head>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script src="cart/js/taildwind.js"></script>
        {{-- <link href="/src/style.css" rel="stylesheet"> --}}
    @laravelPWA
</head>

@section('title', session('nombre_empresa'))
{{-- <script src="https://cdn.tailwindcss.com"></script> --}}
<script src="cart/js/taildwind.js"></script>

{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

{{-- @section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop --}}

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}
