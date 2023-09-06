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
<form action="{{ route('admin.imoveis.update',$imoveis->id) }}" id="formStore" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <section class="col-8 center-form">
        <div class="card p-5">
            <div class="row">
                <div class="col-12">
                    <div class="form-group ">
                        {!! Form::label('anuncio','Anúncio:') !!}
                        <input class="form-control" required="true" name="anuncio" type="text" id="anuncio" value="{{$imoveis->anuncio}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('titulo','Título:') !!}
                        <input class="form-control" required="true" name="titulo" type="text" id="titulo" value="{{$imoveis->titulo}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('tipoanuncio','Tipo Anúncio:') !!}
                        <input class="form-control" required="true" name="tipoanuncio" type="text" id="tipoanuncio" value="{{$imoveis->tipoanuncio}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('valor','Valor:') !!}
                        <input class="form-control" required="true" name="valor" type="text" id="valor" value="{{$imoveis->valor}}">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        {!! Form::label('bairro','Bairro:') !!}
                        <input class="form-control" required="true" name="bairro" type="text" id="bairro" value="{{$imoveis->bairro}}">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        {!! Form::label('cidade','Cidade:') !!}
                        <input class="form-control" required="true" name="cidade" type="text" id="cidade" value="{{$imoveis->cidade}}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('uf','UF:') !!}
                        <input class="form-control" required="true" name="uf" type="text" id="if" value="{{$imoveis->uf}}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('contrato','Contrato:') !!}
                        <select name="contrato" class="form-control">
                            <option selected>{{$imoveis->contrato}}</option>
                            @foreach ($contrato as $contratos)
                                <option value="{{ $contratos->contrato }}">{{ $contratos->contrato }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('regiao','Região:') !!}
                        <input class="form-control" required="true" name="regiao" type="text" id="regiao" value="{{$imoveis->regiao}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('empresa','Empresa:') !!}
                        <input class="form-control" required="true" name="empresa" type="text" id="empresa" value="{{$imoveis->empresa}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('finalidade','Finalidade:') !!}
                        <select name="contrato" class="form-control">
                            <option selected>{{$imoveis->finalidade}}</option>
                            @foreach ($finalidade as $finalidades)
                                <option value="{{ $finalidades->finalidade }}">{{ $finalidades->finalidade }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('grupo','Grupo:') !!}
                        <input class="form-control" required="true" name="grupo" type="text" id="grupo" value="{{$imoveis->grupo}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('referencia','Referência:') !!}
                        <input class="form-control" required="true" name="referencia" type="text" id="referencia" value="{{$imoveis->referencia}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('referencia_original','Referência Original:') !!}
                        <input class="form-control" required="true" name="referencia_original" type="text" id="referencia_original" value="{{$imoveis->referencia_original}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('tipo','Tipo:') !!}
                        <input class="form-control" required="true" name="tipo" type="text" id="tipo" value="{{$imoveis->tipo}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('detalhes','Detalhes:') !!}
                        <input class="form-control" required="true" name="detalhes" type="text" id="detalhes" value="{{$imoveis->detalhes}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('caracteristicas','Características:') !!}
                        <div style="max-height: 350px; overflow-y: auto; overflow-x: hidden;">
                        @if(count($caracteristicas) > 0)
                        @foreach ($caracteristicas as $caracteristica)
                            <ul class="pl-0" style="list-style: none;">
                                <li class="mb-3  catCaracteristica itemOrdenar" id="caracteristica">
                                    <div class="col-2 px-0 d-inline-block">
                                        <select name="caracteristica[pref][]" class="form-control">
                                            <option selected>{{$caracteristica->pref}}</option>
                                            @foreach ($prefcar as $pref)
                                                <option value="{{ $pref->pref }}">{{ $pref->pref }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-5 px-0 d-inline-block">
                                        <select name="caracteristica[label][]" class="form-control">
                                            <option selected>{{$caracteristica->label}}</option>
                                            @foreach ($labelcar as $label)
                                                <option value="{{ $label->label }}">{{ $label->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 px-0 d-inline-block">
                                        <input type="text" name="caracteristica[valor][]" placeholder="Valor" class="form-control" value="{{$caracteristica->valor}}">
                                    </div>
                                    <div class="d-inline-block ml-5">
                                        <button type="button" class="btn btn-icon btn-dark btn-xs ml-3 removeDefault icon" data-tooltip-arquivar="Excluir">
                                            <i class="fas fa-trash pr-0"></i>
                                            <span class="tooltip">Excluir</span>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                        @else
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
                                        <input type="text" name="caracteristica[valor][]" placeholder="Valor" class="form-control">
                                    </div>
                                    <div class="d-inline-block ml-5">
                                        <button type="button" class="btn btn-icon btn-dark btn-xs ml-3 removeDefault icon" data-tooltip-arquivar="Excluir">
                                            <i class="fas fa-trash pr-0"></i>
                                            <span class="tooltip">Excluir</span>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        @endif
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
                        @if (count($fotoimoveis)>0)
                        @foreach ($fotoimoveis as $foto)
                            <ul class="pl-0" style="list-style: none;">
                                <li class="mb-3 catfoto d-flex" id="foto_2">
                                        <div class="containerUpload col-5">
                                        <img src="{{ asset($foto->url) }}" alt="">
                                            <input type="file" name="foto" id="arquivo" class="uploadArquivos">
                                            <input type="hidden" name="foto[url][]" value="{{$foto->url}}" />
                                            <input type="hidden" name="foto[arquivo][]" value="{{$foto->arquivo}}" />
                                        </div>
                                        <div id="preview_2"></div>
                                    <div class="col-2">
                                        <input type="text" name="foto[ordem][]" class="form-control" value="{{$foto->ordem}}" style="height: 30px"/>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="foto[descricao][]" class="form-control" value="{{$foto->descricao}}" placeholder="Descrição" style="height: 30px"/>
                                    </div>
                                    <div class="d-inline-block ml-5">
                                        <button type="button" class="btn btn-icon btn-dark btn-xs ml-3 removefoto icon" data-tooltip-arquivar="Excluir">
                                            <i class="fas fa-trash pr-0"></i>
                                            <span class="tooltip">Excluir</span>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                        @else
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
                        @endif
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
