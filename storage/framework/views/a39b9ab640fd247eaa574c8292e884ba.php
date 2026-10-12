<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página No Encontrada - Error 404</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full bg-white rounded-2xl shadow-2xl p-8 md:p-12 text-center">
        <!-- Icono de error -->
        <div class="mb-8 justify-center flex">
            
            <div class="w-1/2 m-auto rounded-md">
            <?php $gatos = ['gato1.jpg', 'gato2.jpg', 'gato3.jpg', 'gato4.jpg']; ?>
            
                <img src="images/gatos/<?php echo e($gatos[rand(0,3)]); ?>" alt="" style="border-radius: 15px; opacity: 0.8">
                
            
            </div>
        </div>

        <!-- Título y descripción -->
        <h1 class="text-6xl font-bold text-gray-800 mb-4">404</h1>
        <h2 class="text-3xl font-semibold text-gray-700 mb-6">Página No Encontrada</h2>

        <p class="text-gray-600 text-lg mb-8 leading-relaxed">
            Lo sentimos, la página que estás buscando no existe o ha sido movida.
            Puede que hayas seguido un enlace incorrecto o la página haya sido eliminada.
        </p>

        <!-- Información técnica (opcional) -->
        <div class="bg-gray-50 rounded-lg p-4 mb-8 text-left">
            <p class="text-sm text-gray-500 mb-2">
                <strong>URL solicitada:</strong>
                <span class="font-mono text-gray-700"></span>
            </p>
            <p class="text-xs text-gray-400">
                Si crees que esto es un error, por favor contacta al administrador.
            </p>
        </div>

        <!-- Botones de acción -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(url('/')); ?>"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 flex items-center justify-center">
                <i class="fas fa-home mr-2"></i>
                Volver al Inicio
            </a>

            <button onclick="history.back()"
                    class="border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 px-8 rounded-lg transition duration-300 ease-in-out flex items-center justify-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Volver Atrás
            </button>
        </div>

        <!-- Búsqueda (opcional) -->
        
    </div>

    <!-- Efectos de decoración -->
    <div class="fixed bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
</body>
</html>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/errors/404.blade.php ENDPATH**/ ?>