<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UniqueAnswer extends Model
{
    use HasFactory;

    protected $table = 'unique_answers';

    protected $fillable = [
        'question_id',
        'percentage',
        'value',
        'votes'
    ];

    public $timestamps = true;

    public static function getAnswersByQuestionId($questionId)
    {
        return self::where('question_id', $questionId)->orderBy('percentage', 'ASC')->get();
    }

    public static function addVote($questionId, $value)
    {
        $uniqueAnswer = UniqueAnswer::where('question_id', $questionId)
                        ->where('value', $value)
                        ->first();

        if ($uniqueAnswer) {
            $uniqueAnswer->increment('votes');
            self::recalculatePercentage($uniqueAnswer->question_id);
        }
    }

    public static function recalculatePercentage($questionId)
    {
        // Récupérer le total des votes pour cette question
        $totalVotes = UniqueAnswer::where('question_id', $questionId)->sum('votes');

        // Récupérer toutes les réponses uniques pour cette question
        $answers = UniqueAnswer::where('question_id', $questionId)->get();

        // Mettre à jour les pourcentages pour chaque réponse unique
        foreach ($answers as $answer) {
            $newPercentage = (100 * ($answer->votes / $totalVotes));
            $answer->update(['percentage' => $newPercentage]);
        }
    }

    public static function synchroniseInitialPercentage($excelValues, $questionId, $verify = 'yes')
    {
        $totalPercentage = 0;

        try
        {
            foreach ($excelValues as $row) {
                if (isset($row[1]) && is_numeric($row[1])) {
                    $totalPercentage += $row[1];
                }
            }
        }
        catch(\Exception $e)
        {
            throw new \Exception('Synchronization failed. Please verify your Excel file.');
        }

        if($verify == 'yes')
        {
            if (number_format($totalPercentage, 1) != 100) {
                throw new \Exception('The sum of percentages must be exactly equal to 100%. Current total = '.number_format($totalPercentage, 1).'%');
            }
        }

        // Delete old percentages and insert new for that questions
        try {
            DB::beginTransaction();
            
            // Delete previous answers for that questions
            UniqueAnswer::where('question_id', $questionId)->delete();

            $question = Question::find($questionId);
            $question->uniqueSubmitted()->delete();

            // Reset totalPercentage and Insert new answers
            $totalPercentage = 0;

            foreach ($excelValues as $answerData) {

                // Verify if any empty case in the excel
                if (empty($answerData[1]) || empty($answerData[0])) 
                { 
                    // Even if other case are empty, if 100% don't show error message 
                    
                    // Temporary 
                    if($verify == 'yes')
                    {
                        if($totalPercentage == 100)
                        {
                            DB::commit();
                            return $excelValues;
                        }
                    }  
                }
        
                if(isset($answerData[1])) 
                {
                    $percentage = floatval($answerData[1]);
                    $totalPercentage = $totalPercentage + $answerData[1];

                    UniqueAnswer::updateOrCreate(
                        ['question_id' => $questionId, 'value' => $answerData[0]],
                        ['percentage' => $percentage, 'votes' => $percentage]
                    );
                }
            }

            DB::commit();
            return $excelValues;
        }
        catch (\Exception $e) 
        {
            DB::rollback();   
            throw new \Exception('An error occured.');
        }
    
        //return redirect()->back()->with('success', 'Answers updated successfully');
    }  
}
