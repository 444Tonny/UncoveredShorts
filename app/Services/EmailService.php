<?php

// App\Services\EmailService.php
namespace App\Services;

use App\Models\Email;
use App\Mail\UCMail;
use App\Models\TenantInvoice;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendMassEmail($destinataires, $sujet, $htmlContent)
    {
        /* $is_sent = [];

        foreach ($destinataires as $i => $userID) {
            
            $destinataire = TenantInvoice::find($userID);
            $message = '';

            // Pas d'invoice
            if($destinataire == null) 
            {
                $destinataire = User::find($userID);
                $message = "L'utilisateur n'a pas de facture à payer.";
            }

            $is_sent[$i] = $this->sendEmail($destinataire, $sujet, $destinataire->replacePlaceholders($htmlContent), $message);
        }

        return $is_sent;
        */
    }

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
            echo "Error in storeEmail service";
            dd($e);
            // $this->handleException($destinataire, $sujet, $htmlContent, $e->getMessage());
        }
    }

    public function sendEmail($email) 
    {
        $is_sent = false;

        try {
            Mail::to($email->subscriber_email)->send(new UCMail($email->subject, $email->message));

            $is_sent = true;
            return $is_sent;
            
        } catch (\Exception $e) {
            echo "Error in sendMail service";
            dd($e);
            // $this->handleException($destinataire, $sujet, $htmlContent, $e->getMessage());
        }
    }

    /*
    private function handleException($destinataire, $sujet, $htmlContent, $errorMessage)
    {
        $user = \Auth::user();

        Log::error('Failed to send email: ' . $errorMessage);

        $newEmail = new JournalEmail();
        $newEmail->id_modele = 1;
        $newEmail->id_destinataire = $destinataire->id;
        $newEmail->email_destinataire = $destinataire->email;
        $newEmail->sujet_journal = $sujet;
        $newEmail->corps_journal = $htmlContent;
        $newEmail->parent_id = $user->parentId();
        $newEmail->date_envoi = now();
        $newEmail->raison_echec = $errorMessage;
        $newEmail->statut_journal = 'Échec';

        $newEmail->save();

        throw new \Exception('Failed to send email. Error: ' . $errorMessage);
    }
        */
}
