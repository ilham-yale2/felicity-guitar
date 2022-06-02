<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $code; 
    public $email; 
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code, $email, $name)
    {
        $this->code = $code;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['url'] = route('forgot.password.form', ['code' => $this->code , 'email' => $this->email]);
        $data['name'] = $this->name;
        return $this->subject('Verify Forgot Password Account')->view('email.password')->with($data);
    }
}
