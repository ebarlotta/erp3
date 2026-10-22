<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model
{
    use SoftDeletes;

    protected $table = 'categorias';

    protected $fillable = [
        'nombrecategoria', 'slug', 'icono', 'activo', 'empresa_id',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'categoria_id');
    }

    public function scopeActivas($query)
    {
        return $query->where('activo', true);
    }

    public function scopeDeReparaya($query)
    {
        return $query->where('empresa_id', 1);
    }

    public function getNombreAttribute(): string
    {
        return $this->nombrecategoria;
    }
}