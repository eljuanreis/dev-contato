@component('mail::message')

@component('mail::message')
# Você recebeu um novo contato
<h2>De:  {{$informacoes[0]}}</h2>
<h2>Em: {{$informacoes[2]}}</h2>
<hr>
<h3>Mensagem:  </h3>
{{$informacoes[1]}}
@endcomponent

@component('mail::button', ['url' => ''])
Ler completo no site
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
