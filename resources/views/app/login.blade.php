@extends('app.layout.base')
@section('titulo', 'Login Painel')
@section('conteudo')
<form action='{{route('admin.login')}}' method='post'>
@csrf
<div id='#form_login' class='form_contato'>
        <label for='email'> Insira seu e-mail: </label><br>
        <input type='email' name='email' id='email' value='{{old("email")}}' placeholder='Digite seu e-mail'><br>

        @if($errors->has('email'))
            <h4>{{$errors->first('email')}}</h4>
            <hr>
        @endif

        <label for='senha'> Insira sua senha: </label><br>
        <input type='password' name='senha' id='senha'  value='{{old("senha")}}' placeholder='Digite sua Senha'><br>

        @if($errors->has('senha'))
            <h4>{{$errors->first('senha')}}</h4>
            <hr>
        @endif
        @if(isset($erro))
        <p style='color: red;'>{{$erro}}</p>
        @endif
        <input type='submit' value='Entrar'>
</div>
</form>
@endsection