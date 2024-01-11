@extends('layouts.site')


@section('title',$content->title)



@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<style>
  
  .gallery {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
    justify-content: center;
    margin: 0;
    padding: 0;
    gap: 25px;
}



.gallery a {
  height: 140px;
    width: 190px;
  background-size: cover;
  object-fit: cover;
  vertical-align: bottom;
}

.btn-primary{
  border: none;
  padding: 10px;
  background-color: #EB9839 !important;
  text-align: center;
  border-radius: 3px;
  box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.25);
  color: #fff;
  font-size: 16px;
  font-weight: 500 !important;
}

</style>
@endsection

  

@section('content')

<section class="container px-sm-5">
  <div class="col-12 text-center">
    <label class="textotitle"> {{ $content->title }} </label>
  </div>
<div class="row">

 


@foreach($content->blocks->where('status','1') as $key => $item)


<section class="block m-bottom-md  @if($item->text !== null) p-all-md @endif {{$item->section_width}}" @if($item->section_width == 'col-sm-12') style="background:{!!$item->bg_color!!}" @endif >

<div class="m-bottom-sm {!!$item->class_row!!}" style="background:{!!$item->bg_color!!}">

    <div @if($item->text != "") class="row" @endif>

        @if($item->media_id != "" && ($item->align_image == "none" || $item->align_image == "left"))
        <div class="text-center @if($item->align_image == 'left' ) {{$item->column_image}} @endif">
            @if($item->media->checkType() == "image")
            <img src="{{@$item->media->fullpatch()}}" alt="" style=" text-align: center;">
            @elseif($item->media->checkType() == "video")
            <video style="max-width: 100%" controls>
                <source src="{{@$item->media->fullpatch()}}" type="video/{{$item->media->type}}">

                Your browser does not support the video tag.
            </video>
            @endif
        </div>
        @endif
@if($item->text != "")
        <div class="col @if($item->align_image != 'none' && $item->align_image !== null ) {{$item->column}} @endif">
            {!!$item->text!!}
        </div>
        @endif

        @if($item->media_id != "" && $item->align_image == "right")
        <div class="{{$item->column_image}}">
            @if($item->media->checkType() == "image")
            <img src="{{@$item->media->fullpatch()}}" alt="" style=" text-align: center;">
            @elseif($item->media->checkType() == "video")
            <video style="max-width: 100%" controls>
                <source src="{{@$item->media->fullpatch()}}" type="video/{{$item->media->type}}">

                Your browser does not support the video tag.
            </video>
            @endif

        </div>
        @endif
    </div>
    <div class="clearfix"></div>
</div>

</section>



@if($item->galeria !== null && $item->galeria->count() > 0)
<div class="gallery" >

  
@foreach($item->galeria as $key => $value)

<a data-fancybox="gallery" href="{{@$value->media->fullpatch()}}" class="d-inline-block" style="background-image:url('{{@$value->media->fullpatch()}}')"> 
  </a>

   


        @endforeach

		
		</div>

@endif
@endforeach
    </section>

<div class="clearfix"></div>




          @if($isMenu !== null && $isMenu->conteudos->count() > 0)
          <div id="servicos">
            <div class="container">
              <div class="row">

                <div class="col">
                  <h2>Veja nossos serviços.</h2>
                </div>
              </div>
            
              <div class="servicos row">
             
                @foreach($isMenu->conteudos as $key => $value)

                
            @if($value->conteudo->status == "1")
                  <div class="item col-12 col-sm-4">
                  <a href="{{route('paginas',['slug'=>@$value->conteudo->slug])}}">
                      @if($value->conteudo->thumb() !== null)
                          <img src="{{$value->conteudo->thumb()}}"  alt="">
                      @else
                          <img src="{{asset('imgs/servico-1.png')}}" alt="">
                      @endif
                    <div class="title">{!!ucfirst($value->conteudo->title)!!} </div>
                    <div class="descricao">
                      {!!$value->conteudo->intro(17)!!}
                    </div>
                    <div class="saiba-mais">
                      Saber mais
                    </div>
                  </a>
                </div>
                @endif

                @endforeach


              </div>
             
            </div>
          </div>
          @endif




@endsection

@section('pos-scripts')

<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
 $(document).ready(function(){ 
			
			}); 
  $("#formContact").submit(function(e) {
    e.preventDefault();
    var url = $(this).attr('action'); // the script where you handle the form input.

    $.ajax({

      type: "POST",
      url: url,
      data: $("#formContact").serialize(), // serializes the form's elements.
      success: function(data)
      {
        console.log(data)
        if (data.status == "ok") {
          swal("Success!", "Message sent successfully", "success");
          $("#formContact")[0].reset();
        } else {
        swal("Sorry,", "error sending message", "info");
        }
        $("#form input[type='text']").val('');
      },
      error: function() {
        swal("Sorry,", "error sending message", "info");
      }

    });



    e.preventDefault(); // avoid to execute the actual submit of the form.

  });
</script>

@endsection