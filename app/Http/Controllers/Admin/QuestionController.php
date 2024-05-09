<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|integer',
            'number' => 'required|integer',
            'value' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'sheet_url' => 'required|string',
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index')->with('success', 'Question created successfully');
    }

    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'game_id' => 'required|integer',
            'number' => 'required|integer',
            'value' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'sheet_url' => 'required|string',
        ]);

        $question->update($request->all());

        return redirect()->route('questions.index')->with('success', 'Question updated successfully');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Question deleted successfully');
    }
}
