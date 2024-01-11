@extends('layouts.painel')
@section('pre-assets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('adminLTE/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
@endsection
@section('content')
<section class="content-header m-bottom-lg">
  <style>
    .footerActions {
      position: fixed;
      width: calc(100% - 73px);
      background: #fff;
      z-index: 100;
      bottom: 0;
      left: 73px;
      opacity: 0.5;
    }
    .footerActions:hover {
      opacity: 1;
    }
    .content-wrapper>.content {
      padding-bottom: 100px;
    }
    .list-action {
      padding: 10px;
    }
  </style>
  <div class="clearfix"></div>
</section>
{!! Form::model(null,['route'=>['admin.banners.store'],'id'=>'form']) !!}
@include('painel.banners._form')
{!! Form::close() !!}
@endsection
@section('pos-script')
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('adminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".card-footer").on('click', 'button', function(e) {
      e.preventDefault();
      var action = $(this).data('action');
      var form = $(this).closest('form');
      if (action == 'cancelar') {
        swal({
          title: "Tem certeza?",
          text: "As alterações no formulário seram perdidas",
          icon: "warning",
          dangerMode: false,
          buttons: {
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
        }).then(confirmar => {
          if (confirmar) {
            window.location = "{{route('admin.banners.list')}}"
          }
        });
      } else if (action == 'salvar') {
        $.post($(form).attr('action'), $(form).serialize(), function(data, error) {
          if (data.erro == '0') {
            swal({
              title: "Sucesso!",
              text: data.msg,
              icon: "success",
              button: false,
              timer: 3000,
            });
            // document.getElementById("formPaginas").reset();
            $('#form')[0].reset();
          } else {
            swal("Atenção!", data.msg, "info");
          }
        })
      }
    });
  });
  $(document).ready(function() {
    $('#uploadArquivos').on('change', function() {
      $("#carregandoForm").show(0);
      var data = new FormData();
      $.each($("input[type='file']")[0].files, function(i, file) {
        data.append('file[]', file);
      });
      $.ajax({
        url: '{{route("admin.ajax.banner-upload-foto")}}',
        type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        success: function(result) {
          console.log(result)
          $("input[name='img_fundo']").attr("disabled", false)
          $("#preview .imgBanner").html('<img src="{{URL::to(' / ')}}/img/banners/' + result[0] + '" alt="">')
          $("#carregandoForm").hide(0);
          $("#arquivo").val(result[0]);
        }
      });
    });
    $("body").on('click','.remove',function(e){
  e.preventDefault();
  var name = $(this).closest('ul').find('input').attr('name');
  $(this).closest('ul').html('<input type="hidden" name="'+name+'" value="" />')
});
    $("input[name='img_fundo']").click(function() {
      if ($(this).is(":checked")) {
        $("#preview").css("background", 'url(' + $(".imgBanner img").attr('src') + ')');
        $(".imgBanner").hide();
        $("#background-size").attr("disabled", false)
        $(".imgBanner").css({
          'position': 'absolute',
          'height': 'auto',
          'width': '100%',
          'z-index': '0'
        })
      }
      if (!$(this).is(":checked")) {
        $("#background-size").attr("disabled", true)
        $(".imgBanner").css({
          'position': 'relative',
          'height': 'auto',
          'width': '100%',
        })
      }
    })
    $("input[name='remover-texto']").click(function() {
      if ($(this).val() == "sim") {
        banners.list
        $(".contentPreview").hide();
      }
      if ($(this).val() == "nao") {
        $(".contentPreview").show();
      }
    })
    $(".my-colorpicker2").colorpicker().on('changeColor.colorpicker', function(event) {
      $("#preview").css('background-color', event.color.toHex());
    });
    $(".my-colorpicker3").colorpicker().on('changeColor.colorpicker', function(event) {
      $("#preview .contentPreview").css('color', event.color.toHex());
      $("#preview .contentPreview a").css('color', event.color.toHex());
    });
    $(".my-colorpicker4").colorpicker().on('changeColor.colorpicker', function(event) {
      console.log(event.color)
      $("#preview .contentPreview").css('background-color', event.color);
    });
    $(".propriedade").change(function() {
      var value = $(this).val();
      var param = $(this).find(':selected').data("param");
      var alvo = $(this).data("alvo");
      if (param == "left" || param == "right" || param == "top" || param == "bottom") {
        if (param == "left") {
          $(alvo).css({
            "left": value,
            "right": ""
          });
        }
        if (param == "right") {
          $(alvo).css({
            "right": value,
            "left": ""
          });
        }
        if (param == "top") {
          $(alvo).css({
            "top": value,
            "bottom": ""
          });
        }
        if (param == "bottom") {
          $(alvo).css({
            "bottom": value,
            "top": ""
          });
        }
        $(alvo).css(param, value);
      } else {
        $(alvo).css(param, value);
      }
    })
    $("#estilo_botao").change(function() {
      var value = $(this).val();
      $(".contentPreview .botao a").attr('class', value);
    })
    $("#titulo").keyup(function() {
      $("#preview .contentPreview .titulo").html($(this).val())
    })
    $("#label-link").keyup(function() {
      $("#preview .contentPreview .botao").html('<a href="' + $("#link").val() + '" class="' + $("#estilo_botao").val() + '">' + $(this).val() + '</a>')
    });
    $("#descricao").keyup(function() {
      $("#preview .contentPreview .texto").html($(this).val())
    });
    $("#removerFundo").click(function() {
      $(".contentPreview").css({
        "background": ""
      });
      $("#cor-fundo-texto").val('')
    })
    $("#link").keyup(function() {
      if ($("#label-link").val() == "") {
        $("#preview .contentPreview .botao").html('<a href="' + $("#link").val() + '" class="' + $("#estilo_botao").val() + '" >' + $("#link").val() + '</a>')
      } else {
        $("#preview .contentPreview .botao a").attr('href', $("#link").val());
      }
    });
    $(".linkFull").change(function(e) {
      if ($(this).is(":checked")) {
        $("#label-link").attr('disabled', true);
        $("#preview").append('<a href="' + $("#link").val() + '" style="position:absolute; left:0; top:0; width:100%; height:100%;" class="linkAll"></a>');
        $("#preview .contentPreview .botao").hide();
      }
      if (!$(this).is(":checked")) {
        $("#label-link").attr('disabled', false);
        $("#preview .contentPreview .botao").show();
        $('a.linkAll').remove();
      }
    })
    $("#btSalvar").click(function() {
      var style_texto = $(".contentPreview").attr('style');
      $("#style_texto").val(style_texto);
      var style_bg = $(".previewBanner").attr('style');
      $("#style_bg").val(style_bg);
      if ($(".linkFull").is(":checked")) {
        var style_link = $(".linkAll").attr('style');
        $("#style_link").val("style='" + style_link + "'");
      } else {
        var style_link = $(".previewBanner .botao a").attr('class');
        $("#style_link").val("class='" + style_link + "'");
      }
      $.post('{{route("admin.banners.store")}}', $("#formBanner").serialize(), function(response) {
        console.log(response);
        swal("Banner criado com sucesso!", {
            icon: 'success',
            buttons: {
              cancel: "Voltar",
              catch: {
                text: "Criar novo",
                value: "novo",
              }
            },
          })
          .then((value) => {
            switch (value) {
              case "novo":
                window.location = "{{route('admin.banners.novo')}}";
                break;
              default:
                window.location = "{{route('admin.banners.list')}}";
                break;
            }
          });
      })
    })
  });
</script>
@endsection