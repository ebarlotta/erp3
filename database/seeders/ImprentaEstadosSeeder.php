<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImprentaEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('imprenta_estados')->insert(['name'=>'Recibido','active'=>true]);
        DB::table('imprenta_estados')->insert(['name'=>'En proceso','active'=>true]);
        DB::table('imprenta_estados')->insert(['name'=>'Impreso','active'=>true]);
        DB::table('imprenta_estados')->insert(['name'=>'Para Enviar','active'=>true]);
        DB::table('imprenta_estados')->insert(['name'=>'Entregado','active'=>true]);
    }
}
