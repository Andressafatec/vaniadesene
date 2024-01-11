@extends('app')
@section('pre-assets')

@endsection
@section('content')

<section id="highlights-section" class="main-highlights bg-content">
			<div class="container-fluid">
				<h3 class="title">Imóveis em Destaque</h3>
				<h2 class="subtitle">Venda</h2>
			</div>
			
			<div class="container-fluid">
				<div class="slider"  data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>
						
					
					@foreach($imoveisVenda as $imovel)

					<div >
						<a href="{{route('detalhes-imoveis',[
						'contrato'=>$imovel->contrato,
						
						'bairro'=>str_slug($imovel->bairro,'-'),
						'cidade'=>str_slug($imovel->cidade,'-'),
						'id'=>$imovel->referencia
						])}}">
							<article class="highlight-card-wrapper">
								<div class="highlight-card">
								<div class="referencia">ref.: {{$imovel->referencia}}</div>
									<figure class="photo">
									
											<img src="{{$imovel->url}}" alt="Imóvel - Venda - {{$imovel->bairro}} - {{$imovel->cidade}}" style="width: 100%; object-fit: cover !important;    height: 240px;">
										
									
									
									</figure>

									<div class="panel-body">
										<h5 class="price">R$ {{number_format($imovel->valor, 2, ',', '.')}}</h5>
										<div class="details">
											@foreach($imovel->caracteristicas as $caracteristica)
												@if($caracteristica->pref == "DOR")
												<div class="room">
														{{$caracteristica->valor}}
												<i class="icon-bed"></i></div>
												@endif
												@if($caracteristica->pref == "DOP")
												<div class="suite">
														{{$caracteristica->valor}}
												<i class="icon-bathtub-1"></i></div>
												@endif
												@if($caracteristica->pref == "GAR")
												<div class="garage">
														{{$caracteristica->valor}}
												<i class="icon-car"></i></div>
												@endif
												@if($caracteristica->pref == "ARU")
												<div class="size">
														{{$caracteristica->valor}} m²
												</div>
												@endif
											@endforeach
											
										</div>
										<h3 class="local">{{$imovel->bairro}} - {{$imovel->cidade}}</h3>
									</div>
								</div>
							</article>
						</a>
					</div>
					@endforeach
					@foreach(@$imoveisVenda2 as $imovel)

					<div >
						<a href="{{route('detalhes-imoveis',[
						'contrato'=>$imovel->contrato,
						
						'bairro'=>str_slug($imovel->bairro,'-'),
						'cidade'=>str_slug($imovel->cidade,'-'),
						'id'=>$imovel->referencia
						])}}">
							<article class="highlight-card-wrapper">
								<div class="highlight-card">
								<div class="referencia">ref.: {{$imovel->referencia}}</div>
									<figure class="photo">
									
											<img src="{{$imovel->url}}" alt="Imóvel - Venda - {{$imovel->bairro}} - {{$imovel->cidade}}" style="width: 100%; object-fit: cover !important;    height: 240px;">
										
									
									
									</figure>

									<div class="panel-body">
										<h5 class="price">R$ {{number_format($imovel->valor, 2, ',', '.')}}</h5>
										<div class="details">
											@foreach($imovel->caracteristicas as $caracteristica)
												@if($caracteristica->pref == "DOR")
												<div class="room">
														{{$caracteristica->valor}}
												<i class="icon-bed"></i></div>
												@endif
												@if($caracteristica->pref == "DOP")
												<div class="suite">
														{{$caracteristica->valor}}
												<i class="icon-bathtub-1"></i></div>
												@endif
												@if($caracteristica->pref == "GAR")
												<div class="garage">
														{{$caracteristica->valor}}
												<i class="icon-car"></i></div>
												@endif
												@if($caracteristica->pref == "ARU")
												<div class="size">
														{{$caracteristica->valor}} m²
												</div>
												@endif
											@endforeach
											
										</div>
										<h3 class="local">{{$imovel->bairro}} - {{$imovel->cidade}}</h3>
									</div>
								</div>
							</article>
						</a>
					</div>
					@endforeach
					
				</div>

				<div class="call-action">
					<a href="{{route('imovel.contrato', ['contrato' => 'Venda'])}}" class="btn btn-action">Ver Todos</a>
				</div>
			</div>
		</section>

		<section class="main-highlights">
			<div class="container-fluid">
				<h2 class="subtitle">Locação</h2>
			</div>

			<div class="container-fluid">
				<div class="slider"  data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>
					@foreach($imoveisLocacao as $imovel)
					<div>
						<a href="{{route('detalhes-imoveis',[
						'contrato'=>$imovel->contrato,
						
						'bairro'=>str_slug($imovel->bairro,'-'),
						'cidade'=>str_slug($imovel->cidade,'-'),
						'id'=>$imovel->referencia
						])}}">
							<article class="highlight-card-wrapper">
								<div class="highlight-card">
								<div class="referencia">ref.: {{$imovel->referencia}}</div>
									<figure class="photo">
										<img src="{{$imovel->url}}" alt="Imóvel - Venda - {{$imovel->bairro}} - {{$imovel->cidade}}" style="width: 100%; object-fit: cover !important;    height: 240px;">
									</figure>

									<div class="panel-body">
										<div class="price">R$ {{number_format($imovel->valor, 2, ',', '.')}}</div>
										<div class="details">

											@foreach($imovel->caracteristicas as $caracteristica)
												@if($caracteristica->pref == "DOR")
												<div class="room">
														{{$caracteristica->valor}}
												<i class="icon-bed"></i></div>
												@endif
												@if($caracteristica->pref == "DOP")
												<div class="suite">
														{{$caracteristica->valor}}
												<i class="icon-bathtub-1"></i></div>
												@endif
												@if($caracteristica->pref == "GAR")
												<div class="garage">
														{{$caracteristica->valor}}
												<i class="icon-car"></i></div>
												@endif
												@if($caracteristica->pref == "ARU")
												<div class="size">
														{{$caracteristica->valor}} m²
												</div>
												@endif
											@endforeach
										</div>
										<h3 class="local">{{$imovel->bairro}} - {{$imovel->cidade}}</h3>
									</div>
								</div>
							</article>
						</a>
					</div>
					@endforeach

					@foreach(@$imoveisLocacao2 as $imovel)
					<div>
						<a href="{{route('detalhes-imoveis',[
						'contrato'=>$imovel->contrato,
						
						'bairro'=>str_slug($imovel->bairro,'-'),
						'cidade'=>str_slug($imovel->cidade,'-'),
						'id'=>$imovel->referencia
						])}}">
							<article class="highlight-card-wrapper">
								<div class="highlight-card">
								<div class="referencia">ref.: {{$imovel->referencia}}</div>
									<figure class="photo">
										<img src="{{$imovel->url}}" alt="Imóvel - Venda - {{$imovel->bairro}} - {{$imovel->cidade}}">
									</figure>

									<div class="panel-body">
										<div class="price">R$ {{number_format($imovel->valor, 2, ',', '.')}}</div>
										<div class="details">

											@foreach($imovel->caracteristicas as $caracteristica)
												@if($caracteristica->pref == "DOR")
												<div class="room">
														{{$caracteristica->valor}}
												<i class="icon-bed"></i></div>
												@endif
												@if($caracteristica->pref == "DOP")
												<div class="suite">
														{{$caracteristica->valor}}
												<i class="icon-bathtub-1"></i></div>
												@endif
												@if($caracteristica->pref == "GAR")
												<div class="garage">
														{{$caracteristica->valor}}
												<i class="icon-car"></i></div>
												@endif
												@if($caracteristica->pref == "ARU")
												<div class="size">
														{{$caracteristica->valor}} m²
												</div>
												@endif
											@endforeach
										</div>
										<h3 class="local">{{$imovel->bairro}} - {{$imovel->cidade}}</h3>
									</div>
								</div>
							</article>
						</a>
					</div>
					@endforeach
				</div>
				<div class="call-action">
					<a href="{{route('imovel.contrato', ['contrato' => 'locacao'])}}" class="btn btn-action">Ver Todos</a>
				</div>
			</div>
		</section>

		@include('includes.simulador_financiamento')

		@endsection

		@section('pos-script')
			
			<script type="text/javascript">
	
	$(document).ready(function() {
		$(".slider").slick({

		  // normal options...
		  infinite: true,
		centerPadding: '20px',
		 arrows: true,
		 prevArrow: '<div class="slick-prev"><i class="icon-left-open"></i></div>',
		 nextArrow: '<div class="slick-next"><i class="icon-right-open"></i></div>',
		  // the magic
		  responsive: [{

		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        infinite: true,
		        arrows: true,
		      }

		    }, {

		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        dots: false,
		        arrows: true,
		      }

		    }, {

		      breakpoint: 300,
		      settings: "unslick" // destroys slick

		    }]
		});
		
	

	$("#btn-simulador").click(function(e){
		e.preventDefault();
		
		$.post("{{route('simulador')}}", $("#form-simulador").serialize(), function(data){
			var obj = data;
			$("#parcelaFinanciamento").html(obj.parcelaFinanciamento);
			$("#prazoMeses").html(obj.prazoMeses);
			$("#valorFinanciado").html(obj.valorFinanciado);
			$("#entrada").html(obj.entrada);

			$("#camposSimulador").addClass("animated fadeOutLeft").delay(500).queue(function(next) {
				$("#camposSimulador").hide("0");
				$("#resultadoSimulador").show('0');
				$("#resultadoSimulador").addClass("animated fadeInRight");
				 next();
			});
			
			
		});
		//return false;
	});
	

	});
	</script>
	

		@endsection