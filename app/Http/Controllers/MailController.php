<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserNotificationMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to($request->email)->send(new UserNotificationMail($request->message));

        return response()->json(['message' => 'Email elküldve!']);
    }
}