<?php

namespace App\Models\Promociones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promocion extends Model
{
    /** @use HasFactory<\Database\Factories\PromocionFactory> */
    use HasFactory;

    protected $fillable=[
        'zona_id',
        'TipoDeCompra',
        'MontoFijoDESCUENTO',
        'PorcentajeDESCUENTO',
        'TopePorTransaccion',
        'PeriodoDesde',
        'PeriodoHasta',
        'TopePorPeriodo',
        'TopePorTipoPeriodo',
        'producto_id',
        'formadepago_id',
        'mediodepago_id',
        'Requisito',
        'DíaDeLaSemana',
        'Moneda',
        'Información',
        'Retira',
        'Reintegro',
    ];
}
