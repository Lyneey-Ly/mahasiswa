<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[UserController::class,'login'])->name('login');
Route::post('/postlogin',[UserController::class,'postlogin'])->name('postlogin');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/postregister', [UserController::class, 'postregister'])->name('postregister');



Route::get('/home',[UserController::class,'home'])->name('home');
Route::get('/beranda',[UserController::class,'beranda'])->name('beranda');

Route::get('/pendaftaran',[UserController::class,'pendaftaran'])->name('pendaftaran');
Route::post('/postpendaftaran',[UserController::class,'postpendaftaran'])->name('postpendaftaran');



    Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    Route::get('/profil/edit', [UserController::class, 'editPendaftaran'])->name('profil.edit');
    Route::put('/profil/update', [UserController::class, 'updatePendaftaran'])->name('profil.update');



