<div class="space-y-3">
   @forelse ($presupuestos as $p)
       <div class="bg-white rounded-xl shadow-sm p-4">
           <div class="flex justify-between items-start">
               <div>
                   <h3 class="font-semibold text-gray-800">{{ $p->reparador->name }}</h3>
                   <p class="text-xs text-gray-500">Plazo: {{ $p->plazo_dias }} días</p>
               </div>
               <p class="text-lg font-bold text-green-600">{{ $p->moneda->simbolo }}{{ number_format($p->monto, 2) }}</p>
           </div>
           @if ($p->comentario)
               <p class="text-sm text-gray-600 mt-2">{{ $p->comentario }}</p>
           @endif
           <div class="flex gap-2 mt-3">
               <a href="{{ route('reparaya.presupuestos.show', $p) }}" class="flex-1 text-center border border-gray-300 py-2 rounded-lg text-sm">Ver detalle</a>
               @if ($p->estado === 'enviado' && auth()->id() === $solicitud->cliente_id)
                   <form action="{{ route('reparaya.presupuestos.aceptar', $p) }}" method="POST" class="flex-1">
                       @csrf
                       <button class="w-full bg-green-600 text-white py-2 rounded-lg text-sm">Aceptar</button>
                   </form>
               @endif
           </div>
       </div>
   @empty
       <p class="text-center text-gray-500 py-6">Sin presupuestos todavía.</p>
   @endforelse
</div>