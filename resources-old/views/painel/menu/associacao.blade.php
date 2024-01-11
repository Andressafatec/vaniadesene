@extends('layouts.painel')
@section('content')
<section class="content-header">
  <h1  class="col-sm-6">Associação: {{$tipo->nome_menu}}</h1>
  <div class="clearfix"></div>
</section>
 <form action="{{route('admin.tiposMenu.associacao.store',['id'=>$id])}}" id="formAssociacao">
  @csrf
  <div class="row">
  <section class="col-8">
      <div>
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  @foreach($tiposMenu as $key => $item)
                  <li class="nav-item">
                    <a class="nav-link @if($key == 0) active @endif" id="custom-tabs-two-home-tab" data-toggle="pill" href="#tab_{{$item->id}}" role="tab" aria-controls="tab_{{$item->id}}" aria-selected="true">{{$item->nome_menu}}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                   @foreach($tiposMenu as $key => $item)
                  <div class="tab-pane fade show @if($key == 0) active @endif" id="tab_{{$item->id}}" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                     <ul class="list-group">
                      @foreach($item->ItensMenu as $x)
                       <li class="list-group-item"><input type="checkbox" class="icheck" {!!$x->checkAssociacao($id)!!} name="menu[]" value="{{$x->id}}"> {{$x->titulo}}
        <ul class="list-group list-group-flush">
                        @foreach($x->children()->get() as $key => $y)
                           <li class="list-group-item">
                               |--  <input type="checkbox" class="icheck" {!!$y->checkAssociacao($id)!!} name="menu[]" value="{{$y->id}}" > {{$y->titulo}}
                            </li>
                            @endforeach
</ul>
                            </li>
                       @endforeach
                     </ul>
                  </div>
                  @endforeach
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
    </section>
  </div>
   <div class="footerActions">
     <div class="list-action ">
      <div class="row">
         <div class="col-4 text-left ">
           <button type="button" class="btn btn-flat btn-default" data-action="sair">Sair</button>
        </div>
        <div class="col-8">
          <button type="button" class="btn btn-flat btn-primary" data-action="salvar_sair">Salvar e Sair</button>
          <button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</form>
@stop
@section('pos-script')
<script>
 $(document).ready(function(){
    $(".list-action").on('click','button',function(e){
      e.preventDefault();
      var action = $(this).data('action');
      var form = $(this).closest('form').attr('id');
      if(action == 'sair'){
         swal({
            title: "Tem certeza?",
            text: "As alterações no formulário seram perdidas",
            icon: "warning",
            dangerMode: false,
              buttons:{
                  cancel: {
                    text: "Cancelar",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                  },
                  confirm: {
                    text: "Sim, Sair",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                  }
                }
          }) .then(confirmar => {
             if (confirmar) {
              window.location = "{{route('admin.tiposMenu.index')}}"
             }
         });
      }else if(action == 'salvar_sair'){
        $.post($("#"+form).attr('action'),$("#"+form).serialize(),function(data){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
              });
              window.location.href = "{{route('admin.tiposMenu.index')}}";
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }else if(action == 'salvar'){
        $.post($("#"+form).attr('action'),$("#"+form).serialize(),function(data,error){
          if(data.erro == '0'){
            swal({
                title: "Sucesso!",
                text: data.msg,
                icon: "success",
                button: false,
                timer:3000,
              });
            }else{
               swal("Atenção!", data.msg, "info");
            }
          })
      }
    })
  })
</script>
@endsection
