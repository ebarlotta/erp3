<?php

namespace App\Models\Elementos;

use App\Models\Categorias;
use App\Models\Unidad;
use App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'existencia',
        'precio_compra',
        'stock_minimo',
        'vencimiento',
        'categoria_id',
        'unidad_id',
        'ruta',
        'empresa_id',
    ];

     //Relación de uno a uno
     public function categoria()
     {
         return $this->hasOne(Categorias::class);
     }

     public function unidad()
     {
         return $this->hasOne(Unidad::class);
     }

     public function empresa()
     {
         return $this->hasOne(Empresa::class);
     }
}
