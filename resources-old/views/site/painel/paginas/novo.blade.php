@extends('layouts.painel')
@section('pre-assets')
<style>
  .footerActions{
    position: fixed;
    width: calc(100% - 73px);
    background: #fff;
    z-index: 100;
    bottom: 0;
    left: 73px;
    opacity: 0.5;
  }
  .footerActions:hover{
    opacity: 1;
  }
.content-wrapper>.content {
    padding-bottom: 100px;
}
.list-action {
  padding: 10px;
}
</style>
@endsection
@section('content')
<section class="content-header m-bottom-lg">
<h1>Cadastro: {!!$sessao->nome_sessao!!}</h1>
<div class="clearfix"></div>
</section>
   {!! Form::model(null,['route'=>['admin.paginas.store',$sessao->slug_sessao],'id'=>'form']) !!}
  @include('painel.paginas._form')
    <div class="footerActions">
     <div class="list-action ">
      <div class="row">
         <div class="col-4 text-left ">
           <button type="button" class="btn btn-flat btn-default" data-action="sair">Sair</button>
        </div>
        <div class="col-8">
          <button type="button" class="btn btn-flat btn-primary" data-action="salvar_sair">Salvar e Editar</button>
          <button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button>
        </div>
      </div>
    </div>
  </div>
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
    $("input[name='titulo_conteudo']").keyup(function(){
      $(".slug-preview").val(string_to_slug($(this).val()))
    })
     $(".slug-preview").keyup(function(){
      $(".slug-preview").val(string_to_slug($(this).val()))
    });
  });
   $(document).ready(function(){
    $(".list-action").on('click','button',function(e){
      e.preventDefault();
      var action = $(this).data('action');
      var form = $(this).closest('form');
      $('#summernote').val($('#summernote').summernote('code'));
      $('.summernote-basic').val($('.summernote-basic').summernote('code'));
      if(action == 'sair'){
         swal({
            title: "Tem certeza?",
            text: "As alterações no formulário seram perdidas",
            icon: "warning",
            dangerMode: false,
              buttons:{
                  cancel: {
                    text: "Cancelar",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                  },
                  confirm: {
                    text: "Sim, Sair",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                  }
                }
          }) .then(confirmar => {
             if (confirmar) {
              window.location = "{{route('admin.paginas.banners.list',$sessao->slug_sessao)}}"
             }
         });
      }else if(action == 'salvar_sair'){
        $.post($(form).attr('action'),$(form).serialize(),function(data){
          if(data.erro == 0){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
                timer:2000,
              }).then(confirmar => {
              window.location = data.url;
         });
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }else if(action == 'salvar'){
        $.post($(form).attr('action'),$(form).serialize(),function(data,error){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
                timer:3000,
              });
            // document.getElementById("formPaginas").reset();
            $('#form')[0].reset();
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }
    })
  })
</script>
@endsection
