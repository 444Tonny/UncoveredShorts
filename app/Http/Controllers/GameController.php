<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game; 
use App\Models\GamePlayed;
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
        $currentGameId = $currentGame->id;

        $questions = Question::byGameId($currentGameId)->get();

        $suggestions1 = Game::getDataFromSheet($questions[0]['sheet_url']);
        $suggestions2 = Game::getDataFromSheet($questions[1]['sheet_url']);
        $suggestions3 = Game::getDataFromSheet($questions[2]['sheet_url']);
        $suggestions4 = Game::getDataFromSheet($questions[3]['sheet_url']);

        $uniqueAnswers1 = UniqueAnswer::getAnswersByQuestionId($questions[0]->id);
        $uniqueAnswers2 = UniqueAnswer::getAnswersByQuestionId($questions[1]->id);
        $rankedAnswers3 = RankedAnswer::getAnswersByQuestionId($questions[2]->id);
        $rankedAnswers4 = RankedAnswer::getAnswersByQuestionId($questions[3]->id);

        $statistics = GamePlayed::getGameStats($currentGameId);

        return view('game', compact('currentGame', 'questions', 
                                    'suggestions1', 'suggestions2', 'suggestions3', 'suggestions4',
                                    'uniqueAnswers1', 'uniqueAnswers2', 'rankedAnswers3', 'rankedAnswers4', 
                                    'statistics'));
    }


    // --- XHR Requests
    public function addVote(Request $request)
    {
        $questionId = $request->input('question_id');
        $value = $request->input('value');

        UniqueAnswer::addVote($questionId, $value);

        return response()->json(['success - vote added' => true]);
    }

    public function storeGameSession(Request $request)
    {
        $game_id = $request->input('game_id');
        $score1 = $request->input('score1');
        $score2 = $request->input('score2');
        $score3 = $request->input('score3');
        $score4 = $request->input('score4');
        $totalScore = $request->input('totalScore');

        GamePlayed::storeGameSession($game_id, $score1, $score2, $score3, $score4, $totalScore);

        return response()->json(['success - new game stored' => true]);
    }   

    public function getStatisticsJSON(Request $request)
    {
        $game_id = $request->input('game_id');

        $statistics = GamePlayed::getGameStats($game_id);
        return response()->json($statistics);
    }
}