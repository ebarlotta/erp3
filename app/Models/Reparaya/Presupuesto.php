<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presupuesto extends Model
{
    use SoftDeletes;

    protected $table = 'repa_presupuestos';

    protected $fillable = [
        'solicitud_id', 'reparador_id', 'moneda_id', 'monto',
        'plazo_dias', 'garantia_meses', 'comentario', 'estado',
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

    public function reparador()
    {
        return $this->belongsTo(User::class, 'reparador_id');
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

    /* ---------- Scopes ---------- */

    public function scopeEnviados($query)
    {
        return $query->where('estado', 'enviado');
    }

    public function scopeAceptados($query)
    {
        return $query->where('estado', 'aceptado');
    }
}