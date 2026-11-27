
<div>
    <header class="bg-client text-white px-4 py-3 flex items-center gap-3 sticky top-0 z-10">
        <a href="{{ route('reparaya.reparaya.cliente') }}" class="text-xl">←</a>
        <h1 class="font-bold">Presupuestos recibidos</h1>
    </header>

    <main class="p-4 max-w-2xl mx-auto space-y-4 pb-24">

        <!-- Resumen de la solicitud -->
        <div class="bg-white rounded-xl p-4 shadow-sm border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="font-semibold text-gray-800">{{ $solicitud->titulo }}</h2>
                    <p class="text-sm text-gray-500">{{ $solicitud->categoria->nombrecategoria }} -- {{ 'Direccion:' . $solicitud->direccion }} , {{ 'Localidad:' . $solicitud->localidad }} -- {{ 'Fecha Inicial:' . $solicitud->created_at->format('d-m-Y') }}</p>
                </div>
                <span class="col-3 text-center text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full font-medium">{{ $solicitud->presupuestos->count() }} presupuestos</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">{{ $solicitud->descripcion }}</p>
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

        @foreach($presupuestos as $presupuesto)
            <div class="bg-white rounded-xl shadow-sm p-4 {{ $loop->first ? 'border-2 border-green-500 relative' : '' }}">
            <span class="absolute -top-2 left-4 bg-green-500 text-white text-xs px-2 py-0.5 rounded-full font-medium">Mejor precio</span>
            <div class="flex items-start gap-3 mt-2">
                <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-700 font-bold text-lg shrink-0">{{ $presupuesto->reparador->iniciales }}</div>
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-semibold text-gray-800"> {{ $presupuesto->reparador->nombre }}</h4>
                            <p class="text-xs text-gray-500">
                                @foreach($presupuesto->reparador->especialidades as $especialidad)
                                    <label for="">{{ $especialidad->nombre}}</label>
                                @endforeach
                                · {{ $presupuesto->reparador->experiencia_anios }} años exp.</p>
                        </div>
                        <p class="text-lg font-bold text-green-600">${{ number_format($presupuesto->monto, 2, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center gap-1 mt-1">
                        <span class="text-yellow-500 text-sm">{{ $presupuesto->reparador?->estrellas_texto }}</span>
                        <span class="text-xs text-gray-500">({{ $presupuesto->reparador->total_resenas }} reseñas)</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">{{ $presupuesto->comentario }}. Plazo: {{ $presupuesto->plazo_dias }} día. Garantía {{ $presupuesto->garantia_meses }} meses.</p>
                    <div class="flex items-center gap-2 mt-2 text-xs text-gray-500">
                        <span class="bg-gray-100 px-2 py-0.5 rounded-full">⏱ {{ $presupuesto->plazo_dias }} día/s</span>
                        <span class="bg-gray-100 px-2 py-0.5 rounded-full">🛡 Garantía {{ $presupuesto->garantia_meses }} meses</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 mt-3">
                        <button onclick="abrirModal('{{ $presupuesto->reparador->apellido . ', ' . $presupuesto->reparador->nombre }}', '{{ $presupuesto->monto }}')" class="flex-1  {{ $loop->first ? 'bg-green-600' : 'bg-client bg-client:hover' }}  text-white py-2 rounded-lg text-sm font-medium hover:bg-green-700">Aceptar presupuesto</button>
                        <a href="{{ route('cliente-detalle-presupuesto') }}" class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Ver detalle</a>
                        <button wire:click="Mostrar_modal_ver_perfil()" class="flex-1  {{ $loop->first ? 'bg-green-600' : 'bg-client bg-client:hover' }}  text-white py-2 rounded-lg text-sm font-medium hover:bg-green-700">Ver Perfil Reparador</button>
                        

                    </div>
                </div>
            </div>
            </div>
        @endforeach

        <div id="modal-ver-perfil" class="{{ $modal_ver_perfil ? 'fixed inset-0 bg-black/50 flex items-center justify-center z-50' : 'hidden' }}">
            <!-- <div id="modal-ver-perfil" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"> -->
                <div class="bg-white w-4/5 max-h-[90vh] overflow-y-auto mx-auto rounded-2xl p-5 space-y-4">
                
                    
                <div class="flex justify-between items-center">
                    <h3 class="font-bold text-lg">Ver Perfil del Reparador</h3>
                    <button wire:click="$set('modal_ver_perfil', false)" class="text-gray-400 text-xl">✕</button>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                    <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-700 font-bold text-2xl mx-auto">{{ $presupuesto->reparador->iniciales}}</div>
                    <h2 class="font-bold text-lg mt-3 text-gray-800">{{ $presupuesto->reparador->apellido . ', ' . $presupuesto->reparador->nombre }}</h2>
                    

                    <p class="text-sm text-gray-500">
                        @foreach($presupuesto->reparador->especialidades as $especialidad)
                            <label for="">{{ $especialidad->nombre}}</label>
                        @endforeach
                        {{ $presupuesto->reparador->domicilio }}
                    </p>
                    <div class="flex items-center justify-center gap-1 mt-1">
                        <span class="text-yellow-500">{{ $presupuesto->reparador?->estrellas_texto }}</span>
                        <span class="text-xs text-gray-500">({{ $presupuesto->reparador->total_resenas }} reseñas)</span>
                    </div>
                    <div class="flex justify-center gap-2 mt-3 text-xs">
                        {!! $presupuesto->reparador->verificado ? '<span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-full font-medium">✓ Verificado</span>' : '<span class="bg-emerald-100 text-red-300 px-2 py-1 rounded-full font-medium">x No Verificado</span>' !!}
                        <span class="bg-blue-100 bg-client px-2 py-1 rounded-full font-medium">{{ $presupuesto->reparador->experiencia_anios }} años exp.</span>
                    </div>
                </div>
    
                <!-- Métricas -->
                @php
                    $promedios = array_filter($presupuesto->reparador->calificacionUltimosMeses()['promedios']);
                    $totales = count(array_filter($presupuesto->reparador->calificacionUltimosMeses()['totales']));


                    $promedioGeneral = count($promedios) > 0 ? array_sum($promedios) / count($promedios) : 0;
                    $porcentaje = round(($promedioGeneral / 5) * 100);                    
                @endphp
                <div class="grid grid-cols-3 gap-3">
                    <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                        @php
                            if($totales <= 0) { echo '<span class="bg-emerald-100 text-blue-400 px-2 py-1 rounded-full font-medium"> Sin Datos aún</span>'; } else { echo '<span class="bg-emerald-100 text-green-300 px-2 py-1 rounded-full font-medium">'.$totales.' </span>'; }
                        @endphp    
                        {{-- <p class="text-2xl font-bold text-emerald-600">{! $totales !}</p> --}}
                        <p class="text-xs text-gray-500">Trabajos</p>
                    </div>
                    <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                        @php
                            if($porcentaje <= 0) { echo '<span class="bg-emerald-100 text-blue-400 px-2 py-1 rounded-full font-medium"> Sin Datos aún</span>'; } else { echo '<span class="bg-emerald-100 text-green-300 px-2 py-1 rounded-full font-medium">'.$porcentaje.' %</span>'; }
                        @endphp
                        <p class="text-xs text-gray-500">Recomendación</p>
                    </div>
                    <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                        <p class="text-2xl font-bold text-emerald-600">{{ $presupuesto->reparador->getTiempoRespuestaFormateadoAttribute() }}</p>
                        <p class="text-xs text-gray-500">Resp. prom.</p>
                    </div>
                </div>
    
                <!-- Sobre mí -->
                <div class="bg-white rounded-xl shadow-sm p-4">
                    <h3 class="font-semibold text-gray-700 mb-2">Sobre mí</h3>
                    <p class="text-sm text-gray-600">{{ $presupuesto->reparador->sobre_mi }}</p>
                </div>
    
                <!-- Especialidades -->
                <div class="bg-white rounded-xl shadow-sm p-4">
                    <h3 class="font-semibold text-gray-700 mb-2">Especialidades</h3>
                    <div class="flex flex-wrap gap-2">
                        
                        @foreach($presupuesto->reparador->especialidades as $especialidad)
                            <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">{{ $especialidad->nombre}}</span>
                            <label for="">{{ $especialidad->nombre}}</label>
                        @endforeach
                        
                    </div>
                </div>
    
                <!-- Reseñas -->
                <div class="bg-white rounded-xl shadow-sm p-4 space-y-3">
                    <h3 class="font-semibold text-gray-700">Últimas reseñas</h3>
    
                    @foreach ($presupuesto->reparador->resenas as $resena)
                        Una
                    @endforeach
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
                <a wire:click="Mostrar_modal_ver_perfil()"  class="block w-full bg-client text-white text-center py-3 rounded-xl font-medium bg-client:hover transition">
                    Volver a presupuestos
                </a>
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
</div>