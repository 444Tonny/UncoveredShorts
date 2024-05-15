<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visit;
use App\Models\GamePlayed;

class StatsController extends Controller
{
    public function index()
    {
        $stats = 0;
        
        $visitStats = Visit::getVisitStats();

        $gamesStats = GamePlayed::getAdminGameStats();

        return view('admin.statistics.stats', compact('visitStats', 'gamesStats'));
    }
}
