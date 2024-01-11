@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
     <section class="content-header">
                    <h1  class="col-6">{{$sessao->nome_sessao}}</h1>
                     <div class="col-6">
                    {!! Form::open(['route'=>['admin.paginas.banners.list',$sessao->slug_sessao], 'class'=>'form','method'=>'GET']) !!}
                      <div class="input-group">
                        <input class="form-control" name="search" placeholder="Pesquisar...">
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{route('admin.paginas.banners.list',$sessao->slug_sessao)}}" class="btn btn-danger"><i class="far fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    {!! Form::close() !!}
              </div>
    <div class="clearfix"></div>
  </section>
<section class="col-12">
<div class="card card-default col-12 m-top-md">
            <div class="card-header with-border">
              <h3 class="card-title">banners.listgem    <i class="fa fa-book"></i> </h3>
              <div class="float-right">
                  <a href="{{route('admin.categorias.banners.list',['tipo'=>$sessao->slug_sessao])}}" class="btn btn-warning btn-xs btn-flat">
                    <i class="fa fa-folder"></i>
                      Categorias</a>
                      <a href="{{route('admin.paginas.novo',$sessao->slug_sessao)}}" class="btn btn-primary btn-xs btn-flat ">
                    <i class="fa fa-plus"></i>
                      Cadastrar</a>
              </div>
            </div>
            <!-- /.card-header -->
          <div class="card-body p-0">
                <table class="table table-hover">
                  <tr>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th class="text-center">Destaque</th>
                    <th class="text-center">Data Publicação</th>
                    <th>Status</th>
                    <th >Ações</th>
                  </tr>
                    @foreach($paginas as $pagina)
                     <tr>
                    <td><a href="{{route('admin.paginas.editar',['slug'=>$sessao->slug_sessao,'id'=>$pagina->id])}}">{{$pagina->titulo_conteudo}}</a></td>
                    <td>
                      @if($pagina->categorias)
                      @foreach(@$pagina->categorias as $cat)
                      {{@$cat->categoria->nome_categoria}},
                          @endforeach
                          @endif
                    </td>
                   <td class="text-center">@if($pagina->destaque == '1')
                    <i class="fa fa-star text-yellow" aria-hidden="true"></i>
                    @else
                    <i class="fa fa-star-o text-yellow" aria-hidden="true"></i>
                  @endif</td>
                    <td class="text-center">{{$pagina->inicio_publicacao->format('d/m/Y H:i:s')}}</td>
                    <td>@if($pagina->status == '1')
              <span class="label label-success">Ativo</span>
              @elseif($pagina->status == '2')
              <span class="label label-warning">Pendente</span>
              @elseif($pagina->status == '3')
              <span class="label label-danger">Inativo</span>
              @endif</td>
                    <td>
                    <a href="{{route('admin.paginas.delete',['slug'=>$sessao->slug_sessao,'id'=>$pagina->id])}}" class="btn btn-danger btn-destroy btn-xs"><i class="far fa-trash-alt"></i></a>
                    <a href="{{route('admin.paginas.editar',['slug'=>$sessao->slug_sessao,'id'=>$pagina->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fas fa-pencil-alt"></i></a></td>
                  </tr>
                  @endforeach
                </table>
                </div>
            <div class="card-footer">
              {!!$paginas->render()!!}
            </div>
            <!-- /.card-body -->
          </div>
    <hr class="clearfix">
</section>
@endsection
@section('pos-script')
<script type="text/javascript">
</script>
  @endsection
