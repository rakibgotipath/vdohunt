<?php

namespace App\Listeners;

use App\Events\UserRegistered as Registered;
use App\Mail\UserEmail;
use Illuminate\Support\Facades\Mail;

class UserRegistered
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {   
        Mail::to('admin@billing.com')->send(new UserEmail($event->data));
    }
}
