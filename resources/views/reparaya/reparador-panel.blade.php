<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Panel Reparador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <header class="bg-emerald-600 text-white px-4 py-3 flex items-center justify-between sticky top-0 z-10">
        <h1 class="font-bold text-lg">ReparaYa · Reparador</h1>
        <div class="w-8 h-8 bg-emerald-400 rounded-full flex items-center justify-center text-sm font-bold">R</div>
    </header>

    <main class="p-4 max-w-3xl mx-auto space-y-4">

        <!-- Filtros -->
        <div class="bg-white rounded-xl p-3 shadow-sm flex gap-2 overflow-x-auto">
            <button class="px-3 py-1 bg-emerald-600 text-white rounded-full text-sm whitespace-nowrap">Todas</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm whitespace-nowrap">Plomería</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm whitespace-nowrap">Electricidad</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm whitespace-nowrap">Pintura</button>
        </div>

        <!-- Solicitudes disponibles -->
        <h2 class="font-semibold text-gray-700">Solicitudes disponibles</h2>

        <div class="space-y-3">
            <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-gray-800">Pérdida en cocina</h3>
                        <p class="text-sm text-gray-500">Plomería · Belgrano, CABA</p>
                    </div>
                    <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded-full font-medium">Urgente</span>
                </div>
                <p class="text-sm text-gray-600 mt-2">Se pierde agua debajo de la pileta hace 3 días. Necesito solución pronto.</p>
                <div class="flex flex-col sm:flex-row gap-2 mt-3">
                    <button onclick="document.getElementById('modal-presupuesto').classList.remove('hidden')" class="flex-1 bg-emerald-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-emerald-700">Enviar presupuesto</button>
                    <button class="flex-1 border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver detalle</button>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-gray-800">Cambio de luminaria</h3>
                        <p class="text-sm text-gray-500">Electricidad · Palermo, CABA</p>
                    </div>
                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full font-medium">Normal</span>
                </div>
                <p class="text-sm text-gray-600 mt-2">Necesito cambiar 3 lámparas de techo en living y dormitorio.</p>
                <div class="flex flex-col sm:flex-row gap-2 mt-3">
                    <button onclick="document.getElementById('modal-presupuesto').classList.remove('hidden')" class="flex-1 bg-emerald-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-emerald-700">Enviar presupuesto</button>
                    <button class="flex-1 border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver detalle</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal presupuesto -->
    <div id="modal-presupuesto" class="hidden fixed inset-0 bg-black/50 flex items-end sm:items-center justify-center p-0 sm:p-4 z-50">
        <div class="bg-white w-full sm:max-w-md rounded-t-2xl sm:rounded-2xl p-5 space-y-4">
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-lg">Enviar presupuesto</h3>
                <button onclick="document.getElementById('modal-presupuesto').classList.add('hidden')" class="text-gray-400 text-xl">✕</button>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Monto *</label>
                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:outline-none" placeholder="$ 0">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Plazo estimado</label>
                <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <option>1 día</option>
                    <option>2-3 días</option>
                    <option>1 semana</option>
                    <option>Más de 1 semana</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Comentario</label>
                <textarea rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:outline-none" placeholder="Detalles del presupuesto..."></textarea>
            </div>

            <button class="w-full bg-emerald-600 text-white py-2 rounded-lg font-medium hover:bg-emerald-700">Enviar presupuesto</button>
        </div>
    </div>

</body>
</html>
