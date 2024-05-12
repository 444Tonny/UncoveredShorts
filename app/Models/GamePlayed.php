<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

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
    
    public static function storeGameSession($game_id, $score1, $score2, $score3, $score4, $totalScore)
    {
        $ip_address = Request::ip();

        $gamePlayed = new GamePlayed([
            'game_id' => $game_id,
            'score_1' => $score1,
            'score_2' => $score2,
            'score_3' => $score3,
            'score_4' => $score4,
            'total_score' => $totalScore,
            'ip_address' => $ip_address,
        ]);

        $gamePlayed->save();

        return $gamePlayed;
    }

    public static function getGameStats($game_id)
    {
        // Top score
        $topScore = self::where('game_id', $game_id)->max('total_score');

        // Average score
        $averageScore = number_format(self::where('game_id', $game_id)->avg('total_score'), 1);

        // Games played
        $gamesPlayed = self::where('game_id', $game_id)->count();

        return [
            'TopScore' => $topScore,
            'AverageScore' => $averageScore,
            'GamesPlayed' => $gamesPlayed,
        ];
    }
}
