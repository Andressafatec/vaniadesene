@extends('layouts.painel')
@section('title')
Home | Users
@stop
@section('content')
<section class="content-header col-xs-12 col-sm-8 col-sm-offset-2 ">
  <h1  class="col-6 p-all-0">Usuários</h1>
</section>
<section class="card card-default col-xs-12 col-sm-8 col-sm-offset-2 m-top-md">
 <div class="card-header with-border">
  <h3 class="card-title">Lista</h3>
  <div class="float-right">
    <a href="{{route('admin.users.new')}}" class="btn btn-primary btn-xs btn-flat btn-block">
      <i class="fa fa-plus"></i>  Novo</a>
  </div>
</div>
<!-- /.card-header -->
<!-- /.card-header -->
<table class="table card-body table-hover">
 <thead>
  <tr class="headings">
   <th class="text-center"># ID</th>
   <th >Nome</th>
   <th class="column-title text-center">Último acesso</th>
   <th class="no-link last text-center"><span class="nobr">Ações</span></th>
 </tr>
</thead>
<tbody>
 @foreach ($users as $user) 
 <tr class="even pointer" id="usuario-{{$user->id}}">
  <td class="text-center">{{$user->id}}</td>
  <td class="text-left" valing="middle" >{{$user->name}}</td>
  <td class="text-center">
   {{gmdate('d/m/Y H:m',strtotime($user->updated_at))}}
 </td>
 <td class="text-center">
  <a href="{{route('admin.users.edit',['id'=>$user->id])}}" class="btn btn-info btn-xs"><i class="fas fa-pencil-alt"></i>  </a>
  <a href="{{route('admin.users.delete',['id'=>$user->id])}}" class="btn btn-danger btn-destroy btn-xs" data-destroy="{{$user->id}}"><i class="far fa-trash-alt"></i>  </a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</section>
@endsection
@section('pos-script')
<script type="text/javascript">
  $(document).ready(function(){
    $(".btn-danger").click(function(e){
      var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
      swal({
        title: "Are you sure?",
        text: "Will you permanently remove this item?",
        icon: "warning",
        dangerMode: true,
      })
      .then(willDelete => {
       $.get(url,function(data){
         $(".remove-row").remove();
         if (willDelete) {
          swal("Success!", "Item successfully removed.", "success");
        }
      });
     });
    })
  })
</script>
@endsection