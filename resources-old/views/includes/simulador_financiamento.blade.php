<section class="main-form">
			<div class="container-fluid">
			{!!Form::open(['route'=>'simulador','id'=>"form-simulador"])!!}
				
					<div class="col-md-5">
						<h4 class="title">Simule um financiamento</h4>
						<p class="content">Este simulador não representa o calculo exato dos bancos, porem ele serve como base, para você ter uma ideia de valores para aquisição do seu imóvel.</p>
						<p class="content">Se você preferir pode entrar em contato conosco que um de nossos corretores poderá orienta melhor na hora da compra.</p>
					</div>

					<article class="col-md-offset-1 col-md-6" >
						<div id="camposSimulador" >
							<div class="row">
								<div class="col-md-6">
									<div class="input-group clearfix">
										<label class="control-label">Valor do imóvel</label>
										<input type="text" class="form-control money" name="valor_imovel" id="valor_imovel" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group clearfix">
										<label class="control-label">Renda Familiar</label>
										<input type="text" value="" class="form-control money" name="renda_familiar" id="valorEntrada">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="input-group">
										<label class="control-label">Entrada</label>
										<input type="text" class="form-control money" value="" name="valor_entrada" id="valor_entrada">
									</div>
								</div>

								<div class="col-md-6">
									<div class="input-group">
										<label class="control-label">Tipo Imóvel</label>
										<select name="tipo_imovel" id="tipo_imovel" class="form-control">
											<option selected="selected">Selecione...</option>
								     		<option value="residencial" >Residencial</option>
								        	<option value="comercial">Comercial</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<label class="control-label">Estado do Imóvel</label>
										<select name="estado_imovel" id="estado_imovel" class="form-control">
											<option selected="selected">Selecione...</option>
								     		<option value="novo" Novo</option>
	      									<option value="usado">Usado</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<label class="control-label">Possui imóvel</label>
										<select name="possui_imovel" id="possui_imovel" class="form-control">
											<option selected="selected">Selecione...</option>
								     		<option value="sim">Sim</option>
	      									<option value="nao">Não</option>
										</select>
									</div>
								</div>
							</div>

							<div class="clearfix">
								<button type="button" class="btn btn-warning btn-action bt-simular" id="btn-simulador">Simular</button>
							</div>
						</div>
						<div  id="resultadoSimulador" style="display: none; ">
						<h4 class="title">Resultado</h4>
						
						<div  class="row">
						<div class="col-sm-6"><h4>Parcela: </h4></div>
						<div class="col-sm-6">R$ <span id="parcelaFinanciamento"></span></div>
							
							
						</div>
				       
				         
				        <div class="row">
				        	<div class="col-sm-6"><h4>Prazo:</h4></div>
				        	<div class="col-sm-6"><span id="prazoMeses"></span> Meses</div>
				        </div>
				        <div class="row">
				        	<div class="col-sm-6"><h4>Valor Máximo Financiado:  </div>
				        	<div class="col-sm-6">R$ <span id="valorFinanciado"></span></div>
				        </div>
				        <div class="row">
				        	<div class="col-sm-6"><h4>Valor da Entrada: </div>
				        	<div class="col-sm-6">R$ <span id="entrada"></span></div>
				        	<div class="col-sm-12">O valor da parcela não pode ultrapassar 30% do valor da renda.</div>
				        </div>
				         
				    	
					</div>
					</article>
					
				{!!Form::close()!!}
			</div>
		</section>