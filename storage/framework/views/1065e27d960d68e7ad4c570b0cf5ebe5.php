<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Detalle del Presupuesto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <header class="bg-blue-600 text-white px-4 py-3 flex items-center gap-3 sticky top-0 z-10">
        <a href="cliente-ver-presupuestos.html" class="text-xl">←</a>
        <h1 class="font-bold">Detalle del presupuesto</h1>
    </header>

    <main class="p-4 max-w-2xl mx-auto space-y-4 pb-8">

        <!-- Encabezado -->
        <div class="bg-white rounded-xl shadow-sm p-5">
            <div class="flex items-start gap-3">
                <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-700 font-bold text-lg shrink-0">CM</div>
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="font-semibold text-gray-800">Carlos Méndez</h2>
                            <p class="text-xs text-gray-500">Plomero matriculado</p>
                        </div>
                        <p class="text-xl font-bold text-green-600">$45.000</p>
                    </div>
                    <div class="flex items-center gap-1 mt-1">
                        <span class="text-yellow-500 text-sm">★★★★★</span>
                        <span class="text-xs text-gray-500">(48 reseñas)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trabajo asociado -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <h3 class="font-semibold text-gray-700 mb-2">Solicitud asociada</h3>
            <p class="text-sm font-medium text-gray-800">Pérdida en cocina</p>
            <p class="text-xs text-gray-500">Plomería · Belgrano, CABA · 15/10/2026</p>
            <a href="cliente-detalle-solicitud.html" class="text-sm text-blue-600 font-medium mt-2 inline-block">Ver solicitud →</a>
        </div>

        <!-- Desglose -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <h3 class="font-semibold text-gray-700 mb-3">Desglose del presupuesto</h3>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Mano de obra</span>
                    <span class="text-gray-800 font-medium">$30.000</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Materiales (repuesto original)</span>
                    <span class="text-gray-800 font-medium">$12.000</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Traslado</span>
                    <span class="text-gray-800 font-medium">$3.000</span>
                </div>
                <div class="flex justify-between border-t border-gray-200 pt-2 mt-2">
                    <span class="font-semibold text-gray-800">Total</span>
                    <span class="font-bold text-green-600 text-base">$45.000</span>
                </div>
            </div>
        </div>

        <!-- Condiciones -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <h3 class="font-semibold text-gray-700 mb-2">Condiciones</h3>
            <ul class="text-sm text-gray-600 space-y-1">
                <li>⏱ Plazo estimado: <strong>1 día</strong></li>
                <li>🛡 Garantía: <strong>6 meses</strong></li>
                <li>💳 Forma de pago: efectivo o transferencia</li>
                <li>📅 Disponibilidad: a partir del 18/10/2026</li>
            </ul>
        </div>

        <!-- Notas del reparador -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <h3 class="font-semibold text-gray-700 mb-2">Notas del reparador</h3>
            <p class="text-sm text-gray-600">Incluye mano de obra y materiales. El repuesto es original de la marca. Puedo coordinar visita para el jueves o viernes a la mañana.</p>
        </div>

        <!-- Acciones -->
        <div class="flex flex-col sm:flex-row gap-2">
            <a href="reparador-perfil.html" class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver perfil</a>
            <button onclick="document.getElementById('modal-aceptar').classList.remove('hidden')" class="flex-1 bg-green-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-green-700">Aceptar presupuesto</button>
        </div>
    </main>

    <!-- Modal confirmación -->
    <div id="modal-aceptar" class="hidden fixed inset-0 bg-black/50 flex items-end sm:items-center justify-center p-0 sm:p-4 z-50">
        <div class="bg-white w-full sm:max-w-md rounded-t-2xl sm:rounded-2xl p-5 space-y-4">
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-lg">Confirmar presupuesto</h3>
                <button onclick="document.getElementById('modal-aceptar').classList.add('hidden')" class="text-gray-400 text-xl">✕</button>
            </div>
            <p class="text-sm text-gray-600">Vas a aceptar el presupuesto de <strong>Carlos Méndez</strong> por <strong class="text-green-600">$45.000</strong>.</p>
            <p class="text-xs text-gray-500">Al aceptar, se notificará al reparador y se habilitará el chat para coordinar.</p>
            <div class="flex flex-col sm:flex-row gap-2 pt-2">
                <button onclick="document.getElementById('modal-aceptar').classList.add('hidden')" class="flex-1 border border-gray-300 text-gray-700 py-2 rounded-lg font-medium hover:bg-gray-50">Cancelar</button>
                <button onclick="window.location.href='cliente-dashboard.html'" class="flex-1 bg-green-600 text-white py-2 rounded-lg font-medium hover:bg-green-700">Confirmar</button>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/reparaya/cliente-detalle-presupuesto.blade.php ENDPATH**/ ?>