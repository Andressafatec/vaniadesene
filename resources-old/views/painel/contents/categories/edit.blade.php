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

.categorias li{

  padding:5px;

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

    top: 0;

    right: 15px;

}

.btn-media{

  width: 21%;

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

</style>

@endsection

@section('content')

<section class="col-sm-12 mt-5 mb-3">

    <div class="col-10">

        <h4><b>Section: {{ucfirst($section->title)}}</b></h4>

    </div>

</section>

   {!! Form::model($category,['route'=>['admin.categories.update',['slug'=>$section->slug, 'id'=>$category->id]],'id'=>'form']) !!}

  @include('painel.contents.categories._form')

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

    data.append('category_id', '{{$category->id}}');

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

 $("#form").submit(function(e) { 
  for(name in CKEDITOR.instances)
{
    var element = CKEDITOR.instances[name].element.getId();
    var value = CKEDITOR.instances[name].getData();
    $("#"+element).val(value)
    CKEDITOR.instances[name].destroy(true);
}
          $(".ordenar tr").each(function( index ) {

             $(this).find('.ordemGaleria').val(index)

          });

            var url =  $("#form").attr('action'); // the script where you handle the form input.

            $.ajax({

             type: "POST",

             url: url,

                   data: $("#form").serialize(), // serializes the form's elements.

                   success: function(data)

                   {

                  swal("Sucesso!", "Página alterada com sucesso!", "success");

                  }

                });

            e.preventDefault(); // avoid to execute the actual submit of the form.

          });

});

</script>

@endsection