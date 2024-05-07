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

/* Public */
Route::get('/', [App\Http\Controllers\GameController::class, 'index'])->name('index');

Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::middleware('auth')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    });
    
    Route::resource('games', \App\Http\Controllers\Admin\GameController::class);
    
    Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
});

