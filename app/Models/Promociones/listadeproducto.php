<?php

namespace App\Models\Promociones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listadeproducto extends Model
{
    /** @use HasFactory<\Database\Factories\ListadeproductoFactory> */
    use HasFactory;

    protected $fillable=[
        'NombreProducto',
        'AplicaSINO',
    ];
}
