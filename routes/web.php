<?php

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
Route::middleware('auth')->group(function (){
    Route::get('/', [\App\Http\Controllers\TodoController::class, 'index']);
    Route::post('/store', [\App\Http\Controllers\TodoController::class, 'store']);
    Route::post('/update/{todo}', [\App\Http\Controllers\TodoController::class, 'update']);
    Route::post('/destroy/{todo}', [\App\Http\Controllers\TodoController::class, 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
