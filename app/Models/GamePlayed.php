<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlayed extends Model
{
    use HasFactory;

    protected $table = 'games_played';

    protected $fillable = [
        'game_id',
        'score_1',
        'score_2',
        'score_3',
        'score_4',
        'total_score',
        'ip_address',
    ];

    public $timestamps = true;
}
