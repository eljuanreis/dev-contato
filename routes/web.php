<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LandingController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingController::class,'index'])->name('inicio');
//Route::get('/login', [LandingController::class,'index']);

Route::get('/contato', [ContatoController::class, 'index']);
Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store')->middleware('web', 'throttle:1,1');

Route::get('/login', [LandingController::class, 'mostrarLogin'])->name('admin.login');
Route::post('/login', [AdminController::class, 'autenticar'])->name('admin.login');

Route::middleware(AdminMiddleware::class)->prefix('/admin')->group(function(){
    Route::get('/painel', [AdminController::class, 'painel'])->name('admin.painel');
    Route::get('/painel/ver/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/painel/excluir/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('/painel/responder/{id}', [AdminController::class, 'responder'])->name('admin.responder');
    Route::post('/painel/responder/{id}', [AdminController::class, 'responder'])->name('admin.responder');

    Route::get('/sair', [AdminController::class, 'logout'])->name('admin.logout');
});
