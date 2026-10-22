<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Reparaya\Categorias;

class Solicitud extends Model
{
    use SoftDeletes;

    protected $table = 'repa_solicitudes';

    protected $fillable = [
        'cliente_id', 'categoria_id', 'titulo', 'descripcion',
        'direccion', 'localidad', 'latitud', 'longitud',
        'urgencia', 'presupuesto_estimado', 'estado',
    ];

    protected $casts = [
        'latitud'              => 'decimal:7',
        'longitud'             => 'decimal:7',
        'presupuesto_estimado' => 'decimal:2',
    ];

    /* ---------- Relaciones ---------- */

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    public function fotos()
    {
        return $this->hasMany(SolicitudFoto::class, 'solicitud_id');
    }

    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class, 'solicitud_id');
    }

    public function cita()
    {
        return $this->hasOne(Cita::class, 'solicitud_id');
    }

    /* ---------- Scopes ---------- */

    public function scopeAbiertas($query)
    {
        return $query->where('estado', 'abierta');
    }

    public function scopeDisponiblesPara($query, int $reparadorId)
    {
        return $query->whereIn('estado', ['abierta', 'con_presupuestos'])
            ->whereDoesntHave('presupuestos', function ($q) use ($reparadorId) {
                $q->where('reparador_id', $reparadorId);
            });
    }
}