@extends('layouts.site')

@section('content')


<!--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        @foreach ($fotos as $foto)
          <img src="{{asset($foto->url)}}" class="col-slides px-0">
        @endforeach
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true">
        <i class="fal fa-chevron-left"></i>
    </span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"> 
        <i class="fal fa-chevron-right"></i>
    </span>
  </a>
</div>-->

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @php 
      $cont = 0; 
    @endphp
    @foreach ($fotos as $foto)
      @if ($cont % 3 === 0)
        <div class="carousel-item @if($cont === 0) active @endif">
      @endif
          <img src="{{asset($foto->url)}}" class="col-slides px-0">
      @php 
        $cont++;
      @endphp
      @if ($cont % 3 === 0 || $cont === count($fotos))
        </div>
      @endif
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true">
      <i class="fal fa-chevron-left"></i>
    </span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"> 
      <i class="fal fa-chevron-right"></i>
    </span>
  </a>
</div>
    <div class="container">
        <div class="conteudo">
            <div class="conteudo-left">
                <div class="d-flex my-3">
                    <div class="botoes-laranja"><a href=""><i class="far fa-image"></i>{{ count($fotos)}} fotos</a></div>
                    <div class="botoes-laranja"><a href="#mapa"><i class="fal fa-map-marker-alt"></i>Mapas</a></div>
                    <div class="botoes-laranja"><a href=""><i class="fal fa-map-marker-alt"></i>Rua</a></div>
                </div>
                <hr>
                <div class="titulo-left">
                  {{preg_replace('/Ref:\d{2}/', '', $imoveis->titulo)}}
                </div>
                <div class="texto1-left">Endereço: 
                {{ ucfirst(mb_strtolower($imoveis->bairro)) }}, 
                {{ ucfirst(mb_strtolower($imoveis->cidade)) }}, {{$imoveis->uf}}</div>
                <div class="textolaranja-left">{{$imoveis->contrato}}</div>
                <div class="texto2-left">R${{number_format($imoveis->valor, 2, ',','.')}} 
                @if($imoveis->contrato == 'Locação')
                total/mês @endif</div>
                <div class="texto3-left"> 
                    <strong>Condomínio</strong> R$ 0.000
                    <strong>IPTU</strong> R$ 000
                </div>
                <div class="quadro1">
                    <div class="icones-quadro">
                        <div class="icone col-area">
                            <img src="{{asset('images/icone-02.svg')}}" alt="">Área
                        </div>
                        <div class="icone col-dormitorio">
                            <img src="{{asset('images/icone-03.svg')}}" alt="">Dormitórios
                        </div>
                        <div class="icone col-suites">
                            <img src="{{asset('images/icone-08.svg')}}" alt="">Suítes
                        </div>
                        <div class="icone col-banheiro">
                            <img src="{{asset('images/icone-04.svg')}}" alt="">Banheiros
                        </div>
                        <div class="icone col-suites">
                            <img src="{{asset('images/icone-05.svg')}}" alt="">Vagas
                        </div>
                    </div>
                    <div class="texto-quadro pt-2">
                      @php
                        $area = false;
                        $Dormitorio = false;
                        $lavabo = false;
                        $garagem = false;
                        $suite = false;
                      @endphp
                      @foreach ($caracteristicas as $caracteristica)
                        @if($caracteristica->pref == 'ARU')
                        <div class="col-ar">
                          {{$caracteristica->valor}} m²
                        </div>
                        @php
                          $area = true;
                        @endphp
                        @endif
                      @endforeach
                      @if (!isset($area) || !$area)
                        <div class="col-ar">
                          - m²
                        </div>
                      @endif
                      @foreach ($caracteristicas as $caracteristica)
                        @if($caracteristica->pref == 'DOR')
                        <div class="col-dorm">
                          {{$caracteristica->valor}}
                        </div>
                        @php
                          $Dormitorio = true;
                        @endphp
                        @endif
                      @endforeach
                      @if (!isset($Dormitorio) || !$Dormitorio)
                        <div class="col-dorm">
                          -
                        </div>
                      @endif
                      @foreach ($caracteristicas as $caracteristica)
                        @if($caracteristica->pref == 'DOP')
                        <div class="col-suit">
                          {{$caracteristica->valor}}
                        </div>
                        @php
                          $suite = true;
                        @endphp
                        @endif
                      @endforeach
                      @if (!isset($suite) || !$suite)
                        <div class="col-suit">
                          -
                        </div>
                      @endif
                      @foreach ($caracteristicas as $caracteristica)
                        @if($caracteristica->pref == 'FAC')
                          <div class="col-banh">
                            {{$caracteristica->valor}}
                          </div>
                          @php
                            $lavabo = true;
                          @endphp
                        @endif
                      @endforeach
                      @if (!isset($lavabo) || !$lavabo)
                        <div class="col-banh">
                          -
                        </div>
                      @endif
                      @foreach ($caracteristicas as $caracteristica)
                        @if($caracteristica->pref == 'GAR')
                          <div class="col-suit">
                            {{$caracteristica->valor}}
                          </div>
                          @php
                            $garagem = true;
                          @endphp
                        @endif
                      @endforeach
                      @if (!isset($garagem) || !$garagem)
                        <div class="col-suit">
                          -
                        </div>
                      @endif
                    </div>
                </div>
                <div class="titulo-azul">Sobre o imóvel</div>
                <div class="texto4-left">
                    <p>  {{$imoveis->detalhes}}
                    </p>
                    <a href="">Ver mais</a>
                </div>
                <div class="titulo-azul">Característica do imóvel</div>
                <div class="quadro2">
                  <div class="row">
                  @foreach ($caracteristicas as $caracteristica)
                    @if($caracteristica->pref == 'ARU')
                    @elseif($caracteristica->pref == 'DOR')
                    @elseif($caracteristica->pref == 'FAC')
                    @elseif($caracteristica->pref == 'GAR')
                    @else
                    <div class="col-sm-5 col-6">
                      <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> {{$caracteristica->label}}<br></div>
                    </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                <div class="titulo-azul">Instalações do Condomínio</div>
                <div class="quadro2">
                  Em desenvolvimento
                    <!--<div class="col-sm-5 col-6">
                        <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> Churrasqueira<br></div>
                        <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> Elevador<br></div>
                        <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> Gerador</div>
                    </div>
                    <div class="col-sm col-6">
                        <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> Portaria<br></div>
                        <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> Salão de Festas<br></div>
                        <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> Área Verde</div>
                    </div>-->
                </div>
                <div class="titulo-azul">Nas proximidades do imóvel</div>
                <div class="quadro2">
                  Em desenvolvimento
                    <!--<div class="col-sm-6 col-12 pb-3">
                        <div class="titulo-quadro"><i class="far fa-graduation-cap"></i>Educação</div>
                        <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> Nome do local <p>000m</p> </div>
                        <div class="pt-1 pb-3"><i class="fas fa-circle align-top pt-2 pr-1"></i> Nome do local <p>000m</p> </div>
                        <a href="">Ver mais</a>
                    </div>
                    <div class="col-sm-6 col-12 pb-3">
                        <div class="titulo-quadro"><i class="far fa-utensils"></i>Gastronomia</div>
                        <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> Nome do local <p>000m</p> </div>
                        <div class="pt-1 pb-3"><i class="fas fa-circle align-top pt-2 pr-1"></i> Nome do local <p>000m</p> </div>
                        <a href="">Ver mais</a>
                    </div>
                    <div class="col-sm-6 col-12 pb-3">
                        <div class="titulo-quadro"><i class="far fa-monitor-heart-rate"></i>Saúde</div>
                        <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> Nome do local <p>000m</p> </div>
                        <div class="pt-1 pb-3"><i class="fas fa-circle align-top pt-2 pr-1"></i> Nome do local <p>000m</p> </div>
                        <a href="">Ver mais</a>
                    </div>-->
                </div>
            </div>
            <div class="conteudo-right">
                <div class="card-detalhes">
                    <div class="titulo_card">Fale com o Corretor</div>
                    <p>Preencha os campos abaixo com seus dados a nosso corretor entrará em contato.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="detalhes-input">
                                <label for="">Nome:</label>
                                <input type="text" name="keyword" id="keyword" placeholder="Digite seu nome">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="detalhes-input">
                                <label for="">E-mail:</label>
                                <input type="text" name="keyword" id="keyword" placeholder="Digite seu e-mail">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="detalhes-input">
                                <label for="">Telefone:</label>
                                <input type="text" name="keyword" id="keyword" placeholder="(XX) XXXXX-XXXX">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="bot_laranja">enviar dados</button>
                        </div>
                    </div>
                    @if ($corretor)
                    <div class="col-12 d-flex mt-3">
                        <div class="col-4">
                          @if ($corretor->foto === NULL)
                            <img src="https://via.placeholder.com/200x200" alt="#" class="mt-3">
                          @else
                            <img src="{{asset($corretor->foto)}}" alt="#" class="mt-3">
                          @endif
                        </div>
                        <div class="col-8">
                            <div class="texto-card">
                                <div class="color">Corretor</div>
                                <strong>{{$corretor->nome}}</strong><br>
                                {{$corretor->creci}}
                                <div class="d-flex">
                                    <button class="bot_azul mr-2">veja mais</button>
                                    <button class="bot_azul">contato</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <p class="mt-4 text-center">Esse Imóvel não possui um corretor específico!</p>
                    @endif
                </div>
                <div class="col-12 mt-3">
                    <div class="info">
                        <div class="laranja">Este é um ambiente seguro!</div>
                        Trabalhamos constantemente para proteger sua segurança e privacidade 
                        <a href="">Saiba mais</a>
                        <div class="azul">Código do imóvel: {{ $imoveis->referencia }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.259478853855!2d-45.88746962470425!3d-23.233642949634184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc4abf5f89c343%3A0x4b5f5ec5da2d27f4!2sAv.%20Andr%C3%B4meda%2C%202320%20-%20Jardim%20Sat%C3%A9lite%2C%20S%C3%A3o%20Jos%C3%A9%20dos%20Campos%20-%20SP%2C%2012230-001!5e0!3m2!1spt-BR!2sbr!4v1689966931157!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mt-5" id="#mapa"></iframe>    
    </section>
        
        <!--<div class="container">
        <div class="titulo-laranja">Imóveis similares a este:</div>
        <section id="imoveis">
            <div class="row mt-3">
                <div class="detalhes">
                    <a href=" " class="text-decoration-none">
                      <div class="card">
                        <img src="{{asset('images/casa.jpg')}}"/>
                        <div class="texto-laranja">Casa</div>
                        <div class="texto-preto">Nome do Bairro</div>
                        <p>Cidade</p>
                        <div class="d-flex flex-wrap col" style="max-height: 60px">
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-02.svg')}}" alt="">
                            <div class="leg d-flex">50 m²</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-03.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-04.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-05.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                        </div>
                        <div class="p1">
                          <strong>CÓDIGO:</strong> AB1234
                        </div>
                      </div>
                    </a>
                </div>
                <div class="detalhes">
                    <a href=" " class="text-decoration-none">
                      <div class="card">
                        <img src="{{asset('images/casa.jpg')}}"/>
                        <div class="texto-laranja">Casa</div>
                        <div class="texto-preto">Nome do Bairro</div>
                        <p>Cidade</p>
                        <div class="d-flex flex-wrap col" style="max-height: 60px">
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-02.svg')}}" alt="">
                            <div class="leg d-flex">50 m²</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-03.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-04.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-05.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                        </div>
                        <div class="p1">
                          <strong>CÓDIGO:</strong> AB1234
                        </div>
                      </div>
                    </a>
                </div>
                <div class="detalhes">
                    <a href=" " class="text-decoration-none">
                      <div class="card">
                        <img src="{{asset('images/casa.jpg')}}"/>
                        <div class="texto-laranja">Casa</div>
                        <div class="texto-preto">Nome do Bairro</div>
                        <p>Cidade</p>
                        <div class="d-flex flex-wrap col" style="max-height: 60px">
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-02.svg')}}" alt="">
                            <div class="leg d-flex">50 m²</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-03.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-04.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-05.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                        </div>
                        <div class="p1">
                          <strong>CÓDIGO:</strong> AB1234
                        </div>
                      </div>
                    </a>
                </div>
                <div class="detalhes">
                    <a href=" " class="text-decoration-none">
                      <div class="card">
                        <img src="{{asset('images/casa.jpg')}}"/>
                        <div class="texto-laranja">Casa</div>
                        <div class="texto-preto">Nome do Bairro</div>
                        <p>Cidade</p>
                        <div class="d-flex flex-wrap col" style="max-height: 60px">
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-02.svg')}}" alt="">
                            <div class="leg d-flex">50 m²</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-03.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-04.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                          <div class="icone col-3">
                            <img src="{{asset('images/icone-05.svg')}}" alt="">
                            <div class="leg">1</div>
                          </div>
                        </div>
                        <div class="p1">
                          <strong>CÓDIGO:</strong> AB1234
                        </div>
                      </div>
                    </a>
                </div>
              </div>
              <button class="botao_laranja">ver mais imóveis</button>
        </section>
    </div>-->
@endsection

@section('pos-script')

<script>
</script>

@endsection