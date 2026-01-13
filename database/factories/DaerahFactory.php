<?php

namespace Database\Factories;

use App\Models\Tanah;
use Illuminate\Database\Eloquent\Factories\Factory;

class DaerahFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_daerah' => $this->faker->city(),
            'tanah_id'    => Tanah::inRandomOrder()->first()->id
        ];
    }
}
