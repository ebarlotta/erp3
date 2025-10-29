<?php

namespace App\Models\Promociones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formadepago extends Model
{
    /** @use HasFactory<\Database\Factories\FormadepagoFactory> */
    use HasFactory;

    protected $fillable=[
        'NombreForma',
    ];
}
