<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun sekolah contoh
        User::create([
            'name' => 'SMK Negeri 1 Kudus',
            'email' => 'smkn1@sekolah.id',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'SMA Nusantara',
            'email' => 'nusantara@sekolah.id',
            'password' => Hash::make('password123'),
        ]);
        User::create([
            'name' => 'SMA Raden Umar Said',
            'email' => 'rus@sekolah.id',
            'password' => Hash::make('password123'),
        ]);
        User::create([
            'name' => 'VokasiPolytron',
            'email' => 'vokasi@polytron.co.id',
            'password' => Hash::make('password123'),
            'role' => "admin"
        ]);
    }
}