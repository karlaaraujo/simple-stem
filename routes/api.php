<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\ArtigoApiController;
use \App\Http\Controllers\Api\CategoriaApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*--------- Artigo -------------*/
Route::get('/artigo/id/{id}', [ArtigoApiController::class, 'getArtigoById']);

Route::get('/artigo/ultimos', [ArtigoApiController::class, 'getLastPostedArtigos']);


/*--------- Categoria -------------*/
Route::get('/categoria/{id}/getSubcategorias', [CategoriaApiController::class, 'getSubcategorias']);

