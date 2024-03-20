<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Route::get('/docente', function () {
    return view('docente.index');
});


Route::get('docente/create', [DocenteController::class, 'create']);




Route::resource('docente', DocenteController::class)->middleware('auth');

Auth::routes(['register'=>False, 'reset'=>False]);

Route::get('/home', [App\Http\Controllers\DocenteController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [DocenteController::class, 'index'])->name('home');
});



Route::get('/materia', function () {
    return view('materia.index');
});
Route::get('materia/create', [MateriaController::class, 'create']);
Route::get('/home', [App\Http\Controllers\MateriaController::class, 'index'])->name('home');

Route::resource('materia', MateriaController::class)->middleware('auth');
Route::get('/home', [App\Http\Controllers\MateriaController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [MateriaController::class, 'index'])->name('home');
});