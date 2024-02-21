@extends('layouts.painel')

@section('pre-assets')

<style>

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

    li a{

        color: #000;

    }

    .bg-blue-opacity{

        background-color: #ccf4fb;

    }

    .bg-blue-opacity a{

        color: #007bff;

        font-weight: bold;

    }

</style>

@endsection

@section('content')

<section class="col-sm-12 mt-5 mb-3">

   <div class="row">

    <div class="col">

        <h4><b>Sessão: {{ucfirst($section->title)}}</b></h4>

    </div>

    <div class="col-8">

      <form action="" method="GET" class="row">

        <div class="col-8">

          <div class="input-group mb-3">

            <input type="text" required="" name="q" class="form-control" placeholder="Pesquise por título" value="{{Request::input('q')}}">

          </div>

        </div>

        <div class="col-2">

          <div class="form-group">

            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search"></i> Pesquisar </button>

          </div>

        </div>

        <div class="col-2">

          <div class="form-group">

            <a href="{{route('admin.contents.list',['slug'=>$section->slug])}}" class="btn btn-primary btn-block"> Limpar </a>

          </div>

        </div>

      </form>

    </div>

    </div>

</section>

<section class="col-2 float-left">

    <ul class="list-group br-8">

        <li class="list-group-item bg-blue-opacity"><a href="{{route('admin.contents.list',['slug'=>$section->slug])}}">Conteúdos</a></li>

        <li class="list-group-item"><a href="{{route('admin.categories.list',['slug'=>$section->slug])}}">Categorias</a></li>

    </ul>

</section>

<section class="col-10 float-right">

    <div class="card card-default col-12 m-top-md br-8">

        <div class="card-header with-border">

            <h2 class="card-title ">Lista</h2>

            <a href="{{route('admin.contents.new',['slug'=>$section->slug])}}" class="btn btn-primary btn-xs btn-flat p-all-sm"

                style="margin-left:10px">

                <i class="fa fa-plus"></i>

            Novo</a>

            <div class="float-right">

                 @include('painel.locale._include')

            </div>

        </div>

        <!-- /.card-header -->

        <div class="card-body p-0">

            <table class="table table-hover">

                <tr>

                    <th>Título

 <a href="{{route('admin.contents.list',['slug'=>$section->slug,'sort'=>'asc','term'=>'title','filter_cat'=>Request::input('filter_cat')])}}" class="btn btn-default btn-xs">

                        <i class="fas fa-sort-amount-up-alt"></i></a>

                        <a href="{{route('admin.contents.list',['slug'=>$section->slug,'sort'=>'desc','term'=>'title','filter_cat'=>Request::input('filter_cat')])}}" class="btn btn-default btn-xs">

                            <i class="fas fa-sort-amount-down"></i>

                        </a>

                    </th>
                    @if($section->slug == "calendario")
<th>
    Data
</th>
@endif
<th>Categoria</th>

                    <th>Status</th>

                    <th class="text-right">Ações</th>

                </tr>

                @foreach($contents as $key => $item)

                <tr>

                    <td>

                        <a href="{{route('admin.contents.edit',['slug'=>$section->slug,'id'=>$item->id])}}">{{$item->title}}</a>

                    </td>
                    @if($section->slug == "calendario")
<td>
@if($item->evento !== null && $item->evento->data !== "")
{{$item->evento->data->format('d/m/Y')}}
@endif
</td>
@endif
                <td>

                @foreach($item->categories as $k => $i)

                <a href="{{route('admin.contents.list',['slug'=>$section->slug,'filter_cat'=>$i->category->id])}}" data-toggle="tooltip" data-placement="top" title="Filtrar por:">{{$i->category->title}}</a>

                @endforeach

                </td>

                    <td style="width: 150px;">{!!$arrayStatus[$item->status]!!}</td>

                    <td style="width: 150px;" class="text-right">
                    @if($section->slug == "calendario" && @$item->evento->ativar_inscricao == 1)
                    <a href="{{route('admin.inscricoes.index',['id'=>@$item->evento->id])}}" class="btn btn-info btn-xs btn-flat p-all-sm">

<i class="fa fa-users"></i>

</a>
                    @endif
                        <a href="{{route('admin.contents.delete',['slug'=>$section->slug,'id'=>$item->id])}}" class="btn btn-danger btn-xs btn-flat p-all-sm btn-destroy">

                            <i class="fa fa-trash"></i>

                        </a>

                        <a href="{{route('admin.contents.edit',['slug'=>$section->slug,'id'=>$item->id])}}" class="btn btn-primary btn-xs btn-flat p-all-sm">

                            <i class="fas fa-pencil-alt"></i>

                        </a>

                    </td>

                </tr>

                @endforeach

            </table>

{!!$contents->appends($_GET)->links()!!}

        </div>

        <!-- /.card-body -->

    </div>

</section>

<div class="clearfix"></div>

@endsection

@section('pos-script')

<script type="text/javascript">

</script>

@endsection

