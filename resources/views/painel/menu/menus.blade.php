@extends('layouts.painel')
@section('title', 'AdminLTE')
@section('pre-assets')
<style>
  .list-move {
    cursor: move;
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .list-move2 {
    cursor: move;
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .list-move li,
  .list-move2 li {
    display: inline-block;
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .select-icon {
    position: relative;
    border: 1px solid #ededed;
    border-radius: 4px;
    card-shadow: 1px 1px 1px #ededed;
  }
  .item-icon {
    padding: 5px;
    border-bottom: 1px dotted #ededed;
    display: block;
    color: #333;
  }
  .item-icon.active {
    background: #039ef7;
    color: #333;
  }
  .item-icon.active:hover {
    color: #333;
  }
  .item-icon:hover {
    color: #039ef7;
    cursor: pointer;
  }
  .item-icon i {
    float: right;
  }
  .content-icon {
    overflow-y: scroll;
    max-height: 100px;
  }
  body.dragging,
  body.dragging * {
    cursor: move !important;
  }
  .dragged {
    position: absolute;
    opacity: 0.5;
    z-index: 2000;
  }
  ol.example li.placeholder {
    position: relative;
    /** More li styles **/
  }
  ol.example li.placeholder:before {
    position: absolute;
    /** Define arrowhead **/
  }
  .ui-sortable-handle {
    border-bottom: 1px solid #d8d8d8;
    padding: 5px;
  }
  body.dragging,
  body.dragging * {
    cursor: move !important;
  }
  .dragged {
    position: absolute;
    opacity: 0.5;
    z-index: 2000;
  }
  ol.default li.placeholder {
    position: relative;
    /** More li styles **/
  }
  ol.default li.placeholder:before {
    position: absolute;
    /** Define arrowhead **/
  }
</style>
@stop
@section('content')
<section class="content-header">
  <h1 class="col-sm-6">Menus</h1>
  <div class="clearfix"></div>
</section>
<div class="row">
  <section class="col-4 col-lg-4">
    <div class="card card-default col-sm-12 m-top-md">
      <div class="card-header with-border">
        <h3 class="card-title">Novo</h3>
      </div>
      <div class="card-body">
        @if(@$menu)
        {!! Form::model($menu,['route'=>['admin.menu.update',$tipo_menu_id,$menu->id],'class'=>'']) !!}
        @else
        {!! Form::model(null,['route'=>['admin.menu.store',$tipo_menu_id],'class'=>'']) !!}
        @endif
        <input type="hidden" name="id_menu" value="{{$tipo_menu_id}}">
        <div class="form-group col-sm-12 ">
          <label for="">Status</label>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-6">
              <label>
                <input type="radio" name="status" @if(@$menu->status == "1") checked="" @endif value="1" class="flat-red" checked="" >
                Ativo
              </label>
            </div>
            <div class="col-6">
              <label>
                <input type="radio" name="status" @if(@$menu->status == "0") checked="" @endif value="0" class="flat-red" f>
                Inativo
              </label>
            </div>
          </div>
        </div>
        <div class="col-sm-12 form-group ">
          <label for="">Item pai</label>
          <select name="id_menu_pai" id="" class=" form-control">
            @foreach ($parentMenu as $key => $item)
            <option value="{{$key}}" @if(@$menu->id_menu_pai == $key) selected @endif>{{ $item }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-12 form-group ">
          {!! Form::label('Titulo','Titulo:') !!}
          {!! Form::text('titulo',@$menu->titulo,['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-12 form-group ">
          {!! Form::label('Classe Customizada','Classe customizada :') !!}
          {!! Form::text('class_custom',null,['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-12 form-group ">
          {!! Form::label('Conteúdo','Conteúdo:') !!}
         
          <select name="id_conteudo" id="" class="form-control select">
            <option value="">Selecione</option>
          @foreach($categorias as $key => $categorie)        
                <optgroup label="{{$categorie->section->title}} - {{$categorie->title}}"> 
                @foreach($categorie->conteudos as $key => $content)  
                 
                  <option value="{{$content->content->id}}" 
                  @if(@$menu->id_conteudo == $content->content->id) selected @endif >
                    {{$content->content->title}}</option>
                  @endforeach  
                  
                </optgroup>
                @endforeach
          </select>
          
        </div>
        <div class="col-sm-12 form-group ">
          {!! Form::label('Link customizado','Link customizado:') !!}
          {!! Form::text('link_custom',@$menu->link_custom,['class'=>'form-control','id'=>'link_custom']) !!}
        </div>
        <div class="form-group col-sm-12 ">
          <label for="">Abrir em nova guia?</label>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-6">
              <label>
                <input type="radio" name="new_window" @if(@$menu->new_window == "1") checked="" @endif value="1" class="flat-red" >
                Sim
              </label>
            </div>
            <div class="col-6">
              <label>
                <input type="radio" name="new_window" @if(@$menu->new_window == "0") checked="" @endif value="0" class="flat-red" >
                Não
              </label>
            </div>
          </div>
        </div>
        <div class="form-group col-sm-12 ">
          <label for="exampleInputFile">Imagem</label>
          <button class="btn btn-primary btn-block openPopUpMedia" data-target="destaque">
            <div class="carregando" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>
            <i class="fa fa-cloud-upload" aria-hidden="true"></i> Selecionar Imagem
          </button>
          <div class="col-sm-12">
            <div id="preview" class="preview_image">
              <ul>
                @if(@$menu->media_id != null)
                <li>
                  <input type="hidden" name="media_id" value="{{@$menu->media->id}}" />
                  <a href="#" class="removeItem">
                    <i class="fas fa-times"></i>
                  </a>
                  <img src="{{@$menu->media->fullpatch()}}" alt=""><Br>
                </li>
                @else
                <li>
                  <input type="hidden" name="media_id" value="" />
                </li>
                @endif
              </ul>
            </div>
          </div>
        </div>
        @if(@$menu)
        <div class="col-sm-6 col-lg-6 m-top-sm">
          <a href="{{route('admin.menu.index',[$menu->id])}}" class="btn btn-default btn-flat btn-block">Cancelar</a>
        </div>
        @endif
        <div class="col-sm-6  col-lg-6 m-top-sm">
          <button type="submit" class="btn btn-success btn-flat btn-block">Salvar</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </section>
  <section class="col-8  col-lg-8">
    {!! Form::model(null,['route'=>['admin.ajax.ordem.menu'],'id'=>'formOrdem']) !!}
    <div class="card card-default col-sm-12 m-top-md">
      <div class="card-header with-border">
        <i class="fa fa-book"></i>
        <h3 class="card-title float-left">Lista </h3>
        <div class="float-right">
          @include('painel.locale._include')
        </div>
      </div>
      <!-- /.card-header -->
      <div class="">
        <table class="table sorted_table">
          @foreach($itensMenu as $itemMenu)
          <tr class="item">
            <td style="width: 100px">
              <ul class="list-move">
                <li><button type="button" class="btn btn-xs btn-secondary" value='up'><i class="fas fa-chevron-up"></i></button></li>
                <li><button type="button" class="btn btn-xs btn-secondary" value='down'><i class="fas fa-chevron-down"></i></button>
                </li>
              </ul>
            </td>
            <td>
              <div class="row pb-1 order" id="{{$itemMenu->id}}">
                <input type="hidden" name="ordem[{{$itemMenu->id}}]" class="inputOrdem" value="{{$itemMenu->ordem}}">
                <div class="col-7">
                  @if($itemMenu->ocultar_texto == '1') <i class="fa {{$itemMenu->icone_texto}}"></i> @else {{$itemMenu->titulo}}@endif
                  @if($itemMenu->children->count() > 0 )
                  <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#collapse_{{$itemMenu->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">Lsta</a>
                  @endif
                </div>
                <div class="col-2 pl-3">
                  {!!$arrayStatus[$itemMenu->status]!!}
                </div>
                <div class="col text-right float-right">
                  <a href="{{route('admin.menu.delete',['idMenu'=>$tipo_menu_id,'idItemMenu'=>$itemMenu->id])}}" class="btn btn-danger btn-xs btn-destroy btn"><i class="far fa-trash-alt"></i></a>
                  <a href="{{route('admin.menu.editar',['idMenu'=>$tipo_menu_id,'idItemMenu'=>$itemMenu->id])}}" class="btn btn-primary btn-xs btn m-left"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{route('admin.menu.modalConteudos',['idMenu'=>$tipo_menu_id,'idItemMenu'=>$itemMenu->id])}}" class="btn btn-xs btn-dark modalConteudos" data-toggle="tooltip" data-placement="top" title="Associar Conteudos"><i class="fas fa-tasks"></i></a>
                </div>
              </div>
              @if($itemMenu->children->count() > 0 )
              <div class="collapse show" id="collapse_{{$itemMenu->id}}">
                <table class="table">
                  @foreach($itemMenu->children()->get() as $key => $itemMenu)
                  <tr class="item2 order " id="{{$itemMenu->id}}">
                    <td>
                      <input type="hidden" name="ordem[{{$itemMenu->id}}]" class="inputOrdem" value="{{$itemMenu->ordem}}">
                      <div class="row p-all-0">
                        <ul class="list-move2 col-1">
                          <li><button type="button" class="btn btn-xs btn-secondary" value='up'><i class="fas fa-chevron-up"></i></button></li>
                          <li><button type="button" class="btn btn-xs btn-secondary" value='down'><i class="fas fa-chevron-down"></i></button>
                          </li>
                        </ul>
                        <div class="col-1 text-center">
                          |--
                        </div>
                        <div class="col-7">
                          @if($itemMenu->ocultar_texto == '1') <i class="fa {{$itemMenu->icone_texto}}"></i>
                          @else
                          {{$itemMenu->titulo}}@endif
                        </div>
                        <div class="col pl-1">
                          {!!$arrayStatus[$itemMenu->status]!!}
                        </div>
                      </div>
                    </td>
                    <td class=" text-right">
                      <a href="{{route('admin.menu.delete',['idMenu'=>$tipo_menu_id,'idItemMenu'=>$itemMenu->id])}}" class="btn btn-danger btn-xs btn-destroy btn" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></a>
                      <a href="{{route('admin.menu.editar',['idMenu'=>$tipo_menu_id,'idItemMenu'=>$itemMenu->id])}}" class="btn btn-primary btn-xs btn m-left" data-toggle="tooltip" data-placement="top" title="Edit Item Menu"><i class="fas fa-pencil-alt"></i></a>
                      <a href="{{route('admin.menu.modalConteudos',['idMenu'=>$tipo_menu_id,'idItemMenu'=>$itemMenu->id])}}" class="btn btn-xs btn-dark modalConteudos" data-toggle="tooltip" data-placement="top" title="Associar Conteudos"><i class="fas fa-tasks"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
              @endif
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="card-footer">
        <button class="btn btn-success" id="salvarOrdem">Salvar Ordem</button>
      </div>
      <!-- /.card-body -->
    </div>
    <hr class="clear">
    {!! Form::close() !!}
  </section>
</div>
<div class="modal fade" id="modalConteudos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="formAssociacao">
        @csrf
      <div class="modal-body">
        <div class="accordion" id="accordionExample">
          @foreach($sessoes as $key => $val)
          <div class="card">
            <div class="card-header" id="heading_{{$val->id}}">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_{{$val->id}}" aria-expanded="false" aria-controls="collapse_{{$val->id}}">
                  {{$val->title}}
                </button>
              </h2>
            </div>
            <div id="collapse_{{$val->id}}" class="collapse" aria-labelledby="heading_{{$val->id}}" data-parent="#accordionExample">
              <div class="card-body">
                <ul class="list-group" style="max-height: 300px; overflow-y: auto;">
                  @foreach($val->conteudos as $keyConteudo => $valConteudo)
                  <li class="list-group-item"><input type="checkbox" name="item_menu[]" class="icheck-red" value="{{$valConteudo->id}}"> {{$valConteudo->title}}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" id="saveAssociacao">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('pos-script')
<script type="text/javascript">
  $(document).ready(function() {
    $(".item-icon").click(function(e) {
      e.preventDefault();
      $(".item-icon").removeClass("active")
      $(this).addClass('active');
      var icone = $(this).data('icon');
      console.log(icone);
      $("input[name='icone_texto']").val(icone)
    })
    $("#salvarOrdem").click(function(e) {
      e.preventDefault();
      var selectedLanguage = new Array();
      $('.order').each(function(index) {
        var id = $(this).attr('id');
        $(this).find('.inputOrdem').val(index)
      });
      $.post("{{route('admin.ajax.ordem.menu')}}", $("#formOrdem").serialize(), function(response) {
        $(".ordem").remove();
        swal("Success!", "Change made successfully!", "success");
      });
    })
    function moveUp(item) {
      var prev = item.prev();
      if (prev.length == 0)
        return;
      prev.css('z-index', 999).css('position', 'relative').animate({
        top: item.height()
      }, 250);
      item.css('z-index', 1000).css('position', 'relative').animate({
        top: '-' + prev.height()
      }, 300, function() {
        prev.css('z-index', '').css('top', '').css('position', '');
        item.css('z-index', '').css('top', '').css('position', '');
        item.insertBefore(prev);
        $('.order').each(function(index) {
          var id = $(this).attr('id');
          $(this).find('.inputOrdem').val(index)
        });
      });
    }
    function moveDown(item) {
      var next = item.next();
      if (next.length == 0)
        return;
      next.css('z-index', 999).css('position', 'relative').animate({
        top: '-' + item.height()
      }, 250);
      item.css('z-index', 1000).css('position', 'relative').animate({
        top: next.height()
      }, 300, function() {
        next.css('z-index', '').css('top', '').css('position', '');
        item.css('z-index', '').css('top', '').css('position', '');
        item.insertAfter(next);
        $('.order').each(function(index) {
          var id = $(this).attr('id');
          $(this).find('.inputOrdem').val(index)
        });
      });
    }
    $(".sorted_table").sortable({
      items: ".item",
      handle: '.list-move',
      distance: 10,
      update: function(event, ui) {
        /* $("#targetNewBlock section").each(function( index ) {
          $(this).find('input[name="block[order][]"]').val(index)
        });*/
      }
    });
    $('body').on('click', '.list-move button', function() {
      var btn = $(this);
      var val = btn.val();
      if (val == 'up')
        moveUp(btn.parents('.item'));
      else
        moveDown(btn.parents('.item'));
    });
    $('body').on('click', '.list-move2 button', function() {
      var btn = $(this);
      var val = btn.val();
      if (val == 'up')
        moveUp(btn.parents('.item2'));
      else
        moveDown(btn.parents('.item2'));
    });
    $("#formAssociacao").submit(function(e) { 
        var url =  $(this).attr('action'); 
        $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(), 
                success: function(data){
                console.log(data)
                $("#modalConteudos").modal('hide');
                swal("Success!", "Atualizado com sucesso!", "success");
                }
        });
      e.preventDefault(); 
    });
    $("body").on('click','.modalConteudos',function(e){
      e.preventDefault();
      var url = $(this).attr('href');
      $("#formAssociacao").attr('action',url);
      $.get(url,function(data){
          console.log(data)
          $.each(data,function(key,value){
            $("input[value='"+value+"']").attr('checked','checked')
          })
          $("#modalConteudos").modal('show')
      })
    })
  })
</script>
@endsection