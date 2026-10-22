<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Mis Solicitudes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Referencia a la hoja de estilos externa -->
    <link rel="stylesheet" href="../css/reparaya.css">
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
    <a href="{{ route('reparaya.solicitudes.create') }}" class="block w-full bg-client text-white text-center py-3 rounded-xl font-medium transition">
        + Nueva solicitud
    </a>

    <!-- Resumen rápido -->
    <div class="grid grid-cols-3 gap-3">
        <div class="bg-white rounded-xl p-3 text-center shadow-sm">
            <p class="text-2xl font-bold text-client">{{ $resumen['abiertas'] }}</p>
            <p class="text-xs text-gray-500">Abiertas</p>
        </div>
        <div class="bg-white rounded-xl p-3 text-center shadow-sm">
            <p class="text-2xl font-bold text-client-accent">{{ $resumen['con_presupuestos'] }}</p>
            <p class="text-xs text-gray-500">Presupuestos</p>
        </div>
        <div class="bg-white rounded-xl p-3 text-center shadow-sm">
            <p class="text-2xl font-bold text-green-600">{{ $resumen['finalizadas'] }}</p>
            <p class="text-xs text-gray-500">Finalizadas</p>
        </div>
    </div>

    <h2 class="font-semibold text-gray-700 mt-2">Mis solicitudes</h2>

    <div class="space-y-3">
        @forelse ($solicitudes as $solicitud)
            <div class="bg-white rounded-xl p-4 shadow-sm border-l-4 border-client">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $solicitud->titulo }}</h3>
                        <p class="text-sm text-gray-500">
                            {{ $solicitud->categoria->nombrecategoria }} · {{ $solicitud->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">
                        {{ $solicitud->presupuestos_count ?? $solicitud->presupuestos()->count() }} presupuestos
                    </span>
                </div>
                <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ $solicitud->descripcion }}</p>
                <a href="{{ route('reparaya.solicitudes.show', $solicitud) }}" class="mt-3 inline-block text-sm text-client font-medium">
                    Ver presupuestos →
                </a>
            </div>
        @empty
            <p class="text-center text-gray-500 py-6">Todavía no tenés solicitudes.</p>
        @endforelse
    </div>

    <a href="{{ route('reparaya.reparador.dashboard')}} " class="block w-full bg-repair text-white text-center py-3 rounded-xl font-medium transition">
        Menú Reparador
    </a>
</main>