<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockElementoAlmacen extends Model
{
    protected $table = 'stock_elemento_almacen';

    protected $fillable = ['elemento_id', 'almacen_id', 'existencia', 'stock_minimo'];

    public function elemento(): BelongsTo
    {
        return $this->belongsTo(Elemento::class, 'elemento_id');
    }

    public function almacen(): BelongsTo
    {
        return $this->belongsTo(StockAlmacen::class, 'almacen_id');
    }
}