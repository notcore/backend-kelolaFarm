<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TanahFactory extends Factory
{
    public function definition(): array
    {
        return [
            'jenis_tanah' => $this->faker->randomElement([
                'Latosol',
                'Andosol',
                'Aluvial',
                'Regosol',
                'Grumosol'
            ])
        ];
    }
}
