<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'value',
    ];

    // Définir la relation avec le modèle Question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public static function getSuggestionsByQuestionId($questionId)
    {
        return self::where('question_id', $questionId)
                    ->pluck('value')
                    ->toArray();
    }
}
