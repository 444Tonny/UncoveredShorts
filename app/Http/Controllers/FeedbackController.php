<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données du formulaire si nécessaire

        // Envoi de l'email
        Mail::to('tonny.freelancing@gmail.com')->send(new FeedbackMail($request->all()));

        // Rediriger l'utilisateur après la soumission
        return redirect()->back()->with('success', 'Merci pour votre feedback!');
    }
}
