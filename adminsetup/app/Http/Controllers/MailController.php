<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ZeMozone.com',
            'body' => 'Do Not reply to this email.',
        ];
        $email = "ashutosh63872@gmail.com";
        Mail::to($email)->send(new DemoMail($mailData));
        // dd("Email sent successfully.");
    }
}
