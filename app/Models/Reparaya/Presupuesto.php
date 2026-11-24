<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Reparaya\Reparadores;
use App\Models\Categorias;

class Presupuesto extends Model
{
    use SoftDeletes;

    protected $table = 'repa_presupuestos';

    protected $fillable = [
        'solicitud_id', 
        'reparador_id', 
        'moneda_id', 
        'monto',
        'plazo_dias', 
        'garantia_meses', 
        'comentario', 
        'estado',   // creado, preparado, enviado, aceptado, rechazado, vencido
    ];

    protected $casts = [
        'monto'           => 'decimal:2',
        'plazo_dias'      => 'integer',
        'garantia_meses'  => 'integer',
    ];

    /* ---------- Relaciones ---------- */

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'solicitud_id');
    }

    public function reparador() {
        return $this->belongsTo(Reparadores::class, 'reparador_id');
    }

    public function moneda()
    {
        return $this->belongsTo(Moneda::class, 'moneda_id');
    }

    public function items()
    {
        return $this->hasMany(PresupuestoItem::class, 'presupuesto_id');
    }

    public function cita()
    {
        return $this->hasOne(Cita::class, 'presupuesto_id');
    }

    public function categoria()
    {
        return $this->hasOne(categoria::class, 'categoria_id');
    }

    /* ---------- Scopes ---------- */

    public function scopeEnviados($query)
    {
        return $query->where('estado', 'enviado');
    }

    public function scopeAceptados($query)
    {
        return $query->where('estado', 'aceptado');
    }

    public function scopeDelMes($query, $fecha = null)
    {
        $fecha = $fecha ?? now();
        return $query->whereBetween('created_at', [
            $fecha->copy()->startOfMonth(),
            $fecha->copy()->endOfMonth(),
        ]);
    }
}