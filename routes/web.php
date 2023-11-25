<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\RiwayatController;


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

Route::post('/simpan_data_riwayat', [RiwayatController::class, 'simpan_data_riwayat'])->name('simpan_data_riwayat');
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('tampil_riwayat');
Route::put('/riwayat/{id}/edit', [RiwayatController::class, 'edit_riwayat'])->name('edit_riwayat');
Route::delete('/riwayat/{id}', [RiwayatController::class, 'hapus_riwayat'])->name('hapus_riwayat');
Route::post('/simpan_data_riwayat', [RiwayatController::class ,'simpan_data_riwayat']);



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register/process', [AuthController::class, 'registerprocess']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/process', [AuthController::class, 'loginprocess']);
Route::get('/home', [AuthController::class, 'homepage']);

Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');

Route::get('/loginpage', function () {
    return view('loginpage');
})->name('loginpage');

Route::get('/profil', [ProfilController::class, 'index'])->middleware('islogin')->name('profil');

Route::get('/notifikasi', function () {
    return view('notifikasi');
})->middleware('islogin')->name('notifikasi');

Route::get('/letsread', function () {
    return view('letsread');
})->middleware('islogin')->name('letsread');

Route::get('/event', function () {
    return view('event');
})->middleware('islogin')->name('event');

Route::get('/admin', function () {
    $artikel = Artikel::all();
    return view('admin', compact('artikel'));
})->name('admin');

Route::get('/validasi', function () {
    return view('validasi');
})->name('validasi');


Route::resource('/artikel', App\Http\Controllers\ArtikelController::class);