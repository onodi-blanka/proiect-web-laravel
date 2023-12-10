<?php

namespace App\Http\Controllers;
use App\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function submit(Request $request)
    {
//        echo $request->email;
//        echo $request->message;
//        Subject = "Inquiry about event"

        $request->session()->flash('success', 'Email sent successfully!');

        // Redirect back
        return redirect()->back();
    }
}
