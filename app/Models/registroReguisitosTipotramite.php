<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registroReguisitosTipotramite extends Model
{
    /** @use HasFactory<\Database\Factories\RegistroReguisitosTipotramiteFactory> */
    use HasFactory;

    protected $fillable=[
        'descripcionrequisitotipotramite',
        'precio',
        'cantidad',
        'tipotramite_id',
    ];
}
