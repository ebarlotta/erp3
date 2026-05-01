<div>
    <div class="container mx-auto p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Product Backlog</h1>
            <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 rounded">
                + Nuevo PBI
            </button>
        </div>

        <!-- Flash Message -->
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <!-- Tabla de PBIs -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">Prioridad</th>
                        <th class="px-6 py-3 text-left">Título</th>
                        <th class="px-6 py-3 text-left">Tipo</th>
                        <th class="px-6 py-3 text-left">Estado</th>
                        <th class="px-6 py-3 text-left">Story Points</th>
                        <th class="px-6 py-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pbis as $pbi)
                    <tr class="border-t">
                        <td class="px-6 py-4">
                            <input type="number" 
                                   wire:change="updatePriority({{ $pbi->id }}, $event.target.value)"
                                   value="{{ $pbi->priority }}"
                                   class="w-20 border rounded px-2 py-1">
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium">{{ $pbi->title }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($pbi->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-sm 
                                @if($pbi->type == 'FEATURE') bg-blue-100 text-blue-800
                                @elseif($pbi->type == 'BUG') bg-red-100 text-red-800
                                @elseif($pbi->type == 'TASK') bg-green-100 text-green-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ $pbi->type }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <select wire:change="updateStatus({{ $pbi->id }}, $event.target.value)"
                                    class="border rounded px-2 py-1">
                                <option value="PENDING" {{ $pbi->status == 'PENDING' ? 'selected' : '' }}>
                                    Pendiente
                                </option>
                                <option value="IN_PROGRESS" {{ $pbi->status == 'IN_PROGRESS' ? 'selected' : '' }}>
                                    En Progreso
                                </option>
                                <option value="DONE" {{ $pbi->status == 'DONE' ? 'selected' : '' }}>
                                    Completado
                                </option>
                            </select>
                        </td>
                        <td class="px-6 py-4">{{ $pbi->story_points ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <button wire:click="edit({{ $pbi->id }})" class="btn-primary p-1 rounded text-blue-600 hover:text-blue-900 mr-2">
                                Editar
                            </button>
                            <button wire:click="delete({{ $pbi->id }})" onclick="confirm('¿Eliminar este PBI?') || event.stopImmediatePropagation()" class="btn-danger p-1 rounded text-red-600 hover:text-red-900">Eliminar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $pbis->links() }}
            </div>
        </div>

        <!-- Modal para crear/editar -->
        @if($showModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6 w-2/4">
                <h2 class="text-xl font-bold mb-4">
                    {{ $editingPBI ? 'Editar PBI' : 'Nuevo PBI' }}
                </h2>
                <div class="flex">
                    <div class="space-y-2 mr-1">
                        <div>
                            <label class="block text-sm font-medium mb-1">Título</label>
                            <input type="text" wire:model="title" class="w-full border rounded px-3 py-2">
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Descripción</label>
                            <textarea wire:model="description" rows="3" class="w-full border rounded px-3 py-2"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Tipo</label>
                            <select wire:model="type" class="w-full border rounded px-3 py-2">
                                <option value="FEATURE">Feature</option>
                                <option value="BUG">Bug</option>
                                <option value="TASK">Task</option>
                                <option value="TECH_DEBT">Tech Debt</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-2 ml-1">                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Prioridad</label>
                            <input type="number" wire:model="priority" class="w-full border rounded px-3 py-2">
                            @error('priority') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-1">Urgencia (1-10)</label>
                            <input type="number" wire:model="urgencia" class="w-full border rounded px-3 py-2" title="Alta (7-10) - Media (4-6) - Baja (1-3)">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Valor del Negocio ( 1 - 10 )</label>
                            <input type="number" wire:model="valor_negocio" class="w-full border rounded px-3 py-2" title="impacto en ingresos/satisfacción">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Costo Estimado 1-10 <br>(complejidad + recursos + dependencias) </label>
                            <input type="number" wire:model="costo_estimado" class="w-full border rounded px-3 py-2" tit
                        le="Esfuerzo requerido para implementar (1-10)">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Tiempo Límite (plazo máximo para tener listo)</label>
                            <input type="number" wire:model="tiempo_limite_dias" class="w-full border rounded px-3 py-2" style="title='Plazo máximo para tener listo (en días) - afecta prioridad automática'">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Story Points (story_points promedio por sprint)</label>
                            <input type="number" wire:model="story_points" class="w-full border rounded px-3 py-2" title="Estimación de esfuerzo en story points (ej: 1, 2, 3, 5, 8)">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-2">
                    <button wire:click="$set('showModal', false)" class="px-4 py-2 border rounded">
                        Cancelar
                    </button>
                    <button wire:click="save" class="px-4 py-2 bg-blue-500 text-white rounded">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>