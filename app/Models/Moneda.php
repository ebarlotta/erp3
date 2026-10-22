<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Moneda extends Model
{
    use SoftDeletes;

    protected $table = 'monedas';

    protected $fillable = ['codigo', 'nombre', 'simbolo', 'es_principal', 'activo'];

    protected $casts = [
        'es_principal' => 'boolean',
        'activo'       => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Moneda $moneda) {
            if ($moneda->es_principal) {
                // Desmarcar cualquier otra principal
                static::where('id', '!=', $moneda->id)
                    ->where('es_principal', true)
                    ->update(['es_principal' => false]);
            }
        });
    }

    public static function principal(): ?self
    {
        return static::where('es_principal', true)->where('activo', true)->first();
    }
}