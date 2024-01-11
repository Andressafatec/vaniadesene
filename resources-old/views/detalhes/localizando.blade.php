@extends('interno')
@section('content')
	<section id="highlights-section" class="main-highlights">
			<div class="container">
		
				<h3 class="title text-center">Localizando imóvel por favor aguarde.</h3>
				<div class="row text-center">
				
						<img src="{{asset('min/img/loading.gif')}}" style="height: 200px; width: auto;" alt="" class="img-loading">
				
				</div>
			</div>
			</section>

		
@endsection
@section('post-script')
<script>
	$(document).ready(function(){
		$.get('{{route("ajax.cadastraImovel",$ref)}}',function(data){
			if(data.status == "ok"){
			window.location.href = data.url
			}else{
				$(".img-loading").fadeOut('fast',function(){
					$(".container .row").append('<h3>Imóvel não encontrado</h3>')	
				});
				
			}
		})
	})
</script>
@endsection