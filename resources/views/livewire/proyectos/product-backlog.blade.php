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
            <h1 class="text-2xl font-bold text-white">Product Backlog</h1>
            <div>
            <button wire:click="create({{ $project->id }})" class="bg-blue-500 text-white px-4 py-2 rounded ">
                + Nuevo Product Backlog Item
            </button>
            <a href="{{ route('projects.index') }}">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Volver
                </button>
            </a>
            </div>
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
                            <input type="text" wire:change="updatePriority({{ $pbi->id }}, $event.target.value)" value="{{ $pbi->priority }}" class="w-20 border rounded px-2 py-1">
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
                            <button wire:click="edit({{ $pbi->id }})" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                                Editar
                            </button>
                            <button wire:click="edit_tasks({{ $pbi->id }})" class="bg-blue-300 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Tareas
                            </button>
                            <button wire:click="delete({{ $pbi->id }})" onclick="confirm('¿Eliminar este PBI?') || event.stopImmediatePropagation()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Eliminar
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
                    {{ $editingPBI ? 'Editar Product Backlog Item' : 'Nuevo Product Backlog Item' }}
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
                            <label class="block text-sm font-medium mb-1">
                                Tiempo Límite (días)
                                <span class="text-xs text-gray-500">(plazo máximo para tener listo)</span>
                            </label>
                            <input type="number" wire:model="tiempo_limite_dias" class="w-full border rounded px-3 py-2">
                            @error('tiempo_limite_dias') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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