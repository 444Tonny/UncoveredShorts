<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Visit;
use App\Models\GamePlayed;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        try
        {
            $stats = 0;
            
            $visitStats = Visit::getVisitStats();

            $countryStats = Visit::getVisitStatsByCountry();

            $gamesStats = GamePlayed::getAdminGameStats();

            $countryGamesStats = GamePlayed::getGamesStatsByCountry();

            /* Line chart */

            // Recuperer le nombre de todays game 1j/7j/39j et Overall à partir du $chartDataGames
            $chartDataGames  = GamePlayed::getLineChartDataTodaysGame(30);
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
            $chartDataOverallGames = GamePlayed::getLineChartDataOverallGameByDay(30);

            $chartDataVisits = Visit::getLineChartVisitData($chartDataGamesCount, $chartDataGames['labels'][0]); 
            // $chartDataGames['labels'][0] contient la date la premiere date la plus ancienne dans le chart 

            return view('admin.statistics.stats', compact('chartDataGames', 
                                                            'visitStats', 'chartDataOverallGames', 'chartDataVisits',
                                                            'gamesStats', 'todaysGameStats', 'countryStats', 'countryGamesStats'));
            } 
            catch (\Exception $e) {
                Log::error('Erreur lors de la recuperation des statistiques : ' . $e->getMessage());
                dd($e->getMessage());
            }
        }
}
