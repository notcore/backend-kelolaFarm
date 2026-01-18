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

        $listDaerah = ["Sleman", "Bantul", "Gunungkidul", "Kulon Progo", "Kota Yogyakarta"];

        $tanahId = Tanah::factory()->create()->id;

        foreach ($listDaerah as $nama) {
            Daerah::create([
                'nama_daerah' => $nama,
                'tanah_id'    => $tanahId,
            ]);
        }

        Tanaman::factory(15)->create();
        Harga::factory(10)->create();

        $this->call([
            AdminUserSeeder::class,
        ]);
    }
}
