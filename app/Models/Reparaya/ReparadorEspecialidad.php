<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReparadorEspecialidad extends Model
{
    use HasFactory;

    protected $table = 'repa_especialidads';

    protected $fillable = [
        'actor_id',
        'nombre',
    ];

    public function reparador()
    {
        return $this->belongsTo(Reparadores::class,'actor_id');
    }
}
