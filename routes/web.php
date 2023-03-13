<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BandaController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\AlbumController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('dashboard Inicial');


Route::middleware(['auth'])->group(function(){

    //Bandas
    Route::post('/bandas/store', [BandaController::class, 'store'])->name('bandas-store');
    Route::get('/bandas', [BandaController::class, 'index'])->name('bandas');
    Route::get('/bandas/create', [BandaController::class, 'create'])->name('bandas-create');
    Route::get('/bandas/edit/{id}', [BandaController::class, 'edit'])->name('bandas-edit');
    Route::get('/bandas/{id}', [BandaController::class, 'destroy'])->name('bandas-delete');
    Route::get('/bandas/show/{id}', [BandaController::class, 'show'])->name('bandas-show');
    Route::patch('/bandas/update/{id}', [BandaController::class, 'update'])->name('bandas-update');


    //Albumes
    Route::post('/albumes/store', [AlbumController::class, 'store'])->name('albumes-store');
    Route::get('/albumes', [AlbumController::class, 'index'])->name('albumes');
    Route::get('/albumes/create', [AlbumController::class, 'create'])->name('albumes-create');
    Route::get('/albumes/edit/{id}', [AlbumController::class, 'edit'])->name('albumes-edit');
    Route::get('/albumes/{id}', [AlbumController::class, 'destroy'])->name('albumes-delete');
    Route::get('/albumes/show/{id}', [AlbumController::class, 'show'])->name('albumes-show');
    Route::patch('/albumes/update/{id}', [AlbumController::class, 'update'])->name('albumes-update');

    //Canciones
    Route::post('/canciones/store', [CancionController::class, 'store'])->name('canciones-store');
    Route::get('/canciones', [CancionController::class, 'index'])->name('canciones');
    Route::get('/canciones/create', [CancionController::class, 'create'])->name('canciones-create');
    Route::get('/canciones/edit/{id}', [CancionController::class, 'edit'])->name('canciones-edit');
    Route::get('/canciones/{id}', [CancionController::class, 'destroy'])->name('canciones-delete');
    Route::get('/canciones/show/{id}', [CancionController::class, 'show'])->name('canciones-show');
    Route::patch('/canciones/update/{id}', [CancionController::class, 'update'])->name('canciones-update');


    Route::middleware(['admin'])->group(function(){
        //Generos
        Route::post('/generos/store', [GeneroController::class, 'store'])->name('generos-store');
        Route::get('/generos', [GeneroController::class, 'index'])->name('generos');
        Route::get('/generos/create', [GeneroController::class, 'create'])->name('generos-create');
        Route::get('/generos/edit/{id}', [GeneroController::class, 'edit'])->name('generos-edit');
        Route::get('/generos/{id}', [GeneroController::class, 'destroy'])->name('generos-delete');
        Route::get('/generos/show/{id}', [GeneroController::class, 'show'])->name('generos-show');
        Route::patch('/generos/update/{id}', [GeneroController::class, 'update'])->name('generos-update');
    });
});

require __DIR__.'/auth.php';