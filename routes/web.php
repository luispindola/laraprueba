<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Principal;
use App\Http\Controllers\Usuarios;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [Principal::class, 'inicio']);

Route::get('/usuarios', [Usuarios::class, 'create']);
Route::post('/usuarios', [Usuarios::class, 'store']);
Route::get('/usuarios/{id}/edit',[Usuarios::class, 'edit']);
Route::put('/usuarios/{id}/edit',[Usuarios::class, 'update']);
Route::get('/usuarios/{id}',[Usuarios::class, 'show']);
Route::delete('/usuarios/{id}',[Usuarios::class, 'destroy']);