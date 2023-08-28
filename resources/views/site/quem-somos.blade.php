@extends('layouts.site')

@section('head')
@endsection
@section('content')
<div class="terceirobanner">
    <div class="color-left">
        <div class="container">
                <div class="banner_texto">
                    <div class="texto">Especialistas em</div>
                    <div class="texto_laranja">assesoria imobiliária</div>
                    <div class="texto">de excelência</div>
                </div>
        </div>
    </div>
    <div class="foto-right">
    </div>
</div>
    <div class="container">
        <div class="p2">
            Disponibilizamos o que há de melhor em assessoria imobiliária e estamos dedicados para
            <strong>encontrar a melhor oportunidade para você</strong> de forma
            <strong>seguro, transparente e ágil.</strong>
        </div>
        <div class="card_sobre">
            <div class="icone_sobre"><img src="{{asset('images/alvo-05.svg')}}" alt=""></div>
            <div class="col">
                <div class="texto_laranja">Missão</div>
                <div class="texto_card">
                    Atender com excelência todos os clientes.
                    <strong> Realizando sonhos, entendendo verdadeiramente as necessidades e expectativas.</strong>
                    Garantindo a satisfação total, com as melhores ofertas do mercado.
                    Com total tranquilidade, segurança e transparência.
                </div>
            </div>
        </div>
        <div class="card_sobre">
            <div class="icone_sobre"><img src="{{asset('images/olho-06.svg')}}" alt=""></div>
            <div class="col">
                <div class="texto_laranja">Visão</div>
                <div class="texto_card">
                    <strong>Ser referência em imobiliária,</strong>
                    reconhecida como a melhor opção pelos clientes e líder no mercado.
                    Antecipando as tendências, desenvolvendo os melhores profissionais,
                    elevando a qualidade em atendimento, serviços e relacionamento.
                </div>
            </div>
        </div>
        <div class="card_sobre">
            <div class="icone_sobre"><img src="{{asset('images/estrelas-07.svg')}}" alt=""></div>
            <div class="col">
                <div class="texto_laranja">Valores</div>
                <div class="texto_card">
                    Honestidade, Responsabilidade, Ética, Profissionalismo, Credibilidade, Dedicação, Inovação.
                </div>
            </div>
        </div>
    </div>
@endsection