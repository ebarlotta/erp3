<?php

namespace Database\Seeders;

use App\Models\Unidad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadSeeder extends Seeder
{

    public int $empresa_id; // valor por defecto

    public function run()
    {

        $unidad_id = Unidad::firstOrCreate(['name' => 'Unidades', 'signo' => 'u', 'empresa_id' => $this->empresa_id])->id;

        // Puedes adaptar estos valores según tus necesidades
        $unidades = [
            ['name' => 'Gramos', 'signo' => 'g', 'empresa_id' => $this->empresa_id],
            ['name' => 'Kilogramos', 'signo' => 'kg', 'empresa_id' => $this->empresa_id],
            ['name' => 'Litros', 'signo' => 'L', 'empresa_id' => $this->empresa_id],
            ['name' => 'Mililitros', 'signo' => 'ml', 'empresa_id' => $this->empresa_id],
            ['name' => 'Tazas', 'signo' => 'tza', 'empresa_id' => $this->empresa_id],
            ['name' => 'Cucharadas', 'signo' => 'cda', 'empresa_id' => $this->empresa_id],
            ['name' => 'Cucharaditas', 'signo' => 'cdta', 'empresa_id' => $this->empresa_id],
        ];

        foreach ($unidades as $unidad) {
            DB::table('unidads')->insert([
                'name' => $unidad['name'],
                'signo' => $unidad['signo'],
                'empresa_id' => $unidad['empresa_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $unidad_id;
    }
}
