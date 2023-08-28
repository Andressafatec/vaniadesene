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
<h1>Editar: {!!$sessao->nome_sessao!!}</h1>
<div class="clearfix"></div>
</section>
   {!! Form::model($conteudo,['route'=>['admin.paginas.update',$sessao->slug_sessao,$conteudo->id],'id'=>'formPaginas']) !!}
  @include('painel.paginas._form')
    <div class="footerActions">
     <div class="list-action ">
      <div class="row">
         <div class="col-4 text-left ">
           <button type="button" class="btn btn-flat btn-default" data-action="sair">Sair</button>
        </div>
        <div class="col-8">
          <button type="button" class="btn btn-flat btn-primary" data-action="salvar_sair">Salvar e Sair</button>
          <button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
@endsection
@section('pos-script')
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
    $('#uploadArquivos' ).on('change', function() {
          $(".carregandoDestaque").show(0);
          var data = new FormData();
          console.log($("input[id='uploadArquivos']")[0].files);
            $.each($("input[id='uploadArquivos']")[0].files, function(i, file) {
                  data.append('file[]', file);
            });
          $.ajax({
            url: '{{route("admin.ajax.upload-foto")}}',
           type: 'POST',
          cache: false,
          contentType: false,
          processData: false,
          data : data,
          success: function(result){
             $.each(result, function (index, value) {
              var html = '';
              html +='<li>';
              html +='<input type="hidden" name="arquivo" value="'+value+'" />';
              html +='<a href="#" class="remove" data-file="'+value+'">';
              html +='<i class="fas fa-times"></i> ';
              html += '</a>';
              html +='<img src="{{URL::to('/')}}/img/'+value+'" alt="">';
          html +='</li>';
            $('#preview ul').html(html);
                //console.log(value);
            });
             $(".carregandoDestaque").hide(0);
             $("#cardImage").slideDown();
          }
          } );
        });
        $("#preview").on('click','.remove',function(e){
          e.preventDefault();
          $(this).parent().addClass("del")
          $.get("{{route('admin.ajax.delete-foto')}}",{name: $(this).data("file")},function(data){
            if(data == 1){
              $(".del").remove();
               $("#cardImage").slideUp();
            }
          })
        })
                $('#datetimepicker1,#datetimepicker2').datetimepicker({
                   locale: 'pt-BR',
                   format: 'DD/MM/YYYY HH:mm:ss',
                    icons: {
                      time: 'far fa-clock',
                      date: 'far fa-calendar',
                }
                });
            $('#uploadArquivosGaleria' ).on('change', function() {
    $("#carregandoGaleria").show(0);
    var data = new FormData();
    $.each($("input[id='uploadArquivosGaleria']")[0].files, function(i, file) {
      data.append('file[]', file);
    });
    data.append('conteudo_id', '{{$conteudo->id}}');
    $.ajax({
      url: '{{route("admin.ajax.upload-galeria")}}',
      type: 'POST',
      cache: false,
      contentType: false,
      processData: false,
      data : data,
      success: function(result){
       $.each(result, function (index, value) {
        var html = '';
         html +=' <tr>';
                html +='<td></td>';
               html += '<td><input type="hidden" class="ordemGaleria" name="ordem[]" value=""><input type="hidden" name="fotos[]" value="'+value+'" />';
               html +=   '<img src="{{URL::to('/')}}/img/galeria/'+value+'" style="max-height: 50px" alt=""></td>'
               html +=   '<td> ';
                 html +=   '<a href="" class="btn btn-danger  remove "  data-file="'+value+'">'
                 html +=     '<i class="far fa-trash-alt"></i>';
                 html +=   '</a>';
                 html += '</td>';
              html +=  '</tr>';
        $('.ordenar').append(html);
        console.log(value);
      });
        $("#carregandoGaleria").hide(0);
     }
   });
  });
         $("#previewGaleria").on('click','.remove',function(e){
          e.preventDefault();
          $(this).closest('tr').addClass("del")
          $.get("{{route('admin.ajax.delete-galeria')}}",{name: $(this).data("file")},function(data){
            if(data.status == "deletado"){
             $("#previewGaleria").find(".del").remove();
           }
         })
  })
 $("#formPaginas").submit(function(e) {
          $(".ordenar tr").each(function( index ) {
             $(this).find('.ordemGaleria').val(index)
          });
            var url =  $("#formPaginas").attr('action'); // the script where you handle the form input.
            $.ajax({
             type: "POST",
             url: url,
                   data: $("#formPaginas").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                   // console.log(data)
                  swal("Sucesso!", "Página alterada com sucesso!", "success");
                  }
                });
            e.preventDefault(); // avoid to execute the actual submit of the form.
          });
$("input[name='titulo_conteudo']").change(function(){
 $.ajax({
             type: "POST",
             url: "{{route('admin.ajax.checkSlug')}}",
                   data: {
                    'slug':$("input[name='slug_conteudo']").val(),
                    'sessao':'{{$sessao->slug_sessao}}',
                   },
                   success: function(data)
                   {
                    $("input[name='slug_conteudo']").val(data);
                  }
                });
})
$("input[name='titulo_conteudo']").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("input[name='slug_conteudo']").val(Text);
});
});
 $(document).ready(function(){
    $(".list-action").on('click','button',function(e){
      e.preventDefault();
      var action = $(this).data('action');
      var form = $(this).closest('form').attr('id');
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
        $.post($("#"+form).attr('action'),$("#"+form).serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
              });
              window.location.href = "{{route('admin.paginas.banners.list',$sessao->slug_sessao)}}";
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }else if(action == 'salvar'){
        $.post($("#"+form).attr('action'),$("#"+form).serialize(),function(data,error){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
                timer:3000,
              });
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }
    })
  })
 @foreach($arrayComp as $item)
      $('input[name="categoria[]"][value="{{$item}}"]').attr('checked', true);
     @endforeach
</script>
@endsection
