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
        return static::select('country', DB::raw('COUNT(*) as visits'))
            ->groupBy('country')
            ->orderBy('visits', 'desc')
            ->get();
    }

    public static function getTotalVisitsByCountry()
    {
        return static::select(DB::raw('COUNT(*) as total_visits'))
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
    public function recordVisit(Request $request)
    {
        $visite = new Visit();
        $visite->ip_address = static::getCountryFromIP($request->ip());
        $visite->save();

        return response()->json(['message' => 'Visit registered.'], 200);
    }
    public static function getCountryFromIP($ip_address)
    {
        try {
            $currentUserInfo = Location::get($ip_address);
            $country = $currentUserInfo ? $currentUserInfo->country : "";
        } catch (\Exception $e) {
            $country = "";
        }

        return $country;
    }
}
