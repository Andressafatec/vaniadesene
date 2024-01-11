@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
<section class="content-header m-bottom-lg">
<h1> Editar</h1>
<div class="clearfix"></div>
</section>
   {!! Form::model($conteudo,['route'=>['admin.paginas.update',$sessao->slug_sessao,$conteudo->id],'id'=>'formPaginas']) !!}
  @include('painel.paginas._form')
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
</script>
@endsection
