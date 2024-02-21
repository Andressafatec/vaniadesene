<!DOCTYPE html>
<html lang="pt-br">

<head>

	<meta charset="utf-8">

	<title animated fadeIn>Vania de Sene</title animated fadeIn>

	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="shortcut icon" href="{{asset('/min/img/favicon/favicon.ico')}}" type="image/x-icon">

	<link rel="shortcut icon" href="{{asset('/min/img/favicon/favicon.ico')}}" type="image/x-icon">
	<link rel="apple-touch-icon" sizes="57x57" href="{{asset('/min/img/favicon/apple-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{asset('/min/img/favicon/apple-icon-60x60.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('/min/img/favicon/apple-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('/min/img/favicon/apple-icon-76x76.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('/min/img/favicon/apple-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{asset('/min/img/favicon/apple-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{asset('/min/img/favicon/apple-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{asset('/min/img/favicon/apple-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('/min/img/favicon/apple-icon-180x180.png')}}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('/min/img/favicon/android-icon-192x192.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('/min/img/favicon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('/min/img/favicon/favicon-96x96.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('/min/img/favicon/favicon-16x16.png')}}">
	<link rel="manifest" href="{{asset('/min/img/favicon/manifest.json')}}">
	<meta name="msapplication-TileColor" content="#ffffff')}}">
	<meta name="msapplication-TileImage" content="{{asset('/min/img/favicon/ms-icon-144x144.png')}}">
	

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#114a99">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#114a99">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#114a99">

	@yield('meta')
				

	
	<link href="{{asset('/min/css/styles.css')}}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	@include('includes.analyticstracking')
</head>

<body>

	<main class="main-wrapper side-collapse-container">
		<div class="main-home-bg-inner">
			<div class="main-navbar-vania">
				<div class="container-fluid ">
				<div class="row hidden-xs">
						<div class="col-sm-4 pull-right">
							<ul id="menu-adm">
								<li>
									<a href="http://vaniadesene.com.br/administracao/administracao.html" target="_blank">Adminstração</a>
								</li>
							</ul>
						</div>
					</div>
				<div class="row">
					<div class="col-sm-3 col-xs-6">
						<div class="unidade text-left">
						<span>Unidade I <br class="visible-xs">  Jardim Satélite</span><br><span>12 3935-8000</span>
						</div>	

					</div>
					<div class="col-sm-6 hidden-xs"><a class="logo animated flipInY" href="{{route('home')}}">
					<img src="{{asset('/min/img/logo.png')}}" class="img-responsive"></a></div>
					<div class="col-sm-3 col-xs-6">
						<div class="unidade text-right">
						<span>Unidade II <br class="visible-xs"> Jardim Esplanada</span><br><span>12 3949-6000</span>
						</div>	

					</div>
				</div>
				</div>
				<div class="container-fluid p-all-0">		
							<div class="col-xs-6 visible-xs">
					<a class="logo-mobile animated flipInY" href="#"><img src="{{asset('/min/img/logo.png')}}" class="img-responsive"></a>
				</div>	
				<div class="col-xs-6 visible-xs">
					<a href="#" class="menu-bars abrir" data-alvo=".menu">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</a>
				</div>
		<div class="menu">
			<a href="" class="fechar" data-alvo=".menu">
					<i class="fa fa-times" aria-hidden="true"></i> 
			</a>
						
							<ul >

								<li class="">
									<a href="{{route('quem-somos')}}">Quem Somos</a>
								</li>
								<li class="">
									<a href="{{route('contato')}}">Contato</a>
								</li>
								<li>
									<a href="{{route('cadastro-imovel')}}" class="active">Cadastre seu imóvel</a>
								</li>
								<li>
									<a href="{{route('imovel.contrato',['contrato'=>'Locação'])}}">Locação</a>
								</li>
								<li>
									<a href="{{route('imovel.contrato',['contrato'=>'Venda'])}}">Venda</a>
								</li>
								<li class="visible-xs">
									<a href="http://vaniadesene.com.br/administracao/administracao.html" target="_blank">Adminstração</a>
								</li>
								
							</ul>
						</div>
					

					<div class="clearfix">
						

						
					</div>
				</div>
			</div>

	    @include('includes.search-interno')
		<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
			@yield('content')
				

		

		@include('includes.footer')
	</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="{{asset('/min/js/vania.js')}}"></script>
@yield('post-script')
	
<script type="text/javascript">
		$(document).ready(function() {
			$("input[name='cidade[]']").on('change',function(){
			    $.post("{{route('ajax.bairro')}}",{cidade:$(this).val()},function(data){    
			      $(".select-bairro").find('ul').html(data);
			      $(".select-bairro").find(".select").removeClass("desable");
			    })
			})
		})
	</script>
</body>

</html>
