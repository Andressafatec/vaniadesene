<section class="OrderingField">
   <hr>
   <ul class="list-move">
     <li><button type="button" class="btn btn-xs btn-secondary" value='up' ><i class="fas fa-chevron-up"></i></button></li>
     <li><button type="button" class="btn btn-xs btn-secondary" value='down' ><i class="fas fa-chevron-down"></i></button>
</li>
   </ul>
   <input type="hidden" name="block[id][]"  value="{{@$item->id}}">
   <input type="hidden" name="block[order][]" value="{{@$item->order}}">
   <div class="row">
    <div class="col-9 col-lg-9">
      <div class="">
        {!! Form::label('Texto','Texto:') !!}
        <textarea name="block[block][]" id="editor_{{@$item->id}}" class="form-control summernote">{!!@$item->text!!}</textarea>
      </div>
     
    </div>
    <div class="m-t"></div>
    <div class="col-3 col-lg-3 p-sm-3">
      <div class="form-group col-sm-6">
        <label >Status:</label><div class="clearfix"></div>
        <label >
          <input type="radio" name="block[status_{{@$item->id}}][]"  required=""   value="1" class="flat-red" @if(@$item->status == '1' || @$item === null) checked="" @endif >
          Yes
        </label>
        <label>
          <input type="radio" name="block[status_{{@$item->id}}][]"  required=""  value="0" class="flat-red" @if(@$item->status == '0') checked="" @endif>
          No
        </label>
      </div>
      <br>
      <div class="m-t clearfix"></div>
      <div class="form-group @if(strpos(request()->fullUrl(), 'noticias')) hidden @endif" >
        <label>Largura da Sessão:</label>
        <select name="block[section_width][]" class="form-control" id="">
          <option value="">Select</option>

          @for($i = 1; $i<= 12; $i++)
          <option value="col-sm-{{$i}}" @if(@$item->section_width == "col-sm-".$i) selected @endif>{{$i}}/12 </option>
          @endfor
        
        </select>
        <!-- /.input group -->
      </div>
      <div class="form-group @if(strpos(request()->fullUrl(), 'noticias')) hidden @endif">
        <label>Cor de Fundo:</label>
        <div class="input-group my-colorpicker2">
          <input type="text" name="block[bg_color][]" autocomplete="off" value="{{@$item->bg_color}}" class="form-control">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-square" style="color: {{@$item->bg_color}}"></i></span>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group @if(strpos(request()->fullUrl(), 'noticias')) hidden @endif" >
        <label>Largura da Coluna Texto:</label>
        <select name="block[column][]" class="form-control" id="">
          <option value="">Select</option>
          @for($i = 1; $i<= 12; $i++)
          <option value="col-sm-{{$i}}" @if(@$item->column == "col-sm-".$i) selected @endif>{{$i}}/12 </option>
          @endfor
         
        </select>
        <!-- /.input group -->
      </div>
      
      <div class="m-t"></div>
      <div class="form-group col-12 ">
        <label for="exampleInputFile">Imagem</label>
<small>(imagem usada no conteúdo)</small>
        <button class="btn btn-primary btn-block openPopUpMedia" data-target="dynamyc" >
          <div  class="carregando" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Carregando...</span></div>
          <i class="fa fa-cloud-upload" aria-hidden="true"></i> Selecionar Imagem
        </button>
        <div class="col-12">
          <div class="preview_image">
            <ul>
              @if(@$item->media_id != null)
              <li>
                <input type="hidden" name="media_id[]" value="{{@$item->media->id}}" />
                <a href="#" class="removeItem">
                  <i class="fas fa-times"></i> 
                </a>
                 @if(@$item->media->checkType() == "image")
                  <img src="{{@$item->media->fullpatch()}}" alt=""><Br>
                  @elseif($item->media->checkType() == "video")
                  <video style="width: 100%;"  controls>
                    <source src="{{@$item->media->fullpatch()}}" type="video/{{$item->media->type}}">
                  Your browser does not support the video tag.
                  </video>
                @endif
                <Br>
              </li>
              @else
              <li>
               <input type="hidden" name="media_id[]" value="" />
               </li>
              @endif
            </ul>
          </div>
        </div>
<div class="col-12 m-top-sm alignImage"  @if(@$item->media_id === null) style="display:none" @endif>
<div class="form-group @if(strpos(request()->fullUrl(), 'noticias')) hidden @endif" >
        <label>Largura da Coluna Imagem:</label>
        <select name="block[column_image][]" class="form-control" id="">
          <option value="">Select</option>
          @for($i = 1; $i<= 12; $i++)
          <option value="col-sm-{{$i}}" @if(@$item->column_image == "col-sm-".$i) selected @endif>{{$i}}/12 </option>
          @endfor
          
        </select>
        <!-- /.input group -->
      </div>

                <label for="">Alinhamento imagem:</label><br>
                <div class="col-sm-4 p-0">
                  <input type="radio" class="flat-red" name="block[align_image_{{@$item->id}}][]" id="" value="none"
                    @if(@$item->align_image == 'none' || @$item->align_image === null) checked="" @endif> <i class="fa fa-align-justify"
                    aria-hidden="true"></i> Nenhum
                </div>
                <div class="col-sm-4 p-0">
                  <input type="radio" class="flat-red" name="block[align_image_{{@$item->id}}][]" value="left" @if(@$item->align_image ==
                  'left') checked="" @endif> <i class="fa fa-align-left" aria-hidden="true"></i> Esquerda
                </div>
                <div class="col-sm-4 p-0">
                  <input type="radio" class="flat-red" name="block[align_image_{{@$item->id}}][]" value="right" @if(@$item->align_image ==
                  'right') checked="" @endif> <i class="fa fa-align-right" aria-hidden="true"></i> Diretia
                </div>
              </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-12 mt-3 @if(strpos(request()->fullUrl(), 'noticias')) hidden @endif">
        <div class="form-group">
          <label for="">ID Linha</label>
          <input type="text" class="form-control" name="block[id_row][]" value="{{@$item->id_row}}">
        </div>
        <div class="form-group">
          <label for="">Class Linha</label>
          <input type="text" class="form-control" name="block[class_row][]" value="{{@$item->class_row}}">
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
  <div class="col-sm-12">
  <div class="card">
        <div class="card-header">
          <label for="">Galeria de Fotos</label>
        </div>
        <div class="card-body">
          <div class="col-4">
            <button class="btn btn-primary btn-block openPopUpMedia" data-target="galeriaBlock">
              <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGENS
            </button>
          </div>
          <div  class="col-12 col-12 m-top-md previewGaleria">
           
           
            <div class=" col-12  col-12">
              <!-- /.card-header -->
              <div class=" no-padding">

              <ul class="ordenar">
              
              @if(@$item->galeria !== null && @$item->galeria->count() > 0)
             
              @foreach($item->galeria as $k => $itemGalery)
              <li>
                <input type="hidden" name="galeria_id[{{@$item->id}}][]" value="{{@$itemGalery->media->id}}" />
                <input type="hidden" class="ordemGaleria" name="ordemGaleria[{{@$item->id}}][]" value="{{$itemGalery->ordem}}">
                  <a href="" class="btn btn-danger btn-xs  removeItemGaleria " data-file="{{$itemGalery->id}}">
                         <i class="fas fa-trash-alt"></i>
                        </a>
                 @if(@$itemGalery->media->checkType() == "image")
                  <img src="{{@$itemGalery->media->fullpatch()}}" alt=""><Br>
                  @elseif($itemGalery->media->checkType() == "video")
                  <video style="width: 100%;"  controls>
                    <source src="{{@$itemGalery->media->fullpatch()}}" type="video/{{$itemGalery->media->type}}">
                  Your browser does not support the video tag.
                  </video>
                @endif
              
              </li>
              @endforeach
              @else
              </ul>
               
              </div>
            </div>
           
            
            @endif
          </div>
        </div>
      </div>
      </div>
  </div>
  <div class="row">
  <div class="col">
  <a href="" class="btn btn-xs btn-danger delteSection">Remover Sessão</a>
  </div>
  </div>
</section>