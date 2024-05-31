<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Suggestion;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'game_id',
        'number',
        'value',
        'type',
        'sheet_url',
    ];

    public $timestamps = true;

    public function uniqueAnswers()
    {
        return $this->hasMany(UniqueAnswer::class);
    }

    public function rankedAnswers()
    {
        return $this->hasMany(RankedAnswer::class);
    }

    public function uniqueSubmitted()
    {
        return $this->hasMany(UniqueSubmitted::class);
    }

    public function rankedSubmitted()
    {
        return $this->hasMany(RankedSubmitted::class);
    }

    public function scopeByGameId($query, $gameId)
    {
        return $query->where('game_id', $gameId)->orderBy('number');
    }

    public static function synchronizeSuggestions($excelValues, $questionId)
    {
        try {
            DB::beginTransaction();

            Suggestion::where('question_id', $questionId)->delete();

            foreach ($excelValues as $answerData) {

                if(isset($answerData[0])) 
                {
                    Suggestion::updateOrCreate(
                        ['question_id' => $questionId, 'value' => $answerData[0]],
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
