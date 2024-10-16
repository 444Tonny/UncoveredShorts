<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GamePlayed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use App\Models\Game;
use App\Models\Question;
use App\Models\RankedSubmitted;
use App\Models\UniqueSubmitted;
use App\Models\RankedAnswer;
use App\Models\UniqueAnswer; 
use App\Models\Leaderboard; 
use App\Models\StreakLeaderboard; 
use App\Models\LeaderboardCategory; 

class AdminGameController extends Controller
{
    public function index()
    {
        // To update current game status
        Game::getCurrentGame();

        $games = Game::select('*')->orderBy('date_start', 'DESC')->paginate(30);
        return view('admin.games.index', compact('games'));
    }

    public function previewGame($gameID)
    {
        $currentGame = Game::find($gameID);
        // Sinon, récupérer le jeu actuel
        $is_valid_for_streak = 0; 

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

        // Les reponses utilisees pour le calcul des points
        $uniqueAnswers1 = UniqueAnswer::getAnswersByQuestionId($questions[0]->id);
        $uniqueAnswers2 = UniqueAnswer::getAnswersByQuestionId($questions[1]->id);
        $rankedAnswers3 = RankedAnswer::getAnswersByQuestionId($questions[2]->id);
        $rankedAnswers4 = RankedAnswer::getAnswersByQuestionId($questions[3]->id);

        // Pour afficher les reponses corrects les plus choisies
        $submittedAnswers1 = UniqueSubmitted::select('value', 'is_correct', \DB::raw('count(*) as count'))
                    ->where('question_id', $questions[0]->id)
                    ->groupBy('value', 'is_correct')
                    ->orderBy('count', 'desc') 
                    ->get();

        $submittedAnswers2 = UniqueSubmitted::select('value', 'is_correct', \DB::raw('count(*) as count'))
                    ->where('question_id', $questions[1]->id)
                    ->groupBy('value', 'is_correct')
                    ->orderBy('count', 'desc') 
                    ->get();

        $statistics = GamePlayed::getGameStats($currentGameId);

        // Check if a user has played (if the cookie with the game id exist in the user cookies)
        
        $statistics['Percentile'] = 0;
        $gameAlreadyPlayed = null;

        // Donner un id temporaire 
        $currentGame->id = mt_rand(199999, 999999);
        

        return view('game', compact('currentGame', 'questions',
                                    'archiveGames', 'is_valid_for_streak',
                                    'suggestions1', 'suggestions2', 'suggestions3', 'suggestions4',
                                    'uniqueAnswers1', 'uniqueAnswers2', 'rankedAnswers3', 'rankedAnswers4', 
                                    'statistics', 'gameAlreadyPlayed', 'trackedGameCount', 'previousGame',
                                    'leaderboard1', 'leaderboard2streak', 'leaderboardGroups'
                                ));
    }

    public function updateArchiveable(Request $request, Game $game)
    {
        // Mettre à jour la colonne is_archiveable en fonction de la valeur de la case à cocher
        $game->is_archiveable = $request->has('is_archiveable') ? 1 : 0;
        $game->save();

        // Rediriger ou retourner une réponse
        return back()->with('success', 'The archive status has been updated.');
    }

    public function create()
    {
        $nextId = Game::max('id') + 1;
        return view('admin.games.create', ['nextId' => $nextId]);
    }

    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'date_start' => 'required|date',
                'date_end' => 'required|date|after:date_start',
                'questions' => 'required|array|min:4', // Validate that 'questions' is an array with at least 4 elements
                'questions.*.value' => 'required|string', // Validate that each question has a value (text)
                'questions.*.type' => 'required', // Validate that each question has a valid type
                'questions.*.sheet_url' => 'url', // Validate that the sheet URL is optional but valid if present
            ]);
    
            DB::transaction(function () use ($request) {
                $game = Game::create($request->only('date_start', 'date_end') + ['status' => 'ready', 'name' => $request->input('name')]);
    
                // Insert the questions associated with this game
                foreach ($request->questions as $questionData) {
                    $question = new Question([
                        'game_id' => $game->id,
                        'number' => $questionData['number'], // Fill in if necessary
                        'value' => $questionData['value'],
                        'type' => $questionData['type'],
                        'sheet_url' => $questionData['sheet_url'] ?? '',
                    ]);
                    $question->save();
                }
            });
    
            return redirect()->back()->with('success', 'Game created successfully!');

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag()->all())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['An error occurred while processing your request. Please try again.'])->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'date_start' => 'required|date',
                'date_end' => 'required|date|after:date_start',
                'questions' => 'required|array|min:4', // Validate that 'questions' is an array with at least 4 elements
                'questions.*.value' => 'required|string', // Validate that each question has a value (text)
                'questions.*.type' => 'required', // Validate that each question has a valid type
                'questions.*.sheet_url' => 'nullable|url', // Validate that the sheet URL is optional but valid if present
            ]);
    
            DB::transaction(function () use ($request, $id) {
                $game = Game::findOrFail($id);
                $game->update($request->only('name', 'date_start', 'date_end'));
    
                // Update or insert the questions associated with this game
                foreach ($request->questions as $questionData) {

                    if (isset($questionData['id'])) {
                        $question = Question::findOrFail($questionData['id']);
                        $question->update([
                            'number' => $questionData['number'], // Fill in if necessary
                            'value' => $questionData['value'],
                            'type' => $questionData['type'],
                            'sheet_url' => $questionData['sheet_url'] ?? '',
                        ]);
                    } else {
                        $question = new Question([
                            'game_id' => $game->id,
                            'number' => $questionData['number'], // Fill in if necessary
                            'value' => $questionData['value'],
                            'type' => $questionData['type'],
                            'sheet_url' => $questionData['sheet_url'] ?? '',
                        ]);
                        $question->save();
                    }
                }
            });
    
            return redirect()->back()->with('success', 'Game updated successfully!');
    
        } catch (ValidationException $e) 
        {
            return redirect()->back()->withErrors($e->validator->getMessageBag()->all())->withInput();
        } catch (\Exception $e) 
        {
            return redirect()->back()->withErrors(['An error occurred while processing your request. Please try again:' .$e])->withInput();
        }
    }

    public function destroy(Game $game)
    {
        if (Game::count() <= 1) {
            return redirect()->back()->with('error', 'You need at least 1 game.');
        }

        // Récupérer toutes les questions associées à la Game
        $questions = Question::where('game_id', $game->id)->get();
        $gamePlayed = GamePlayed::where('game_id', $game->id)->get();

        // Parcourir chaque question et supprimer les enregistrements liés dans les tables
        foreach ($questions as $question) {
            $question->uniqueAnswers()->delete();
            $question->rankedAnswers()->delete();
            $question->uniqueSubmitted()->delete();
            $question->rankedSubmitted()->delete();
            $question->suggestions()->delete();
        }

        $game->questions()->delete();
        $game->gameplayed()->delete();
        $game->leaderboards()->delete();
        $game->leaderboardStreak()->delete();
        $game->delete();
        return redirect()->route('games.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    // Afficher les statistique de chaque jeu individuel dans l'admin
    public function showStatistics(Request $request, $id_game)
    {
        $game = Game::find($id_game);

        $scoreStatistics = GamePlayed::getGameStats($id_game);

        // Nombre de jeux joué à temps
        $gamePlayedTheDayCount = GamePlayed::where('game_id', $id_game)
                                ->where('created_at', '>=', $game->date_start)
                                ->where('created_at', '<=', $game->date_end)->count();

        // Nombre de jeux joué via archive
        $gamePlayedArchiveCount = GamePlayed::where('game_id', $id_game)
                                ->where('created_at', '>', $game->date_end)->count();

        $questions = Question::where('game_id', $id_game)->get();
        $statistics = [];


        // index pour stocker le nombre de correct answer
        $iCA = 0; 
        $correctAnswerCount = array();
        $totalVotes = array();

        foreach ($questions as $question) {
            $answers = [];
            $correctAnswerCount[$iCA] = 0;
            $totalVotes[$iCA] = 0;

            if ($question->type == 'ranked' or $question->type == 'ranked-few') {
                $totalVotes[$iCA] = RankedSubmitted::where('question_id', $question->id)->count();
                $submittedAnswers = RankedSubmitted::select('value', 'is_correct', \DB::raw('count(*) as count'))
                    ->where('question_id', $question->id)
                    ->groupBy('value', 'is_correct')
                    ->orderBy('count', 'desc') 
                    ->get();

                $correctAnswerCount[$iCA] = RankedSubmitted::where('question_id', $question->id)
                    ->where('is_correct', 1)
                    ->count();
            }
            else {
                $totalVotes[$iCA] = UniqueSubmitted::where('question_id', $question->id)->count();
                $submittedAnswers = UniqueSubmitted::select('value', 'is_correct', \DB::raw('count(*) as count'))
                    ->where('question_id', $question->id)
                    ->groupBy('value', 'is_correct')
                    ->orderBy('count', 'desc') 
                    ->get();

                $correctAnswerCount[$iCA] = UniqueSubmitted::where('question_id', $question->id)
                    ->where('is_correct', 1)
                    ->count();
            }

            foreach ($submittedAnswers as $answer) {
                $percentage = $totalVotes[$iCA] > 0 ? ($answer->count / $totalVotes[$iCA]) * 100 : 0;
                $answers[] = [
                    'value' => $answer->value,
                    'is_correct' => $answer->is_correct,
                    'count' => $answer->count,
                    'percentage' => $percentage,
                ];
            }

            $statistics[$question->id] = [
                'type' => $question->type,
                'answers' => $answers,
            ];

            $iCA++;
        }

        // Retourner les données à la vue
        return view('admin.games.statistics', ['totalVotes' => $totalVotes, 'scoreStatistics' => $scoreStatistics, 'statistics' => $statistics, 'questions' => $questions, 'game' => $game, 'gamePlayedArchiveCount' => $gamePlayedArchiveCount, 'gamePlayedTheDayCount' => $gamePlayedTheDayCount, 'correctAnswerCount' => $correctAnswerCount]);
    }
}
