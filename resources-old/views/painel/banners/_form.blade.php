<div class="card">
   <div class="card-header with-border">
      <h3 class="card-title">Cadastrar</h3>
   </div>
   <!-- /.card-header -->  <!-- form start -->  
   <form class="form-horizontal">
      <div class="card-body">
         <div class="form-group col-sm-12">
            {!! Form::label('Status','Nome:',['class'=>'col-sm-2 control-label']) !!}        
            <div class="col-sm-10">         
            <input type="radio" name="status" class="minimal" checked=""  value="1"> Ativo          
            <input type="radio" name="status" class="minimal" value="0"> Inativo        
            </div>
         </div>
         <div class="form-group col-sm-12">
            {!! Form::label('Nome','Nome:',['class'=>'col-sm-2 control-label']) !!}        
            <div class="col-sm-10">         
            {!! Form::text('nome',null,['class'=>'form-control']) !!}       
            </div>
         </div>
         <div class="row align-items-center  mb-3">
            <label for="exampleInputFile" class="col-sm-2 control-label">
               Banner Desktop <small>(1280x600 px)</small>
            </label>      
            <div class="col-sm-4">
               <button class="btn btn-primary btn-block openPopUpMedia"  data-target="banner" >
                           <i class="fa fa-cloud-upload" aria-hidden="true"></i> Selecionar Imagem 
               </button>        
            </div>
            <div id="preview"  class="col-sm-6">
            <ul>
            @if(@$banner->media_id != null)
                  <li>
                    <input type="hidden" name="media_id" value="{{@$banner->media->id}}" />
                    <a href="#" class="remove" data-file="{{@$banner->media->id}}">
                      <i class="fas fa-times"></i> 
                    </a>
                    <img src="{{@$banner->media->fullpatch()}}" alt=""><Br>
                    <small>{{@$banner->media->file}}</small>
                  </li>
                  @endif
            </ul>
            </div>
         </div>
         <div class="form-group row align-items-center mb-3 ">
            <label for="exampleInputFile" class="col-sm-2 control-label">Banner Mobile <small>(625px x 820px)</small></label>      
            <div  class="col-sm-4">
               <button class="btn btn-primary btn-block openPopUpMedia"  data-target="banner_mobile" > 
                   <i class="fa fa-cloud-upload" aria-hidden="true"></i> Selecionar Imagem          
            </button>      
               <!-- <div class="col-sm-4">          <input type="checkbox" name="img_fundo"  class="minimal" value="1" id=""> Usar imagem no fundo        </div> -->        
            </div>
            <div id="previewMobile" class="preview_image col-sm-6">
                <ul>
                @if(@$banner->media_mobile_id != null)
                  <li>
                    <input type="hidden" name="media_mobile_id" value="{{@$banner->media_mobile_id->id}}" />
                    <a href="#" class="remove" data-file="{{@$banner->media_mobile_id->id}}">
                      <i class="fas fa-times"></i> 
                    </a>
                    <img src="{{@$banner->mediaMobile->fullpatch()}}" alt=""><Br>
                    <small>{{@$banner->mediaMobile->file}}</small>
                  </li>
                  @endif
                </ul>
            </div>
         </div>
         <div class="row align-items-center">
            <label for="exampleInputFile" class="col-sm-2 control-label">Link</label>  
            <div class="col-sm-3">       
            {!! Form::text('link',null,['class'=>'form-control','id'=>'link','placeholder'=>'https://www.google.com.br']) !!}
            </div>
            <!-- <div class="col-sm-3"><input type="checkbox" name="link_full" class="linkFull minimal" value="1" id=""> Usar em todo banner</div> -->   
         </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
         
      
         <div class="row">
            <div class="col-6 ">      <a  href="{{route('admin.banners.list')}}" class="btn btn-flat btn-default" data-action="cancelar">Cancelar</a>    </div>
            <div class="col-6">      <button type="button" class="btn btn-flat btn-success pull-right" id="salvar" data-action="salvar">Salvar</button>    </div>
         </div>
      </div>
      <!-- /.card-footer -->
   </form>
</div>