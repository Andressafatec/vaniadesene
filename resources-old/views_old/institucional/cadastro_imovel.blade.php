@extends('interno')
@section('content')

<section id="highlights-section" class="main-highlights bg-content">
	<div class="container-fluid">
		<div class="row">
			<h3 class="title">Cadastro de Imóvel<hr></h3>
		</div>
		<div class="panel panel-default col-sm-8 col-sm-offset-2">

			<div class="panel-body ">
			<div id="resultado" style="display: none;opacity: 0;">
											<h2>Formulário enviado com sucesso.</h2>
											<div class="icon">
											<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
											</div>
											<h2>Obrigado.</h2>

										</div>
				{!!Form::open(['route'=>'cadastro-imovel','class'=>'form-imovel','id'=>"form-cadastro",'files' => true])!!}
			
				<div class="row">
					<div class="col-sm-12 text-center">
						<h3>Formulário de Cadastro de Imóvel</h3>
					</div>
				</div>
				<div class="row">  
					<div class="col-sm-4 ">
						<label for="">Nome:*</label>
						<input type="text" name="nome" class="form-control" required="">
					</div>
					<div class="col-sm-4 ">
						<label for="">E-mail:*</label>
						<input type="email" name="email" class="form-control" required="">
					</div>
					<div class="col-sm-4 ">
						<label for="">Telefone:*</label>
						<input type="text" name="telefone" class="form-control telMask" required="">
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-4">
						<label for="">CEP*</label>
						<input type="text" name="cep" id="cep" class="form-control cepMask" required="">
					</div>
					<div class="col-sm-6">
						<label for="">Endereço:*</label>
						<input type="text" name="endereco" id="endereco" class="form-control" required="">
					</div>
					<div class="col-sm-2">
						<label for="">Nº:*</label>
						<input type="text" class="form-control" id="numero" name="numero" required="">
					</div>
					<div class="col-sm-3">
						<label for="">Complemento</label>
						<input type="text" class="form-control" id="complemento" name="complemento">
					</div>
					<div class="col-sm-4">
						<label for="">Bairro:*</label>
						<input type="text" name="bairro" id="bairro" class="form-control" required="">
					</div>
					<div class="col-sm-3">
						<label for="">Cidade:*</label>
						<input type="text" name="cidade" id="cidade" class="form-control" required="">
					</div>
					<div class="col-sm-2">
						<label for="">UF:*</label>
						<input type="text" name="uf" id="uf" class="form-control" required="">
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<label for="">Descrição:*</label>
						<textarea name="descricao" id="descricao"  class="form-control" rows="7" required=""></textarea>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row m-top-md">
					<div class="col-sm-12">
						<label for="">Opções:</label>
						<div class="clearfix"></div>
						@foreach($caracteristicas as $caracteristicas)
						<div class="col-sm-3">

							<input type="checkbox" name="caracteristicas[]" id="" value="{{$caracteristicas->label}}" class=""> <label for="">{{$caracteristicas->label}}</label>
						</div>
						@endforeach
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<label for="">Fotos</label>
						<div class="container-upload">
								<div id="carregandoForm"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
							<input type="file"  id="uploadArquivos" name="file[]" multiple>
							<div><i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER FOTOS</div>
						</div>
						<div id="preview">
							<ul>
								
							</ul>
						</div>


					</div>
				</div>
				<div class="containerbtn">
				<div class="carregnadobtn">
					<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>

				</div>
					{!! Form::submit('Enviar',['class'=>'btn btn-primary btn-action', 'id'=>'btEnviar'])!!}
				</div>
				
			</div>
			{!!Form::close()!!}
		</div>
	</div>

</section>


@stop


@section('post-script')

<script type="text/javascript">
	$(document).ready(function() {
		$('#uploadArquivos' ).on('change', function() {
			  	$("#carregandoForm").show(0);
			  	var data = new FormData();

				$.each($("input[type='file']")[0].files, function(i, file) {
					    data.append('file[]', file);
				});


			    $.ajax({
			      url: '{{route("ajax.upload-foto")}}',
			     type: 'POST',
			    
			    cache: false,
			    contentType: false,
			    processData: false,
			    data : data,
			    success: function(result){
			       $.each(result, function (index, value) {
			       	var html = '';
			       	html +='<li>';
			       	html +='<input type="hidden" name="fotos[]" value="'+value+'" />';
			       	html +='<a href="#" class="remove" data-file="'+value+'">';
			       	html +='<i class="fa fa-window-close" aria-hidden="true"></i>';
			       	html += '</a>';
			       	html +='<img src="uploads/'+value+'" alt="">';
					html +='</li>';
				    $('#preview ul').append(html);
				        console.log(value);
				    });
			       $("#carregandoForm").hide(0);
			    }
			    } );
			   
			  });
			  $("#preview").on('click','.remove',function(e){
			  	e.preventDefault();
			  	$(this).parent().addClass("del")
			  	$.get("{{route('ajax.delete-foto')}}",{name: $(this).data("file")},function(data){
			  		if(data == "deletado"){
			  			$(".del").remove();
			  		}
			  	})
			  })
			
			  	$("#form-cadastro").submit(function(e) {
			  		$(".carregnadobtn").fadeIn('fast');
				    var url = "{{route('ajax.enviar-imovel')}}"; // the script where you handle the form input.

				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#form-cadastro").serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				              if(data == "enviado"){
				              
				              	$("#form-cadastro").addClass("animated fadeOutLeft").delay(500).queue(function(next) {
									$("#resultado").slideDown('0');
									$("#resultado").addClass("animated fadeInRight");
									 next();
								});
								$("#form-cadastro").slideUp('fast');
				              }
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
				});
			  		

			 


	});
</script>

@endsection