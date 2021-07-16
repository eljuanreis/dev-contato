@extends('site.layout.base')
@section('titulo', 'Página inicial')
@section('conteudo')
<div class='sucesso'>
    <center>
    <h1>Olá, {{$contato->nome}}! Sua mensagem foi enviada! Aguarde a resposta via e-mail!</h1>
    <hr>
    <h2>Informações enviadas:</h2>
    <h4>Nome: {{$contato->nome}}</h4>
    <h4>E-mail: {{$contato->email}}</h4>
    <h4>Motivo contato: {{$contato->motivo_contato_texto->motivo_contato_text}}</h4>
    <h4>Mensagem: {{$contato->mensagem}}</h4>
        <a href='{{route('inicio')}}'>Voltar para página inicial </a>

    </center>
</div>
@endsection
