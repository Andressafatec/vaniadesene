@extends('layouts.site')
@section('head')
<style>
    .tab-content {
  display: none;
}

.tab-button {
  background-color:transparent;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  width: 48%;
  color: #eb9839;
  margin: 1%;
}

.tab-button.active{
    border-bottom: 2px solid #eb9839;
}

.tab-button:hover {
  background-color: #ddd;
}

</style>
@endsection
@section('content')
<div class="container py-5">
    <div id="">
        <div class="justify-content-center">
            <div class="col text-center">
                <h2> Contato</h2>
                <div class="cards-contato">
                    <div class="card-contato">
                        <a href="https://web.whatsapp.com/send?phone=99658-6008" target="_blank">
                            <div class="icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <h4>Whastapp</h4>
                            <p>Entre em contato pelo<Br>
                                WhatsApp (12) 99658-6008<br>
                                         (12) 99658-8525</p>
                            <div class="btn btn-dark">enviar MENSAGEM</div>
                        </a>
                    </div>
                    <div class="card-contato">
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contato@vaneadesene.com.br" target="_blank">
                            <div class="icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <h4>E-mail</h4>
                            <p>Entre em contato pelo e-mail<Br>
                                contato@vaneadesene.com.br</p>
                            <div class="btn btn-dark">enviar e-mail</div>
                        </a>
                    </div>
                    <div class="card-contato">
                        <a href="#unidade">
                            <div class="icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <h4>Unidades</h4>
                            <p>Conheça as nossas unidades.</p>
                            <div class="btn btn-dark">NOSSAS UNIDADES</div>
                        </a>
                    </div>
                    <div class="card-contato">
                        <a href="#duvidas">
                            <div class="icon">
                                <i class="far fa-comments"></i>
                            </div>
                            <h4>Dúvidas</h4>
                            <p>Acesse as principais dúvidas<Br>
                                frequentes.</p>
                            <div class="btn btn-dark">PERGUNTAS FREQUeNTES</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<section id="unidades">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1>
                        Unidades
                    </h1>
                </div>
                
            </div>
        </div>
</section> 

<section id="unidade" class="faq">
    <div class="container">
        <div class="justify-content-around row">
            <div class="col-10">
            <div class="tabs d-flex">
                <button class="tab-button" onclick="openTab(event, 'unidadeI')">Unidade I</button>
                <button class="tab-button" onclick="openTab(event, 'unidadeII')">Unidade II</button>
            </div>

            <div id="unidadeI" class="tab-content">
                <div class="unidade-texto">Unidade I - Jardim Satélite</div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.259478853855!2d-45.88746962470425!3d-23.233642949634184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc4abf5f89c343%3A0x4b5f5ec5da2d27f4!2sAv.%20Andr%C3%B4meda%2C%202320%20-%20Jardim%20Sat%C3%A9lite%2C%20S%C3%A3o%20Jos%C3%A9%20dos%20Campos%20-%20SP%2C%2012230-001!5e0!3m2!1spt-BR!2sbr!4v1689966931157!5m2!1spt-BR!2sbr" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mt-2"></iframe>
                    <p>
                        <strong>(12) 3935-8000</strong><br>
                        Av. Andrômeda, 2320<br>
                        Jd. Satélite - CEP 12233-002<br>
                        São José dos Campos - SP<br>
                        <strong>andromeda@vaniadesene.com.br</strong>
                    </p>
                </div>

                <div id="unidadeII" class="tab-content">
                    <div class="unidade-texto">Unidade II - Jardim Esplanada</div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14668.448677849252!2d-45.90669598870677!3d-23.20258243655905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cc358badb8f601%3A0xf2f27d8887a070b4!2sR.%20Irm%C3%A3%20Maria%20Dem%C3%A9tria%20Kfuri%2C%20647%20-%20Jardim%20Esplanada%2C%20S%C3%A3o%20Jos%C3%A9%20dos%20Campos%20-%20SP%2C%2012242-500!5e0!3m2!1spt-BR!2sbr!4v1690310618964!5m2!1spt-BR!2sbr" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mt-2"></iframe>
                    <p>
                        <strong>(12) 3949-6000</strong><br>
                        Rua Irmã Maria Demetria Kfuri, 649<br>
                        Jd. Esplanada - CEP 12244-500<br>
                        São José dos Campos - SP<br>
                        <strong>esplanada@vaniadesene.com.br</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
  @endsection

  @section('pos-script')
  <script>
    function openTab(evt, tabName) {
  var i, tabContent, tabButton;
  tabContent = document.getElementsByClassName("tab-content");
  for (i = 0; i < tabContent.length; i++) {
    tabContent[i].style.display = "none";
  }
  tabButton = document.getElementsByClassName("tab-button");
  for (i = 0; i < tabButton.length; i++) {
    tabButton[i].className = tabButton[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Ativar a primeira aba por padrão
document.getElementById("unidadeI").style.display = "block";
document.getElementsByClassName("tab-button")[0].className += " active";

  </script>
  @endsection