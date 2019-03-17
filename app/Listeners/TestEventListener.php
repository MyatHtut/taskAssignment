<?php

namespace App\Listeners;

use App\Events\TestEvent;
use App\Mail\TaskMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TestEventListener
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
     * @param  TestEvent $event
     * @return void
     */
    public function handle(TestEvent $event)
    {

        Log::info('Test', ['obj' => $event->quoteDetail['assigned_to']]);
        $this->sendEmail($event->quoteDetail);
    }
    public function sendEmail($data)
    {
        $comment = 'Hi, This test feedback.';
        $toEmail = "aa.htut@gmail.com";
        Mail::to($toEmail)->send(new TaskMail($data));

        return 'Email has been sent to ' . $toEmail;
    }
}
