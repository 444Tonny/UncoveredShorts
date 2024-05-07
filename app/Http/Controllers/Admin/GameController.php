<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use App\Models\Game;
use App\Models\Question;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
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
                'questions.*.sheet_url' => 'nullable|url', // Validate that the sheet URL is optional but valid if present
            ]);
    
            DB::transaction(function () use ($request) {
                $game = Game::create($request->only('date_start', 'date_end') + ['status' => 'ready']);
    
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
    
            return redirect()->route('games.index');

        } catch (ValidationException $e) {
            dd($e->validator->getMessageBag()->all());
            return redirect()->back()->withErrors($e->validator->getMessageBag()->all())->withInput();
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withErrors(['An error occurred while processing your request. Please try again.'])->withInput();
        }
    }

    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
        ]);

        $game->update($request->all());
        return redirect()->route('games.index');
    }

    public function destroy(Game $game)
    {
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
}
