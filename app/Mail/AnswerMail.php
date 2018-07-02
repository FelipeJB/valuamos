<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnswerMail extends Mailable
{
    use Queueable, SerializesModels;


    public $asunto;
    public $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($asunto, $mensaje)
    {
      $this->asunto = $asunto;
      $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.answerMail')->with([
            'asunto' => $this->asunto,
            'mensaje' => $this->mensaje,
        ])->subject($this->asunto);
    }
}
