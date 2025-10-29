<?php

namespace App\Models\Promociones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mediodepago extends Model
{
    /** @use HasFactory<\Database\Factories\MediodepagoFactory> */
    use HasFactory;

    protected $fillable=[
        'NombreMedio',
    ];

}
