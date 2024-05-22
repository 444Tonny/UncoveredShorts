<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FeedbackController extends Controller
{
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
