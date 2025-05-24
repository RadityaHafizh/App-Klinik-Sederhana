<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $roles = ['pendaftaran', 'dokter', 'perawat', 'apoteker'];

            foreach ($roles as $role) {
                User::create([
                    'name' => ucfirst($role),
                    'email' => "$role@klinik.test",
                    'password' => Hash::make('password'),
                    'role' => $role,
                ]);
            }
    }
}
