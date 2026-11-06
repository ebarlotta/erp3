<?php

namespace App\Models\Elementos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StockElementoAlmacen;
use App\Models\StockMovimiento;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ElementoProducto extends Model
{
    use HasFactory;

    protected $fillable=[
        'barra',
        'qr',
        'descuento',
        'calificacion',
        'descuento_especial',
        'precio_venta',
        'descripcion',
        'lote',
        'ruta',
        'estado_id',
        'elemento_id',
        'proveedor_id',
        'empresa_id',
    ];

    public function stocks(): HasMany {
        return $this->hasMany(StockElementoAlmacen::class, 'elemento_producto_id');
    }

    public function movimientos(): HasMany {
        return $this->hasMany(StockMovimiento::class, 'elemento_producto_id');
    }

    public function elemento() {
        return $this->belongsTo(Elemento::class, 'elemento_id');
    }

}