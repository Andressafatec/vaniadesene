@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
banners.list
     <section class="content-header">
                    <h1  class="col-sm-6">Banners</h1>
banners.list
                     <div class="col-sm-6">
                    {!! Form::open(['route'=>'admin.banners.banners.list', 'class'=>'form','method'=>'GET']) !!}
                      <div class="input-group">
                        <input class="form-control" name="search" placeholder="Pesquisar...">
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                          <a href="{{route('admin.banners.banners.list')}}" type="submit" class="btn btn-danger"><i class="far fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    {!! Form::close() !!}
              </div>
    <div class="clearfix"></div>
  </section>
<section class="card card-default col-xs-12 m-top-md">
            <div class="card-header with-border">
              <i class="fa fa-book"></i>
              <h3 class="card-title">banners.list</h3>
              <div class="float-right">
                  <a href="{{route('admin.banners.novo')}}" class="btn btn-primary btn-xs btn-flat btn-block">
                <i class="fa fa-plus"></i>
                  Cadastrar</a>
                </div>
            </div>
            <!-- /.card-header -->
                <table class="table card-body table-hover">
                  <tr>
                    <th>Título</th>
                    <th>Status</th>
                    <th class="col-xs-1">Ações</th>
                  </tr>
                  <tr>
                    @foreach($banners as $banner)
                    <td>{{$banner->nome}}</td>
                    <td>@if($banner->status == '1')
                      <span class="label label-success">Ativo</span>
                      @elseif($banner->status == '2')
                      <span class="label label-warning">Pendente</span>
                      @elseif($banner->status == '3')
                      <span class="label label-danger">Inativo</span>
                      @endif
                    </td>
                    <td>
                    <a href="{{route('admin.banners.delete',['id'=>$banner->id])}}" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
                    <a href="{{route('admin.banners.editar',['id'=>$banner->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fas fa-pencil-alt"></i></a></td>
                  </tr>
                  @endforeach
                </table>
               {!!$banners->render()!!}
            <!-- /.card-body -->
    <hr class="clearfix">
</section>
@endsection
@section('pos-script')
<script type="text/javascript">
  $(document).ready(function(){
  $(".btn-danger").click(function(e){
    var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
      swal({
        title: "Tem certeza?",
        text: "Você irá remover definitivamente este item",
        icon: "warning",
        dangerMode: true,
      })
.then(willDelete => {
   $.get(url,function(data){
     $(".remove-row").remove();
    if (willDelete) {
      swal("Sucesso!", "Item removido com sucesso.", "success");
    }
  });
});
  })
  })
</script>
  @endsection
