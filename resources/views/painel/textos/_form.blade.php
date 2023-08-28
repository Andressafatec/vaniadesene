<section class="col-8 center-form">
<div class="card p-5">
  <div class="row">
  <div class="col-12">
   <div class="form-group ">
    {!! Form::label('Titulo','Titulo:') !!}
    {!! Form::text('title',null,['class'=>'form-control', 'required'=>'true']) !!}
  </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
   <div class="form-group">
    {!! Form::label('Apelido','Apelido:') !!}
    {!! Form::text('param',null,['class'=>'form-control','placehold'=>'(Optional)']) !!}
  </div>
</div>
    <div class="col-12">
      <div class="form-group">
      {!! Form::label('Valor','Valor:') !!}
      {!! Form::textarea('value',null,['class'=>'form-control summernote', 'required'=>'true']) !!}
      </div>
    </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-6 ">
        <a href="{{route('admin.tools.index')}}" class="btn btn-flat btn-default" data-action="cancelar">Cancelar</a>
      </div>
      <div class="col-6">
        <button type="button" id="btnSend" class="btn btn-flat btn-success pull-right" data-action="save">Salvar</button>
      </div>
    </div>
    </div>
</section>
