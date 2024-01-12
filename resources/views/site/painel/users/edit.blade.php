@extends('layouts.painel')
@section('title')
Home | Editar Usuário
@stop
@section('content')
<section class="content-header col-xs-12 col-sm-8 col-sm-offset-2 ">
  <h1  class="col-6 p-all-0">Editar</h1>
</section>
<section class="content-header">
  <div class="row">
    <div class="col-md-8 col-sm-offset-2">
      <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
        @if($errors->any())
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
          <ul>
           @foreach($errors->all() as $error)
           <li>{{$error}}</li>   
           @endforeach
         </ul>
       </div>
       @endif
       {!! Form::model($usuario,['route'=>['admin.users.update',$usuario->id], 'class'=>'form', 'id'=>'update']) !!}
       @include('painel.users._form')
       {!! Form::close() !!}
     </div>
   </div>
 </div>
</section>
@endsection
@section('pos-script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
 $(document).ready(function(){
   $("body").on('click','#salvar',function(e){
    e.preventDefault();
    $.post($('#update').attr('action'),$('#update').serialize(),function(data){
      if(data.erro == 0){
        swal({
          title: "success!",
          text: data.msg,
          icon: "success",
          button: true,
          timer:2000,
        }).then(confirmar =>{
            window.location = "{{route('admin.users.list')}}"; 
        });
      }
    })
  });
   $("body").on('click','#cancelar',function(e){
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "All your changes will be lost",
      icon: "info",
      buttons: ['Cancel', 'Sure'],
    }).then(confirmar => {
      if(confirmar){
        window.location = "{{route('admin.users.list')}}"; 
      }else{
        swall.close();
      }
    });
  });
 });
</script>
@endsection