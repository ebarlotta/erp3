<?php

namespace App\Models\Promociones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaProductosPromocion extends Model
{
    /** @use HasFactory<\Database\Factories\ListaProductosPromocionFactory> */
    use HasFactory;

    protected $fillable=[
        'producto_id',
        'promocion_id',
    ];
}
