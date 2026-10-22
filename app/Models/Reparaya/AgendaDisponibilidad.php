<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgendaDisponibilidad extends Model
{
    use SoftDeletes;

    protected $table = 'repa_agenda_disponibilidad';

    protected $fillable = [
        'reparador_id', 'tipo', 'dia_semana', 'fecha',
        'hora_inicio', 'hora_fin', 'activo',
    ];

    protected $casts = [
        'fecha'      => 'date',
        'dia_semana' => 'integer',
        'activo'     => 'boolean',
    ];

    public function reparador()
    {
        return $this->belongsTo(User::class, 'reparador_id');
    }

    public function scopeActivas($query)
    {
        return $query->where('activo', true);
    }

    public function scopeRecurrentes($query)
    {
        return $query->where('tipo', 'recurrente');
    }

    public function scopePuntuales($query)
    {
        return $query->where('tipo', 'puntual');
    }
}