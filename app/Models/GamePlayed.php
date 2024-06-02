<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Visit;

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
        'country'
    ];

    public $timestamps = true;
    
    public static function storeGameSession($game_id, $score1, $score2, $score3, $score4, $totalScore)
    {
        $ip_address = Request::ip();
        $countryName = Visit::getCountryFromIP($ip_address);

        $gamePlayed = new GamePlayed([
            'game_id' => $game_id,
            'score_1' => $score1,
            'score_2' => $score2,
            'score_3' => $score3,
            'score_4' => $score4,
            'total_score' => $totalScore,
            'ip_address' => $ip_address,
            'country' => $countryName
        ]);

        $gamePlayed->save();

        return $gamePlayed;
    }

    // Statistics for players
    public static function getGameStats($game_id)
    {
        // Top score
        $topScore = self::where('game_id', $game_id)->max('total_score');

        // Average score
        $averageScore = number_format(self::where('game_id', $game_id)->avg('total_score'), 1);

        // Games played
        $gamesPlayed = self::where('game_id', $game_id)->count();

        return [
            'TopScore' => round(($topScore !== null) ? $topScore : 0),
            'AverageScore' => round($averageScore),
            'GamesPlayed' => $gamesPlayed,
        ];
    }

    // Statistics for admin ------ start
    public static function getGamesStatsByCountry()
    {
        return static::select('country', DB::raw('COUNT(*) as played'))
            ->groupBy('country')
            ->orderBy('played', 'desc')
            ->get();
    }
    
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

    public static function calculatePercentile($playerScore, $allScore) {

        if($playerScore == 0) return 0;

        // Trier les scores des jeux joués en ordre décroissant
        rsort($allScore);
    
        // Trouver l'index du score du joueur dans le tableau trié
        $rank = array_search($playerScore, $allScore) + 1;
    
        // Calculer le percentile en utilisant la formule
        $totalPlayers = count($allScore);
        $percentile = (($totalPlayers - $rank) / ($totalPlayers - 1)) * 100;
    
        $percentile = round($percentile);

        return $percentile;
    }
    
}
