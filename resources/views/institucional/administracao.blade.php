@extends('layouts.site')
@section('content')
<style>
	.unidade{
		display: none;
	}
	.lista-administracao{
		text-align: center;
	}
	.lista-administracao li{
		display: inline-block;
	}
	.lista-administracao li a{
	    display: block;
	    background: #f29e38;
	    color: #fff;
	    padding: 30px 50px;
	    font-size: 1.5em;
	    text-shadow: 1px 1px 5px #666;
	    border-radius: 5px;
	    margin: 5px 15px;
	}
	.lista-administracao li a.active{
		background: #114a99;
	}
	.lista-administracao li a:hover{
		box-shadow: 5px 5px 10px #c1c1c1;
	}
	iframe{
		border: none;
	}
</style>

	<section id="highlights-section" class="main-highlights bg-content">
			<div class="container">
	
				<h3 class="title">Administração</h3>
				
				<div class="row m-top-lg">
					<ul class="lista-administracao">
						<li><a href="https://vaniadesene.sisprof.srv.br/sisprof/admin/index.csp?empre=3" target="_blank">Unidade I <br> Jardim Satélite</a></li>
						<li><a href="https://vaniadesene.sisprof.srv.br/sisprof/admin/index.csp?empre=103" target="_blank">Unidade II <br> Jardim Esplanada</a></li>
					</ul>
<!--
					<div class="unidade" id="satelite"  >
		            <iframe border="0" width="100%" height="650" src="http://177.103.234.105:8080/admin/index.csp?empre=3" scrollbars="no"></iframe>
					</div>
					<div class="unidade" id="esplanada"  >
		            <iframe border="0" width="100%" height="650" src="http://177.103.234.105:8080/admin/index.csp?empre=103" scrollbars="no"></iframe>-->
					</div>
				</div>
				
			</div>
			</section>

		
@stop
@section('post-script')
<script type="text/javascript">
		$(document).ready(function() {
			
			/*$(".lista-administracao a").click(function(e){
				e.preventDefault();
				var target = $(this).attr("href");
				$(".lista-administracao a").removeClass('active');
				$(this).addClass('active')
				if($(".unidade").is(":visible")){
					$(".unidade").fadeOut('fast',function(){
						$(target).fadeIn('fast');
					});
				}else{
					$(target).fadeIn('fast');
				}

			})*/
		})
	</script>
@endsection