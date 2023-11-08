<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\WisataController;
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

Route::get('/', function () {
    return view('home');
});

Route::prefix('dashboard')->group(function () {

    Route::get('/', [WisataController::class, "dashboard"])->name('dashboard');
    Route::get('/wisata', [WisataController::class, "index"])->name('dashboard-wisata');
    Route::get('/wisata/create', [WisataController::class, "create"])->name('create-wisata');
    Route::post('/wisata/store', [WisataController::class, "store"])->name('store-wisata');
    Route::get('/wisata/edit/{wisata}', [WisataController::class, "edit"])->name('edit-wisata');
    Route::put('/wisata/update/{wisata}', [WisataController::class, "update"])->name('update-wisata');
    Route::delete('/wisata/delete/{wisata}', [WisataController::class, 'destroy'])->name('delete-wisata');

    Route::get('/penginapan', [PenginapanController::class, "index"])->name('dashboard-penginapan');
    Route::get('/penginapan/create', [PenginapanController::class, "create"])->name('create-penginapan');
    Route::post('/penginapan/store', [PenginapanController::class, "store"])->name('store-penginapan');
    Route::get('/penginapan/edit/{penginapan}', [PenginapanController::class, "edit"])->name('edit-penginapan');
    Route::put('/penginapan/update/{penginapan}', [PenginapanController::class, "update"])->name('update-penginapan');
    Route::delete('/penginapan/delete/{penginapan}', [PenginapanController::class, "destroy"])->name('delete-penginapan');

    Route::get('/kuliner', [KulinerController::class, "index"])->name('dashboard-kuliner');
    Route::get('/kuliner/create', [KulinerController::class, "create"])->name('create-kuliner');
    Route::post('/kuliner/store', [KulinerController::class, "store"])->name('store-kuliner');
    Route::get('/kuliner/edit/{kuliner}', [KulinerController::class, "edit"])->name('edit-kuliner');
    Route::put('/kuliner/update/{kuliner}', [KulinerController::class, "update"])->name('update-kuliner');
    Route::delete('/kuliner/delete/{kuliner}', [KulinerController::class, "destroy"])->name('delete-kuliner');

    Route::get('/berita', [BeritaController::class, "index"])->name('dashboard-berita');
    Route::get('/berita/create', [BeritaController::class, "create"])->name('create-berita');
    Route::post('/berita/store', [BeritaController::class, "store"])->name('store-berita');
    Route::get('/berita/edit/{berita}', [BeritaController::class, "edit"])->name('edit-berita');
    Route::put('/berita/update/{berita}', [BeritaController::class, "update"])->name('update-berita');
    Route::delete('/berita/delete/{berita}', [BeritaController::class, "destroy"])->name('delete-berita');
});
