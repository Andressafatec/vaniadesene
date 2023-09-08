@extends('layouts.site')

@section('head')
@endsection

@section('content')
<section id="imoveis">
        <div class="container">
          <div class="textotitle">
            Imóveis para <div class="cor">locação/venda</div>
          </div>
        </div>
        <div class="container">
            <div class="row mt-sm-5 mt-2">
                <div class="col_12">
                    <div class="category-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="title">{{ count($imoveis)}} imóveis encontrados</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2">
                    @foreach ($imoveis as $key => $imovel)
                      <div class="imoveis"  style="{{$key >= 8 ? 'display:none;': ''}}">
                          <a href="{{route('site.imoveis.detalhes',[$imovel->id])}}" class="text-decoration-none">
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

        window.onload = function() {
            var imoveisVisiveis = 8;
var imoveisExibidos = document.querySelectorAll('.imoveis');
var imoveisTotais = imoveisExibidos.length;

var itensPorPagina = 8;
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