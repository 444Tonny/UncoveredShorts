<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
