<div class="calendar-container">
    <!-- Controles de navegación -->
    <div class="calendar-header flex text-center">
        <button wire:click="cambiarMes(-1)" class="calendar-nav-btn">&lt;</button>
        <h3 class="calendar-title">{{ $nombreMes }} {{ $anio }}</h3>
        <button wire:click="cambiarMes(1)" class="calendar-nav-btn">&gt;</button>
    </div>

    <!-- Días de la semana -->
    <div style="grid-template-columns: repeat(7, 1fr);display: grid;">
        @foreach(['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'] as $dia)
            <div class="week-day  normal-day">{{ $dia }}</div>
        @endforeach

    <!-- Grid de días -->
        @foreach($diasCalendario as $index => $dia)
            <div
                wire:click="seleccionarDia({{ $dia['numero'] }})"
                class="hover:bg-gray-200 calendar-day normal-day {{ 
                    !$dia['esMesActual'] ? 'other-month' : 
                    ($diaSeleccionado == $dia['numero'] ? 'selected bg-gray-400' : 
                    ($dia['esHoy'] ? 'today' : 'normal-day')) 
                }}">
                {{ $dia['numero'] }}
            </div>
        @endforeach
    </div>
</div>