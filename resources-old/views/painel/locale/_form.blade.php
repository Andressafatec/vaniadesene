<section class="col-8 center-form">
<div class="card p-5">
  <div class="row">
  <div class="col-12">
   <div class="form-group ">
    {!! Form::label('Title','Title:') !!}
    {!! Form::text('title',null,['class'=>'form-control', 'required'=>'true']) !!}
  </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
    <select name="flag" id="" class="form-control js-example-templating">
      <option value="">Select</option>
      @if(@$locale)
      <option value="{{strtolower($locale->flag)}}" selected="">{{$locale->title}}</option>
      @endif
    </select>
    </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-6 ">
        <a href="{{route('admin.country.index')}}" class="btn btn-flat btn-default" data-action="cancelar">Cancel</a>
      </div>
      <div class="col-6">
        <button type="button" id="btnSend" class="btn btn-flat btn-success pull-right" data-action="save">Save</button>
      </div>
    </div>
    </div>
</section>
