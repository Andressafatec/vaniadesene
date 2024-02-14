<x-mail::message>
# mensagem {{$data['nome']}}

<p>telefone {{$data['telefone']}}</p>
<p>mensagem: {{$data['mensagem']}}</p>

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
