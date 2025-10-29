<?php

namespace App\Models\Promociones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zona extends Model
{
    /** @use HasFactory<\Database\Factories\ZonaFactory> */
    use HasFactory;

    protected $fillable=[
        'nombre',
        'direccion',
        'ubicacionGPS',
    ];
}
