<?php

namespace Database\Factories;

use App\Models\Tanah;
use Illuminate\Database\Eloquent\Factories\Factory;

class TanamanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_tanaman' => $this->faker->randomElement([
                'Padi',
                'Jagung',
                'Kedelai',
                'Cabai',
                'Tomat'
            ]),
            'tanah_id' => Tanah::inRandomOrder()->first()->id
        ];
    }
}
