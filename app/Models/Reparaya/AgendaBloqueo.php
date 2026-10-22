<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgendaBloqueo extends Model
{
    use SoftDeletes;

    protected $table = 'repa_agenda_bloqueos';

    protected $fillable = [
        'reparador_id', 'fecha_inicio', 'fecha_fin', 'motivo',
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin'    => 'datetime',
    ];

    public function reparador()
    {
        return $this->belongsTo(User::class, 'reparador_id');
    }

    public function scopeVigentes($query)
    {
        return $query->where('fecha_fin', '>=', now());
    }
}