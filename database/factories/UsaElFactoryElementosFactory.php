<?php

namespace Database\Factories\UsaElFactoryElementos;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Elementos\Elemento;
use App\Models\Unidad;

class UsaElFactoryElementosFactory extends Factory {

    public function definition(): array {
     $unidadIds = Unidad::where('empresa_id', 1)->pluck('id')->toArray();

    $ingredientes = [
        'Harina', 'Azúcar', 'Sal', 'Pimienta', 'Aceite de oliva', 'Aceite vegetal', 'Manteca',
        'Leche', 'Huevos', 'Agua', 'Vinagre', 'Limón', 'Ajo', 'Cebolla', 'Tomate', 'Zanahoria',
        'Papa', 'Zapallo', 'Queso rallado', 'Queso cremoso', 'Yogur', 'Crema de leche', 'Miel',
        'Mostaza', 'Ketchup', 'Mayonesa', 'Orégano', 'Laurel', 'Perejil', 'Albahaca', 'Tomillo',
        'Romero', 'Pimentón', 'Canela', 'Clavo de olor', 'Jengibre', 'Cilantro', 'Nuez moscada',
        'Arroz', 'Fideos', 'Lentejas', 'Garbanzos', 'Porotos', 'Polenta', 'Pan rallado', 'Pollo',
        'Carne vacuna', 'Carne de cerdo', 'Pescado', 'Atún', 'Jamón', 'Chorizo', 'Tocino',
        'Mantequilla de maní', 'Chocolate', 'Cacao', 'Café', 'Té', 'Salsa de soja', 'Salsa inglesa',
        'Salsa barbacoa', 'Salsa de tomate', 'Purê de tomate', 'Maicena', 'Levadura', 'Polvo de hornear',
        'Gelatina sin sabor', 'Azúcar impalpable', 'Azúcar moreno', 'Frutillas', 'Manzanas',
        'Bananas', 'Naranjas', 'Peras', 'Uvas', 'Melón', 'Sandía', 'Ananá', 'Duraznos',
        'Ciruelas', 'Pasas de uva', 'Almendras', 'Nueces', 'Avellanas', 'Semillas de girasol',
        'Semillas de chía', 'Semillas de lino', 'Aceitunas', 'Champiñones', 'Espinaca',
        'Lechuga', 'Repollo', 'Puerro', 'Apio', 'Remolacha', 'Brocoli', 'Coliflor', 'Huevo duro',
        'Granos de maíz', 'Sémola'
    ];

    foreach ($ingredientes as $nombre) {
        $unidadId = $unidadIds[array_rand($unidadIds)];

        Elemento::factory()->ingrediente($nombre, $unidadId)->create();
    }

    return [];
}
}