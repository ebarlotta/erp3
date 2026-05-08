<div>
    <body class="text-gray-300 min-h-screen">
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
                {{-- <a href="{{ route('projects.tasks', $project) }}" class="project-card bg-slate-800 rounded-xl p-6 border border-slate-700 cursor-pointer hover:border-slate-600"> --}}
                <a href="{{ route('projects.product-backlog', $project->id) }}" class="project-card bg-slate-800 rounded-xl p-6 border border-slate-700 cursor-pointer hover:border-slate-600">
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
    </body>
</div>
