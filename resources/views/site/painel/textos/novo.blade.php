@extends('layouts.painel')
@section('pre-assets')
<style>
.center-form{
  width: 1000px;
  margin: 0 auto;
}
</style>
@endsection
@section('content')
<section class="content-header m-bottom-lg">
<div class="clearfix"></div>
</section>
   {!! Form::model(null,['route'=>['admin.textos.store'],'id'=>'formTools']) !!}
  @include('painel.textos._form')
  {!! Form::close() !!}
@endsection
@section('pos-script')
  <script src="{{asset('/img/flags/country-codes-case-lower.json')}}"></script>
<script>
   $(document).ready(function(){
    $(".country").select2({
          templateResult: formatState,
          templateSelection: formatState
      });
      function formatState (opt) {
          if (!opt.id) {
              return opt.text.toUpperCase();
          } 
          var optimage = $(opt.element).attr('data-image'); 
          console.log(optimage)
          if(!optimage){
             return opt.text.toUpperCase();
          } else {                    
              var $opt = $(
                 '<span><img src="' + optimage + '" width="60px" /> ' + opt.text.toUpperCase() + '</span>'
              );
              return $opt;
          }
      };
    $("body").on('click','#formTools #btnSend',function(e) { 
    e.preventDefault();
     $("input[type='text'],label").removeClass('is-invalid');
    if(!document.getElementById('formTools').checkValidity()){
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
      $(".btn-success").attr('disabled',true)
        e.preventDefault();
        var url = $("#formTools").attr('action'); // the script where you handle the form input.
        $.ajax({
               type: "POST",
               url: url,
               data: $("#formTools").serialize(), // serializes the form's elements.
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
                    }) .then(confirmar => {
                       window.location = "{{route('admin.textos.index')}}"
                  });
                    }
               },error:function(data){
                $(".btn-success").attr('disabled',false);
               }
             });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
  })
</script>
@endsection