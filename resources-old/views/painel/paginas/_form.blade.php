<section class="col-12">
  <div class="row">
   <div class="form-group col-4 ">
    <label >Status</label><div class="clearfix"></div>
      <label >
        <input type="radio" name="status"  value="1" class="flat-red" @if(@$conteudo->status == '1') checked="" @endif >
        Ativo
      </label>
      <label>
        <input type="radio" name="status" value="0" class="flat-red" @if(@$conteudo->status == '0') checked="" @endif>
        Inativo
      </label>
  </div>
   <div class="form-group col-4 ">
    <label >Destaque</label><div class="clearfix"></div>
      <label >
        <input type="radio" name="destaque"  value="1" class="flat-red" @if(@$conteudo->destaque == '1') checked="" @endif >
        Ativo
      </label>
      <label>
        <input type="radio" name="destaque" value="0" class="flat-red" @if(@$conteudo->destaque == '0') checked="" @endif>
        Inativo
      </label>
  </div>
</div>
<div class="row">
  <div class="col-8">
</div>
<div class="col-4">
</div>
</div>
<div class="row">
  <div class="col-8">
   <div class="form-group ">
    {!! Form::label('Título','Título:') !!}
    {!! Form::text('titulo_conteudo',null,['class'=>'form-control']) !!}
     <div class="custom-input-alias">
    <span>{{URL::to('/')}}/</span> <input type="text" name="slug_conteudo" value="{{@$conteudo->slug_conteudo}}" placeholder="Apelido URL" autocomplete="off" class="slug-preview">
  </div>
  </div>
  <div class="col-12 p-all-0">
      {!! Form::label('Chamada','Chamada:') !!}
        {!! Form::textarea('chamada',null,['class'=>'summernote-basic']) !!}
    </div>
    <div class="col-12 p-all-0">
      {!! Form::textarea('texto',null,['class'=>'form-control','id'=>'summernote']) !!}
    </div>
    <div class="col-12 p-all-0">
      </div>
    </div>
    <div class="col-4">
      <div class="card card-default">
        <div class="card-body">
            <div class="form-group">
              <div class="controle" style="overflow-y: auto; max-height: 250px">
    {!! Form::label('Categoria','Categoria:') !!}
    <ul class="list-group">
      @foreach(@$categorias as $key => $cat)
        <li class="list-group-item">
          <input type="checkbox" name="categoria[]" class="flat-red" value="{{$cat->id}}"> {{$cat->nome_categoria}}
          <ul style="list-style: none">
           @foreach ($cat->children as $children1)
           <li>
               <input type="checkbox" name="categoria[]" class="flat-red" value="{{ @$children1->id }}" @if(@$categoria->parent_id == $children1->id) selected @endif> {{ $children1->nome_categoria }} </li>
               @foreach ($children1->children as $children2)
               <li>
               <input type="checkbox" name="categoria[]" class="flat-red" value="{{ @$children2->id }}" @if(@$categoria->parent_id == $children2->id) selected @endif> {{ $children2->nome_categoria }}</li>
               @foreach ($children2->children as $children3)
               <li>
               <input type="checkbox" name="categoria[]" class="flat-red" value="{{ @$children3->id }}" @if(@$categoria->parent_id == $children3->id) selected @endif> {{ $children3->nome_categoria }}</li>
               @foreach ($children3->children as $children4)
               <li>
               <input type="checkbox" name="categoria[]" class="flat-red" value="{{ @$children4->id }}" @if(@$categoria->parent_id == $children4->id) selected @endif> {{ $children4->nome_categoria }}</li>
                  @endforeach
                 @endforeach
                @endforeach
              @endforeach
              </ul>
        </li>
      @endforeach
        </ul>
  </div>
  </div>
           <div class=" form-group">
<div class=" form-group">
        <div class="col-12">
   <label >Inicio Pulicação</label>
   <div class="input-group date datetimepicker" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" name="inicio_publicacao" placeholder="00/00/0000 00:00:00" autocomplete="off" value="@if(@$conteudo){{@$conteudo->inicio_publicacao->format('d/m/Y H:i:s')}}@else{{date('d/m/Y H:i:s')}}@endif" class="form-control datetimepicker-input" name="data" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                    </div>
                </div>
</div>
        <div class="col-12">
   <label >Final Pulicação</label>
   <div class="input-group date datetimepicker" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" name="final_publicacao" placeholder="00/00/0000 00:00:00" autocomplete="off" value="{{@$conteudo->final_publicacao}}" class="form-control datetimepicker-input" name="data" data-target="#datetimepicker2"/>
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                    </div>
                </div>
</div>
            </div>
        <hr>
          <div class="form-group col-12 ">
              <label for="exampleInputFile">Icone</label>
                <button class="btn btn-primary btn-block openPopUpMedia" data-target="icone" >
                  <div  class="carregando" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
                  <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM
                </button>
            <div class="col-12">
              <div id="preview_icon">
                <ul>
                  @if(@$conteudo->icone_id != null)
                  <li>
                    <input type="hidden" name="icone_id" value="{{@$conteudo->icone->id}}" />
                    <a href="#" class="remove" data-file="{{@$conteudo->icone->id}}">
                      <i class="fas fa-times"></i>
                    </a>
                    <img src="{{@$conteudo->icone->fullpatch()}}" alt=""><Br>
                    <small>{{@$conteudo->icone->file}}</small>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
      </div>
        <hr>
          <div class="form-group col-12 ">
              <label for="exampleInputFile">Imagem em Destaque</label>
                <button class="btn btn-primary btn-block openPopUpMedia" data-target="destaque" >
                  <div  class="carregando" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
                  <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM
                </button>
            <div class="col-12">
              <div id="preview">
                <ul>
                  @if(@$conteudo->media_id != null)
                  <li>
                    <input type="hidden" name="media_id" value="{{@$conteudo->media->id}}" />
                    <a href="#" class="remove" data-file="{{@$conteudo->media->id}}">
                      <i class="fas fa-times"></i>
                    </a>
                    <img src="{{@$conteudo->media->fullpatch()}}" alt=""><Br>
                    <small>{{@$conteudo->media->file}}</small>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
            <div id="cardImage" style="@if(@$conteudo->media_id == null) display: none @endif" >
              <div class="col-12 " >
               <div class="form-group ">
                <label >Exibir Imagem no artigo?</label><div class="clearfix"></div>
                <div class="row">
                <div class="col-6">
                  <label >
                    <input type="radio" name="mostrar_artigo"  value="1" class="flat-red" @if(@$conteudo->img_destaque->mostrar_artigo == '1') checked="" @endif >
                    Sim
                  </label>
                </div>
                <div class="col-6">
                  <label>
                    <input type="radio" name="mostrar_artigo" value="0" class="flat-red" @if(@$conteudo->img_destaque->mostrar_artigo == '0') checked="" @endif>
                    Não
                  </label>
                </div>
                </div>
              </div>
            </div>
            <div class="col-12 m-top-sm">
              <label >Alinhamento da imagem:</label><br>
<div class="row">
              <div class="col-4">
                <input type="radio" class="flat-red" name="alinhamento" id="" value="nenhum" @if(@$conteudo->alinhamento == 'none') checked="" @endif> <i class="fa fa-align-justify" aria-hidden="true"></i> Nenhum
              </div>
              <div class="col-4">
               <input type="radio" class="flat-red" name="alinhamento" value="left" @if(@$conteudo->alinhamento == 'left') checked="" @endif> <i class="fa fa-align-left" aria-hidden="true"></i> Esquerda
             </div>
             <div class="col-4">
              <input type="radio" class="flat-red" name="alinhamento" value="right" @if(@$conteudo->alinhamento == 'right') checked="" @endif> <i class="fa fa-align-right" aria-hidden="true"></i> Direita
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</div>
<div class="col-12">
   <div class="card card-default">
    <div class="card-header">
     <h3 class="card-title">Galeria de Fotos</h3>
             </div>
    <div class="card-body">
      <div class="col-12">
              <button class="btn btn-primary btn-block openPopUpMedia"  data-target="galeria" >
                <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGENS
              </button>
            </div>
     <div id="previewGaleria" class="col-12 col-12 m-top-md">
        <ul></ul>
        @if(@$galeria)
        <div class="card card-default col-12 p-0">
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Miniatura</th>
                  <th style="width: 40px">Ações</th>
                </tr>
              </thead>
              <tbody class="ordenar" style="max-height: 100px;overflow-y: auto;">
               @foreach($galeria as $value)
               <tr>
                <td><i class="fas fa-arrows-alt-v"></i></td>
                <td> <input type="hidden" name="galeria_id[]" value="{{$value->media_id}}" />
                   <input type="hidden" class="ordemGaleria" name="ordem[]" value="{{$value->ordem}}">
                  <img src="{{@$value->media->fullpatch()}}" style="max-height: 50px" alt=""></td>
                  <td>
                    <a href="" class="btn btn-danger btn-xs  remove "  data-file="{{$value->id}}">
                      <i class="far fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
          </div>
          @else
           <div class="card card-default col-12  col-12">
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Miniatura</th>
                  <th style="width: 40px">Ações</th>
                </tr>
              </thead>
              <tbody class="ordenar" style="max-height: 100px;overflow-y: auto;">
              </tbody></table>
            </div>
          </div>
          @endif
        </div>
      </div>
  </div>
</div>
<div class="clearfix m-top-lg m-bottom-lg">
</div>
<!-- <div class="row">
  <div class="col-12">
    <div class="card-footer">
     <a href="{{route('admin.paginas.banners.list', '$sessao->slug_sessao,$conteudo->id')}}" class="btn btn-default btn-flat">Voltar</a>
     {!! Form::submit('Salvar',['class'=>"btn btn-success btn-flat float-right"])!!}
   </div>
 </div>
</div>
 -->
</div>
</section>
