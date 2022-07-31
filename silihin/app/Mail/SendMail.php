<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tokens;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = $this->tokens;
        return $this->subject('Verifikasi Email')->view('mail.verify', compact('token'));
    }
}
