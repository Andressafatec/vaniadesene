@extends('layouts.painel')
@section('content')
<section class="content-header">
  <h1  class="col-sm-6">Menus</h1>
  <div class="clearfix"></div>
</section>
<div class="row">
  <section class="col-4">
    <div class="card card-default col-xs-12 m-top-md">
      <div class="card-header with-border">
        <h3 class="card-title">Novo</h3>
      </div>
      <div class="card-body">
        @if(@$menu)
        {!! Form::model($menu,['route'=>['admin.tiposMenu.update',$menu->id],'class'=>'']) !!}
        @else
        {!! Form::model(null,['route'=>['admin.tiposMenu.store'],'class'=>'']) !!}
        @endif
        <div class="form-group col-sm-12 ">
          <label for="">Status</label><div class="clearfix"></div>
          <div class="col-xs-6">
            <label >
              <input type="radio" name="status"  value="1" class="flat-red" checked="" >
              Ativo
            </label>
          </div>
          <div class="col-xs-6">
            <label>
              <input type="radio" name="status" value="3" class="flat-red" f>
              Inativo
            </label>
          </div>   
        </div>
        <div class="col-sm-12 form-group ">
          {!! Form::label('Nome do grupo de menu','Nome do grupo de menu:') !!}
          {!! Form::text('nome_menu',null,['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-12 m-top-sm">
         <button type="submit" class="btn btn-success btn-flat btn-block">Salvar</button>
       </div>
       {!! Form::close() !!}
     </div>
   </div>
 </section>
 <section class="col-8">
  <div class="card card-default col-xs-12 m-top-md">
    <div class="card-header with-border">
      <h3 class="card-title">List  <i class="fa fa-book"></i></h3>
    </div>
    <!-- /.card-header -->
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Status</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tiposMenu as $tipoMenu)
        <tr>
          <td>{{$tipoMenu->nome_menu}}</td>
          <td>
             {!!$arrayStatus[$tipoMenu->status]!!}
            </td>
          <td>
            <a href="{{route('admin.tiposMenu.delete',['id'=>$tipoMenu->id])}}" data-toggle="tooltip" data-placement="top" title="Deletar" class="btn btn-danger btn-destroy btn-xs"><i class="far fa-trash-alt"></i></a>
            <a href="{{route('admin.menu.index',['id'=>$tipoMenu->id])}}" data-toggle="tooltip" data-placement="top" title="Itens Menu" class="btn btn-primary btn-xs"><i class="fa fa-bars"></i></a>
            <a href="{{route('admin.tiposMenu.editar',['id'=>$tipoMenu->id])}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-xs m-left-xs"><i class="fas fa-pencil-alt"></i></a>
           </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- /.card-body -->
    </div>
    <hr class="clearfix">
  </section>
</div>
@stop
@section('pos-script')
@endsection