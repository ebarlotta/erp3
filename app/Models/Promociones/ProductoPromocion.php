<?php

namespace App\Models\Promociones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPromocion extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;

    protected $fillable=[
        'NombreProducto',
        'AplicaSINO',
    ];
}
