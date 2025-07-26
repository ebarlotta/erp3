<?php

namespace App\Models\Imprenta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprentaLado extends Model
{
    /** @use HasFactory<\Database\Factories\Imprenta\ImprentaLadoFactory> */
    use HasFactory;

    protected $fillable=[
        'lados',
        'factor',
        'activo',
        'eliminado',
    ];
}
