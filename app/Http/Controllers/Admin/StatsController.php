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
            $todaysGameStats = GamePlayed::getAdminGameStatsForTodaysGame();
            $overallGamesStats = GamePlayed::getAdminGameStats();
            $countryGamesStats = GamePlayed::getGamesStatsByCountry();

            /* Line chart */

            // Recuperer le nombre de todays game 1j/7j/39j et Overall à partir du $chartDataGames
            $chartDataGames  = GamePlayed::getLineChartDataTodaysGame();
            $chartDataGamesCount = count($chartDataGames['data']);      

            // Compter les datas
            $data = $chartDataGames['data'];
            $count = count($data);

            // Inverser le tableau pour mettre au premier index le plus recents
            // $recentData = array_reverse($chartDataGames['data']);

            // Recuperer les overall game
            $chartDataOverallGames = GamePlayed::getLineChartDataOverallGameByDay(30);

            // Slice le tableau pour ne récuperer que les 30 derniers:
            $chartDataGamesCount = count($chartDataGames['data']);
            $limit = 30;
            $start = max(0, $chartDataGamesCount - $limit);

            // Appliquer slice sur les 2 tableaux en parallèle
            $chartDataGames['data'] = array_slice($chartDataGames['data'], $start);
            $chartDataGames['labels'] = array_slice($chartDataGames['labels'], $start);

            //$chartDataVisits = Visit::getLineChartVisitData(30, $chartDataGames['labels'][0]); 
            // $chartDataGames['labels'][0] contient la date la premiere date la plus ancienne dans le chart 

            return view('admin.statistics.stats', compact('chartDataGames', 
                                                            'visitStats', 'chartDataOverallGames',
                                                            'overallGamesStats', 'todaysGameStats', 'countryStats', 'countryGamesStats'));
            } 
            catch (\Exception $e) {
                Log::error('Erreur lors de la recuperation des statistiques : ' . $e->getMessage());
                dd($e->getMessage());
            }
        }
}
