<?php

namespace Database\Seeders\erp;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run() {
        DB::table('areas')->insert(['name'=>'Administración','empresa_id'=>1,'habilitada'=>2]);
        DB::table('areas')->insert(['name'=>'Médica','empresa_id'=>1,'habilitada'=>2]);
        DB::table('areas')->insert(['name'=>'Social','empresa_id'=>1,'habilitada'=>2]);
        DB::table('areas')->insert(['name'=>'Historia De Vida','empresa_id'=>1,'habilitada'=>2]);
        DB::table('areas')->insert(['name'=>'Pagos','empresa_id'=>1,'habilitada'=>2]);
        DB::table('areas')->insert(['name'=>'Nutricional','empresa_id'=>1,'habilitada'=>2]);
    }
}
