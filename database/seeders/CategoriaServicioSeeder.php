<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaServicioSeeder extends Seeder
{
    public function run(): void
    {
        $empresaId = 1; // ReparaYa

        $categorias = [
            ['nombre' => 'Plomería',              'icono' => 'wrench'],
            ['nombre' => 'Electricidad',          'icono' => 'bolt'],
            ['nombre' => 'Pintura',               'icono' => 'paint-roller'],
            ['nombre' => 'Carpintería',           'icono' => 'hammer'],
            ['nombre' => 'Albañilería',           'icono' => 'bricks'],
            ['nombre' => 'Cerrajería',            'icono' => 'key'],
            ['nombre' => 'Climatización',         'icono' => 'fan'],
            ['nombre' => 'Electrodomésticos',     'icono' => 'plug'],
            ['nombre' => 'Jardinería',            'icono' => 'leaf'],
            ['nombre' => 'Limpieza',              'icono' => 'spray-can'],
            ['nombre' => 'Mudanzas',              'icono' => 'truck'],
            ['nombre' => 'Otros',                 'icono' => 'ellipsis'],
        ];

        foreach ($categorias as $cat) {
            DB::table('categorias')->updateOrInsert(
                [
                    'slug'       => Str::slug($cat['nombre']),
                    'empresa_id' => $empresaId,
                ],
                [
                    'nombrecategoria' => $cat['nombre'],
                    'icono'           => $cat['icono'],
                    'activo'          => true,
                    'updated_at'      => now(),
                    'created_at'      => now(),
                ]
            );
        }
    }
}