<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReparaYa - Dashboard Reparador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
   <!-- Referencia a la hoja de estilos externa -->
   <link rel="stylesheet" href="css/reparaya.css">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-repair text-white px-4 py-3 flex items-center justify-between sticky top-0 z-10">
        <h1 class="font-bold text-lg">ReparaYa · Reparador</h1>
        <div class="flex items-center gap-3">
            <a href="reparador-calendario.html" class="text-sm bg-white/20 px-2 py-1 rounded-lg">📅 Agenda</a>
            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center text-sm font-bold">R</div>
        </div>
    </header>

    <main class="p-4 max-w-5xl mx-auto space-y-4 pb-10">

        <!-- KPIs -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            <div class="bg-white rounded-xl p-3 shadow-sm">
                <p class="text-xs text-gray-500">Ingresos del mes</p>
                <p class="text-xl font-bold text-repair">$185.000</p>
                <p class="text-xs text-green-600">▲ 12% vs mes anterior</p>
            </div>
            <div class="bg-white rounded-xl p-3 shadow-sm">
                <p class="text-xs text-gray-500">Presupuestos aceptados</p>
                <p class="text-xl font-bold text-repair">68%</p>
                <p class="text-xs text-gray-500">17 de 25 enviados</p>
            </div>
            <div class="bg-white rounded-xl p-3 shadow-sm">
                <p class="text-xs text-gray-500">Calificación</p>
                <p class="text-xl font-bold text-repair">4.7 ★</p>
                <p class="text-xs text-gray-500">48 reseñas</p>
            </div>
            <div class="bg-white rounded-xl p-3 shadow-sm">
                <p class="text-xs text-gray-500">Trabajos activos</p>
                <p class="text-xl font-bold text-repair">5</p>
                <p class="text-xs text-gray-500">2 esta semana</p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
         <!-- Gráfico A: Ingresos mensuales -->
         <div class="bg-white rounded-xl shadow-sm p-4">
               <h2 class="font-semibold text-gray-700 mb-2">A · Ingresos mensuales (últimos 6 meses)</h2>
               <div class="h-64"><canvas id="chartIngresos"></canvas></div>
         </div>

         <!-- Gráfico B: Presupuestos enviados vs aceptados -->
         <div class="bg-white rounded-xl shadow-sm p-4">
               <h2 class="font-semibold text-gray-700 mb-2">B · Presupuestos enviados vs aceptados</h2>
               <div class="h-64"><canvas id="chartPresupuestos"></canvas></div>
         </div>

         <!-- Gráfico E: Calificación promedio y evolución -->
         <div class="bg-white rounded-xl shadow-sm p-4">
               <h2 class="font-semibold text-gray-700 mb-2">E · Calificación promedio y evolución de reseñas</h2>
               <div class="h-64"><canvas id="chartCalificacion"></canvas></div>
         </div>

         <!-- Gráfico F: Solicitudes por zona -->
         <div class="bg-white rounded-xl shadow-sm p-4">
               <h2 class="font-semibold text-gray-700 mb-2">F · Solicitudes por zona/barrio</h2>
               <div class="h-64"><canvas id="chartZonas"></canvas></div>
         </div>
      </div>

    </main>

    <script>
        const REPAIR = '#008C45';
        const REPAIR_DARK = '#006633';
        const WARN = '#FFD20A';
        const GRAY = '#9CA3AF';

        // Datos de ejemplo (luego vendrán de Laravel vía json)
        const datos = {
            meses: ['May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct'],
            ingresos: [120000, 145000, 130000, 165000, 170000, 185000],
            enviados: [18, 22, 20, 25, 24, 25],
            aceptados: [12, 14, 13, 16, 17, 17],
            califPromedio: [4.2, 4.3, 4.4, 4.5, 4.6, 4.7],
            resenasMes: [3, 5, 4, 6, 5, 7],
            zonas: ['Belgrano', 'Palermo', 'Núñez', 'Colegiales', 'V. López', 'Otros'],
            solicitudesZona: [12, 9, 7, 5, 4, 3]
        };

        // A · Ingresos mensuales (línea + área)
        new Chart(document.getElementById('chartIngresos'), {
            type: 'line',
            data: {
                labels: datos.meses,
                datasets: [{
                    label: 'Ingresos ($)',
                    data: datos.ingresos,
                    borderColor: REPAIR,
                    backgroundColor: 'rgba(0,140,69,0.15)',
                    fill: true,
                    tension: 0.35,
                    pointBackgroundColor: REPAIR,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { callback: v => '$' + (v/1000) + 'k' }
                    }
                }
            }
        });

        // B · Presupuestos enviados vs aceptados (barras agrupadas)
        new Chart(document.getElementById('chartPresupuestos'), {
            type: 'bar',
            data: {
                labels: datos.meses,
                datasets: [
                    {
                        label: 'Enviados',
                        data: datos.enviados,
                        backgroundColor: 'rgba(156,163,175,0.6)',
                        borderColor: GRAY,
                        borderWidth: 1,
                        borderRadius: 6
                    },
                    {
                        label: 'Aceptados',
                        data: datos.aceptados,
                        backgroundColor: 'rgba(0,140,69,0.7)',
                        borderColor: REPAIR,
                        borderWidth: 1,
                        borderRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });

        // E · Calificación promedio + volumen de reseñas (línea + barras)
        new Chart(document.getElementById('chartCalificacion'), {
            data: {
                labels: datos.meses,
                datasets: [
                    {
                        type: 'bar',
                        label: 'Reseñas del mes',
                        data: datos.resenasMes,
                        backgroundColor: 'rgba(255,210,10,0.6)',
                        borderColor: WARN,
                        borderWidth: 1,
                        borderRadius: 6,
                        yAxisID: 'y1',
                        order: 2
                    },
                    {
                        type: 'line',
                        label: 'Calificación promedio',
                        data: datos.califPromedio,
                        borderColor: REPAIR,
                        backgroundColor: REPAIR,
                        tension: 0.35,
                        pointRadius: 4,
                        yAxisID: 'y',
                        order: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        position: 'left',
                        min: 3.5,
                        max: 5,
                        ticks: { stepSize: 0.5 },
                        title: { display: true, text: '★ Promedio' }
                    },
                    y1: {
                        position: 'right',
                        beginAtZero: true,
                        grid: { drawOnChartArea: false },
                        title: { display: true, text: 'Reseñas' }
                    }
                }
            }
        });

        // F · Solicitudes por zona (barras horizontales)
        new Chart(document.getElementById('chartZonas'), {
            type: 'bar',
            data: {
                labels: datos.zonas,
                datasets: [{
                    label: 'Solicitudes',
                    data: datos.solicitudesZona,
                    backgroundColor: 'rgba(0,140,69,0.7)',
                    borderColor: REPAIR,
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { x: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });
    </script>
</body>
</html><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/reparaya/reparador-dashboard.blade.php ENDPATH**/ ?>