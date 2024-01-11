@extends('layouts.site')
@section('head')
<style>
  
</style>
@endsection
@section('content')
<div class="card-overlay" id="cardOverlay"></div>
<section id="banner">
       <div class="fundo">
        <div class="texto">
          Encontre <div class="cor">seu imóvel</div>
        </button>
        </div>
        <form action="{{ route('site.imoveis.index')}}" onsubmit="return validarBusca()" method="GET">
          <div class="search-form wow fadeInUp" data-wow-delay=".7s">
            <div class="row">
                <div class="col-sm col-12 p-0">
                    <div class="search-input">
                      <select name="compras" id="compras"> 
                          <option value=""> Compras</option>
                          @foreach ($contratoimovel as $contratoimoveis)
                              <option value="{{ $contratoimoveis }}"> {{ ucfirst(mb_strtolower($contratoimoveis)) }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-sm col-12 p-0">
                    <div class="search-input">
                        <select name="tipo" id="tipo">
                          <option value="">Tipo Imóvel </option>
                          @foreach($tipos as $k => $tipo)
                          <option value="{{$tipo}}"> {{$tipo}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm col-12 p-0">
                    <div class="search-input">
                 
                      <select name="bairro" id="bairro">
                          <option value=""> Localização </option>
                          @foreach ($bairros as $cidade => $itemBairros)
                          <optgroup name="cidade" label="{{ ucfirst(mb_strtolower($cidade)) }}">
                            @foreach ($itemBairros as $itemBairro)
                           
                                <option name="bairro" value="{{ $itemBairro['bairro'] }}"> {{ ucfirst(mb_strtolower($itemBairro['bairro'])) }}</option>
                            @endforeach
                          </optgroup>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-sm col-12 p-0">
                  <div class="search-input">
                    <input type="text" class="moneyMask" name="valor" id="valor" placeholder="Digite o valor">
                  </div>
              </div>
                <div class="col-sm col-12 p-0">
                    <div class="search-btn button">
                        <button type="submit" class="btn">BUSCAR</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- End Search Form -->
        <div class="botoes">
          <div class="container-codigo" >
            <form action="{{ route('site.imoveis.index')}}" onsubmit="return validarCodigo()" method="GET">
                <input type="text" name="codigo" id="codigo" class="botao2" placeholder="Insira o código">
                <button type="submit" id="inserirCodigo">
                    <i class="fa fa-search"></i>
                </button>
            </form>
          </div>
           <a class="botao1" href="{{ route('site.imoveis.index', ['valor' => '1,00']) }}">Busca avançada</a>
        </div>
       </div>
       <a href="#servicos" class="down"><i class="fas fa-chevron-down"></i></a>
      </section>
      <section id="imoveis">
          <div class="container">
            <div class="textotitle">
              Imóveis em <div class="cor">destaque</div>
            </div>
            <div class="meio">venda</div>
          </div>
          <div class="slider-container swiper">
            <div class="slider-content-venda">
              <div class="card-wrapper swiper-wrapper">
              @foreach ($vendas as $key => $imovel)
             <div class="swiper-slide">
                  @include('site.imoveis._card_imovel')
                  </div>
              @endforeach
              </div>
            </div>
            <div class="swiper-button-next-venda swiper-navBtn"> <i class="fal fa-chevron-right"></i></div>
            <div class="swiper-button-prev-venda swiper-navBtn"> <i class="fal fa-chevron-left"></i></div>
          </div>
          <div class="container">
            <a href="{{route('site.imoveis.index',['contrato'=>'venda'])}}"  class="botao_laranja" id="venda">ver mais imóveis</a>
            <div class="meio">locação</div>
          </div>
          <div class="slider-container swiper">
            <div class="slider-content-locacao">
              <div class="card-wrapper swiper-wrapper">
              @foreach ($locacoes as $key => $imovel)
             <div class="swiper-slide">
                  @include('site.imoveis._card_imovel')
                  </div>
              @endforeach
              </div>
            </div>
            <div class="swiper-button-next-locacao swiper-navBtn"> <i class="fal fa-chevron-right"></i></div>
            <div class="swiper-button-prev-locacao swiper-navBtn"> <i class="fal fa-chevron-left"></i></div>
          </div>
          <div class="container">
            <a href="{{route('site.imoveis.index',['contrato'=>'locacao'])}}" class="botao_laranja" id="locacao">ver mais imóveis</a>
          </div>
      </section>
      <section id="segundobanner">
        <div class="conteudo container">
          <div class="col-sm-5 col=12 conteudo-left">
            <div class="texto-conteudo">Simule um <div class="cor">financiamento</div></div>
            <div class="texto"><strong>Este simulador não representa o cálculo final dos bancos</strong>, mas serve como base para você ter uma prévia
              dos valores para compra do seu imóvel.
              <br><br>
              <strong>Caso preferir, entre em contato com nossos corretores para ser orientado.</strong>
            </div>
          </div>
          <div class="col-sm-6 col-12 conteudo-right pt-sm-0 pt-2">
          <form method="POST" action="{{ route('site.sendMailFinanciar')}}" accept-charset="UTF-8" class="form-imovel" id="formFinanciamento" enctype="multipart/form-data"><input name="_token" type="hidden">
            @csrf
            <div class="simular-form wow fadeInUp" data-wow-delay=".7s">
              <div class="row">
                  <div class="col-6">
                      <div class="simular-input">
                          <input type="text" name="valor" placeholder="Valor do imóvel">
                      </div>
                  </div>
                  <div class="col-6">
                    <div class="simular-input">
                        <input type="text" name="renda" placeholder="Renda familiar">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="simular-input">
                        <input type="text" name="entrada" placeholder="Entrada">
                    </div>
                  </div>
                  <div class="col-6">
                      <div class="simular-input">
                          <label for="location"><i class="fas fa-chevron-down"></i></label>
                          <select name="tipo">
                              <option value="">Tipo do imóvel</option>
                              @foreach($tipos as $k => $tipo)
                              <option value="{{$tipo}}"> {{$tipo}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-6">
                    <div class="simular-input">
                        <label for="valor"><i class="fas fa-chevron-down"></i></label>
                        <select name="estado">
                            <option value="">Estado do imóvel</option>
                            <option value="comprado">Comprado</option>
                            <option value="alugado">Alugado</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="simular-input">
                        <label for="valor"><i class="fas fa-chevron-down"></i></label>
                        <select name="possui">
                            <option value="">Possui imóvel</option>
                            <option value="sim">Sim</option>
                            <option value="não">Não</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-12">
                      <div class="simular-input">
                          <input type="text" name="email" placeholder="E-mail para contato">
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="simular-btn button">
                          <button id="btEnviar" type="submit" class="btn">Simular</button>
                      </div>
                  </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </section>
      <section id="servicos">
        <div class="container">
            <div class="serv-content">
              <div class="services">
                <div class="card_serv">
                  <div class="icon"><img src="{{asset('images/casa.svg')}}"/></div>
                  <div class="texto-laranja">Anuncie um imóvel</div>
                  <p>Quer vender ou alugar seu imóvel? <strong>Anuncie Conosco!</strong> É rápido, ágil e gratuito.</p>
                </div>
                <div class="botao_services"><a href="{{route('site.cadastro_imoveis')}}" target="blank">Anunciar</a></div>
              </div>
              <div class="services">
                <div class="card_serv">
                  <div class="icon"><img src="{{asset('images/casa.svg')}}"/></div>
                  <div class="texto-laranja">Encontre um imóvel</div>
                  <p>Confira os imóveis disponíveis e encontre a <strong>melhor opção</strong> para locação ou compra.</p>
                </div>
                <div class="botao_services"><a href="{{route('site.imoveis.index', ['valor' => $maiorValor])}}" target="blank">buscar</a></div>
              </div>
              <div class="services">
                <div class="card_serv">
                  <div class="icon"><img src="{{asset('images/casa.svg')}}"/></div>
                  <div class="texto-laranja">Fale Conosco</div>
                  <p>Não encontrou o imóvel que procura ou precisa de algum auxílio? <strong>Fale com a nossa equipe.</strong></p>
                </div>
                <div class="botao_services"><a href="{{route('site.contato')}}" target="blank">Fale conosco</a></div>
              </div>
            </div>
        </div>
      </section>
      <div class="midle">Encontre seu imóvel nos <div class="cor">bairros mais procurados</div>de São José dos Campos</div>
      <section id="locais" class="container-fluid">
        <div class="slider-container swiper">
          <div class="slider-content-locais">
            <div class="card-wrapper swiper-wrapper">
            @foreach ($imoveis_por_bairro['SAO JOSE DOS CAMPOS'] as $bairro => $numero_imoveis)
              <div class="locais swiper-slide">
                  <a href="{{route('site.imoveis.index',['bairro'=>$bairro])}}" class="card_locais">
                    <div class="couteudo-locais">
                      <div class="texto-laranja">{{$bairro}}</div>
                      <div class="icone col-12">
                        <div class="icones"></div>
                        <div class="text-icone">{{$numero_imoveis}} imóvel</div>
                      </div>
                    </div>
                  </a>
              </div>
            @endforeach
            </div>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next swiper-navBtn"> <i class="fal fa-chevron-right"></i></div>
          <div class="swiper-button-prev swiper-navBtn"> <i class="fal fa-chevron-left"></i></div>
        </div>
      </section>

@endsection

@section('pos-script')
<script>

  var botaoVenda = document.getElementById("venda");

  botaoVenda.addEventListener("click", function() {
    window.location.href = "{{route('site.imoveis.index')}}";
  });

  var botaoLocacao = document.getElementById("locacao");

  botaoLocacao.addEventListener("click", function() {
    window.location.href = "{{route('site.imoveis.index')}}";
  });

    $("body").on('click','#formFinanciamento #btEnviar',function(e) {
    e.preventDefault();
    $(".btn").attr('disabled',true);
    
    $('#cardOverlay').show();

    $('#loadingDiv').show();

    var url = $("#formFinanciamento").attr('action'); 
    $.ajax({
        type: "POST",
        url: url,
        data: $("#formFinanciamento").serialize(),
        success: function(data){
            console.log(data)
            $(".btn").attr('disabled',false);
            if(data.error != 0){
                swal("Atenção!", data.msg, "warning");
            } else {
                swal({
                    title: "Formulário enviado com sucesso!",
                    text: data.msg,
                    icon: "success",
                    dangerMode: false,
                });
            }
        },
        error:function(data){
            $(".btn").attr('disabled',false);
        },
        complete: function() {
            $('#cardOverlay').hide();
            $('#loadingDiv').hide();
        }
    });
});

function validarBusca() {
    var contrato = document.getElementById('compras').value;
    var tipo = document.getElementById('tipo').value;
    var bairro = document.getElementById('bairro').value;
    var valor = document.getElementById('valor').value;

    if (contrato === '' && tipo === '' && bairro === '' && valor === '') {
      alert('Preencha pelo menos um campo');
      return false;
    }

    return true;
  }

  function validarCodigo() {
    var codigo = document.getElementById('codigo').value;

    if (codigo ==='') {
      alert('Preencha pelo menos um campo');
      return false;
    }

    return true;
  }

</script>
@endsection