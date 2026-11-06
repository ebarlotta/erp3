<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Elementos\ElementoProducto;

class StockElementoAlmacen extends Model
{
    protected $table = 'stock_elemento_almacen';

    protected $fillable = ['elemento_producto_id', 'almacen_id', 'existencia', 'stock_minimo'];

    public function elementoProducto(): BelongsTo
    {
        return $this->belongsTo(ElementoProducto::class, 'elemento_producto_id');
    }

    public function almacen(): BelongsTo
    {
        return $this->belongsTo(StockAlmacen::class, 'almacen_id');
    }

}