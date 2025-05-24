<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\Pemeriksaan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pasiens = Pasien::all();

        $faker = Faker::create();

        foreach ($pasiens as $pasien) {
            // Pastikan setiap pasien punya minimal 1 pemeriksaan
            Pemeriksaan::create([
                'pasien_id' => $pasien->id,
                'keluhan' => $faker->sentence(),
                'diagnosa' => $faker->sentence(),
            ]);
        }
    }
}
