<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Presupuestos recibidos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Referencia a la hoja de estilos externa -->
    <link rel="stylesheet" href="css/reparaya.css">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-client text-white px-4 py-3 flex items-center gap-3 sticky top-0 z-10">
        <a href="{{ route('cliente-dashboard') }}" class="text-xl">←</a>
        <h1 class="font-bold">Presupuestos recibidos</h1>
    </header>

    <main class="p-4 max-w-2xl mx-auto space-y-4 pb-24">

        <!-- Resumen de la solicitud -->
        <div class="bg-white rounded-xl p-4 shadow-sm border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="font-semibold text-gray-800">Pérdida en cocina</h2>
                    <p class="text-sm text-gray-500">Plomería · Belgrano, CABA · 15/10/2026</p>
                </div>
                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full font-medium">3 presupuestos</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">Se pierde agua debajo de la pileta hace 3 días. Necesito solución pronto.</p>
            <button class="mt-2 text-sm text-blue-600 font-medium">Ver detalle completo →</button>
        </div>

        <!-- Ordenar -->
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-gray-700">Comparar presupuestos</h3>
            <select class="text-sm border border-gray-300 rounded-lg px-2 py-1 bg-white focus:outline-none">
                <option>Menor precio</option>
                <option>Mejor calificación</option>
                <option>Más rápido</option>
            </select>
        </div>

        <!-- Presupuesto 1 -->
        <div class="bg-white rounded-xl shadow-sm p-4 border-2 border-green-500 relative">
            <span class="absolute -top-2 left-4 bg-green-500 text-white text-xs px-2 py-0.5 rounded-full font-medium">Mejor precio</span>
            <div class="flex items-start gap-3 mt-2">
                <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-700 font-bold text-lg shrink-0">CM</div>
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-semibold text-gray-800">Carlos Méndez</h4>
                            <p class="text-xs text-gray-500">Plomero matriculado · 12 años exp.</p>
                        </div>
                        <p class="text-lg font-bold text-green-600">$45.000</p>
                    </div>
                    <div class="flex items-center gap-1 mt-1">
                        <span class="text-yellow-500 text-sm">★★★★★</span>
                        <span class="text-xs text-gray-500">(48 reseñas)</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Incluye mano de obra y materiales. Plazo: 1 día. Garantía 6 meses.</p>
                    <div class="flex items-center gap-2 mt-2 text-xs text-gray-500">
                        <span class="bg-gray-100 px-2 py-0.5 rounded-full">⏱ 1 día</span>
                        <span class="bg-gray-100 px-2 py-0.5 rounded-full">🛡 Garantía 6 meses</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 mt-3">
                        <button onclick="abrirModal('Carlos Méndez', '$45.000')" class="flex-1 bg-green-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-green-700">Aceptar presupuesto</button>
                        <a href="{{ route('cliente-detalle-presupuesto') }}" class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver detalle</a>
                        <a href="{{ route('reparador-perfil') }}" class="bg-yellow-100 flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver Perfil</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Presupuesto 2 -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <div class="flex items-start gap-3">
                <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-700 font-bold text-lg shrink-0">LR</div>
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-semibold text-gray-800">Laura Ríos</h4>
                            <p class="text-xs text-gray-500">Plomera · 6 años exp.</p>
                        </div>
                        <p class="text-lg font-bold text-gray-800">$52.000</p>
                    </div>
                    <div class="flex items-center gap-1 mt-1">
                        <span class="text-yellow-500 text-sm">★★★★☆</span>
                        <span class="text-xs text-gray-500">(23 reseñas)</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Reparación completa con repuesto original. Plazo: 2 días. Garantía 12 meses.</p>
                    <div class="flex items-center gap-2 mt-2 text-xs text-gray-500">
                        <span class="bg-gray-100 px-2 py-0.5 rounded-full">⏱ 2 días</span>
                        <span class="bg-gray-100 px-2 py-0.5 rounded-full">🛡 Garantía 12 meses</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 mt-3">
                        <button onclick="abrirModal('Laura Ríos', '$52.000')" class="flex-1 bg-client text-white py-2 rounded-lg text-sm font-medium bg-client:hover">Aceptar presupuesto</button>
                        <a href="{{ route('cliente-detalle-presupuesto') }}" class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver detalle</a>
                        <a href="{{ route('reparador-perfil') }}" class="bg-yellow-100 flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver Perfil</a>                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Presupuesto 3 -->
        <div class="bg-white rounded-xl shadow-sm p-4">
            <div class="flex items-start gap-3">
                <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-700 font-bold text-lg shrink-0">JP</div>
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-semibold text-gray-800">Jorge Pérez</h4>
                            <p class="text-xs text-gray-500">Plomero · 3 años exp.</p>
                        </div>
                        <p class="text-lg font-bold text-gray-800">$38.000</p>
                    </div>
                    <div class="flex items-center gap-1 mt-1">
                        <span class="text-yellow-500 text-sm">★★★☆☆</span>
                        <span class="text-xs text-gray-500">(9 reseñas)</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Mano de obra. Materiales aparte. Plazo: 3 días. Sin garantía.</p>
                    <div class="flex items-center gap-2 mt-2 text-xs text-gray-500">
                        <span class="bg-gray-100 px-2 py-0.5 rounded-full">⏱ 3 días</span>
                        <span class="bg-gray-100 px-2 py-0.5 rounded-full">⚠ Sin garantía</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 mt-3">
                        <button onclick="abrirModal('Jorge Pérez', '$38.000')" class="flex-1 bg-client text-white py-2 rounded-lg text-sm font-medium bg-client:hover">Aceptar presupuesto</button>.
                        <a href="{{ route('cliente-detalle-presupuesto') }}" class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver detalle</a>
                        <a href="{{ route('reparador-perfil') }}" class="bg-yellow-100 flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver Perfil</a>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Modal confirmar aceptación -->
    <div id="modal-aceptar" class="hidden fixed inset-0 bg-black/50 flex items-end sm:items-center justify-center p-0 sm:p-4 z-50">
        <div class="bg-white w-full sm:max-w-md rounded-t-2xl sm:rounded-2xl p-5 space-y-4">
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-lg">Confirmar presupuesto</h3>
                <button onclick="cerrarModal()" class="text-gray-400 text-xl">✕</button>
            </div>
            <p class="text-sm text-gray-600">Vas a aceptar el presupuesto de <strong id="modal-nombre">-</strong> por <strong id="modal-monto" class="text-green-600">-</strong>.</p>
            <p class="text-xs text-gray-500">Al aceptar, se notificará al reparador y se habilitará el chat para coordinar.</p>
            <div class="flex flex-col sm:flex-row gap-2 pt-2">
                <button onclick="cerrarModal()" class="flex-1 border border-gray-300 text-gray-700 py-2 rounded-lg font-medium hover:bg-gray-50">Cancelar</button>
                <a href="{{ route('cliente-dashboard') }}" class="text-center flex-1 bg-green-600 text-white py-2 rounded-lg font-medium hover:bg-green-700">Confirmar</a>
            </div>
        </div>
    </div>

    <script>
        function abrirModal(nombre, monto) {
            document.getElementById('modal-nombre').textContent = nombre;
            document.getElementById('modal-monto').textContent = monto;
            document.getElementById('modal-aceptar').classList.remove('hidden');
        }
        function cerrarModal() {
            document.getElementById('modal-aceptar').classList.add('hidden');
        }
    </script>

</body>
</html>