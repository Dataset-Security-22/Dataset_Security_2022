<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetMail extends Mailable
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
        return $this->subject('Reset Password')->view('mail.reset', compact('token'));
    }
}
