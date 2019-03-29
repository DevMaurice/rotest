<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StaffNewRequestLeaveConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

 
    public $manager;

    public $leave;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $manager, Leave $leave)
    {
        $this->manager = $manager;
        $this->leave = $leave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('leave.newrequest');
    }
}
