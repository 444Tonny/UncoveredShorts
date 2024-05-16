<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class VisitsController extends Controller
{
    public function recordVisit(Request $request)
    {
        $dateVisit = now('America/New_York')->toDateString();

        $visit = new Visit();
        $visit->ip_address = $request->ip();
        $visit->country = Visit::getCountryFromIP($request->ip());
        $visit->date_visit = $dateVisit;
        $visit->save();

        return response()->json(['message' => 'Visit registered'], 200);
    }
}
