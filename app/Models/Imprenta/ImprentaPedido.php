<?php

namespace App\Models\Imprenta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprentaPedido extends Model
{
    /** @use HasFactory<\Database\Factories\Imprenta\ImprentaPedidoFactory> */
    use HasFactory;

    protected $fillable=[
        'cliente_id',
        'nombre',
        'telefono',
        'direccion',
        'dni',
        'cuit',
        'institucion',
        'email',
        'archivo',
        'cantidadhojas',
        'tipodeimpresion',
        'tipodocumento',
        'estado_id',
        'tamanopapel',
        'tipodepapel',
        'frentedorso',
        'cantidadejemplares',
        'retiraenlocal',
        'lugardeentrega',
        'geoposicion',
        'observaciones',
        'costoaprox',
    ];

    public function estado() {
        return $this->hasOne(Estado::class,'id','estado_id');
    }
    
}
