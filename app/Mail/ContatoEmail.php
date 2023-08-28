<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContatoEmail extends Mailable
{
    public $email;
    public $mensagem;

    public function __construct($email, $mensagem)
    {
        $this->email = $email;
        $this->mensagem = $mensagem;
    }

    public function build()
    {
        return $this->from('dede.ginevro@gmail.com')
                    ->view('emails.contato')
                    ->with([
                        'email' => $this->email,
                        'mensagem' => $this->mensagem,
                    ]);
    }
}
