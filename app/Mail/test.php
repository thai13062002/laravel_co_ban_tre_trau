<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class test extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @param  string  $name
     * @param  string  $password
     * @param  string  $email
     * @return void
     */
    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }
    public function envelope()
    {
        return new Envelope(
            subject: 'Thông tin đăng nhập',
        );
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')
                    ->with([
                        'name' => $this->name,
                        'password' => $this->password
                    ]);

    }
}
