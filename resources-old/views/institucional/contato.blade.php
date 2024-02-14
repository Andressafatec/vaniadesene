@extends('interno')
@section('content')
<section id="highlights-section" class="main-highlights bg-content">
	<div class="container-fluid">
		<div class="row">
			<h3 class="title">Contato<hr></h3>
		</div>
		
		
		<div class="row">
			<div class="panel panel-default">

				<div class="panel-body">
					<div class="row">  
						<div class="col-sm-12"><h4><strong>Unidade I - Jardim Satélite</strong></h4>  <hr></div>

						<div class="col-sm-6">
							<p><a href="tel:+551239358000">12 3935 8000</a></p>
							<p>Av. Andrômeda, 2320</p> 
							<p>Jd. Satélite - CEP 12233-002</p> 
							<p>São José dos Campos -SP</p> 
							<p><a href="mailto:andromeda@vaniadesene.com.br">andromeda@vaniadesene.com.br</a></p> 
						</div>
						<div class="col-sm-6">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.2619336917064!2d-45.88714998502839!3d-23.233553584846575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc4ac0a6f2b34b%3A0xb473982fac4e16d3!2sVania+de+Sene+-+Neg%C3%B3cios+Imobili%C3%A1rios!5e0!3m2!1spt-BR!2sbr!4v1497625669623" width="100%" height="200" class="iframe-responsive" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="panel panel-default">

				<div class="panel-body">
					<div class="row">  
						<div class="col-sm-12"><h4><strong>Unidade II - Jardim Esplanada</strong></h4>  <hr></div>

						<div class="col-sm-6">
							<p><a href="tel:+551239496000">12 3949 6000</a></p>
					<p>Rua Maria Demetria Kfuri, 649</p>
					<p>Jd. Esplanada - CEP 12244-500</p>
					<p>São José dos Campos -SP</p>
					<a href="mailto:esplanada@vaniadesene.com.br">esplanada@vaniadesene.com.br</a>
						</div>
						<div class="col-sm-6">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3667.1138032738386!2d-45.908802985566346!3d-23.202522884862237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc358badd2de55%3A0x2c89a9ce513bba77!2sR.+Irm%C3%A3+Maria+D%C3%A9m%C3%A9tria+Kfuri%2C+649+-+Jardim+Esplanada%2C+S%C3%A3o+Jos%C3%A9+dos+Campos+-+SP!5e0!3m2!1spt-BR!2sbr!4v1497626341858" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
							
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-sm-4">
			{!! Form::open(['route'=>'contato','class'=>'form','method'=>'get'])!!}

			{!! Form::close()!!}
		</div>
	</div>

</div>
</section>


@stop