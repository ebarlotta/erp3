<?php

namespace App\Models\Elementos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StockElementoAlmacen;
use App\Models\StockMovimiento;
use App\Models\Proveedor;
use App\Models\Estado;
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

        // Agregá esta relación:
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    // Y esta para el estado:
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
    
    public function recetas()
    {
        return $this->hasMany(\App\Models\StockReceta::class, 'producto_terminado_id');
    }
}