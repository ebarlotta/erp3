<div>
    <!-- Header -->
    <header class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-white">Dashboard</h2>
            <p class="text-slate-400 text-sm">Gestiona tus proyectos</p>
        </div>
        <div class="flex items-center gap-4">
            <!-- Search -->
            <div class="relative">
                <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input 
                    type="text" 
                    wire:model.live="search"
                    placeholder="Buscar proyectos..." 
                    class="bg-slate-800 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-sm text-white placeholder-slate-400 focus:outline-none focus:border-blue-500 w-64"
                >
            </div>
            <!-- Filters -->
            <select 
                wire:model.live="statusFilter"
                class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-blue-500"
            >
                <option value="">Todos los estados</option>
                @foreach($statuses as $status)
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                @endforeach
            </select>
            <!-- Add Project -->
            <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo Proyecto
            </a>
        </div>
    </header>

    <!-- Stats -->
    <div class="grid grid-cols-4 gap-6 mb-8">
        <div class="bg-slate-800 rounded-xl p-5 border border-slate-700">
            <div class="text-slate-400 text-sm mb-1">Proyectos Activos</div>
            <div class="text-3xl font-bold text-white">{{ $stats['activeProjects'] }}</div>
        </div>
        <div class="bg-slate-800 rounded-xl p-5 border border-slate-700">
            <div class="text-slate-400 text-sm mb-1">Tareas Pendientes</div>
            <div class="text-3xl font-bold text-white">{{ $stats['pendingTasks'] }}</div>
        </div>
        <div class="bg-slate-800 rounded-xl p-5 border border-slate-700">
            <div class="text-slate-400 text-sm mb-1">Horas Esta Semana</div>
            <div class="text-3xl font-bold text-blue-400">{{ number_format($stats['hoursThisWeek'], 1) }}h</div>
        </div>
        <div class="bg-slate-800 rounded-xl p-5 border border-slate-700">
            <div class="text-slate-400 text-sm mb-1">Completado</div>
            <div class="text-3xl font-bold text-green-400">{{ $stats['completionRate'] }}%</div>
        </div>
    </div>

    <!-- Projects Grid -->
    <h3 class="text-lg font-semibold text-white mb-4">Tus Proyectos</h3>
    <div class="grid grid-cols-3 gap-6">
        @forelse($projects as $project)
            <a href="{{ route('projects.tasks', $project) }}" class="project-card bg-slate-800 rounded-xl p-6 border border-slate-700 cursor-pointer hover:border-slate-600">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: {{ $project->color }}20">
                            <svg class="w-5 h-5" style="color: {{ $project->color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-white">{{ $project->name }}</h4>
                            <p class="text-xs text-slate-400">{{ $project->tasks_count }} tareas</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 text-xs rounded-full font-medium {{ $this->getStatusClass($project->status) }}">
                        {{ ucfirst($project->status) }}
                    </span>
                </div>
                
                @if($project->description)
                    <p class="text-sm text-slate-400 mb-4 line-clamp-2">{{ $project->description }}</p>
                @endif
                
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-4">
                        <span class="text-slate-400">
                            <span class="{{ $this->getPriorityClass($project->priority) }}">●</span> 
                            {{ ucfirst($project->priority) }}
                        </span>
                    </div>
                    <span class="text-slate-500">{{ number_format($project->total_hours ?? 0, 1) }}h</span>
                </div>
            </a>
        @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-slate-400">No hay proyectos todavía.</p>
                <a href="{{ route('projects.create') }}" class="text-blue-400 hover:underline">Crear el primero</a>
            </div>
        @endforelse
    </div>
</div>

@php
function getStatusClass($status) {
    return match($status) {
        'active' => 'bg-green-500/20 text-green-400',
        'paused' => 'bg-yellow-500/20 text-yellow-400',
        'completed' => 'bg-slate-500/20 text-slate-400',
        'planning' => 'bg-blue-500/20 text-blue-400',
        default => 'bg-slate-500/20 text-slate-400',
    };
}

function getPriorityClass($priority) {
    return match($priority) {
        'urgent' => 'text-red-400',
        'high' => 'text-orange-400',
        'medium' => 'text-blue-400',
        'low' => 'text-slate-400',
        default => 'text-slate-400',
    };
}
@endphp