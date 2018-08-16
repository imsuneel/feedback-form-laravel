<?php

namespace Wti\FeedbackForm\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $name)
    {
        $this->message = $message;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('feedbackform::mail.mail')->with([
            'message' => $this->message,
            'name' => $this->name
        ]);
    }
}
