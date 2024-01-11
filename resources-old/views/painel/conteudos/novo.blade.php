@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
<section class="content-header m-bottom-lg">
<h1>Nova Página</h1>
<div class="clearfix"></div>
</section>
   {!! Form::model(null,['route'=>['admin.paginas.store',$sessao->slug_sessao],'class'=>'']) !!}
  @include('painel.paginas._form')
  {!! Form::close() !!}
@endsection
@section('pos-script')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(document).ready(function() {
    $( ".ordenar" ).sortable({
        cancel:'.remover',
        update: function( event, ui ) {
           $(".ordenar tr").each(function( index ) {
             $(this).find('.ordemGaleria').val(index)
          });
        }
      });
});
  $(document).ready(function() {
  $("#previewGaleria").on('click','.remove',function(e){
    e.preventDefault();
    $(this).parent().addClass("del")
    $.get("{{route('admin.ajax.delete-galeria')}}",{name: $(this).data("file")},function(data){
      if(data.status == "deletado"){
       $("#previewGaleria").find(".del").remove();
     }
   })
  })
  });
</script>
@endsection
