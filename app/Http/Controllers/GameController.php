<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game; 
use App\Models\GamePlayed;
use App\Models\Question; 
use App\Models\RankedAnswer;
use App\Models\UniqueAnswer; 
use App\Models\Visit; 

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
    public function index(Request $request)
    {
        //Visit::getCountryFromIP('70.26.212.228');
        $currentGame = Game::getCurrentGame();
        $currentGameId = $currentGame->id;

        // New statistics
        $trackedGameCount = Game::getTrackedGamesCount();
        $previousGame = Game::nearestLowerEndDate($currentGame);

        $questions = Question::byGameId($currentGameId)->get();

        $suggestions1 = Game::getDataFromSheet($questions[0]['sheet_url'], $questions[0]->id);
        $suggestions2 = Game::getDataFromSheet($questions[1]['sheet_url'], $questions[1]->id);
        $suggestions3 = Game::getDataFromSheet($questions[2]['sheet_url'], $questions[2]->id);
        $suggestions4 = Game::getDataFromSheet($questions[3]['sheet_url'], $questions[3]->id);

        $uniqueAnswers1 = UniqueAnswer::getAnswersByQuestionId($questions[0]->id);
        $uniqueAnswers2 = UniqueAnswer::getAnswersByQuestionId($questions[1]->id);
        $rankedAnswers3 = RankedAnswer::getAnswersByQuestionId($questions[2]->id);
        $rankedAnswers4 = RankedAnswer::getAnswersByQuestionId($questions[3]->id);

        $statistics = GamePlayed::getGameStats($currentGameId);

        // Check if a user has played (if the cookie with the game id exist in the user cookies)
        
        if($request->hasCookie('Game_'.$currentGameId))
        {
            $idGamePlayed = $request->cookie('Game_' . $currentGameId);
            $gameAlreadyPlayed = GamePlayed::find($idGamePlayed);
            $allScore = GamePlayed::where('game_id', $currentGame->id)
                                ->orderBy('total_score', 'DESC')
                                ->pluck('total_score')
                                ->toArray();
                                
            $percentile = GamePlayed::calculatePercentile($gameAlreadyPlayed->total_score, $allScore);
            $statistics['Percentile'] = $percentile;
        } 
        else 
        {
            $statistics['Percentile'] = 0;
            $gameAlreadyPlayed = null;
        }

        return view('game', compact('currentGame', 'questions', 
                                    'suggestions1', 'suggestions2', 'suggestions3', 'suggestions4',
                                    'uniqueAnswers1', 'uniqueAnswers2', 'rankedAnswers3', 'rankedAnswers4', 
                                    'statistics', 'gameAlreadyPlayed', 'trackedGameCount', 'previousGame'));
    }

    public function termsOfService(Request $request)
    {
        return view('terms-service');
    }

    public function getGameAlreadyPlayedInformations(Request $request)
    {
        $game_id = $request->input('game_id');
        $gamePlayed_id = $request->input('gamePlayed_id');

        $gameAlreadyPlayed = GamePlayed::find($gamePlayed_id);
        $allScore = GamePlayed::where('game_id', $game_id)
                            ->orderBy('total_score', 'DESC')
                            ->pluck('total_score')
                            ->toArray();
                            
        $percentile = GamePlayed::calculatePercentile($gameAlreadyPlayed->total_score, $allScore);
        
        $response = [
            'gameAlreadyPlayed' => $gameAlreadyPlayed,
            'percentile' => $percentile,
        ];
    
        return response()->json($response);
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

        $idGamePlayed = GamePlayed::storeGameSession($game_id, $score1, $score2, $score3, $score4, $totalScore);

        return response()->json(['success - new game stored' => true, 'idGamePlayed' => $idGamePlayed]);
    }   

    public function getStatisticsJSON(Request $request)
    {
        $game_id = $request->input('game_id');

        $statistics = GamePlayed::getGameStats($game_id);

        $playerScore = $request->input('player_score');
        $allScore = GamePlayed::where('game_id', $game_id)
                                ->orderBy('total_score', 'DESC')
                                ->pluck('total_score')
                                ->toArray();

        $percentile = GamePlayed::calculatePercentile($playerScore, $allScore);

        $statistics['Percentile'] = $percentile;

        return response()->json($statistics);
    }
}
