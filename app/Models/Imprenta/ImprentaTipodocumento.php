<?php

namespace App\Models\Imprenta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprentaTipodocumento extends Model
{
    /** @use HasFactory<\Database\Factories\Imprenta\ImprentaTipodocumentoFactory> */
    use HasFactory;

    protected $fillable=[
        'name',
        'eliminado',
    ];
}
