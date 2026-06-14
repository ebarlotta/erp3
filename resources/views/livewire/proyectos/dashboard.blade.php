<div>
    <body class="text-gray-300 min-h-screen bg-slate-900">
        <!-- Overlay -->
        <div id="overlay" class="overlay" onclick="toggleMenu()"></div>

        <div class="flex">

            <x-project_header></x-project_header>
            
            <!-- Main Content -->
            <main class="flex-1 p-4 md:p-8">
                <!-- Header con botón hamburguesa para MÓVIL -->
                <header class="mobile-header flex items-center justify-between mb-6">
                    <button onclick="toggleMenu()" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="text-xl font-bold text-white">Dashboard</h1>
                    <div class="w-6"></div>
                </header>

                <!-- Header para ESCRITORIO -->
                <header class="desktop-header flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Dashboard</h2>
                        <p class="text-slate-400 text-sm">Gestiona tus proyectos</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" wire:model.live="search" placeholder="Buscar proyectos..." class="bg-slate-800 border border-slate-700 rounded-lg pl-10 pr-4 py-2 text-sm text-white placeholder-slate-400 focus:outline-none focus:border-blue-500 w-64">
                        </div>
                        <select wire:model.live="statusFilter" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-blue-500">
                            <option value="">Todos los estados</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Nuevo Proyecto
                        </a>
                        <a href="{{ route('projects.time') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Cronómetros
                        </a>
                    </div>
                </header>

                <!-- Stats -->
                <x-project-stats :stats="$stats" />

                <!-- Projects Grid -->
                <h3 class="text-base md:text-lg font-semibold text-white mb-4">Tus Proyectos</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    @forelse($projects as $project)
                        <a href="{{ route('projects.product-backlog', $project->id) }}" class="project-card bg-slate-800 rounded-xl p-4 md:p-6 border border-slate-700 cursor-pointer hover:border-slate-600">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 md:w-10 md:h-10 rounded-lg flex items-center justify-center" style="background-color: {{ $project->color }}20">
                                        <svg class="w-4 h-4 md:w-5 md:h-5" style="color: {{ $project->color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-white text-sm md:text-base">{{ $project->name }}</h4>
                                        <p class="text-xs text-slate-400">{{ $project->tasks_count }} tareas</p>
                                    </div>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full font-medium {{ $this->getStatusClass($project->status) }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </div>

                            @if($project->description)
                                <p class="text-xs md:text-sm text-slate-400 mb-4 line-clamp-2">{{ $project->description }}</p>
                            @endif

                            <div class="flex items-center justify-between text-xs md:text-sm">
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
                        <div class="col-span-full text-center py-12">
                            <p class="text-slate-400">No hay proyectos todavía.</p>
                            <a href="{{ route('projects.create') }}" class="text-blue-400 hover:underline">Crear el primero</a>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
        {{-- Acá se incrusta en el layout todo el javascript del menú hamburguesa --}}
    </body>
</div>