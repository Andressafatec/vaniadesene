<x-mail::message>
# Mensagem de {{$data['nome']}}

<p>Telefone: {{$data['telefone']}}</p>

<p>Mensagem: {{$data['mensagem']}}</p>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
