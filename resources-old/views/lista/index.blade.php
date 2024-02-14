@extends('interno')
@section('content')

	<section id="highlights-section" class="main-highlights bg-content">
			<div class="container-fluid">
			<div class="row">

				<h3 class="title">
					@if (\Request::is('imovel/venda'))  
					 Imóveis a Venda
					@elseif (\Request::is('imovel/locacao'))  
					 Imóveis para Locação
					@else
					Resultado da Busca
					@endif
				<hr>
				</h3>
				</div>
			</div>
	
			<div class="container-fluid">
				<div class="row">
					<!-- item -->
					@foreach($paginatedSearchResults as $imovel)
				
					<div class="col-sm-3 ">
						<a href="{{route('detalhes-imoveis',[
						'contrato'=>str_slug($imovel->contrato),
						
						'bairro'=>str_slug($imovel->bairro,'-'),
						'cidade'=>str_slug($imovel->cidade,'-'),
						'id'=>$imovel->referencia
						])}}">
							<article class="highlight-card-wrapper">
								<div class="highlight-card">
								<div class="referencia">ref.: {{$imovel->referencia}}</div>
									<figure class="photo">
									
										<?php 
										$fileSmall = explode("/",$imovel->url);
										$fileSmall = end($fileSmall);
									 ?>
									 @if(is_null($imovel->url))
										<img src="/min/img/default-min.jpg" alt="Imóvel - {{$imovel->bairro}} - {{$imovel->cidade}}">
									 @else
									 <img src="{{$imovel->url}}"  alt="Imóvel - Venda - {{$imovel->bairro}} - {{$imovel->cidade}}" style="width: 100%; object-fit: cover !important;    height: 240px;">
									 @endif
									
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
										@endforeach
											<?php 
											/*if(array_key_exists(0, $caracteristicas[$imovel->idImovel])) {
												echo '<div class="room">';
												    echo $caracteristicas[$imovel->idImovel][0]->valor;
												    echo '<i class="icon-bed"></i></div>';
												}
 											
											if(array_key_exists(1, $caracteristicas[$imovel->idImovel])) {
												echo '<div class="suite">';
												    echo $caracteristicas[$imovel->idImovel][1]->valor;
												 echo '<i class="icon-bed"></i> <i class="icon-bathtub-1"></i></div>';
												}
 											
											if(array_key_exists(2, $caracteristicas[$imovel->idImovel])) {
												echo '<div class="garage">';
												    echo $caracteristicas[$imovel->idImovel][2]->valor;
												    echo '<i class="icon-car"></i></div>';
												}
 											
											if(array_key_exists(3, $caracteristicas[$imovel->idImovel])) {
												echo '<div class="size">';
												    echo $caracteristicas[$imovel->idImovel][3]->valor;
												  echo ' m²</div>';
												}*/
 											?>
										</div>
										<p class="local">{{$imovel->bairro}} - {{$imovel->cidade}}</p>
									</div>
								</div>
							</article>
						</a>
					</div>
					@endforeach
					
				</div>
				<div class="row text-center">

					{!!$paginatedSearchResults->render()!!}
				</div>

				
			</div>
		</section>

		

		
@stop
@section('post-script')
<script type="text/javascript">
	$(document).ready(function() {
		/*$('.flexslider').flexslider({
		  animation: "slide",
		  controlsContainer: $(".custom-controls-container"),
		  customDirectionNav: $(".custom-navigation a")
		});*/
		var total = $(".photo").find('img').length;
		for (var i = 0; i <= total; i++) {
				var width = $(".photo img").eq(i).clientWidth;
				var height = $(".photo img").eq(i).clientHeight;
				if(width>height)
				  // $(".photo img").eq(i).attr('style',"width:100%");
				else
				    //$(".photo img").eq(i).attr('style',"height:100%");
		}

		
	});



	</script>


	
@endsection