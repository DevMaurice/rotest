<?php

namespace App\Providers;

use App\Mail\NewRequestLeaveEmail;
use App\Providers\NewLeaveCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendManagerEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewLeaveCreated  $event
     * @return void
     */
    public function handle(NewLeaveCreated $event)
    {
        $user = $event->leave->user;
        $manager = $user->manager;
        Mail::to($manager)->send(new NewRequestLeaveEmail($user, $event->leave));
    }
}
