@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')banners.list
     <section class="content-header">
     <!--  <a href="{{route('admin.paginas.lista',$sessao->slug_sessao)}}" class="btn btn-default btn-xs btn-flat">
         <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            Voltar</a> -->
                    <h1  class="col-6">Categorias</h1>
banners.list
    <div class="clearfix"></div>
  </section>
<div class="row">
<section class="col-4">
  <div class="card card-default m-top-md">
    <div class="card-header with-border">
            <h3 class="card-title">Cadastrar</h3>
             @if(@$categoria)
            <a href="{{route('admin.categorias.lista',['tipo'=>$tipo])}}" class="btn btn-xs btn-primary btn-flat float-right"><i class="fa fa-plus"></i> NOVO</a>
            @endif
            </div>
            <div class="card-body">
              @if(@$categoria)
               {!! Form::model($categoria,['route'=>['admin.categorias.update',$categoria->id],'class'=>'']) !!}
                  @else
               {!! Form::model(null,['route'=>['admin.categorias.store'],'class'=>'']) !!}
               @endif
                {!! Form::hidden('sessao_id',@$sessao->id) !!}
               <div class="form-group col-12 ">
        <label for="">Status</label><div class="clearfix"></div>
        <div class="row">
        <div class="col-6">
          <label >
            <input type="radio" name="status"  value="1" class="flat-red" @if(@$categoria->status == "ativo") checked @endif>
            Ativo
          </label>
        </div>
        <div class="col-6">
          <label>
            <input type="radio" name="status" value="3" class="flat-red" @if(@$categoria->status == "inativo") checked @endif>
            Inativobanners.list
          </label>
        </div>
        </div>
      </div>
          <div class="col-12 form-group ">
              <label for="">Categoria Pai</label>
            <select name="parent_id" id="" class=" form-control">
            <option value="0">Selecione..</option>
             @foreach ($categorias as $cat)
               <option value="{{ $cat->id }}"  @if(@$categoria->parent_id == $cat->id) selected @endif>{{ $cat->nome_categoria }}</option>
               @foreach ($cat->children as $children1)
               <option value="{{ @$children1->id }}" @if(@$categoria->parent_id == $children1->id) selected @endif>|-- {{ $children1->nome_categoria }}</option>
               @foreach ($children1->children as $children2)
               <option value="{{ @$children2->id }}" @if(@$categoria->parent_id == $children2->id) selected @endif>|-- -- {{ $children2->nome_categoria }}</option>
               @foreach ($children2->children as $children3)
               <option value="{{ @$children3->id }}" @if(@$categoria->parent_id == $children3->id) selected @endif>|-- -- -- {{ $children3->nome_categoria }}</option>
               @foreach ($children3->children as $children4)
               <option value="{{ @$children4->id }}" @if(@$categoria->parent_id == $children4->id) selected @endif>|-- -- --  -- {{ $children4->nome_categoria }}</option>
                  @endforeach
                 @endforeach
                @endforeach
              @endforeach
           @endforeach
          </select>
          </div>
          <div class="col-12 form-group ">
              {!! Form::label('Nome Categoria','Nome Categoria:') !!}
              {!! Form::text('nome_categoria',null,['class'=>'form-control']) !!}
          </div>
           <div class="col-12 m-top-sm">
           <button type="subimit" class="btn btn-success btn-flat btn-block">SALVAR</button>
          </div>
  {!! Form::close() !!}
            </div>
  </div>
</section>
<section class="col-8">
<div class="card card-default col-12 m-top-md">
            <div class="card-header with-border">
              <h3 class="card-title">Lista   <i class="fa fa-book"></i></h3>
            </div>
            <!-- /.card-header -->
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nome_categoria }}</td>
                        <td>@if($categoria->status == 'ativo')
                            <span class="label label-success">Ativo</span>
                            @elseif($categoria->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($categoria->status == 'inativo')
                            <span class="label label-danger">Inativo</span>
                            @endif
                        </td>
                        <td>
                           <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$categoria->id])}}" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
                                        <a href="{{route('admin.categorias.editar',['tipo'=>$tipo,'id'=>$categoria->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                     </tr>
                        @foreach ($categoria->children as $children1)
                            <tr>
                                <td>|-- {{ $children1->nome_categoria }}</td>
                                <td>@if($children1->status == 'ativo')
                            <span class="label label-success">Ativo</span>
                            @elseif($children1->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($children1->status == 'inativo')
                            <span class="label label-danger">Inativo</span>
                            @endif</td>
                            <td>
                                <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$children1->id])}}" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
                                        <a href="{{route('admin.categorias.editar',['tipo'=>$tipo,'id'=>$children1->id,'tipo'=>$tipo])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            </tr>
                            @foreach ($children1->children as $children2)
                            <tr>
                                <td>|-- -- {{ $children2->nome_categoria }}</td>
                                <td>
                                  @if($children2->status == 'ativo')
                            <span class="label label-success">Ativo</span>
                            @elseif($children2->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($children2->status == 'inativo')
                            <span class="label label-danger">Inativo</span>
                            @endif
                                </td>
                                <td> <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$children2->id])}}" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
                                        <a href="{{route('admin.categorias.editar',['id'=>$children2->id,'tipo'=>$tipo])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                                @foreach ($children2->children as $children3)
                                <tr>
                                    <td>|-- -- -- {{ $children3->nome_categoria }}</td>
                                    <td> @if($children3->status == 'ativo')
                            <span class="label label-success">Ativo</span>
                            @elseif($children3->status == '2')
                            <span class="label label-warning">Pendente</span>
                            @elseif($children3->status == 'inativo')
                            <span class="label label-danger">Inativo</span>
                            @endif</td>
                                    <td>
                                      <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$children3->id])}}" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
                                        <a href="{{route('admin.categorias.editar',['id'=>$children3->id,'tipo'=>$tipo])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                                   @foreach ($children3->children as $children4)
                                  <tr>
                                      <td>|-- -- --  -- {{ $children4->nome_categoria }}</td>
                                      <td> @if($children4->status == 'ativo')
                                          <span class="label label-success">Ativo</span>
                                          @elseif($children4->status == '2')
                                          <span class="label label-warning">Pendente</span>
                                          @elseif($children4->status == 'inativo')
                                          <span class="label label-danger">Inativo</span>
                                          @endif
                                      </td>
                                      <td>
                                        <a href="{{route('admin.categorias.delete',['tipo'=>$tipo,'id'=>$children4->id])}}" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
                                        <a href="{{route('admin.categorias.editar',['id'=>$children4->id,'tipo'=>$tipo])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                  </tr>
                                  @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                @endforeach
             </tbody>
            </table>
            <!-- /.card-body -->
          </div>
    <hr class="clearfix">
</section>
 </div>
@endsection
@section('pos-script')
<script type="text/javascript">
  $(".btn-danger").click(function(e){
    var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
         swal({
        title: 'Tem certeza?',
        text: "Você irá remover definitivamente este item",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, remover!'
      }).then(function () {
        $.get(url,function(data){
         $(".remove-row").remove()
           swal({
            title: 'Sucesso!',
            text: 'Item removido com sucesso.',
             type:'success',
            timer: 2500,
            }
          )
        })
      })
  })
</script>
  @endsection
