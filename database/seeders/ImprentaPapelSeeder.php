<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImprentaPapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('imprenta_papels')->insert(['tamano_papel'=>'A4','gramaje'=>'70grs','precio'=>0,'activo'=>true]);
    }
}
