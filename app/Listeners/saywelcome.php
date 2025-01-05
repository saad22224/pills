<?php

namespace App\Listeners;

use App\Events\WelcomeUser;
use App\Mail\testMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class saywelcome
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
     * @param  \App\Events\WelcomeUser  $event
     * @return void
     */
    public function handle(WelcomeUser $event)
    {
        $user = User::findOrFail($event->user->id);

        // تحديث الحالة إلى 1
        $user->update([
            'status' => 1
        ]);

        // إرسال البريد الإلكتروني للترحيب
        Mail::to($user->email)->send(new testMail($user));
    }
}
