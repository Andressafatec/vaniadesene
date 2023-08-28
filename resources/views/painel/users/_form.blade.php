 <div class="card-body">
       <!-- radio -->
       <div class="form-group col-md-6">
   <label for="">Nome</label>
          <input type="text" class="form-control" name="name" required="" value="{{@$usuario->name}}">
      </div>
          <div class="form-group col-md-6">
          <label for="">E-mail</label>
          <input type="email" class="form-control" name="email" required="" value="{{@$usuario->email}}">
         </div>
           <div class="form-group col-md-6">
          <label for="">Senha</label>
          <input type="password" class="form-control" name="password" required="">
         </div>
          <div class="form-group col-md-6">
          <label for="">Confirmar senha</label>
          <input type="password" class="form-control" name="password_confirmation" required="">
         </div>
      <div class="clearfix"></div>
      <!-- /.card-body -->
      <hr>
      <div class="">
        <a href="{{route('admin.users.list')}}" class="btn btn-default  btn-flat" id="cancelar">Cancelar</a>
        <button type="submit" class="btn btn-success btn-flat float-right" id="salvar">Salvar</button>
      </div>
        </div>