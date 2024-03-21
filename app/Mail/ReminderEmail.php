<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $subject;

    public function __construct($subject,$data)
    {
        $this->data = $data;
        $this->subject = $subject;
    }

    public function build()
    {
        return $this->subject($this->subject)
            ->view('email.reminder')
            ->with(['data' => $this->data]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
}
