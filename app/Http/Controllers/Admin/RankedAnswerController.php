<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RankedAnswer;
use App\Models\Question;
use Validator;

class RankedAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rankedAnswers = RankedAnswer::all();
        return view('admin.ranked-answers.index', compact('rankedAnswers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ranked-answers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'rank' => 'required|integer',
            'value' => 'required|string',
        ]);

        RankedAnswer::create($validatedData);
        return redirect()->route('ranked-answers.index');
    }

    public function show(Question $question)
    {
        $rankedAnswers = RankedAnswer::where('question_id', $question->id)->orderBy('rank')->get();

        return view('admin.ranked-answers.show', compact('rankedAnswers', 'question'));
    }

    public function edit(RankedAnswer $rankedAnswer)
    {
        return view('admin.ranked-answers.edit', compact('rankedAnswer'));
    }

    public function update(Request $request, RankedAnswer $rankedAnswer)
    {
        $validatedData = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'rank' => 'required|integer',
            'value' => 'required|string',
        ]);

        $rankedAnswer->update($validatedData);
        return redirect()->route('ranked-answers.index');
    }

    public function updateAll(Request $request, $questionId)
    {
        $errors = [];

        foreach ($request->answers as $index => $answerData) {

            // Check if answer is empty
            if (empty($answerData['answer'])) {
                $errors[] = "Answer at rank " . ($index + 1) . " is empty.";
            }

            // Search or Create the answer
            $rankedAnswer = RankedAnswer::updateOrCreate(
                ['question_id' => $questionId, 'rank' => $index + 1],
                ['value' => $answerData['answer']]
            );
        }

        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors)->withInput();
        }

        return redirect()->back()->with('success', 'Ranked answers updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RankedAnswer $rankedAnswer)
    {
        $rankedAnswer->delete();
        return redirect()->route('ranked-answers.index');
    }
}
