<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Game;
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
        // Verify inputs value
        $validator = Validator::make($request->all(), [
            'answers.*.percentage' => 'nullable|numeric', 
            'answers.*.answer' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // Verify if sum = 100%
        $totalPercentage = 0;

        foreach ($request->answers as $answerData) {
            if ($answerData['percentage'] !== null) $totalPercentage += $answerData['percentage'];
        }

        if ($totalPercentage != 100) {
            $validator->errors()->add('answers', 'The sum of percentages must be exactly equal to 100%');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Delete old percentages and insert new for that questions
        try {
            DB::beginTransaction();
          
            // Delete previous answers for that questions
            UniqueAnswer::where('question_id', $questionId)->delete();

            // Insert new answers
            $totalPercentage = 0;

            foreach ($request->answers as $answerData) {

                // Verify if any empty field
                if (empty($answerData['percentage']) || empty($answerData['answer'])) 
                { 
                    // Even if other inputs are empty, if 100% commit, and don't show error message     
                    if($totalPercentage == 100)
                    {
                        DB::commit();
                        return redirect()->back()->with('success', 'Answers updated successfully');
                    } 
                    else
                    {
                        DB::rollBack();

                        $validator->errors()->add('answers', 'Percentage and answer values are required');
                        return redirect()->back()->withErrors($validator)->withInput();   
                    }    
                }
        
                $percentage = floatval($answerData['percentage']);

                UniqueAnswer::updateOrCreate(
                    ['question_id' => $questionId, 'value' => $answerData['answer']],
                    ['percentage' => $percentage, 'votes' => $percentage]
                );
                
                $totalPercentage = $totalPercentage + $answerData['percentage'];
            }

            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollback();
            $validator->errors()->add('answers', 'An error occured : '.$e);
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        return redirect()->back()->with('success', 'Answers updated successfully');
    }    

    public function synchronize(Request $request, $questionId)
    {
        $question = Question::where('id', $questionId)->first();
        $excelData = Game::getArray2DFromSheet($question->sheet_url, $questionId);

        try
        {
            UniqueAnswer::synchroniseInitialPercentage($excelData, $questionId);
            return redirect()->back()->with('success', 'Synchronization done successfully.');
        }
        catch(\Exception $e)
        {
            dd($e);
            return redirect()->back()->withErrors($e);
        }
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
