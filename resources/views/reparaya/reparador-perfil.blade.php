<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Perfil del Reparador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Referencia a la hoja de estilos externa -->
    <link rel="stylesheet" href="css/reparaya.css">
</head>
<body class="bg-gray-100 min-h-screen">

    <header class="bg-client text-white px-4 py-3 flex items-center gap-3 sticky top-0 z-10">
        <a href="{{ route('cliente-ver-presupuestos') }}" class="text-xl">←</a>
        <h1 class="font-bold">Perfil del reparador</h1>
    </header>

    <main class="p-4 max-w-2xl mx-auto space-y-4 pb-8">

        <!-- Cabecera del perfil -->
        <div class="bg-white rounded-xl shadow-sm p-5 text-center">
            <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-700 font-bold text-2xl mx-auto">CM</div>
            <h2 class="font-bold text-lg mt-3 text-gray-800">Carlos Méndez</h2>
            <p class="text-sm text-gray-500">Plomero matriculado · Belgrano, CABA</p>
            <div class="flex items-center justify-center gap-1 mt-1">
                <span class="text-yellow-500">★★★★★</span>
                <span class="text-xs text-gray-500">(48 reseñas)</span>
            </div>
            <div class="flex justify-center gap-2 mt-3 text-xs">
                <span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-full font-medium">✓ Verificado</span>
                <span class="bg-blue-100 bg-client px-2 py-1 rounded-full font-medium">12 años exp.</span>
            </div>
        </div>

        <!-- Métricas -->
        <div class="grid grid-cols-3 gap-3">
            <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                <p class="text-2xl font-bold text-emerald-600">48</p>
                <p class="text-xs text-gray-500">Trabajos</p>
            </div>
            <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                <p class="text-2xl font-bold text-emerald-600">98%</p>
                <p class="text-xs text-gray-500">Recomendación</p>
            </div>
            <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                <p class="text-2xl font-bold text-emerald-600">1h</p>
                <p class="text-xs text-gray-500">Resp. prom.</p>
            </div>
        </div>

        <!-- Sobre mí -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <h3 class="font-semibold text-gray-700 mb-2">Sobre mí</h3>
            <p class="text-sm text-gray-600">Plomero matriculado con más de 12 años de experiencia en instalaciones y reparaciones domiciliarias. Trabajo con repuestos originales y ofrezco garantía escrita en todos mis trabajos.</p>
        </div>

        <!-- Especialidades -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <h3 class="font-semibold text-gray-700 mb-2">Especialidades</h3>
            <div class="flex flex-wrap gap-2">
                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">Pérdidas de agua</span>
                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">Termotanques</span>
                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">Destapaciones</span>
                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">Grifería</span>
            </div>
        </div>

        <!-- Reseñas -->
        <div class="bg-white rounded-xl shadow-sm p-4 space-y-3">
            <h3 class="font-semibold text-gray-700">Últimas reseñas</h3>

            <div class="border-b border-gray-100 pb-3">
                <div class="flex justify-between items-start">
                    <p class="text-sm font-medium text-gray-800">María G.</p>
                    <span class="text-yellow-500 text-2xl">★★★★★</span>
                </div>
                <p class="text-xs text-gray-500">Hace 2 semanas</p>
                <p class="text-sm text-gray-600 mt-1">Rápido, prolijo y muy amable. Solucionó la pérdida en el mismo día.</p>
            </div>

            <div class="border-b border-gray-100 pb-3">
                <div class="flex justify-between items-start">
                    <p class="text-sm font-medium text-gray-800">Diego P.</p>
                    <span class="text-yellow-500 text-2xl">★★★★★</span>
                </div>
                <p class="text-xs text-gray-500">Hace 1 mes</p>
                <p class="text-sm text-gray-600 mt-1">Excelente trabajo y precio justo. Lo recomiendo.</p>
            </div>

            <div>
                <div class="flex justify-between items-start">
                    <p class="text-sm font-medium text-gray-800">Lucía R.</p>
                    <span class="text-yellow-500 text-2xl">★★★★☆</span>
                </div>
                <p class="text-xs text-gray-500">Hace 2 meses</p>
                <p class="text-sm text-gray-600 mt-1">Muy buen trabajo, aunque tardó un poco más de lo previsto.</p>
            </div>
        </div>

        <!-- CTA -->
        <a href="{{ route('cliente-ver-presupuestos') }} " class="block w-full bg-client text-white text-center py-3 rounded-xl font-medium bg-client:hover transition">
            Volver a presupuestos
        </a>
    </main>
</body>
</html>