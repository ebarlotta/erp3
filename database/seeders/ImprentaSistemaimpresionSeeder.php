<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImprentaSistemaimpresionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('imprenta_sistemaimpresions')->insert(['sistema'=>'Laser B/N','factor'=>1,'activo'=>true]);
        DB::table('imprenta_sistemaimpresions')->insert(['sistema'=>'Laser Color','factor'=>1.5,'activo'=>true]);
        DB::table('imprenta_sistemaimpresions')->insert(['sistema'=>'Tinta B/N','factor'=>1,'activo'=>true]);
        DB::table('imprenta_sistemaimpresions')->insert(['sistema'=>'Tinta Color','factor'=>1.5,'activo'=>true]);
    }
}
