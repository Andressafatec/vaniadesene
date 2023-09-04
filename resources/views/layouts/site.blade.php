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

  <style>
  .modal-dialog{
    margin: 0;
    padding:0;
    max-width: 100%; 
  }
  .modal-content{
    background-color:#EB9839; 
    height:100vh;
    padding: 0 200px;
  }
  .btnSearch{
    background-color:#0D3F85;
    color:#fff;
  }
  .btnSearch:hover{
    background-color: #fff;
    color:#0D3F85;
    border: 1px solid #0D3F85;
  }
</style>

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

   <div class="modal" id="SearchModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('admin.pesquisa')}}" method="GET">
                <div class="modal-body mt-5 pt-5 justify-content-center d-flex">
                  <div class="col-8">
                    <div class="col-12 row pr-0">
                      <input type="text" placeholder="Pesquisar" name="codigo" class="form-control">
                    </div>
                    <div class="row">
                      <div class="col-6 mt-2 selectSearch">
                        <select id="selectOption" class="form-control" name="contrato"> 
                            <option value="" style="padding: 0 25px;"> Compras</option>
                            <option value="Venda"> Venda</option>
                            <option value="Locação"> Locação</option>
                        </select>
                      </div>
                      <div class="col-6 mt-2 selectSearch">
                        <select id="selectOption" class="form-control " name="tipo">
                          <option value="">Tipo Imóvel </option>
                          <option value="CASA"> Casa</option>
                          <option value="CASA COND. FECHADO"> Casa cond. fechado</option>
                          <option value="APARTAMENTO"> Apartamento</option>
                          <option value="PREDIO COMERCIAL"> Predio comercial</option>
                          <option value="TERRENO RESIDENCIAL"> Terreno residencial</option>
                          <option value="RURAL fazenda, sítio e chácara"> Rural fazenda, sítio e chácara</option>
                          <option value="GALPAO"> Galpao</option>
                          <option value="SALA COMERCIAL"> Sala comercial</option>
                          <option value="APARTAMENTO - COBERTURA"> Apartamento - cobertura</option>
                          <option value="APARTAMENTO - MOBILIADO"> Apartamento - mobiliado</option>
                          <option value="AREA"> Area</option>
                          <option value="TERRENO COMERCIAL"> Terreno comercial</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-6 mt-2 selectSearch">
                      <select id="selectOption" class="form-control" name="cidade"> 
                        <option value="" style="padding: 0 25px;"> Cidade</option>
                        <option value="SAO JOSE DOS CAMPOS"> Sao jose dos campos</option>
                        <option value="JACAREI"> Jacarei</option>
                        <option value="CACAPAVA"> Cacapava</option>
                        <option value="PARAIBUNA"> Paraibuna</option>
                        <option value="JAMBEIRO"> Jambeiro</option>
                        <option value="TAUBATE"> Taubate</option>
                        <option value="CAMPOS DO JORDAO"> Campos do jordao</option>
                        <option value="UBATUBA"> Ubatuba</option>
                        <option value="CARAGUATATUBA"> Caraguatatuba</option>
                        <option value="SAPUCAI MIRIM"> Sapucai mirim</option>
                        <option value="PINDAMONHANGABA"> Pindamonhangaba</option>
                        <option value="ARUJA"> Aruja</option>
                        <option value="IGARATA"> Igarata</option>
                        <option value="MONTEIRO LOBATO"> Monteiro lobato</option>
                        <option value="SUZANO"> Suzano</option>
                        <option value="NATIVIDADE DA SERRA"> Natividade da serra</option>
                        <option value="NAZARE PAULISTA"> Nazare paulista</option>
                        <option value="SAO JOSE DO ALEGRE"> Sao jose do alegre</option>
                      </select>
                    </div>
                    <div class="col-6 mt-2 selectSearch">
                      <select id="selectOption" name="bairro" class="form-control">
                        <option value=""> Bairro </option>
                        <option value="JARDIM SATELITE"> Jardim satelite</option>
                        <option value="JARDIM DAS INDUSTRIAS"> Jardim das industrias</option>
                        <option value="JARDIM DAS COLINAS"> Jardim das colinas</option>
                        <option value="JARDIM ESPLANADA"> Jardim esplanada</option>
                        <option value="VILA BRANCA"> Vila branca</option>
                        <option value="BOSQUE DOS IPES"> Bosque dos ipes</option>
                        <option value="VILA DAS FLORES"> Vila das flores</option>
                        <option value="RESIDENCIAL UNIAO"> Residencial uniao</option>
                        <option value="JD APOLO II"> Jd apolo ii</option>
                        <option value="PORTAL DA SERRA"> Portal da serra</option>
                        <option value="JARDIM PORTUGAL"> Jardim portugal</option>
                        <option value="BOSQUE DOS EUCALIPTOS"> Bosque dos eucaliptos</option>
                        <option value="ESPLANADA DO SOL"> Esplanada do sol</option>
                        <option value="RESIDENCIAL MORUMBI"> Residencial morumbi</option>
                        <option value="GALO BRANCO"> Galo branco</option>
                        <option value="CENTRO SJC"> Centro sjc</option>
                        <option value="ELDORADO"> Eldorado</option>
                        <option value="RESIDENCIAL AQUARIUS"> Residencial aquarius</option>
                        <option value="CAMPOS DE SAO JOSE"> Campos de sao jose</option>
                        <option value="JARDIM COLONIAL"> Jardim colonial</option>
                        <option value="JD REPUBLICA"> Jd republica</option>
                        <option value="CAMPOS DOS ALEMAES"> Campos dos alemaes</option>
                        <option value="ALTOS DA SERRA I"> Altos da serra i</option>
                        <option value="JARDIM ESPLANADA I"> Jardim esplanada i</option>
                        <option value="PARQUE INTERLAGOS"> Parque interlagos</option>
                        <option value="JARDIM SAO DIMAS"> Jardim sao dimas</option>
                        <option value="VISTA VERDE"> Vista verde</option>
                        <option value="JARDIM AMERICA"> Jardim america</option>
                        <option value="VILA TESOURO"> Vila tesouro</option>
                        <option value="CHACARAS REUNIDAS"> Chacaras reunidas</option>
                        <option value="JARDIM DO LAGO"> Jardim do lago</option>
                        <option value="JARDIM DAS FLORES"> Jardim das flores</option>
                        <option value="SAN MARINO"> San marino</option>
                        <option value="PARQUE INDUSTRIAL"> Parque industrial</option>
                        <option value="TERRAS DO SUL"> Terras do sul</option>
                        <option value="FLORADAS DA SERRA"> Floradas da serra</option>
                        <option value="JARDIM SANTA INES I"> Jardim santa ines i</option>
                        <option value="RESERVA ESPECIAL DO BOSQUE"> Reserva especial do bosque</option>
                        <option value="FLORADAS DE SAO JOSE"> Floradas de sao jose</option>
                        <option value="JARDIM SUL"> Jardim sul</option>
                        <option value="D PEDRO"> D pedro</option>
                        <option value="ALTOS DA SERRA V"> Altos da serra v</option>
                        <option value="PARAISO DO SOL"> Paraiso do sol</option>
                        <option value="SUNSET PARK"> Sunset park</option>
                        <option value="VILA EMA"> Vila ema</option>
                        <option value="SAO VICENTE"> Sao vicente</option>
                        <option value="JARDIM ESPLANADA II"> Jardim esplanada ii</option>
                        <option value="JARDIM ORIENTE"> Jardim oriente</option>
                        <option value="CHACARA SERIMBURA"> Chacara serimbura</option>
                        <option value="ALTOS DA SERRA VI"> Altos da serra vi</option>
                        <option value="PALMEIRAS DE SAO JOSE"> Palmeiras de sao jose</option>
                        <option value="PUTIM SAO JUDAS"> Putim sao judas</option>
                        <option value="MIRANTE DO VALE"> Mirante do vale</option>
                        <option value="ALTOS DA SERRA II"> Altos da serra ii</option>
                        <option value="VILA ADYANA"> Vila adyana</option>
                        <option value="URBANOVA"> Urbanova</option>
                        <option value="VISTA LINDA"> Vista linda</option>
                        <option value="JARDIM AUGUSTA"> Jardim augusta</option>
                        <option value="JARDIM ALVORADA"> Jardim alvorada</option>
                        <option value="SANTA JULIA"> Santa julia</option>
                        <option value="OSWALDO CRUZ"> Oswaldo cruz</option>
                        <option value="QUINTA DAS FLORES"> Quinta das flores</option>
                        <option value="RESIDENCIAL 31 DE MARCO"> Residencial 31 de marco</option>
                        <option value="AQUARIUS IV"> Aquarius iv</option>
                        <option value="MONTE CASTELO"> Monte castelo</option>
                        <option value="CONDOMINIO JARDINS"> Condominio jardins</option>
                        <option value="RECANTO DA SERRA"> Recanto da serra</option>
                        <option value="RESIDENCIAL DE VILLE"> Residencial de ville</option>
                        <option value="VILA SAO BENTO"> Vila sao bento</option>
                        <option value="CENTRO"> Centro</option>
                        <option value="JARDIM COLINAS"> Jardim colinas</option>
                        <option value="JD PARAISO"> Jd paraiso</option>
                        <option value="ALTOS DA SERRA IV"> Altos da serra iv</option>
                        <option value="CONDOMINIO FIGUEIRAS"> Condominio figueiras</option>
                        <option value="ALTOS DA SERRA III"> Altos da serra iii</option>
                        <option value="MORADA DA SERRA"> Morada da serra</option>
                        <option value="VILA MARIA"> Vila maria</option>
                        <option value="SANTANA"> Santana</option>
                        <option value="JARDIM ESTORIL"> Jardim estoril</option>
                        <option value="SANTA LUZIA"> Santa luzia</option>
                        <option value="FLORADAS DO PARATEHY"> Floradas do paratehy</option>
                        <option value="VILA BETHANIA"> Vila bethania</option>
                        <option value="RESIDENCIAL JAGUARY"> Residencial jaguary</option>
                        <option value="JARDIM CRUZEIRO DO SUL"> Jardim cruzeiro do sul</option>
                        <option value="JD APOLO"> Jd apolo</option>
                        <option value="JARDIM ISMENIA"> Jardim ismenia</option>
                        <option value="JARDIM MOTORAMA"> Jardim motorama</option>
                        <option value="CONDOMINIO CALIFORNIA"> Condominio california</option>
                        <option value="DEL DORO"> Del doro</option>
                        <option value="JD NOVA REPUBLICA"> Jd nova republica</option>
                        <option value="JARDIM BELA VISTA"> Jardim bela vista</option>
                        <option value="AQUARIUS II"> Aquarius ii</option>
                        <option value="JARDIM AMERICANO"> Jardim americano</option>
                        <option value="JARDIM PETROPOLIS"> Jardim petropolis</option>
                        <option value="JARDIM VAL PARAIBA"> Jardim val paraiba</option>
                        <option value="ALTOS DE SANTANA"> Altos de santana</option>
                        <option value="JARDIM IMPERIAL"> Jardim imperial</option>
                        <option value="JARDIM SOUTO"> Jardim souto</option>
                        <option value="CHACARA DOS EUCALIPTOS"> Chacara dos eucaliptos</option>
                        <option value="VILA NAIR"> Vila nair</option>
                        <option value="ROYAL PARK"> Royal park</option>
                        <option value="TORRAO DE OURO"> Torrao de ouro</option>
                        <option value="SERTAOZINHO"> Sertaozinho</option>
                        <option value="RESERVA DO PARATEHY"> Reserva do paratehy</option>
                        <option value="ALPHAVILLE"> Alphaville</option>
                        <option value="VILA ROSSI"> Vila rossi</option>
                        <option value="APOLO I"> Apolo i</option>
                        <option value="ALTOS DO BOSQUE"> Altos do bosque</option>
                        <option value="JARDIM SANTA PAULA"> Jardim santa paula</option>
                        <option value="CHACARA DO PARAIBA"> Chacara do paraiba</option>
                        <option value="VILA CRISTINA"> Vila cristina</option>
                        <option value="JARDIM DOS BANDEIRANTES"> Jardim dos bandeirantes</option>
                        <option value="CONDOMINIO SANTA HELENA"> Condominio santa helena</option>
                        <option value="ALTOS DE VILA PAIVA"> Altos de vila paiva</option>
                        <option value="JARDIM DA GRANJA"> Jardim da granja</option>
                        <option value="VILA TATETUBA"> Vila tatetuba</option>
                        <option value="VILA SAO BENEDITO"> Vila sao benedito</option>
                        <option value="LETONIA"> Letonia</option>
                        <option value="JARDIM JUSSARA"> Jardim jussara</option>
                        <option value="JARDIM POR DO SOL"> Jardim por do sol</option>
                        <option value="CAMPO FELICE"> Campo felice</option>
                        <option value="RESERVA SAO FRANCISCO"> Reserva sao francisco</option>
                        <option value="CAMPOS ELISEOS"> Campos eliseos</option>
                        <option value="JARDIM VALE DO SOL"> Jardim vale do sol</option>
                        <option value="RESIDENCIAL GAZZO"> Residencial gazzo</option>
                        <option value="BAIRRO HONDA"> Bairro honda</option>
                        <option value="PARQUE DOS SINOS"> Parque dos sinos</option>
                        <option value="CONJ SOL NASCENTE"> Conj sol nascente</option>
                        <option value="ELDORADO INDUSTRIAL"> Eldorado industrial</option>
                        <option value="JARDIM ROSARIO"> Jardim rosario</option>
                        <option value="PORTAL DA MANTIQUEIRA"> Portal da mantiqueira</option>
                        <option value="VILA RUBI"> Vila rubi</option>
                        <option value="JARDIM SANTA INES III"> Jardim santa ines iii</option>
                        <option value="SÃO LEOPOLDO"> São leopoldo</option>
                        <option value="MASSAGUACU"> Massaguacu</option>
                        <option value="COND DEL FIORI"> Cond del fiori</option>
                        <option value="COLONIA PARAISO"> Colonia paraiso</option>
                        <option value="COLINAS DO PARATHEY"> Colinas do parathey</option>
                        <option value="VARADOURO"> Varadouro</option>
                        <option value="JARDIM DEL REY"> Jardim del rey</option>
                        <option value="MARINGA"> Maringa</option>
                        <option value="RESIDENCIAL FLAMBOYANT"> Residencial flamboyant</option>
                        <option value="JD SANTA EDVIRGES"> Jd santa edvirges</option>
                        <option value="JARDIM CACAPAVA"> Jardim cacapava</option>
                        <option value="NOVO HORIZONTE"> Novo horizonte</option>
                        <option value="GIRASSOIS"> Girassois</option>
                        <option value="JARDIM MARIANA II"> Jardim mariana ii</option>
                        <option value="JARDIM DO GOLFE"> Jardim do golfe</option>
                        <option value="CHACARA DOS LAGOS"> Chacara dos lagos</option>
                        <option value="CONDOMINIO FLORESTA"> Condominio floresta</option>
                        <option value="VILA IRACEMA"> Vila iracema</option>
                        <option value="SAO JUDAS TADEU"> Sao judas tadeu</option>
                        <option value="RESIDENCIAL MORADA DO SOL"> Residencial morada do sol</option>
                        <option value="JARDIM PARAIBA"> Jardim paraiba</option>
                        <option value="SANTA ROSA"> Santa rosa</option>
                        <option value="EUGENIO DE MELO"> Eugenio de melo</option>
                        <option value="JARDIM PAULISTA"> Jardim paulista</option>
                        <option value="CONDOMINIO SUNSET GARDEN"> Condominio sunset garden</option>
                        <option value="COND TERRAS DE SANTA HELENA"> Cond terras de santa helena</option>
                        <option value="VILA INDUSTRIAL"> Vila industrial</option>
                        <option value="MONTE SERRAT"> Monte serrat</option>
                        <option value="BOSQUE IMPERIAL"> Bosque imperial</option>
                        <option value="CONTRY CLUB"> Contry club</option>
                        <option value="RESIDENCIAL ANA MARIA"> Residencial ana maria</option>
                        <option value="VILAGIO FAZENDAO"> Vilagio fazendao</option>
                        <option value="JARDIM PRIMAVERA"> Jardim primavera</option>
                        <option value="JARDIM CALIFORNIA"> Jardim california</option>
                        <option value="SUMARÉ"> Sumaré</option>
                        <option value="VILLAGIO RESIDENCIAL PREMIER"> Villagio residencial premier</option>
                        <option value="BUQUIRINHA"> Buquirinha</option>
                        <option value="VILA PAIVA"> Vila paiva</option>
                        <option value="PRAINHA"> Prainha</option>
                        <option value="ARARETAMA"> Araretama</option>
                        <option value="JARDIM MARCONDES"> Jardim marcondes</option>
                        <option value="VILLA CAMBUI"> Villa cambui</option>
                        <option value="PARARANGABA"> Pararangaba</option>
                        <option value="JARDIM SANTA MARIA"> Jardim santa maria</option>
                        <option value="QUINTA DOS LAGOS"> Quinta dos lagos</option>
                        <option value="VILA ADRIANA"> Vila adriana</option>
                        <option value="TABATINGA"> Tabatinga</option>
                        <option value="CONDOMINIO ARUEIRAS"> Condominio arueiras</option>
                        <option value="CONDOMINIO TERRAS DO VALE"> Condominio terras do vale</option>
                        <option value="VILA SAO GERALDO"> Vila sao geraldo</option>
                        <option value="ELMANO FERREIRA VELOSO"> Elmano ferreira veloso</option>
                        <option value="BOSQUE DOS EUCALIPTOS FINAL DO BOSQUE BOSQUE DOS EUCALIPTOS"> Bosque dos eucaliptos final do bosque bosque dos eucaliptos</option>
                        <option value="AQUARIUS V"> Aquarius v</option>
                        <option value="CONDOMINIO VERANA"> Condominio verana</option>
                        <option value="CAPIVARI"> Capivari</option>
                        <option value="POUSADA DO VALE"> Pousada do vale</option>
                        <option value="SANTA BARBARA"> Santa barbara</option>
                        <option value="CAPAO GROSSO BOM RETIRO"> Capao grosso bom retiro</option>
                        <option value="PORTAL DO CEU"> Portal do ceu</option>
                        <option value="JARDIM SAO LEOPOLDO"> Jardim sao leopoldo</option>
                        <option value="JARDIM UIRA"> Jardim uira</option>
                        <option value="RESIDENCIAL TERRA NOVA"> Residencial terra nova</option>
                        <option value="MARTINS DE SA"> Martins de sa</option>
                        <option value="CONDOMINIO VALE DOS LAGOS"> Condominio vale dos lagos</option>
                        <option value="RESIDENCIAL ALTOS DO BOSQUE"> Residencial altos do bosque</option>
                        <option value="RESIDENCIAL RIGHI"> Residencial righi</option>
                        <option value="JARDIM DIAMANTE"> Jardim diamante</option>
                        <option value="JARDIM CEREJEIRAS"> Jardim cerejeiras</option>
                        <option value="JARDIM SANTA INES II"> Jardim santa ines ii</option>
                        <option value="CAPUAVA"> Capuava</option>
                        <option value="BOSQUE DOS EUCALIPTOS JARDIM SATELITE BOSQUE DOS EUCALIPTOS"> Bosque dos eucaliptos jardim satelite bosque dos eucaliptos</option>
                        <option value="CONDOMINIO VERT VILLE"> Condominio vert ville</option>
                        <option value="NOVA ESPERANCA"> Nova esperanca</option>
                        <option value="JARDIM MADUREIRA"> Jardim madureira</option>
                        <option value="RESIDENCIAL JOAO PAULO II"> Residencial joao paulo ii</option>
                        <option value="SANTO ONOFRE"> Santo onofre</option>
                        <option value="FREITAS"> Freitas</option>
                        <option value="RECANTO DOS TAMOIOS"> Recanto dos tamoios</option>
                        <option value="DOM PEDRO II"> Dom pedro ii</option>
                        <option value="SERROTE"> Serrote</option>
                        <option value="CONDOMINIO RESIDENCIAL CLUBE"> Condominio residencial clube</option>
                        <option value="JARDIM SAN RAFAEL"> Jardim san rafael</option>
                        <option value="BOM RETIRO"> Bom retiro</option>
                        <option value="PARQUE SANTO ANTONIO"> Parque santo antonio</option>
                        <option value="JARDIM MINAS GERAIS"> Jardim minas gerais</option>
                        <option value="DOS FRANCOS"> Dos francos</option>
                        <option value="AQUARIUS I"> Aquarius i</option>
                        <option value="RESIDENCIAL JATOBA"> Residencial jatoba</option>
                        <option value="COLINAS DO PARAHYBA"> Colinas do parahyba</option>
                        <option value="JARDIM VENEZA"> Jardim veneza</option>
                        <option value="VILA EMA ADYANA"> Vila ema adyana</option>
                      </select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-6 mt-2">
                      <input type="text" name="valormin" placeholder="Valor Mínimo" class="form-control">
                    </div>
                    <div class="col-6 mt-2">
                      <input type="text" name="valormax" placeholder="Valor Máximo" class="form-control">
                    </div>
                    </div>
                    <div class="col-12 justify-content-center d-flex mt-4">
                        <button type="submit" class="btn btnSearch col-6">BUSCAR</button>
                    </div>
                  </div>
                </div>
                </form>
            </div>
        </div>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    

  @yield('pos-script')
</body>
</html>