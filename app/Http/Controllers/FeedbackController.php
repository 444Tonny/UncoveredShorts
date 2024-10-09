<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Validator;
use App\Models\Subscriber;

class FeedbackController extends Controller
{
    public function subscribe(Request $request)
    {
        // Valider l'email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ]);

        if ($validator->fails()) {
            // Si l'email existe déjà ou est invalide, renvoyer une réponse JSON
            return response()->json([
                'status' => 'error',
                'message' => 'The email address is either already subscribed or is invalid.',
                'errors' => $validator->errors(),
            ], 400);
        }

        $now = now('America/New_York')->toDateTimeString();

        // Créer un nouvel abonné
        Subscriber::create([
            'email' => $request->email,
            'created_at' => $now
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Subscription successful!',
        ], 200);
    }

    public function send(Request $request)
    { 

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        try {
            Mail::send([], [], function ($message) use ($data) {
                $message->to('tucker@uncoveredshorts.com')
                    ->cc('tonny@uncoveredshorts.com')
                    ->subject('New Feedback from Website')
                    ->from('tucker@uncoveredshorts.com')
                    ->text(
                        "From: {$data['email']}, {$data['name']}\n" . // Ajout de l'adresse e-mail et du nom de l'utilisateur
                        "Message:\n{$data['message']}\n" // Message de l'utilisateur
                    );
            });

            return back()->with('success', 'Feedback sent successfully.');
        } catch (\Exception $e) {
            dd($e);

            return back()->with('error', 'Failed to send feedback. Please try again later.');
        }
    }
}
