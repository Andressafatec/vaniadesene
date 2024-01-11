<section class="col-12">
  <div class="align-nav">
    <div class="row">
      <div class="col-xs-12 ">
        <nav>
          <div class="nav nav-tabs " id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="details" data-toggle="tab" href="#details1" role="tab" aria-controls="details" aria-selected="true">Detalhes</a>
          </div>
          <div class="clearfix"></div>
        </nav>
      </div>
    </div>
  </div>
  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane show fade active" id="details1" role="tabpanel" aria-labelledby="details">
      <div class="card p-5">
        <div class="row">
          <div class="col-8">
            <div class="form-group ">
              {!! Form::label('Titulo','Titulo:') !!}
              {!! Form::text('title',null,['class'=>'form-control', 'required'=>"true"]) !!}
            </div>
          </div>
          <div class="form-group col-4">
            <label >Status</label><div class="clearfix"></div>
            <label >
              <input type="radio" name="status"  value="1" class="flat-red" @if(@$category->status == '1') checked="" @endif >
              Ativo
            </label>
            <label>
              <input type="radio" name="status" value="0" class="flat-red" @if(@$category->status == '0') checked="" @endif>
              Inativo
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              {!! Form::label('Texto','Texto:') !!}
              {!! Form::textarea('text',null,['class'=>'form-control summernote','id'=>'textcategory']) !!}
            </div>
          </div>
          <div class="col-4">
            {!! Form::label('Categoria Pai','Categoria Pai:') !!}
            <div class="coluna-flex">
              <ul class="categorias">
                @if($categories->count() == 0)
                <li>No categories found</li>
                @endif
                @foreach($categories as $key => $cat)
                     <li> <input type="radio" name="parent_id" value="{{$cat->id}}" class="flat-red"> {{$cat->title}} </li>
                     @foreach($cat->children as $key => $cat_2)
                      <li class="pl-2"> | - <input type="radio" name="parent_id" value="{{$cat_2->id}}" class="flat-red"> {{$cat_2->title}} </li>
                        @foreach($cat_2->children as $key => $cat_3)
                           <li class="pl-4"> | - <input type="radio" name="parent_id" value="{{$cat_3->id}}" class="flat-red"> {{$cat_3->title}} </li>
                           @foreach($cat_3->children as $key => $cat_4)
                            <li class="pl-5"> | - <input type="radio" name="parent_id" value="{{$cat_4->id}}" class="flat-red"> {{$cat_4->title}} </li>
                          @endforeach
                        @endforeach
                     @endforeach
                @endforeach
              </ul>
            </div>
            <label for="exampleInputFile">Imagem</label>
                <button class="btn btn-primary btn-block openPopUpMedia" data-target="destaque" >
                  <div  class="carregando" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
                  <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM
                </button>
            <div class="col-12">
              <div id="preview">
                <ul>
                  @if(@$category->media_id != null)
                  <li>
                    <input type="hidden" name="media_id" value="{{@$category->media->id}}" />
                    <a href="#" class="remove" data-file="{{@$category->media->id}}">
                      <i class="fas fa-times"></i> 
                    </a>
                    <img src="{{@$category->media->fullpatch()}}" alt=""><Br>
                    <small>{{@$category->media->file}}</small>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
          <hr>
    <div class="row">
      <div class="col-6 ">
        <a href="{{route('admin.categories.list',['slug'=>$section->slug])}}" class="btn btn-flat btn-default" data-action="cancelar">Cancelar</a>
      </div>
      <div class="col-6">
        <button type="submit" class="btn btn-flat btn-success pull-right" data-action="save">Salvar</button>
      </div>
    </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</div>
</div>
</section>