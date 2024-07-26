<?php

// App\Services\EmailService.php
namespace App\Services;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class LeaderboardService
{
    public function storeEmail($subscriber, $subject, $encodedMessage, $sending_date)
    {
        try {
            $newEmail = new Email();
            $newEmail->subscriber_id = $subscriber->id;
            $newEmail->subscriber_email = $subscriber->email;
            $newEmail->subject = $subject;
            $newEmail->message = $encodedMessage;
            $newEmail->sending_date = $sending_date;
            $newEmail->status = 'pending';

            $newEmail->save();

            return $newEmail;
            
        } catch (\Exception $e) {
            throw $e;
            // $this->handleException($destinataire, $sujet, $htmlContent, $e->getMessage());
        }
    }

    public function sendEmail($email) 
    {
        $is_sent = false;

        try 
        {
            // Mail::to($email->subscriber_email)->send(new UCMail($email->subject, $email->message));
            //Mail::to('tonny.mtrl@gmail.com')->send(new UCMail($email->subject, $email->message));

            //$is_sent = true;
            return $is_sent;    
        } 
        catch (\Exception $e) 
        {
            echo "SendEmail error: " . $e->getMessage();
            // $this->handleException($destinataire, $sujet, $htmlContent, $e->getMessage());
        }
    }
}
