<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DropUsNote extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    /**
     * Create a new message instance.
     *
     * @var array $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.drop_note')
            ->with([
                'user_name' => $this->message['user_name'],
                'user_email' => $this->message['user_email'],
                'user_subject' => $this->message['user_subject'],
                'user_message' => $this->message['user_message'],
            ]);
    }
}
