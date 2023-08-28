@extends('layouts.painel')
@section('pre-assets')
<style>
.center-form{
  width: 1000px;
  margin: 0 auto;
}
</style>
@endsection
@section('content')
<section class="content-header m-bottom-lg">
<div class="clearfix"></div>
</section>
<form action="{{ route('admin.imoveis.store') }}" id="formStore" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="col-8 center-form">
        <div class="card p-5">
            <div class="row">
                <div class="col-12">
                    <div class="form-group ">
                        {!! Form::label('anuncio','Anúncio:') !!}
                        {!! Form::text('anuncio',null,['class'=>'form-control', 'required'=>'true']) !!}
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('titulo','Título:') !!}
                        {!! Form::text('titulo',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('tipoanuncio','Tipo Anúncio:') !!}
                        {!! Form::text('tipoanuncio',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('valor','Valor:') !!}
                        {!! Form::text('valor',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        {!! Form::label('bairro','Bairro:') !!}
                        {!! Form::text('bairro',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        {!! Form::label('cidade','Cidade:') !!}
                        {!! Form::text('cidade',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('uf','UF:') !!}
                        {!! Form::text('uf',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('contrato','Contrato:') !!}
                        {!! Form::text('contrato',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <!--<div class="col-sm-3">
                    {!! Form::label('contrato','Contrato:') !!}
                    <select class="form-select" aria-label="" data-name="contrato[]" style="width: 100%; padding: 0.375rem 0.75rem">
                        <option selected name="contrato[]" value="venda">Venda</option>
                        <option name="contrato[]" value="locacao">Locação</option>
                    </select>
                </div>-->
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('regiao','Região:') !!}
                        {!! Form::text('regiao',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('empresa','Empresa:') !!}
                        {!! Form::text('empresa',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('finalidade','Finalidade:') !!}
                        {!! Form::text('finalidade',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>

                <!--<div class="col-sm-3">
                    {!! Form::label('finalidade','Finalidade:') !!}
                    <select class="form-select" aria-label="" data-name="finalidade[]" style="width: 100%; padding: 0.375rem 0.75rem">
                        <option selected name="finalidade[]" value="Comercial">Comercial</option>
                        <option name="finalidade[]" value="Res/Com">Res/Com</option>
                        <option name="finalidade[]" value="Residencial">Residencial</option>
                    </select>
                </div>-->
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('grupo','Grupo:') !!}
                        {!! Form::text('grupo',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('referencia','Referência:') !!}
                        {!! Form::text('referencia',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('referencia_original','Referência Original:') !!}
                        {!! Form::text('referencia_original',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('tipo','Tipo:') !!}
                        {!! Form::text('tipo',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('detalhes','Detalhes:') !!}
                        {!! Form::text('detalhes',null,['class'=>'form-control','placehold'=>'']) !!}
                    </div>
                </div>
                <!--<div class="col-12">
                    <div class="form-group">
                    {!! Form::label('detalhes','Detalhes:') !!}
                    {!! Form::textarea('value',null,['class'=>'form-control', 'required'=>'true', 'rows'=>'5']) !!}
                    </div>
                </div>-->
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('caracteristicas','Características:') !!}
                        <div style="max-height: 350px; overflow-y: auto; overflow-x: hidden;">
                            <ul class="pl-0" style="list-style: none;">
                                <li class="mb-3  catCaracteristica itemOrdenar" id="caracteristica">
                                    <div class="col-2 px-0 d-inline-block">
                                        <select name="caracteristica[pref][]" class="form-control">
                                            @foreach ($prefcar as $pref)
                                                <option value="{{ $pref->pref }}">{{ $pref->pref }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-5 px-0 d-inline-block">
                                        <select name="caracteristica[label][]" class="form-control">
                                            @foreach ($labelcar as $label)
                                                <option value="{{ $label->label }}">{{ $label->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 px-0 d-inline-block">
                                        <input type="text" name="caracteristica[valor][]" required placeholder="Valor" class="form-control">
                                    </div>
                                    <div class="d-inline-block ml-5">
                                        <button type="button" class="btn btn-icon btn-dark btn-xs ml-3 removeDefault icon" data-tooltip-arquivar="Excluir">
                                            <i class="fas fa-trash pr-0"></i>
                                            <span class="tooltip">Excluir</span>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                            <div class="mt-5 pb-3">
                                <a href="" class="w-115px btn btn-primary btn-xs addCaracteristica">
                                    <i class="fas fa-plus p-1"></i> Características
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('foto','Foto:') !!}
                        <div style="max-height: 350px; overflow-y: auto; overflow-x: hidden;">
                            <ul class="pl-0" style="list-style: none;">
                                <li class="mb-3 catfoto d-flex" id="foto_2">
                                        <div class="containerUpload col-5">
                                            <input type="file" name="foto" id="arquivo" class="uploadArquivos">
                                        </div>
                                        <div id="preview_2"></div>
                                    <div class="col-2">
                                        <input type="text" name="foto[ordem][]" class="form-control" value="1" style="height: 30px"/>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="foto[descricao][]" class="form-control" placeholder="Descrição" style="height: 30px"/>
                                    </div>
                                    <div class="d-inline-block ml-5">
                                        <button type="button" class="btn btn-icon btn-dark btn-xs ml-3 removefoto icon" data-tooltip-arquivar="Excluir">
                                            <i class="fas fa-trash pr-0"></i>
                                            <span class="tooltip">Excluir</span>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                            <div class="mt-5 pb-3">
                                <a href="" class="w-115px btn btn-primary btn-xs addfoto">
                                    <i class="fas fa-plus p-1"></i> Fotos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6 ">
                    <a href="{{route('admin.imoveis.list')}}" class="btn btn-flat btn-default" data-action="cancelar">Cancelar</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
    $("body").on('click','.addCaracteristica',function(e){
        e.preventDefault();
     
        var total = $("#caracteristicas .catCaracteristica").length;
        
        var next = total + 1;

        var html = `<li class="mb-3 catCaracteristica" id="caracteristica">
        <div class="col-2 px-0 d-inline-block">
                                        <select name="caracteristica[pref][]" class="form-control">
                                            @foreach ($prefcar as $pref)
                                                <option value="{{ $pref->pref }}">{{ $pref->pref }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-5 px-0 d-inline-block">
                                        <select name="caracteristica[label][]" class="form-control">
                                            @foreach ($labelcar as $label)
                                                <option value="{{ $label->label }}">{{ $label->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 px-0 d-inline-block">
                                        <input type="text" name="caracteristica[valor][]" required placeholder="Valor" class="form-control">
                                    </div>
                                    <div class="d-inline-block ml-5">
                                        <button type="button" class="btn btn-icon btn-dark btn-xs ml-3 removeDefault icon" data-tooltip-arquivar="Excluir">
                                            <i class="fas fa-trash pr-0"></i>
                                            <span class="tooltip">Excluir</span>
                                        </button>
                                    </div>
    </li>`;
        $(".catCaracteristica").closest('ul').append(html);
        updateIndex()
    })
    $("body").on('click','.removeDefault',function(e){
        e.preventDefault();
        $(this).closest('li').remove()

    })

$(document).on('change', '.uploadArquivos', function() {
    var $uploadInput = $(this);
    var $containerUpload = $uploadInput.closest('.container-upload');
    var $carregandoDestaque = $containerUpload.find(".carregandoDestaque");

    $carregandoDestaque.show(0);

    var data = new FormData();
    $.each($uploadInput[0].files, function(i, file) {
        data.append('file', file);
    });
    data.append('_token', '{{ csrf_token() }}');

    $.ajax({
        url: '{{ route("admin.imoveis.upload") }}',
        type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        success: function(result) {
            var total = $(".catfoto").length;
            var prox = total + 1;
            $(".containerUpload").fadeOut('fast');
                $.each(result, function (index, value) {

                var urlBase = "{{ URL::to('/') }}";
                var html = '';
                    html +='<input type="hidden" name="foto[url][]" value="/upload/imoveis/'+value+'" />';
                    html +='<input type="hidden" name="foto[arquivo][]" value="'+value+'" />';
                    html +='<a href="#" class="corretor-close remote" data-file="'+value+'">';
                    html +='<i class="fas fa-times"></i> ';
                    html += '</a>';
                    html +='<img src="'+urlBase+'/upload/imoveis/'+value+'" alt="" style="width:40%;">';
                  

                    $('#preview_'+prox).html(html);
                });
          $(".carregandoDestaque").hide(0);
        }
    });
});
$(document).ready(function() {
    $("body").on('click', '.remote', function(e) {
        e.preventDefault();

        var $parent = $(this).closest('div');
        var fileName = $(this).data("file");

        $.get("{{ route('admin.imoveis.deleteImg') }}", {
            name: fileName,
            collum: 'foto'
        })
        .done(function(data) {
            if (data.status === 'success') {+



                
                $parent.remove();

                $(".containerUpload").fadeIn('fast');
            } else {
                console.error('Erro ao excluir a imagem:', data.message);
            }
        })
        .fail(function() {
            console.error('Erro na solicitação AJAX.');
        });
    });
});





$("body").on('click','.addfoto',function(e){
        e.preventDefault();

        var total = $(".catfoto").length;
        
        var prox = total + 2;

        var ordem = prox - 1;

        var html = `
        <li class="mb-3 catfoto d-flex" id="foto_`+prox+`">
                <div class="containerUpload col-5">
                    <input type="file" name="foto" id="arquivo" class="uploadArquivos">
                </div>
                <div id="preview_`+prox+`"></div>
            <div class="col-2">
                <input type="text" name="foto[ordem][]" class="form-control" value="`+ordem+`" style="height: 30px"/>
            </div>
            <div class="col-3">
                <input type="text" name="foto[descricao][]" class="form-control" placeholder="Descrição" style="height: 30px"/>
            </div>
            <div class="d-inline-block ml-5">
                <button type="button" class="btn btn-icon btn-dark btn-xs ml-3 removefoto icon" data-tooltip-arquivar="Excluir">
                    <i class="fas fa-trash pr-0"></i>
                    <span class="tooltip">Excluir</span>
                </button>
            </div>
        </li>`;
        $(".catfoto").closest('ul').append(html);
        updateIndex()
    })
    $("body").on('click','.removefoto',function(e){
        e.preventDefault();
        $(this).closest('li').remove()

    })

</script>
@endsection
