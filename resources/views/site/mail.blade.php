<form action="{{ route('site.sendMail')}}" method="POST" class="row">
                        @csrf
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control nome" name="name" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control email" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefone</label>

                                <input type="tel" name="tel" id="phone" class="telMask form-control " maxlength="99">
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 mt-3">
                            <div class="form-group ">
                                <label for="exampleFormControlTextarea1">Mensagem</label>
                                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 text-center mt-4">

                            <button type="submit" class="btn btn-success">ENVIAR</button>

                        </div>
                    </form>