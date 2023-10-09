var Cadastro = Class.create(Basico, {
	initialize: function(PROXY, queryString) {
		this.proxy=PROXY;
		this.imovel=null;
		this.cidades=new FaixasValores();
		this.queryString=queryString;
		this.estadoCidade = new EstadoCidade(this.proxy, {});
		this.tipoImovel=new TipoImovel(this.proxy, {});
		this.proprietario=new Proprietario(this.proxy, {});
		this.suggest=null;
		this.tabImovel=null;
		this.GRAVANDO=false;
	},
	preparaProprietario:function() {
		this.proprietario.queryString=this.queryString;
		this.proprietario.carrega();
	},
	preparaTipoImovel:function() {
		if (DEBUG==true) {
			$('tdImoTipo').innerHTML='';
			return;
		}
		this.tipoImovel.queryString=this.queryString;
		this.tipoImovel.carrega();
	},
	preparaEstadoCidade:function() {
		this.estadoCidade.carrega(0,this.queryString);
	},
	carrega: function() {
		this.preparaProprietario();
		this.carregaCtr();
		this.preparaTipoImovel();
		this.criaTabImovel();
		this.preparaEstadoCidade();
		new MaskedInput('txtImoCep','#####-###');
		this.suggest=new TextSuggest(this.proxy,'divTabsImovel','txtImoEnd','cboImoUF','cboImoCid','txtImoBai','txtImoCep');
		$('divPesquisaTrabalho').style.display='none';
	},
	carregaCtr: function() {
		var qs = this.queryString;
		$('spanCarregaImoCtr').style.display='inline';
		new ParseXSLT(this.proxy,'contratos.csp','cadimoctr.xsl','tdCtr',qs,function() {$('spanCarregaImoCtr').style.display='none';});
	},
	criaTabImovel: function() {
		var options={panelHeight:380, hoverClass: 'panelHoverCadImovel', selectedClass:'panelSelectedCadImovel', border: '#000000', color:'#E0E8FA'};
		this.tabImovel=new Rico.TabbedPanel( $$('#divSisprof .panelHeaderCadImovel'), $$('#divSisprof .panelContentCadImovel'), options);
	},
	show: function() {
		Effect.ScrollTo('divTabsImovel',{afterFinish:function() {Effect.Appear('divTabsImovel');}});
	},
	hide: function() {
		Effect.Fade('divTabsImovel');
	},
	click: function(campo) {
		if (campo=='cboImoUF') {
			this.estadoCidade.click(campo);
		} else if (campo=='cboImoTipo') {
			this.tipoImovel.click();
		}
	},
	showTab: function (oldTab,proxTab) {
		if (oldTab==0 && !this.validaLocalizacao()) return;
		if (oldTab==1 && !this.validaDescricao()) return;
		if (oldTab==2 && !this.validaValores()) return;
		this.tabImovel.openByIndex(proxTab);
	},
	validaLocalizacao: function() {
		var campos=[{campo:'cboImoTipo',mens:'Voc&ecirc; deve informar o Tipo do Im&oacute;vel/Bem'},
					{campo:'cboImoCtr',mens:'Voc&ecirc; deve informar o Contrato Im&oacute;vel/Bem'},
					{campo:'cboImoUF',mens:'Voc&ecirc; deve informar o Estado Im&oacute;vel/Bem'},
					{campo:'cboImoCid',mens:'Voc&ecirc; deve informar a Cidade do Im&oacute;vel/Bem'},
					{campo:'txtImoEnd',mens:'Voc&ecirc; deve informar o Endere&ccedil;o do Im&oacute;vel/Bem'},
					{campo:'txtImoBai',mens:'Voc&ecirc; deve informar o Bairro do Im&oacute;vel/Bem'},
					{campo:'txtImoNum',mens:'Voc&ecirc; deve informar o Número do Im&oacute;vel/Bem'},
					{campo:'txtImoCep',mens:'Voc&ecirc; deve informar o Cep do Im&oacute;vel/Bem'},
					{campo:'cboImoFin',mens:'Voc&ecirc; deve informar a Finalidade do Im&oacute;vel/Bem'}];
		for (var i=0;i<campos.length-1;i++) {
			if ($(campos[i].campo).value=='') {
				this.showErro(campos[i].mens,'tdMensImoLoc');
				return false;
			}
		}
		return true;
	},
	validaDescricao: function() {
		var campos=[{campo:'txtImoCha',mens:'Voc&ecirc; deve informar o como obter as Chaves do Im&oacute;vel/Bem',tipo:'t'},
								{campo:'txtImoDOR',mens:'Dormit&oacute;rio este campo DEVE conter apenas n&uacute;meros',tipo:'n'},
								{campo:'txtImoDOP',mens:'Su&iacute;tes este campo DEVE conter apenas n&uacute;meros',tipo:'n'},
								{campo:'txtImoGAR',mens:'Garagens este campo DEVE conter apenas n&uacute;meros',tipo:'n'},
								{campo:'txtImoARU',mens:'&Aacute;rea &Uacute;til este campo DEVE conter apenas n&uacute;meros',tipo:'n'},
								{campo:'txtImoART',mens:'&Aacute;rea do Terreno este campo DEVE conter apenas n&uacute;meros',tipo:'n'},
								{campo:'txtImoACO',mens:'&Aacute;rea Constru&iacute;da este campo DEVE conter apenas n&uacute;meros',tipo:'n'},
								{campo:'txtImoAND',mens:'Andares este campo DEVE conter apenas n&uacute;meros',tipo:'n'},
								{campo:'txtImoELE',mens:'Elevadores este campo DEVE conter apenas n&uacute;meros',tipo:'n'},
								{campo:'txtImoAPA',mens:'Apartamentos por andar este campo DEVE conter apenas n&uacute;meros',tipo:'n'}];
		for (var i=0;i<campos.length;i++) {
			if (campos[i].tipo=='n') {
				if (isNaN($(campos[i].campo).value)) {
					this.showErro(campos[i].mens,'tdMensImoDesc');
					return false;
				}
			} else {
				if ($(campos[i].campo).value=='') {
					this.showErro(campos[i].mens,'tdMensImoDesc');
					return false;
				}
			}
		}
		return true;
	},
	validaValores: function() {
		var campos=new Array();
		campos.push({campo:'txtImoVal',mens:'Voc&ecirc; deve informar o Valor do Im&oacute;vel/Bem',tipo:'t'});
		campos.push({campo:'txtImoVal',mens:'Valor do Im&oacute;vel/Bem este campo DEVE conter apenas n&uacute;meros',tipo:'n'});
		campos.push({campo:'txtImoCond',mens:'Valor do Condom&iacute;nio este campo DEVE conter apenas n&uacute;meros',tipo:'n'});
		campos.push({campo:'txtImoIPTU',mens:'Valor do IPTU este campo DEVE conter apenas n&uacute;meros',tipo:'n'});
		if ($('chkImoSaldo').checked) {
			campos.push({campo:'txtImoSaldoVal',mens:'Valor do Saldo Devedor este campo DEVE conter apenas n&uacute;meros',tipo:'n'});
			campos.push({campo:'txtImoSaldoPrest',mens:'Valor do presta&ccedil;&atilde; este campo DEVE conter apenas n&uacute;meros',tipo:'n'});
		}
		for (var i=0;i<campos.length;i++) {
			if (campos[i].tipo=='n') {
				if (isNaN($(campos[i].campo).value)) {
					this.showErro(campos[i].mens,'tdMensImoDesc');
					return false;
				}
			} else {
				if ($(campos[i].campo).value=='') {
					this.showErro(campos[i].mens,'tdMensImoDesc');
					return false;
				}
			}
		}
		if (parseFloat($('txtImoVal').value)<=0) {
			this.showErro('Valor do Im&oacute;vel/Bem DEVE ser maior que ZERO','tdMensImoVal');
			return false;
		}
		return true;
	},
	showSaldo: function() {
		var saldo=!$('chkImoSaldo').checked;
		$('txtImoSaldoVal').disabled=saldo
		$('txtImoSaldoTmp').disabled=saldo
		$('txtImoSaldoAg').disabled=saldo
		$('txtImoSaldoPrest').disabled=saldo
		$('cboImoSaldoPer').disabled=saldo
		$('cboImoSaldoMes').disabled=saldo
	},
	showErro: function(msg,obj) {
		if ($(obj)) {
			$(obj).innerHTML=msg;
			if (msg !='')	{
				var my=this;
				setTimeout(function() {my.showErro('',obj);},5000);
			}
		}
	},
	testaNum: function(field) {
		var campo=$(field);
		var valor = campo.value;
		if (isNaN(valor)) {
			campo.style.backgroundColor='red';
		} else {
			campo.style.backgroundColor='white';
		}
	},
	limparcampos: function() {
		$('txtImoCha').value='';
		$('txtImoVal').value='0,00';
	},
	arquivar: function() {	
		if (this.GRAVANDO==true) return;
		if (this.validaLocalizacao()==false) {
			this.tabImovel.openByIndex(0);
			return;
		}
		if (this.validaDescricao()==false) {
			this.tabImovel.openByIndex(1);
			return;
		}
		if (this.validaValores()==false) {
			this.tabImovel.openByIndex(2);
			return;
		}
		this.GRAVANDO=true;
		$('divPesquisaTrabalho').style.display='block';
		var queryString = new Object();
		if (!$('txtImoEnd').logradouro) {
			queryString['end']=$('txtImoEnd').value;
			queryString['tiplog']='';
		} else {
			queryString['end']=$('txtImoEnd').logradouro.nome;queryString['tiplog']=$('txtImoEnd').logradouro.tipo;
		}
		queryString['tipo']=$('cboImoTipo').value;queryString['ctr']=$('cboImoCtr').value;queryString['uf']=$('cboImoUF').value;queryString['cidade']=$('cboImoCid').value;queryString['bairro']=$('txtImoBai').value;queryString['num']=$('txtImoNum').value;queryString['apt']=$('txtImoAPT').value;queryString['blc']=$('txtImoBLC').value;queryString['cep']=$('txtImoCep').value.replace(/^-\.? /i,'');queryString['ptoref']=$('txtImoPtoRef').value;queryString['obslocal']=$('txtImoObsLocal').value;queryString['pad']=$('cboImoPAD').value;queryString['fin']=$('cboImoFin').value;queryString['dor']=$('txtImoDOR').value;queryString['dop']=$('txtImoDOP').value;queryString['dorobs']=$('txtImoDORObs').value;queryString['gar']=$('txtImoGAR').value;queryString['garobs']=$('txtImoGARObs').value;queryString['sal']=$('txtImoSAL').value;queryString['coz']=$('txtImoCOZ').value;queryString['ban']=$('txtImoBAN').value;queryString['ars']=$('txtImoARS').value;queryString['aru']=$('txtImoARU').value;queryString['art']=$('txtImoART').value;queryString['aco']=$('txtImoACO').value;queryString['dim']=$('txtImoDIM').value;queryString['apr']=$('cboImoAPR').value;queryString['fac']=$('cboImoFAC').value;queryString['ida']=$('txtImoIDA').value;queryString['and']=$('txtImoAND').value;queryString['ele']=$('txtImoELE').value;queryString['apa']=$('txtImoAPA').value;queryString['ocu']=$('cboImoOCU').value;queryString['desocu']=$('txtImoDes').value;queryString['vis']=$('txtImoVis').value;queryString['cha']=$('txtImoCha').value;queryString['obsimo']=$('txtImoObsImo').value;queryString['agu']=($('chkAGU').checked?1:0);queryString['arc']=($('chkARC').checked?1:0);queryString['con']=($('chkCON').checked?1:0);queryString['esq']=($('chkESQ').checked?1:0);queryString['int']=($('chkINT').checked?1:0);queryString['iso']=($('chkISO').checked?1:0);queryString['lar']=($('chkLAR').checked?1:0);queryString['lat']=($('chkLAT').checked?1:0);queryString['pis']=($('chkPIS').checked?1:0);queryString['pla']=($('chkPLA').checked?1:0);queryString['por']=($('chkPOR').checked?1:0);queryString['qnt']=($('chkQNT').checked?1:0);queryString['val']=$('txtImoVal').value;queryString['cond']=$('txtImoCond').value;queryString['iptu']=$('txtImoIPTU').value;
		var saldo=$('chkImoSaldo').checked;
		if (saldo) {
			queryString['saldo']=(saldo==true?1:0);queryString['saldoval']=$('txtImoSaldoVal').value;queryString['saldotmp']=$('txtImoSaldoTmp').value;queryString['saldoag']=$('txtImoSaldoAg').value;queryString['saldoprest']=$('txtImoSaldoPrest').value;queryString['saldoper']=$('cboImoSaldoPer').value;queryString['saldomes']=$('cboImoSaldoMes').value;
		}
		this.limparcampos();
		var my=this;
		var url='';
		var pro=this.proprietario.getProprietario();
		var proprietario='{nome: '+pro['nome']+', cpf: '+pro['cpf']+', tel: '+pro['tel'] + ', mala: '+pro['mala']+', email: '+pro['email']+'}';
		if (this.proxy==true) {
			url=URL+'/proxy/index.'+PROXYTYPE;
			queryString.url='cadimovel.csp';
		} else {
			url='cadimovel.csp';
		}
		new Ajax.Request(url, {
				parameters:Object.toQueryString(queryString)+'&proprietario='+proprietario,
				asynchronous: true,
				onSuccess: function(request) {
					try {
						var imo=request.responseXML.getElementsByTagName('imovel').item(0);
						my.imovel=my.getNode(imo);
						var url='../uploadfoto.csp';
						if (my.proxy==true) {
							url=SERVER+'/uploadfoto.csp';
						}
						window.ifrmFotos.document.Form1.action=url;
						window.ifrmFotos.document.Form1.txtRef.value = my.imovel.referencia;
						window.ifrmFotos.document.Form1.submit();
						my.GRAVANDO=false;
						my.fotosTransmitidas();
					} catch(er){if (DEBUG && DEBUG == true) {alert('Pos gravar erro: '+er);}}
				},
				onFailure: function() {
					if (DEBUG && DEBUG == true) {alert('Erro ao Arquivar o Imóvel/Bem');}
				}
			}
		);
	},
	fotosTransmitidas: function(foto) {
		var my=this;
		new Effect.Fade('divPesquisaTrabalho');
		Effect.ScrollTo('divSisprof',{
			afterFinish:function() {
					var win = my.calculaPosicao(200,150);
					$('divConcluido').style.top=(win.y>0?win.y:0)+'px';
					$('divConcluido').style.left=win.x+'px';
					Effect.Appear('divConcluido');
				}
			}
		);
	},
	mouseOutConcluido: function() {
		$('imgFecharConcluido').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	mouseOverConcluido: function() {
		$('imgFecharConcluido').src=encodeURI(URL+'/imagens/fechar-enab.gif');
	}
});
var Proprietario = Class.create(Basico, {
	initialize: function(proxy, queryString) {
		this.proxy=proxy;
		this.queryString=queryString;
		this.proprietario=null;
		this.objetos=new Array();
		this.objetos.push({xml:'ufcorret.csp',					xslt:'cadprouf.xsl',		destino:'tdUF',	marca:'spanCarregaUF',		campo: 'cboUF'		, posCarga: this.desligaStatus});
		this.objetos.push({xml:'cidadepadronizada.csp',	xslt:'cadprocidade.xsl',destino:'tdCid',marca:'spanCarregaCidade',campo: 'cboCid'		, posCarga: this.cidadePosCarga});
		this.suggest=null;
	},
	getProprietario: function() {
		this.proprietario['nome']=$('txtNomePro').value;
		this.proprietario['cpf']=unformatNumber($('txtCpf').value);
		this.proprietario['email']=$('txtEmailPro').value;
		this.proprietario['tel']=$('txtTelefonePro').value;
		this.proprietario['uf']=$('cboUF').value;
		this.proprietario['cid']=CADASTRO.cidades.get($('cboCid').value).nome;
		this.proprietario['ende']=$('txtEnd').value;
		this.proprietario['num']=$('txtNum').value;
		this.proprietario['compl']=$('txtCompl').value;
		this.proprietario['bai']=$('txtBairro').value;
		this.proprietario['cep']=$('txtCep').value;
		this.proprietario['logradouro']=$('txtEnd').logradouro;
		return this.proprietario;
	},
	desligaStatus: function(request,myThis,campo) {
		$(campo.marca).style.dysplay='none';
	},
	mouseover:function() {
		$('imgFecharPro').src=encodeURI(URL+'/imagens/fechar-enab.gif');
	},
	mouseout:function() {
		$('imgFecharPro').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	carrega: function() {
		var my=this;
		this.suggest=new TextSuggest(this.proxy,'divProp','txtEnd','cboUF','cboCid','txtBairro','txtCep');
		this.click('');
		new MaskedInput('txtTelefonePro','(##) ####-####');
		$('txtCpf').onblur=function() {
			var cpf=$('txtCpf').value;
			if (my.checkCPFCNPJ(cpf)) {$('txtCpf').value=formatCpfCnpj(cpf);}
		};
		$('imgFecharPro').onclick=function() {if (DEBUG && DEBUG == true) {alert("Operação cancelada pelo usuário")};my.hide();OPTIONS={venda:true,locacao:true,empreendimento:false,offset:7};iniciaPromocoes();};
		$('cmdEnviaPro').onclick=function() {if (my.validar()==true) {my.enviarDados();}};
	},
	cidadePosCarga: function(request,myThis,zItem) {
		try {
			var xmlDoc = request.responseXML;
			CADASTRO.cidades.clear();
			var cids=xmlDoc.getElementsByTagName('cidades').item(0).getElementsByTagName('cidade');
			if (cids.length>0) {
				for (var i=0;i<cids.length;i++) {
					var c=myThis.getNode(cids.item(i));
					CADASTRO.cidades.add(c);
				}
			}
		} catch(er) {
			alert(er);
		}
		myThis.desligaStatus(null,null,zItem);
	},
	mensagemProNulo: function() {
		alert('Operação Cancelada !');
	},
	click: function(campo) {
		var indice=-1;
		for (var i=0;i<this.objetos.length;i++) {
			if (campo==this.objetos[i].destino) {
				indice=i;
				break;
			}
		}
		for (var i=indice+1;i<this.objetos.length;i++) {
			new ParseXSLT(this.proxy,this.objetos[i].xml,this.objetos[i].xslt,this.objetos[i].destino,this.queryString,function(request) {my.objetos[i].posCarga(request,my,my.objetos[i]);});
		}
	},
	ufClick: function(campo) {
		if (campo=='cboUF') {
			this.queryString.estado=$('cboUF').value;
		}
		new ParseXSLT(this.proxy,this.objetos[1].xml,this.objetos[1].xslt,this.objetos[1].destino,this.queryString,function(request) {my.objetos[i].posCarga(request,my,my.objetos[i]);});
	},
	show: function() {
		var my=this;
		Effect.ScrollTo('divSisprof',{
			afterFinish:function() {
					var win = my.calculaPosicao(260,150);
					$('divProp').style.top=(win.y>0?win.y:0)+'px';
					$('divProp').style.left=win.x+'px';
					my.dragHandle=new Draggable('divProp',{handle: 'spanTitPro'});
					Effect.Appear('divProp');
				}
			}
		);
	},
	hide: function() {
		Effect.Fade('divProp');
	},
	validar: function() {
		if ($('txtNomePro').value=='') {
			this.showErro('Voc&ecirc; deve informar seu Nome','tdMensPro');
			return false;
		}
		if ($('txtEmailPro').value=='') {
			this.showErro('Voc&ecirc; deve informar seu E-mail','tdMensPro');
			return false;
		} else if (!this.checkMail($('txtEmailPro'))) {
			this.showErro('Seu E-mail n&atilde;o parece v&aacute;lido','tdMensPro');
			return false;
		}
		return true;
	},
	showErro: function(msg,obj) {
		if ($(obj)) {
			$(obj).innerHTML=msg;
			if (msg !='') {
				var my=this;
				setTimeout(function() {my.showErro('',obj);},5000);
			}
		}
	},
	enviarDados: function(ignoraPesquisa) {
		var queryString=new Object();
		queryString['nome']=$('txtNomePro').value;
		queryString['cpf']=unformatNumber($('txtCpf').value);
		queryString['email']=$('txtEmailPro').value;
		queryString['tel']=$('txtTelefonePro').value;
		queryString['uf']=$('cboUF').value;
		queryString['cid']=$('cboCid').textContent;
		queryString['ende']=$('txtEnd').value;
		queryString['num']=$('txtNum').value;
		queryString['compl']=$('txtCompl').value;
		queryString['bai']=$('txtBairro').value;
		queryString['cep']=$('txtCep').value;
		queryString['logradouro']=$('txtEnd').logradouro;
		if (queryString['logradouro']) {
			queryString['tiplog']=queryString['logradouro'].tipo;
			queryString['ende']=queryString['logradouro'].nome;
		}
		this.hide();
		this.identifica(queryString,(ignoraPesquisa?ignoraPesquisa:null));
	},
	identifica: function(queryString,ignoraPesquisa) {
		var my=this;
		if (ignoraPesquisa && ignoraPesquisa==true) {
			queryString['ignorapesquisa']=1;
		}
		var url='';
		if (this.proxy==true) {
			url=URL+'/proxy/index.'+PROXYTYPE;
			queryString.url='identificarpro.csp';
		} else {
			url='identificarpro.csp';
		}
		new Ajax.Request(url, {
				parameters:Object.toQueryString(queryString),
				asynchronous: true,
				onSuccess: function(request) {
					var xmlDoc = request.responseXML;
					if (!xmlDoc) {
						return;
					}
					var pessoas=new Array();
					var xpessoas=xmlDoc.getElementsByTagName('pessoa');
					if (xpessoas.length>0) {
						for (var i=0;i<xpessoas.length;i++) {
							var pes=my.getNode(xpessoas[i]);
							pessoas.push(pes);
						}
					}
					if (pessoas.length==1 && pessoas[0].key=="NOVO" && pessoas[0].tipo=="3") {
						my.seleciona(pessoas[0].key,true,pessoas[0].tipo);
					} else if (pessoas.length>0) {
						var args='';
						for (var i=0; i<pessoas.length;i++) {
							if (args=='') {
								args='[{key:'+pessoas[i].key+',tipo:'+pessoas[i].tipo+'}';
							} else {
								args+=',{key:'+pessoas[i].key+',tipo:'+pessoas[i].tipo+'}';
							}
						}
						args='pessoas='+args+']'
						new ParseXSLT(my.proxy,'listapessoas.csp','listapessoas.xsl','divPros',args,function(request) {
							Effect.ScrollTo('divSisprof',{
								afterFinish:function() {
										var win = my.calculaPosicao(200,150);
										$('divPros').style.top=(win.y>0?win.y:0)+'px';
										$('divPros').style.left=win.x+'px';
										my.dragHandle=new Draggable('divPros',{handle: 'divIdTit'});
										Effect.Appear('divPros');
									}
								}
							);
						});
					}
					var obj = $('cboImoTipo');
					if (! obj) {
						var qs={tipo:queryString.tipo};
						if (my.proxy==true) {
							url=URL+'/proxy/index.'+PROXYTYPE;
							qs.url='tipoImovel.csp';
						} else {
							url='tipoImovel.csp';
						}
						var a = new Ajax.Request(url, {
								parameters:Object.toQueryString(qs),
								onSuccess: function(request) {
									var xmlDoc = request.responseXML;
									if (!xmlDoc) {
										return;
									}
									var t = xmlDoc.getElementsByTagName('tipoimovel');
									var cbo = document.createElement('select');
									cbo.id='cboImoTipo';
									cbo.onchange=function() {
										CADASTRO.click('cboImoTipo');
									};
									var spn = document.createElement('span');
									spn.id = 'spanCarregaImoTipo';
									spn.className = 'carrega spanCarregaImoTipo';
									spn.style.display = 'inline';
									var img = document.createElement('img')
									img.src=URL+'/imagens/loading.gif';
									spn.appendChild(img);
									try {
										$('tdImoTipo').appendChild(cbo);
										$('tdImoTipo').appendChild(spn);
									} catch(er1) {alert(er1);}
									for (var i = 0 ; i < t.length ; i++) {
										var o = my.getNode(t[i]);
										var opt = document.createElement('option');
										opt.value = o.key;
										if (o.padrao == '1') opt.selected = true;
										opt.text = o.nome;
										Try.these (
											function() { cbo.add(opt); },
											function() { cbo.add(opt,null); }
										);
									}
									try {
										spn.style.display = 'none';
									} catch(er1) {alert(er1);}
								},
								onFailure: function() {
									alert('Tipo de Imovel ao corrigir');
								}
							}
						);


					}
				},
				onFailure: function() {
					alert('Erro ao obter identificação');
				}
			}
		);
	},
	seleciona: function(codigo,fecha,tipo) {
		this.proprietario=null;
		var my=this;
		var queryString=new Object();
		queryString['codigo']=codigo;
		queryString['tipo']=tipo;
		new ParseXSLT(this.proxy,'carregapessoa.csp','carregapessoa.xsl','divCliente',queryString,function(request) {
			var xmlDoc=request.responseXML;
			var cli=xmlDoc.getElementsByTagName('pessoa');
			if (cli.length>0) {
				my.proprietario=my.getNode(cli[0]);
			}
			if (fecha && fecha==true) {
				new Effect.Fade('divPros');
			}
			CADASTRO.show();
			$('divCliente').style.display='hide';
		});
	},
	checkMail: function(mail){
		var er=/^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    if(typeof(mail)=="string") {
			if(er.test(mail))
				return true; 
    } else if(typeof(mail)=="object") {
			if(er.test(mail.value))
				return true; 
    }
    return false;
	},
	checkCPFCNPJ: function(cpf) {
		if (unformatNumber(cpf).length>11) return isCnpj(cpf);
		else return isCpf(cpf);
	}
});
var TipoImovel = Class.create(Basico, {
	initialize: function(PROXY, queryString) {
		this.proxy=PROXY;
		this.queryString=queryString;
		this.queryString.url='tipoimovel.csp';
	},
	desligaStatus: function(request,myThis) {
		var tipo=myThis.queryString['tipo'];
		if (!tipo) {
			tipo=$('cboImoTipo').value;
		}
		myThis.carregaCampos({tipo:tipo});
	},
	carregaCampos: function(queryString) {
		var my=this;
		$('spanCarregaImoTipo').style.display='inline';
		var url='';
		if (this.proxy==true) {
			url=URL+'/proxy/index.'+PROXYTYPE;
			queryString.url='carregatipoimovel.csp';
		} else {
			url='carregatipoimovel.csp';
		}
		new Ajax.Request(url, {
			parameters:Object.toQueryString(queryString),
			onSuccess: function(request) {
				var campos=my.montaCampos(request);
			},
			onFailure: function() {
				alert('Tipo Imóvel posCarga Error: ');
			}
		});
	},
	montaCampos: function(request) {
		try {
			var tipo=request.responseXML.getElementsByTagName('tipoimovel').item(0);
			var campos=tipo.getElementsByTagName('campo');
			var cps=new Array();
			for (var i=0;i<campos.length;i++) {
				var c=this.getNode(campos[i]);
				if (c.key == "EDI" || c.key == "NEG") continue;
				if (c.key=='APR' || c.key=='FAC' || c.key=='NEG' || c.key=='PAD') {
					var ops=campos[i].getElementsByTagName('opcionais').item(0).getElementsByTagName('opcional');
					var opcs=new Array();
					var td=$('tdImo'+c.key);
					td.innerHTML='';
					var slct=document.createElement('select');
					slct.id='cboImo'+c.key;
					td.appendChild(slct);
					for (var y=0;y<ops.length;y++) {
						var op=this.getNode(ops[y]);
						opcs.push(op);
						var opt=document.createElement('option');
						opt.value=op.key;
						opt.text=op.nome;
						if (op.padrao && op.padrao=='1') {
							opt.selected=true;
						}
						window.ActiveXObject ? slct.add(opt) : slct.add(opt,null);
					}
					c['opcionais']=opcs;
				} else {
					if (c.key == "AGU" || c.key == "ARC" || c.key == "CON" || c.key == "ESQ" || c.key == "INT" || c.key == "ISO" || c.key == "LAR" || c.key == "LAT" || c.key == "PIS" || c.key == "PLA" || c.key == "POR" || c.key == "QNT") {
						try {$('spanChk'+c.key).innerHTML=c.nome?c.nome:'';} catch(er) {alert(c.key + ' chk => ' + er);}
					} else {
						try {$('labelImo'+c.key).innerHTML=c.nome?c.nome:'';} catch(er) {alert(c.key + ' label => ' + er);}
					}
				}
				cps.push(c);
			}
		} catch(er) {alert(er);}
		$('spanCarregaImoTipo').style.display='none';
	},
	carrega: function() {
		var my=CADASTRO.tipoImovel;
		$('spanCarregaImoTipo').style.display='inline';
		           //(proxy,   xml,             xslt,            objetoDestino,queryString,posCarga,argsOPC)
		new ParseXSLT(my.proxy,'tipoimovel.csp','cadimotipo.xsl','tdImoTipo',my.queryString,function(request) {
			my.desligaStatus(request,my);
		});
	},
	click: function() {
		var queryString=new Object();
		$('spanCarregaImoTipo').style.display='inline';
		queryString['tipo']=$('cboImoTipo').value;
		queryString['teste']=1;
		this.carregaCampos(queryString);
	}
});
var EstadoCidade = Class.create(Basico, {
	initialize: function(PROXY, queryString) {
		this.proxy=PROXY;
		this.queryString=queryString;
		this.objetos = new Array();
		this.objetos.push({xml:'ufcorret.csp',					xslt:'cadimouf.xsl',		destino:'tdImoUF',	marca:'spanCarregaImoUF',	campo: 'cboImoUF'	, posCarga: this.desligaStatus});
		this.objetos.push({xml:'cidadepadronizada.csp',	xslt:'cadimocidade.xsl',destino:'tdImoCid',	marca:'spanCarregaImoCid',campo: 'cboImoCid', posCarga: this.cidadePosCarga});
	},
	cidadePosCarga: function(request,myThis,zItem) {
		try {
			var xmlDoc = request.responseXML;
			CADASTRO.cidades.clear();
			var cids=xmlDoc.getElementsByTagName('cidades').item(0).getElementsByTagName('cidade');
			if (cids.length>0) {
				for (var i=0;i<cids.length;i++) {
					var c=myThis.getNode(cids.item(i));
					CADASTRO.cidades.add(c);
				}
			}
		} catch(er) {
			alert(er);
		}
		myThis.desligaStatus(null,null,zItem);
	},
	desligaStatus: function(request,myThis,zItem) {
		$(zItem.marca).style.display='none';
	},
	carrega: function(indice,queryString) {
		var my=this;
		for (var k=indice;k<this.objetos.length;k++) {
			var myItem=this.objetos[k];
			$(myItem.marca).style.display='inline';
			if (myItem.destino=='tdImoCid') {
				queryString['estado']=$('cboImoUF').value;
				new ParseXSLT(this.proxy,myItem.xml,myItem.xslt,myItem.destino,queryString,function(request) {my.cidadePosCarga(request,my,myItem);});
			} else {
				new ParseXSLT(this.proxy,myItem.xml,myItem.xslt,myItem.destino,queryString,function(request) {my.desligaStatus(myItem);});
			}
		}
	},
	click: function(myItem) {
		var indice=0;
		var queryString=new Object();
		for (var i=0;i<this.objetos.length;i++) {
			if (myItem) {
				indice=i;
			}
		}
		this.carrega(indice+1,this.getQueryString());
	},
	ufClick: function(campo) {
		if (campo=='cboImoUF') {
			this.queryString.estado=$('cboImoUF').value;
		}
		new ParseXSLT(this.proxy,this.objetos[1].xml,this.objetos[1].xslt,this.objetos[1].destino,this.queryString,function(request) {my.objetos[i].posCarga(request,my,my.objetos[i]);});
	}
});
var TextSuggest = Class.create(Basico, {
	initialize: function(proxy,parentComponent,anId,comboUF,comboCid,campoBairro,campoCep) {
		this.proxy=proxy;
		this.parentComponent=parentComponent;
		this.id			= anId;
		this.comboUF = comboUF;
		this.comboCid = comboCid;
		this.campoBairro = campoBairro;
		this.campoCep = campoCep;
		var browser = navigator.userAgent.toLowerCase();
		this.isIE		= browser.indexOf("msie")!=-1;
		this.isOpera	= browser.indexOf("opera")!= -1;
		this.textInput	= $(this.id);
		this.createSuggestionsDiv();
		this.injectSuggestBehavior();
		this.suggestions = [];
		this.regs = new Array();
		this.regs.push(/^acampamento\.? /i);this.regs.push(/^acesso\.? /i);this.regs.push(/^adro\.? /i);this.regs.push(/^aeroporto\.? /i);this.regs.push(/^alameda\.? /i);this.regs.push(/^arteria\.? /i);this.regs.push(/^atalho\.? /i);this.regs.push(/^alto\.? /i);this.regs.push(/^avenida\.? /i);this.regs.push(/^area\.? /i);this.regs.push(/^buraco\.? /i);this.regs.push(/^beco\.? /i);this.regs.push(/^belvedere\.? /i);this.regs.push(/^balao\.? /i);this.regs.push(/^bloco\.? /i);this.regs.push(/^bosque\.? /i);this.regs.push(/^boulevard\.? /i);this.regs.push(/^baixa\.? /i);this.regs.push(/^calcada\.? /i);this.regs.push(/^caminho\.? /i);this.regs.push(/^canal\.? /i);this.regs.push(/^chacara\.? /i);this.regs.push(/^ciclovia\.? /i);this.regs.push(/^circular\.? /i);this.regs.push(/^conjunto\.? /i);;this.regs.push(/^complexo viario\.? /i);this.regs.push(/^colonia\.? /i);this.regs.push(/^comunidade\.? /i);this.regs.push(/^condominio\.? /i);this.regs.push(/^contorno\.? /i);this.regs.push(/^corredor\.? /i);this.regs.push(/^campo\.? /i);this.regs.push(/^corrego\.? /i);this.regs.push(/^cais\.? /i);this.regs.push(/^descida\.? /i);this.regs.push(/^distrito\.? /i);this.regs.push(/^entrada particular\.? /i);this.regs.push(/^escada\.? /i);this.regs.push(/^esplanada\.? /i);this.regs.push(/^estacionamento\.? /i);this.regs.push(/^estrada\.? /i);this.regs.push(/^estacao\.? /i);this.regs.push(/^estadio\.? /i);this.regs.push(/^elevada\.? /i);this.regs.push(/^eixo industrial\.? /i);this.regs.push(/^favela\.? /i);this.regs.push(/^fazenda\.? /i);this.regs.push(/^ferrovia\.? /i);this.regs.push(/^fonte\.? /i);this.regs.push(/^feira\.? /i);this.regs.push(/^forte\.? /i);this.regs.push(/^galeria\.? /i);this.regs.push(/^granja\.? /i);this.regs.push(/^ilha\.? /i);this.regs.push(/^jardim\.? /i);this.regs.push(/^ladeira\.? /i);this.regs.push(/^lago\.? /i);this.regs.push(/^lagoa\.? /i);this.regs.push(/^loteamento\.? /i);this.regs.push(/^largo\.? /i);this.regs.push(/^marina\.? /i);this.regs.push(/^modulo\.? /i);this.regs.push(/^morro\.? /i);this.regs.push(/^monte\.? /i);this.regs.push(/^nucleo\.? /i);this.regs.push(/^paralela\.? /i);this.regs.push(/^passeio\.? /i);this.regs.push(/^patio\.? /i);this.regs.push(/^praca\.? /i);this.regs.push(/^parada.?s/i);this.regs.push(/^ponta\.? /i);this.regs.push(/^praia\.? /i);this.regs.push(/^prolongamento\.? /i);this.regs.push(/^parque\.? /i);this.regs.push(/^passarela\.? /i);this.regs.push(/^passagem\.? /i);this.regs.push(/^ponte\.? /i);this.regs.push(/^porto\.? /i);this.regs.push(/^quinta\.? /i);this.regs.push(/^quadra\.? /i);this.regs.push(/^ramal\.? /i);this.regs.push(/^recanto\.? /i);this.regs.push(/^retiro\.? /i);this.regs.push(/^residencial\.? /i);this.regs.push(/^reta\.? /i);this.regs.push(/^rampa\.? /i);this.regs.push(/^rodo anel\.? /i);this.regs.push(/^rodovia\.? /i);this.regs.push(/^rotula\.? /i);this.regs.push(/^retorno\.? /i);this.regs.push(/^rotatoria\.? /i);this.regs.push(/^rua\.? /i);this.regs.push(/^sitio\.? /i);this.regs.push(/^servidao\.? /i);this.regs.push(/^setor\.? /i);this.regs.push(/^subida\.? /i);this.regs.push(/^terminal\.? /i);this.regs.push(/^trevo\.? /i);this.regs.push(/^trecho\.? /i);this.regs.push(/^tunel\.? /i);this.regs.push(/^travessa\.? /i);this.regs.push(/^unidade\.? /i);this.regs.push(/^vala\.? /i);this.regs.push(/^viaduto\.? /i);this.regs.push(/^vereda\.? /i);this.regs.push(/^viela\.? /i);this.regs.push(/^vale\.? /i);this.regs.push(/^vila\.? /i);this.regs.push(/^via\.? /i);this.regs.push(/^zigue-zague\.? /i);this.regs.push(/^acamp\.? /i);this.regs.push(/^ac\.? /i);this.regs.push(/^ad\.? /i);this.regs.push(/^aer\.? /i);this.regs.push(/^al\.? /i);this.regs.push(/^art\.? /i);this.regs.push(/^atl\.? /i);this.regs.push(/^at\.? /i);this.regs.push(/^av\.? /i);this.regs.push(/^a\.? /i);this.regs.push(/^bco\.? /i);this.regs.push(/^bc\.? /i);this.regs.push(/^belv\.? /i);this.regs.push(/^blo\.? /i);this.regs.push(/^bl\.? /i);this.regs.push(/^bsq\.? /i);this.regs.push(/^bvd\.? /i);this.regs.push(/^bx\.? /i);this.regs.push(/^calc\.? /i);this.regs.push(/^campus\.? /i);this.regs.push(/^cam\.? /i);this.regs.push(/^can\.? /i);this.regs.push(/^ch\.? /i);this.regs.push(/^cicl\.? /i);this.regs.push(/^circ\.? /i);this.regs.push(/^cj\.? /i);this.regs.push(/^cmp-vr\.? /i);this.regs.push(/^col\.? /i);this.regs.push(/^com\.? /i);this.regs.push(/^cond\.? /i);this.regs.push(/^cont\.? /i);this.regs.push(/^cor\.? /i);this.regs.push(/^cpo\.? /i);this.regs.push(/^crg\.? /i);this.regs.push(/^c\.? /i);this.regs.push(/^dsc\.? /i);this.regs.push(/^dsv\.? /i);this.regs.push(/^desvio\.? /i);this.regs.push(/^dt\.? /i);this.regs.push(/^ent-part\.? /i);this.regs.push(/^esc\.? /i);this.regs.push(/^esp\.? /i);this.regs.push(/^estc\.? /i);this.regs.push(/^est\.? /i);this.regs.push(/^etc\.? /i);this.regs.push(/^etd\.? /i);this.regs.push(/^evd\.? /i);this.regs.push(/^ex-ind\.? /i);this.regs.push(/^fav\.? /i);this.regs.push(/^faz\.? /i);this.regs.push(/^fer\.? /i);this.regs.push(/^fnt\.? /i);this.regs.push(/^fra\.? /i);this.regs.push(/^fte\.? /i);this.regs.push(/^gal\.? /i);this.regs.push(/^gja\.? /i);this.regs.push(/^ia\.? /i);this.regs.push(/^jd\.? /i);this.regs.push(/^ld\.? /i);this.regs.push(/^lg\.? /i);this.regs.push(/^lga\.? /i);this.regs.push(/^lot\.? /i);this.regs.push(/^lrg\.? /i);this.regs.push(/^mna\.? /i);this.regs.push(/^mod\.? /i);this.regs.push(/^mro\.? /i);this.regs.push(/^mte\.? /i);this.regs.push(/^nuc\.? /i);this.regs.push(/^par\.? /i);this.regs.push(/^pas\.? /i);this.regs.push(/^pat\.? /i);this.regs.push(/^pc\.? /i);this.regs.push(/^pda\.? /i);this.regs.push(/^pnt\.? /i);this.regs.push(/^pr\.? /i);this.regs.push(/^prl\.? /i);this.regs.push(/^prq\.? /i);this.regs.push(/^psa\.? /i);this.regs.push(/^psg\.? /i);this.regs.push(/^pte\.? /i);this.regs.push(/^pto\.? /i);this.regs.push(/^qta\.? /i);this.regs.push(/^q\.? /i);this.regs.push(/^ram\.? /i);this.regs.push(/^rec\.? /i);this.regs.push(/^rer\.? /i);this.regs.push(/^res\.? /i);this.regs.push(/^ret\.? /i);this.regs.push(/^rmp\.? /i);this.regs.push(/^rod-an\.? /i);this.regs.push(/^rod\.? /i);this.regs.push(/^rot\.? /i);this.regs.push(/^rtn\.? /i);this.regs.push(/^rtt\.? /i);this.regs.push(/^r\.? /i);this.regs.push(/^sit\.? /i);this.regs.push(/^srv\.? /i);this.regs.push(/^st\.? /i);this.regs.push(/^sub\.? /i);this.regs.push(/^ter\.? /i);this.regs.push(/^trv\.? /i);this.regs.push(/^tr\.? /i);this.regs.push(/^tun\.? /i);this.regs.push(/^tv\.? /i);this.regs.push(/^unid\.? /i);this.regs.push(/^val\.? /i);this.regs.push(/^vd\.? /i);this.regs.push(/^ver\.? /i);this.regs.push(/^vla\.? /i);this.regs.push(/^vle\.? /i);this.regs.push(/^vl\.? /i);this.regs.push(/^v\.? /i);this.regs.push(/^zig-zag\.? /i);
	},
	injectSuggestBehavior: function() {
		if (this.isIE)
			this.textInput.autocomplete = "off";
		var keyEventHandler = new TextSuggestKeyHandler(this);
		new Insertion.After(this.textInput,'<input type="text" id="'+this.id+'_preventtsubmit'+'" style="display:none"/>');
		new Insertion.After(this.textInput,'<input type="hidden" name="'+this.id+'_hidden'+'" id="'+this.id+'_hidden'+'"/>');
	},
	handleTextInput: function() {
		var previousRequest	= this.lastRequestString;
		this.lastRequestString = this.textInput.value;
		if (this.lastRequestString=="")
			this.hideSuggestions();
		else if (this.lastRequestString!=previousRequest) {
			this.sendRequestForSuggestions();
		}
	},
	moveSelectionUp: function() {
		if (this.selectedIndex > 0) {
			this.updateSelection(this.selectedIndex - 1);
		}
	},
	moveSelectionDown: function() {
		if (this.selectedIndex < (this.suggestions.length - 1) ) {
			this.updateSelection(this.selectedIndex+1);
		}
	},
	updateSelection: function(n) {
		var span = $('spanMatch'+this.selectedIndex);
		if (span) {
			span.style.backgroundColor = "";
		}
		this.selectedIndex = n;
		var span = $('spanMatch'+this.selectedIndex);
		if (span) {
			span.style.backgroundColor = '#ffe505';
		}
	},
	sendRequestForSuggestions: function() {
		if (this.handlingRequest) {
			this.pendingRequest = true;
			return;
		}
		var cidade = CADASTRO.cidades.get($(this.comboCid).value);
		if (cidade && cidade.ceplog && cidade.ceplog == '1') {
			this.handlingRequest = true;
			var queryString=new Object();
			queryString['uf']=$(this.comboUF).value;
			queryString['cidade']=cidade.nome;
			queryString['logradouro']=this.limpaEndereco(this.lastRequestString);
			var my=this;
			new ParseXSLT(this.proxy,'buscalogr.csp','buscalogr.xsl',this.suggestionsDiv,queryString,function(request) {
				var xmlDoc = request.responseXML;
				if (!xmlDoc) return;
				my.suggestions.clear();
				var logrs=xmlDoc.getElementsByTagName('logradouro');
				if (logrs.length>0) {
					for (var i=0;i<logrs.length;i++) {
						var sug=my.getNode(logrs.item(i));
						my.suggestions.push(sug);
					}
				}
				if (my.suggestions.length==0) {
					my.hideSuggestions();
					$(my.id+"_hidden").value = "";
				} else {
					my.updateSuggestionsDiv();
					my.showSuggestions();
					my.updateSelection(0);
				}
				my.handlingRequest=false;
				if (my.pendingRequest) {
					my.pendingRequest=false;
					my.lastRequestString=my.textInput.value;
					my.sendRequestForSuggestions();
				}
			});
		}
	},
	setInputFromSelection: function() {
		var hiddenInput=$(this.id+"_hidden");
		var suggestion=this.suggestions[ this.selectedIndex ];
		this.textInput.value = suggestion.nome + ', ' + suggestion.tipo;
		this.textInput.logradouro=suggestion;
		$(this.campoCep).value=suggestion.cep;
		$(this.campoBairro).value=suggestion.bairro;
		hiddenInput.value=suggestion.key;
		this.hideSuggestions();
	},
	showSuggestions: function() {
		var divStyle = this.suggestionsDiv.style;
		if (divStyle.display=='')
			return;
		this.positionSuggestionsDiv();
		divStyle.display = '';
	},
	positionSuggestionsDiv: function() {
		try {
			var pos = RicoUtil.toViewportPosition($(this.parentComponent));
			var textPos = RicoUtil._toAbsolute(this.textInput,true);
			if (this.parentComponent!='divProp') {
				divPaiPos=RicoUtil._toAbsolute($('divSisprof'),true);
			} else {
				divPaiPos=RicoUtil._toAbsolute($('divProp'),true);
			}
			var divStyle = this.suggestionsDiv.style;
			divStyle.top	= (divPaiPos.y+textPos.y+this.textInput.offsetHeight-pos.y)+"px";
			divStyle.left = divPaiPos.x+textPos.x-pos.x+"px";
			divStyle.width = (this.textInput.offsetWidth - this.padding()+200)+"px";
		} catch(er) {alert(er);}
	},
	docScrollLeft: function() {
		if (window.pageXOffset)
			return window.pageXOffset;
		else if (document.documentElement && document.documentElement.scrollLeft)
			return document.documentElement.scrollLeft;
		else if (document.body)
			return document.body.scrollLeft;
		else
			return 0;
	},
	padding: function() {
		try {
			var styleFunc = RicoUtil.getElementsComputedStyle;
			var lPad	= styleFunc(this.suggestionsDiv, "paddingLeft",		"padding-left");
			var rPad	= styleFunc(this.suggestionsDiv, "paddingRight",	"padding-right");
			var lBorder = styleFunc(this.suggestionsDiv, "borderLeftWidth",	"border-left-width");
			var rBorder = styleFunc(this.suggestionsDiv, "borderRightWidth", "border-right-width");
			lPad	= isNaN(lPad)	? 0 : lPad;
			rPad	= isNaN(rPad)	? 0 : rPad;
			lBorder = isNaN(lBorder) ? 0 : lBorder;
			rBorder = isNaN(rBorder) ? 0 : rBorder;
			return parseInt(lPad)+parseInt(rPad)+parseInt(lBorder)+parseInt(rBorder);
		} catch (e) {
			return 0;
		}
	},
	hideSuggestions: function() {
		this.suggestionsDiv.style.display = 'none';
		this.suggestionsDiv.innerHTML='';
	},
	createSuggestionsDiv: function() {
		this.suggestionsDiv = document.createElement("div");
		var divStyle = this.suggestionsDiv.style;
		divStyle.position = 'absolute';
		divStyle.zIndex	= 101;
		divStyle.display	= 'none';
		divStyle.backgroundColor= '#f9fbb2';
		divStyle.borderStyle='solid';
		divStyle.borderWidth='1px';
		divStyle.overflowX='auto';
		$('divSisprof').appendChild(this.suggestionsDiv);
	},
	updateSuggestionsDiv: function() {
		var spans = document.getElementsByClassName('spanMatch');
		for (var i=0;i<spans.length;i++) {
			var mySpan = spans[i];
			mySpan.onmouseover	= this.mouseoverHandler.bindAsEventListener(this);
			mySpan.onclick		= this.itemClickHandler.bindAsEventListener(this);
		}
	},
	mouseoverHandler: function(e) {
		var src = e.srcElement ? e.srcElement : e.target;
		var index = parseInt(src.id.substring(9));
		this.updateSelection(index);
	},
	itemClickHandler: function(e) {
		this.mouseoverHandler(e);
		this.hideSuggestions();
		this.textInput.focus();
	},
	splitTextValues: function(text, len, regExp) {
		var startPos	= text.search(regExp);
		var matchText = text.substring(startPos, startPos+len);
		var startText = startPos==0 ? "" : text.substring(0, startPos);
		var endText	= text.substring(startPos+len);
		return {start: startText, mid: matchText, end: endText};
	},
	getElementContent: function(element) {
		return element.firstChild.data;
	},
	limpaEndereco: function(endereco) {
		for (var i=0;i<this.regs.length;i++) {
			if (endereco.match(this.regs[i])) {
				endereco=endereco.replace(this.regs[i],'');
				i=0;
			}
		}
		return endereco;
	}
});
TextSuggestKeyHandler = Class.create();
TextSuggestKeyHandler.prototype = {
	initialize: function(textSuggest) {
		this.textSuggest = textSuggest;
		this.input		= this.textSuggest.textInput;
		this.addKeyHandling();
	},
	addKeyHandling: function() {
		this.input.onkeyup	= this.keyupHandler.bindAsEventListener(this);
		this.input.onkeydown	= this.keydownHandler.bindAsEventListener(this);
		this.input.onblur	= this.onblurHandler.bindAsEventListener(this);
		if (this.isOpera)
			this.input.onkeypress = this.keyupHandler.bindAsEventListener(this);
	},
	keydownHandler: function(e) {
		var upArrow	= 38;
		var downArrow = 40;
		if (e.keyCode==upArrow) {
			this.textSuggest.moveSelectionUp();
			setTimeout(this.moveCaretToEnd.bind(this), 1);
		} else if (e.keyCode==downArrow){
			this.textSuggest.moveSelectionDown();
		}
	},
	keyupHandler: function(e) {
		if (this.input.length==0 && !this.isOpera)
			this.textSuggest.hideSuggestions();
		if (!this.handledSpecialKeys(e))
			this.textSuggest.handleTextInput();
	},
	handledSpecialKeys: function(e) {
		var enterKey	= 13;
		var upArrow	= 38;
		var downArrow = 40;
		if (e.keyCode==upArrow || e.keyCode==downArrow) {
			return true;
		} else if (e.keyCode==enterKey) {
			this.textSuggest.setInputFromSelection();
			return true;
		}
		return false;
	},
	moveCaretToEnd: function() {
		var pos = this.input.value.length;
		if (this.input.setSelectionRange) {
			this.input.setSelectionRange(pos,pos);
		} else if(this.input.createTextRange){
			var m = this.input.createTextRange();
			m.moveStart('character',pos);
			m.collapse();
			m.select();
		}
	},
	onblurHandler: function(e) {
		if (this.textSuggest.suggestionsDiv.style.display=='')
			this.textSuggest.setInputFromSelection();
		this.textSuggest.hideSuggestions();
	}
}
