<?php

namespace App\Providers;

use App\Providers\NewLeaveCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\StaffNewRequestLeaveConfirmationEmail;

class SendStaffEmailNotification
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
        $staff =  $event->leave->staaff;
        $manager = $event->leave->staff->manager;

        Mail::to($staff)->send(new StaffNewRequestLeaveConfirmationEmail($manager, $event->leave));
    }
}
