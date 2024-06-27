<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        // Récupérer tous les abonnés
        $subscribers = Subscriber::all();

        // Retourner la vue avec les abonnés
        return view('admin.subscribers.index', compact('subscribers'));
    }
}
