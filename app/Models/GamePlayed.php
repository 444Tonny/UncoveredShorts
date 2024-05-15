<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Carbon;

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

    // Admin Stats ------ start
    
    public static function getAdminGameStats()
    {
        $now = now()->setTimezone('America/New_York');
        
        $todayGames = static::getGamesByDate($now->toDateString());

        $weekGames = static::getGamesByDateRange(
            $now->copy()->subDays(6)->toDateString(),
            $now->toDateString()
        );

        $monthGames = static::getGamesByDateRange(
            $now->copy()->subDays(29)->toDateString(),
            $now->toDateString()
        );

        $totalGames = static::count();

        return [
            'todayGames' => $todayGames,
            'weekGames' => $weekGames,
            'monthGames' => $monthGames,
            'totalGames' => $totalGames,
        ];
    }

    private static function getGamesByDate($date)
    {
        return static::whereDate('created_at', $date)->count();
    }

    private static function getGamesByDateRange($startDate, $endDate)
    {
        return static::whereBetween('created_at', [$startDate, $endDate])->count();
    }

    // Stats ------ end
}
