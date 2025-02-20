<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; // Create a Mailable class for sending emails

class MailController extends Controller
{
    // Display the contact form
    public function showForm()
    {
        return view('mail');
    }

    // Handle form submission
    public function sendMail(Request $request)
    {
        $email = $request->input('email');
		$message = $request->input('message');
        // Send the email without validation
        Mail::raw($message, function($message)use($email){
            $message->to($email)
            ->subject('Contact Form Submission');
        }); 
            

        // Redirect back with success message
        return  "Your message has been sent!";
    }
}
