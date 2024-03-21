<?php

namespace App\Jobs;

use App\Mail\NotificationSuccessEmail;
use App\Mail\ReminderEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $to_email;
    protected $to_name;
    protected $data;
    protected $subject;
    protected $cc_emails;
    public function __construct($to_email, $to_name, $subject,$cc_emails, $data)
    {
        $this->to_email = $to_email;
        $this->to_name = $to_name;
        $this->data = $data;
        $this->subject = $subject;
        $this->cc_emails = $cc_emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->to_email, $this->to_name)->cc($this->cc_emails)->send(new NotificationSuccessEmail($this->subject, $this->data));
    }
}
