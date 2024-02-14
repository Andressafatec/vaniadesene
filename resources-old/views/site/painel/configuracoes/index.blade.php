@extends('layouts.painel')
@section('pre-assets')
<style>
.select-icon{
  position: relative;
  border: 1px solid #ededed;
  border-radius: 4px;
  card-shadow: 1px 1px 1px #ededed;
}
.item-icon{
  padding: 5px;
  border-bottom:  1px dotted #ededed;
  display: block;
  color: #333;
}
.item-icon.active{
  background: #039ef7;
  color: #333;
}
.item-icon.active:hover{
  color: #333;
}
.item-icon:hover{
  color: #039ef7;
  cursor: pointer;
}
.item-icon i{
  float: right;
}
.content-icon{
  overflow-y: scroll;
  max-height: 100px;
}
body.dragging, body.dragging * {
  cursor: move !important;
}
.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}
ol.example li.placeholder {
  position: relative;
  /** More li styles **/
}
ol.example li.placeholder:before {
  position: absolute;
  /** Define arrowhead **/
}
</style>
@endsection
@section('content')
<section class="content-header">
  <h1  class="col-6">Menus</h1>
banners.list
  <div class="clearfix"></div>
</section>
<div class="row">
<section class="col-12">
  <div class="card card-default col-12 m-top-md">
    <div class="card-header with-border">
      <h3 class="card-title">Cadastrar</h3>
    </div>
    <div class="card-body">
      @if(@$config)
      {!! Form::model($config,['route'=>['admin.tools.update',$config->id],'id'=>'formConfiguracoes']) !!}
      @else
      {!! Form::model(null,['route'=>['admin.tools.store'],'id'=>'formConfiguracoes']) !!}
      @endif
      <input type="hidden" name="id" value="{{@$config->id}}">
      <div class="col-12 form-group ">
        {!! Form::label('Titulo','Título:') !!}
        {!! Form::text('titulo',@$menu->titulo,['class'=>'form-control']) !!}
      </div>
      <div class="col-12 form-group ">
         {!! Form::label('Valor','Valor:') !!}
<textarea name="value" class="form-control" >{{@$menu->value}}</textarea>
      </div>
     <div class="col-12 m-top-sm">
      <button type="submit" class="btn btn-success btn-flat btn-block">SALVAR</button>
  </div>
</div>
  {!! Form::close() !!}
</div>
</section>
<section class="col-12">
  <div class="card card-default col-12 m-top-md">
    <div class="card-header with-border">
      <i class="fa fa-book"></i>
      <h3 class="card-title">Lista</h3>
    </div>
    <!-- /.card-header -->
    <table class="table table-hover sorted_table">
      <thead>
        <tr>
          <th>Titulo</th>
          <th >Param</th>
          <th >Valor</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          @foreach($configuracoes as $configuracao)
          <tr class="">
            <td class="">{{$configuracao->titulo}}</td>
            <td class="">{{$configuracao->parametro}}</td>
            <td style="max-width: 250px;">{{$configuracao->value}}</td>
            <td class="">
              <a href="{{route('admin.tools.delete',['id'=>$configuracao->id])}}" class="btn btn-danger btn-destroy btn-xs"><i class="far fa-trash-alt"></i></a>
              <a href="{{route('admin.tools.editar',['id'=>$configuracao->id])}}" class="btn btn-primary btn-xs m-left-xs"><i class="fas fa-pencil-alt"></i></a>
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
  <link href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
  @endsection
  @section('pos-script')
  <!--<script src="https://johnny.github.io/jquery-sortable/js/jquery-sortable.js"></script>-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    $("#formConfiguracoes").submit(function(e) {
    $(".btn-success").attr('disabled',true)
            e.preventDefault();
            var url = $(this).attr('action'); // the script where you handle the form input.
            $.ajax({
                   type: "POST",
                   url: url,
                   data: $("#formConfiguracoes").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                    console.log(data)
                    if(data.status == "existe"){
                       $(".btn-success").attr('disabled',false);
                       swal("Atenção!", "Título já existe em nossa base de dados", "info");
                    }else{
                      swal("Sucesso!", "Item Salvo com sucesso", "success", {
  buttons: false,
  timer: 5000,
}).then((value) => {
                          window.location = "{{route('admin.tools.index')}}";
                        });;
                      window.location = "{{route('admin.tools.index')}}";
                    }
                   }
                 });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
</script>
@endsection
