<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa</title>
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    @stack('css')
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Referencia a la hoja de estilos externa -->
    <link rel="stylesheet" href="/css/reparaya.css">


    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-client text-white px-4 py-3 flex items-center justify-between sticky top-0 z-10">
    <h1 class="font-bold text-lg">ReparaYa</h1>
        <div class="flex items-center gap-3">
            <span class="text-sm hidden sm:inline">Hola, Juan del Layout</span>
            <div class="w-8 h-8 bg-client-accent text-gray-800 rounded-full flex items-center justify-center text-sm font-bold">J</div>
        </div>
    </header>
    @yield('content')
    @livewireScripts
</body>
</html>