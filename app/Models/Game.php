<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Google\Client;
use Google\Service\Sheets;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable = [
        'name',
        'status',
        'date_start',
        'date_end',
    ];

    public $timestamps = true;

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function gameplayed()
    {
        return $this->hasMany(GamePlayed::class);
    }

    public static function getCurrentGame()
    {
        $now = now()->setTimezone('America/New_York');

        // Chercher d'abord les jeux actifs
        $game = self::where('date_start', '<=', $now)
            ->where('date_end', '>=', $now)
            ->orderBy('id')
            ->first();

        if (!$game) {
            // Si aucun jeu actif, chercher le jeu avec la date start la plus proche
            $game = self::where('date_start', '>', $now)
                ->orderBy('date_start')
                ->first();
        }

        if (!$game) {

            $game = self::where('id', '>', '0')
                ->orderBy('id','DESC')
                ->first();
        }

        Game::updateGameStatus($game->id);
        return $game;
    }

    public static function updateGameStatus($idGame)
    {
        DB::beginTransaction();

        try {
            // Update status of other games
            self::where('id', '!=', $idGame)
                ->where('status', 'current')
                ->update(['status' => 'finished']);

            $game = self::find($idGame);
            if ($game) {
                $game->status = 'current';
                $game->save();
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public static function getDataFromSheet($sheetURL, $questionId)
    {
        $values = static::getArray2DFromSheet($sheetURL, $questionId);

        //$percentagesResponse = $service->spreadsheets_values->get($sheetId, $rangePercentages);
        //$valuesPercentages = $percentagesResponse->getValues();

        //UniqueAnswer::synchroniseInitialPercentage($values, $questionId);

        $suggestions = array_map('current', $values);

        return json_encode($suggestions);
    }    

    public static function getArray2DFromSheet($sheetURL, $questionId)
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
    
        // Recuperer toutes les feuilles de calculs dedans
        $response2 = $service->spreadsheets->get($sheetID);
        $sheets = $response2->getSheets();

        $allSheets = [];
        foreach ($sheets as $sheet) {
            $sheetTitle = $sheet->getProperties()->getTitle();
            $sheetId = $sheet->getProperties()->getSheetId();
            $allSheets[] = ['title' => $sheetTitle, 'id' => $sheetId];
        }

        $sheetTitle = Game::getSheetTitleFromId($allSheets, $sheetURL);

        $range = $sheetTitle.'!A:B';

        $response = $service->spreadsheets_values->get($sheetID, $range);
        $values = $response->getValues();

        return $values;
    } 

    public static function getSheetTitleFromId($allSheets, $sheetURL)
    {
        $sheetId = preg_match('/gid=(\d+)/', $sheetURL, $matches) ? intval($matches[1]) : null;

        foreach ($allSheets as $sheet) {
            if ($sheet['id'] === $sheetId) return $sheet['title'];
        }
    }

    /* IF WE KNOW SHEET NAME 

    public function getDataFromSheet2($sheetID = '1_unmigukw3Ff5ljnRfoF1FR_sFiKK5A3FIEaSvmDFjI', $sheetName = 'CountrySheet')
    {
        $client = new Client();
        $client->setDeveloperKey('AIzaSyBrqQUbKt4cmtAd_fWKJKag3v8TWnxZNhI');
        $client->setApplicationName('Your Application Name');
        $client->setScopes([Sheets::SPREADSHEETS_READONLY]);
        $client->setAuthConfig(base_path('secret.json'));

        $service = new Sheets($client);

        $spreadsheetId = $sheetID;

        $range = $sheetName.'!A:A';

        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();

        $suggestions = array_map('current', $values);

        return json_encode($suggestions);
    }

    */
}
