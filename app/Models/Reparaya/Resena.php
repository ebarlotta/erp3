<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resena extends Model
{
    use SoftDeletes;

    protected $table = 'repa_resenas';

    protected $fillable = [
        'solicitud_id', 
        'reparador_id', 
        'cliente_id', 
        'puntuacion', 
        'comentario',
    ];

    protected $casts = [
        'puntuacion' => 'integer',
    ];

    /* ---------- Relaciones ---------- */

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'solicitud_id');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function reparador()
    {
        return $this->belongsTo(User::class, 'reparador_id');
    }

    /**
     * Estrellas: "★★★★★" o "★★★★☆"
     */
    public function getEstrellasAttribute(): string
    {
        return str_repeat('★', $this->puntaje) . str_repeat('☆', 5 - $this->puntaje);
    }

    /**
     * Tiempo relativo: "Hace 2 semanas"
     */
    public function getTiempoRelativoAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }
}