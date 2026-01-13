<?php

namespace Database\Factories;

use App\Models\Harga;
use App\Models\Daerah;
use App\Models\Tanaman;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HargaFactory extends Factory
{
    
    protected $model = Harga::class;

    public function definition()
    {
        return [
            'daerah_id' => Daerah::inRandomOrder()->first()->id ?? 1,
            'tanaman_id' => Tanaman::inRandomOrder()->first()->id ?? 1,
            'harga' => $this->faker->numberBetween(1000, 50000),
        ];
    }
}
