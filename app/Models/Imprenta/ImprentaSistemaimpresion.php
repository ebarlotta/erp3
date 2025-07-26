<?php

namespace App\Models\Imprenta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprentaSistemaimpresion extends Model
{
    /** @use HasFactory<\Database\Factories\Imprenta\ImprentaSistemaimpresionFactory> */
    use HasFactory;

    protected $fillable=[
        'sistema',
        'factor',
        'activo',
        'eliminado',
    ];
}
