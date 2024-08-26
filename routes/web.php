<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AkunPerusahaanController;
use App\Http\Controllers\DatalokerController;


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

Route::prefix('auth')->group(function () {
    Route::get('login', [App\Http\Controllers\LoginController::class, 'show'])->name('login');
    Route::post('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
});

//Rute Admin BKK
Route::get('/', [App\Http\Controllers\halamanController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::middleware(['auth', 'role:Admin BKK'])->group(function () {
    Route::get('/alumniadmin', [App\Http\Controllers\AlumniadminController::class, 'index'])->name('alumniadmin');
    Route::get('/importdata', [App\Http\Controllers\ImportController::class, 'index'])->name('importdata');
    Route::post('/import', [App\Http\Controllers\ImportController::class, 'import'])->name('import');
});



Route::get('/home', function () {
    return view('dashboardAdmin');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });
// Auth::routes();

Route::get('/dashboardadmin', [App\Http\Controllers\DashboardAdminController::class, 'index'])->name('dashboardadmin');
Route::get('/akunperusahaan', [App\Http\Controllers\AkunPerusahaanController::class, 'index'])->name('akunperusahaan');
Route::post('/akunperusahaan-proses', [App\Http\Controllers\AkunPerusahaanController::class, 'store'])
->name('akunperusahaan-proses');
// Rute untuk update alumni
Route::put('/alumni/{nik}', [App\Http\Controllers\AlumniadminController::class, 'update'])->name('alumni.update');
Route::resource('perusahaan', App\Http\Controllers\AkunPerusahaanController::class);

Route::get('/dashboardalumni', [App\Http\Controllers\DashboardalumniController::class, 'index'])->name('dashboardalumni');
Route::get('/dataloker', [App\Http\Controllers\DatalokerController::class, 'index'])->name('dataloker');
Route::get('/dashboardperusahaan', [App\Http\Controllers\DashboardperusahaanController::class, 'index'])->name('dashboardperusahaan');
Route::get('/datalamaranperusahaan', [App\Http\Controllers\DataLamaranPerusahaanController::class, 'index'])->name('datalamaranperusahaan');
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
Route::get('/lamaransaya', [App\Http\Controllers\LamaransayaController::class, 'index'])->name('lamaransaya');

Route::controller(AkunPerusahaanController::class)->group(function () {
    Route::get('akun-perusahaan', 'index');
    Route::post('akun-perusahaan', 'store');
    Route::delete('perusahaan/{perusahaan}', 'destroy')->name('perusahaan.destroy');
    Route::put('perusahaan/{perusahaan}', 'update')->name('perusahaan.update');
});

// Rute untuk Loker
Route::get('/lowongan/{id_lowongan_pekerjaan}', [DatalokerController::class, 'show'])->name('lowongan.show');
Route::post('/lowongan/store', [DatalokerController::class, 'store'])->name('lowongan.store');
Route::get('/lowongan', [DatalokerController::class, 'index'])->name('lowongan.index');
Route::put('/lowongan/{id_lowongan_pekerjaan}', [DatalokerController::class, 'update'])->name('lowongan.update');

// Rute Untuk Loker Di Admin
Route::get('/lokeradmin', [App\Http\Controllers\LokeradminController::class, 'index'])->name('lokeradmin');
Route::put('/loker/{id_lowongan_pekerjaan}/update-status', [App\Http\Controllers\LokeradminController::class, 'updateStatus'])->name('update.status');

// Route Untuk Akun Pengguna
Route::get('/akunpengguna', [App\Http\Controllers\AkunpenggunaController::class, 'index'])->name('akunpengguna');















Route::get('/alumni', 'AlumniadminController@index')->name('alumni.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
