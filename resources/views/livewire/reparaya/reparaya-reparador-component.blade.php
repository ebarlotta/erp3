<div>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
    <main class="p-4 max-w-3xl mx-auto space-y-4">
        <!-- Filtros -->
        <div class="bg-white rounded-xl p-3 shadow-sm flex gap-2 overflow-x-auto">
            <button class="px-3 py-1 bg-emerald-600 text-white rounded-full text-sm whitespace-nowrap">Todas</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm whitespace-nowrap">Plomería</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm whitespace-nowrap">Electricidad</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm whitespace-nowrap">Pintura</button>
            <a href="{{route('reparador-calendario')}}" class="px-3 py-1 bg-orange-400 text-gray-700 rounded-full text-sm whitespace-nowrap">Calendario</a>
            <a href="{{route('reparador-dashboard')}}" class="px-3 py-1 bg-red-400 text-gray-700 rounded-full text-sm whitespace-nowrap">Dashboard</a>
        </div>

        <!-- Solicitudes disponibles -->
        <h2 class="font-semibold text-gray-700">Solicitudes disponibles</h2>

    @foreach($solicitudes as $solicitud)
        <div class="bg-white rounded-xl p-4 shadow-sm">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-semibold text-gray-800">{{ $solicitud->titulo }}</h3>
                    <p class="text-sm text-gray-500">
                        {{ ucfirst($solicitud->especialidad->nombrecategoria) }} · {{ $solicitud->localidad }} · {{ $solicitud->direccion }}
                    </p>
                </div>
                <span class="text-xs px-2 py-1 rounded-full font-medium
                    {{ $solicitud->urgencia=='normal' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}
                    {{ $solicitud->urgencia=='urgente' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-600' }}
                    {{ $solicitud->urgencia=='muy_urgente' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-600' }}">
                    Prioridad
                </span>
            </div>
            <p class="text-sm text-gray-600 mt-2">{{ $solicitud->descripcion }}</p>
            <div class="flex flex-col sm:flex-row gap-2 mt-3">
                <button onclick="document.getElementById('modal-presupuesto').classList.remove('hidden'); setTimeout(inicializarMapa, 100)" class="flex-1 bg-emerald-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-emerald-700">
                    Enviar presupuesto
                </button>
                <button onclick="document.getElementById('modal-detalle').classList.remove('hidden');" class="flex-1 border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">
                    Ver detalle
                </button>

                {{-- <button class="flex-1 border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">
                    Ver detalle
                </button> --}}
            </div>
        </div>
    @endforeach
</main>

    <!-- Modal presupuesto -->
    <div id="modal-presupuesto" class="hidden fixed inset-0 bg-black/50 flex items-end sm:items-center justify-center p-0 sm:p-4 z-50">
        <div class="bg-white w-full sm:max-w-md rounded-t-2xl sm:rounded-2xl p-5 space-y-4">
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-lg">Enviar presupuesto</h3>
                <button onclick="document.getElementById('modal-presupuesto').classList.add('hidden')" class="text-gray-400 text-xl">✕</button>
            </div>
            <!-- Mapa de ubicación del cliente -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ubicación aproximada del cliente</label>
                <div id="mapa-cliente" class="w-full h-48 rounded-lg border border-gray-300"></div>
                <p class="text-xs text-gray-400 mt-1">El círculo representa el área del domicilio (radio aprox. 500m)</p>
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

    <!-- Modal detalle -->
    <div id="modal-detalle" class="hidden fixed inset-0 bg-black/50 flex items-end sm:items-center justify-center p-0 sm:p-4 z-50">
        <div class="bg-white w-full sm:max-w-md rounded-t-2xl sm:rounded-2xl p-5 space-y-4">
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-lg">Detalles</h3>
                <button onclick="document.getElementById('modal-detalle').classList.add('hidden')" class="text-gray-400 text-xl">✕</button>
            </div>

            <div>
                @if(count($solicitud->fotos))
                    <div class="flex flex-wrap">
                        @foreach ($solicitud->fotos as $foto)
                            {{-- <img src="{{ asset('reparaya/'.$foto->path) }}" width="100px" height="100px" style="border: 2px solid gray; border-radius: 10px;" class="mx-1 p-2 my-1"> --}}
                            <img src="{{ asset('reparaya/'.$foto->path) }}" 
                            width="100px" height="100px" 
                            style="border: 2px solid gray; border-radius: 10px;" 
                            class="mx-1 p-2 my-1 cursor-pointer hover:opacity-80 transition-opacity"
                            onclick="abrirModalImagen(this.src)">
                        @endforeach
                    </div>
                @else
                    No hay fotos cargadas
                    <img src="{{ asset('images/sin_imagen.jpg')}}">

                @endif
                <label class="block text-sm font-medium text-gray-700 mb-1">Comentario</label>
                <textarea rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:outline-none" placeholder="Detalles del presupuesto..."></textarea>
            </div>
            <button class="w-full bg-emerald-600 text-white py-2 rounded-lg font-medium hover:bg-emerald-700">Enviar presupuesto</button>
        </div>
    </div>

    <!-- MODAL (Oculto por defecto) -->
<div id="modalImagen" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-75 p-4" onclick="cerrarModalImagen()">
    <!-- Botón de cerrar (X) -->
    <button class="absolute top-4 right-4 text-white text-3xl font-bold hover:text-red-500 transition-colors" onclick="cerrarModalImagen()">&times;</button>
    
    <!-- Imagen en detalle -->
    <!-- stopPropagation evita que al hacer clic en la imagen se cierre el modal -->
    <img id="imagenDetalle" src="" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl object-contain" onclick="event.stopPropagation()">
</div>

    <script>
        let mapCliente = null;

        function inicializarMapa() {
        if (mapCliente) return; // evitar reinicialización
        // Coordenadas de ejemplo: Belgrano, CABA
        const lat = -34.5627;
        const lng = -58.4569;

        mapCliente = L.map('mapa-cliente').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(mapCliente);

        // Círculo de área del domicilio (radio en metros)
        L.circle([lat, lng], {
            radius: 500,
            color: 'var(--repair-primary)',  // o '#008C45'
            fillColor: 'var(--repair-primary)',
            fillOpacity: 0.2,
            weight: 2
        }).addTo(mapCliente);

        // Marcador central
        L.marker([lat, lng]).addTo(mapCliente);
            }

        // Llamar al abrir el modal
        // Modificar el botón que abre el modal para que ejecute inicializarMapa()








        function abrirModalImagen(src) {
        const modal = document.getElementById('modalImagen');
        const imagen = document.getElementById('imagenDetalle');
        
        // Asignamos la ruta de la imagen clickeada
        imagen.src = src;
        
        // Mostramos el modal (quitando 'hidden' y añadiendo 'flex')
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Opcional: Evitar que el fondo haga scroll al abrir el modal
        document.body.style.overflow = 'hidden';
    }

    function cerrarModalImagen() {
        const modal = document.getElementById('modalImagen');
        
        // Ocultamos el modal
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        
        // Restauramos el scroll
        document.body.style.overflow = 'auto';
    }

    // Opcional: Cerrar el modal con la tecla Escape
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            cerrarModalImagen();
        }
    });



    </script>

</div>
