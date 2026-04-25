<div class="bg-slate-800 rounded-lg p-4 focus-glow">
    <div class="flex items-center justify-between mb-3">
        <span class="text-xs text-slate-400 uppercase tracking-wider">Focus Mode</span>
        @if($activeTimer)
            <span class="w-2 h-2 bg-green-400 rounded-full timer-active"></span>
        @endif
    </div>

    @if($focusProject)
        <div class="flex items-center justify-between">
            <div>
                <div class="text-sm font-medium text-white">{{ $focusProject->name }}</div>
                <div class="text-xs text-slate-400">
                    @if($activeTimer)
                        <span class="text-green-400 timer-active">{{ $activeTimer->duration_formatted }}</span>
                    @else
                        Sin timer activo
                    @endif
                </div>
            </div>
            
            @if($activeTimer)
                <button 
                    wire:click="stopTimer"
                    class="p-2 bg-red-500/20 hover:bg-red-500/30 rounded-lg text-red-400 transition-colors"
                    title="Detener timer"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <rect x="6" y="6" width="8" height="8"/>
                    </svg>
                </button>
            @else
                <button 
                    wire:click="startTimer"
                    class="p-2 bg-green-500/20 hover:bg-green-500/30 rounded-lg text-green-400 transition-colors"
                    title="Iniciar timer"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                    </svg>
                </button>
            @endif
        </div>
    @else
        <div class="text-sm text-slate-400">
            No hay proyecto en foco. Selecciona uno del dashboard.
        </div>
    @endif
</div>