<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// 1. Pintu Depan (Guest)
Route::middleware(['guest'])->group(function () {
    Route::get('/', [UserController::class, 'login'])->name('login');
    Route::get('/login', [UserController::class, 'login']); 
    Route::post('/postlogin', [UserController::class, 'postlogin'])->name('postlogin');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/postregister', [UserController::class, 'postregister'])->name('postregister');
});

// 2. Pintu Admin
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    
    // Khusus Admin
    Route::get('/home', [UserController::class, 'home'])->name('home');
    // Tambahkan di dalam group middleware(['auth', 'role:admin'])
Route::post('/admin/verifikasi/{id}', [UserController::class, 'verifikasi'])->name('admin.verifikasi');
Route::get('/admin/laporan', [UserController::class, 'laporan'])->name('admin.laporan');
});

// 3. Pintu Mahasiswa
Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [UserController::class, 'beranda'])->name('beranda');
    Route::get('/pendaftaran', [UserController::class, 'pendaftaran'])->name('pendaftaran');
    Route::post('/postpendaftaran', [UserController::class, 'postPendaftaran'])->name('postpendaftaran');
    Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    Route::get('/profil/edit', [UserController::class, 'editPendaftaran'])->name('profil.edit');
    Route::put('/profil/update', [UserController::class, 'updatePendaftaran'])->name('profil.update');
    Route::get('/pembayaran', [UserController::class, 'pembayaran'])->name('pembayaran');
    Route::post('/postpembayaran/upload', [UserController::class, 'postpembayaran'])->name('postpembayaran');
});