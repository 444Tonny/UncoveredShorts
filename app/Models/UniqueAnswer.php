<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return self::where('question_id', $questionId)->orderBy('percentage')->get();
    }

    public static function addVote($questionId, $value)
    {
        $uniqueAnswer = UniqueAnswer::where('question_id', $questionId)
                        ->where('value', $value)
                        ->first();

        if ($uniqueAnswer) {
            $uniqueAnswer->increment('votes');
        }
    }
}
