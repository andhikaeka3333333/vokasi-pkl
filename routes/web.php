<?php

use App\Http\Controllers\SekolahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    // ADMIN ONLY - Data Sekolah CRUD
    Route::middleware('admin')->group(function () {
        Route::resource('sekolah', SekolahController::class);
    });

    // ALL USERS
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pengumuman', function () {
        return view('pengumuman.index');
    })->name('pengumuman.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('siswa', SiswaController::class);
});

require __DIR__.'/auth.php';
