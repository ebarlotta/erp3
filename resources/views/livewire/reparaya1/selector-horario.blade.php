<div class="bg-white rounded-xl shadow p-5 space-y-4">
   <div>
       <label class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
       <input type="date" wire:model.live="fecha" class="w-full border border-gray-300 rounded-lg px-3 py-2">
   </div>

   <div>
       <label class="block text-sm font-medium text-gray-700 mb-2">Horarios disponibles</label>
       <div class="grid grid-cols-3 sm:grid-cols-4 gap-2">
           @forelse ($slots as $hora => $disponible)
               <button
                   type="button"
                   wire:click="seleccionarHora('{{ $hora }}')"
                   @disabled(!$disponible)
                   class="py-2 rounded-lg text-sm border
                       {{ $horaSeleccionada === $hora ? 'bg-client text-white border-client' : '' }}
                       {{ $disponible ? 'border-client text-client hover:bg-gray-50' : 'border-gray-200 text-gray-300 line-through' }}">
                   {{ $hora }}
               </button>
           @empty
               <p class="col-span-full text-sm text-gray-500">Sin horarios para esta fecha.</p>
           @endforelse
       </div>
       @error('horaSeleccionada') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
   </div>

   <button wire:click="confirmar" class="w-full bg-client text-white py-2 rounded-lg font-medium">
       Confirmar cita
   </button>
</div>