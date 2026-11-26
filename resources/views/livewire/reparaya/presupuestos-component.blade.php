<div>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Nueva Solicitud</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Referencia a la hoja de estilos externa -->
    <link rel="stylesheet" href="css/reparaya.css">
</head>
<body class="bg-gray-100 min-h-screen">

    <header class="bg-client text-white px-4 py-3 flex items-center gap-3 sticky top-0 z-10">
        <a href="{{ route('cliente-dashboard') }} " class="text-xl">←</a>
        <h1 class="font-bold">Nueva solicitud</h1>
    </header>

    <main class="p-4 max-w-2xl mx-auto">
        {{-- <form class="bg-white rounded-xl shadow p-5 space-y-4"> --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Título del trabajo *</label>
                <input type="text" wire:model="titulo" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Ej: Pérdida de agua en cocina">
                @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
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
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                    <input type="text" wire:model="direccion" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Calle, número">
                    @error('direccion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Localidad *</label>
                    <input type="text" wire:model="localidad" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Localidad"">
                    @error('localidad') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción *</label>
                <textarea wire:model="descripcion" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:outline-none" placeholder="Describí el problema con el mayor detalle posible..." ></textarea>
                @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urgencia</label>
                    <select wire:model="urgencia" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Selecciona una...</option>
                        <option value="normal">Normal</option>
                        <option value="urgente">Urgente (48hs)</option>
                        <option value="muy_urgente">Muy urgente (24hs)</option>
                    </select>
                    @error('urgencia') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Presupuesto estimado</label>
                    <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="$ opcional">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Fotos (opcional)</label>
                
                <!-- Zona de arrastrar/soltar -->
                <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:bg-gray-50 transition cursor-pointer">
                    <input type="file" wire:model="fotos" id="fotos" multiple accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="text-gray-500 flex justify-center items-center gap-2">
                        <span>📷</span> Tocá para subir fotos
                    </div>
                </div>
            
                <!-- Indicador de carga mientras sube la imagen temporal -->
                <div wire:loading wire:target="fotos" class="text-xs text-teal-600 mt-2">
                    Subiendo imágenes...
                </div>
            
                <!-- Previsualización nativa de Livewire -->
                @if ($fotos)
                    <div class="flex flex-wrap gap-2 mt-3">
                        @foreach ($fotos as $foto)
                            <img src="{{ $foto->temporaryUrl() }}" class="w-20 h-20 object-cover rounded-lg border">
                        @endforeach
                    </div>
                @endif
                
                @error('fotos.*')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-2">
            {{-- <button type="submit"  class="flex-1 bg-client text-white py-2 rounded-lg font-medium bg-client:hover">Publicar solicitud</button> --}}
                
            <a href="{{ route('reparaya.reparaya.cliente') }} " class="flex-1 text-center border border-gray-300 text-gray-700 py-2 rounded-lg font-medium hover:bg-gray-50">Cancelar</a>
            <button wire:click="guardar" wire:loading.attr="disabled" class="flex-1 bg-teal-700 text-white py-2 rounded-lg font-medium hover:bg-teal-800 transition flex justify-center items-center">
                <span wire:loading.remove wire:target="guardar">Publicar solicitud</span>
                <span wire:loading wire:target="guardar">Guardando...</span>
            </button>
        </div>

        <!-- </form> -->
    </main>
</body>
</html>

<script>
    function previewImages(event) {
        const container = document.getElementById('preview-container');
        container.innerHTML = ''; // Limpiar previsualizaciones anteriores
        
        const files = event.target.files;
    
        if (files.length > 0) {
            container.classList.remove('hidden');
        } else {
            container.classList.add('hidden');
            return;
        }
    
        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) return;
    
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-16 h-16 object-cover rounded-lg border border-gray-200 shadow-sm';
                container.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
    </script>
    
</div>
