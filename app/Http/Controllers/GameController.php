<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Sheets;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $suggestions1 = $this->getDataFromSheet('1_unmigukw3Ff5ljnRfoF1FR_sFiKK5A3FIEaSvmDFjI', 'CountrySheet');
        $suggestions2 = $this->getDataFromSheet('1_unmigukw3Ff5ljnRfoF1FR_sFiKK5A3FIEaSvmDFjI', 'FruitSheet');
        $suggestions3 = $this->getDataFromSheet('1_unmigukw3Ff5ljnRfoF1FR_sFiKK5A3FIEaSvmDFjI', 'ColorSheet');
        $suggestions4 = $this->getDataFromSheet('1_unmigukw3Ff5ljnRfoF1FR_sFiKK5A3FIEaSvmDFjI', 'BrandSheet');

        return view('game', compact('suggestions1', 'suggestions2', 'suggestions3', 'suggestions4'));
    }


    /* retrieve data from google sheet */
    public function getDataFromSheet($sheetID = '1_unmigukw3Ff5ljnRfoF1FR_sFiKK5A3FIEaSvmDFjI', $sheetName = 'CountrySheet')
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
}
