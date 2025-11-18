@extends('layouts.app') {{-- opcional, si usas layout --}}

@section('content')
<div class="container" style="padding: 4rem 0;">
    <div class="text-center">
        <h1 style="color: green;">¡Gracias por tu mensaje!</h1>
        <p>Hemos recibido tu contacto y nos pondremos en contacto contigo pronto.</p>
        <a href="{{ url('/') }}">Volver al inicio</a>
    </div>
</div>
@endsection

<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Gracias!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f8ff;
        }
        .message {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h1 {
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="message">
        <h1>¡Gracias por tu mensaje!</h1>
        <p>Hemos recibido tu contacto y nos pondremos en contacto contigo pronto.</p>
        <a href="index.html" style="color: #007bff; text-decoration: none;">Volver al inicio</a>
    </div>
</body>
</html> -->
