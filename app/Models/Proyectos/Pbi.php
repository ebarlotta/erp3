<?php

namespace App\Models\Proyectos;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;

use Illuminate\Database\Eloquent\Model;


class Pbi extends Model
{
    protected $table = 'pm_pbi';

    protected $fillable = [
        'title', 
        'description', 
        'type', 
        'status', 
        'priority', 
        'story_points', 
        'assigned_to',
        'project_id',
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
        'tiempo_limite_dias' => 'integer'
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
    public function assignee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     public function tasks(): HasMany
    {
        // return $this->hasMany(Pbi::class)->orderBy('order')->where('project_id', $this->project_id);
        // dd($this->hasMany(Pbi::class)->orderBy('order')->where('project_id', $project_id));
        return $this->hasMany(Task::class)->orderBy('order')->where('project_id', $this->project_id);
    }

    public function list_users()
    {
        return $this->hasMany(PbiUsers::class, 'pbi_id');
    }
}
