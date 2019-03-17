<?php

namespace App\Listeners;

use App\Events\TaskEvent;
use App\Mail\TaskMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TaskEventListener
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
     * @param  TaskEvent $event
     * @return void
     */
    public function handle(TaskEvent $event)
    {

        $this->sendEmail($event->taskDetail, $event->taskDetail['send_email']);
    }

    public function sendEmail($data, $toEmail)
    {
        Mail::to($toEmail)->send(new TaskMail($data));
    }
}
