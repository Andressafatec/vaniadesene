@extends('layouts.site')

@section('head')
<style>
    .card-form{
        width: 80%;
        padding: 20px;
        background-color: #fff;
        margin-left: calc(50% - 40%);
        margin-top: 30px;
    }

    form .botao_laranja{
        width: 28%;
        border: none;
        padding: 10px;
        margin-top: 30px;
        background-color: #EB9839;
        text-align: center;
        border-radius: 3px;
        box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.25);
        color: #fff;
        text-transform: uppercase;
        font-size: 18px;
        font-weight: 500 !important;
    }

    .preview-item{
        width: 100%;
        padding: 10px;
        display: flex;
    }
    .preview-item img{
        width:30%;

    }
    .preview-item a{
        display: flex;
        height:100%;
        width:10%;
        text-decoration:none;
    }

    @media (max-width: 768px) {
        .card-form{
            padding: 10px;
            width: 90%;
            margin-left: calc(50% - 45%);
        }
        form .botao_laranja{
            margin-top: 0;
        }

    }

    .container-cep{
        position: relative;
    }
    #searchCep{
        position: absolute;
        top: 0;
        right: 0;
        padding: 6px 12px;
        background: none;
        border: none;
    }
</style>
@endsection

@section('content')
<div class="container">
<div class="card-overlay" id="cardOverlay"></div>
    <div class="card-form">
        <form method="POST" action="{{ route('site.sendMailImoveis')}}" accept-charset="UTF-8" class="form-imovel" id="formImoveis" enctype="multipart/form-data"><input name="_token" type="hidden">
        @csrf
            <div class="row">
                <div class="col-sm-12 text-center my-3">
                    <h3>Formulário de Cadastro de Imóvel</h3>
                </div>
            </div>
            <div class="row">  
                <div class="col-sm-4 ">
                    <label for="">Nome:*</label>
                    <input type="text" name="nome" class="form-control" required="">
                </div>
                <div class="col-sm-4 ">
                    <label for="">E-mail:*</label>
                    <input type="email" name="email" class="form-control" required="">
                </div>
                <div class="col-sm-4 ">
                    <label for="">Telefone:*</label>
                    <input type="text" name="telefone" class="form-control phoneMask" required="" maxlength="15">
                </div>
                <div class="col-sm-4">
                    <label for="">CEP*</label>
                    <div class="container-cep" >
                        <input type="text" name="cep" id="buscaCep" class="form-control cad-form cepMask">
                        <button type="button" id="searchCep">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="">Endereço:*</label>
                    <input type="text" name="endereco" id="endereco" class="form-control" required="">
                </div>
                <div class="col-sm-2">
                    <label for="">Nº:*</label>
                    <input type="text" class="form-control" id="numero" name="numero" required="">
                </div>
                <div class="col-sm-3">
                    <label for="">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento">
                </div>
                <div class="col-sm-4">
                    <label for="">Bairro:*</label>
                    <input type="text" name="bairro" id="bairro" class="form-control" required="">
                </div>
                <div class="col-sm-3">
                    <label for="">Cidade:*</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" required="">
                </div>
                <div class="col-sm-2">
                    <label for="">UF:*</label>
                    <input type="text" name="uf" id="uf" class="form-control" required="">
                </div>
                <div class="col-sm-3">
                    <label for="">Tipo Imóvel:*</label>
                    <select name="tipo" class="form-control">
                        <option value="">Selecione</option>
                        @foreach($tipos as $k => $tipo)
                        <option value="{{$tipo}}"> {{$tipo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="">Valor:*</label>
                    <input type="text" name="valor" class="form-control" required="" onkeyup="formatarValor(this)">
                </div>
                <div class="col-sm-3">
                    <label for="">Finalidade:*</label>
                    <select name="finalidade" class="form-control"> 
                        <option value="" style="padding: 0 25px;"> Selecione</option>
                        @foreach ($finalidadeimovel as $finalidadeimoveis)
                            <option value="{{ Helper::corrigiAcento($finalidadeimoveis->finalidade) }}"> {{ Helper::corrigiAcento($finalidadeimoveis->finalidade) }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-sm-12">
                    <label for="">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control" rows="7" required=""></textarea>
                </div>
            </div>
            <div class="row">
                <label for="">Opções:</label>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Agua Encanada" class=""> <label for="">Agua Encanada</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Agua Quente" class=""> <label for="">Agua Quente</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Almoxarifado" class=""> <label for="">Almoxarifado</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Andares" class=""> <label for="">Andares</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Ano Construção" class=""> <label for="">Ano Construção</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Aparência" class=""> <label for="">Aparência</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Apto" class=""> <label for="">Apto</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Apto." class=""> <label for="">Apto.</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Aptos por Andar" class=""> <label for="">Aptos por Andar</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Ar Condicionado" class=""> <label for="">Ar Condicionado</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Ar. Construida" class=""> <label for="">Ar. Construida</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Ar. Terreno" class=""> <label for="">Ar. Terreno</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Área Coberta" class=""> <label for="">Área Coberta</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Área Construída" class=""> <label for="">Área Construída</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Área de Serviço" class=""> <label for="">Área de Serviço</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Área Pomar" class=""> <label for="">Área Pomar</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Área Terreno" class=""> <label for="">Área Terreno</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Area Total" class=""> <label for="">Area Total</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Área Útil" class=""> <label for="">Área Útil</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Armarios" class=""> <label for="">Armarios</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Banheiros" class=""> <label for="">Banheiros</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Box" class=""> <label for="">Box</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Câmara Seguranç" class=""> <label for="">Câmara Seguranç</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Canil" class=""> <label for="">Canil</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Casa Antiga" class=""> <label for="">Casa Antiga</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Casa p/ Caseiro" class=""> <label for="">Casa p/ Caseiro</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Centro Empres." class=""> <label for="">Centro Empres.</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Cerca/Muro" class=""> <label for="">Cerca/Muro</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Churrasqueira" class=""> <label for="">Churrasqueira</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Cirq. Int. TV" class=""> <label for="">Cirq. Int. TV</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Colégio Próximo" class=""> <label for="">Colégio Próximo</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Comércio Próxim" class=""> <label for="">Comércio Próxim</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Condominio" class=""> <label for="">Condominio</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Copa" class=""> <label for="">Copa</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Cozinha" class=""> <label for="">Cozinha</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Dep. Empregada" class=""> <label for="">Dep. Empregada</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Despensa" class=""> <label for="">Despensa</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Dimensões" class=""> <label for="">Dimensões</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Dormitorios" class=""> <label for="">Dormitorios</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Edicula" class=""> <label for="">Edicula</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Edifício" class=""> <label for="">Edifício</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Elevador" class=""> <label for="">Elevador</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Energ Trifásico" class=""> <label for="">Energ Trifásico</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Energ. Trifásic" class=""> <label for="">Energ. Trifásic</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Energia Elétric" class=""> <label for="">Energia Elétric</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Ent. Lateral" class=""> <label for="">Ent. Lateral</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Entrad Caminhão" class=""> <label for="">Entrad Caminhão</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Escada" class=""> <label for="">Escada</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Escritório" class=""> <label for="">Escritório</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Esgoto Público" class=""> <label for="">Esgoto Público</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Esquina" class=""> <label for="">Esquina</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Estacionamento" class=""> <label for="">Estacionamento</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Face" class=""> <label for="">Face</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Fibra Ótica" class=""> <label for="">Fibra Ótica</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Fogão a Lenha" class=""> <label for="">Fogão a Lenha</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Forno de Pizza" class=""> <label for="">Forno de Pizza</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Frente" class=""> <label for="">Frente</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Fundo" class=""> <label for="">Fundo</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Galinheiro" class=""> <label for="">Galinheiro</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Garagem" class=""> <label for="">Garagem</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Garagens" class=""> <label for="">Garagens</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Garagens Cobert" class=""> <label for="">Garagens Cobert</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Gleba" class=""> <label for="">Gleba</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Hidromassagem" class=""> <label for="">Hidromassagem</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Hobby Box" class=""> <label for="">Hobby Box</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Interfone" class=""> <label for="">Interfone</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Isolada" class=""> <label for="">Isolada</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Jardim" class=""> <label for="">Jardim</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Lago" class=""> <label for="">Lago</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Lareira" class=""> <label for="">Lareira</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Lavabo" class=""> <label for="">Lavabo</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Mobiliado" class=""> <label for="">Mobiliado</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Nº de Salas" class=""> <label for="">Nº de Salas</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Onibus Urbano" class=""> <label for="">Onibus Urbano</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Pé Direito" class=""> <label for="">Pé Direito</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Piscina" class=""> <label for="">Piscina</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Piscina Privati" class=""> <label for="">Piscina Privati</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Plataforma Carg" class=""> <label for="">Plataforma Carg</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Play Ground" class=""> <label for="">Play Ground</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Port Eletronico" class=""> <label for="">Port Eletronico</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Portão Eletroni" class=""> <label for="">Portão Eletroni</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Portaria" class=""> <label for="">Portaria</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Portaria 24 hs" class=""> <label for="">Portaria 24 hs</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Quadra" class=""> <label for="">Quadra</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Quintal" class=""> <label for="">Quintal</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Recepção" class=""> <label for="">Recepção</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Rede de Esgoto" class=""> <label for="">Rede de Esgoto</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Refeitório" class=""> <label for="">Refeitório</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Rua Asfaltada" class=""> <label for="">Rua Asfaltada</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sacada" class=""> <label for="">Sacada</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sala" class=""> <label for="">Sala</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sala de Estar" class=""> <label for="">Sala de Estar</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sala de Jantar" class=""> <label for="">Sala de Jantar</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sala de TV" class=""> <label for="">Sala de TV</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sala Estar" class=""> <label for="">Sala Estar</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sala Jantar" class=""> <label for="">Sala Jantar</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sala Reunião" class=""> <label for="">Sala Reunião</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Salão" class=""> <label for="">Salão</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Salão de Festa" class=""> <label for="">Salão de Festa</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Salão de Festas" class=""> <label for="">Salão de Festas</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Salão de Jogos" class=""> <label for="">Salão de Jogos</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Salas" class=""> <label for="">Salas</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Salas por Andar" class=""> <label for="">Salas por Andar</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sauna" class=""> <label for="">Sauna</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Serviços Condom" class=""> <label for="">Serviços Condom</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Shopping Próxim" class=""> <label for="">Shopping Próxim</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Sobrado" class=""> <label for="">Sobrado</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Suites" class=""> <label for="">Suites</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Superm. Próximo" class=""> <label for="">Superm. Próximo</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Tipo Comercio" class=""> <label for="">Tipo Comercio</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Topografia" class=""> <label for="">Topografia</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Total" class=""> <label for="">Total</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="TV a Cabo" class=""> <label for="">TV a Cabo</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Valor Condomínio" class=""> <label for="">Valor Condomínio</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Vestiário" class=""> <label for="">Vestiário</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Vigil. Noturna" class=""> <label for="">Vigil. Noturna</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Wc" class=""> <label for="">Wc</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="caracteristicas[]" id="" value="Wc Social" class=""> <label for="">Wc Social</label>
                </div>
            </div>		
            <div class="row">
                <div class="col-sm-12">
                    <label for="">Fotos</label>
                    <div class="container-upload">
                        <input type="file" class="uploadArquivos" multiple>
                        <div class="carregandoDestaque" style="display: none;">Carregando...</div>
                    </div>
                    <div id="previews" class="d-flex flex-wrap"></div>
                </div>
            </div>
            <div class="containerbtn text-center">
                <input class="botao_laranja" id="btEnviar" type="submit" value="Enviar">
            </div>		
        </form>
        <div id="loadingDiv" style="display:none;">
            Carregando...
        </div>
    </div>
</div>
@endsection

@section('pos-script')

<script>
    $(document).on('change', '.uploadArquivos', function() {
    var $uploadInput = $(this);
    var $containerUpload = $uploadInput.closest('.container-upload');
    var $carregandoDestaque = $containerUpload.find(".carregandoDestaque");

    $carregandoDestaque.show(0);

    var data = new FormData();
    $.each($uploadInput[0].files, function(i, file) {
        data.append('files[]', file);
    });
    data.append('_token', '{{ csrf_token() }}');

    $.ajax({
        url: '{{ route("site.uploadform") }}',
        type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        success: function(result) {
            $(".containerUpload").fadeOut('fast');

            $.each(result, function (index, value) {
                var urlBase = "{{ URL::to('/') }}";
                var html = '';
                html +='<div class="preview-item">';
                html +='<input type="hidden" name="fotos[]" value="/upload/formulario/'+value+'" />';
                html +='<img src="'+urlBase+'/upload/formulario/'+value+'" alt="">';
                html +='<a href="#" class="corretor-close delete-photo" data-file="'+value+'">';
                html +='<i class="fas fa-times"></i> ';
                html += '</a>';
                html +='</div>';

                $('#previews').append(html);
            });

            $(".carregandoDestaque").hide(0);
        }
    });
});

$(document).on('click', '.delete-photo', function(e) {
    e.preventDefault();
    $(this).parent('.preview-item').remove();
});
    function buscaCep(cep) {
    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
        $("input[name='endereco']").val(dados.logradouro)
        $("input[name='bairro']").val(dados.bairro)
        $("input[name='cidade']").val(dados.localidade)
        $("input[name='uf']").val(dados.uf)

    });
}
$("#buscaCep").change(function() {
    buscaCep($(this).val())
});

$("#searchCep").click(function(e) {
    e.preventDefault();
    buscaCep($("#buscaCep").val())
})

function formatarValor(input) {
    var valor = input.value.replace(/\D/g, '');
    valor = (valor / 100).toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    input.value = valor;
}

$("body").on('click','#formImoveis #btEnviar',function(e) {
    e.preventDefault();
    $(".botao_laranja").attr('disabled',true);
    
    $('#cardOverlay').show();

    $('#loadingDiv').show();

    var url = $("#formImoveis").attr('action'); 
    $.ajax({
        type: "POST",
        url: url,
        data: $("#formImoveis").serialize(),
        success: function(data){
            console.log(data)
            $(".botao_laranja").attr('disabled',false);
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
            $(".botao_laranja").attr('disabled',false);
        },
        complete: function() {
            $('#cardOverlay').hide();
            $('#loadingDiv').hide();
        }
    });
});




</script>

@endsection