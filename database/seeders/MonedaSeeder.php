<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonedaSeeder extends Seeder
{
    public function run(): void
    {
        $monedas = [
            ['codigo' => 'ARS', 'nombre' => 'Peso argentino',      'simbolo' => '$',    'es_principal' => true],
            ['codigo' => 'USD', 'nombre' => 'Dólar estadounidense', 'simbolo' => 'US$',  'es_principal' => false],
            ['codigo' => 'EUR', 'nombre' => 'Euro',                 'simbolo' => '€',    'es_principal' => false],
            ['codigo' => 'BRL', 'nombre' => 'Real brasileño',       'simbolo' => 'R$',   'es_principal' => false],
            ['codigo' => 'UYU', 'nombre' => 'Peso uruguayo',        'simbolo' => '$U',   'es_principal' => false],
            ['codigo' => 'PYG', 'nombre' => 'Guaraní paraguayo',    'simbolo' => '₲',    'es_principal' => false],
            ['codigo' => 'BOB', 'nombre' => 'Boliviano',            'simbolo' => 'Bs',   'es_principal' => false],
            ['codigo' => 'CLP', 'nombre' => 'Peso chileno',         'simbolo' => 'CLP$', 'es_principal' => false],
        ];

        foreach ($monedas as $moneda) {
            DB::table('monedas')->updateOrInsert(
                ['codigo' => $moneda['codigo']],
                array_merge($moneda, [
                    'activo'     => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}