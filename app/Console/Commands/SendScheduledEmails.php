<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Email;
use App\Models\Subscriber;
use Carbon\Carbon;
use App\Services\EmailService;

class SendScheduledEmails extends Command
{
    protected $signature = 'emails:send-scheduled';
    protected $description = 'Send scheduled emails';

    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    public function handle()
    {
        $now = Carbon::now('America/Toronto');

        $emails = Email::where('sending_date', '<=', $now)
                       ->where('status', 'pending')
                       ->get();

        foreach ($emails as $email) {
            $subscriber = Subscriber::find($email->subscriber_id);
            if ($subscriber) {
                $is_sent = $this->emailService->sendEmail($email);

                if ($is_sent) {
                    $email->update(['status' => 'sent']);
                }
            }               
        }
    }
}
