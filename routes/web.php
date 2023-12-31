<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtigoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});


/*
 * Essa rota pode ser lida como: na chamada GET para o endpoint 'artigo/{id}',
 * execute o método lerArtigo do ArtigoController.php
 *
 */
Route::get('/artigo/{id}', [ArtigoController::class, 'lerArtigo'])
    ->name('artigo.ler');

Route::get('/artigos/listar/termo/{termo}', [ArtigoController::class, 'listarArtigosTermo'])
    ->name('artigo.listar.termo');

Route::get('/artigos/listar/subcategoria/{idSubcategoria}', [ArtigoController::class, 'listarArtigosSubcategoria'])
    ->name('artigo.listar.subcategoria');


// --------------- Rotas padrão do Laravel -----------------

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
