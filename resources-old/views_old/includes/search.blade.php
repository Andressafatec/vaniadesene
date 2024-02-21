 <section class="main-home-search">
				<div class="container">
	      	<h2 class="main-home-title">Encontre seu imóvel</h2>
				{!! Form::open(['route'=>'filtrar-imovel','class'=>'main-home-filters','id'=>'formFiltro','method'=>'get'])!!}
				 {{ csrf_field() }}
					
						<div class="select-wrapper select-finalidade"">
							<div class="select" data-name="finalidade[]">
							<span class="default">FINALIDADE</span>
							<span class="total"></span>
							</div>
								<ul >
								@foreach($getFinalidade as $key =>$value )
									<li><input type="checkbox" name="finalidade[]" value="{{$key}}">{{$value}}</li>
								@endforeach
								</ul>
						</div>
					
						<div class="select-wrapper select-contrato">
							<div class="select" data-name="contrato[]">
							<span class="default">STATUS</span>
							<span class="total"></span>
							</div>
								<ul >
								@foreach($getStatus as $key =>$value )
									<li><input type="checkbox" name="contrato[]" value="{{$key}}">{{$value}}</li>
								@endforeach
								</ul>
						</div>
						<div class="select-wrapper select-tipo">
							<div class="select" data-name="tipo[]">
							<span class="default">TIPO IMÓVEL</span>
							<span class="total"></span>
							</div>
								<ul style="width: 250px;">
								@foreach($getTipoImovel as $key =>$value )
									<li><input type="checkbox" name="tipo[]" value="{{$key}}">{{$value}}</li>
								@endforeach
								</ul>
						</div>
						<div class="select-wrapper select-cidade">
							<div class="select" data-name="cidade[]" data-route="{{route('ajax.bairro')}}">
							<span class="default">CIDADE</span>
							<span class="total"></span>
							</div>
								<ul style="width: 300px;">
								@foreach($getCidade as $key =>$value )
									<li><input type="checkbox" name="cidade[]" value="{{$key}}">{{$value}}</li>
								@endforeach
								</ul>
						</div>
						<div class="select-wrapper select-bairro">
							<div class="select desable" data-name="regiao[]">
							<span class="default">BAIRRO</span>
							<span class="total"></span>
							</div>
								<ul style="width: 250px;">
								
								</ul>
						</div>
						

						<div class="select-wrapper select-valor">
							<div class="select desable" data-name="valor[]">
							<span class="default">VALOR</span>
							<span class="total"></span>
							</div>
								<ul style="width: 220px; display: none;" id="valores-venda">
									<li><input type="radio" name="valor" value="0-250000">até R$ 250.000,00</li>
									<li><input type="radio" name="valor" value="250001-500000">de R$ 250.000,00 até R$ 500.000,00</li>
									<li><input type="radio" name="valor" value="500001-750000">de R$ 500.000,00 até R$ 750.000,00</li>
									<li><input type="radio" name="valor" value="750001-1000000">de R$ 750.000,00 até R$ 1.000.000,00</li>
									<li><input type="radio" name="valor" value="1000001-all">acima de R$ 1.000.000,00</li>
								</ul>
								<ul style="width: 220px; display: none;" id="valores-locacao">
									<li><input type="radio" name="valor" value="0-1000">até R$ 1.000,00</li>
									<li><input type="radio" name="valor" value="1001-10500">de R$ 1.000,00 até R$ 1.500,00</li>
									<li><input type="radio" name="valor" value="1501-2000">de R$ 1.500,00 até R$ 2.000,00</li>
									<li><input type="radio" name="valor" value="2001-2500">de R$ 2.000,00 até R$ 2.500,00</li>
									<li><input type="radio" name="valor" value="2501-3000">de R$ 2.500,00 até R$ 3.000,00</li>
									<li><input type="radio" name="valor" value="3001-5000">de R$ 3.000,00 até R$ 5.000,00</li>
									<li><input type="radio" name="valor" value="5001-8000">de R$ 5.000,00 até R$ 8.000,00</li>
									<li><input type="radio" name="valor" value="8001-10000">de R$ 8.000,00 até R$ 10.000,00</li>
									<li><input type="radio" name="valor" value="10000-all">acima de R$ 10.000,00</li>
								</ul>
						</div>

						<div class="call-to-action">
							<button type="submit" class="btn btn-search">Buscar <i class="icon-search"></i></button>
						</div>
					{!! Form::close() !!}
					{!! Form::open(['route'=>'search','class'=>'main-home-filters-ref','method'=>'get'])!!}
						<h3 class="title">Já tem uma de nossas referências?</h3>
						<div class="filter-group">
							<input type="search" class="form-control" name="ref" placeholder="123">
							<button type="submit" class="btn btn-search"><i class="icon-search"></i></button>
						</div>
					{!! Form::close() !!}
				</div>
	    </section>
