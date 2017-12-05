<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactGuyMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($theRequest)
    {
        $this->request = $theRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //Create the view for the mailer w/ data passed through
        return $this->view('mail.contact')
          ->from('noreplye@awebsite.com')
          ->with([
                  'name'    => $this->request['name'],
                  'email'   => $this->request['email'],
                  'content' => $this->request['content'],
                  'number'  => $this->request['number']
                ]);
    }
}
