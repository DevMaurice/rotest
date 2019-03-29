<?php

namespace App\Mail;

use App\User;
use App\Leave;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewRequestLeaveEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $leave;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Leave $leave)
    {
        $this->user = $user;
        $this->leave = $leave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('leave.request');
    }
}
