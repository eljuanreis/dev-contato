<?php

namespace App\Http\Controllers;

use App\Mail\NotifyAdmin;
use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:40',
            'email' => 'email',
            'motivo_contato' => 'required|integer|min:1|max:3',
            'mensagem' => 'required|min:3|max:2000'
        ];

        //mensagem de feeback das validacoes
        $feedback = [
            'required' => 'O campo :attribute é obrigatório!',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'motivo_contato.integer' => 'Não foi passado um valor válido para o motivo do contato',
            'mensagem.max' => 'O campo mensagem pode ter no máximo 2000 caracteres',
            'mensagem.mix' => 'O campo mensagem precisa ter no mínimo 3 caracteres',
            'email.email' => 'Digite um email válido'
        ];

        //validando a requisiçao
        $request->validate($regras, $feedback);

        //caso passe na validacao
        //da pra dar uma melhorada nisso aqui pra verificar se ta floodando requisições
        //pegar o IP e ver se já enviou mensagens nos ultimos 5m, vou adicionar isso mais pra frente
        $contato = new Contato();
        $contato->nome = $request->get('nome');
        $contato->email = $request->get('email');
        $contato->motivo_contato = $request->get('motivo_contato');
        $contato->mensagem = $request->get('mensagem');
        $contato->save();

        //notifyAdmin (notificar o administrador sobre um novo email):
        $email = new NotifyAdmin($contato);
        $email->subject('Novo contato de ' . $contato->nome);
        $admin_email = env('MAIL_USERNAME');
        Mail::to($admin_email)->send($email);

        //retornando sucesso pro usuário
        return view('site.sucesso', ['contato' => $contato]);
    }
}
