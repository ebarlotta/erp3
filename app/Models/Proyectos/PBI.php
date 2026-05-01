<?php

namespace App\Models\Proyectos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class PBI extends Model
{
    protected $fillable = [
        'title', 'description', 'type', 'status', 
        'priority', 'story_points', 'assigned_to',
        'urgencia', 
        'valor_negocio', 
        'costo_estimado', 
        'tiempo_limite_dias', 
        'prioridad_automatica',
    ];
    
    protected $casts = [
        'priority' => 'integer',
        'story_points' => 'integer',
        'urgencia' => 'integer', 
        'prioridad_automatica' => 'integer', 
        'valor_negocio' => 'integer',
        'costo_estimado' => 'integer',
        'tiempo_limite_dias' => 'integer',
        'prioridad_automatica' => 'integer'
    ];
    
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
