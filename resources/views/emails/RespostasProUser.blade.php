@component('mail::message')
# Olá, {{$nome}}

Você recebeu a resposta de {{ config('app.name') }}
<hr>
<h4> Mensagem:</h4>
@component('mail::message')
{{$mensagem}}
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
