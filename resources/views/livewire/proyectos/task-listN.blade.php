<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Tareas</h2>
        <button wire:click="$dispatch('open-modal', 'task-modal')"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            + Nueva Tarea
        </button>
    </div>

    <!-- Filtros -->
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <div class="flex flex-wrap gap-4">
            <input type="text" wire:model.live="search" placeholder="Buscar tareas..."
                   class="border rounded-lg px-3 py-2 flex-1 min-w-[200px]">
            <select wire:model.live="statusFilter" class="border rounded-lg px-3 py-2">
                <option value="">Todos los estados</option>
                <option value="pending">Pendiente</option>
                <option value="in_progress">En Progreso</option>
                <option value="completed">Completada</option>
            </select>
            <select wire:model.live="priorityFilter" class="border rounded-lg px-3 py-2">
                <option value="">Todas las prioridades</option>
                <option value="low">Baja</option>
                <option value="medium">Media</option>
                <option value="high">Alta</option>
                <option value="urgent">Urgente</option>
            </select>
        </div>
    </div>

    <!-- Lista de Tareas con Drag & Drop -->
    <div class="space-y-2" x-data="{
        dragging: null,
        dragover(e) { e.preventDefault() },
        drop(e) {
            e.preventDefault()
            const id = this.dragging
            const newOrder = this.$refs.task.value
            @this.call('updateOrder', [{ value: id, order: newOrder }])
            this.dragging = null
        }
    }">
        @foreach($tasks as $index => $task)
            <div draggable="true"
                 @dragstart="dragging = {{ $task->id }}"
                 @dragover="dragover"
                 @drop="drop"
                 class="bg-white p-4 rounded-lg shadow border-l-4
                        @if($task->status === 'completed') border-green-500 opacity-75
                        @elseif($task->status === 'in_progress') border-blue-500
                        @else border-gray-300 @endif">
                <div class="flex items-center gap-3">
                    <!-- Drag Handle -->
                    <div class="cursor-move text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0
0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
stroke-width="2"
                                  d="M4 8h16M4 16h16"/>
                        </svg>
                    </div>

                    <!-- Checkbox estado -->
                    <button wire:click="toggleStatus({{ $task->id }})"
                            class="w-5 h-5 rounded border-2 flex items-center
justify-center
                            @if($task->status === 'completed') bg-green-500
border-green-500 text-white
                            @else border-gray-300 @endif">
                        @if($task->status === 'completed')
                            ✓
                        @endif
                    </button>

                    <div class="flex-1">
                        <div class="flex items-center gap-2">
                            <h4 class="font-medium @if($task->status === 'completed')
line-through text-gray-500 @endif">
                                {{ $task->title }}
                            </h4>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-1">
                            <span class="text-xs px-2 py-0.5 rounded-full
                                @if($task->priority === 'urgent') bg-red-100 text-red-800
                                @elseif($task->priority === 'high') bg-orange-100
text-orange-800
                                @elseif($task->priority === 'medium') bg-yellow-100
text-yellow-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($task->priority) }}
                            </span>

                            @if($task->due_date)
                                <span class="text-xs text-gray-500">
                                    📅 {{ $task->due_date->format('d/m/Y') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button wire:click="$dispatch('edit-task', { id: {{ $task->id }}
})"
                                class="text-gray-500 hover:text-blue-600 p-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0
002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                        <button wire:click="delete({{ $task->id }})"
                                wire:confirm="¿Eliminar esta tarea?"
                                class="text-gray-500 hover:text-red-600 p-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0
01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{-- {{ $tasks->links() }} --}}
    </div>

    {{-- @livewire('task.task-form') --}}
</div>
