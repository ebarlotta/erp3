<div>
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
                Tiempo joya
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
                Projectos
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
</div>