<?php

use Illuminate\Support\Facades\Route;

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
Route::put('/alumni/{id}', [App\Http\Controllers\AlumniadminController::class, 'update'])->name('alumni.update');
Route::resource('perusahaan', App\Http\Controllers\AkunPerusahaanController::class);

Route::get('/dashboardalumni', [App\Http\Controllers\DashboardalumniController::class, 'index'])->name('dashboardalumni');
Route::get('/dataloker', [App\Http\Controllers\DatalokerController::class, 'index'])->name('dataloker');
Route::get('/dashboardperusahaan', [App\Http\Controllers\DashboardperusahaanController::class, 'index'])->name('dashboardperusahaan');
Route::get('/datalamaranperusahaan', [App\Http\Controllers\DataLamaranPerusahaanController::class, 'index'])->name('datalamaranperusahaan');
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
Route::get('/lamaransaya', [App\Http\Controllers\LamaransayaController::class, 'index'])->name('lamaransaya');






Route::get('/alumni', 'AlumniadminController@index')->name('alumni.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
