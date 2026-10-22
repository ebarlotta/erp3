<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolicitudFoto extends Model
{
    use SoftDeletes;

    protected $table = 'repa_solicitud_fotos';

    protected $fillable = [
        'solicitud_id', 'path',
    ];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'solicitud_id');
    }
}