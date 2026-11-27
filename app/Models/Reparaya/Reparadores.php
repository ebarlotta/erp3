<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Reparadores extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'actor_reparador';

    protected $fillable = [
        'user_id',
        'actor_id',
        'apellido',
        'nombre',
        'iniciales',
        'especialidad',
        'matricula',
        'zona',
        'ciudad',
        'experiencia_anios',
        'verificado',
        'activo',
        'sobre_mi',
        'foto_perfil',
        'calificacion_promedio',
        'total_resenas',
        'total_trabajos',
        'porcentaje_recomendacion',
        'tiempo_respuesta_promedio', // en minutos
    ];

    protected $casts = [
        'verificado'                => 'boolean',
        'activo'                    => 'boolean',
        'experiencia_anios'         => 'integer',
        'calificacion_promedio'     => 'decimal:2',
        'total_resenas'             => 'integer',
        'total_trabajos'            => 'integer',
        'porcentaje_recomendacion'  => 'decimal:2',
        'tiempo_respuesta_promedio' => 'integer',
    ];

    protected $appends = ['nombre_completo'];

    /* ============================================================
       RELACIONES
       ============================================================ */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function especialidades()
    {
        $a = $this->hasMany(ReparadorEspecialidad::class, 'id');
        // $a->pluck('nombre')->toArray();
        //dd($a);
        return $a;
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class, 'reparador_id');
    }

    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class);
    }

    public function solicitudesAsignadas()
    {
        return $this->hasMany(Presupuesto::class, 'reparador_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    /* ============================================================
       ACCESSORS
       ============================================================ */

    public function getNombreCompletoAttribute(): string
    {
        return trim("{$this->nombre} {$this->apellido}");
    }

    /**
     * Iniciales para mostrar en el avatar (ej: CM para Carlos Méndez)
     */
    public function getInicialesAttribute($value): string
    {
        if ($value) {
            return $value;
        }
        return strtoupper(substr($this->nombre, 0, 1) . substr($this->apellido, 0, 1));
    }

    /**
     * Tiempo de respuesta formateado (ej: "1h")
     */
    public function getTiempoRespuestaFormateadoAttribute(): string
    {
        $min = $this->tiempo_respuesta_promedio ?? 0;
        if ($min < 60) {
            return "{$min}m";
        }
        return round($min / 60) . 'h';
    }

    /* ============================================================
       SCOPES
       ============================================================ */

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function scopeVerificados($query)
    {
        return $query->where('verificado', true);
    }

    public function scopePorEspecialidad($query, string $especialidad)
    {
        return $query->where('especialidad', $especialidad);
    }

    /* ============================================================
       PROCEDIMIENTOS / CONSULTAS
       ============================================================ */

    /**
     * KPIs del dashboard del reparador.
     * Retorna: ingresos_mes, presupuestos_aceptados (%), calificacion, trabajos_activos
     */
    public function kpisDashboard(): array
    {
        $inicioMes = now()->startOfMonth();
        $finMes    = now()->endOfMonth();
        $inicioMesAnterior = now()->subMonthNoOverflow()->startOfMonth();

        // Ingresos del mes actual
        $ingresosMes = $this->pagos()
            ->whereBetween('fecha_pago', [$inicioMes, $finMes])
            ->where('estado', 'pagado')
            ->sum('monto');

        // Ingresos del mes anterior (para % variación)
        $ingresosMesAnterior = $this->pagos()
            ->whereBetween('fecha_pago', [$inicioMesAnterior, $inicioMesAnterior->copy()->endOfMonth()])
            ->where('estado', 'pagado')
            ->sum('monto');

        $variacion = $ingresosMesAnterior > 0
            ? round((($ingresosMes - $ingresosMesAnterior) / $ingresosMesAnterior) * 100, 1)
            : 0;

        // Presupuestos enviados / aceptados del mes
        $enviadosMes = $this->presupuestos()
            ->whereBetween('created_at', [$inicioMes, $finMes])
            ->count();

        $aceptadosMes = $this->presupuestos()
            ->whereBetween('created_at', [$inicioMes, $finMes])
            ->where('estado', 'aceptado')
            ->count();

        $porcentajeAceptados = $enviadosMes > 0
            ? round(($aceptadosMes / $enviadosMes) * 100, 0)
            : 0;

        // Trabajos activos
        $trabajosActivos = $this->solicitudesAsignadas()
            ->whereIn('estado', ['asignada', 'en_proceso'])
            ->count();

        return [
            'ingresos_mes'            => (float) $ingresosMes,
            'variacion_ingresos'      => $variacion,
            'presupuestos_enviados'   => $enviadosMes,
            'presupuestos_aceptados'  => $aceptadosMes,
            'porcentaje_aceptados'    => $porcentajeAceptados,
            'calificacion'            => (float) $this->calificacion_promedio,
            'total_resenas'           => $this->total_resenas,
            'trabajos_activos'        => $trabajosActivos,
            'trabajos_semana'         => $this->solicitudesAsignadas()
                ->whereIn('estado', ['asignada', 'en_proceso'])
                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->count(),
        ];
    }

    /**
     * Datos para el gráfico A: Ingresos mensuales (últimos 6 meses)
     */
    public function ingresosUltimosMeses(int $meses = 6): array
    {
        $desde = now()->subMonths($meses - 1)->startOfMonth();

        $rows = $this->pagos()
            ->select(
                DB::raw("DATE_FORMAT(fecha_pago, '%Y-%m') as periodo"),
                DB::raw('SUM(monto) as total')
            )
            ->where('estado', 'pagado')
            ->where('fecha_pago', '>=', $desde)
            ->groupBy('periodo')
            ->orderBy('periodo')
            ->get()
            ->keyBy('periodo');

        $meses_nombres = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        $labels = [];
        $data   = [];

        for ($i = 0; $i < $meses; $i++) {
            $fecha = now()->subMonths($meses - 1 - $i);
            $key   = $fecha->format('Y-m');
            $labels[] = $meses_nombres[(int) $fecha->format('n') - 1];
            $data[]   = (float) ($rows[$key]->total ?? 0);
        }

        return ['labels' => $labels, 'data' => $data];
    }

    /**
     * Datos para el gráfico B: Presupuestos enviados vs aceptados
     */
    public function presupuestosUltimosMeses(int $meses = 6): array
    {
        $desde = now()->subMonths($meses - 1)->startOfMonth();

        $rows = $this->presupuestos()
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periodo"),
                DB::raw('COUNT(*) as enviados'),
                DB::raw("SUM(CASE WHEN estado = 'aceptado' THEN 1 ELSE 0 END) as aceptados")
            )
            ->where('created_at', '>=', $desde)
            ->groupBy('periodo')
            ->orderBy('periodo')
            ->get()
            ->keyBy('periodo');

        $meses_nombres = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        $labels = $enviados = $aceptados = [];

        for ($i = 0; $i < $meses; $i++) {
            $fecha = now()->subMonths($meses - 1 - $i);
            $key   = $fecha->format('Y-m');
            $labels[]    = $meses_nombres[(int) $fecha->format('n') - 1];
            $enviados[]  = (int) ($rows[$key]->enviados ?? 0);
            $aceptados[] = (int) ($rows[$key]->aceptados ?? 0);
        }

        return ['labels' => $labels, 'enviados' => $enviados, 'aceptados' => $aceptados];
    }

    /**
     * Datos para el gráfico E: Calificación promedio y evolución de reseñas
     */
    public function calificacionUltimosMeses(int $meses = 6): array
    {
        $desde = now()->subMonths($meses - 1)->startOfMonth();

        $rows = $this->resenas()
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periodo"),
                DB::raw('AVG(puntuacion) as promedio'),
                DB::raw('COUNT(*) as total')
            )
            ->where('created_at', '>=', $desde)
            ->groupBy('periodo')
            ->orderBy('periodo')
            ->get()
            ->keyBy('periodo');

        $meses_nombres = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        $labels = $promedios = $totales = [];


        for ($i = 0; $i < $meses; $i++) {
            $fecha = now()->subMonths($meses - 1 - $i);
            $key   = $fecha->format('Y-m');
            
            $labels[]    = $meses_nombres[(int) $fecha->format('n') - 1];
            $promedios[] = isset($rows[$key]) ? round((float) $rows[$key]->promedio, 1) : null;
            $totales[]   = (int) ($rows[$key]->total ?? 0);
        }

        return ['labels' => $labels, 'promedios' => $promedios, 'totales' => $totales];
    }

    /**
     * Datos para el gráfico F: Solicitudes por zona/barrio
     */
    public function solicitudesPorZona(int $limite = 6): array
    {
        $rows = $this->solicitudesAsignadas()
            ->select('zona', DB::raw('COUNT(*) as total'))
            ->whereNotNull('zona')
            ->groupBy('zona')
            ->orderByDesc('total')
            ->limit($limite)
            ->get();

        $zonas = $rows->pluck('zona')->toArray();
        $totales = $rows->pluck('total')->toArray();

        // Agrupar el resto como "Otros"
        $totalResto = $this->solicitudesAsignadas()
            ->whereNotNull('zona')
            ->whereNotIn('zona', $zonas)
            ->count();

        if ($totalResto > 0) {
            $zonas[]   = 'Otros';
            $totales[] = $totalResto;
        }

        return ['labels' => $zonas, 'data' => $totales];
    }

    /**
     * Paquete completo de datos para el dashboard (todos los gráficos).
     */
    public function datosDashboard(): array
    {
        return [
            'kpis'            => $this->kpisDashboard(),
            'ingresos'        => $this->ingresosUltimosMeses(),
            'presupuestos'    => $this->presupuestosUltimosMeses(),
            'calificacion'    => $this->calificacionUltimosMeses(),
            'zonas'           => $this->solicitudesPorZona(),
        ];
    }

    /**
     * Solicitudes disponibles para este reparador (según su especialidad).
     */
    public function solicitudesDisponibles()
    {   
        return Solicitud::disponibles()
            ->where('especialidad', $this->especialidad)
            ->where('reparador_id', null)
            ->orderByDesc('created_at');
    }

    public function getEstrellasTextoAttribute() {
        $llenas = (int) round($this->calificacion_promedio ?? 0);
        $llenas = max(0, min(5, $llenas)); // Asegura que esté entre 0 y 5
        $vacias = 5 - $llenas;
        
        $estrellas = str_repeat('★', $llenas) . str_repeat('☆', $vacias);
        $textoResenas = $this->total_resenas == 1 ? '1 reseña' : "{$this->total_resenas} reseñas";
        return "{$estrellas} ({$textoResenas})";
    }
}