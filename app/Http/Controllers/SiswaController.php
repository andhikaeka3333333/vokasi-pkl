<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        // FILTER: Hanya ambil siswa yang user_id-nya sama dengan ID user yang sedang login
        $siswas = Siswa::where('user_id', auth()->id())->paginate(2);

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required|string|max:255',
            'nama_sekolah' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        Siswa::create([
            'user_id' => auth()->id(), // Menyimpan ID user yang login
            'nama_sekolah' => $request->nama_sekolah,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'status' => 'Belum Terkirim',
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        // KEAMANAN: Cek apakah data ini milik user yang login
        if ($siswa->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        // KEAMANAN: Cek apakah data ini milik user yang login
        if ($siswa->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $siswa->id,
            'nama' => 'required|string|max:255',
            'nama_sekolah' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        // KEAMANAN: Cek apakah data ini milik user yang login
        if ($siswa->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}