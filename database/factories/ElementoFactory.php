<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Elementos\Elemento;
use App\Models\Unidad;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Elemento>
 */
class ElementoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Elemento::class;


    public function definition(): array
    {

        // Unidades disponibles con empresa_id = 1
        $unidad = Unidad::where('empresa_id', 1)->inRandomOrder()->first();
        
        return [
            'name' => $this->faker->unique()->word(), // Será sobrescrito abajo
            'existencia' => $this->faker->randomFloat(2, 0, 100),
            'precio_compra' => $this->faker->randomFloat(2, 10, 1000),
            'stock_minimo' => $this->faker->randomFloat(2, 1, 20),
            'vencimiento' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'categoria_id' => 1,
            'unidad_id' => $unidad->id,
            'empresa_id' => 1,
        ];
    }

    /**
     * Estado personalizado para generar ingredientes únicos.
     */
    public function ingrediente(string $nombre, int $unidadId)
    {
        return $this->state([
            'name' => $nombre,
            'unidad_id' => $unidadId,
        ]);
    }
}
