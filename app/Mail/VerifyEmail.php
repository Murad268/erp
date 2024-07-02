<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $activation_token;
    public $user_id;

    public function __construct($activation_token, $user_id)
    {
        $this->activation_token = $activation_token;
        $this->user_id = $user_id;
    }

    public function build()
    {
        return $this->subject('Email Doğrulama')
            ->view('emails.verify-email')
            ->with([
                'activation_token' => $this->activation_token,
                'user_id' => $this->user_id,
            ]);
    }
}
