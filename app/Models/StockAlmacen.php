<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StockAlmacen extends Model
{
    protected $table = 'stock_almacen';

    protected $fillable = ['name', 'direccion', 'empresa_id'];

    public function stocks(): HasMany
    {
        return $this->hasMany(StockElementoAlmacen::class, 'almacen_id');
    }

    public function movimientos(): HasMany
    {
        return $this->hasMany(StockMovimiento::class, 'almacen_id');
    }
}