@extends('site.layout.base')
@section('titulo', 'Página inicial')
{{$erro}}
@section('conteudo')

<div class='meio_site'>
    <h1 class='texto'>Bem-vindo ao meu site<br><span class='subtitulo'>Desenvolvedor Web Fullstack</span></h1>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0D80FC" fill-opacity="1" d="M0,256L60,240C120,224,240,192,360,197.3C480,203,600,245,720,272C840,299,960,309,1080,298.7C1200,288,1320,256,1380,240L1440,224L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>

</div>
<div class='skills'>
<span class='skillstitle'>Tecnologias usadas:</span>
<ul class='listskills'>
    <li>
        <img src='https://www.php.net/images/logos/new-php-logo.svg' width="150"> 
    <li>
        <img src='https://mazer.dev/wp-content/uploads/2020/09/laravel-logo.png' width="250"> 
    </li>
    <li>
        <img src=' https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/1200px-HTML5_logo_and_wordmark.svg.png' width="100"> 
    </li>
    <li>
        <img src='https://diegomariano.com/wp-content/uploads/2020/08/logo-2582747_640-e1597771254582.png' width="100"> 
    </li>
    <li>
        <img src='https://miro.medium.com/max/1400/1*ahpxPO0jLGb9EWrY2qQPhg.jpeg' width="100"> 
    </li>
</ul>
<hr>
</div>
<div class='contatogeral'>
<div class='contato'>
    <span class='butao_contato'>Entrar em contato</span>
</div>
<div id='#form_contato' class='form_contato'>
    <form action='{{route('contato.store')}}' method='post'>
    @csrf
        <label for='nome'> Insira seu nome: </label><br>
        <input type='text' name='nome' id='nome' value='{{old("nome")}}' placeholder='Seu nome'><br>

        @if($errors->has('nome'))
            <h4>{{$errors->first('nome')}}</h4>
            <hr>
        @endif

        <label for='email'> Insira seu Email: </label><br>
        <input type='email' name='email' id='email'  value='{{old("email")}}' placeholder='Email'><br>

        @if($errors->has('email'))
            <h4>{{$errors->first('email')}}</h4>
            <hr>
        @endif

        <label for='motivo_contato'> Insira o motivo do contato: </label><br>
        <select name='motivo_contato' id='motivo_contato'>
            <option value='none' {{old('motivo_contato') == 'none' ? 'selected' : ''}}> -- Selecione a opção --</option>
            <option value='1' {{old('motivo_contato') == 1 ? 'selected' : ''}}>Conversa sobre trabalho</option>
            <option value='2' {{old('motivo_contato') == 2 ? 'selected' : ''}}>Reclamação</option>
            <option value='3' {{old('motivo_contato') == 3 ? 'selected' : ''}}>Sugestão</option>
        </select><br>

        @if($errors->has('motivo_contato'))
            <h4>{{$errors->first('motivo_contato')}}</h4>
            <hr>
        @endif

        <label for='mensagem'> Insira a mensagem: </label><br>
        <textarea name="mensagem" style="width:400px;height:150px;"> @if(old('mensagem') != '') {{ old('mensagem') }} @endif</textarea><br>

        @if($errors->has('mensagem'))
            <h4>{{$errors->first('mensagem')}}</h4>
        @endif

        <input type='submit' value='Enviar'>
    </form>
</div>
</div>
@endsection
