@extends('layouts.painel')
@section('pre-assets')
<style>
    section{
    position: relative;
  }
  .list-move {
    position: absolute;
    left: -30px;
    cursor: move;
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .center-form{
    width: 1000px;
    margin: 0 auto;
  }
  .categorias{
    list-style: none;
    padding-left: 8px;
  }
  .categorias li{
    padding:10px 5px;
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
  .note-editable{
  min-height:300px;
}
</style>
@endsection
@section('content')
<section class="col-sm-12 mt-5 mb-3">
    <div class="col">
        <h4><b>Section: {{ucfirst($section->title)}}</b></h4>
    </div>
</section>
{!! Form::model($content,['route'=>['admin.contents.update',['slug'=>$section->slug,'id'=> $content->id]],'id'=>'form']) !!}
@include('painel.contents._form')
{!! Form::close() !!}
@endsection
@section('pos-script')
<script src="https://johnny.github.io/jquery-sortable/js/jquery-sortable.js"></script>
<script>
  $(document).ready(function() {
    $( ".ordenar" ).sortable({
        cancel:'.remover',
        update: function( event, ui ) {
           $(".ordenar li").each(function(index){
             $(this).find('.ordemGaleria').val(index)
          });
        }
      });
      $("body").on('click','.previewGaleria .remove',function(e){
      e.preventDefault();
      $(this).closest('li').remove();
    });
$("body").on('click','.removeItem',function(e){
  e.preventDefault();
  var name = $(this).closest('ul').find('input').attr('name');
  $(this).closest('ul').html('<input type="hidden" name="'+name+'" value="" />')
});
$("body").on('click','.removeItemGaleria',function(e){
  e.preventDefault();
 
  $(this).closest('li').remove();
});
$("body").on('click','.delteSection',function(e){
  e.preventDefault();
$(this).closest('section').addClass('remove-section');
  swal({
        title: "Are you sure?",
        text: "",
        icon: "warning",
        dangerMode: true,
        buttons:{
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "",
            closeModal: true,
          },
          confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "",
            closeModal: true
          }
        }
      }) .then(willDelete => {
       if (willDelete) {
            $(this).closest('section').remove();
        }
     });
});
    $("body").on('click','#addBlockContent',function(e){
      e.preventDefault();
      $("body,html").animate({
        scrollBottom: 0,
      },500)
      $.get('{{route("admin.contents.getNewblock",["slug"=>$section->slug,"id"=>$content->id])}}',function(data){
        $("#targetNewBlock").append(data.html);
        getinitEditor();
        $('.my-colorpicker2').colorpicker()
        $(".note-editable").css({'height':'300px'});
        /*$("#targetNewBlock section").each(function( index ) {
          $(this).find('input[name="block[id][]"]').val(index)
          $(this).find('textarea[name="block[block][]"]').attr('id','editor_'+index)
          $(this).find('input[name="block[status_][]"]').attr('name','block[status_'+index+'][]')
          $(this).find('input[name="block[featured_][]"]').attr('name','block[featured_'+index+'][]')
          $(this).find('input[name="block[align_image_][]"]').attr('name','block[align_image_'+index+'][]')
        });*/
        $( ".ordenar" ).sortable({
        cancel:'.remover',
        update: function( event, ui ) {
           $(".ordenar li").each(function( index ) {
             $(this).find('.ordemGaleria').val(index)
          });
        }
      });
      });
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
      });
    })
    /*
    $( "#targetNewBlock" ).sortable({
      cancel:'.remover',
      handle: '.iconMove',
      update: function( event, ui ) {
        $("#targetNewBlock section").each(function( index ) {
         $(this).find('input[name="block[order][]"]').val(index)
       });
      }
    });*/
      function moveUp(item) {
      var prev = item.prev();
      if (prev.length == 0)
          return;
      prev.css('z-index', 999).css('position','relative').animate({ top: item.height() }, 250);
      item.css('z-index', 1000).css('position', 'relative').animate({ top: '-' + prev.height() }, 300, function () {
          prev.css('z-index', '').css('top', '').css('position', '');
          item.css('z-index', '').css('top', '').css('position', '');
          item.insertBefore(prev);
          getinitEditor();
      });
    }
    function moveDown(item) {
        var next = item.next();
        if (next.length == 0)
            return;
        next.css('z-index', 999).css('position', 'relative').animate({ top: '-' + item.height() }, 250);
        item.css('z-index', 1000).css('position', 'relative').animate({ top: next.height() }, 300, function () {
            next.css('z-index', '').css('top', '').css('position', '');
            item.css('z-index', '').css('top', '').css('position', '');
            item.insertAfter(next);
              getinitEditor();
        });
    }
    $("#targetNewBlock").sortable({ 
      items: "section", 
      distance: 10,
       handle: '.list-move',
      update: function( event, ui ) {
        $("#targetNewBlock section").each(function( index ) {
         $(this).find('input[name="block[order][]"]').val(index)
       });
      }
     });
$('body').on('click','.list-move button',function() { 
    var btn = $(this);
    var val = btn.val();
for(name in CKEDITOR.instances)
{
    var element = CKEDITOR.instances[name].element.getId();
    var value = CKEDITOR.instances[name].getData();
    $("#"+element).val(value)
    CKEDITOR.instances[name].destroy(true);
}
      $("textarea").not(":visible").fadeIn('fast')
    if (val == 'up')
        moveUp(btn.parents('.OrderingField'));
    else
        moveDown(btn.parents('.OrderingField'));
});
  });
  $(document).ready(function() {
 $("body").on('click','#form #btnSend',function(e) {
for(name in CKEDITOR.instances)
{
    var element = CKEDITOR.instances[name].element.getId();
    var value = CKEDITOR.instances[name].getData();
    $("#"+element).val(value)
}
  $("section").each(function( index ) {
             $(this).find('input[name="block[order][]"]').val(index)
          });
    e.preventDefault();
     $("input[type='text'],label").removeClass('is-invalid');
    if(!document.getElementById('form').checkValidity()){
      swal("Atention!", "Invalid required fields", "warning");
      $("input[required='true'][type='text']").each(function(e){
        if($(this).val() == ""){
            $(this).addClass('is-invalid');
        }else{
            $(this).removeClass('is-invalid');
        }
      })
      $("input[type='radio'][required]").each(function(e){
        if(!$(this).is(':checked')){
          $(this).closest('label').addClass('is-invalid')
        }else{
           $(this).closest('label').removeClass('is-invalid');
        }
      })
      return false
    }
      //$(".btn-success").attr('disabled',true)
        e.preventDefault();
        var url = $("#form").attr('action'); // the script where you handle the form input.
        $.ajax({
               type: "POST",
               url: url,
               data: $("#form").serialize(), // serializes the form's elements.
               success: function(data){
                   console.log(data)
                   $(".btn-success").attr('disabled',false);
                    if(data.error != 0){
                      swal("Atention!", data.msg, "warning");
                   }else{
                   swal({
                      title: "Success!",
                      text: data.msg,
                      icon: "success",
                      dangerMode: false,
                        buttons:{
                            cancel: {
                              text: "Back for list",
                              value: null,
                              visible: true,
                              className: "",
                              closeModal: true,
                            },
                            confirm: {
                              text: "Continue editing",
                              value: true,
                              visible: true,
                              className: "",
                              closeModal: true
                            }
                          }
                    }) .then(confirm => {
                      if (!confirm) {
                       window.location = "{{route('admin.contents.list',['slug'=>$section->slug])}}"
                      }
                  });
                    }
               },error:function(data){
                 swal("Atention!", 'Server Error', "error");
                $(".btn-success").attr('disabled',false);
               }
             });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
  });
</script>
@endsection