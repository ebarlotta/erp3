<div>
    <!-- Header -->
    <header class="flex items-center justify-between mb-6">
        <div>
            <a href="{{ route('projects.index') }}">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Volver
                </button>
            </a>
            {{-- <a href="{{ route('projects.index') }}" class="text-slate-400 hover:text-white text-sm">← Volver</a> --}}
            <h2 class="text-2xl font-bold text-white mt-1">{{ $project->name }}</h2>
            <p class="text-slate-400 text-sm">{{ $project->tasks->count() }} tareas</p>
        </div>
        <div class="flex items-center gap-4">
            <select wire:model.live="filterStatus" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white">
                <option value="">Todas</option>
                @foreach($statuses as $status)
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                @endforeach
            </select>
            <a href="{{ route('projects.edit', $project) }}" class="text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </a>
        </div>
    </header>

    <!-- Add Task -->
    <div class="bg-slate-800 rounded-xl p-4 border border-slate-700 mb-6">
        <form wire:submit="addTask" class="flex gap-3">
            <input
                type="text"
                wire:model="newTaskTitle"
                placeholder="Nueva tarea..."
                class="flex-1 bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 text-white placeholder-slate-400 focus:outline-none focus:border-blue-500"
            >
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Agregar
            </button>
        </form>
    </div>

    <!-- Tasks List -->
    <div class="space-y-2">
        @forelse($tasks as $task)
            <div class="bg-slate-800 rounded-lg p-4 border border-slate-700 flex items-center gap-4">
                <!-- Checkbox -->
                <button
                    wire:click="updateStatus({{ $task->id }}, '{{ $task->status === 'completed' ? 'pending' : 'completed' }}')" class="w-5 h-5 rounded border-2 flex items-center justify-center transition-colors {{ $task->status === 'completed' ? 'bg-green-500 border-green-500' : 'border-slate-600 hover:border-slate-400' }}">
                    @if($task->status === 'completed')
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    @endif
                </button>

                <!-- Title -->
                <div class="flex-1">
                    <span class="{{ $task->status === 'completed' ? 'text-slate-500 line-through' : 'text-white' }}">
                        {{ $task->title }}
                    </span>
                </div>

                <!-- Priority -->
                <select  wire:change="updatePriority({{ $task->id }}, $event.target.value)" class="bg-slate-900 border border-slate-700 rounded px-2 py-1 text-xs text-white">
                    @foreach($priorities as $priority)
                        <option value="{{ $priority }}" {{ $task->priority === $priority ? 'selected' : '' }}>
                            {{ ucfirst($priority) }}
                        </option>
                    @endforeach
                </select>

                <!-- Due Date -->
                @if($task->due_date)
                    <span class="text-xs text-slate-400">{{ $task->due_date->format('d/m') }}</span>
                @endif

                <!-- Delete -->
                <button wire:click="deleteTask({{ $task->id }})" class="text-slate-500 hover:text-red-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
        @empty
            <div class="text-center py-8 text-slate-400">
                No hay tareas todavía.
            </div>
        @endforelse
    </div>
</div>
