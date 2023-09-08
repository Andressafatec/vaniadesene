<div class="card-imovel">
    <a href="{{ route('site.imoveis.detalhes',[$imovel->referencia]) }}"
        class="text-decoration-none">
        <div class="card">
            @php
                $caracteristicas = [];
                foreach ($imovel->caracteristicas() as $caracteristica) {
                $caracteristicas[$caracteristica->pref] = $caracteristica->valor;
                }
            @endphp

            <img src="{{ asset($imovel->miniatura()) }}" />

            <div class="caixa">
                R${{ number_format($imovel->valor, 2, ',','.') }}
            </div>
            <div class="texto-laranja">{{ Helper::corrigiAcento($imovel->tipo ) }}</div>
            <div class="texto-preto">{{ strtoupper(Helper::corrigiAcento($imovel->bairro)) }}</div>
            <p>{{ Helper::corrigiAcento($imovel->cidade) }}</p>

            <div class="d-flex flex-wrap col justify-content-between" style="max-height: 60px">
                <!-- area -->
                <div class="icone col-3">
                    <img src="{{ asset('images/icone-02.svg') }}" alt="">
                    <div class="leg">
                        {{ $imovel->caracteristicasPrincipais('ARU')->valor ?? '-' }} m²
                    </div>
                </div>
                <!-- dormitorio -->
                <div class="icone col-3">
                    <img src="{{ asset('images/icone-03.svg') }}" alt="">
                    <div class="leg">
                        {{ $imovel->caracteristicasPrincipais('DOR')->valor ?? '-' }}</div>
                </div>
                <!-- lavabo -->
                <div class="icone col-3">
                    <img src="{{ asset('images/icone-04.svg') }}" alt="">
                    <div class="leg">
                        {{ $imovel->caracteristicasPrincipais('FAC')->valor ?? '-' }}</div>
                </div>
                <!-- garagem -->
                <div class="icone col-3">
                    <img src="{{ asset('images/icone-05.svg') }}" alt="">
                    <div class="leg">
                        {{ $imovel->caracteristicasPrincipais('GAR')->valor ?? '-' }}</div>
                </div>
            </div>
            <div class="p1">
                <strong>CÓDIGO:</strong> {{ $imovel->referencia }}
            </div>
        </div>
    </a>
</div>