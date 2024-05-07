<?php 
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Google\Client;
    use Google\Service\Sheets;
    
    class GoogleSheetsController extends Controller
    {
        public function getDataFromSheet()
        {
            // Configuration du client Google Sheets
            $client = new Client();
            $client->setDeveloperKey('AIzaSyBrqQUbKt4cmtAd_fWKJKag3v8TWnxZNhI');
            $client->setApplicationName('Your Application Name');
            $client->setScopes([Sheets::SPREADSHEETS_READONLY]);
            $client->setAuthConfig(base_path('secret.json'));

    
            // Création du service Google Sheets
            $service = new Sheets($client);
    
            // ID de votre feuille de calcul Google Sheets
            $spreadsheetId = '1_unmigukw3Ff5ljnRfoF1FR_sFiKK5A3FIEaSvmDFjI';
    
            // Plage de lecture dans votre feuille de calcul (par exemple, toutes les données dans la feuille "Sheet1")
            $range = 'CountrySheet!A1:Z';
    
            // Récupération des données depuis la feuille de calcul
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();
    
            // Retourner les données récupérées à une vue (exemple)
            dd($values);
            return view('google-sheets', ['values' => $values]);
        }
    }    
?>