<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documento>
 */
class DocumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipos_documento_id' => rand(1,10),
            'organismo_id' => rand(1,10),
            'institucione_id' => rand(1,10),
            'tema_id' => rand(1,10),
            'vigencia_id' => rand(1,2),
            'fecha_suscripcion' => fake()->randomElement(['2016','2020','2021','2019','2017','2018'])
        ];
    }
}
