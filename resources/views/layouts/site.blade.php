<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="vendor/magnific-popup/dist/magnific-popup.css">
  <title>VANIA DE SENE - @yield('title')</title>

  @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

  @yield('head')
</head>
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
          <div class="d-flex pt-3" style="float:right">
            <div class="bandeira-brasil"><img src="{{asset('images/brasil.png')}}" alt=""></div>
            <div class="bandeira-eua"><img src="{{asset('images/eua.png')}}" alt=""></div>
          </div>
        </div>
      </div>
      <div class="col d-sm-none">
           <a href="" class="logo"><img src="{{asset('images/logo.svg')}}" alt="HAUSI"></a>
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
        <a href="" class="logo d-sm-block d-none"><img src="{{asset('images/logo.svg')}}" alt="HAUSI"></a>
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
    <div class="scroll-up-btn">
      <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
          <div class="menu-btn">
            <i class="fas fa-bars" style="float: right;"></i>
          </div>

            {!!$menu_principal!!}

            <!--<li class="col"><a href="quem_somos" class="border-right">Quem somos</a></li>
            <li class="col"><a href="{{route('admin.contato')}}">Contato</a></li>
            <li class="col active"><a href="">Cadastre seu imóvel</a></li>
            <li class="col"><a href="{{route('admin.locacao.index')}}" class="border-right">Locação</a></li>
            <li class="col"><a href="{{route('admin.venda.index')}}">Venda</a></li>
            <div class="col iconSearch d-sm-block d-none"><i class="fa fa-search"></i></div>-->
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

   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modalBusca">
            <div class="modal-header" style="border-bottom:none">
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <input type="text" placeholder="Pesquisar">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    

  @yield('pos-script')
</body>
</html>