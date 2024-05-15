<?php

namespace App\Models;

use Google\Service\Connectors\ExchangeAuthCodeRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'country', 'date_visit', 'created_at', 'updated_at'];

    public function recordVisit(Request $request)
    {
        // Enregistre la visite dans la base de données
        $visite = new Visit();
        $visite->ip_address = $request->ip();
        // Ajoutez d'autres champs si nécessaire, comme 'country'
        $visite->save();

        return response()->json(['message' => 'Visite enregistrée avec succès'], 200);
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

    private static function getVisitsByDate($date)
    {
        return static::whereDate('date_visit', $date)->count();
    }

    private static function getVisitsByDateRange($startDate, $endDate)
    {
        return static::whereBetween('date_visit', [$startDate, $endDate])->count();
    }
}
