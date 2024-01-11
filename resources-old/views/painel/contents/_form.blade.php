<section class="col-12">

  <div class="align-nav">

    <div class="row">

      <div class="col-xs-12 ">

        <nav>

          <div class="nav nav-tabs " id="nav-tab" role="tablist">

            <a class="nav-item nav-link active" id="details" data-toggle="tab" href="#details1" role="tab" aria-controls="details" aria-selected="true">Details</a>

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

          <div class="col-4">

            <div class="form-group ">

              <label for="">Titulo</label>

              <input type="text" name="title" id="" class="form-control" value="{{@$content->title}}">

            </div>

          </div>

          <div class="col-4">

            <div class="form-group ">

              <label for="">Categoria</label>

              <select name="category[]" id="" class="form-control select2" placeholder="Select"  
              @if($section->slug != 'calendario')
              multiple=""
              @endif
              >
<option value="">Selecione....</option>
                @foreach(@$categories as $keyCat => $cat )

                <option value="{{$keyCat}}" @if(@$arrayComp && in_array($keyCat,@$arrayComp)) selected @endif>{{$cat}}</option>

                @endforeach

              </select>

            </div>

          </div>

          <div class="form-group col-2">

            <label >Status</label><div class="clearfix"></div>

            <label >

              <input type="radio" name="status" required=""  value="1" class="flat-red" @if(@$content->status == '1' || @$content === null) checked="" @endif >

              Active

            </label>

            <label>

              <input type="radio" name="status"  required=""  value="0" class="flat-red" @if(@$content->status == '0') checked="" @endif>

              Inactive

            </label>

          </div>

        </div>

        <div class="row">
        @if($section->news == "0") 
          <div class="form-group col-4  ">

            <label for="exampleInputFile">Capa</label>

             <small>(Imagem usada no topo do conteúdo)</small>

            <button class="btn btn-primary btn-block openPopUpMedia" data-target="cover" >

            <div  class="carregando" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Carregando...</span></div>

            <i class="fa fa-cloud-upload" aria-hidden="true"></i> Selecionar Imagem

            </button>

            <div class="col-12">

              <div class="preview_image cover">

                <ul>

                  @if(@$content->cover_id != null)

                  <li>

                    <input type="hidden" name="cover_id" value="{{@$content->cover->id}}" />

                    <a href="#" class="removeItem">

                      <i class="fas fa-times"></i>

                    </a>

                    @if($content->cover->checkType() == "image")

                    <img src="{{@$content->cover->fullpatch()}}" alt=""><Br>

                    @elseif($content->cover->checkType() == "video")

                    <video  controls>

                      <source src="{{@$content->cover->fullpatch()}}" type="video/mp4">

                      Your browser does not support the video tag.

                    </video>
                    @elseif($content->cover->checkType() == "document")
                      <i class="fas fa-file-invoice"></i>
                    @endif

                  </li>

                  @else

                  <li>

                    <input type="hidden" name="cover_id" value="" />

                  </li>

                  @endif

                </ul>

              </div>

            </div>

          </div>
@endif
          <div class="form-group col-4  hidden">

            <label for="exampleInputFile">Imagem em destaque</label>

            <small>(Image used on the website home)</small>

            <button class="btn btn-primary btn-block openPopUpMedia" data-target="feature_image" >

            <div  class="carregando" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Carregando...</span></div>

            <i class="fa fa-cloud-upload" aria-hidden="true"></i> Selecionar Imaagem

            </button>

            <div class="col-12">

              <div class="preview_image feature_image">

                <ul>

                  @if(@$content->feature_image_id != null)

                  <li>

                    <input type="hidden" name="feature_image_id" value="{{@$content->featureImage->id}}" />

                    <a href="#" class="removeItem">

                      <i class="fas fa-times"></i>

                    </a>

                    @if($content->featureImage->checkType() == "image")

                    <img src="{{@$content->featureImage->fullpatch()}}" alt=""><Br>

                    @elseif($content->featureImage->checkType() == "video")

                    <video  controls>

                      <source src="{{@$content->featureImage->fullpatch()}}" type="video/mp4">

                      Your browser does not support the video tag.

                    </video>

                    @endif

                  </li>

                  @else

                  <li>

                    <input type="hidden" name="feature_image_id" value="" />

                  </li>

                  @endif

                </ul>

              </div>

            </div>

          </div>

        </div>
        
@if($section->news == "1")
        <div class="row">

          <div class="col-4">

            <div class="form-group">

              <label >Inicio da Publicação</label>

              <div class="input-group date " data-target-input="nearest">

                @if(@$content)

                <input type="text" name="start_publish"  autocomplete="off" value="{{@$content->start_publish->format('m/d/Y')}}" class="form-control dataPicker" name="data"/>

                @else

                <input type="text" name="start_publish"  autocomplete="off" value="{{date('m/d/Y')}}" class="form-control dataPicker" name="data"/>

                @endif

                <div class="input-group-append"  >

                  <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>

                </div>

              </div>

            </div>

          </div>

          <div class=" col-4">

            <div class="form-group">

              <label >Final publicação</label>

              <div class="input-group" data-target-input="nearest">

                @if(@$content && $content->finish_publish != "")

                <input type="text" name="finish_publish" autocomplete="off" value="{{@$content->finish_publish->format('m/d/Y')}}" class="form-control dataPicker2" name="data" />

                @else

                <input type="text" name="finish_publish" autocomplete="off" value="" class="form-control dataPicker2" name="data" />

                @endif

                <div class="input-group-append">

                  <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>

                </div>

              </div>

            </div>

          </div>

        </div>
        @endif


        @if($section->slug == 'calendario')
          <div class="row">
              <div class="col-3">
                  <div class="form-group">
                      <label>E-mail responsavel</label>
                   
                          <input type="text" name="custom[eventos][email_responsavel]" autocomplete="off"
                              value="{{ @$content->evento->email_responsavel}}"  class="form-control" />
                        
                    
                  </div>
              </div>
              <div class="col-2">
                  <div class="form-group">
                      <label>Data Evento</label>
                      <div class="input-group " >
                          <input type="text" name="custom[eventos][data]" autocomplete="off"
                              value="{{ @$content ? $content->evento->data->format('Y-m-d') : date('Y-m-d') }}"  class="form-control dateFlatpicker" />
                          <div class="input-group-append">
                              <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-2">
                  <div class="form-group">
                      <label>Horário</label>
                      <input type="time" name="custom[eventos][hora]" autocomplete="off"
                          value="{{ @$content ? $content->evento->hora : '' }}" class="form-control timeMask" />
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="">Local</label>
                      <input type="text" name="custom[eventos][local]" value="{{ @$content ? $content->evento->local : '' }}" class="form-control">
                  </div>
              </div>
              <div class="col-2">
                  <div class="form-group">
                      <label for="">Qtd Vagas</label>
                      <input type="number" name="custom[eventos][qtd_vagas]" value="{{ @$content ? $content->evento->qtd_vagas : '' }}" class="form-control">
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="">Ativar inscrição?</label><Br>
                      <input type="radio" name="custom[eventos][ativar_inscricao]" value="1" @if(null !== @$content &&  $content->evento->ativar_inscricao == 1) checked @endif> Sim
                      <input type="radio" name="custom[eventos][ativar_inscricao]" value="0" @if(null !== @$content &&  $content->evento->ativar_inscricao == 0) checked @endif> Não
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="">Desativar formulário?</label><Br>
                      <input type="radio" name="custom[eventos][desativar_formulario]" value="1" @if(null !== @$content &&  $content->evento->desativar_formulario == 1) checked @endif> Sim
                      <input type="radio" name="custom[eventos][desativar_formulario]" value="0" @if(null !== @$content &&  $content->evento->desativar_formulario == 0) checked @endif> Não
                  </div>
              </div>
              <div class="col-3">
                  <div class="form-group">
                      <label for="">Evento Gratuito?</label><Br>
                      <input type="radio" name="custom[eventos][gratuito]" value="1" @if(null !== @$content &&  $content->evento->gratuito == 1) checked @endif> Sim
                      <input type="radio" name="custom[eventos][gratuito]" value="0" @if(null !== @$content &&  $content->evento->gratuito == 0) checked @endif> Não
                  </div>
              </div>
              <div class="col-3">
                  <div class="form-group">
                      <label for="">Reserva de mesas</label><Br>
                      <input type="radio" name="custom[eventos][reserva_mesas]" value="1" @if(null !== @$content &&  $content->evento->reserva_mesas == 1) checked @endif> Sim
                      <input type="radio" name="custom[eventos][reserva_mesas]" value="0" @if(null !== @$content &&  $content->evento->reserva_mesas == 0) checked @endif> Não
                  </div>
              </div>
           

          </div>
          <div class="row">
            <div class="col-12">
              <h4>Valores</h4>
            </div>
          <div class="col">
                  <div class="form-group">
                      <label for="">Valor Sócio</label>
                      <div class="input-group ">
                          <div class="input-group-prepend">
                              <div class="input-group-text">R$</div>
                          </div>
                          <input type="text" name="custom[eventos][valor_socio]" value="{{ @$content ? $content->evento->valor_socio : '' }}" autocomplete="off"
                              class="form-control moneyMask" />
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="">Valor Não Sócio</label>
                      <div class="input-group ">
                          <div class="input-group-prepend">
                              <div class="input-group-text">R$</div>
                          </div>
                          <input type="text" name="custom[eventos][valor_nao_socio]" value="{{ @$content ? $content->evento->valor_nao_socio : '' }}" autocomplete="off"
                              class="form-control moneyMask" />
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="">Mesas Associado</label>
                      <div class="input-group ">
                          <div class="input-group-prepend">
                              <div class="input-group-text">R$</div>
                          </div>
                          <input type="text" name="custom[eventos][valor_mesa_socio]" value="{{ @$content ? $content->evento->valor_mesa_socio : '' }}"  autocomplete="off"
                              class="form-control moneyMask" />
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="">Mesas Não Associado</label>
                      <div class="input-group ">
                          <div class="input-group-prepend">
                              <div class="input-group-text">R$</div>
                          </div>
                          <input type="text" name="custom[eventos][valor_mesa_nao_socio]" value="{{ @$content ? $content->evento->valor_mesa_nao_socio : '' }}"  autocomplete="off"
                              class="form-control moneyMask" />
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="">Meia entrada p/ não associado</label>
                      <div class="input-group ">
                          <div class="input-group-prepend">
                              <div class="input-group-text">R$</div>
                          </div>
                          <input type="text" name="custom[eventos][valor_meia_nao_socio]" value="{{ @$content ? $content->evento->valor_meia_nao_socio : '' }}"  autocomplete="off"
                              class="form-control moneyMask" />
                      </div>
                  </div>
              </div>
          </div>
        @endif
        <div id="targetNewBlock">

          @if(@$content)

          @foreach($content->blocks as $key => $item)

            @include('painel.contents._blocks')

          @endforeach

          @else

          @include('painel.contents._blocks')

          @endif

        </div>
        @if($section->add_blocks == "1")
        <div class="row  ">
          <div class="plus col-12 text-center">
            <button class="btn btn-lg btn-outline-dark" id="addBlockContent"><i class="fas fa-plus"></i> Nova Sessão</button>
          </div>
        </div>
        @endif 
        <hr>

        <div class="row">

          <div class="col-6 ">

            <a  href="{{route('admin.contents.list',['slug'=>$section->slug])}}" class="btn btn-flat btn-default" data-action="cancelar">Cancelar</a>

          </div>

          <div class="col-6">

            <button type="button" class="btn btn-flat btn-success pull-right" id="btnSend">Salvar</button>

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