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
}
