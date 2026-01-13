<?php

namespace Database\Seeders;

use App\Models\Tanah;
use App\Models\Daerah;
use App\Models\Tanaman;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat tanah dulu (parent)
        Tanah::factory(5)->create();

        // 2. Daerah & tanaman ngikut tanah
        Daerah::factory(10)->create();
        Tanaman::factory(15)->create();
    }
}
