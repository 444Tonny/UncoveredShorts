<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UCMail extends Mailable
{
    use Queueable, SerializesModels;    
    
    public $customSubject;
    public $customData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customSubject, $customData)
    {
        $this->customSubject = $customSubject;
        $this->customData = $customData;
    }    
    
    public function build()
    {
        return $this->view('emails.recap')
            ->subject($this->customSubject)
            ->with('customData', $this->customData);
    }
}
