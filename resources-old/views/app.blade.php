
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title >Vania de Sene - Negócios Imobiliários</title>
	<meta name="description" content="A Vania de Sene Negócios Imobiliários disponibiliza o que há de melhor em assessoria imobiliária.">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" type="image/x-icon" href="{{asset('/min/img/favicon/favicon.ico')}}" />
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

	<link href="{{asset('/min/css/styles.css')}}" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

	@yield('pre-assets')
	<style>
		.containerWhatsApp{
			position: fixed;
			right: 40px;
			bottom: 40px;
			height: 50px;
			width: 50px;
			z-index: 99999;
			display: flex;
			    align-items: flex-end;
    justify-content: flex-end;
		}
		@media  (min-width:768px){
			.containerWhatsApp:hover{
			height: 174px;
    		width: 241px;
		}
		.containerWhatsApp:hover .floatNumbers{
			display: block;
		}
		}
	
		.controleWhats{
			position: relative;
			width: 50px;
   		 	height: 50px;
		}
		.floatNumbers{
			position: absolute;
			bottom: 60px;
			right: 0;
			width: 240px;
			display: flex;
			flex-direction: column;
			text-align: center;
			background: #fff;
			border-radius: 10px;
			padding: 15px;
			font-size: 1.2em;
			gap: 11px;
			box-shadow: 4px 3px 3px #aeaeae;
			display: none;
		}
		.floatNumbers a{
			color: #fff;
			background: #007630;
			display: block;
			padding: 5px 8px;
			border-radius: 8px;
			margin: 5px 0;
		}
		.btnOpenWhats{
			position: absolute;
			width: 50px;
			height: 50px;
			padding: 5px;
			border-radius: 50%;
			background: #007630;
			color: #fff;
			border: none;
			right: 0;
			bottom: 0;
			font-size: 33px;
			line-height: 33px;
		}
		
	</style>

	@include('includes.analyticstracking')
	
	<script type='application/ld+json'>
		{
			"@context":"http:\/\/schema.org",
			"@type":"WebSite",
			"@id":"#website",
			"url":"http:\/\/vaniadesene.com.br\/",
			"name":"Vania de Sene - Negócios Imobiliários",
			"alternateName":"Vania de Sene - Locação de imóveis, Venda de imóveis, assessoria imobiliária",
			"potentialAction":{
			"@type":"SearchAction",
			"target":"http:\/\/vaniadesene.com.br\/",
			
		}
}
</script>
	<script type='application/ld+json'>
	{
	"@context":"http:\/\/schema.org",
	"@type":"Organization",
	"url":"{{Request::url()}}",
	"sameAs":[
	"https:\/\/www.facebook.com\/vaniadeseneimoveis",
	],
	"@id":"#organization",
	"name":"Vania de Sene - Negócios Imobiliários",
	"logo":"http:\/\/vaniadesene.com.br\/min\/img\/vania-de-sene.jpg"
	}</script>


</head>

<body>

	<main class="main-wrapper side-collapse-container">
		<div class="main-home-bg">
		<div class="main-navbar-vania">
				<div class="container-fluid ">
				<div class="row hidden-xs">
					<div class="col-sm-4">
						<h1>Vania de Sene - Negócios Imobiliários</h1>
						</div>
					<div class="col-sm-4 pull-right">
						<ul id="menu-adm">
							<li>
								<a href="{{route('administracao')}}">Adminstração</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-xs-6">

						<div class="unidade text-left">
							<a href="https://api.whatsapp.com/send?phone=5512996586008" target="_blank" style="color: #fff; font-size: 0.9em"><i class="fa fa-whatsapp"></i> (12) 99658-6008</a><br>
						<small>Creci 19.068-J</small><br><span>Unidade I  <br class="visible-xs"> Jardim Satélite</span><br><span>12 3935-8000</span>
						</div>	

					</div>
					<div class="col-sm-6  hidden-xs">

					<a class="logo animated flipInY " href="#"><img src="{{asset('/min/img/logo.png')}}" class="img-responsive" alt="Vania de Sene - Negócios Imobiliários"></a></div>
					<div class="col-sm-3 col-xs-6">
						<div class="unidade text-right"  >
							<a href="https://api.whatsapp.com/send?phone=5512991017341" target="_blank" style="color: #fff; font-size: 0.9em"> (12) 99658-8525 <i class="fa fa-whatsapp"></i></a><br>
						<small>Creci 32.366-J</small><br><span>Unidade II  <br class="visible-xs">Jardim Esplanada</span><br><span>12 3949-6000</span>
						</div>	

					</div>
				</div>
				</div>
				<div class="container-fluid p-all-0">		
				<div class="col-xs-6 visible-xs">
					<a class="logo-mobile animated flipInY" href="#"><img src="min/img/logo.png" class="img-responsive"></a>
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
									<a href="{{route('imovel.contrato',['contrato'=>'locacao'])}}">Locação</a>
								</li>
								<li>
									<a href="{{route('imovel.contrato',['contrato'=>'Venda'])}}">Venda</a>
								</li>
								<li class="visible-xs">
									<a href="{{route('administracao')}}" target="_blank">Adminstração</a>
								</li>
								
							</ul>
						</div>
					

					<div class="clearfix">
						

						
					</div>
				</div>
			</div>
			
 			@include('includes.search')
	  

			<section class="main-go-down">
				<a href="#highlights-section" role="button" class="btn btn-go-down js-anchor-link"><i class="icon-down-open"></i></a>
			</section>
		</div>

		@yield('content')

		@include('includes.footer')

	</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="{{asset('/min/js/vania.js')}}"></script>
	@yield('pos-script')
	
	<script type="text/javascript">
		var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

		$(document).ready(function() {
			if( isMobile.any() ){
				$("body").on('click','.btnOpenWhats', function(){
				
					$(".floatNumbers").fadeToggle('fast')
				
			})
			};

			
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