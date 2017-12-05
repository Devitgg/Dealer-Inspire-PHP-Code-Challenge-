<?php

namespace App\Http\Controllers;

use App\ContactEmails;
use App\Mail\contactGuyMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class ContactGuy extends Controller
{
    public function sendEmail(Request $request){
      //Lets validate this for Guy
      $request->validate([
        'name' => 'required|string|max:70',
        'email' => 'required|string|email',
        'content' => 'required|max:1000',
        'number'  => 'numeric|max:11'
      ]);

      //Set Guy Smileys email address
       $guySmiley = "guy-smiley@example.com";

       //email off to guy, safe travels $request!
       Mail::to($guySmiley)->send(new contactGuyMailer($request));

       //store the data into the database
       ContactEmails::create([
         'name'         => $request->name,
         'email'        => $request->email,
         'phone_number' => $request->number,
         'content'      => $request->content

       ]);

       //return back to the #content location with notification of success
       return Redirect::to(URL::previous() . "#contact")
       ->with('success', 'Your email has been successfully sent!');
    }
}
