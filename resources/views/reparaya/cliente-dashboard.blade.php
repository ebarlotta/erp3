<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Mis Solicitudes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Referencia a la hoja de estilos externa -->
    <link rel="stylesheet" href="css/reparaya.css">
</head>
<body class="bg-gray-100 min-h-screen">

 


<!-- Header -->
<header class="bg-client text-white px-4 py-3 flex items-center justify-between sticky top-0 z-10">
    <h1 class="font-bold text-lg">ReparaYa</h1>
    <div class="flex items-center gap-3">
        <span class="text-sm hidden sm:inline">Hola, Juan</span>
        <div class="w-8 h-8 bg-client-accent text-gray-800 rounded-full flex items-center justify-center text-sm font-bold">J</div>
    </div>
</header>

<main class="p-4 max-w-3xl mx-auto space-y-4">

    <!-- Botón nueva -->
    <a href="{{ route('cliente-nueva-solicitud') }}" class="block w-full bg-client text-white text-center py-3 rounded-xl font-medium transition">
        + Nueva solicitud
    </a>

    <!-- Resumen rápido -->
    <div class="grid grid-cols-3 gap-3">
        <div class="bg-white rounded-xl p-3 text-center shadow-sm">
            <p class="text-2xl font-bold text-client">3</p>
            <p class="text-xs text-gray-500">Abiertas</p>
        </div>
        <div class="bg-white rounded-xl p-3 text-center shadow-sm">
            <p class="text-2xl font-bold text-client-accent">2</p>
            <p class="text-xs text-gray-500">Presupuestos</p>
        </div>
        <div class="bg-white rounded-xl p-3 text-center shadow-sm">
            <p class="text-2xl font-bold text-green-600">1</p>
            <p class="text-xs text-gray-500">Finalizadas</p>
        </div>
    </div>

    <h2 class="font-semibold text-gray-700 mt-2">Mis solicitudes</h2>

    <div class="space-y-3">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl p-4 shadow-sm border-l-4 border-client">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-semibold text-gray-800">Pérdida en cocina</h3>
                    <p class="text-sm text-gray-500">Plomería · 15/10/2026</p>
                </div>
                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full font-medium">2 presupuestos</span>
            </div>
            <p class="text-sm text-gray-600 mt-2 line-clamp-2">Se pierde agua debajo de la pileta hace 3 días...</p>
            <a href="{{ route('cliente-ver-presupuestos') }}" class="border border-red-200 p-2 rounded-md mt-3 inline-block text-sm text-client font-medium bg-yellow-100">Ver presupuestos →</a>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl p-4 shadow-sm border-l-4 border-client">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-semibold text-gray-800">Cambio de luminaria</h3>
                    <p class="text-sm text-gray-500">Electricidad · 12/10/2026</p>
                </div>
                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full font-medium">Sin respuestas</span>
            </div>
            <p class="text-sm text-gray-600 mt-2 line-clamp-2">Necesito cambiar 3 lámparas de techo...</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl p-4 shadow-sm border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-semibold text-gray-800">Pintura living</h3>
                    <p class="text-sm text-gray-500">Pintura · 05/10/2026</p>
                </div>
                <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full font-medium">Aceptado</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">Presupuesto aceptado: $85.000</p>
        </div>
    </div>

    <a href="{{ route('reparador-panel') }}" class="block w-full bg-repair text-white text-center py-3 rounded-xl font-medium transition">
        Menú Reparador
    </a>
</main>