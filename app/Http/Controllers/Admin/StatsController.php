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

        return view('admin.statistics.stats', compact('visitStats', 'gamesStats', 'countryStats', 'countryGamesStats'));
    }


}
