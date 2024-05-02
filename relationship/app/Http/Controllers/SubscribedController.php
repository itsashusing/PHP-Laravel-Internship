<?php

namespace App\Http\Controllers;

use App\Events\SendMail;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class SubscribedController extends Controller
{
    public function subscribed()
    {

        // Event::dispatch(new SendMail(1));
        event(new SendMail(1));
        dd('User Subscribed');
    }
}
