<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeaderboardCategory;
use Illuminate\Http\Request;
use App\Models\GoogleSheetsUrl;

class LeaderboardController extends Controller
{
    public function index()
    {
        $googleSheetUrl = GoogleSheetsUrl::where('id', 100)->value('sheet_url');

        return view('admin.leaderboard.index', compact('googleSheetUrl'));
    }

    public function synchronizeGroups(Request $request)
    {
        $sheetUrl = $request->input('sheet_url');
        if($sheetUrl == '' || $sheetUrl == null) return redirect()->back()->withErrors('Missing field');

        $excelData = LeaderboardCategory::getFirstColumnFromSheet($sheetUrl);

        try
        {
            LeaderboardCategory::synchronizeInitialRanking($excelData);
            
            GoogleSheetsUrl::where('id', 100)->update(['sheet_url' => $sheetUrl]);

            return redirect()->back()->with('success', 'Synchronization done successfully.');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
