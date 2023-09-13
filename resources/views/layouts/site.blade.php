<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('vendor/magnific-popup/dist/magnific-popup.css')}}">
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
  <title>VANIA DE SENE - @yield('title')</title>
  <link rel="apple-touch-icon" sizes="57x57" href="{{asset('min/img/favicon/apple-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{asset('min/img/favicon/apple-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('min/img/favicon/apple-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('min/img/favicon/apple-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('min/img/favicon/apple-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('min/img/favicon/apple-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{asset('min/img/favicon/apple-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('min/img/favicon/apple-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('min/img/favicon/apple-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('min/fivico')}}n/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('min/img/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('min/img/favicon/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('min/fiviconfavicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('min/img/favicon/manifest.json')}}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{asset('min/img/favicon/ms-icon-144x144.png')}}">
  <meta name="theme-color" content="#ffffff">


  @vite( 'resources/sass/app.scss')
  @yield('head')

  <style>
  
</style>

</head>
<body>
  
  <!-- /End Preloader -->
  <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
<div id="tudo">
  
   <header>
     <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <div class="adm">
            Administração
          </div>
        </div>
        <div class="col-6">
          <div class="d-flex float-end" >
            <div class="bandeira-brasil"><img src="{{asset('images/brasil.png')}}" alt=""></div>
            <div class="bandeira-eua"><img src="{{asset('images/eua.png')}}" alt=""></div>
          </div>
        </div>
      </div>
      <div class="col d-sm-none">
           <a href="{{route('site.index')}}" class="logo"><img src="{{asset('images/logo.svg')}}" ></a>
         </div>
       <div class="row align-items-end">
        <div class="col">
          <div class="texto-azul">
            <strong>Unidade I Jardim Satélite <br></strong>
            <i class="fab fa-whatsapp pr-1"></i>(12) 99658-6008 <br>
            (12) 3935-8000 <br>
            <p>Creci 19.068-J</p>
          </div>
        </div>
        <a href="{{route('site.index')}}" class="logo d-sm-block d-none"><img src="{{asset('images/logo.svg')}}" ></a>
         <div class="col">
          <div class="texto-azul text-end">
            <strong>Unidade II Jardim Esplanada <br></strong>
            <i class="fab fa-whatsapp pr-1"></i>(12) 99658-8525 <br>
            (12) 3949-6000 <br>
            <p>Creci 32.366-J</p>
          </div>
         </div>
       </div>
     </div>
   </header>
   <div id="menu">
    <nav class="navbar">
          <div class="menu-btn">
            <i class="fas fa-bars" style="float: right;"></i>
          </div>

            {!!$menu_principal!!}

           
    </nav>
   </div>
   <main>
    @yield('content')
   </main>
</div>
   <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-footer-1">
          <div class="logo-branco"></div>
          <div class="email d-sm-block d-none">E-mail: <div class="cor">contato@vaneadesene.com.br</div></div>
        </div>
        <div class="col-footer-2">
          <strong>Navegação <br></strong>
          <a href="#" target="blank">Administração<br></a>
          <a href="#" target="blank">Quem somos<br></a>
          <a href="#" target="blank">Venda<br></a>
          <a href="#" target="blank">Cadastre seu Imóvel<br></a>
          <a href="#" target="blank">Locação<br></a>
          <a href="#" target="blank">Contato<br></a>
          <a href="#" target="blank">Trabalhe Conosco</a>
        </div>
        <div class="col-footer-3">
          <strong>Links Úteis<br></strong>
          <a href="#" target="blank">Prefeitura - 2° via IPTU<br></a>
          <a href="#" target="blank">Comgás<br></a>
          <a href="#" target="blank">Sabesp - Débitos<br></a>
          <a href="#" target="blank">Sabesp - 2° via de conta<br></a>
          <a href="#" target="blank">Bandeirante Energia - Débitos<br></a>
          <a href="#" target="blank">Bandeirante Energia - 2° via de conta</a>
        </div>
        <div class="col-footer-4">
          <div class="texto-laranja">Unidade I</div>
          <p>Av. Andrôneda, 2320
            Jardim Satélite <br>
            São José dos Campos, SP
          </p>
          <div class="texto-negrito">(12) 3935-8000</div>
          <p>Creci 19.068-J</p>
        </div>
        <div class="col-footer-5">
          <div class="texto-laranja">Unidade II</div>
          <p>Rua Maria Demetria Kfuri, 647
            Jardim Esplanada <br>
            São José dos Campos, SP
          </p>
          <div class="texto-negrito">(12) 3949-6000</div>
          <p>Creci 35.366-J</p>
        </div>
        <div class="col-footer-6">
          Siga nossas redes sociais e acompanhe as ofertas
          <div class="redes">
            <div class="quadro"><i class="fab fa-instagram"></i></div>
            <div class="quadro"><i class="fab fa-facebook-f px-1"></i></div>
          </div>
        </div>
        <div class="email_2 d-sm-none">E-mail: contato@vaneadesene.com.br</div>
        <div class="copyright">Copyright 2023 <i class="far fa-copyright"></i> Vania de Sene <i class="far fa-grip-lines-vertical"></i> Negócios Imobiliários</div>
      </div>
    </div>
   </footer>

   @include('layouts._modalSearch')


   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('vendor/swiper-bundle.min.js')}}"></script>


  @yield('pos-script')

  <script>

var swiper = new Swiper(".slider-content-locacao", {
  slidesPerView: 3,
  spaceBetween: 15,
  loop: "true",
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: "true",
    dynamicBullets: "true",
  },
  navigation: {
    nextEl: ".swiper-button-next-locacao",
    prevEl: ".swiper-button-prev-locacao",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 3,
    },
  },
});

    $('.preloader').fadeOut('fast');

    $('.moneyMask').mask("#.##0,00", {reverse: true});

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.phoneMask').mask(SPMaskBehavior, spOptions);
    $('.cepMask').mask('00000-000');
    $('.cpfMask').mask('000.000.000-00');
    $("#formSerachModal select[name='cidade']").change(function(){
      var cidade = $(this).val();
      $("select[name='bairro']").val('')
      $("select[name='bairro'] option").hide();
      $("select[name='bairro'] option[data-cidade='"+cidade+"']").show();
    })
  </script>
</body>
</html>