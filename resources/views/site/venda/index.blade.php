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
            Imóveis para <div class="cor">Venda</div>
          </div>
        </div>
        <div class="container">
            <div class="row mt-sm-5 mt-2">
                <div class="col_categoria_1">
                    <div class="category-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <div class="search">
                                <form action="{{ route('admin.venda.filtrar')}}">
                                    <input type="text" placeholder="Buscar por código" name="codigo">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        <form action="{{ route('admin.venda.filtrar')}}" method="GET">
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsetipo" role="button" aria-expanded="false" aria-controls="collapsetipo">
                                    Tipo
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsetipo">
                                <div class="col-12">
                                    <div class="row">
                                        @foreach ($tipoimovel as $tipoimoveis)
                                        <div class="tipo">
                                            <div class="form-check">
                                                <input class="form-check-input" name="tipo" value="{{ $tipoimoveis->tipo }}" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                {{ ucfirst(mb_strtolower($tipoimoveis->tipo)) }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
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
                            <div class="collapse" id="collapsefinalidade">
                                <div class="col-12">
                                    <div class="row">
                                        @foreach ($finalidadeimovel as $finalidadeimoveis)
                                        <div class="tipo">
                                            <div class="form-check">
                                                <input class="form-check-input" name="finalidade" value="{{ $finalidadeimoveis->finalidade }}" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    {{ ucfirst(mb_strtolower($finalidadeimoveis->finalidade)) }}

                                                    <!--{{ $finalidadeimoveis->finalidade }}-->
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsecidade" role="button" aria-expanded="false" aria-controls="collapsecidade">
                                    Cidade
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsecidade">
                                <div class="col-12 tipo" style="max-width:100%">
                                        @foreach ($cidadeimovel as $cidadeimoveis)
                                            <div class="form-check">
                                                <input class="form-check-input" name="cidade" value="{{ $cidadeimoveis->cidade }}" type="checkbox" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    {{ ucfirst(mb_strtolower($cidadeimoveis->cidade)) }}

                                                    <!--{{ $finalidadeimoveis->finalidade }}-->
                                                </label>
                                            </div>
                                        @endforeach
                                </div>
                            </div>
                            <hr>
                            <p style="text-align: left;">
                                <a class="categorias" data-toggle="collapse" href="#collapsebairro" role="button" aria-expanded="false" aria-controls="collapsebairro">
                                    Bairro
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsebairro">
                                <div class="col-12 tipo" style="max-width:100%">
                                    <select name="bairro" class="form-control">
                                        <option value=""> Nenhum </option>
                                        @foreach ($bairroimovel as $bairroimoveis)
                                            <option value="{{ $bairroimoveis->bairro }}"> {{ ucfirst(mb_strtolower($bairroimoveis->bairro)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                                            <input type="text" placeholder="" name='valormin' style="padding: 0; padding-right:0">
                                        </div>
                                        <div class="valor">
                                            <label for="">Máximo</label>
                                            <input type="text" placeholder="" name='valormax' style="padding: 0; padding-right:0">
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
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOR]" value="1" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOR]" value="2" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOR]" value="3" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOR]" value="4" id="flexCheckDefault1">
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
                            <div class="collapse" id="collapsesuites">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOP]" value="1" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOP]" value="2" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOP]" value="3" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[DOP]" value="4" id="flexCheckDefault1">
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
                                <a class="categorias" data-toggle="collapse" href="#collapsevagas" role="button" aria-expanded="false" aria-controls="collapsevagas">
                                    Vagas
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsevagas">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[GAR]" value="1" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[GAR]" value="2" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[GAR]" value="3" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[GAR]" value="4" id="flexCheckDefault1">
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
                                <a class="categorias" data-toggle="collapse" href="#collapsebanheiros" role="button" aria-expanded="false" aria-controls="collapsebanheiros">
                                    Banheiros
                                    <i class="fas fa-chevron-down icon"></i>
                                </a>
                            </p>
                            <div class="collapse" id="collapsebanheiros">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[FAC]" value="1" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[FAC]" value="2" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[FAC]" value="3" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="quartos mr-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="caracteristicas[FAC]" value="4" id="flexCheckDefault1">
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
                        <button type="submit" class="botao_filtro">Aplicar filtro</button>
                    </div>
                    </form>
                </div>
                <div class="col_categoria_2">
                    <div class="category-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="title">{{ count($imoveis)}} imóveis encontrados</h3>
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
                      <div class="locacao"  style="{{$key >= 6 ? 'display:none;': ''}}">
                          <a href="{{route('admin.venda.detalhes',[$imovel->id])}}" class="text-decoration-none">
                            <div class="card">
                                @php
                                    $caracteristicas = [];
                                    foreach ($imovel->caracteristica as $caracteristica) {
                                        $caracteristicas[$caracteristica->pref] = $caracteristica->valor;
                                    }
                                @endphp
                                @foreach ($imovel->fotos as $foto)
                                @if($foto->imovel_id == $imovel->id)
                                    @if($foto->ordem == 1)
                                    <img src="{{asset($foto->url)}}"/>
                                    @endif
                                @endif
                                @endforeach
                              <div class="caixa"> R${{number_format($imovel->valor, 2, ',','.')}} </div>
                              <div class="texto-laranja">{{ $imovel->tipo }}</div>
                              <div class="texto-preto">{{ $imovel->bairro }}</div>
                              <p>{{ $imovel->cidade }}</p>

                              <div class="d-flex flex-wrap col justify-content-between" style="max-height: 60px">
                              <!-- area -->
                              <div class="icone col-3">
                                    <img src="{{ asset('images/icone-02.svg') }}" alt="">
                                    <div class="leg">{{ $caracteristicas['ARU'] ?? '-' }} m²</div>
                                </div>
                                <!-- dormitorio -->
                                <div class="icone col-3">
                                    <img src="{{ asset('images/icone-03.svg') }}" alt="">
                                    <div class="leg">{{ $caracteristicas['DOR'] ?? '-' }}</div>
                                </div>
                                <!-- lavabo -->
                                <div class="icone col-3">
                                    <img src="{{ asset('images/icone-04.svg') }}" alt="">
                                    <div class="leg">{{ $caracteristicas['FAC'] ?? '-' }}</div>
                                </div>
                                <!-- garagem -->
                                <div class="icone col-3">
                                    <img src="{{ asset('images/icone-05.svg') }}" alt="">
                                    <div class="leg">{{ $caracteristicas['GAR'] ?? '-' }}</div>
                                </div>
                              </div>
                              <div class="p1">
                                <strong>CÓDIGO:</strong> {{ $imovel->referencia }}
                              </div>
                            </div>
                          </a>
                        </div>
                    @endforeach
                    </div>

                    <div class="col-12">
                        <div class="pagination left d-flex">
                            <!--<button class="pagination-prev"><i class="fas fa-chevron-left li_icone"></i></button>-->
                            <div class="pagination-list">
                                <li><a href="javascript:void(0)" class="pagination-prev"><i class="fas fa-chevron-left li_icone"></i></a></li>
                            </div>
                            <div class="pagination-list" id="paginationList"></div>
                            <div class="pagination-list">
                                <li><a href="javascript:void(0)" class="pagination-next"><i class="fas fa-chevron-right li_icone"></i></a></li>
                            </div>
                            <!--<button class="pagination-next"><i class="fas fa-chevron-right li_icone"></i></button>-->
                            <button id="carregarMais" class="d-none">Carregar Mais</button>
                        </div>
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

        window.onload = function() {
            var imoveisVisiveis = 6;
var imoveisExibidos = document.querySelectorAll('.locacao');
var imoveisTotais = imoveisExibidos.length;

var itensPorPagina = 6;
var paginasTotais = Math.ceil(imoveisTotais / itensPorPagina);
var paginasPorGrupo = 4;
var gruposTotais = Math.ceil(paginasTotais / paginasPorGrupo);

var paginationList = document.getElementById('paginationList');
var paginationPrev = document.querySelector('.pagination-prev');
var paginationNext = document.querySelector('.pagination-next');

var grupoAtual = 0;
var paginaAtual = 0;

function ocultarTodosOsItens() {
    imoveisExibidos.forEach(function(item) {
        item.style.display = 'none';
    });
}

function exibirItensPagina(pagina) {
    ocultarTodosOsItens();

    var startIndex = pagina * itensPorPagina;
    var endIndex = startIndex + itensPorPagina;

    for (var i = startIndex; i < endIndex && i < imoveisTotais; i++) {
        imoveisExibidos[i].style.display = 'block';
    }

    imoveisVisiveis = endIndex;

    if (imoveisVisiveis >= imoveisTotais) {
        document.getElementById('carregarMais').style.display = 'none';
    } else {
        document.getElementById('carregarMais').style.display = 'block';
    }
}

function gerarLinksPagina(grupo) {
    paginationList.innerHTML = ''; // Limpar a lista de paginação

    var inicio = grupo * paginasPorGrupo;
    var fim = Math.min((grupo + 1) * paginasPorGrupo, paginasTotais);

    for (var i = inicio; i < fim; i++) {
        var paginaNumeroLink = document.createElement('a');
        paginaNumeroLink.href = 'javascript:void(0)';
        paginaNumeroLink.classList.add('paginaNumero');
        paginaNumeroLink.textContent = (i + 1).toString();

        paginaNumeroLink.addEventListener('click', (function(pagina) {
            return function() {
                paginaAtual = pagina;
                exibirItensPagina(paginaAtual);
            };
        })(i));

        var paginaNumeroItem = document.createElement('li');
        paginaNumeroItem.appendChild(paginaNumeroLink);
        paginationList.appendChild(paginaNumeroItem);
    }
}

function atualizarPaginacao() {
    if (grupoAtual === 0) {
        paginationPrev.style.display = 'none';
    } else {
        paginationPrev.style.display = 'block';
    }

    if (grupoAtual === gruposTotais - 1) {
        paginationNext.style.display = 'none';
    } else {
        paginationNext.style.display = 'block';
    }
}

paginationPrev.addEventListener('click', function() {
    if (grupoAtual > 0) {
        grupoAtual--;
        gerarLinksPagina(grupoAtual);
        atualizarPaginacao();
    }
});

paginationNext.addEventListener('click', function() {
    if (grupoAtual < gruposTotais - 1) {
        grupoAtual++;
        gerarLinksPagina(grupoAtual);
        atualizarPaginacao();
    }
});

var carregarMaisBtn = document.getElementById('carregarMais');
carregarMaisBtn.addEventListener('click', function() {
    exibirItensPagina(paginaAtual + 1);
});

gerarLinksPagina(grupoAtual);
atualizarPaginacao();

exibirItensPagina(0);


};

</script>

@endsection