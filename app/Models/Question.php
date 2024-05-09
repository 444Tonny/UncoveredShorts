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

    public function scopeByGameId($query, $gameId)
    {
        return $query->where('game_id', $gameId)->orderBy('number');
    }
}
