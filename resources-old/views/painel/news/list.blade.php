@extends('layouts.painel')
@section('pre-assets')
<style>
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
    label {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
    }
    li a {
        color: #000;
        font-size: 15px;
    }
    .bg-blue-opacity {
        background-color: #ccf4fb;
    }
    .bg-blue-opacity a {
        color: #007bff;
        font-weight: bold;
    }
</style>
@endsection
@section('content')
<section class="col-sm-12 mt-5 mb-3">
    <div class="col-2">
    </div>
    <div class="col-10 float-right">
        <h4><b>News</b></h4>
    </div>
</section>
<section class="col-2 float-left">
    <ul class="list-group br-8">
        <li class="list-group-item bg-blue-opacity"><a href="">News</a></li>
        <li class="list-group-item"><a href="">Category</a></li>
    </ul>
</section>
<section class="col-10 float-right">
    <div class="card card-default col-12 m-top-md br-8">
        <div class="card-header with-border">
            <h2 class="card-title ">List</h2>
            <a href="{{route('admin.news.new')}}" class="btn btn-primary btn-xs btn-flat p-all-sm"
                style="margin-left:10px">
                <i class="fa fa-plus"></i>
                New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-hover">
                <tr>
                    <th>Title</th>
                    <th class="text-center">Category</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
                <tr>
                    <td>
                        <p>AHR Expo | Orlando 2020</p>
                    </td>
                    <td class="text-center">
                        <p>CORPORATE</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Aquatech | Amsterdam< 2019</p>
                    </td>
                    <td class="text-center">
                        <p>CORPORATE</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>CB-AF:the brand new carbon block filter cartridges!</p>
                    </td>
                    <td class="text-center">
                        <p>CORPORATE</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>WQA Convention & Exposition | Las Vegas 2019</p>
                    </td>
                    <td class="text-center">
                        <p>CORPORATE</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                    <p>WQA Convention & Exposition | Las Vegas 2019</p>
                    </td>
                    <td class="text-center">
                        <p>CORPORATE</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>New Atlas Filtri Cardboard Display!</p>
                    </td>
                    <td class="text-center">
                        <p>CORPORATE</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>AHR Expo | Orlando 2020</p>
                    </td>
                    <td class="text-center">
                        <p>CORPORATE</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
@section('pos-script')
<script type="text/javascript">
</script>
@endsection
