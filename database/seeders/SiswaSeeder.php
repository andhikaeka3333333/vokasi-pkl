<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil sekolah pertama yang baru kita buat di UserSeeder
        $sekolah = User::first();

        if ($sekolah) {
            Siswa::create([
                'user_id' => $sekolah->id,
                'nama_sekolah' => $sekolah->name,
                'nis' => 20250001,
                'nama' => 'Aditya Pratama',
                'jenis_kelamin' => 'Laki-Laki',
                'kelas' => 'XII',
                'jurusan' => 'Rekayasa Perangkat Lunak',
                'status' => 'Belum Terkirim', // Mengikuti alur otomatis
            ]);

            Siswa::create([
                'user_id' => $sekolah->id,
                'nama_sekolah' => $sekolah->name,
                'nis' => 20250002,
                'nama' => 'Siti Nurhayati',
                'jenis_kelamin' => 'Perempuan',
                'kelas' => 'XI',
                'jurusan' => 'Akuntansi',
                'status' => 'Terkirim',
            ]);
            Siswa::create([
                'user_id' => $sekolah->id,
                'nama_sekolah' => $sekolah->name,
                'nis' => 1231202,
                'nama' => 'Siti Nurhayati',
                'jenis_kelamin' => 'Perempuan',
                'kelas' => 'XI',
                'jurusan' => 'Akuntansi',
                'status' => 'Belum Terkirim',
            ]);
            Siswa::create([
                'user_id' => $sekolah->id,
                'nama_sekolah' => $sekolah->name,
                'nis' => 422321232,
                'nama' => 'Siti Nurhayati',
                'jenis_kelamin' => 'Perempuan',
                'kelas' => 'XI',
                'jurusan' => 'Akuntansi',
                'status' => 'Belum Terkirim',
            ]);
            Siswa::create([
                'user_id' => $sekolah->id,
                'nama_sekolah' => $sekolah->name,
                'nis' => 14214124,
                'nama' => 'Siti Nurhayati',
                'jenis_kelamin' => 'Perempuan',
                'kelas' => 'XI',
                'jurusan' => 'Akuntansi',
                'status' => 'Belum Terkirim',
            ]);
            Siswa::create([
                'user_id' => $sekolah->id,
                'nama_sekolah' => $sekolah->name,
                'nis' => 74534122,
                'nama' => 'Siti Nurhayati',
                'jenis_kelamin' => 'Perempuan',
                'kelas' => 'XI',
                'jurusan' => 'Akuntansi',
                'status' => 'Belum Terkirim',
            ]);
            Siswa::create([
                'user_id' => $sekolah->id,
                'nama_sekolah' => $sekolah->name,
                'nis' => 24342343,
                'nama' => 'Siti Nurhayati',
                'jenis_kelamin' => 'Perempuan',
                'kelas' => 'XI',
                'jurusan' => 'Akuntansi',
                'status' => 'Belum Terkirim',
            ]);
        }
    }
}