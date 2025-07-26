<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImprentaLadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('imprenta_lados')->insert(['lados'=>'Simple Faz','factor'=>1,'activo'=>true]);
        DB::table('imprenta_lados')->insert(['lados'=>'Doble Faz','factor'=>1.5,'activo'=>true]);
    }
}
