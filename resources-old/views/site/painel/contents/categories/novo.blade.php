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

  padding:5px 0;

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

.nav-tabs{

  width: 15%;

}

</style>

@endsection

@section('content')

<section class="col-sm-12 mt-5 mb-3">

    <div class="col-10">

        <h4><b>Sessão: {{ucfirst($section->title)}}</b></h4>

    </div>

</section>

   {!! Form::model(null,['route'=>['admin.categories.store',['slug'=>$section->slug]],'id'=>'form']) !!}

  @include('painel.contents.categories._form')

  {!! Form::close() !!}

@endsection

@section('pos-script')

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

  $(document).ready(function() {

    $( ".ordenar" ).sortable({

        cancel:'.remover',

        update: function( event, ui ) {

           $("section").each(function( index ) {

             $(this).find('input[name="block[order][]"]').val(index)

          });

        }

      });

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

    $("#form").submit(function(e) {
      for(name in CKEDITOR.instances)
{
    var element = CKEDITOR.instances[name].element.getId();
    var value = CKEDITOR.instances[name].getData();
    $("#"+element).val(value)
    CKEDITOR.instances[name].destroy(true);
}
      $(".btn-success").attr('disabled',true);

        e.preventDefault();

         $("section").each(function( index ) {

             $(this).find('input[name="block[order][]"]').val(index)

          });

        var url = $(this).attr('action'); // the script where you handle the form input.

        $.ajax({

               type: "POST",

               url: url,

               data: $("#form").serialize(), // serializes the form's elements.

               success: function(data){

                   console.log(data)

                   $(".btn-success").attr('disabled',false);

                   swal({

                      title: "Sucesso!",

                      text: data.msg,

                      icon: "success",

                      dangerMode: false,

                        buttons:{

                            cancel: {

                              text: "Não, obrigado",

                              value: null,

                              visible: true,

                              className: "",

                              closeModal: true,

                            },

                            confirm: {

                              text: "Sim, por favor",

                              value: true,

                              visible: true,

                              className: "",

                              closeModal: true

                            }

                          }

                    }) .then(confirmar => {

                      if (confirmar) {

                        window.location = "{{route('admin.categories.new',['slug'=>$section->slug])}}"

                      }else{

                        window.location = "{{route('admin.categories.list',['slug'=>$section->slug])}}"

                      }

                  });

               },error:function(data){

                $(".btn-success").attr('disabled',false);

               }

             });

        e.preventDefault(); // avoid to execute the actual submit of the form.

    });

     $("#formNewCategory").submit(function(e) {

      $(".btn-success").attr('disabled',true);

        e.preventDefault();

        var url = $(this).attr('action'); // the script where you handle the form input.

        $.ajax({

               type: "POST",

               url: url,

               data: $("#formNewCategory").serialize(), // serializes the form's elements.

               success: function(data){

                   console.log(data)

                  $('selec[name="category[]"]').select2('destroy');

               },error:function(data){

               }

             });

        e.preventDefault(); // avoid to execute the actual submit of the form.

    });

  })

</script>

@endsection