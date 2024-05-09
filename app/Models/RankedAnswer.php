<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return self::where('question_id', $questionId)->orderBy('rank')->get();
    }
}
