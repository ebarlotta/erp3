<div class="bg-white rounded-xl shadow p-5 space-y-4">
   <form wire:submit="guardar">
       <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
           <div>
               <label class="block text-sm font-medium text-gray-700 mb-1">Monto *</label>
               <input type="number" wire:model="monto" class="w-full border border-gray-300 rounded-lg px-3 py-2">
               @error('monto') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
           </div>
           <div>
               <label class="block text-sm font-medium text-gray-700 mb-1">Moneda *</label>
               <select wire:model="moneda_id" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                   @foreach ($monedas as $m)
                       <option value="{{ $m->id }}">{{ $m->codigo }} - {{ $m->nombre }}</option>
                   @endforeach
               </select>
           </div>
       </div>

       <div class="grid grid-cols-2 gap-3">
           <div>
               <label class="block text-sm font-medium text-gray-700 mb-1">Plazo (días) *</label>
               <input type="number" wire:model="plazo_dias" class="w-full border border-gray-300 rounded-lg px-3 py-2">
           </div>
           <div>
               <label class="block text-sm font-medium text-gray-700 mb-1">Garantía (meses)</label>
               <input type="number" wire:model="garantia_meses" class="w-full border border-gray-300 rounded-lg px-3 py-2">
           </div>
       </div>

       <div>
           <label class="block text-sm font-medium text-gray-700 mb-1">Comentario</label>
           <textarea wire:model="comentario" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2"></textarea>
       </div>

       <button type="submit" class="w-full bg-repair text-white py-2 rounded-lg font-medium">
           Enviar presupuesto
       </button>
   </form>
</div>