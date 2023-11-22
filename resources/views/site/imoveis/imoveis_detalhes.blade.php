@extends('layouts.site')

@section('head')
<link rel="stylesheet" href="{{asset('vendor/magnific-popup/dist/magnific-popup.css')}}">

<style>
  .carousel-control-prev{
    width: 32px !important;
  }
</style>
@endsection
@section('content')

<div id="carrocelFotosImoveis" class="carousel slide d-sm-block d-none" data-ride="carousel">
  <div class="swiper-container">
  <div class="swiper-wrapper">
  @foreach ($imovel->videos as $k => $video)

    <div class="swiper-slide @if($k === 0) active @endif">
        

          <iframe width="100%" height="295" src="{{$video->embedVideo()}}"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

   
    </div>
   
    @endforeach
    @foreach ($imovel->fotos as $k => $foto)
    <div class="swiper-slide @if($k === 0) active @endif">
      <a href="{{$foto->url}}" class="popup-link">
          <img src="{{$foto->url}}" >
      </a>
    </div>
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
</div>

<div id="carrocelFotosImoveisMobile" class="carousel slide d-sm-none" data-ride="carousel">
  <div class="swiper-container-mobile">
  <div class="swiper-wrapper">
  @foreach ($imovel->videos as $k => $video)

    <div class="swiper-slide @if($k === 0) active @endif">
        <a href="{{$video->url}}" class="popup-link">
        <iframe width="100%" height="295" src="{{$video->embedVideo()}}"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </a>
    </div>
   
    @endforeach
    @foreach ($imovel->fotos as $k => $foto)
    <div class="swiper-slide @if($k === 0) active @endif">
      <a href="{{$foto->url}}" class="popup-link">
          <img src="{{$foto->url}}" >
      </a>
    </div>
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
</div>
    <div class="container">
        <div class="conteudo">
            <div class="conteudo-left">
                <div class="d-flex my-3">
                    <div class="botoes-laranja"><a href=""><i class="far fa-image"></i>{{ $imovel->fotos->count()}} fotos</a></div>
                    <div class="botoes-laranja"><a href="#mapa"><i class="fal fa-map-marker-alt"></i>Mapas</a></div>
                    <div class="botoes-laranja"><a href=""><i class="fal fa-map-marker-alt"></i>Rua</a></div>
                </div>
                <hr>
                <div class="titulo-left">
                  {{preg_replace('/Ref:\d{2}/', '', $imovel->titulo)}}
                </div>
                <div class="texto1-left">Endereço: 
                {{ ucfirst(mb_strtolower($imovel->bairro)) }}, 
                {{ ucfirst(mb_strtolower($imovel->cidade)) }}, {{$imovel->uf}}</div>
                <div class="textolaranja-left">{{$imovel->contrato}}</div>
                <div class="texto2-left">R${{number_format($imovel->valor, 2, ',','.')}} 
                @if($imovel->contrato == 'Locação')
                total/mês @endif</div>
                <div class="texto3-left"> 
                    <strong>Condomínio</strong> R${{number_format($imovel->valorcondominio, 2, ',','.')}}
                    <strong>IPTU</strong> R${{number_format($imovel->valoriptu, 2, ',','.')}} 
                </div>
                <div class="quadro1">
                    <div class="icones-quadro">
                    <div class="icone col-area d-sm-block d-none">
                            <img src="{{asset('images/icone-02.svg')}}" alt="">Área
                        </div>
                        <div class="icone col-dormitorio d-sm-block d-none">
                            <img src="{{asset('images/icone-03.svg')}}" alt="">Dormitórios
                        </div>
                        <div class="icone col-suites d-sm-block d-none">
                            <img src="{{asset('images/icone-04.svg')}}" alt="">Suítes
                        </div>
                        <div class="icone col-banheiro d-sm-block d-none">
                            <img src="{{asset('images/chuveiro-08.svg')}}" alt="" style="width:35px; padding-bottom:15px; padding-right:5px">Banheiros
                        </div>
                        <div class="icone col-suites d-sm-block d-none">
                            <img src="{{asset('images/icone-05.svg')}}" alt="">Vagas
                        </div>
                        <!-- Mobile -->
                        <div class="icone col-area d-sm-none">
                            <img src="{{asset('images/icone-02.svg')}}" alt="">
                        </div>
                        <div class="icone col-dormitorio d-sm-none">
                            <img src="{{asset('images/icone-03.svg')}}" alt="">
                        </div>
                        <div class="icone col-suites d-sm-none">
                            <img src="{{asset('images/icone-04.svg')}}" alt="">
                        </div>
                        <div class="icone col-banheiro d-sm-none">
                            <img src="{{asset('images/chuveiro-08.svg')}}" alt="" style="width:30px; padding-bottom:10px;">
                        </div>
                        <div class="icone col-suites d-sm-none">
                            <img src="{{asset('images/icone-05.svg')}}" alt="">
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
                      @foreach ($imovel->caracteristicas as $caracteristica)
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
                      @foreach ($imovel->caracteristicas as $caracteristica)
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
                      @foreach ($imovel->caracteristicas as $caracteristica)
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
                      @foreach ($imovel->caracteristicas as $caracteristica)
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
                      @foreach ($imovel->caracteristicas as $caracteristica)
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

                <div class="info texto4-left">
                    <p class="short-description" id="short-description">{{ substr($imovel->detalhes, 0, 120) }}</p>
                    <p class="full-description" id="full-description" style="display:none;">{{ $imovel->detalhes }}</p>
                    <button class="toggle-description" id="toggle-description">Ver mais</button>
                </div>
                <div class="titulo-azul">Característica do imóvel</div>
                <div class="quadro2">
                  <div class="row">
                  @foreach ($imovel->caracteristicas as $caracteristica)
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
                @if(count($imovel->edificio) >= 1)
                <div class="titulo-azul">Instalações do Condomínio</div>
                <div class="quadro2">
                  @foreach ($imovel->edificio as $caracteristica)
                    <div class="col-sm-5 col-6">
                      <div class="pt-1"><i class="fas fa-circle align-top pt-2 pr-1"></i> {{Helper::corrigiAcento($caracteristica->pref)}}({{$caracteristica->valor}})<br></div>
                    </div>
                  @endforeach
                </div>
                @endif
                <!--<div class="titulo-azul">Nas proximidades do imóvel</div>
                <div class="quadro2">
                  Em desenvolvimento-->
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
                    </div>
                </div>-->
            </div>
            <div class="conteudo-right">
                <div class="card-detalhes">
                    <div class="titulo_card">Fale com o Corretor</div>
                    <p>Preencha os campos abaixo com seus dados a nosso corretor entrará em contato.</p>
                    <div class="row">
                    <form action="{{ route('site.sendMail')}}" method="POST" class="row" id="formcorretor">
                    @csrf
                      <input type="hidden" name="imovel_id" id="" value="{{$imovel->referencia}}">
                      <input type="hidden" name="imovel_titulo" id="" value="{{$imovel->titulo}}">
                        <div class="col-12">
                            <div class="detalhes-input">
                                <label for="">Nome:</label>
                                <input type="text" name="name" placeholder="Digite seu nome">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="detalhes-input">
                                <label for="">E-mail:</label>
                                <input type="email" name="email" placeholder="Digite seu e-mail">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="detalhes-input">
                                <label for="">Telefone:</label>
                                <input type="tel" name="tel" placeholder="(XX) XXXXX-XXXX">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" id="btEnviar" class="bot_laranja">enviar dados</button>
                        </div>
                        </form>
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
                        <div class="azul">Código do imóvel: {{ $imovel->referencia_original }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="mapa">
        <iframe width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mt-5" id="#mapa" src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q={{htmlentities(urlencode($endereco))}}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </section>
        
     
@endsection

@section('pos-script')
<script src="{{asset('vendor/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 1,
        autoplay:true,
        navigation: {
            nextEl: '.carousel-control-next', // Use as classes das setas de controle como seletor
            prevEl: '.carousel-control-prev',
        },
    });

    // Inicialize o Magnific Popup
    $('.popup-link').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    var swiper = new Swiper('.swiper-container-mobile', {
        slidesPerView: 1,
        spaceBetween: 1,
        autoplay:true,
        navigation: {
            nextEl: '.carousel-control-next', // Use as classes das setas de controle como seletor
            prevEl: '.carousel-control-prev',
        },
    });
});


$("body").on('click','#formcorretor #btEnviar',function(e) {
    e.preventDefault();
      $(".bot_laranja").attr('disabled',true)
        e.preventDefault();
        var url = $("#formcorretor").attr('action'); 
        $.ajax({
               type: "POST",
               url: url,
               data: $("#formcorretor").serialize(), // serializes the form's elements.
               success: function(data){
                   console.log(data)
                   $(".bot_laranja").attr('disabled',false);
                    if(data.error != 0){
                      swal("Atention!", data.msg, "warning");
                   }else{
                   swal({
                      title: "Formulário enviado com sucesso!",
                      text: data.msg,
                      icon: "success",
                      dangerMode: false,
                    })
                    }
               },error:function(data){
                $(".bot_laranja").attr('disabled',false);
               }
             });
        e.preventDefault();
    });

    document.addEventListener('DOMContentLoaded', function() {
    var toggleButton = document.getElementById('toggle-description');
    var shortDescription = document.getElementById('short-description');
    var fullDescription = document.getElementById('full-description');

    toggleButton.addEventListener('click', function() {
        if (shortDescription.style.display === 'none' || shortDescription.style.display === '') {
            shortDescription.style.display = 'block';
            fullDescription.style.display = 'none';
            this.textContent = 'Ver mais';
        } else {
            shortDescription.style.display = 'none';
            fullDescription.style.display = 'block';
            this.textContent = 'Ver menos';
        }
    });
});

</script>

@endsection