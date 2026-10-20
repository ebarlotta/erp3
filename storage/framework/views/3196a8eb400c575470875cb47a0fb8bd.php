<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-sm bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold text-center text-blue-600 mb-1">ReparaYa</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Tu hogar en buenas manos</p>

        <form class="space-y-4" href="cliente-dashboard.html" >
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="tu@email.com">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="••••••••">
            </div>
            <button type="button" onclick="window.location.href='cliente-dashboard'" class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                Ingresar
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-4">
            ¿No tenés cuenta? <a href="#" class="text-blue-600 font-medium">Registrate</a>
        </p>
    </div>
</body>
</html>
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/reparaya/principal.blade.php ENDPATH**/ ?>