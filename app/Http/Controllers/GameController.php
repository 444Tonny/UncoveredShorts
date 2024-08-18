<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game; 
use App\Models\GamePlayed;
use App\Models\Question; 
use App\Models\RankedAnswer;
use App\Models\UniqueAnswer; 
use App\Models\Leaderboard; 
use App\Models\StreakLeaderboard; 
use App\Models\LeaderboardCategory; 
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
    public function index(Request $request, $game_id = null)
    {
        // Variable pour differencier si c'est le jeu actuel ou un jeu dans archive :
        $is_valid_for_streak = 1;

        //Visit::getCountryFromIP('70.26.212.228');
        if ($game_id) {
            // Si un game_id est passé, l'utiliser comme currentGame
            $currentGame = Game::find($game_id);
            $is_valid_for_streak = 0; 
        } else {
            // Sinon, récupérer le jeu actuel
            $currentGame = Game::getCurrentGame();
            $is_valid_for_streak = 1; 
        }

        $currentGameId = $currentGame->id;

        // Recuperer la liste des autres jeux a afficher dans archive
        $archiveGames = Game::where('id', '!=', $currentGameId)
                        ->where('is_archiveable', 1)
                        ->orderBy('date_start', 'DESC')
                        ->get();

        // New statistics
        $trackedGameCount = Game::getTrackedGamesCount();
        $previousGame = Game::nearestLowerEndDate($currentGame);

        $questions = Question::byGameId($currentGameId)->get();

        $suggestions1 = Game::getDataFromSheet($questions[0]['sheet_url'], $questions[0]->id);
        $suggestions2 = Game::getDataFromSheet($questions[1]['sheet_url'], $questions[1]->id);
        $suggestions3 = Game::getDataFromSheet($questions[2]['sheet_url'], $questions[2]->id);
        $suggestions4 = Game::getDataFromSheet($questions[3]['sheet_url'], $questions[3]->id);

        $leaderboard1 = Leaderboard::getTodaysTop($currentGameId, 10);
        $leaderboard2streak = StreakLeaderboard::getTopStreaks(10);

        $leaderboardGroups = LeaderboardCategory::getAllCategoriesAlphabetical();

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
                                    'archiveGames', 'is_valid_for_streak',
                                    'suggestions1', 'suggestions2', 'suggestions3', 'suggestions4',
                                    'uniqueAnswers1', 'uniqueAnswers2', 'rankedAnswers3', 'rankedAnswers4', 
                                    'statistics', 'gameAlreadyPlayed', 'trackedGameCount', 'previousGame',
                                    'leaderboard1', 'leaderboard2streak', 'leaderboardGroups'
                                ));
    }

    public function termsOfService(Request $request)
    {
        return view('terms-service');
    }

    /* Insert a new score in leaderboard */

    public function addScoreToTheLeaderboard(Request $request)
    {
        $gameId = $request->input('gameId');
        $initial = $request->input('initial');
        $unique_identifier = $request->input('unique_identifier');
        $totalScore = $request->input('totalScore');
        $selectedGroup = $request->input('selectedGroup');

        $leaderboardEntry = Leaderboard::addScore($gameId, $initial, $unique_identifier, $totalScore, $selectedGroup);

        $leaderboard1 = Leaderboard::getTodaysTop($gameId, 10);

        return response()->json($leaderboard1);
    }

    /* Player selected another group */
    public function changeScoreGroupLeaderboard(Request $request)
    {
        $gameId = $request->input('gameId');
        $unique_identifier = $request->input('unique_identifier');
        $selectedGroup = $request->input('selectedGroup');

        Leaderboard::updateCategoryNameByIdentifier($unique_identifier, $selectedGroup);
        $leaderboardUpdated = Leaderboard::getTopScoresByCategory($gameId, 5, $selectedGroup);

        return response()->json($leaderboardUpdated);
    }

    public function addStreakToTheLeaderboard(Request $request)
    {
        $gameId = $request->input('gameId');
        $initial = $request->input('initial');
        $unique_identifier = $request->input('unique_identifier');
        $personalStreak = $request->input('personalStreak');

        $leaderboardEntry = StreakLeaderboard::addStreak($gameId, $initial, $unique_identifier, $personalStreak);

        $leaderboard1 = StreakLeaderboard::getTopStreaks(10);

        return response()->json($leaderboard1);
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
        $is_valid_for_streak = $request->input('is_valid_for_streak');

        $idGamePlayed = GamePlayed::storeGameSession($game_id, $score1, $score2, $score3, $score4, $totalScore, $is_valid_for_streak);

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
