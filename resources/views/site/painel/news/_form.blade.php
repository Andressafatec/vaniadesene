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
          <div class="col-8">
            <div class="form-group ">
              {!! Form::label('Title','Title:') !!}
              {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
          </div>
          <div class="form-group col-4">
              <label >Status</label><div class="clearfix"></div>
              <label >
                <input type="radio" name="status"  value="1" class="flat-red" @if(@$conteudo->status == '1') checked="" @endif >
                Active
              </label>
              <label>
                <input type="radio" name="status" value="0" class="flat-red" @if(@$conteudo->status == '0') checked="" @endif>
                Inactive
              </label>
          </div>
        </div>
        <div class="row">
          <div class="col-9">
            <div class="">
              {!! Form::label('Text','Text:') !!}
              {!! Form::textarea('text',null,['class'=>'form-control summernote','id'=>'']) !!}
            </div>
          </div>
          <div class="m-t"></div>
          <div class="col-3 p-sm-3">
            <div class="form-group">
            <label >Featured:</label><div class="clearfix"></div>
              <label >
                <input type="radio" name="status"  value="1" class="flat-red" @if(@$conteudo->status == '1') checked="" @endif >
                Yes
              </label>
              <label>
                <input type="radio" name="status" value="0" class="flat-red" @if(@$conteudo->status == '0') checked="" @endif>
                No
              </label>
              </div>
              <br>
              <div class="m-t"></div>
                <div class="">
              {!! Form::label('Background Color','Background Color:') !!}
              {!! Form::text('title',null,['class'=>'form-control']) !!}
              <div class="color"></div>
            </div>
              <div class="m-t"></div>
              {!! Form::label('Featured Image','Featured Image:') !!}
            <br>
            <button class="btn btn-primary btn-flat btn-media p-2" data-target="">Select</button>
            <ul class="preview">
              <li class="file"><img src="https://fakeimg.pl/250x100/">
                <a href="" class="fechar"><i class="fas fa-times"></i></a>
              </li>
            </ul>
          </div>
          <div class="row">
          <div class="plus col-12 text-center">
            <button class="btn btn-lg btn-outline-dark"><i class="fas fa-plus"></i> NEW BLOCK</button>
          </div>
          </div>
        </div>
        <hr>
         <div class="row">
      <div class="col-6 ">
        <button  class="btn btn-flat btn-default" data-action="cancelar" id="cancelar">Cancel</button>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-flat btn-success pull-right" data-action="save" id="salvar">Save</button>
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
