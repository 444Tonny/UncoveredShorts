<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Google\Client;
use Google\Service\Sheets;

class LeaderboardCategory extends Model
{
    use HasFactory;

    protected $table = 'leaderboard_category';

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'category_name',
    ];

    public static function getAllCategoriesAlphabetical()
    {
        return self::orderBy('category_name', 'asc')->get();
    }

    public static function getFirstColumnFromSheet($sheetURL)
    {
        $client = new Client();
        $client->setDeveloperKey('AIzaSyBrqQUbKt4cmtAd_fWKJKag3v8TWnxZNhI');
        $client->setApplicationName('Your Application Name');
        $client->setScopes([Sheets::SPREADSHEETS_READONLY]);
        $client->setAuthConfig(base_path('secret.json'));

        $service = new Sheets($client);

        // Extraire l'identifiant de la feuille à partir de l'URL
        preg_match('/\/d\/(.*)\/edit/', $sheetURL, $matches);
        $sheetID = $matches[1];

        // Récupérer toutes les feuilles de calculs
        $response2 = $service->spreadsheets->get($sheetID);
        $sheets = $response2->getSheets();

        $allSheets = [];
        foreach ($sheets as $sheet) {
            $sheetTitle = $sheet->getProperties()->getTitle();
            $sheetId = $sheet->getProperties()->getSheetId();
            $allSheets[] = ['title' => $sheetTitle, 'id' => $sheetId];
        }

        $sheetTitle = Game::getSheetTitleFromId($allSheets, $sheetURL);

        // Définir la plage pour ne sélectionner que la colonne A
        $range = $sheetTitle.'!A:A';

        $response = $service->spreadsheets_values->get($sheetID, $range);
        $values = $response->getValues();

        return $values;
    }

    public static function synchronizeInitialRanking($excelValues)
    {
        $groupCount = 0;

        try
        {
            foreach ($excelValues as $row) {
                if (isset($row[0])) {
                    $groupCount ++;
                }
            }
        }
        catch(\Exception $e)
        {
            throw new \Exception('Synchronization failed. Please verify the content of the Excel file.');
        }

        // Delete old percentages and insert new for that questions
        try {
            LeaderboardCategory::truncate();

            foreach ($excelValues as $groupData)
            {
                LeaderboardCategory::create(['category_name' => $groupData[0]]);
            }
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
