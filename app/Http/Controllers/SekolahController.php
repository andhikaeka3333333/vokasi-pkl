<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = User::sekolah()
            ->latest()
            ->paginate(2);
        return view('sekolah.index', compact('sekolahs'));
    }

    // public function create()
    // {
    //     return view('sekolah.index');
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        return redirect()->route('sekolah.index')
            ->with('success', 'Data sekolah berhasil ditambahkan!');
    }

    public function show(User $sekolah)
    {
        if ($sekolah->role !== 'user') {
            abort(404);
        }

        return response()->json($sekolah);
    }

    public function edit(User $sekolah)
    {
        if ($sekolah->role !== 'user') {
            abort(404);
        }

        return response()->json($sekolah);
    }

    public function update(Request $request, User $sekolah)
    {
        if ($sekolah->role !== 'user') {
            abort(404);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $sekolah->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $sekolah->name = $validated['name'];
        $sekolah->email = $validated['email'];

        if ($request->filled('password')) {
            $sekolah->password = Hash::make($validated['password']);
        }

        $sekolah->save();

        return redirect()->route('sekolah.index')
            ->with('success', 'Data sekolah berhasil diperbarui!');
    }

    public function destroy(User $sekolah)
    {
        if ($sekolah->role !== 'user') {
            abort(404);
        }

        $sekolah->delete();

        return redirect()->route('sekolah.index')
            ->with('success', 'Data sekolah berhasil dihapus!');
    }
}
