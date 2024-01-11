@extends('layouts.painel')
@section('pre-assets')
<style>
.center-form{
  width: 1000px;
  margin: 0 auto;
}

.preview-item{
    width: 100%;
    padding: 10px;
    display: flex;
}
.preview-item img{
    width:20%;

}
.preview-item a{
    display: flex;
    height:100%;
    width:10%;
    text-decoration:none;
}

.container-cep{
        position: relative;
    }
    #searchCep{
        position: absolute;
        top: 0;
        right: 0;
        padding: 6px 12px;
        background: none;
        border: none;
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
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('cep','CEP:') !!}
                        <div class="container-cep" >
                            <input type="text" name="cep" id="buscaCep" class="form-control cad-form cepMask" value="{{$imoveis->cep}}">
                            <button type="button" id="searchCep">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('rua','Rua:') !!}
                        <input class="form-control" required="true" name="rua" type="text" id="rua" value="{{$imoveis->rua}}">
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
                        <input class="form-control" required="true" name="uf" type="text" id="uf" value="{{$imoveis->uf}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('latitude','Latitude:') !!}
                        <input class="form-control" required="true" name="latitude" type="text" id="latitude" value="{{$imoveis->latitude}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('longitude','Longitude:') !!}
                        <input class="form-control" required="true" name="longitude" type="text" id="longitude" value="{{$imoveis->longitude}}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('contrato','Contrato:') !!}
                        <select name="contrato" class="form-control"> 
                            <option selected>{{$imoveis->contrato}}</option>
                          @foreach ($contratoimovel as $contratoimoveis)
                              <option value="{{ $contratoimoveis }}"> {{ ucfirst(mb_strtolower($contratoimoveis)) }}</option>
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
                        <select name="finalidade" class="form-control">
                            <option selected>{{$imoveis->finalidade}}</option>
                            @foreach ($finalidadeimovel as $finalidades)
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
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('corretor','Corretor:') !!}
                        <select name="corretor" class="form-control">
                            @if ($corretor)
                            <option selected>{{$corretor->nome}}</option>
                            @else
                            <option value="">Nenhum</option>
                            @endif
                            @foreach ($todocorretor as $todocorretores)
                                <option value="{{ $todocorretores->id }}">{{ $todocorretores->nome }}</option>
                            @endforeach
                        </select>
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
                        @if (count($fotoimoveis)>0)
                        @foreach ($fotoimoveis as $foto)
                        <div class="container-upload" id="foto_{{$foto->id}}">
                            <input type="hidden" name="foto[url][]" value="{{$foto->url}}" />
                            <input type="hidden" name="foto[arquivo][]" value="{{$foto->arquivo}}" />
                            <img src="{{ asset($foto->url) }}" alt="">
                            <input type="text" name="foto[ordem][]" class="form-control" value="{{$foto->ordem}}" style="height: 30px"/>
                            <input type="text" name="foto[descricao][]" class="form-control" value="{{$foto->descricao}}" placeholder="Descrição" style="height: 30px"/>
                            <button type="button" class="btn btn-icon btn-dark btn-xs ml-3 icon" data-tooltip-arquivar="Excluir" style="height: 30px;" onclick="excluirFoto('{{$foto->id}}')">
                                <i class="fas fa-trash pr-0"></i>
                                <span class="tooltip">Excluir</span>
                            </button>
                        </div>
                        @endforeach
                        @endif
                        <div class="container-upload">
                            <input type="file" class="uploadArquivos" multiple>
                            <i class="fas fa-file-upload pr-2"></i> Clique aqui para cadastrar fotos
                            <div class="carregandoDestaque" style="display: none;">Carregando...</div>
                        </div>
                        <div id="previews" class="d-flex flex-wrap"></div>
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
        data.append('files[]', file);
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
            var total = $(".preview-item").length;
            var prox = total + 1;

            $(".containerUpload").fadeOut('fast');

            $.each(result, function (index, value) {
                var urlBase = "{{ URL::to('/') }}";
                var html = '';
                    html +='<div class="preview-item">';
                    html +='<input type="hidden" name="foto[url][]" value="/upload/imoveis/'+value+'" />';
                    html +='<input type="hidden" name="foto[arquivo][]" value="'+value+'" />';
                    html +='<img src="'+urlBase+'/upload/imoveis/'+value+'" alt="">';
                    html +='<input type="text" name="foto[ordem][]" class="form-control" value="'+prox+'" style="height: 30px"/>';
                    html +='<input type="text" name="foto[descricao][]" class="form-control" placeholder="Descrição" style="height: 30px"/>';
                    html +='<button type="button" class="btn btn-icon btn-dark btn-xs ml-3 delete-photo icon" data-tooltip-arquivar="Excluir" style="height: 30px;">';
                    html +='<i class="fas fa-trash pr-0"></i>';
                    html += '<span class="tooltip">Excluir</span>';
                    html += '</button>';
                    html +='</div>';

                $('#previews').append(html);
            });

            $(".carregandoDestaque").hide(0);
        }
    });
});

$(document).on('click', '.delete-photo', function(e) {
    e.preventDefault();
    $(this).parent('.preview-item').remove();
});

function excluirFoto(id) {
    var container = document.getElementById('foto_' + id);
    if (container) {
        container.remove();
    }
}

function formatarValor(input) {
    var valor = input.value.replace(/\D/g, '');
    valor = (valor / 100).toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    input.value = valor;
}

function buscaCep(cep) {
    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
        $("input[name='rua']").val(dados.logradouro)
        $("input[name='bairro']").val(dados.bairro)
        $("input[name='cidade']").val(dados.localidade)
        $("input[name='uf']").val(dados.uf)

    });
}
$("#buscaCep").change(function() {
    buscaCep($(this).val())
});

$("#searchCep").click(function(e) {
    e.preventDefault();
    buscaCep($("#buscaCep").val())
})
</script>
@endsection
