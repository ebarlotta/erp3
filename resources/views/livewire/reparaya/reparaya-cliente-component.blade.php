<div class="px-2 text-center justify-center">
{{-- <a href="" class="block w-full bg-client text-white text-center py-3 rounded-xl font-medium transition">
        + Nueva solicitud
    </a> --}}
<button onclick="abrirModal()" class="block bg-client text-white text-center py-3 px-3 rounded-xl font-medium transition">+ Nueva solicitud</button>

    <!-- Resumen rápido -->
    <div class="grid grid-cols-3 gap-3">
        <div class="bg-white rounded-xl p-3 text-center shadow-sm">
            <p class="text-2xl font-bold text-client">{{ $resumen['abiertas'] }}</p>
            <p class="text-xs text-gray-500">Abiertas</p>
        </div>
        <div class="bg-white rounded-xl p-3 text-center shadow-sm">
            <p class="text-2xl font-bold text-client-accent">{{ $resumen['con_presupuestos'] }}</p>
            <p class="text-xs text-gray-500">Presupuestos</p>
        </div>
        <div class="bg-white rounded-xl p-3 text-center shadow-sm">
            <p class="text-2xl font-bold text-green-600">{{ $resumen['finalizadas'] }}</p>
            <p class="text-xs text-gray-500">Finalizadas</p>
        </div>
    </div>

    <h2 class="font-semibold text-gray-700 mt-2">Mis solicitudes</h2>

    <div class="space-y-3 text-left sm:w-max sm:mx-auto">
        @forelse ($solicitudes as $solicitud)
            <div class="bg-white rounded-xl p-4 shadow-sm border-l-4 border-client">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $solicitud->titulo }}</h3>
                        <p class="text-sm text-gray-500">
                            {{ $solicitud->categoria->nombrecategoria }} · {{ $solicitud->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">
                        {{ $solicitud->presupuestos_count ?? $solicitud->presupuestos()->count() }} presupuestos
                    </span>
                </div>
                <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ $solicitud->descripcion }}</p>
                <a href="{{ route('reparaya.reparaya.cliente.solicitud', $solicitud) }}" class="mt-3 inline-block text-sm text-client font-medium">
                    Ver presupuestos →
                </a>
            </div>
        @empty
            <p class="text-center text-gray-500 py-6">Todavía no tenés solicitudes.</p>
        @endforelse
    </div>

    <a href="" class="block w-full bg-repair text-white text-center py-3 rounded-xl font-medium transition">
        Menú Reparador
    </a>

    <!-- Modal confirmar aceptación -->
    <div id="modal-aceptar" class="hidden fixed inset-0 bg-black/50 flex items-end sm:items-center justify-center p-0 sm:mt-4 sm:p-4 z-50">
        <div class="bg-white w-full sm:max-w-[80%] rounded-t-2xl sm:rounded-2xl p-5 space-y-4"  style="display: inline-grid; margin-top: auto;">
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-lg">Confirmar presupuesto</h3>
                <button onclick="cerrarModal()" class="text-gray-400 text-xl">✕</button>
            </div>
            <div class="bg-white rounded-xl shadow p-5 space-y-4">
                <form wire:submit="guardar" class="text-left">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Título *</label>
                        <input type="text" wire:model="titulo" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Categoría *</label>
                        <select wire:model="categoria_id" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="">Seleccioná</option>
                            @foreach ($categorias as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nombrecategoria }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Descripción *</label>
                        <textarea wire:model="descripcion" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2"></textarea>
                        @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Dirección *</label>
                        <input type="text" wire:model="direccion" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        @error('direccion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Localidad *</label>
                        <input type="text" wire:model="localidad" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        @error('localidad') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Urgencia</label>
                            <select wire:model="urgencia" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                <option value="normal">Normal</option>
                                <option value="urgente">Urgente (48hs)</option>
                                <option value="muy_urgente">Muy urgente (24hs)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Presupuesto estimado</label>
                            <input type="number" wire:model="presupuesto_estimado" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fotos</label>
                        <input type="file" wire:model="fotos" multiple class="w-full text-sm">
                        @error('fotos.*') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="w-full bg-client text-white py-2 rounded-lg font-medium">
                        Publicar solicitud
                    </button>
                </form>
            </div>
        </div>
    </div>

      <script>
        function abrirModal() {
            // document.getElementById('modal-nombre').textContent = nombre;
            // document.getElementById('modal-monto').textContent = monto;
            document.getElementById('modal-aceptar').classList.remove('hidden');
        }
        function cerrarModal() {
            document.getElementById('modal-aceptar').classList.add('hidden');
        }
    </script>
</div>
