@extends('interno')
@section('content')
	<section id="highlights-section" class="main-highlights">
			<div class="container">
		{!! Breadcrumbs::render('Quem Somos') !!}
				<h3 class="">Quem Somos</h3>
				<div class="row">
				<div class="col-sm-4">
						<img src="{{asset('/min/img/quem-somos.jpg')}}" class="img-responsive" alt="">
					</div>
					<div class="col-sm-6">
					<p>A Vania de Sene Negócios Imobiliários disponibiliza o que há de melhor em assessoria imobiliária.</p>
					<p> Dedicada a proporcionar tranquilidade, segurança, excelente atendimento com experiência e qualidade de ofertas.</p>
					</div>
					
				</div>
				<div class="row m-top-lg">
					<div class="col-sm-4 text-center">
						<h4 class="">Missão</h4>
						<p>Atender com excelência todos os clientes. Realizando sonhos, entendendo verdadeiramente as necessidades e expectativas. Garantindo a satisfação total, com as melhores ofertas do mercado. Com total tranquilidade, segurança e transparência.</p>
					</div>
					<div class="col-sm-4 text-center">
						<h4 class="">Visão</h4>
						<p>Ser referência em imobiliária, reconhecida como a melhor opção pelos clientes e líder no mercado. Antecipando as tendências, desenvolvendo os melhores profissionais, elevando a qualidade em atendimento, serviços e relacionamento.</p>
					</div>
					<div class="col-sm-4 text-center">
						<h4 class="">Valores</h4>
						<p>Honestidade, Responsabilidade, Ética, Profissionalismo, Credibilidade, Dedicação, Inovação.</p>
					</div>
				</div>
				
			</div>
			</section>

		
@stop