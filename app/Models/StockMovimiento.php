<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Elementos\ElementoProducto;

class StockMovimiento extends Model
{
    protected $table = 'stock_movimientos';

    protected $fillable = [
        'elemento_producto_id', 'almacen_id', 'tipo', 'motivo',
        'cantidad', 'saldo', 'lote', 'usuario_id'
    ];

    public function elementoProducto(): BelongsTo
    {
        return $this->belongsTo(ElementoProducto::class, 'elemento_producto_id');
    }

    public function almacen(): BelongsTo
    {
        return $this->belongsTo(StockAlmacen::class, 'almacen_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}