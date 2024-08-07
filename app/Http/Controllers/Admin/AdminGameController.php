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

class AdminGameController extends Controller
{
    public function index()
    {
        // To update current game status
        Game::getCurrentGame();

        $games = Game::select('*')->orderBy('date_start', 'DESC')->get();
        return view('admin.games.index', compact('games'));
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
                $game->update($request->only('date_start', 'date_end'));
    
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

    public function showStatistics(Request $request, $id_game)
    {
        $game = Game::find($id_game);

        $scoreStatistics = GamePlayed::getGameStats($id_game);

        $questions = Question::where('game_id', $id_game)->get();
        $statistics = [];

        foreach ($questions as $question) {
            $answers = [];

            if ($question->type == 'ranked') {
                $totalVotes = RankedSubmitted::where('question_id', $question->id)->count();
                $submittedAnswers = RankedSubmitted::select('value', 'is_correct', \DB::raw('count(*) as count'))
                    ->where('question_id', $question->id)
                    ->groupBy('value', 'is_correct')
                    ->orderBy('count', 'desc') 
                    ->get();
            } else {
                $totalVotes = UniqueSubmitted::where('question_id', $question->id)->count();
                $submittedAnswers = UniqueSubmitted::select('value', 'is_correct', \DB::raw('count(*) as count'))
                    ->where('question_id', $question->id)
                    ->groupBy('value', 'is_correct')
                    ->orderBy('count', 'desc') 
                    ->get();
            }

            foreach ($submittedAnswers as $answer) {
                $percentage = $totalVotes > 0 ? ($answer->count / $totalVotes) * 100 : 0;
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
        }

        //dd($statistics[516]['answers']);

        // Retourner les données à la vue
        return view('admin.games.statistics', ['scoreStatistics' => $scoreStatistics, 'statistics' => $statistics, 'questions' => $questions, 'game' => $game]);
    }
}
