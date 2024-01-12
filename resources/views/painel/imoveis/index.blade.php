@extends('layouts.painel')
@section('pre-assets')
<style>
    .controle_950 {
        max-width: 950px !important;
        margin: 0 auto;
    }
    th,
    td {
        text-align: left;
    }
    .list-group-item:first-child {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .list-group-item:last-child {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    td img {
        max-width: 100px;
        max-height: 40px;
    }
    .star {
        color: gray;
    }
    .star.select {
        color: #ff9f00;
    }
    label {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
    }
    li a {
        color: #000;
    }
    .bg-blue-opacity {
        background-color: #ccf4fb;
    }
    .bg-blue-opacity a {
        color: #007bff;
        font-weight: bold;
    }
    .card {
        padding: 0 !important;
    }
    td:first-child,
    th:first-child {
        width: 500px;
    }
</style>
@endsection
@section('content')
<section class="col-sm-12 mt-5 mb-3 controle_950" style="margin-left: 130px;">
    <div class="col-4">
        <h4><b>Imóveis</b></h4>
    </div>
</section>
<section class="col-10 controle_950">
    <div class="card card-default col-12 m-top-md br-8">
        <div class="card-header with-border row">
            <div class="col">
                <h2 class="card-title">Lista</h2>
                <a href="{{route('admin.imoveis.novo')}}" class="btn btn-primary btn-xs btn-flat p-all-sm"
                style="margin-left:10px">
                    <i class="fa fa-plus"></i> Cadastrar
                </a>
            </div>
            <div class="col">
                <form action="" id="formPesquisa">
                    <input type="text" placeholder="Buscar por código" name="codigo">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
          <div class="float-right">
         @include('painel.locale._include')
       </div>
    </div>

    <div class="card-body p-0">
            <div id="lista-imoveis">
            </div>

        {{ $imoveis->links() }}
    </div>
</div>
</section>
@endsection
@section('pos-script')
<script type="text/javascript">
function getLista(route = '{{route("admin.imoveis.getLista")}}'){
    $.get(route,function(data){
        $("#lista-imoveis").html(data);
        $(".loading").hide();
    })
}
getLista();

$("#formPesquisa").submit(function (e) {
        e.preventDefault();
        $(".loading").fadeIn('fast')
        $.ajax({
            method: "GET",
            data: $(this).serialize(),
            url: '{{route("admin.imoveis.getLista")}}',
        }).done(function (data) {
            $("#lista-imoveis").html(data);
            $(".loading").fadeOut('fast')
        }).fail(function () {
            $(".loading").fadeOut('fast')
        });
    });
</script>
@endsection

