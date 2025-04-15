<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('beldy.adam@gmail.com')->send(new ContactFormMail($validated));
            
            return response()->json([
                'success' => true,
                'message' => 'Üzenet elküldve! Köszönjük a visszajelzést.'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hiba történt az üzenet küldése közben. Kérjük, próbáld újra később.'
            ], 500);
        }
    }
}