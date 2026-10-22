<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resena extends Model
{
    use SoftDeletes;

    protected $table = 'repa_resenas';

    protected $fillable = [
        'cita_id', 'cliente_id', 'reparador_id', 'puntuacion', 'comentario',
    ];

    protected $casts = [
        'puntuacion' => 'integer',
    ];

    /* ---------- Relaciones ---------- */

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'cita_id');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function reparador()
    {
        return $this->belongsTo(User::class, 'reparador_id');
    }
}