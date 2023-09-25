@extends('layouts.painel')
@section('pre-assets')
<style>
.center-form{
  width: 1000px;
  margin: 0 auto;
}

.containerUpload {
        background-color: transparent;
        text-transform: uppercase;
        text-align: center;
        display: block;
        cursor: pointer;
        position: relative;
    }
    .containerUpload p{
        font-size: 12px;
        padding-top: 0.75rem;
        color: #8F8B8B;
    }

.corretor-img{
    max-height: 200px;
    width: 200px;
    border-radius: 50%;
    border: 2px solid #D3D3D3;
}

.corretor-close{
    display: block;
    width: 210px;
}

.corretor-close i{
    float: right;
}
</style>
@endsection
@section('content')
<section class="content-header m-bottom-lg">
<div class="clearfix"></div>
</section>
<form action="{{ route('admin.corretor.store') }}" id="formStore" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="col-8 center-form">
        <div class="card p-5">
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('id_sistemas','Id Sistema:') !!}
                        {!! Form::text('id_sistemas',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group ">
                        {!! Form::label('Nome','Nome Completo:*') !!}
                        {!! Form::text('nome',null,['class'=>'form-control', 'required'=>'true']) !!}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('funcao','Função:') !!}
                        {!! Form::text('funcao',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('loja','Loja:') !!}
                        {!! Form::text('loja',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('telefone','Telefone:') !!}
                        {!! Form::text('telefone',null,['class'=>'form-control telMask','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('creci','Creci:') !!}
                        {!! Form::text('creci',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('email','E-mail:') !!}
                        {!! Form::text('email',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12">
                        <label>Foto:</label>
                    </div>
                    <div class="col-6 text-center borda">
                        <div class="imagens">
                            <div class="col-12">
                                <div>
                                    <div class="containerUpload">
                                        <input type="file" name="foto" id="arquivo" class="uploadArquivos">
                                    </div>
                                </div>
                                <div id="preview">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <hr>
            <div class="row mt-3">
                <div class="col-6 ">
                    <a href="{{route('admin.corretor.list')}}" class="btn btn-flat btn-default" data-action="cancelar">Cancelar</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary float-right">Salvar</button>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
@section('pos-script')
<script src="{{asset('/img/flags/country-codes-case-lower.json')}}"></script>
<script>

$('.uploadArquivos' ).on('change', function() {
      $(this).closest('.container-upload').find(".carregandoDestaque").show(0);
      var data = new FormData();
     

          $.each($("input[id='arquivo']")[0].files, function(i, file) {
            data.append('file', file);
          });
          data.append('_token', '{{csrf_token()}}');

          $.ajax({
          url: '{{ route("admin.corretor.upload") }}',
          type: 'POST',
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
            $(".containerUpload").fadeOut('fast');
                $.each(result, function (index, value) {

                var urlBase = "{{ URL::to('/') }}";
                var html = '';

                html +='<div style="float:left">';

                    html +='<input type="hidden" name="foto" value="/upload/corretor/'+value+'" />';
                    html +='<a href="#" class="corretor-close remote" data-file="'+value+'">';
                    html +='<i class="fas fa-times"></i> ';
                    html += '</a>';
                    html +='<img src="'+urlBase+'/upload/corretor/'+value+'" alt="" class="corretor-img">';
                    html +='</div>';

                    $('#preview').html(html);
                });
          $(".carregandoDestaque").hide(0);
          }

          });

    });

    $("#preview").on('click', '.remote', function(e) {
    e.preventDefault();

    var $parent = $(this).parent();

    $.get("{{ route('admin.corretor.deleteImg') }}", {
        name: $(this).data("file"),
        collum: 'foto'
    })
    .done(function(data) {
        if (data.status === 'success') {
            $parent.remove();

            $(".containerUpload").fadeIn('fast');
            $("#preview").after(uploadHtml);
        } else {
            console.error('Erro ao excluir a imagem:', data.message);
        }
    })
    .fail(function() {
        console.error('Erro na solicitação AJAX.');
    });
});



 $("#formStore").submit(function(e) {
        e.preventDefault();
        $("span.error").remove()
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                swal({
                title: "Parábens",
                text: "Cadastro realizado com sucesso!.",
                icon: "success",
                });
                $("#formStore")[0].reset();
                $(".disabled").remove()
            },
            error: function(err) {
                console.log(err);
               
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    console.log(err.responseJSON);
                    $('#success_message').fadeIn().html(err.responseJSON.message);
                    // you can loop through the errors object and show it to the user
                    console.warn(err.responseJSON.errors);
                    // display errors on each form field
                    $.each(err.responseJSON.errors, function(i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span class="error" style="color: red;">' + error[0] + '</span>'));
                    });
                }
            }
        })
    })
</script>
@endsection
