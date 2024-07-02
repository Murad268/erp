<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendMail(string $file, array $data, string $email, string $subject)
    {
        Mail::send($file, $data, function ($message) use ($email, $subject) {
            $message->to($email);
            $message->subject($subject);
        });

    }
}
