<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SexoSeeder extends Seeder
{
    public function run() {
        DB::table('sexos')->insert(['nombresexo'=>'Masculino',]);
        DB::table('sexos')->insert(['nombresexo'=>'Femenino',]);
        DB::table('sexos')->insert(['nombresexo'=>'Prefiero no decirlo',]);
    }
}
