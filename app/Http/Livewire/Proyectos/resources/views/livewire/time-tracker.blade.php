<div>
    <header class="mb-8">
        <h2 class="text-2xl font-bold text-white">Time Tracker</h2>
        <p class="text-slate-400 text-sm">Registra el tiempo en tus proyectos</p>
    </header>

    <!-- Timer Control -->
    <div class="bg-slate-800 rounded-xl p-6 border border-slate-700 mb-8">
        <div class="flex items-center gap-6">
            <!-- Project Select -->
            <div class="flex-1">
                <label class="block text-sm text-slate-400 mb-2">Proyecto</label>
                <select 
                    wire:model="selectedProject"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white"
                    {{ $currentEntry ? 'disabled' : '' }}
                >
                    <option value="">Seleccionar proyecto...</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Task Select -->
            <div class="flex-1">
                <label class="block text-sm text-slate-400 mb-2">Tarea (opcional)</label>
                <select 
                    wire:model="selectedTask"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white"
                    {{ $currentEntry ? 'disabled' : '' }}
                >
                    <option value="">Sin tarea específica</option>
                    @foreach($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Timer Display -->
            <div class="text-center">
                <label class="block text-sm text-slate-400 mb-2">Tiempo</label>
                <div class="text-4xl font-mono text-white {{ $currentEntry ? 'timer-active' : '' }}">
                    {{ $runningTime }}
                </div>
            </div>

            <!-- Start/Stop Button -->
            <div class="flex items-end">
                @if($currentEntry)
                    <button 
                        wire:click="stopTimer"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium flex items-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <rect x="6" y="6" width="8" height="8"/>
                        </svg>
                        Detener
                    </button>
                @else
                    <button 
                        wire:click="startTimer"
                        disabled="{{ !$selectedProject }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                        </svg>
                        Iniciar
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Time Entries History -->
    <h3 class="text-lg font-semibold text-white mb-4">Historial</h3>
    <div class="bg-slate-800 rounded-xl border border-slate-700 overflow-hidden">
        <table class="w-full">
            <thead class="bg-slate-900 text-slate-400 text-sm">
                <tr>
                    <th class="text-left px-4 py-3">Proyecto</th>
                    <th class="text-left px-4 py-3">Tarea</th>
                    <th class="text-left px-4 py-3">Inicio</th>
                    <th class="text-left px-4 py-3">Fin</th>
                    <th class="text-left px-4 py-3">Duración</th>
                    <th class="text-right px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                @forelse($timeEntries as $entry)
                    <tr class="text-sm">
                        <td class="px-4 py-3 text-white">{{ $entry->project->name }}</td>
                        <td class="px-4 py-3 text-slate-400">{{ $entry->task->title ?? '-' }}</td>
                        <td class="px-4 py-3 text-slate-400">{{ $entry->started_at->format('d/m H:i') }}</td>
                        <td class="px-4 py-3 text-slate-400">{{ $entry->ended_at?->format('d/m H:i') ?? '-' }}</td>
                        <td class="px-4 py-3 text-white font-mono">{{ $entry->duration_formatted }}</td>
                        <td class="px-4 py-3 text-right">
                            <button wire:click="deleteEntry($entry)" class="text-slate-500 hover:text-red-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-slate-400">
                            No hay registros de tiempo.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($timeEntries->hasPages())
            <div class="px-4 py-3 border-t border-slate-700">
                {{ $timeEntries->links() }}
            </div>
        @endif
    </div>
</div>