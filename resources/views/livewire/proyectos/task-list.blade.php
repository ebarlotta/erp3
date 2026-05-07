<div>

<div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-64 bg-slate-900 border-r border-slate-800 flex flex-col">
                <div class="p-6 border-b border-slate-800">
                    <h1 class="text-xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Projects
                    </h1>
                </div>

                <nav class="flex-1 p-4 space-y-1">
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white active">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white hover:bg-slate-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Tiempo
                    </a>
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white hover:bg-slate-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                        Tareas
                    </a>
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white hover:bg-slate-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        Reportes
                    </a>
                </nav>

                <!-- Focus Mode Widget (mini) -->
                <div class="p-4 border-t border-slate-800">
                    <div class="bg-slate-800 rounded-lg p-4 focus-glow">
                        <div class="text-xs text-slate-400 mb-2">FOCUS MODE</div>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-sm font-medium text-white">API Users</div>
                                <div class="text-xs text-green-400 timer-active flex items-center gap-1">
                                    <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                                    01:23:45
                                </div>
                            </div>
                            <button class="p-2 bg-red-500/20 hover:bg-red-500/30 rounded-lg text-red-400">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <rect x="6" y="6" width="12" height="12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </aside>
        <!-- Main Content -->
        <main class="flex-1 p-8">
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
                        <input type="text" wire:model.live="search" placeholder="Buscar proyectos..."  class="bg-slate-800 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-sm text-white placeholder-slate-400 focus:outline-none focus:border-blue-500 w-64">
                    </div>
                    <!-- Filters -->
                    <select wire:model.live="statusFilter" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-blue-500">
                        <option value="">Todos los estados</option>
                        {{-- @foreach($statuses as $status) --}}
                            {{-- <option value="{{ $status }}">{{ ucfirst($status) }}</option> --}}
                        {{-- @endforeach --}}
                    </select>
                    <!-- Add Project -->
                    <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Nuevo Proyecto
                    </a>
                    <a href="{{ route('projects.time') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Cronómetros
                    </a>

                </div>
            </header>

        <!-- Stats -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-slate-800 rounded-xl p-5 border border-slate-700">
                <div class="text-slate-400 text-sm mb-1">Proyectos Activos</div>
                {{-- <div class="text-3xl font-bold text-white">{{ $stats['activeProjects'] }}</div> --}}
            </div>
            <div class="bg-slate-800 rounded-xl p-5 border border-slate-700">
                <div class="text-slate-400 text-sm mb-1">Tareas Pendientes</div>
                {{-- <div class="text-3xl font-bold text-white">{{ $stats['pendingTasks'] }}</div> --}}
            </div>
            <div class="bg-slate-800 rounded-xl p-5 border border-slate-700">
                <div class="text-slate-400 text-sm mb-1">Horas Esta Semana</div>
                {{-- <div class="text-3xl font-bold text-blue-400">{{ number_format($stats['hoursThisWeek'], 1) }}h</div> --}}
            </div>
            <div class="bg-slate-800 rounded-xl p-5 border border-slate-700">
                <div class="text-slate-400 text-sm mb-1">Completado</div>
                {{-- <div class="text-3xl font-bold text-green-400">{{ $stats['completionRate'] }}%</div> --}}
            </div>
        </div>
    <div class="container mx-auto p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Tasks List</h1>
            <div>
            <select wire:model.live="filterStatus" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white">
                <option value="">Todas</option>
                @foreach($statuses as $status)
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                @endforeach
            </select>
            <a href="{{ route('projects.product-backlog', $project_id) }}">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Volver
                </button>
                </a>
            </div>
        </div>
    </div>

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

                {{-- Status --}}
                <div class="flex-1">
                    <span class="{{ $task->status === 'completed' ? 'text-slate-500 line-through' : 'text-white' }}">
                        {{ $task->status }}
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
