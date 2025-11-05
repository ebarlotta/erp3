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
            {{-- <div class="w-48 h-48 mx-auto bg-gradient-to-br from-blue-50 to-purple-100 rounded-2xl flex items-center justify-center shadow-lg border-4 border-white p-4">
                <!-- Gatito de cuerpo completo jugando con router WiFi dañado -->
                <svg class="w-40 h-40" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Router WiFi -->
                    <rect x="30" y="60" width="60" height="25" rx="5" fill="#4B5563" stroke="#1F2937" stroke-width="1.5"/>
                    <rect x="35" y="65" width="50" height="15" rx="2" fill="#1F2937"/>

                    <!-- Luces del router -->
                    <circle cx="45" y="73" r="2" fill="#10B981"/>
                    <circle cx="55" y="73" r="2" fill="#F59E0B"/>
                    <circle cx="65" y="73" r="2" fill="#EF4444"/>
                    <circle cx="75" y="73" r="2" fill="#6B7280"/>

                    <!-- Antena rota -->
                    <path d="M40 45 L40 60" stroke="#6B7280" stroke-width="3" stroke-linecap="round"/>
                    <path d="M40 45 L35 40" stroke="#EF4444" stroke-width="2" stroke-linecap="round" stroke-dasharray="2,2"/>

                    <!-- Segunda antena (también dañada) -->
                    <path d="M80 50 L80 60" stroke="#6B7280" stroke-width="3" stroke-linecap="round"/>
                    <path d="M80 50 L85 48 L82 45" stroke="#EF4444" stroke-width="2" stroke-linecap="round"/>

                    <!-- Cuerpo del gatito -->
                    <ellipse cx="75" cy="85" rx="15" ry="10" fill="#FBCFE8" stroke="#DB2777" stroke-width="1.5"/>

                    <!-- Cabeza del gatito -->
                    <circle cx="85" cy="70" r="12" fill="#FBCFE8" stroke="#DB2777" stroke-width="1.5"/>

                    <!-- Orejas -->
                    <path d="M80 62 L85 55 L90 62 Z" fill="#FBCFE8" stroke="#DB2777" stroke-width="1.5"/>
                    <path d="M90 62 L95 55 L100 62 Z" fill="#FBCFE8" stroke="#DB2777" stroke-width="1.5"/>

                    <!-- Ojos curiosos -->
                    <circle cx="82" cy="68" r="2" fill="#1F2937"/>
                    <circle cx="88" cy="68" r="2" fill="#1F2937"/>

                    <!-- Pupilas mirando la antena rota -->
                    <circle cx="83" cy="68" r="1" fill="white"/>
                    <circle cx="87" cy="68" r="1" fill="white"/>

                    <!-- Nariz -->
                    <circle cx="85" cy="72" r="1.5" fill="#DB2777"/>

                    <!-- Boca sonriente juguetona -->
                    <path d="M82 75 Q85 78 88 75" stroke="#DB2777" stroke-width="1.5" stroke-linecap="round"/>

                    <!-- Bigotes -->
                    <path d="M80 74 L75 73" stroke="#1F2937" stroke-width="1" stroke-linecap="round"/>
                    <path d="M80 76 L75 77" stroke="#1F2937" stroke-width="1" stroke-linecap="round"/>
                    <path d="M90 74 L95 73" stroke="#1F2937" stroke-width="1" stroke-linecap="round"/>
                    <path d="M90 76 L95 77" stroke="#1F2937" stroke-width="1" stroke-linecap="round"/>

                    <!-- Patas delanteras abrazando el router -->
                    <path d="M70 85 L65 80 L60 85 L65 90 Z" fill="#FBCFE8" stroke="#DB2777" stroke-width="1"/>
                    <path d="M80 85 L85 80 L90 85 L85 90 Z" fill="#FBCFE8" stroke="#DB2777" stroke-width="1"/>

                    <!-- Cola moviéndose -->
                    <path d="M60 85 Q50 80 55 75 Q60 70 65 75" stroke="#FBCFE8" stroke-width="4" stroke-linecap="round" fill="none"/>
                    <path d="M60 85 Q50 80 55 75 Q60 70 65 75" stroke="#DB2777" stroke-width="1.5" stroke-linecap="round" fill="none"/>

                    <!-- Señal WiFi intermitente (rota) -->
                    <path d="M50 50 Q60 45 65 50" stroke="#EF4444" stroke-width="2" stroke-linecap="round" stroke-dasharray="3,2" opacity="0.6"/>
                    <path d="M45 55 Q60 47 70 55" stroke="#EF4444" stroke-width="1.5" stroke-linecap="round" stroke-dasharray="4,3" opacity="0.4"/>
                    <path d="M40 60 Q60 50 75 60" stroke="#EF4444" stroke-width="1" stroke-linecap="round" stroke-dasharray="5,4" opacity="0.2"/>

                    <!-- Partículas de "daño" alrededor de la antena -->
                    <circle cx="37" cy="42" r="1" fill="#EF4444" opacity="0.7">
                        <animate attributeName="opacity" values="0.7;0.2;0.7" dur="1s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="33" cy="45" r="0.8" fill="#EF4444" opacity="0.5">
                        <animate attributeName="opacity" values="0.5;0.1;0.5" dur="1.2s" repeatCount="indefinite"/>
                    </circle>
                </svg>
            </div> --}}
            <div class="w-1/2 m-auto rounded-md">
            @php $gatos = ['gato1.jpg', 'gato2.jpg', 'gato3.jpg', 'gato4.jpg']; @endphp
            {{-- @foreach($gatos as $gato) --}}
                <img src="images/gatos/{{ $gatos[rand(0,3)] }}" alt="" style="border-radius: 15px; opacity: 0.8">
                {{-- <p><i class="fas {{ $gatoiconos[rand(0,1)] }}"></i> {{ $Zona->nombre}}</p> --}}
            {{-- @endforeach --}}
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
            <a href="{{ url('/') }}"
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
        {{-- <div class="mt-8">
            <p class="text-gray-500 mb-4">¿Buscas algo específico?</p>
            <form action="" method="GET" class="flex max-w-md mx-auto">
                <input type="text"
                       name="q"
                       placeholder="Buscar en el sitio..."
                       class="flex-1 border border-gray-300 rounded-l-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit"
                        class="bg-gray-800 hover:bg-gray-900 text-white py-2 px-6 rounded-r-lg transition duration-300">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div> --}}
    </div>

    <!-- Efectos de decoración -->
    <div class="fixed bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
</body>
</html>
