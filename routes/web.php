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

/* Add vote unique */
Route::post('/add-vote', [App\Http\Controllers\GameController::class, 'addVote'])->name('addVote');


Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::middleware('auth')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
        Route::resource('games', \App\Http\Controllers\Admin\AdminGameController::class);
        Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);

        Route::resource('ranked-answers', \App\Http\Controllers\Admin\RankedAnswerController::class);
        Route::get('questions/{question}/ranked-answers', '\App\Http\Controllers\Admin\RankedAnswerController@show')->name('ranked-answers.show');
        Route::put('questions/{question}/ranked-answers/update-all', '\App\Http\Controllers\Admin\RankedAnswerController@updateAll')->name('ranked-answers.updateAll');

        Route::resource('unique-answers', \App\Http\Controllers\Admin\UniqueAnswerController::class);
        Route::get('questions/{question}/unique-answers', '\App\Http\Controllers\Admin\UniqueAnswerController@show')->name('unique-answers.show');
        Route::put('questions/{question}/unique-answers/update-all', '\App\Http\Controllers\Admin\UniqueAnswerController@updateAll')->name('unique-answers.updateAll');
    });
});

