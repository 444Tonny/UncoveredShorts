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
        'country',
        'is_valid_for_streak'
    ];

    public $timestamps = true;

    /*
    public static function hasAlreadyPlayed($game_id)
    {
        $ip_address = Request::ip();

        $whiteListIPs = [
            '192.168.10.120',
            '192.168.10.121',
            '104.28.50.187',
            '70.26.212.228', // Tonny PC
            '127.0.0.1'
        ];

        if (in_array($ip_address, $whiteListIPs)) {
            return -1;
        }

        $gamePlayed = DB::table('games_played')
                    ->where('game_id', $game_id)
                    ->where('ip_address', $ip_address)
                    ->first();

        // Si une entrée est trouvée, retourner true, sinon retourner false
        if($gamePlayed !== null) return $gamePlayed->total_score; 
        else return -1;
    }
    */

    public static function storeGameSession($game_id, $score1, $score2, $score3, $score4, $totalScore, $is_valid_for_streak)
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
            'country' => $countryName,
            'is_valid_for_streak' => $is_valid_for_streak
        ]);

        $gamePlayed->save();

        return $gamePlayed->id;
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

    // Recupere les jeux joué uniquement par id et le jour meme
    public static function getLineChartDataTodaysGame()
    {
        $now = now()->setTimezone('America/New_York');

        $startOfDay = $now->copy()->startOfDay(); // today at 00:00
        $endOfDay = $now->copy()->endOfDay(); // today at 23:59

        $games = Game::where('date_start', '<=', $now)
                        ->orderBy('date_start', 'desc')
                        ->get()
                        ->reverse();

                        //dd($games);

        // Initialiser les arrays pour les labels et les données
        $labels = [];
        $data = [];

        // Parcourir chaque jeu pour obtenir le nom et le nombre de jeux joués
        foreach ($games as $game) {
            $labels[] = date('d/m/y',  strtotime($game->date_start));
            $countGamePlayed = GamePlayed::where('game_id', $game->id)
                                            ->where('created_at', '<=', $game->date_end)
                                            ->where('created_at', '>=', $game->date_start)
                                            ->count();           

            $data[] = $countGamePlayed;
            $startOfDay->subDay();
        }

        // Formater les données comme requis
        $formattedData = [
            'labels' => $labels,
            'data' => $data,
        ];

        //dd($formattedData);

        return $formattedData;
    }

    // Recupere les jeux joués aujourd'hui uniquement
    public static function getLineChartDataOverallGameByDay($limit)
    {
        $now = now()->setTimezone('America/New_York');

        // Initialiser les arrays pour les labels et les données
        $labels = [];
        $data = [];

        // pour boucler au meme nombre de jeux
        $games = Game::where('date_start', '<=', $now)
            ->orderBy('date_start', 'desc')
            ->limit($limit)
            ->get()
            ->reverse();


        // Parcourir chaque jeu pour obtenir le nom 
        foreach ($games as $game) {
            $labels[] = $game->name;

            // Compter le nombre de jeux joués aujourd'hui (any)
            //$countGamePlayed = GamePlayed::whereBetween('created_at', [$startOfDay, $endOfDay])->count();
            $countGamePlayed = static::getGamesByDate(Carbon::parse($game->date_start)->toDateString());

            //dd(Carbon::parse($game->date_start)->toDateString());

            $data[] = $countGamePlayed;
        }

        $formattedData = [
            'labels' => $labels,
            'data' => $data,
        ];

        //dd($formattedData);
        return $formattedData;
    }

    public static function getGamesStatsByCountry()
    {

        $now = now()->setTimezone('America/New_York')->toDateString();
        $last7days = now()->setTimezone('America/New_York')->subDays(6)->toDateString();
        return static::select('country', DB::raw('COUNT(*) as played'))
            ->whereBetween('created_at', [$last7days, $now]) // Filtrer les jeux des 7 derniers jours en EST
            ->groupBy('country')
            ->orderByDesc('played')
            ->get();
    }

    // Pour les blocs de 4 carres TODAY avec les stats
    public static function getAdminGameStatsForTodaysGame()
    {
        $now = now()->setTimezone('America/New_York');

        $todayGames = static::getGamesPlayedSameDayByDateRange($now->copy()->startOfDay(), $now->copy()->startOfDay()->addHours(25));

        $weekGames = static::getGamesPlayedSameDayByDateRange(
            $now->copy()->subDays(7)->toDateString(),
            $now->toDateString()
        );

        $monthGames = static::getGamesPlayedSameDayByDateRange(
            $now->copy()->subDays(30)->toDateString(),
            $now->toDateString()
        );

        $totalGames = static::getGamesPlayedSameDayByDateRange('2024-01-01', now());

        return [
            'todayGames' => $todayGames,
            'weekGames' => $weekGames,
            'monthGames' => $monthGames,
            'totalGames' => $totalGames,
        ];
    }

    // Pour les blocs de 4 carres OVERALL avec les stats
    public static function getAdminGameStats()
    {
        $now = now()->setTimezone('America/New_York');

        $todayGames = static::getGamesByDate($now->toDateString());

        $weekGames = static::getGamesByDateRange(
            $now->copy()->subDays(7)->toDateString(),
            $now->toDateString()
        );

        $monthGames = static::getGamesByDateRange(
            $now->copy()->subDays(30)->toDateString(),
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

    // Fonction pour recuperer le nombres de jeux d'une game via une date donnée
    private static function getGamesByDate($date)
    {
        return static::whereDate('created_at', $date)->count();
        //return static::whereDate(\DB::raw("DATE_SUB(created_at, INTERVAL 4 HOUR)"), $date)->count();
    }

    // Pour recuperer le nombre de tous les jeux entre deux dates
    private static function getGamesByDateRange($startDate, $endDate)
    {
        return static::whereBetween('created_at', [$startDate, $endDate])->count();
    }

    // Pour recuperer le nombre de jeux jouées le jour même. 
    public static function getGamesPlayedSameDayByDateRange($startDate, $endDate)
    {
        // Récupérer les jeux dont la période est dans l'intervalle donné
        $games = Game::where('date_start', '>=', $startDate)
             ->where('date_end', '<=', $endDate)
             ->get();

        $total = 0;

        foreach ($games as $game) {
            $total += self::where('game_id', $game->id)
                        ->whereBetween('created_at', [$game->date_start, $game->date_end])
                        ->count();
        }

        return $total;
    }

    public static function calculatePercentile($playerScore, $allScore)
    {

        if ($playerScore == 0)
            return 0;

        // Trier les scores des jeux joués en ordre décroissant
        rsort($allScore);

        // Trouver l'index du score du joueur dans le tableau trié
        $rank = array_search($playerScore, $allScore) + 1;

        // Calculer le percentile en utilisant la formule
        $totalPlayers = count($allScore);

        if ($totalPlayers == 1 && $playerScore > 0)
            return 100;
        else if ($totalPlayers == 1 && $playerScore == 0)
            return 0;

        try {
            $percentile = (($totalPlayers - $rank) / ($totalPlayers - 1)) * 100;
            $percentile = round($percentile);
            return $percentile;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
