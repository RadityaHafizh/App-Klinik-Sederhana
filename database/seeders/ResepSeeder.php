<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\Pemeriksaan;
use App\Models\Resep;
use Illuminate\Database\Seeder;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        $pemeriksaans = Pemeriksaan::all();
        $obats = Obat::all();

        foreach ($pemeriksaans as $pemeriksaan) {
            // Ambil obat acak untuk tiap pemeriksaan
            $obat = $obats->random();

            Resep::create([
                'pemeriksaan_id' => $pemeriksaan->id,
                'obat_id' => $obat->id,
                'jumlah' => rand(1, 20),
            ]);
        }
    }
}
