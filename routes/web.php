<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

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
Route::post('/store-game-session', [App\Http\Controllers\GameController::class, 'storeGameSession'])->name('storeGameSession');
Route::post('/get-statistics', [App\Http\Controllers\GameController::class, 'getStatisticsJSON'])->name('getStatisticsJSON');
Route::post('/store-player-unique', [App\Http\Controllers\Admin\UniqueAnswerController::class, 'storePlayerUniqueAnswer'])->name('storePlayerUniqueAnswer');
Route::post('/store-player-ranked', [App\Http\Controllers\Admin\RankedAnswerController::class, 'storePlayerRankedAnswer'])->name('storePlayerRankedAnswer');
Route::post('/record-visit', [App\Http\Controllers\Admin\VisitsController::class, 'recordVisit'])->name('recordVisit');
Route::post('/send-feedback', [FeedbackController::class, 'send'])->name('send.feedback');

Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::middleware('auth')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\AdminGameController::class, 'index'])->name('home');
    
        Route::resource('games', \App\Http\Controllers\Admin\AdminGameController::class);
        Route::get('games/{id}/statistics', '\App\Http\Controllers\Admin\AdminGameController@showStatistics')->name('game.showStatistics');

        Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
        Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);

        Route::get('credentials', '\App\Http\Controllers\Admin\CredentialsController@indexEditor')->name('adminCredentials');
        Route::put('credentials', '\App\Http\Controllers\Admin\CredentialsController@editPassword')->name('passwordEdited');
            

        Route::resource('ranked-answers', \App\Http\Controllers\Admin\RankedAnswerController::class);
        Route::get('questions/{question}/ranked-answers', '\App\Http\Controllers\Admin\RankedAnswerController@show')->name('ranked-answers.show');
        Route::put('questions/{question}/ranked-answers/update-all', '\App\Http\Controllers\Admin\RankedAnswerController@updateAll')->name('ranked-answers.updateAll');
        Route::get('questions/{question}/ranked-answers/synchronize', '\App\Http\Controllers\Admin\RankedAnswerController@synchronize')->name('ranked-answers.synchronize');

        Route::resource('unique-answers', \App\Http\Controllers\Admin\UniqueAnswerController::class);
        Route::get('questions/{question}/unique-answers', '\App\Http\Controllers\Admin\UniqueAnswerController@show')->name('unique-answers.show');
        Route::put('questions/{question}/unique-answers/update-all', '\App\Http\Controllers\Admin\UniqueAnswerController@updateAll')->name('unique-answers.updateAll');
        Route::get('questions/{question}/unique-answers/synchronize', '\App\Http\Controllers\Admin\UniqueAnswerController@synchronize')->name('unique-answers.synchronize');
    
        Route::get('statistics', '\App\Http\Controllers\Admin\StatsController@index')->name('statistics.index');
    });
});

// 404 not found pages
Route::fallback(function () {
    return redirect()->route('index'); 
});
