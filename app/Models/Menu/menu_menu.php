<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu_menu extends Model
{
    /** @use HasFactory<\Database\Factories\Menu\menuMenuFactory> */
    use HasFactory;

    protected $fillable = [
        'menu_nombre_menu',
        'menu_categoria_id',
        'menu_habilitada',
    ];
}
