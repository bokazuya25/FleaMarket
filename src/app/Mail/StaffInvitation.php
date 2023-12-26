<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StaffInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $invitationLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invitationLink)
    {
        $this->invitationLink = $invitationLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.staff_invitation');
    }
}
