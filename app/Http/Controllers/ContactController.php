<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function submit(Request $request)
    {
//        echo $request->email;
//        echo $request->message;
//        Subject = "Inquiry about event"


        $data = array('name'=>"Inquiry about event");
        // Path or name to the blade template to be rendered
        $template_path = 'email_template';

        try {
            Mail::raw($request->message, function($message) use ($request) {
                // Dynamic receiver's email and name from the request
                $receiverEmail = $request->email; // Assuming this is the receiver's email
                $receiverName = 'Receiver Name'; // You can also make this dynamic if you want

                $subject = "Inquiry about event"; // If you want a static subject

                // Set the receiver and subject of the mail.
                $message->to($receiverEmail, $receiverName)->subject($subject);

                // Set the sender
                $message->from('onodiblancka@outlook.com', 'Event support contacted');
            });
        } catch (Exception $e) {
            // Handle the exception
        }

        try {
            Mail::raw($request->message, function($message) use ($request) {
                $receiverName = 'new customer mail';

                $subject = "Inquiry about event";

                $message->to('onodiblancka@outlook.com', $receiverName)->subject($subject);

                $message->from('onodiblancka@outlook.com', 'New customer inquiry '.$request->email);
            });
        } catch (Exception $e) {
        }
        $request->session()->flash('success', 'Email sent successfully!');
        return redirect()->back();
    }

}
