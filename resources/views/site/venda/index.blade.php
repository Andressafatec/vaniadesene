@extends('layouts.site')

@section('head')
<!--<script>
ini_set('memory_limit', '256M');
</script>-->
@endsection

@section('content')
<section id="imoveis">
        <div class="container">
          <div class="textotitle">
            Imóveis para <div class="cor">venda</div>
          </div>
        </div>
        <div class="container">
            <div class="row mt-5">
                <div class="col_categoria_1">
                    <div class="category-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <div class="search">
                                <form action="#">
                                    <input type="text" placeholder="Buscar por código">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
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
                                        <div class="tipo">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    Apartamento
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                                <label class="form-check-label" for="flexCheckDefault2">
                                                    Casa
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckDefault3">
                                                    Casa em condomínio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckDefault3">
                                                    Chácara
                                                </label>
                                            </div>
                                        </div>
                                        <div class="tipo">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckDefault3">
                                                    Cobertura
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckDefault3">
                                                    Loja
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckDefault3">
                                                    Ponto comercial
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckDefault3">
                                                    Terreno
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsefinalidade" role="button" aria-expanded="false" aria-controls="collapsefinalidade">
                                    Finalidade
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsecidade" role="button" aria-expanded="false" aria-controls="collapsecidade">
                                    Cidade
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsebairro" role="button" aria-expanded="false" aria-controls="collapsebairro">
                                    Bairro
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
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
                                            <input type="text" placeholder="">
                                        </div>
                                        <div class="valor">
                                            <label for="">Máximo</label>
                                            <input type="text" placeholder="">
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
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
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
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsevagas" role="button" aria-expanded="false" aria-controls="collapsevagas">
                                    Vagas
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsebanheiros" role="button" aria-expanded="false" aria-controls="collapsebanheiros">
                                    Banheiros
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsearea" role="button" aria-expanded="false" aria-controls="collapsearea">
                                    Área útil
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsearea">
                                <div class="col-12 px-0">
                                    <div class="d-flex col-12 px-0">
                                        <label for="" class="col text-left">0 m²</label>
                                        <label for="" class="col text-right">500 m²</label>
                                    </div>
                                    <input type="range" min="0" max="500" value="0" id="rangeInput">
                                    <div class="balao">
                                      <span id="valorRange">0</span> m²
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="botao_filtro">Aplicar filtro</a>
                    </div>
                </div>
                <div class="col_categoria_2">
                    <div class="category-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="title">0000 imóveis encontrados</h3>
                            </div>
                            <div class="col-6">
                                <div class="icone">
                                    <i class="far fa-sort-alt"></i>
                                    Mais relevante
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2">
                    @foreach ($imoveis as $key => $imovel)
                      @if ($key < 6)
                      <div class="locacao">
                          <a href="{{route('admin.locacao.detalhes',[$imovel->id])}}" class="text-decoration-none">
                            <div class="card">
                                @foreach ($imovel->fotos as $foto)
                                @if($foto->imovel_id == $imovel->id)
                                    @if($foto->ordem == 1)
                                    <img src="{{asset($foto->url)}}"/>
                                    @endif
                                @endif
                                @endforeach
                              <div class="caixa"> {{ $imovel->valor }}</div>
                              <div class="texto-laranja">{{ $imovel->tipo }}</div>
                              <div class="texto-preto">{{ $imovel->bairro }}</div>
                              <p>{{ $imovel->cidade }}</p>

                              <div class="d-flex flex-wrap col justify-content-between" style="max-height: 60px">
                              <!-- area -->
                              @php
                                  $area = false;
                                  $Dormitorio = false;
                                  $lavabo = false;
                                  $garagem = false;
                                @endphp
                              @foreach ($imovel->caracteristica as $caracteristicas)
                              @if($caracteristicas->imovel_id == $imovel->id)
                                @if($caracteristicas->pref == 'ARU')
                                <div class="icone col-3">
                                  <img src="{{asset('images/icone-02.svg')}}" alt="">
                                  <div class="leg">{{ $caracteristicas->valor }} m²</div>
                                </div>
                                @php
                                      $area = true;
                                      @endphp
                                @endif
                              @endif
                              @endforeach
                              @if (!isset($area) || !$area)
                                <div class="icone col-3">
                                  <img src="{{asset('images/icone-02.svg')}}" alt="">
                                  <div class="leg">- m²</div>
                                </div>
                              @endif
                              <!-- end area -->
                              <!-- dormitorio -->
                              @foreach ($imovel->caracteristica as $caracteristicas)
                              @if($caracteristicas->imovel_id == $imovel->id)
                                @if($caracteristicas->pref == 'DOR')
                                <div class="icone col-3">
                                  <img src="{{asset('images/icone-03.svg')}}" alt="">
                                  <div class="leg">{{ $caracteristicas->valor }}</div>
                                </div>
                                @php
                                      $dormitorio = true;
                                      @endphp
                                @endif
                              @endif
                              @endforeach
                              @if (!isset($dormitorio) || !$dormitorio)
                                <div class="icone col-3">
                                  <img src="{{asset('images/icone-03.svg')}}" alt="">
                                  <div class="leg">-</div>
                                </div>
                              @endif
                              <!-- end dormitorio -->
                              <!-- lavabo -->
                              @foreach ($imovel->caracteristica as $caracteristicas)
                              @if($caracteristicas->imovel_id == $imovel->id)
                                @if($caracteristicas->pref == 'FAC')
                                <div class="icone col-3">
                                  <img src="{{asset('images/icone-04.svg')}}" alt="">
                                  <div class="leg">{{ $caracteristicas->valor }}</div>
                                </div>
                                @php
                                  $lavabo = true;
                                @endphp
                                @endif
                              @endif
                              @endforeach
                              @if (!isset($lavabo) || !$lavabo)
                                <div class="icone col-3">
                                  <img src="{{asset('images/icone-04.svg')}}" alt="">
                                  <div class="leg">-</div>
                                </div>
                              @endif
                              <!-- end lavabo -->
                              <!-- garagem -->
                              @foreach ($imovel->caracteristica as $caracteristicas)
                              @if($caracteristicas->imovel_id == $imovel->id)
                                @if($caracteristicas->pref == 'GAR')
                                <div class="icone col-3">
                                  <img src="{{asset('images/icone-05.svg')}}" alt="">
                                  <div class="leg">1</div>
                                </div>
                                @php
                                  $garagem = true;
                                @endphp
                                @endif
                              @endif
                              @endforeach
                              @if (!isset($garagem) || !$garagem)
                                <div class="icone col-3">
                                  <img src="{{asset('images/icone-05.svg')}}" alt="">
                                  <div class="leg">-</div>
                                </div>
                              @endif
                              <!-- end garagem -->
                              </div>
                              <div class="p1">
                                <strong>CÓDIGO:</strong> {{ $imovel->referencia }}
                              </div>
                            </div>
                          </a>
                        </div>
                      @else
                        @break
                      @endif
                    @endforeach
                    <button id="load-more">Carregar Mais</button>
                    
                    </div>
                    <div class="col-12">
                        <!-- Pagination -->
                        <div class="pagination left">
                            <ul class="pagination-list">
                                <li><a href="javascript:void(0)"><i class="fas fa-chevron-left li_icone"></i></a></li>
                                <li><a href="javascript:void(0)">1</a></li>
                                <li class="active"><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">3</a></li>
                                <li><a href="javascript:void(0)">4</a></li>
                                <li><a href="javascript:void(0)"><i class="fas fa-chevron-right li_icone"></i></a></li>
                            </ul>
                        </div>
                        <!--/ End Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('pos-script')

<script>
    const rangeInput = document.getElementById('rangeInput');
    const valorRange = document.getElementById('valorRange');

    rangeInput.addEventListener('input', () => {
      const valor = rangeInput.value;
      const larguraBalao = 16;
      const rangeWidth = rangeInput.clientWidth - larguraBalao;
      const leftPosition = (valor / rangeInput.max) * rangeWidth;
      valorRange.innerText = valor;
    });
</script>

@endsection