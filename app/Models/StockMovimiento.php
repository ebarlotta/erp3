<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockMovimiento extends Model
{
    protected $table = 'stock_movimientos';

    protected $fillable = [
        'elemento_id', 'almacen_id', 'tipo', 'motivo',
        'cantidad', 'saldo', 'lote', 'usuario_id'
    ];

    public function elemento(): BelongsTo
    {
        return $this->belongsTo(Elemento::class, 'elemento_id');
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