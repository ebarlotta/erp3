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

    protected $casts = ['vencimiento' => 'date', ];

     //Relación de uno a uno
    //  public function categoria()
    //  {
    //      return $this->hasOne(Categorias::class);
    //  }

    //  public function unidad()
    //  {
    //      return $this->hasOne(Unidad::class);
    //  }

     public function empresa()
     {
         return $this->hasOne(Empresa::class);
     }

     // En app/Models/Elementos/Elemento.php

public function categoria()
{
    // Como 'elementos' tiene 'categoria_id', se lo indicamos explícitamente
    return $this->belongsTo(Categorias::class, 'categoria_id');
}

public function unidad()
{
    return $this->belongsTo(Unidad::class, 'unidad_id');
}

}
