@extends('app.layout.base')
@section('titulo', 'Painel')
@section('conteudo')
<div class='admindiv'>
@if (isset($respondido))
    Você respondeu 
@endif
<a href='{{route('admin.logout')}}'>Sair</a>

    <h1>Você está respondendo o seguinte usuário:</h1>
    <table border='1' style="border: 3px solid black; width: 100%; word-wrap:break-word;
    table-layout: fixed; text-align:center;">
    <tr>
        <th>Nome </th>
        <th>Email </th>
        <th>Mensagem </th>
        <th>Data de envio </th>
    </tr>

    <tr>
        <td>{{$contato->nome}}</td>
        <td>{{$contato->email}}</td>
        <td>{{$contato->mensagem}}</td>
        <td>{{$contato->created_at->format('d/m/Y')}}</td>
    </tr>
    </table>
    <br>
<form action='{{route('admin.responder', ['id' => $contato->id])}}' method='post'>
@csrf
    <h1>Escreva sua resposta</h1>
    <textarea name='resposta' style="border: 3px solid black; width: 80%; height: 350px; word-wrap:break-word;
        table-layout: fixed; font-size: 20px;">
    </textarea><br>
    <button action='submit'>Responder</button>
</form>
</div>
</body>
</html>
@endsection