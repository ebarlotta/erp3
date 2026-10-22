<?php

namespace App\Models\Reparaya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PresupuestoItem extends Model
{
    use SoftDeletes;

    protected $table = 'repa_presupuesto_items';

    protected $fillable = [
        'presupuesto_id', 'concepto', 'monto',
    ];

    protected $casts = [
        'monto' => 'decimal:2',
    ];

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'presupuesto_id');
    }
}