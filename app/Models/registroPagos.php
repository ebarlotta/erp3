<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registroPagos extends Model
{
    /** @use HasFactory<\Database\Factories\RegistroPagosFactory> */
    use HasFactory;

    protected $fillable = [
        'collectionId' ,
        'collectionStatus',
        'paymentId',
        'status',
        'externalReference',
        'preferenceId',
        'total'
        ];
}
