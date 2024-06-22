<?php

namespace App\Models;

use Google\Service\Connectors\ExchangeAuthCodeRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\DB;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'country', 'date_visit', 'created_at', 'updated_at'];

    /* Country stats */
    public static function getVisitStatsByCountry()
    {
        $last7days = now()->setTimezone('America/New_York')->subDays(6)->toDateString();
        return static::select('country', DB::raw('COUNT(*) as visits'))
                    ->whereDate('date_visit', '>=', $last7days)
                    ->groupBy('country')
                    ->orderByDesc('visits')
                    ->get();
    }

    // line graph
    public static function getLineChartVisitData($displayCount)
    {
        $now = now()->setTimezone('America/New_York');

        $visits = Visit::where('date_visit', '<=', $now)
            ->orderBy('date_visit', 'desc')
            ->get()
            ->reverse();

        // Initialiser les arrays pour les labels et les données
        $labels = [];
        $data = [];

        // Grouper les visites par date
        $visitsByDate = $visits->groupBy(function ($visit) {
            return Carbon::parse($visit->date_visit)->format('Y-m-d');
        });

        // Parcourir chaque groupe de visites pour obtenir la date et le nombre de visites
        foreach ($visitsByDate as $date => $dailyVisits) {
            $labels[] = $date;
            $data[] = $dailyVisits->count();
        }

        // Prendre les 10 dernières données
        $labels = collect($labels)->slice($displayCount * (-1))->values()->all();
        $data = collect($data)->slice($displayCount * (-1))->values()->all();


        // Formater les données comme requis
        $formattedData = [
            'labels' => $labels,
            'data' => $data,
        ];

        //dd($formattedData);

        return $formattedData;
    }

    public static function getTotalVisitsByCountry()
    {
        $last7days = now()->setTimezone('America/New_York')->subDays(6)->toDateString();
        return static::select(DB::raw('COUNT(*) as total_visits'))
            ->whereDate('date_visit', '>=', $last7days)
            ->groupBy('country')
            ->orderBy('total_visits', 'desc')
            ->get()
            ->sum('total_visits');
    }

    /* STATS VISITS */
    private static function getVisitsByDate($date)
    {
        return static::whereDate('date_visit', $date)->count();
    }

    private static function getVisitsByDateRange($startDate, $endDate)
    {
        return static::whereBetween('date_visit', [$startDate, $endDate])->count();
    }

    public static function getVisitStats()
    {  
        $now = Carbon::now()->setTimezone('America/New_York');

        $todayVisits = static::getVisitsByDate($now->toDateString());
        $weekVisits = static::getVisitsByDateRange($now->copy()->subDays(6)->toDateString(), $now->toDateString());
        $monthVisits = static::getVisitsByDateRange($now->copy()->subDays(29)->toDateString(), $now->toDateString());
        $totalVisits = static::count();

        return [
            'todayVisits' => $todayVisits,
            'weekVisits' => $weekVisits,
            'monthVisits' => $monthVisits,
            'totalVisits' => $totalVisits,
        ];
    }

    /* Others */
    public static function getCountryFromIP($ip_address)
    {
        try {
            $currentUserInfo = Location::get($ip_address);
            $country = $currentUserInfo ? $currentUserInfo->countryName : "";
        } catch (\Exception $e) {
            $country = "";
        }

        return $country;
    }
}
