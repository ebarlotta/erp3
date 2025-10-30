<?php

namespace App\Models\Promociones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeCompra extends Model
{
    /** @use HasFactory<\Database\Factories\Promociones\TipoDeCompraFactory> */
    use HasFactory;

     protected $fillable=[
        'TipoDeCompra',
    ];
}
