@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
<section class="content-header">
    <h1  class="col-6">Configurações</h1>
</section>
<section class="col-2 float-left">
    <ul class="list-group br-8">
        <li class="list-group-item bg-blue-opacity"><a href="{{route('admin.tools.index')}}">Gerais</a></li>
        <li class="list-group-item"><a href="{{route('admin.textos.index')}}">Textos</a></li>
    </ul>
</section>
<section class="col-10 float-right">
    <div class="card card-default col-12 m-top-md br-8">
        <div class="card-header with-border">
            <h2 class="card-title ">Lista</h2>
            <a href="{{route('admin.tools.new')}}" class="btn btn-primary btn-xs btn-flat p-all-sm"
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
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>parâmetro</th>
                        <th>Valor</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tools as $k => $item)
                    <tr>
                        <td >
                            {{$item->title}}
                        </td>
                        <td>
                            {{$item->param}}
                        </td>
                        <td >
                            {!!$item->value!!}
                        </td>
                        <td class="text-right">
                            <a href="{{route('admin.tools.delete',['id'=>$item->id])}}" data-toggle="tooltip" data-placement="top" title="Deletar" class="btn btn-danger btn-destroy btn-xs btn-flat p-all-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="{{route('admin.tools.edit',['id'=>$item->id])}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-xs btn-flat p-all-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="7"></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
@section('pos-script')
<script type="text/javascript">
</script>
@endsection