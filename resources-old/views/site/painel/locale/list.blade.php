@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
<section class="content-header">
    <h1  class="col-6">Locale</h1>
</section>
<section class="col-2 float-left">
    <ul class="list-group br-8">
        <li class="list-group-item "><a href="{{route('admin.tools.index')}}">General</a></li>
        <li class="list-group-item bg-blue-opacity"><a href="{{route('admin.country.index')}}">Languages</a></li>
    </ul>
</section>
<section class="col-10 float-right">
    <div class="card card-default col-12 m-top-md br-8">
        <div class="card-header with-border">
            <h2 class="card-title ">List</h2>
            <a href="{{route('admin.country.new')}}" class="btn btn-primary btn-xs btn-flat p-all-sm"
                style="margin-left:10px">
                <i class="fa fa-plus"></i>
            New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Initials</th>
                        <th>Flag</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locales as $k => $item)
                    <tr>
                        <td >
                            {{$item->title}}
                        </td>
                        <td>
                            {{$item->flag}}
                        </td>
                        <td>
                            <span class="flag-icon flag-icon-{{strtolower($item->flag) }}"></span>
                        </td>
                        <td class="text-right">
                            <a href="{{route('admin.country.delete',['id'=>$item->id])}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-destroy btn-xs btn-flat p-all-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="{{route('admin.country.edit',['id'=>$item->id])}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary btn-xs btn-flat p-all-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="7"></td>
                </tr>
                </tfoot>
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