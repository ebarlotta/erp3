<?php

namespace App\Models\Imprenta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprentaPapel extends Model
{
    /** @use HasFactory<\Database\Factories\Imprenta\ImprentaPapelFactory> */
    use HasFactory;

    protected $fillable=[
        'gramaje',
        'tamano_papel',
        'precio',
        'activo',
        'eliminado',
    ];
}
