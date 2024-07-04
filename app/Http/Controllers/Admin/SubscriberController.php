<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\Email;
use App\Services\EmailService;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index()
    {
        // Récupérer tous les abonnés
        $subscribers = Subscriber::all();

        // Retourner la vue avec les abonnés
        return view('admin.subscribers.index', compact('subscribers'));
    }
           
    public function writeEmail()
    {
        $emails = Email::all();
        return view('admin.subscribers.write', compact('emails'));
    }

    public function unsubscribe(Request $request)
    {
        $email = $request->input('email');

        Subscriber::where('email', $email)->delete();
 
        return redirect()->route('subscribers.index')->with('success', 'Email unsubscribed.');
    }


    // EMAIL SENDING CONTROLLER 
    public function sendEmail(Request $request)
    {
        // Store email
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'sending_date' => 'required|date|after_or_equal:now',
        ]);

        if ($validator->fails()) {
            return redirect()->route('subscribers.writeEmail')->withErrors($validator)->withInput();
        }

        $subscriber = Subscriber::find(7);
        $subject = $request->input('subject');
        $message = $request->input('message');
        $encodedMessage =  $message; //mb_convert_encoding($message, 'ISO-8859-1', 'UTF-8');
        $sending_date = $request->input('sending_date');

        $newEmail = $this->emailService->storeEmail($subscriber, $subject, $encodedMessage ,$sending_date);
        //$this->emailService->sendEmail($newEmail);

        return redirect()->back()->with('success', 'Operation successfull!');


        //$is_sent = $this->emailService->sendEmail($subscriber, $subject, $encodedMessage);
    }
}
