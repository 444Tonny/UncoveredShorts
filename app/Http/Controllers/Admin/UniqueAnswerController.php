<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UniqueAnswer;
use App\Models\Question;
use Validator;

class UniqueAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uniqueAnswers = UniqueAnswer::all();
        return view('admin.unique-answers.index', compact('uniqueAnswers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unique-answers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'percentage' => 'required|decimal',
            'value' => 'required|string',
        ]);

        UniqueAnswer::create($validatedData);
        return redirect()->route('unique-answers.index');
    }

    public function show(Question $question)
    {
        $uniqueAnswers = UniqueAnswer::where('question_id', $question->id)->orderBy('created_at')->get();

        return view('admin.unique-answers.show', compact('uniqueAnswers', 'question'));
    }

    public function edit(UniqueAnswer $UniqueAnswer)
    {
        return view('admin.unique-answers.edit', compact('UniqueAnswer'));
    }

    public function update(Request $request, UniqueAnswer $UniqueAnswer)
    {
        $validatedData = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'percentage' => 'required|decimal',
            'value' => 'required|string',
        ]);

        $UniqueAnswer->update($validatedData);
        return redirect()->route('unique-answers.index');
    }

    public function updateAll(Request $request, $questionId)
    {
        foreach ($request->answers as $answerData) {

            $validator = Validator::make($answerData, [
                'percentage' => 'required|numeric',
                'answer' => 'required|string',
            ]);
            if ($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

            // Vérifier si le pourcentage ou la valeur est vide
            if (empty($answerData['percentage']) || empty($answerData['answer'])) {
                return redirect()->back()->with('error', 'Percentage and answer values are required');
            }
    
            $uniqueAnswer = UniqueAnswer::updateOrCreate(
                ['question_id' => $questionId, 'value' => $answerData['answer']],
                ['percentage' => $answerData['percentage']]
            );
        }
    
        return redirect()->back()->with('success', 'Answers updated/created successfully');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UniqueAnswer $UniqueAnswer)
    {
        $UniqueAnswer->delete();
        return redirect()->route('unique-answers.index');
    }
}
