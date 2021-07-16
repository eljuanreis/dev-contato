<?php

namespace App\Mail;

use App\Models\Contato;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nome;
    public $mensagem;
    public $data;

    public $infos = [];

    public function __construct(Contato $contato)
    {
        $this->infos[0] = $this->nome = $contato->nome;
        $this->infos[1] = $this->mensagem = $contato->mensagem;
        $this->infos[2] = $this->data = $contato->created_at;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.NotifyAdmin', ['informacoes' => $this->infos]);
    }
}
