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
    <div class="col-2">
    </div>
    <div class="col-10 pl-5">
        <h4><b>Categorias / {{$section->title}}</b></h4>
    </div>
</section>
<section class="col-2 float-left">
    <ul class="list-group br-8">
        <li class="list-group-item "><a href="{{route('admin.contents.list',['slug'=>$section->slug])}}">Conteudos</a></li>
        <li class="list-group-item bg-blue-opacity"><a href="{{route('admin.categories.list',['slug'=>$section->slug])}}">Categoria</a></li>
    </ul>
</section>
<section class="col-10 float-right">
    <div class="card card-default col-12 m-top-md br-8">
        <div class="card-header with-border">
            <h2 class="card-title ">Lista</h2>
            <a href="{{route('admin.categories.new',['slug'=>$section->slug])}}" class="btn btn-primary btn-xs btn-flat p-all-sm"
                style="margin-left:10px">
                <i class="fa fa-plus"></i>
                New</a>
                <div class="float-right">
        @include('painel.locale._include')
      </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-hover">
                <tr>
                    <th>Titulo
                     <a href="{{route('admin.categories.list',['slug'=>$section->slug,'sort'=>'asc','term'=>'title'])}}" class="btn btn-default btn-xs">
                        <i class="fas fa-sort-amount-up-alt"></i></a>
                        <a href="{{route('admin.categories.list',['slug'=>$section->slug,'sort'=>'desc','term'=>'title'])}}" class="btn btn-default btn-xs">
                            <i class="fas fa-sort-amount-down"></i>
                        </a>
                    </th>
                    <th class="text-center">Categoria Pai</th>
                    <th>Status</th>
                    <th class="text-right">Ações</th>
                </tr>
@foreach($categories as $key =>$category)
                <tr>
                    <td>
                        <p>{{$category->title}}</p>
                    </td>
                    <td class="text-center">
                        <p>{{@$category->parent->title}}</p>
                    </td>
                    <td>
                   {!!$arrayStatus[$category->status]!!}
                </td>
                    <td class="text-right">
                        <a href="{{route('admin.categories.delete',['slug'=>$section->slug,'id'=>$category->id])}}" class="btn btn-danger btn-destroy btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="{{route('admin.categories.edit',['slug'=>$section->slug,'id'=>$category->id])}}" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
@endforeach
            </table>
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
