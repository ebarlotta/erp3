<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ReparaYa - Agenda del Reparador</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- Referencia a la hoja de estilos externa -->
	<link rel="stylesheet" href="css/reparaya.css">
</head>

<body class="bg-gray-100 min-h-screen">

    <header class="bg-repair text-white px-4 py-3 flex items-center gap-3 sticky top-0 z-10">
        <a href="cliente-ver-presupuestos.html" class="text-xl">←</a>
        <h1 class="font-bold">Agenda de Carlos Méndez</h1>
    </header>

    <main class="p-4 max-w-2xl mx-auto space-y-4 pb-8">
        <!-- Fecha -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <h2 class="font-semibold text-gray-700 mb-3">Seleccioná una fecha</h2>
            <div class="flex gap-2 overflow-x-auto pb-2">
                <button
                    class="flex flex-col items-center px-4 py-2 rounded-lg border-2 border-repair text-repair font-medium shrink-0">
                    <span class="text-xs">Lun</span>
                    <span class="text-lg">20</span>
                    <span class="text-xs">Oct</span>
                </button>
                <button
                    class="flex flex-col items-center px-4 py-2 rounded-lg border border-gray-300 text-gray-600 shrink-0">
                    <span class="text-xs">Mar</span>
                    <span class="text-lg">21</span>
                    <span class="text-xs">Oct</span>
                </button>
                <button
                    class="flex flex-col items-center px-4 py-2 rounded-lg border border-gray-300 text-gray-600 shrink-0">
                    <span class="text-xs">Mié</span>
                    <span class="text-lg">22</span>
                    <span class="text-xs">Oct</span>
                </button>
                <button
                    class="flex flex-col items-center px-4 py-2 rounded-lg border border-gray-300 text-gray-600 shrink-0">
                    <span class="text-xs">Jue</span>
                    <span class="text-lg">23</span>
                    <span class="text-xs">Oct</span>
                </button>
            </div>
        </div>

        <!-- Horarios -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <h2 class="font-semibold text-gray-700 mb-3">Horarios disponibles (20/10)</h2>
            <div class="grid grid-cols-3 gap-2">
                <button class="py-2 rounded-lg border border-gray-300 text-sm text-gray-400 line-through"
                    disabled>08:00</button>
                <button class="py-2 rounded-lg border-2 border-repair text-repair text-sm font-medium">09:00</button>
                <button class="py-2 rounded-lg border-2 border-repair text-repair text-sm font-medium">10:00</button>
                <button class="py-2 rounded-lg border border-gray-300 text-sm text-gray-400 line-through"
                    disabled>11:00</button>
                <button class="py-2 rounded-lg border-2 border-repair text-repair text-sm font-medium">14:00</button>
                <button class="py-2 rounded-lg border-2 border-repair text-repair text-sm font-medium">15:00</button>
                <button class="py-2 rounded-lg border-2 border-repair text-repair text-sm font-medium">16:00</button>
                <button class="py-2 rounded-lg border border-gray-300 text-sm text-gray-400 line-through"
                    disabled>17:00</button>
            </div>
        </div>

        <!-- CTA -->
        <button class="w-full bg-repair text-white py-3 rounded-xl font-medium hover:opacity-90 transition">
            Confirmar cita: 20/10 a las 09:00
        </button>
    </main>
</body>

</html>
