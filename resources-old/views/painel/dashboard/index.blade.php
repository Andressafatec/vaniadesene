@extends('layouts.painel')
@section('title')
Home
@stop
@section('content')
<div class="container">
  <div class="row">
   <div id="paginasDashboard" class="w-100">
    <ul>
    @foreach($sections as $key => $section)
        
        <li class="col-sm-3">
         <a href="{{route('admin.contents.list',['slug'=>$section->route])}}"  class="bg-gradient-dark" >
          <i class="far fa-file-alt"></i>
          {{$section->title}}
        </a>
      </li>
 @endforeach
     
      <li class="col-sm-3">
         <a href="{{route('admin.users.list')}}"  class="bg-gradient-dark" >
          <i class="fas fa-users"></i>
         Usuários
        </a>
      </li>
      <li class="col-sm-3">
         <a href="{{route('admin.tools.index')}}"  class="bg-gradient-dark" >
          <i class="fas fa-cogs"></i>
         Ferramentas
        </a>
      </li>
      <li class="col-sm-3">
         <a href="{{route('admin.tiposMenu.index')}}"  class="bg-gradient-dark" >
          <i class="fa fa-bars" aria-hidden="true"></i>
         Menu
        </a>
      </li>
      <li class="col-sm-3">
         <a href="{{route('admin.media.index')}}"  class="bg-gradient-dark" >
          <i class="far fa-file" aria-hidden="true"></i>
         Media
        </a>
      </li>
      <li class="col-sm-3">
         <a href="{{route('admin.banners.list')}}"  class="bg-gradient-dark" >
          <i class="far fa-images" aria-hidden="true"></i>
         Banners
        </a>
      </li>
      <li class="col-sm-3">
         <a href="{{route('admin.imoveis.list')}}"  class="bg-gradient-dark" >
          <i class="fa fa-home" aria-hidden="true"></i></i>
         Imóveis
        </a>
      </li>
      <li class="col-sm-3">
         <a href="{{route('admin.corretor.list')}}"  class="bg-gradient-dark" >
          <i class="fa fa-home" aria-hidden="true"></i></i>
         Corretor
        </a>
      </li>
  </ul>
</div>
</div>
</div>
@endsection
