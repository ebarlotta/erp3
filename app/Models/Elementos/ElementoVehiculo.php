<?php

namespace App\Models\Elementos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoVehiculo extends Model
{
    /** @use HasFactory<\Database\Factories\Elementos\ElementoVehiculoFactory> */
    use HasFactory;

     protected $fillable=[
        'patente',
        'modelo',
        'marca',
        'ano',
        'elemento_id',
    ]; 
}

            

