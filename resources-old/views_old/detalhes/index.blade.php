@extends('interno')
@section('meta')

		<meta property="og:image" content="{{$imovel->fotos[0]->url}}">
		<meta property="og:image:type" content="image/jpeg">
		<meta property="og:image:width" content="800">
		<meta property="og:image:height" content="600">
	
@endsection
@section('content')
<section class="main-imoveis">
			<div class="container-fluid">
				<div class="row m-bottom-sm">
					<div class="col-xs-6 col-sm-6">
						<h3 class="title">Detalhes do imóvel</h3>
					</div>
					<div class="col-xs-6 col-sm-6">
						<h3 class="title-referencia text-right">ref.: {{$imovel->referencia}}</h3>
					</div>
				</div>
				<article class="clearfix">
					<div class="panel panel-default panel-imovel">
						<div class="panel-body">
							<div class="col-xs-12 col-sm-6">
								<h4 class="title-house">
								{{$imovel->tipo}}
								</h4>
								<p class="details">{{$imovel->bairro}}</p>
								<p class="details">{{$imovel->cidade}}</p>
							</div>

							<div class="col-xs-12 col-sm-6">
								<h4 class="title-price">
								@if($imovel->contrato == "Venda")
									Valor de Venda
								@else
									Valor da Locação
								@endif
								</h4>
								<p class="price">R$ {{number_format($imovel->valor, 2, ',', '.')}}</p>
								<p class="link"><a href="#" class="link">Simular financiamento</a></p>
							</div>
						</div>
					</div>
				</article>

				<article class="clearfix">
					<div class="panel panel-default panel-imovel">
						<div class="panel-body">
							<div class="clearfix">
								<div class="col-xs-12 col-sm-12 col-md-6">

									<div class="imovel-slider">
										<div class="flexslider">
										  <div class="sliderDetalhes"  data-slick='{"slidesToShow": 1, "slidesToScroll": 1}'>
										  
										  @foreach($imovel->fotos as $foto)
										
									

										    <div>
										    <figure class="photo">
										      <img src="{{$foto->url}}" />
										      </figure>
										    </div>
										   
										    @endforeach
										  </div>
										</div>

										
									</div>

								</div>

								<div class="col-xs-12 col-sm-4 col-md-2">
								@if(isset($principaisCaracteristicas['DOR']))
									<figure class="room">
										<p><div class="qty">{{$principaisCaracteristicas['DOR']}}</div> <i class="icon icon-bed"></i> <div class="description">Quarto(s)</div></p>
									</figure>
								@endif
								@if(isset($principaisCaracteristicas['DOP']))
									<figure class="suite">
										<p><div class="qty">{{$principaisCaracteristicas['DOP']}}</div> <i class="icon icon-bed"></i> <i class="icon icon-bathtub-1"></i><div class="description">Suíte(s)</div></p>
									</figure>
									@endif
									@if(isset($principaisCaracteristicas['GAR']))
									<figure class="garage">
										<p><div class="qty">{{$principaisCaracteristicas['GAR']}}</div> <i class="icon icon-car"></i> <div class="description">Vaga(s)</div></p>
									</figure>
									@endif
									@if(isset($principaisCaracteristicas['ARU']))
									<div class="area-util">
										<div class="qty pull-left">{{$principaisCaracteristicas['ARU']}}</div>
										<div class="description">
											<p>Área útil</p>
											<p>m2</p>
										</div>
									</div>
									@endif
								</div>

								<div class="col-xs-12 col-sm-8 col-md-4">
									<h4 class="title m-top-md m-bottom-md">Fazer Proposta</h4>
										
										<div id="resultado" style="display: none;opacity: 0;">
											<h2>Formulário enviado com sucesso.</h2>
											<div class="icon">
											<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
											</div>
											<h2>Obrigado.</h2>

										</div>
										{!!Form::open(['route'=>'emails.proposta','class'=>'form-imovel animated','id'=>"form-imovel",'style'=>'position:relative'])!!}
										<div id="carregandoForm">
											<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
<span class="sr-only">Loading...</span>
										</div>
										<input type="hidden" name="referencia" value="{{$imovel->referencia}}">
										<div class="input-group clearfix">
											<label class="control-label">Nome</label>
											<input type="text" class="form-control" name="nome">
										</div>

										<div class="input-group clearfix">
											<label class="control-label">E-mail</label>
											<input type="email" class="form-control" name="email">
										</div>

										<div class="input-group clearfix">
											<label class="control-label">Telefone</label>
											<input type="number" name="telefone" class="form-control">
										</div>

										<div class="m-top-md clearfix">
											@if($imovel->contrato == "Venda")
												<textarea rows="5" class="form-control" name="mensagem">Olá, Gostaria de ter mais informações sobre o imóvel {{$imovel->tipo}} à venda, R$ {{number_format($imovel->valor, 2, ',', '.')}}, {{$imovel->bairro}} - {{$imovel->cidade}} - {{$imovel->uf}}.</textarea>
											@else
												<textarea rows="5" class="form-control" name="mensagem">Olá, Gostaria de ter mais informações sobre o imóvel {{$imovel->tipo}} para locação, R$ {{number_format($imovel->valor, 2, ',', '.')}}, {{$imovel->bairro}} - {{$imovel->cidade}} - {{$imovel->uf}}.</textarea>
											@endif

											
										</div>

										<div class="clearfix m-top-md m-bottom-lg">
									{!! Form::button('Enviar',['class'=>'btn btn-primary btn-action','id'=>'btSend'])!!}
											<!--<button type="button" class="btn btn-primary btn-action" id="btSend">Enviar</button>-->
										</div>
									{!!Form::close()!!}
								</div>
							</div>

							<div class="imovel-details">
								<div class="col-xs-12 col-sm-6">
									<h3 class="title">Descrição do Imóvel</h3>
									<p class="m-bottom-lg">{{$imovel->detalhes}}</p>

									<h3 class="title">Características do Imóvel</h3>
									@foreach($imovel->caracteristicas as $caracteristica)
									@if($caracteristica->label != 'Apto.')
									<p class="description col-sm-6"><strong>{{$caracteristica->label}}:</strong> {{$caracteristica->valor}}</p>
									@endif
									@endforeach
									
								</div>
								<div class="col-xs-12 col-sm-4 col-sm-offset-2 ">
								<div class="clearfix m-top-lg"></div>
								<p class="text-center"><strong>FALE COM UM DE NOSSOS CORRETORES</strong></p>
									<div class="highlight-fone">
									<p>UNIDADE - SATÉLITE</p>
										<h5><i class="icon-phone"></i> 12 3935-8000</h5>
									</div>
									<div class="highlight-fone">
									<p>UNIDADE - ESPLANADA</p>
										<h5><i class="icon-phone"></i> 12 3949-6000</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
<!--
				<article class="clearfix m-bottom-lg">
					<div class="panel panel-default panel-map">
						<div class="panel-body">
							<div class="col-xs-12">
								<h5 class="title m-top-md m-bottom-md">Mapa do Imóvel</h5>
								<div class="clearfix m-bottom-md">
								<iframe src="https://www.google.com.br/maps/place/{{$searchMaps}}/@-23.2260633,-45.8912261,15z/data=!4m5!3m4!1s0x94cc4a931b5ef36f:0xe1ded2d99008c021!8m2!3d-23.2267852!4d-45.8861466" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
								{{$searchMaps}}
								<iframe
  width="600"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC0fy-X1JHplDFvrxYwYFrt3bd6CN8zpR4&q=Space+Needle,Seattle+WA" allowfullscreen>
</iframe>
								</div>
							</div>
						</div>
					</div>
					</article>-->

					</div>

		</section>
		@if($imovel->contrato == "Venda")							
							
		@include('includes.simulador_financiamento')
		@endif
@endsection


@section('post-script')
<script type="text/javascript">
	$(document).ready(function() {
		/*$('.flexslider').flexslider({
		  animation: "slide",
		  controlsContainer: $(".custom-controls-container"),
		  customDirectionNav: $(".custom-navigation a")
		});*/
		var total = $(".sliderDetalhes").find('img').length;
		for (var i = 0; i <= total; i++) {
				var width = $(".sliderDetalhes img").eq(i).clientWidth;
				var height = $(".sliderDetalhes img").eq(i).clientHeight;
				if(width>height)
				   $(".sliderDetalhes img").eq(i).attr('style',"width:100%");
				else
				    $(".sliderDetalhes img").eq(i).attr('style',"height:100%");
		}

		$(".sliderDetalhes").slick({

			  // normal options...
			  infinite: true,
			centerPadding: '20px',
			 arrows: true,
			 dots: false,
			 prevArrow: '<div class="slick-prev"><i class="icon-left-open"></i></div>',
			 nextArrow: '<div class="slick-next"><i class="icon-right-open"></i></div>',
			  // the magic
			  responsive: [{

			    breakpoint: 1024,
		      	settings: {
		        slidesToShow: 1,
		        infinite: true,
		       
		      }

		    }, {

		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        
		      }

		    }, {

		      breakpoint: 300,
		      settings: "unslick" // destroys slick

		    }]
		});	
	});



	</script>


	<script type="text/javascript">
	$(document).ready(function() {
		$('.js-anchor-link').click(function(e){
		  e.preventDefault();

		  var target = $($(this).attr('href'));
		  if(target.length){
		    var scrollTo = target.offset().top;
		    $('body, html').animate({scrollTop: scrollTo+'px'}, 400);
		  }
		});
		$("#btSend").click(function(){
			if($('input[name="nome"]').val() == ""){
				 $('input[name="nome"]').parent().addClass("has-error");
				 $('input[name="nome"]').parent().addClass("animated shake");
			}else{
				$('input[name="nome"]').parent().removeClass("has-error");
			}
			if($('input[name="email"]').val() == ""){
				 $('input[name="email"]').parent().addClass("has-error");
				 $('input[name="email"]').parent().addClass("animated shake");
			}else{
				$('input[name="email"]').parent().removeClass("has-error");
			}
			if($('input[name="telefone"]').val() == ""){
				 $('input[name="telefone"]').parent().addClass("has-error");
				 $('input[name="telefone"]').parent().addClass("animated shake");
			}else{
				$('input[name="telefone"]').parent().removeClass("has-error");
			}
			var totalError = $(".has-error").length;
			if(totalError > 0){
				return false
			}
			$("#carregandoForm").show(0);
			$("#carregandoForm").addClass("animated fadeInLeft");

			$.post("{{route('emails.proposta')}}",$("#form-imovel").serialize(),function(data){
				$("#form-imovel").addClass("animated fadeOutLeft").delay(500).queue(function(next) {
				$("#resultado").slideDown('0');
				$("#resultado").addClass("animated fadeInRight");
				 next();
			});
			})
		})
	});
	</script>
@endsection