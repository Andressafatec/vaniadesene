@extends('layouts.painel')
@section('pre-assets')
@endsection
@section('content')
     <section class="content-header">
                    <h1  class="col-6">WebRadio\Homilias</h1>
                        <div class="clearfix"></div>
  </section>
<section class="col-12">
<div class="col-12">
            <div class="card">
              <div class="card-header">
              <a class="btn btn-success btn-sm" href="{{route('admin.celulas.novo')}}">
                  <i class="fas fa-plus"></i>
                  Cadastrar
                </a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Data</th>
                      <th>Padre</th>
                      <th>Tema</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>001</td>
                      <td>01/01/2019</td>
                      <td>Rogério Felix</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                      <td>Ativo</td>
                    </tr>
                    <tr>
                      <td>002</td>
                      <td>02/01/2019</td>
                      <td>Luciano Barbosa</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                      <td>Ativo</td>
                    </tr>
                    <tr>
                      <td>003</td>
                      <td>03/01/2019</td>
                      <td>Rogério Félix</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                      <td>Ativo</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
</section>
@endsection
@section('pos-script')
<script type="text/javascript">
</script>
  @endsection
