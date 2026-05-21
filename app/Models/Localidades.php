<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidades extends Model
{
    use HasFactory;

    protected $fillable=[
        'localidad_descripcion',
        'localidad_cp',
        'provincia_id',
    ];

    public function provincia()
    {
        return $this->hasOne(Provincias::class,'id','provincia_id');
    }
}
