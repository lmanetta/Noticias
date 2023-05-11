<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UserController;
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

// Route::get('/noticias', [NoticiaController::class, 'index' ]) -> name('noticias.index');
// Route::get('/noticias/{noticia}', [NoticiaController::class, 'show' ]) -> name('noticia.show');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::resource('noticias', NoticiaController::class);
Route::get('/noticiasConImagenes', [NoticiaController::class, 'conImagenes'])->name('noticias.conImagenes');