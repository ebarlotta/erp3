<?php

namespace App\Models\Proyectos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class PbiUsers extends Model
{
    protected $fillable = [
        'pbi_id', 
        'user_id', 
    ];
        
    public function assignee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
