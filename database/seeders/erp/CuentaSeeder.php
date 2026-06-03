<?php

namespace Database\Seeders\erp;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuentas')->insert(['name'=>'Efectivo','empresa_id'=>1]);
        DB::table('cuentas')->insert(['name'=>'Electricidad','empresa_id'=>1]);
        DB::table('cuentas')->insert(['name'=>'Agua','empresa_id'=>1]);
        DB::table('cuentas')->insert(['name'=>'Servicio','empresa_id'=>1]);
        DB::table('cuentas')->insert(['name'=>'Educación','empresa_id'=>1]);
    }
}
