<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Agenda Reparador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
   <!-- Referencia a la hoja de estilos externa -->
   <link rel="stylesheet" href="css/reparaya.css">
</head>
<body class="bg-gray-100 min-h-screen">

    <header class="bg-repair text-white px-4 py-3 flex items-center justify-between sticky top-0 z-10">
        <h1 class="font-bold text-lg">ReparaYa · Agenda</h1>
        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center text-sm font-bold">R</div>
    </header>

    <main class="p-4 max-w-4xl mx-auto space-y-4">

        <!-- Filtros rápidos -->
        <div class="bg-white rounded-xl p-3 shadow-sm flex gap-2 overflow-x-auto">
            <button class="px-3 py-1 bg-[color:var(--repair-primary)] text-white rounded-full text-sm whitespace-nowrap">Todos</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm whitespace-nowrap">Visitas</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm whitespace-nowrap">Presupuestos</button>
            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm whitespace-nowrap">Trabajos</button>
        </div>

        <!-- Calendario -->
        <div class="bg-white rounded-xl shadow-sm p-3">
            <div id="calendar"></div>
        </div>

        <!-- Leyenda -->
        <div class="bg-white rounded-xl shadow-sm p-3 flex flex-wrap gap-3 text-xs text-gray-600">
            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full" style="background:#008C45"></span> Visita confirmada</span>
            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full" style="background:#FFD20A"></span> Presupuesto pendiente</span>
            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full" style="background:#EC1B24"></span> Urgente</span>
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',      // vista mes; podés cambiar a 'timeGridWeek' o 'timeGridDay'
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: { today: 'Hoy', month: 'Mes', week: 'Semana', day: 'Día' },
                height: 'auto',
                editable: true,           // permite arrastrar eventos
                selectable: true,
                events: [
                    { title: 'Visita - Pérdida cocina', start: '2026-10-20T09:00:00', end: '2026-10-20T11:00:00', color: '#008C45' },
                    { title: 'Presupuesto - Luminaria', start: '2026-10-21', color: '#FFD20A', textColor: '#000' },
                    { title: 'Urgente - Destapación', start: '2026-10-22T14:00:00', color: '#EC1B24' },
                    { title: 'Trabajo - Pintura living', start: '2026-10-25', end: '2026-10-27', color: '#008C45' }
                ],
                dateClick: function (info) {
                    alert('Fecha seleccionada: ' + info.dateStr);
                    // Acá podés abrir un modal para crear evento
                },
                eventClick: function (info) {
                    alert('Evento: ' + info.event.title);
                    // Acá podés abrir detalle del evento
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>