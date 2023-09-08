<div id="modalSearch">
        <a href="" class="btnClose">
          <i class="fas fa-times"></i>
        </a>
        <div class="container">
            
                
                <form action="{{ route('site.imoveis.index')}}" method="GET" id="formSerachModal">
                <div class="">

                    <div class="row">
                      <div class="col-12 col-sm-6 mt-2 selectSearch">
                        <h4>Modalidade</h4>
                        <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" name="contrato[]"  value="Venda" type="checkbox"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                Venda
                            </label>
                        </div>
                     
                        <div class="form-check">
                            <input class="form-check-input" name="contrato[]"  value="Locação" type="checkbox"
                                id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                            Locação
                            </label>
                        </div>
                        </div>
                      </div>
                      <div class="col-6 mt-2 selectSearch">
                      <h4>Tipo Imóvel</h4>
                        <select id="selectOption" class="form-select form-select-lg" name="tipo">
                          <option value="">Selecione </option>
                          @foreach($tipos as $k => $tipo)
                          <option value="{{$tipo}}"> {{$tipo}}</option>
                          @endforeach
                        
                        </select>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-12 col-sm-6 mt-2 selectSearch">
                      <h4>Cidade</h4>
                      <select id="selectOption" class="form-select form-select-lg" name="cidade"> 
                      <option value="">Selecione </option>
                        @foreach($bairros as $kCidade => $vBairros)
                        <option value="{{$kCidade}}">  {{Helper::corrigiAcento($kCidade)}}</option>
                        @endforeach
                       
                      </select>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 selectSearch">
                    <h4>Bairro</h4>
                      <select id="selectOption" name="bairro" class="form-select form-select-lg">
                        <option value=""> Selecione </option>
                        @foreach($bairros as $kCidade => $vBairros)
                        @foreach($vBairros as $kBairro => $vBairro)
                        <option value="{{ $vBairro['bairro']}}" data-cidade="{{$kCidade}}">  {{Helper::corrigiAcento($vBairro['bairro'])}}</option>
                        @endforeach
                        
                        @endforeach
                      </select>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-12"> </div>
                    <div class="col-12 col-sm-6 mt-2">
                    <h4>Valor Minimo</h4>
                      <input type="text" name="valormin" placeholder="Valor Mínimo" class="form-control form-control-lg">
                    </div>
                    <div class="col-12 col-sm-6 mt-2">
                    <h4>Valor Máximo</h4>
                      <input type="text" name="valormax" placeholder="Valor Máximo" class="form-control form-control-lg">
                    </div>
                    </div>
                    <div class="col-12 justify-content-center d-flex mt-4">
                        <button type="submit" class="btnBuscar">BUSCAR</button>
                    </div>
                  
                </div>
                </form>
           
        </div>
    </div>