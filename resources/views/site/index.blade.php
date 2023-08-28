@extends('layouts.site')

@section('content')
<section id="banner">
       <div class="fundo">
        <div class="texto">
          Encontre <div class="cor">seu imóvel</div>
        </div>
          <!-- Start Search Form -->
          <div class="search-form wow fadeInUp" data-wow-delay=".7s">
            <div class="row">
                <div class="col-sm col-12 p-0">
                    <div class="search-input">
                      <label for="compras"><i class="fas fa-chevron-down"></i></label>
                      <select class="compras">
                          <option value="none" selected disabled>Compras</option>
                      </select>
                    </div>
                </div>
                <div class="col-sm col-12 p-0">
                    <div class="search-input">
                        <label for="imovel"><i class="fas fa-chevron-down"></i></label>
                        <select name="imovel" id="imovel">
                            <option value="none" selected disabled>Tipo do Imóvel</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm col-12 p-0">
                    <div class="search-input">
                        <label for="location"><i class="fas fa-chevron-down"></i></label>
                        <select name="location" id="location">
                            <option value="none" selected disabled>Localização</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm col-12 p-0">
                  <div class="search-input">
                      <label for="valor"><i class="fas fa-chevron-down"></i></label>
                      <select name="valor" id="valor">
                          <option value="none" selected disabled>Valor Máximo</option>
                      </select>
                  </div>
              </div>
                <div class="col-sm col-12 p-0">
                    <div class="search-btn button">
                        <button class="btn">BUSCAR</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Form -->
        <div class="botoes">
            <button class="botao1">Código</button>
            <button class="botao1">Busca avançada</button>
        </div>
        
       </div>
       <a href="#personalize" class="down"><i class="fas fa-chevron-down"></i></a>
      </section>
      <section id="imoveis">
          <div class="container">
            <div class="textotitle">
              Imóveis em <div class="cor">destaque</div>
            </div>
            <div class="meio">venda</div>
          </div>
          <div class="slider-container swiper">
            <div class="slider-content-locacao">
              <div class="card-wrapper swiper-wrapper">
              @foreach ($venda as $key => $vendas)
                      <div class="card swiper-slide">
                          <a href="{{route('admin.locacao.detalhes',[$vendas->id])}}" class="text-decoration-none">
                            <div class="card">
                            @foreach ($vendas->fotos as $foto)
                              @if($foto->imovel_id == $vendas->id)
                                @if($foto->ordem == 1)
                                  <img src="{{asset($foto->url)}}"/>
                                @endif
                              @endif
                            @endforeach
                              <div class="caixa"> {{ $vendas->valor }}</div>
                              <div class="texto-laranja">{{ $vendas->tipo }}</div>
                              <div class="texto-preto">{{ $vendas->bairro }}</div>
                              <p>{{ $vendas->cidade }}</p>

                              <div class="d-flex flex-wrap col justify-content-between" style="max-height: 60px">
                              <!-- area -->
                              @php
                                  $area = false;
                                  $Dormitorio = false;
                                  $lavabo = false;
                                  $garagem = false;
                                @endphp
                              @foreach ($vendas->caracteristica as $caracteristicas)
                              @if($caracteristicas->imovel_id == $vendas->id)
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
                              @foreach ($vendas->caracteristica as $caracteristicas)
                              @if($caracteristicas->imovel_id == $vendas->id)
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
                              @foreach ($vendas->caracteristica as $caracteristicas)
                              @if($caracteristicas->imovel_id == $vendas->id)
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
                              @foreach ($vendas->caracteristica as $caracteristicas)
                              @if($caracteristicas->imovel_id == $vendas->id)
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
                                <strong>CÓDIGO:</strong> {{ $vendas->referencia }}
                              </div>
                            </div>
                          </a>
                        </div>
                    @endforeach
              </div>
            </div>
            <div class="swiper-button-next-locacao swiper-navBtn"> <i class="fal fa-chevron-right"></i></div>
            <div class="swiper-button-prev-locacao swiper-navBtn"> <i class="fal fa-chevron-left"></i></div>
          </div>
          <div class="container">
            <button class="botao_laranja">ver mais imóveis</button>
            <div class="meio">locação</div>
          </div>
          <div class="slider-container swiper">
            <div class="slider-content-venda">
              <div class="card-wrapper swiper-wrapper">
                @foreach ($imoveis as $key => $imovel)
                      <div class="card swiper-slide">
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
                    @endforeach
              </div>
            </div>
            <div class="swiper-button-next-venda swiper-navBtn"> <i class="fal fa-chevron-right"></i></div>
            <div class="swiper-button-prev-venda swiper-navBtn"> <i class="fal fa-chevron-left"></i></div>
          </div>
          <div class="container">
            <button class="botao_laranja" id="locacao">ver mais imóveis</button>
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
            <div class="simular-form wow fadeInUp" data-wow-delay=".7s">
              <div class="row">
                  <div class="col-6">
                      <div class="simular-input">
                          <input type="text" name="keyword" id="keyword" placeholder="Valor do imóvel">
                      </div>
                  </div>
                  <div class="col-6">
                    <div class="simular-input">
                        <input type="text" name="keyword" id="keyword" placeholder="Renda familiar">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="simular-input">
                        <input type="text" name="keyword" id="keyword" placeholder="Entrada">
                    </div>
                  </div>
                  <div class="col-6">
                      <div class="simular-input">
                          <label for="location"><i class="fas fa-chevron-down"></i></label>
                          <select name="location" id="location">
                              <option value="none" selected disabled>Tipo do imóvel</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-6">
                    <div class="simular-input">
                        <label for="valor"><i class="fas fa-chevron-down"></i></label>
                        <select name="valor" id="valor">
                            <option value="none" selected disabled>Estado do imóvel</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="simular-input">
                        <label for="valor"><i class="fas fa-chevron-down"></i></label>
                        <select name="valor" id="valor">
                            <option value="none" selected disabled>Possui imóvel</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-12">
                      <div class="simular-btn button">
                          <button class="btn">Simular</button>
                      </div>
                  </div>
              </div>
            </div>
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
                <div class="botao_services"><a href="#" target="blank">Anunciar</a></div>
              </div>
              <div class="services">
                <div class="card_serv">
                  <div class="icon"><img src="{{asset('images/casa.svg')}}"/></div>
                  <div class="texto-laranja">Encontre um imóvel</div>
                  <p>Confira os imóveis disponíveis e encontre a <strong>melhor opção</strong> para locação ou compra.</p>
                </div>
                <div class="botao_services"><a href="#" target="blank">buscar</a></div>
              </div>
              <div class="services">
                <div class="card_serv">
                  <div class="icon"><img src="{{asset('images/casa.svg')}}"/></div>
                  <div class="texto-laranja">Fale Conosco</div>
                  <p>Não encontrou o imóvel que procura ou precisa de algum auxílio? <strong>Fale com a nossa equipe.</strong></p>
                </div>
                <div class="botao_services"><a href="#" target="blank">Fale conosco</a></div>
              </div>
            </div>
        </div>
      </section>
      <div class="midle">Encontre seu imóvel nos <div class="cor">bairros mais procurados</div>de São José dos Campos</div>
      <section id="locais" class="container-fluid">
        <div class="slider-container swiper">
          <div class="slider-content-locais" style="margin-bottom: 20px;">
            <div class="card-wrapper swiper-wrapper">
              <div class="locais swiper-slide">
                  <div class="card_locais">
                    <div class="couteudo-locais">
                      <div class="texto-laranja">Jardim Aquarius</div>
                      <div class="icone col-12">
                        <div class="icones"></div>
                        <div class="text-icone">00 imóvel</div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Jardim Satélite</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Centro</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Vila Ema</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="locais swiper-slide">
                  <div class="card_locais">
                    <div class="couteudo-locais">
                      <div class="texto-laranja">Jardim Aquarius</div>
                      <div class="icone col-12">
                        <div class="icones"></div>
                        <div class="text-icone">00 imóvel</div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Jardim Satélite</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Centro</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Vila Ema</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Jardim Aquarius</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Jardim Satélite</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Centro</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="locais swiper-slide">
                <div class="card_locais">
                  <div class="couteudo-locais">
                    <div class="texto-laranja">Vila Ema</div>
                    <div class="icone col-12">
                      <div class="icones"></div>
                      <div class="text-icone">00 imóvel</div>
                    </div>
                  </div>
                </div>
              </div>
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
  document.getElementById("locacao").addEventListener("click", function() {
      window.location.href = "{{route('admin.locacao.index')}}";
  });
</script>
@endsection