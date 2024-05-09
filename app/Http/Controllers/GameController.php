<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game; 
use App\Models\Question; 
use App\Models\RankedAnswer;
use App\Models\UniqueAnswer; 

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentGame = Game::getCurrentGame();

        $questions = Question::byGameId($currentGame->id)->get();

        $suggestions1 = Game::getDataFromSheet($questions[0]['sheet_url']);
        $suggestions2 = Game::getDataFromSheet($questions[1]['sheet_url']);
        $suggestions3 = Game::getDataFromSheet($questions[2]['sheet_url']);
        $suggestions4 = Game::getDataFromSheet($questions[3]['sheet_url']);

        $rankedAnswers3 = RankedAnswer::getAnswersByQuestionId($questions[2]->id);
        $rankedAnswers4 = RankedAnswer::getAnswersByQuestionId($questions[3]->id);

        return view('game', compact('questions', 'suggestions1', 'suggestions2', 'suggestions3', 'suggestions4', 'rankedAnswers3', 'rankedAnswers4'));
    }
}
