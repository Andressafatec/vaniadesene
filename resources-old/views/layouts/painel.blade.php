<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{env('SITE_NAME')}}</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/estilo.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/iCheck/all.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/multi-level-accordion-menu-master/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

  <link rel="apple-touch-icon" sizes="57x57" href="{{asset('min/img/favicon/apple-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{asset('min/img/favicon/apple-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('min/img/favicon/apple-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('min/img/favicon/apple-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('min/img/favicon/apple-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('min/img/favicon/apple-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{asset('min/img/favicon/apple-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('min/img/favicon/apple-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('min/img/favicon/apple-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('min/fivico')}}n/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('min/img/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('min/img/favicon/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('min/fiviconfavicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('min/img/favicon/manifest.json')}}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{asset('min/img/favicon/ms-icon-144x144.png')}}">
  <meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" type="text/css" href="{{asset('/adminLTE/plugins/daterangepicker/daterangepicker.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />



  <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet">

  <style>
    
    .layout-top-nav:not(.sidebar-collapse) .navbar-collapse{
    padding-left: 190px;
    transition: 0.2s all linear;
  }
    .flag-text { margin-left: 10px; }
    .note-editable.card-block div {
      border: 1px dotted #666;
    }
    .footerActions{
      position: fixed;
      width: calc(100% - 73px);
      background: #fff;
      z-index: 100;
      bottom: 0;
      left: 73px;
      opacity: 0.5;
    }
    .footerActions:hover{
      opacity: 1;
    }
    .content-wrapper>.content {
      padding-bottom: 100px;
    }
    .list-action {
      padding: 10px;
    }

    .center-form{
      width: 1000px;
      margin: 0 auto;
    }

    .categorias{
      list-style: none;
      padding-left: 8px;
    }

    .coluna-flex{
      overflow-y: scroll;
      height: 240px;
      max-height: 240px;
    }
    .is-invalid {
      color: #dc3545;
    }
    th,
    td {
      text-align: left;
    }

    .list-group-item:first-child {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }


    .list-group-item:last-child {
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
    }

    td img {
      max-width: 100px;
      max-height: 40px;
    }

    .star {
      color: gray;
    }

    .star.select {
      color: #ff9f00;
    }


    li a{
      color: #000;
    }

    .bg-blue-opacity{
      background-color: #ccf4fb;
    }

    .bg-blue-opacity a{
      color: #007bff;
      font-weight: bold;

    }
    #preview_icon li {
    padding: 0px; 
    text-align: center;
    float: left;
    margin: 10px;
    position: relative;
    width: 50%;
}
.previewGaleria ul {

  list-style: none;
}
.previewGaleria li a{
  display: inline-block;
    height: 25px;
    line-height: 20px;
    vertical-align: top;
    background: #dc3545;
    width: 25px;
    border-radius: 50%;
    text-align: center;
    color: #fff;
    margin-right: 10px;;
}

.previewGaleria li{
  float: left;
    list-style: none;
    height: 100px;
    vertical-align: top;
    margin:10px;
    background:#ededed;
    padding:5px;
    border-radius: 20px;;
    cursor: move 

}
.previewGaleria li img{
  height:90px;
  border-radius: 20px;
}
body.dragging, body.dragging * {
  cursor: move !important;
}
.previewGaleria li.placeholder{
  width:100px;
  position: relative;
 
}
.previewGaleria li.placeholder:after{
  position:absolute;
  content:"Solte Aqui";
  width: 100%;
  text-align: center;
  top: 20px;;
}
.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}
  </style>

  @yield('pre-assets')
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark " >
      <div class="container-fluid">
        <a href="{{route('admin.index')}}" class="navbar-brand bg-dark">
          <img src="{{asset('images/logo-branco-09.svg')}}" class="brand-image bg-dark" >
        
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button" data-toggle="tooltip" data-placement="bottom" title="Menu"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
              <a href="" target="_blank" data-toggle="tooltip" data-placement="bottom" title="View Site" class="nav-link">
                <i class="fas fa-globe"></i>
              </a>
            </li>
           


          </ul>

          <!-- SEARCH FORM -->

      

        <!-- Right navbar links -->
  <div class="navbar-nav ml-auto">
     <li class="nav-item float-right">
               <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          {{ csrf_field() }}
            <button type="submit" class="btn btn-default btn-flat btn-xs mr-3">Sair</button>
          </form>
            </li>
  </div>
      </div>
  </div>
    </nav>

    <!-- /.navbar -->
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" >
      <!-- Brand Logo -->
      <a href="{{route('admin.index')}}" class="brand-link text-center" style="padding-left: 0; padding-right: 0; text-align: center;">
        <img src="{{asset('images/logo-branco-09.svg')}}" alt="{{config('app.name')}}" >
      </a>
      <a href="" class="brand-link" target="_blank" style="padding-left: 25px; padding-right: 25px;">
        <i class="fas fa-globe"></i>
        <span class="brand-text font-weight-light" style="padding-left: 25px;">Visitar Site</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <i class="fas fa-user-alt text-white d-inline" ></i>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
       
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{route('admin.dash')}}" class="nav-link">
             <i class="fas fa-tachometer-alt text-white"></i>
             <p class="text-white">
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
      <a href="{{route('admin.banners.list')}}" class="nav-link @if(strpos(request()->fullUrl(), "media")) active @endif"><i class="far fa-images text-white"></i>
        <span class="text-white">Banners</span>
      </a>
    </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
         <i class="fas fa-folder-open text-white"></i>
         <p class="text-white">
          Conteúdos
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
      @foreach($sections as $key => $section)
        <li class="nav-item has-treeview">
          <a href="{{route('admin.contents.list',['slug'=>$section->route])}}" class="nav-link">
            <i class="far fa-file-alt text-white"></i>
            <p class="text-white">
              {{$section->title}}
            </p>
          </a>

        </li>
 @endforeach

      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
       <i class="fas fa-cogs text-white"></i>
       <p class="text-white">
        Configurações
        <i class="right fas fa-angle-left text-white"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">


     <li class="nav-item has-treeview">
      <a href="{{route('admin.tools.index')}}" class="nav-link">
        <i class="fas fa-tools text-white"></i>
        <p class="text-white">Ferramentas</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.media.index')}}" class="nav-link @if(strpos(request()->fullUrl(), "media")) active @endif"><i class="fa fa-camera text-white"></i>
        <span class="text-white">Media</span>
      </a>
    </li>
   
    <li class="nav-item">
      <a href="{{route('admin.tiposMenu.index')}}" class="nav-link @if(strpos(request()->fullUrl(), "tiposMenu")) active @endif"><i class="fa fa-bars text-white"></i>
        <span class="text-white">Menu</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.users.list')}}" class="nav-link @if(strpos(request()->fullUrl(), "tiposMenu")) active @endif"><i class="fa fa-users text-white"></i>
        <span class="text-white">Usuários</span>
      </a>
    </li>

  </ul>
</li>

 
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    @yield('content')
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.14/jquery.mask.min.js"></script>
<script src="{{asset('adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/multi-level-accordion-menu-master/assets/js/main.js')}}"></script>
<script src="{{asset('adminLTE/plugins/multi-level-accordion-menu-master/assets/js/util.js')}}"></script>
<script src="{{asset('adminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />




<script src="{{asset('/adminLTE/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/cowo4pipmvsu7224pyg0bate5mgt6wtus8n0zecwmfukg1bc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="https://johnny.github.io/jquery-sortable/js/jquery-sortable.js"></script>
<script type="text/javascript" src="{{asset('adminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
<script>
$(".dateFlatpicker").flatpickr({
  locale: "pt",
                                altInput: true,
                                altFormat: "d/m/Y",
                                dateFormat: "Y-m-d",
    });
  $('.my-colorpicker2').colorpicker()
  $('.my-colorpicker2').on('colorpickerChange', function(event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
  });


  $('.datetimepicker').datetimepicker();

$('.datetimepicker').datetimepicker({ locale: 'pt-br',
  format: 'DD/MM/YYYY H:mm:s'});

$('.dataPicker').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true,
  autoUpdateInput:false,

}, function(start_date, end_date)  {
 this.element.val(start_date.format('MM/DD/YYYY'));
})
$('.dataPicker2').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true,
  autoUpdateInput:false,
  "minDate": "{{date('m/d/Y')}}"

}, function(start_date, end_date)  {
 this.element.val(start_date.format('MM/DD/YYYY'));
})


   
   
   
    


CKEDITOR.editorConfig = function( config ) {

config.ForcePasteAsPlainText = true;
config.pasteFromWordRemoveStyles =true;
};

  function getinitEditor(){
        $("textarea").each(function(){

          CKEDITOR.replace( $(this).attr('id'), {
           
   
            
    filebrowserImageUploadUrl:'{{route("admin.ajax.upload-ck-editor",["_token"=>csrf_token()])}}',
    
}  );

        })
    /* tinymce.init({
      selector: '.summernote'
    });*/
  }
getinitEditor()
  $('[data-toggle="tooltip"]').tooltip();
  $(function () {
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $('.timeMask').mask('00:00');
   $('.dataMask').mask('00/00/0000');
   $('.dateTimeMask').mask('00/00/0000 00:00:00');
   $('.cepMask').mask('00000-000');
   $('.mixed').mask('AAA 000-S0S');
   $('.cpfMask').mask('000.000.000-00', {reverse: true});
   $('.moneyMask').mask('000.000.000.000.000,00', {reverse: true});
   var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
  };

  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy 00:00:00',
    language:'pt-BR',
    autoclose:true,
    startDate: '-0d'
  });
  $('.telMask').mask(SPMaskBehavior, spOptions);
    //Initialize Select2 Elements
    $(".select2").select2({
      placeholder: "Select ...",
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass: 'iradio_flat-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-orange, input[type="radio"].flat-orange').iCheck({
      checkboxClass: 'icheckbox_flat-orange',
      radioClass: 'iradio_flat-orange'
    });
    $('.abrir').on('click', function(e) {
      e.preventDefault();

      var target = $(this).data('alvo');
      $(this).fadeOut('500','linear',function(){
        $('.fecharSidebar').show('fast','linear');
      });

      $(target).animate({
        left: '0',
      })
    });
    $('.fecharSidebar').on('click', function(e){
      e.preventDefault();
      $(this).fadeOut('500','linear',function(){
        $('.abrir').show('fast','linear');
      });

      var x = screen.width;
      var target = $(this).data('alvo');
      $(target).animate({
        left: '-100%',
      },500)
    })
    $(".btn-destroy").click(function(e){
      var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
      //$(this).closest('.box').addClass("remove-row");
      swal({
        title: "Você tem certeza?",
        text: "Você removerá permanentemente este item",
        icon: "warning",
        dangerMode: true,
        buttons:{
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "",
            closeModal: true,
          },
          confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "",
            closeModal: true
          }
        }
      }) .then(willDelete => {
       if (willDelete) {
         $.get(url,function(data){
           $(".remove-row").remove();
           if (willDelete) {
            swal("Sucesso!", "Item removido com sucesso", "success");
          }
        });
       }
     });
    })

  

    $("body").on('click',".openPopUpMedia",function(e){
      e.preventDefault();

      var target = $(this).data('target');
      if(target == "dynamyc" || target == "galeriaBlock"){

        $(this).closest('section').addClass('currentTarget');
        $("#contentMedia").find('.checkFile').prop('checked',false);
      }
      openPopUpMedia(target)
    })
  });
function openPopUpMedia(target){
  if(target){
    localStorage.setItem("media_target", target);
  }else{
   localStorage.setItem("media_target", 'conteudo');
 }
 if($("#contentMedia").html() == ""){
  $.get('{{route("admin.media.popUp")}}',function(data){
    $("#contentMedia").html(data);
    $('#modalMedia').modal('show');
    $("#contentMedia").find('.checkFile').prop('checked',false);

  })
}else{
 $('#modalMedia').modal('show')
 //$("#modalMedia .content").removeClass('hidden')
 $("#contentMedia").find('.checkFile').prop('checked',false);

}
}


</script>
<div class="modal fade" id="modalMedia" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content" style="padding: 10px;" >
     <div id="contentMedia"></div>
     <div class="clearfix"></div>
   </div>
 </div>
</div>
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })


</script>
@yield('pos-script')
</body>
</html>
