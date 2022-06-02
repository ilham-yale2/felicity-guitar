<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $code;
    public $name;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code, $name, $email)
    {
        $this->code = $code; 
        $this->name = $name; 
        $this->email = $email; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $data['url'] = route('verify.account', ['code' => $this->code, 'email' => $this->email]);
        $data['name'] = $this->name;
        return $this->subject('Verify Registration Felicity Guitars Account')->view('email.verification')->with($data);
    }
}
