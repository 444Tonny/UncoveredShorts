<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visit;
use App\Models\GamePlayed;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        $stats = 0;
        
        $visitStats = Visit::getVisitStats();

        $countryStats = Visit::getVisitStatsByCountry();

        $gamesStats = GamePlayed::getAdminGameStats();

        $countryGamesStats = GamePlayed::getGamesStatsByCountry();

        /* Line chart */

        // Recuperer le nombre de todays game 1j/7j/39j et Overall à partir du $chartDataGames
        $chartDataGames  = GamePlayed::getLineChartDataTodaysGame();
        $chartDataGamesCount = count($chartDataGames['data']);

        // Inverser le tableau pour mettre au premier index le plus recents
        $recentData = array_reverse($chartDataGames['data']);

        // Calcul des jeux d'aujourd'hui (dernier élément)
        $todaysGameStats['todayGames'] = $recentData[0];
        // Calcul des jeux de la semaine (derniers 7 jours)
        $todaysGameStats['weekGames'] = array_sum(array_slice($recentData, 0, min(7, $chartDataGamesCount)));
        // Calcul des jeux du mois (derniers 30 jours)
        $todaysGameStats['monthGames'] = array_sum(array_slice($recentData, 0, min(30, $chartDataGamesCount)));
        // Calcul du total des jeux
        $todaysGameStats['totalGames'] = array_sum($recentData);


        // Recuperer les overall game
        $chartDataOverallGames = GamePlayed::getLineChartDataOverallGameByDay();

        $chartDataVisits = Visit::getLineChartVisitData($chartDataGamesCount);

        return view('admin.statistics.stats', compact('chartDataGames', 'chartDataVisits', 
                                                        'visitStats', 'chartDataOverallGames', 
                                                        'gamesStats', 'todaysGameStats', 'countryStats', 'countryGamesStats'));
    }


}
