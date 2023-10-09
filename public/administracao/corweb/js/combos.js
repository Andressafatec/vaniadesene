var Combos = Class.create();
Object.extend(Combos.prototype, {
	initialize: function(proxy,queryString) {
		this.queryString=queryString;
		this.proxy=proxy;
		this.regiao=null;
		this.objetos = new Array();
		this.objetos.push({xml:'contratos.csp',		xslt:'contratos.xsl',	destino:'spanContrato',		marca:'spanCarregaContrato',	campo: 'ctr',		posCarga: this.desligaStatus});
		this.objetos.push({xml:'tipoimovel.csp',	xslt:'tipoimovel.xsl',	destino:'spanTipoImovel',	marca:'spanCarregaTipoImovel',	campo: 'tipo',		posCarga: this.desligaStatus});
		this.objetos.push({xml:'cidade.csp',		xslt:'cidade.xsl',	destino:'spanCidade',		marca:'spanCarregaCidade',	campo: 'cidade',	posCarga: this.desligaStatus});
		this.objetos.push({xml:'regiao.csp',		xslt:'regiao.xsl',	destino:'divRegioesCorpo',	marca:'spanCarregaRegiao',	campo: 'regiao',	posCarga: this.desligaStatus});
		this.objetos.push({xml:'faixavalor.csp',	xslt:'faixavalor.xsl',	destino:'spanFaixaValor',	marca:'spanCarregaFaixaValor',	campo: 'faixaValor', 	posCarga: this.preparaFaixas});
		this.objetos.push({xml:'dormitorios.csp',	xslt:'dormitorios.xsl',	destino:'spanDormitorios',	marca:'spanCarregaDormitorios',	campo: 'dormitorios', 	posCarga: this.desligaStatus});
		this.objetos.push({xml:'suites.csp',		xslt:'suites.xsl',	destino:'spanSuites',		marca:'spanCarregaSuites',	campo: 'suites',	posCarga: this.desligaStatus});
		this.objetos.push({xml:'garagens.csp',		xslt:'garagens.xsl',	destino:'spanGaragens',		marca:'spanCarregaGaragens',	campo: 'garagens',	posCarga: this.desligaStatus});
		this.objetos.push({xml:'camposp.csp',		xslt:'campos.xsl',	destino:'divOpcionaisCorpo',	marca:'spanCarregaOpcionais',	campo: 'campo',		posCarga: this.desligaStatus});
		this.bannerBairros=null;
		this.timeOutBairros=null;
	},
	desligaStatus: function(myThis) {
		if ( navigator.userAgent.toLowerCase().indexOf("msie") == -1 ) {
			var cbos=$$('.CampoDir select');
			if (cbos.length > 0) {
				for (var x=0;x<cbos.length;x++) {
					cbos[x].style.width='100px';
				}
			}
		}
		$(myThis.marca).style.display='none';
		if (myThis.xml=='contratos.csp') {
			Effect.ScrollTo('divSisprof');
		}
	},
	preparaFaixas: function(request,myThis) {
		if (!request) return;
		if (FAIXASVALORES == null) {
			FAIXASVALORES = new FaixasValores();
		}
		FAIXASVALORES.clear();
		var xmlDoc=request.responseXML;
		var a=xmlDoc.getElementsByTagName('faixasvalores').item(0);
		var faixas=a.getElementsByTagName('faixavalor');
		for (var i=0;i<faixas.length;i++) {
			var fx=faixas[i];
			var myFx=new Object();
			for (var y=0;y<fx.childNodes.length;y++) {
				var faixa=fx.childNodes[y];
				if (faixa.nodeType!=1) continue;
				try {
					var valor=faixa.firstChild.nodeValue;
					if (valor && valor!=null) {
						myFx[faixa.nodeName]=valor.replace(/[\n\r\t]/g,'');
					}
				} catch(ignore) {}
			}
			FAIXASVALORES.add(myFx);
		}
		if (myThis && myThis) $(myThis.marca).style.display='none';
	},
	inicia: function(indice,queryString) {
			$(this.objetos[0].marca).style.display='inline';
			$(this.objetos[1].marca).style.display='inline';
			$(this.objetos[2].marca).style.display='inline';
			$(this.objetos[3].marca).style.display='inline';
			$(this.objetos[4].marca).style.display='inline';
			$(this.objetos[5].marca).style.display='inline';
			$(this.objetos[6].marca).style.display='inline';
			$(this.objetos[7].marca).style.display='inline';
			$(this.objetos[8].marca).style.display='inline';
			var url='';
			if (! queryString) {
				queryString = new Object();
			}
			if (this.proxy==true) {
				url=URL+'/proxy/index.'+PROXYTYPE;
				queryString.url=this.objetos[4].xml;
			} else {
				url=this.objetos[4].xml;
			}
			var my=this;
			new Ajax.Request(url, {
				parameters:Object.toQueryString(queryString),
				asynchronous: true,
				onSuccess: function(request) {
					try {
						my.preparaFaixas(request);
						my.carrega(indice,queryString);
					} catch (er) {
						if (DEBUG && DEBUG == true) {
							alert(er);
						}
					}
				},
				onFailure: function() {
					if (DEBUG && DEBUG == true) {
						alert('Erro ao Iniciar faixas de Valor: ' + er);
					}
				}
			});
	},
	carrega: function(indice,queryString) {
		for (var i=indice;i<this.objetos.length;i++) {
			var obj=this.objetos[i];
			$(obj.marca).style.display='inline';
		}
		this.carga(indice,queryString);
	},
	posCarga: function(indice, queryString, request) {
		var my=this;
		var myItem=my.objetos[indice];
		if (myItem.xml=='faixavalor.csp') {
			my.preparaFaixas(request,myItem);
		} else {
			my.desligaStatus(myItem);
		}
		if (indice < this.objetos.length-1) {
			this.carga(++indice,queryString);
		}	
		if (myItem.xml == 'contratos.csp') {
			if (queryString['ctr'] == 2) {
				$('divPacote').style.display='block';
			} else {
				$('divPacote').style.display='none';
			}
		}
		
	},
	carga: function(indice, queryString) {
		var my=this;
		var myItem=my.objetos[indice];		
		$(myItem.marca).style.display='inline';
		var cbo=new Combo(this.proxy,myItem,queryString,indice,my);
		cbo.carrega();
	},
	getQueryString: function() {
		var queryString=new Object();
		for (var i=0;i<this.objetos.length;i++) {
			if (this.objetos[i].campo=='faixaValor') {
				try {	
					queryString['faixaValor']=$('faixaValor').value;
				} catch(ignore) {}
			} else if (this.objetos[i].campo=='regiao') {
				var regioes=$$('.chkRegiao');
				var regs=new Array();
				for (var y=0; y<regioes.length;y++) {
					if (regioes[y].checked) {
						regs.push(regioes[y].id);
					}
				}
				if (regs.length>0) {
					var nregs='';
					nregs=regs[0];
					for (var r=1;r<regs.length;r++) {
						nregs+=','+regs[r];
					}
					queryString[this.objetos[i].campo]=nregs;
				} else {
					queryString[this.objetos[i].campo]="T";
				}
			} else if (this.objetos[i].campo=='campo') {
				var opcs=$$('.checkOpcionais');
				for (var y=0; y<opcs.length;y++) {
					if (opcs[y].checked) {
						try {	queryString[opcs[y].id]="1"} catch(ignore) {}
					}
				}
			} else {
				try {	queryString[this.objetos[i].campo]=$(this.objetos[i].campo).value;} catch(ignore) {}
			}
		}
		return queryString;
	},
	click: function(myItem) {
		var indice=0;
		var queryString=new Object();
		for (var i=0;i<this.objetos.length;i++) {
			if (this.objetos[i].campo==myItem) {
				indice=i;
			}
		}
		this.carrega(indice+1,this.getQueryString());		
		if (myItem == 'ctr') {
			if ($('ctr').value == 2) {
				$('divPacote').style.display='block';
			} else {
			$('divPacote').style.display='none';
			}
		}
	},
	toogleRegiao: function() {
		if ($('divRegioesNada').style.display=='none') {
			$('spanRegioesMax').style.display='none';
			$('spanRegioesMin').style.display='inline';
			if ($('spanOpcionaisMenos').style.display=='inline') {
				this.toogleOpcionais();
			}
		} else {
			$('spanRegioesMax').style.display='inline';
			$('spanRegioesMin').style.display='none';
		}
		Effect.toggle('divRegioesNada', 'blind');
	},
	toogleOpcionais: function() {
		if ($('divOpcionaisNada').style.display=='none') {
			$('spanOpcionaisMais').style.display='none';
			$('spanOpcionaisMenos').style.display='inline';
			if ($('spanRegioesMin').style.display=='inline') {
				this.toogleRegiao();
			}
		} else {
			$('spanOpcionaisMais').style.display='inline';
			$('spanOpcionaisMenos').style.display='none';
		}
		Effect.toggle('divOpcionaisNada', 'blind');
	},
	mouseOver: function(regiao) {
		var queryString=this.getQueryString();
		queryString['regiao']=regiao;
		var my=this;
		if (this.bannerBairros == null || this.regiao == null) {
			this.regiao=regiao;
			this.bannerBairros=new Bairros(this.proxy,regiao,queryString,function() {my.mostrarBairros(my)});
			this.bannerBairros.carrega();
		} else if (this.bannerBairros.regiao != regiao) {
			this.regiao=regiao;
			this.bannerBairros=new Bairros(this.proxy,regiao,queryString,function() {my.mostrarBairros(my)});
			this.bannerBairros.carrega();
		} else {
			$('divBairros').style.left=MOUSE.getX()+10;
			$('divBairros').style.top=MOUSE.getY();
		}
	},
	mouseOut: function() {
		$('divBairros').style.display='none';
		if (this.timeOutBairros!=null) {
			clearTimeout(this.timeOutBairros);
			this.timeOutBairros=null;
		}		
	},
	mostrarBairros: function(myThis) {
		if (this.bannerBairros == null) {
			return;
		}
		myThis.timeOutBairros=setTimeout(function() {myThis.mouseOut();},5000);
		$('divBairros').style.left=MOUSE.getX()+10;
		$('divBairros').style.top=MOUSE.getY();
		$('divBairros').style.display='block';
	},
	mouseOverTit: function(controle) {
		this.mouseOut();
		if (controle=='regiao') {
			$('divBairros').innerHTML='<center>Para pesquisar em Todas as regi&otilde;es n&atilde;o selecione nenhuma</center>';
		} else if (controle=='campo') {
			$('divBairros').innerHTML='<center>Filtro acumulativo quanto maior exig&ecirc;ncia menor ser&aacute; o resultado da Pesquisa</center>';
		}
		this.mostrarTit(this);
	},
	mostrarTit: function(myThis) {
		$('divBairros').style.left=MOUSE.getX()+10;
		$('divBairros').style.top=MOUSE.getY();
		$('divBairros').style.display='block';
		myThis.timeOutBairros=setTimeout(function() {myThis.mouseOut();},5000);
	},
	fecharTit: function(myThis) {
		$('divBairros').style.display='none';
	}

});
var Combo = Class.create();
Object.extend(Combo.prototype, {
	initialize: function(proxy, campo, queryString, indice, other) {
		this.proxy=proxy;
		this.campo=campo;
		this.queryString=queryString;
		this.other=other;
		this.indice=indice;
	},
	carrega: function() {
		var my=this;
		if (this.campo['xml'] == 'faixavalor.csp') {
			new ParseXSLT(this.proxy,this.campo.xml,this.campo.xslt,this.campo.destino,this.queryString,function(request) {my.other.posCarga(my.indice,my.queryString,request);});
		} else {
			if ((this.campo['xml']=='dormitorios.csp') || (this.campo['xml']=='garagens.csp') || (this.campo['xml']=='suites.csp')) {
				if (FAIXASVALORES && FAIXASVALORES.get(this.queryString['faixaValor'])) {
					this.queryString['valorminimo']=FAIXASVALORES.get(this.queryString['faixaValor']).valorminimo;
					this.queryString['valormaximo']=FAIXASVALORES.get(this.queryString['faixaValor']).valormaximo;
				} else {
					this.queryString['valorminimo']=0;
					this.queryString['valormaximo']=999999999999999999;
				}
			} 
			new ParseXSLT(this.proxy,this.campo.xml,this.campo.xslt,this.campo.destino,this.queryString,function(request) {my.other.posCarga(my.indice,my.queryString,request);});
		}
	}
});
var Bairros = Class.create();
Object.extend(Bairros.prototype, {
	initialize: function(proxy, regiao, queryString,posCarga) {
		this.proxy=proxy;
		this.regiao=regiao;
		this.destino='divBairros';
		this.queryString=queryString;
		this.posCarga=posCarga;
	},
	carrega: function() {
		var my=this;
		$(this.destino).innerHTML='<br/>';
		new ParseXSLT(this.proxy,'bairro.csp','bairros.xsl',this.destino,this.queryString,function() {my.posCarga(my)});
	}
});
