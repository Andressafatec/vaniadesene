@extends('layouts.painel')
@section('pre-assets')
<style>
    .controle_950 {
        max-width: 950px !important;
        margin: 0 auto;
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
    label {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
    }
    li a {
        color: #000;
    }
    .bg-blue-opacity {
        background-color: #ccf4fb;
    }
    .bg-blue-opacity a {
        color: #007bff;
        font-weight: bold;
    }
    .card {
        padding: 0 !important;
    }
    td:first-child,
    th:first-child {
        width: 500px;
    }
</style>
@endsection
@section('content')
<section class="col-sm-12 mt-5 mb-3 controle_950" style="margin-left: 130px;">
    <div class="col-4">
        <h4><b>About Us</b></h4>
    </div>
</section>
<section class="col-10 controle_950">
    <div class="card card-default col-12 m-top-md br-8">
        <div class="card-header with-border">
            <h2 class="card-title">List</h2>
            <a href="{{route('admin.products.novo')}}" class="btn btn-primary btn-xs btn-flat p-all-sm"
                style="margin-left:10px">
                <i class="fa fa-plus"></i>
                New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-hover">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th class="text-center">Featured</th>
                    <th class="text-right">Actions</th>
                </tr>
                <tr>
                    <td>
                        <p>History</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-center">
                        <p class="star select">
                            <i class="fas fa-star"></i>
                        </p>
                    </td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-success btn-xs btn-flat p-all-sm">
                            <i class="far fa-copy"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>STRATEGY AND VALUES</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-center">
                        <p class="star">
                            <i class="fas fa-star"></i>
                        </p>
                    </td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-success btn-xs btn-flat p-all-sm">
                            <i class="far fa-copy"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Know How</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-center">
                        <p class="star">
                            <i class="fas fa-star"></i>
                        </p>
                    </td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-success btn-xs btn-flat p-all-sm">
                            <i class="far fa-copy"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Quality</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-center">
                        <p class="star">
                            <i class="fas fa-star"></i>
                        </p>
                    </td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-success btn-xs btn-flat p-all-sm">
                            <i class="far fa-copy"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>OUR GLOBAL PRESENCE</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-center">
                        <p class="star">
                            <i class="fas fa-star"></i>
                        </p>
                    </td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-success btn-xs btn-flat p-all-sm">
                            <i class="far fa-copy"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-xs btn-flat p-all-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>MEMBERSHIP</p>
                    </td>
                    <td><label class="btn-success">active</label></td>
                    <td class="text-center">
                        <p class="star">
                            <i class="fas fa-star"></i>
                        </p>
                    </td>
                    <td class="text-right">
                        <a href="#" class="btn btn-danger btn-xs btn-flat p-all-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-success btn-xs btn-flat p-all-sm">
                            <i class="far fa-copy"></i>
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
