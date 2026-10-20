<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Nueva Solicitud</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <header class="bg-blue-600 text-white px-4 py-3 flex items-center gap-3 sticky top-0 z-10">
        <a href="<?php echo e(route('cliente-dashboard')); ?> " class="text-xl">←</a>
        <h1 class="font-bold">Nueva solicitud</h1>
    </header>

    <main class="p-4 max-w-2xl mx-auto">
        <form class="bg-white rounded-xl shadow p-5 space-y-4">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Título del trabajo *</label>
                <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Ej: Pérdida de agua en cocina">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Categoría *</label>
                <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option>Seleccioná una categoría</option>
                    <option>Plomería</option>
                    <option>Electricidad</option>
                    <option>Pintura</option>
                    <option>Carpintería</option>
                    <option>Albañilería</option>
                    <option>Otros</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción *</label>
                <textarea rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Describí el problema con el mayor detalle posible..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Calle, número, localidad">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urgencia</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option>Normal</option>
                        <option>Urgente (48hs)</option>
                        <option>Muy urgente (24hs)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Presupuesto estimado</label>
                    <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="$ opcional">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fotos (opcional)</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center text-gray-500 text-sm">
                    📷 Tocá para subir fotos
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-2">
                <a href="<?php echo e(route('cliente-dashboard')); ?> " class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg font-medium hover:bg-gray-50">Cancelar</a>
                <button type="submit" onclick="window.location.href='<?php echo e(route('cliente-dashboard')); ?> " class="flex-1 bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700">Publicar solicitud</button>
            </div>
        </form>
    </main>
</body>
</html>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/reparaya/cliente-nueva-solicitud.blade.php ENDPATH**/ ?>