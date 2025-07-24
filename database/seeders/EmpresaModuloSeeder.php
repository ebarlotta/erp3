<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Asigna los módulos de básicos a la empresa de Administración
        DB::table('empresa_modulos')->insert(['modulo_id' => '1', 'empresa_id' => 1,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '2', 'empresa_id' => 1,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '3', 'empresa_id' => 1,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '4', 'empresa_id' => 1,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '5', 'empresa_id' => 1,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '6', 'empresa_id' => 1,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '7', 'empresa_id' => 1,]);

        //Asigna los módulos de básicos a la empresa de Prueba
        DB::table('empresa_modulos')->insert(['modulo_id' => '9', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '10', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '11', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '17', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '23', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '24', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '26', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '27', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '28', 'empresa_id' => 2,]);

    }
}
