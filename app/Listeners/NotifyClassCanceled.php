<?php

namespace App\Listeners;

use App\Events\ClassCanceled;
use App\Jobs\NotifyClassCanceledJob;
use App\Mail\ClassCanceledMail;
use App\Notifications\ClassCanceledNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NotifyClassCanceled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCanceled $event): void
    {
        $members = $event->scheduledClass->members;

        $className = $event->scheduledClass->classType->name;
        $classDateTime = $event->scheduledClass->date_time;

        $details = compact('className', 'classDateTime');

        /*This is another way to do it using App/mail Mailable Mailable
         * $members->each(function ($user) use ($details) {
            Mail::to($user)->send(new ClassCanceledMail($details));
        });*/

        /*This way is using Notification*/
        //Notification::send($members, new ClassCanceledNotification($details));

        /*This way is using Jobs*/
        NotifyClassCanceledJob::dispatch($members, $details);
    }
}
