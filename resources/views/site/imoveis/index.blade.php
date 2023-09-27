@extends('layouts.site')

@section('head')
<style>
</style>
@endsection

@section('content')
<section id="imoveis">
        <div class="container">
          <div class="textotitle">
           
            Imóveis para <div class="cor">
            @if($contrato)
                {{Helper::corrigiAcento($contrato)}}
            @else
                Venda e Locação
            @endif
            </div>
   
          </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-sm-5 mt-2">
                <div class="col_categoria_1">
                    <div class="category-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <div class="search">
                                <form action="{{ route('site.imoveis.index')}}">
                                    <input type="text" placeholder="Buscar por código" name="codigo">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        <form action="{{ route('site.imoveis.index')}}" method="GET" id="formFiltro">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="categorias">
                                        Modalidade
                                    </div>
                                </div>
                       <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" name="contrato[]" @if($contrato == 'venda') checked @endif value="Venda" type="checkbox"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Venda
                            </label>
                        </div>
                       </div>
                       <div class="col-6">
                       <div class="form-check">
                            <input class="form-check-input" name="contrato[]" @if($contrato == 'locacao') checked @endif value="Locação" type="checkbox"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Locação
                            </label>
                        </div>
                       </div>
                       </div>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsetipo" role="button" aria-expanded="false" aria-controls="collapsetipo">
                                    Tipo
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsetipo">
                                <div class="col-12">
                                    <div class="row">
                                        @foreach ($tipos as $tipoimoveis)
                                        
                                        <div class="tipo">
                                            <div class="form-check">
                                                <input class="form-check-input" name="tipo" value="{{ $tipoimoveis }}" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                {{ Helper::corrigiAcento($tipoimoveis) }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsefinalidade" role="button" aria-expanded="false" aria-controls="collapsefinalidade">
                                    Finalidade <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsefinalidade">
                                <div class="col-12">
                                    <div class="row">
                                        @foreach ($finalidadeimovel as $finalidadeimoveis)
                                        <div class="tipo">
                                            <div class="form-check">
                                                <input class="form-check-input" name="finalidade" value="{{ $finalidadeimoveis->finalidade }}" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                   
                                                    {{ Helper::corrigiAcento($finalidadeimoveis->finalidade) }}
                                                    <!--{{ $finalidadeimoveis->finalidade }}-->
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsecidade" role="button" aria-expanded="false" aria-controls="collapsecidade">
                                    Cidade
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsecidade">
                                <div class="col-12 tipo" style="max-width:100%">
                                        @foreach ($bairros as $Kcidade => $vBairros)
                                            <div class="form-check">
                                                <input class="form-check-input" name="cidade" value="{{ $Kcidade }}" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    
                                                    {{ Helper::corrigiAcento($Kcidade) }}
                                                    <!--{{ $finalidadeimoveis->finalidade }}-->
                                                </label>
                                            </div>
                                        @endforeach
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsebairro" role="button" aria-expanded="false" aria-controls="collapsebairro">
                                    Bairro
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsebairro">
                                <div class="col-12 tipo" style="max-width:100%">
                                
                                   

                                    @foreach ($bairros as $Kcidade => $vBairros)
                                    @foreach ($vBairros as $bairroimoveis)
                                            <div class="form-check">
                                                <input class="form-check-input" name="cidade" value="{{ $bairroimoveis['bairro'] }}" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                
                                                {{ Helper::corrigiAcento($bairroimoveis['bairro'] ) }}
                                                 
                                                </label>
                                            </div>
                                            @endforeach
                                        @endforeach
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsevalor" role="button" aria-expanded="false" aria-controls="collapsevalor">
                                    Valor
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsevalor">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="valor mr-2">
                                            <label for="">Mínimo</label>
                                            <input type="text" class="moneyMask form-control" name='valormin' style="padding: 0; padding-right:0">
                                        </div>
                                        <div class="valor">
                                            <label for="">Máximo</label>
                                            <input type="text" class="moneyMask form-control" name='valormax' style="padding: 0; padding-right:0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsequartos" role="button" aria-expanded="false" aria-controls="collapsequartos">
                                    Quartos
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsequartos">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOR]" value="1" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOR]" value="2" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOR]" value="3" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOR]" value="4" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    4+
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsesuites" role="button" aria-expanded="false" aria-controls="collapsesuites">
                                    Suítes
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsesuites">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOP]" value="1" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOP]" value="2" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOP]" value="3" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOP]" value="4" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    4+
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsevagas" role="button" aria-expanded="false" aria-controls="collapsevagas">
                                    Vagas
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsevagas">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[GAR]" value="1" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[GAR]" value="2" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[GAR]" value="3" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[GAR]" value="4" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    4+
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsebanheiros" role="button" aria-expanded="false" aria-controls="collapsebanheiros">
                                    Banheiros
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsebanheiros">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[FAC]" value="1" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[FAC]" value="2" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[FAC]" value="3" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[FAC]" value="4" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    4+
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsearea" role="button" aria-expanded="false" aria-controls="collapsearea">
                                    Área útil
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsearea">
                                <div class="col-12 px-0">
                                <div class="row">
                                        <div class="valor mr-2">
                                            <label for="">Mínimo</label>
                                            <input type="text" class=" form-control" name='are_min'>
                                        </div>
                                        <div class="valor">
                                            <label for="">Máximo</label>
                                            <input type="text" class=" form-control" name='area_max' >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="botao_filtro">Aplicar filtro</button>
                        <a href="{{route('site.imoveis.index')}}" class="filtro"> Limpar filtro</a>
                    </div>
                    </form>
                </div>
                <div class="col_categoria_2" id="lista-imoveis">
                    @include('site.imoveis._lista_result')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('pos-script')

<script>
    
    function listaImoveis(url = null){
    var rota = '{{route("site.imoveis.index")}}';
    if(url){
      rota = url;
    }
    var formData = $("#formFiltro").serialize();
$(".preloader").fadeIn('fast');
$("#lista-imoveis").html('')
$.ajax({
      type: "GET",
      url: rota,
      data: formData,
      dataType: "html",
      encode: true,
    }).done(function (data) {
        console.log(data)
        $("#lista-imoveis").html(data)
      $(".preloader").fadeOut('fast');
    
    }).fail(function (data) {
        $(".preloader").fadeOut('fast');
    });

  
  }
  $("body").on('change','.form-check-input',function(e){
  
    
    listaImoveis();
  })
  $("body").on('change','#formFiltro input[type="text"]',function(e){
    e.preventDefault();
  
    
    listaImoveis();
  })
  $("body").on('click','.pagination a',function(e){
    e.preventDefault();
    var url = $(this).attr('href');
    $("html, body").animate({ scrollTop: 0 }, "slow");
    listaImoveis(url);
  })
  $("#formFiltro").submit(function(e){
    e.preventDefault();
    listaImoveis();
  })


  
const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
range = document.querySelector(".slider .progress");
let priceGap =10;



priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPrice = parseFloat(priceInput[0].value),
        maxPrice = parseFloat(priceInput[1].value);
        
        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            if(e.target.className === "input-min"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseFloat(rangeInput[0].value),
        maxVal = parseFloat(rangeInput[1].value);

        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = (maxVal - priceGap)
            }else{
                rangeInput[1].value = (minVal + priceGap);
            }
        }else{
            priceInput[0].value = (minVal);
            priceInput[1].value =(maxVal);
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});


</script>

@endsection