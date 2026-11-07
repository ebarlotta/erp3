<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Elementos\ElementoProducto;

class StockReceta extends Model
{
    protected $table = 'stock_recetas';

    protected $fillable = ['producto_terminado_id', 'materia_prima_id', 'cantidad'];

    public function productoTerminado(): BelongsTo
    {
        return $this->belongsTo(ElementoProducto::class, 'producto_terminado_id');
    }

    public function materiaPrima(): BelongsTo
    {
        return $this->belongsTo(ElementoProducto::class, 'materia_prima_id');
    }
}