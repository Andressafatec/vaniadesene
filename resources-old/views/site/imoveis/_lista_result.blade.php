<div class="category-grid-topbar">
    <div class="row align-items-center">
        <div class="col-6">
            <h3 class="title">{{ $imoveis->total()}} imóveis encontrados</h3>
        </div>
        <div class="col-6">
            <div class="icone">
                <i class="far fa-sort-alt"></i>
                Mais relevante
            </div>
        </div>
    </div>
</div>
<div class="row ml-sm-2">
    @foreach ($imoveis as $key => $imovel)
    <div class="col-sm-4 col-12 mb-4">
        @include('site.imoveis._card_imovel')
        </div>
    @endforeach
</div>

<div class="col-12">
    {!!$imoveis->withQueryString()->links()!!}
</div>