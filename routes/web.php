<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route saya bro
Route::get('/dashboard', [MahasiswaController::class, 'jumlah'])->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk mahasiswa
Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'tampil'])->name('mahasiswa.tampil'); // Menampilkan semua mahasiswa
    Route::get('/tambah', [MahasiswaController::class, 'tambah'])->name('mahasiswa.tambah'); // Form tambah mahasiswa
    Route::post('/submit', [MahasiswaController::class, 'submit'])->name('mahasiswa.submit'); // Menyimpan data mahasiswa
    Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit'); // Form edit mahasiswa
    Route::put('/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update'); // Mengupdate data mahasiswa
    Route::delete('/delete/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete'); // Menghapus mahasiswa
});

require __DIR__.'/auth.php';