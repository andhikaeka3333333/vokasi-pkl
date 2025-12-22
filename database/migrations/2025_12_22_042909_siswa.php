<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('siswa', function (Blueprint $table) {
        $table->id();
        // Tambahkan foreign key ke tabel users
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->string('nama_sekolah');
        $table->integer('nis')->unique();
        $table->string('nama');
        $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->default('Laki-Laki');
        $table->string('kelas');
        $table->string('jurusan');
        $table->enum('status', ['Belum Terkirim', 'Terkirim', 'Gladi Bersih', 'Proses Seleksi', 'Diterima', 'Ditolak'])->default('Belum Terkirim');;
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
