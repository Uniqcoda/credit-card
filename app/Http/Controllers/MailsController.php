<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Card;
use App\User;
use Auth;

class MailsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mail(Request $request, $user_id){

        $user = User::find($user_id);
        $email = $user->email;
        $title = "Soon to Expire Card";
        $content = "Your card is about to expire. Please replace it to continue using the platform.";

        Mail::send('mails.show', ['title' => $title, 'content' => $content], function ($message) use ($email)
        {

            $message->from('creditcard@email.com', 'Credit Card Wallet');
            $message->to($email);
        });

        return response()->json(['message' => 'Mail sent successfully']);
    }
}

