<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RankedAnswer extends Model
{
    use HasFactory;

    protected $table = 'ranked_answers';

    protected $fillable = [
        'question_id',
        'rank',
        'value',
    ];

    public $timestamps = true;

    public static function getAnswersByQuestionId($questionId)
    {
        return self::where('question_id', $questionId)->orderBy('rank', 'DESC')->get();
    }

    public static function synchronizeInitialRanking($excelValues, $questionId)
    {
        $rankedAnswerCount = 0;

        try
        {
            foreach ($excelValues as $row) {
                if (isset($row[1]) && is_numeric($row[1])) {
                    $rankedAnswerCount ++;
                }
            }
        }
        catch(\Exception $e)
        {
            throw new \Exception('Synchronization failed. Please verify the content of the Excel file.');
        }

        if ($rankedAnswerCount != 10) {
            throw new \Exception('Synchronization failed. Top 10 is incomplete.');
        }

        // Delete old percentages and insert new for that questions
        try {
            DB::beginTransaction();
            
            // Delete previous answers for that questions
            RankedAnswer::where('question_id', $questionId)->delete();
            
            $question = Question::find($questionId);
            $question->rankedSubmitted()->delete();

            // Reset rankedAnswerCount and Insert new answers
            $rankedAnswerCount = 0;

            foreach ($excelValues as $answerData) {

                // Verify if any empty case in the excel
                if (empty($answerData[1]) || empty($answerData[0])) 
                { 
                    // Even if other case are empty, if top 10 count is exact, finish    
                    if($rankedAnswerCount == 10)
                    {
                        DB::commit();
                        return $excelValues;
                    }  
                }
        
                if(isset($answerData[1])) 
                {
                    $rank = intval($answerData[1]);
                    $rankedAnswerCount++;

                    RankedAnswer::updateOrCreate(
                        ['question_id' => $questionId, 'value' => $answerData[0]],
                        ['rank' => $rank]
                    );
                }
            }

            DB::commit();
        }
        catch (\Exception $e) 
        {
            DB::rollback();   
            throw new \Exception('An error occured.');
        }
    
        //return redirect()->back()->with('success', 'Answers updated successfully');
    }  
}
