<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu_categoria extends Model
{
    /** @use HasFactory<\Database\Factories\Menu\menuCategoriaFactory> */
    use HasFactory;

    protected $fillable = [
        'menu_nombre_categoria',
        'menu_habilitada',
    ];
}
