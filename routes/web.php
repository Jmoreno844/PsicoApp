<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PsicologoController;
use App\Http\Controllers\ArticleController;
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
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'login_method']);

Route::get('psicologos',[PsicologoController::class, 'listPsicologos']);

Route::any('login',[PsicologoController::class, 'listLogin']);

Route::get('account',[PsicologoController::class, 'listAccount']);

Route::get('logs',[PsicologoController::class, 'listLogs']);

Route::get('inicio',[PsicologoController::class, 'listInicio']);

Route::get('/chats',[PsicologoController::class, 'listChats']);

Route::get('/chats_backend',[PsicologoController::class, 'listChats_backend']);

Route::get('prueba',[PsicologoController::class, 'listprueba']);

Route::any('messages',[PsicologoController::class, 'listMessages']);

Route::get('terapia',[PsicologoController::class, 'listTerapia']);

Route::get('popup_page',[PsicologoController::class, 'listPopup']);

Route::get('sucessfull',[PsicologoController::class, 'listSuccessfull']);

Route::any('logs_texto',[PsicologoController::class, 'listlogs_elegir_texto']);

Route::any('logs_imagen',[PsicologoController::class, 'listlogs_elegir_imagen']);

Route::any('logs_details',[PsicologoController::class, 'listlogs_details']);

Route::any('create_account',[PsicologoController::class, 'listcreate_account']);

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');

Route::get('articulo1',[PsicologoController::class, 'listarticulo1']);
Route::get('articulo2',[PsicologoController::class, 'listarticulo2']);
Route::get('articulo3',[PsicologoController::class, 'listarticulo3']);
