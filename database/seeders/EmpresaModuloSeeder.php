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

        //Asigna los módulos de básicos a la empresa de Prueba ERP
        DB::table('empresa_modulos')->insert(['modulo_id' => '9', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '10', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '11', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '17', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '23', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '24', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '26', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '27', 'empresa_id' => 2,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '28', 'empresa_id' => 2,]);

        //Asigna los módulos de básicos a la empresa Imprenta
        DB::table('empresa_modulos')->insert(['modulo_id' => '51', 'empresa_id' => 3,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '52', 'empresa_id' => 3,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '53', 'empresa_id' => 3,]);

        //Asigna los módulos de básicos a la empresa Gastronómica
        DB::table('empresa_modulos')->insert(['modulo_id' => '37', 'empresa_id' => 4,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '43', 'empresa_id' => 4,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '50', 'empresa_id' => 4,]);

        //Asigna los módulos de básicos a la empresa de Inmobiliaria
        DB::table('empresa_modulos')->insert(['modulo_id' => '51', 'empresa_id' => 5,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '52', 'empresa_id' => 5,]);
        DB::table('empresa_modulos')->insert(['modulo_id' => '53', 'empresa_id' => 5,]);

    }
}
