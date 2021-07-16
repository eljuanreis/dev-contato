@extends('app.layout.base')
@section('titulo', 'Painel')
@section('conteudo')
<div class='admindiv'>
<a href='{{route('admin.logout')}}'>Sair</a>

    <h1>Pessoas que entraram em contato:</h1>
    <table border='1' style="border: 3px solid black; width: 100%; word-wrap:break-word;
    table-layout: fixed;">
        <thead>
         <tr class='tabletitle'>
            <th>Nome: </th>
            <th>Email: </th>
            <th>Motivo contato: </th>
            <th>Mensagem: </th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class='tabledata'>{{$contato->nome}}</td>
                <td class='tabledata'>{{$contato->email}}</td>
                <td class='tabledata'>{{$contato->motivo_contato_texto->motivo_contato_text}}</td>
                <td class='tabledata'>
                    <textarea style='height: 100px; width: 100%;white-space:pre-wrap'>{{$contato->mensagem}}</textarea>
                </td>
                <td class='tabledata'>Responder</td>
                <td class='tabledata'><a href=''> Visualizar </a></td>  
                <td class='tabledata'>Excluir</td>
            </tr>
        </tbody>
    </table>
</div>
<footer>
    <span>Copyrights, YXZ</span>
</footer>
</body>
</html>
@endsection