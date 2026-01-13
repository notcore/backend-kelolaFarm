<?php

namespace Database\Seeders;

use App\Models\Harga;
use App\Models\Tanah;
use App\Models\Daerah;
use App\Models\Tanaman;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Tanah::factory(5)->create();
        Daerah::factory(10)->create();
        Tanaman::factory(15)->create();
        Harga::factory(10)->create();
        $this->call([
            AdminUserSeeder::class,
        ]);
    }
}
