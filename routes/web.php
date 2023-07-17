<?php

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

Route::get('/',[UserController::class,'index']);
Route::get('/usuario/{user_id}',[UserController::class,'view']);
Route::get('/usuarios/editar/{user_id}',[UserController::class,'edit']);
Route::post('/usuarios/editar/{user_id}',[UserController::class,'editAction']);
//
Route::get('/usuarios/excluir/{user_id}',[UserController::class,'delete']);
Route::post('/usuarios/excluir/{user_id}',[UserController::class,'deleteAction']);

//Cadastro
Route::get('/cadastro',[UserController::class,'register']);
Route::post('/cadastro',[UserController::class,'registerAction']);
