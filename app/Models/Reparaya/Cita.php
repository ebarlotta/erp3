<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    use SoftDeletes;

    protected $table = 'repa_citas';

    protected $fillable = [
        'solicitud_id', 'presupuesto_id', 'cliente_id', 'reparador_id',
        'fecha_hora', 'duracion_min', 'estado', 'notas',
    ];

    protected $casts = [
        'fecha_hora'   => 'datetime',
        'duracion_min' => 'integer',
    ];

    /* ---------- Relaciones ---------- */

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'solicitud_id');
    }

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'presupuesto_id');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function reparador()
    {
        return $this->belongsTo(User::class, 'reparador_id');
    }

    public function resena()
    {
        return $this->hasOne(Resena::class, 'cita_id');
    }

    /* ---------- Helpers ---------- */

    public function puedeResenarse(): bool
    {
        return $this->estado === 'realizada' && ! $this->resena()->exists();
    }
}