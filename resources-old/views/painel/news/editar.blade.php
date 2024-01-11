@extends('layouts.painel')
@section('pre-assets')
<style>
.center-form{
  width: 1000px;
  margin: 0 auto;
}
.categorias{
  list-style: none;
  padding-left: 8px;
}
.coluna-flex{
  overflow-y: auto;
  height: 240px;
  max-height: 240px;
}
.align-nav{
  padding: 7px;
    position: relative;
    top: 25px;
    width: 100%;
}
nav{
  width: 100%;
}
.nav-tabs .nav-link{
    color: #8c8c8c;
    background-color: #ececec;
    border-color: #dee2e6 #dee2e6 #fff;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    font-weight: 600;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
  color: #FFF;
    background-color: #0376d8;
}
p{
  margin-bottom: 5px;
}
.m-t{
  margin-top: 3%;
}
.video{
  width: 30%;
}
.preview{
  list-style: none;
  padding: 0;
  margin-top: 15px;
}
.preview .file{
  display: inline-block;
  padding: 10px 20px 0 0;;
}
.fechar{
 background: #ff0000;
    width: 25px;
    float: right;
    border-radius: 100%;
    color: #FFF;
    padding: 0px 0px 0px 8px;
    font-size: 16px;
    position: relative;
    bottom: 110px;
    right: 0px;
}
.fechar:hover{
  color: #FFF;
  text-decoration: none;
}
.btn-media{
  width: 65%;
}
.btn-video{
  position: relative;
    bottom: 38px;
    left: 31%;
}
.related{
  width: 100%;
  list-style: none;
  padding-left: 8px;
}
.related .item{
  background: #dedede78;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
}
.coluna{
  overflow-y: auto;
    height: 500px;
    overflow-x: hidden;
}
.color{
      width: 55px;
    height: 40px;
    position: relative;
    bottom: 40px;
    left: 80%;
    border-bottom-right-radius: 5px;
    border-top-right-radius: 5px;
    background-color:#000;
}
</style>
@endsection
@section('content')
<section class="content-header m-bottom-lg">
<div class="clearfix"></div>
</section>
   {!! Form::model($news,['route'=>['admin.news.update', $news->id,'id'=>'form']]) !!}
  @include('painel.news._form')
  {!! Form::close() !!}
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
                button: false,
                timer:2000,
              });
            }
   })
   });
      });
      $(document).ready(function(){
     $("body").on('click','#cancelar',function(e){
    e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "All your changes will be lost",
                icon: "info",
                buttons: ['Cancel', 'Sure'],
              }).then(confirmar => {
                if(confirmar){
                  window.location = "{{route('admin.news.list')}}";
                }else{
                  swall.close();
                }
         });
   });
      });
</script>
@endsection
