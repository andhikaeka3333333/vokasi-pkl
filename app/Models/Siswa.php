<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;


class Siswa extends Model
{
    protected $table = 'siswa'; // Pastikan nama tabel sesuai

    protected $fillable = [
        'user_id',
        'nama_sekolah',
        'nis',
        'nama',
        'jenis_kelamin',
        'kelas',
        'jurusan',
        'status'
    ];

    // Relasi: Siswa dimiliki oleh satu User (Sekolah)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}