<div>
    <style>
        /* Transición suave para el menú lateral */
        .sidebar-mobile {
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100%;
            z-index: 40;
        }
        .sidebar-mobile.open {
            transform: translateX(0);
        }
        /* Overlay oscuro cuando el menú está abierto */
        .overlay {
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
            pointer-events: none;
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 35;
        }
        .overlay.active {
            opacity: 1;
            pointer-events: auto;
        }
        /* Sidebar normal para escritorio */
        @media (min-width: 768px) {
            .sidebar-desktop {
                display: block !important;
            }
            .sidebar-mobile {
                display: none !important;
            }
            .mobile-header {
                display: none !important;
            }
        }
        @media (max-width: 767px) {
            .sidebar-desktop {
                display: none !important;
            }
            .desktop-header {
                display: none !important;
            }
        }
    </style>

    <body class="text-gray-300 min-h-screen bg-slate-900">
        <!-- Overlay -->
        <div id="overlay" class="overlay" onclick="toggleMenu()"></div>

        <div class="flex">

            <!-- Sidebar para MÓVIL (menú hamburguesa) -->
            <aside id="sidebarMobile" class="sidebar-mobile bg-slate-900 border-r border-slate-800 flex flex-col">
                <div class="p-6 border-b border-slate-800 flex justify-between items-center">
                    <h1 class="text-xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Projects
                    </h1>
                    <button onclick="toggleMenu()" class="text-slate-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <nav class="flex-1 p-4 space-y-1">
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-white bg-slate-800">
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
                    <div class="bg-slate-800 rounded-lg p-4">
                        <div class="text-xs text-slate-400 mb-2">FOCUS MODE</div>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-sm font-medium text-white">API Users</div>
                                <div id="mobileTimer" class="text-xs text-green-400 flex items-center gap-1">
                                    <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                                    01:23:45
                                </div>
                            </div>
                            <button id="mobileStopBtn" class="p-2 bg-red-500/20 hover:bg-red-500/30 rounded-lg text-red-400">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <rect x="6" y="6" width="12" height="12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Sidebar para ESCRITORIO (normal) -->
            <aside class="sidebar-desktop w-64 bg-slate-900 border-r border-slate-800 flex flex-col min-h-screen">
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

                <div class="p-4 border-t border-slate-800">
                    <div class="bg-slate-800 rounded-lg p-4">
                        <div class="text-xs text-slate-400 mb-2">FOCUS MODE</div>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-sm font-medium text-white">API Users</div>
                                <div id="desktopTimer" class="text-xs text-green-400 flex items-center gap-1">
                                    <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                                    01:23:45
                                </div>
                            </div>
                            <button id="desktopStopBtn" class="p-2 bg-red-500/20 hover:bg-red-500/30 rounded-lg text-red-400">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <rect x="6" y="6" width="12" height="12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </aside>
            
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
                {{-- <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
                    <div class="bg-slate-800 rounded-xl p-4 md:p-5 border border-slate-700">
                        <div class="text-slate-400 text-xs md:text-sm mb-1">Proyectos Activos</div>
                        <div class="text-2xl md:text-3xl font-bold text-white">{{ $stats['activeProjects'] }}</div>
                    </div>
                    <div class="bg-slate-800 rounded-xl p-4 md:p-5 border border-slate-700">
                        <div class="text-slate-400 text-xs md:text-sm mb-1">Tareas Pendientes</div>
                        <div class="text-2xl md:text-3xl font-bold text-white">{{ $stats['pendingTasks'] }}</div>
                    </div>
                    <div class="bg-slate-800 rounded-xl p-4 md:p-5 border border-slate-700">
                        <div class="text-slate-400 text-xs md:text-sm mb-1">Horas Esta Semana</div>
                        <div class="text-2xl md:text-3xl font-bold text-blue-400">{{ number_format($stats['hoursThisWeek'], 1) }}h</div>
                    </div>
                    <div class="bg-slate-800 rounded-xl p-4 md:p-5 border border-slate-700">
                        <div class="text-slate-400 text-xs md:text-sm mb-1">Completado</div>
                        <div class="text-2xl md:text-3xl font-bold text-green-400">{{ $stats['completionRate'] }}%</div>
                    </div>
                </div> --}}

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
        <script>
            // Menú hamburguesa
            function toggleMenu() {
                const sidebar = document.getElementById('sidebarMobile');
                const overlay = document.getElementById('overlay');
                if (sidebar) sidebar.classList.toggle('open');
                if (overlay) overlay.classList.toggle('active');
            }

            // Cerrar menú al hacer clic en un enlace (móvil)
            document.querySelectorAll('#sidebarMobile a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 768) {
                        toggleMenu();
                    }
                });
            });

            // Temporizador Focus Mode (sincronizado entre ambos)
            let timerInterval = null;
            let timerSeconds = 0;

            function updateAllTimers() {
                const hours = Math.floor(timerSeconds / 3600);
                const minutes = Math.floor((timerSeconds % 3600) / 60);
                const seconds = timerSeconds % 60;
                const display = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                
                const mobileTimer = document.getElementById('mobileTimer');
                const desktopTimer = document.getElementById('desktopTimer');
                if (mobileTimer) mobileTimer.innerText = display;
                if (desktopTimer) desktopTimer.innerText = display;
            }

            function startTimer() {
                if (timerInterval) return;
                timerInterval = setInterval(() => {
                    timerSeconds++;
                    updateAllTimers();
                }, 1000);
            }

            function stopTimer() {
                if (timerInterval) {
                    clearInterval(timerInterval);
                    timerInterval = null;
                }
            }

            function resetTimer() {
                stopTimer();
                timerSeconds = 0;
                updateAllTimers();
            }

            // Botones de parar (ambos)
            const mobileStopBtn = document.getElementById('mobileStopBtn');
            const desktopStopBtn = document.getElementById('desktopStopBtn');
            
            if (mobileStopBtn) {
                mobileStopBtn.addEventListener('click', stopTimer);
            }
            if (desktopStopBtn) {
                desktopStopBtn.addEventListener('click', stopTimer);
            }

            // Inicializar
            updateAllTimers();
        </script>
    </body>
</div>