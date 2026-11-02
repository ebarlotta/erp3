<div class="bg-white rounded-xl shadow p-5 space-y-4">
   <form wire:submit="guardar">
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