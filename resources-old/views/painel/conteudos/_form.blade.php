<section class="col-12">
  <div class="row">
    <div class="form-group col-3 col-4 ">
      <label for="">Status</label>
      <div class="clearfix"></div>
      <div class="col">
        <label>
          <input type="radio" name="status" value="1" class="flat-red" @if(@$conteudo->status == '1') checked="" @endif
          >
          Ativo
        </label>
      </div>
      <div class="col">
        <label>
          <input type="radio" name="status" value="0" class="flat-red" @if(@$conteudo->status == '0') checked="" @endif>
          Inativo
        </label>
      </div>
    </div>
    <div class="form-group col-3 col-4 ">
      <label for="">Destaque</label>
      <div class="clearfix"></div>
      <div class="col">
        <label>
          <input type="radio" name="destaque" value="1" class="flat-red" @if(@$conteudo->destaque == '1') checked=""
          @endif >
          Ativo
        </label>
      </div>
      <div class="col">
        <label>
          <input type="radio" name="destaque" value="0" class="flat-red" @if(@$conteudo->destaque == '0') checked=""
          @endif>
          Inativo
        </label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <div class="form-group ">
        {!! Form::label('Título','Título:') !!}
        {!! Form::text('titulo_conteudo',null,['class'=>'form-control']) !!}
      </div>
    </div>
    <div class="col-4">
      <div class="form-group ">
        {!! Form::label('Apelido','Apelido:') !!}
        {!! Form::text('slug_conteudo',null,['class'=>'form-control']) !!}
      </div>
    </div>
    <div class="col-4">
      <div class="form-group">
        {!! Form::label('Categoria','Categoria:') !!}
        {!! Form::select('categoria_id',@$categorias,@$conteudo->categoria_id,['class'=>'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
        {!! Form::textarea('chamada',null,['class'=>'summernote-basic']) !!}
    </div>
    <div class="col-8">
        {!! Form::textarea('texto',null,['class'=>'form-control','id'=>'summernote']) !!}
      <div class="containerbtn">
        <div class="carregnadobtn">
          <i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card card-default">
        <!-- /.card-header -->
        <div class="card-body">
          <div class="form-group col-12 ">
            <label for="exampleInputFile">Imagem em Destaque</label>
            <button class="btn btn-primary btn-block openPopUpMedia">
              <div class="carregando" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span
                  class="sr-only">Loading...</span></div>
              <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGEM
            </button>
            <div class="col-12">
              <div id="preview">
                <ul>
                  @if(@$conteudo->media)
                  <li>
                    <input type="hidden" name="media_id" value="{{@$conteudo->media->id}}" />
                    <a href="#" class="remove" data-file="{{@$conteudo->media->id}}">
                      <i class="fas fa-times"></i>
                    </a>
                    <img src="{{@$conteudo->media->fullpatch()}}" alt="">
                    <small>{{@$conteudo->media->file}}</small>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
            @if(@$conteudo->media)
            <div id="cardImage" style="@if(@$conteudo->media->file) display: none @endif">
              <div class="col-12 ">
                <div class="form-group ">
                  <label for="">Exibir Imagem no artigo?</label>
                  <div class="clearfix"></div>
                  <div class="col-6">
                    <label>
                      <input type="radio" name="mostrar_artigo" value="1" class="flat-red"
                        @if(@$conteudo->img_destaque->mostrar_artigo == '1') checked="" @endif >
                      Sim
                    </label>
                  </div>
                  <div class="col-6">
                    <label>
                      <input type="radio" name="mostrar_artigo" value="0" class="flat-red"
                        @if(@$conteudo->img_destaque->mostrar_artigo == '0') checked="" @endif>
                      Não
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-12 m-top-sm">
                <label for="">Alinhamento da imagem:</label><br>
                <div class="col-4">
                  <input type="radio" class="flat-red" name="alinhamento" id="" value="nenhum"
                    @if(@$conteudo->alinhamento == 'none') checked="" @endif> <i class="fa fa-align-justify"
                    aria-hidden="true"></i> Nenhum
                </div>
                <div class="col-4">
                  <input type="radio" class="flat-red" name="alinhamento" value="left" @if(@$conteudo->alinhamento ==
                  'left') checked="" @endif> <i class="fa fa-align-left" aria-hidden="true"></i> Esquerda
                </div>
                <div class="col-4">
                  <input type="radio" class="flat-red" name="alinhamento" value="right" @if(@$conteudo->alinhamento ==
                  'right') checked="" @endif> <i class="fa fa-align-right" aria-hidden="true"></i> Direita
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <label for="">Galeria de Fotos</label>
        </div>
        <div class="card-body">
          <div class="col-12">
            <button class="btn btn-primary btn-block openPopUpMedia">
              <i class="fa fa-cloud-upload" aria-hidden="true"></i> ESCOLHER IMAGENS
            </button>
          </div>
          <div id="previewGaleria" class="col-12 col-12 m-top-md">
            <ul></ul>
            @if(@$galeria)
            <div class="card card-default col-12  col-12">
              <!-- /.card-header -->
              <div class="card-body no-padding">
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
                      <td><i class="fas fa-arrows-v"></i></td>
                      <td> <input type="hidden" name="galeria_id[]" value="{{$value->media_id}}" />
                        <input type="hidden" class="ordemGaleria" name="ordem[]" value="{{$value->ordem}}">
                        <img src="{{@$value->media->fullpatch()}}" style="max-height: 50px" alt=""></td>
                      <td>
                        <a href="" class="btn btn-danger btn-xs  remove " data-file="{{$value->id}}">
                         <i class="fas fa-trash-alt"></i>
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
              <div class="card-body no-padding">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Miniatura</th>
                      <th style="width: 40px">Ações</th>
                    </tr>
                  </thead>
                  <tbody class="ordenar" style="max-height: 100px;overflow-y: auto;">
                  </tbody>
                </table>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix m-top-lg m-bottom-lg">
    </div>
</section>
