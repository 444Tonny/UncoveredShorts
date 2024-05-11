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

        $uniqueAnswers1 = UniqueAnswer::getAnswersByQuestionId($questions[0]->id);
        $uniqueAnswers2 = UniqueAnswer::getAnswersByQuestionId($questions[1]->id);
        $rankedAnswers3 = RankedAnswer::getAnswersByQuestionId($questions[2]->id);
        $rankedAnswers4 = RankedAnswer::getAnswersByQuestionId($questions[3]->id);

        return view('game', compact('questions', 'suggestions1', 'suggestions2', 'suggestions3', 'suggestions4','uniqueAnswers1', 'uniqueAnswers2', 'rankedAnswers3', 'rankedAnswers4'));
    }

    public function addVote(Request $request)
    {
        $questionId = $request->input('question_id');
        $value = $request->input('value');

        UniqueAnswer::addVote($questionId, $value);

        return response()->json(['success' => true]);
    }
}
