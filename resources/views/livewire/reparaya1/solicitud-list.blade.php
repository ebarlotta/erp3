<div class="space-y-3">
   <div class="bg-white rounded-xl p-3 shadow-sm flex flex-col sm:flex-row gap-2">
       <input type="text" wire:model.live.debounce.500ms="busqueda" placeholder="Buscar..." class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm">
       <select wire:model.live="filtroEstado" class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
           <option value="">Todos los estados</option>
           <option value="abierta">Abiertas</option>
           <option value="con_presupuestos">Con presupuestos</option>
           <option value="adjudicada">Adjudicadas</option>
           <option value="finalizada">Finalizadas</option>
       </select>
   </div>

   @forelse ($solicitudes as $sol)
       <div class="bg-white rounded-xl p-4 shadow-sm border-l-4 border-client">
           <div class="flex justify-between items-start">
               <div>
                   <h3 class="font-semibold text-gray-800">{{ $sol->titulo }}</h3>
                   <p class="text-sm text-gray-500">{{ $sol->categoria->nombrecategoria }} · {{ $sol->created_at->format('d/m/Y') }}</p>
               </div>
               <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $sol->estado }}</span>
           </div>
           <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ $sol->descripcion }}</p>
           <a href="{{ route('reparaya.solicitudes.show', $sol) }}" class="mt-3 inline-block text-sm text-client font-medium">Ver detalle →</a>
       </div>
   @empty
       <p class="text-center text-gray-500 py-6">No hay solicitudes.</p>
   @endforelse

   <div>{{ $solicitudes->links() }}</div>
</div>