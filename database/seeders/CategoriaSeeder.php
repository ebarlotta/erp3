<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categorias;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{

    public int $empresa_id;
    public string $name;

    public function run()
    {
        return Categorias::firstOrCreate(['nombrecategoria'=> $this->name, 'empresa_id' => $this->empresa_id])->id;
    }

}
