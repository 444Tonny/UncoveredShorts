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
                $message->to('tonny@uncoveredshorts.com')
                    ->subject('New Feedback from Website')
                    ->from($data['email'], $data['name'])
                    ->text(
                        "Name: {$data['name']}\n".
                        "Email: {$data['email']}\n".
                        "Message:\n{$data['message']}\n"
                    );
            });

            return back()->with('success', 'Feedback sent successfully.');
        } catch (\Exception $e) {
            dd($e);

            return back()->with('error', 'Failed to send feedback. Please try again later.');
        }
    }
}
