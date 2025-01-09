<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProgressController;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LaporanController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [LaporanController::class, 'filterByStatus'])->name('filterByStatus');
    Route::post('/dashboard/{id}/change-status', [LaporanController::class, 'changeStatus'])->name('changeStatus');
    Route::get('/dashboard/{id}', [LaporanController::class, 'edit'])->name('editLaporan');
    Route::put('/dashboard/{id}', [LaporanController::class, 'edit'])->name('updateLaporan');
    Route::delete('/dashboard/{id}', [LaporanController::class, 'hapus'])->name('deleteLaporan');

    // Untuk mengirimkan pembaruan progress
    Route::post('dashboard/{id}', [ProgressController::class, 'update'])->name('updateProgress');
    // Route::get('/dashboard/{id}', [LaporanController::class, 'edit'])->name('editLaporan');
    Route::get('/statistik', [ChartController::class, 'index']);

    
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/kelola', [KelolaUSerController::class, 'index']);
    Route::post('/kelola', [KelolaUserController::class, 'tambah'])->name('tambahUser');
    Route::get('/kelola/{id}', [KelolaUserController::class, 'edit'])->name('editUser');
    Route::put('/kelola/{id}', [KelolaUserController::class, 'edit'])->name('updateUser');
    Route::delete('/kelola/{id}', [KelolaUserController::class, 'hapus'])->name('deleteUser');
});

// web.php


// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard', [
//             "title" => "dashboard"
//         ]);
//     })->name('dashboard');
// });

// Route::middleware(['auth'])->get('/dashboard', function () {
//     if (Auth::check()) {
//         return view('dashboard', [
//             "title" => "Dashboard"
//         ]);
//     } else {
//         return redirect('/login'); // Redirect pengguna yang belum terotentikasi ke halaman login
//     }
// })->name('dashboard');