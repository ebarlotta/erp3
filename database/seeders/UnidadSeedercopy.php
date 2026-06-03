<?php

namespace Database\Seeders;

use App\Models\Elementos\Elemento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadSeedercopy extends Seeder
{

    public int $empresa_id; // valor por defecto

    public function run()
    {

    //   $seeder = new UnidadSeeder();
    //     $seeder->empresa_id = 1; $seeder->run();
    //     $seeder->empresa_id = 2; $seeder->run();
    //     $seeder->empresa_id = 3; $seeder->run();
    //     $seeder->empresa_id = 4; $seeder->run();
    //     $seeder->empresa_id = 5; $seeder->run();


        $unidad = new UnidadSeeder();
        $categoria = new CategoriaSeeder();
        $elemento = new Elemento();


        for($i=1;$i<=5;$i++) {
            //Agrega todas las unidades a una empresa
            $unidad->empresa_id = $i; $unidad_id = $unidad->run();
            //Agrega la categoría Vehículo a la tabla de categorias sólo de una empresa
            $categoria->name = "Vehículo"; $categoria->empresa_id = $i; $categoria_id = $categoria->save();
            // Agrega el elemento Vehiculo en la tabla de Elementos de la empresa
            Elemento::firstOrCreate(['name'=> 'Veíhulo', 'existencia'=>0, 'precio_compra'=>0, 'stock_minimo'=>0, 'vencimiento'=> now(), 'categoria_id' => $categoria_id, 'unidad_id' => $unidad_id, 'ruta' =>'', 'empresa_id' => $i]);
        }

    // $categorias = new CategoriaSeeder();
    //     $categorias->name = "Vehículo"; $categorias->empresa_id = 1; $categoria_id = $categorias->save();
    //     $categorias->name = "Vehículo"; $categorias->empresa_id = 2; $categoria_id = $categorias->save();
    //     $categorias->name = "Vehículo"; $categorias->empresa_id = 3; $categoria_id = $categorias->save();
    //     $categorias->name = "Vehículo"; $categorias->empresa_id = 4; $categoria_id = $categorias->save();
    //     $categorias->name = "Vehículo"; $categorias->empresa_id = 5; $categoria_id = $categorias->save();

    // $elemento = new Elemento();

    // Elemento::firstOrCreate(['name'=> 'Veíhulo', 'existencia'=>0, 'precio_compra'=>0, 'stock_minimo'=>0, 'vencimiento'=>date(), 'categoria_id' => $categoria_id, 'unidad_id' => $unidad_id, 'ruta' =>'', 'empresa_id' => $empresa_id]);

    // Puedes adaptar estos valores según tus necesidades
        // $unidades = [
        //     ['name' => 'Unidades', 'signo' => 'u', 'empresa_id' => $this->empresa_id],
        //     ['name' => 'Gramos', 'signo' => 'g', 'empresa_id' => $this->empresa_id],
        //     ['name' => 'Kilogramos', 'signo' => 'kg', 'empresa_id' => $this->empresa_id],
        //     ['name' => 'Litros', 'signo' => 'L', 'empresa_id' => $this->empresa_id],
        //     ['name' => 'Mililitros', 'signo' => 'ml', 'empresa_id' => $this->empresa_id],
        //     ['name' => 'Tazas', 'signo' => 'tza', 'empresa_id' => $this->empresa_id],
        //     ['name' => 'Cucharadas', 'signo' => 'cda', 'empresa_id' => $this->empresa_id],
        //     ['name' => 'Cucharaditas', 'signo' => 'cdta', 'empresa_id' => $this->empresa_id],
        // ];

        // foreach ($unidades as $unidad) {
        //     DB::table('unidads')->insert([
        //         'name' => $unidad['name'],
        //         'signo' => $unidad['signo'],
        //         'empresa_id' => $unidad['empresa_id'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
