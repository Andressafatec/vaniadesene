var Pesquisa = Class.create(Basico, {
	initialize: function(proxy,queryString) {
		this.proxy=proxy;
		this.queryString=queryString;
		this.pagina=0;
		this.xml='pesquisar.csp';
		this.xsl='pesquisa.xsl';
		this.divOrdem=$('divBairros');
		this.destino='divResultadoPesquisa';
		this.objetos = [{campo: 'ctr'},{campo: 'tipo'},{campo: 'cidade'},{campo: 'regiao'},{campo: 'faixaValor'},{campo: 'dormitorios'},{campo: 'suites'},{campo: 'pacote'},{campo: 'garagens'},{campo: 'campo'}];
		this.foto=null;
		this.timeOrganizar=null;
		this.timeOutFoto=null;
		this.imoveis=null;
	},
	posCarga: function(request,myThis) {
		try {
			var imos=request.responseXML.getElementsByTagName('imoveis').item(0);
			myThis.imoveis=new Object();
			var imoveis=imos.getElementsByTagName('imovel');
			if (imoveis.length>0) {
				var aux=new Array();
				aux.push('dormitorio');
				aux.push('suite');
				aux.push('garagem');
				for (var i=0;i<imoveis.length;i++) {
					var imo=imoveis[i];
					var imovel=myThis.getNode(imo);
					for (var y=0;y<aux.length;y++) {
						var cpo=imo.getElementsByTagName(aux[y]).item(0);
						if (cpo && cpo.childNodes.length>0) {
							var no=cpo.getElementsByTagName('campo').item(0);
							imovel[aux[y]]=myThis.getNode(no);
						}
					}
					var cpo=imo.getElementsByTagName('fotos').item(0);
					if (cpo && cpo.childNodes.length>0) {
						var no=cpo.getElementsByTagName('foto').item(0);
						imovel['foto']=myThis.getNode(no);
					}
					myThis.imoveis[imovel.referencia]=imovel;
				}
			}
			myThis.imoveis['pesquisa']=myThis.getNode(imos.getElementsByTagName('pesquisa').item(0));
		} catch(er) {}
		myThis.divOrdem.style.display='none';
		$('divThumb').style.display='none';
		$('divBairros').style.display='none';
		$('divResultadoPesquisa').style.display='block';
		$('divPromocoesTrabalho').style.display='none';
	},
	carrega: function(queryString) {
		var my=this;
		if (window.ActiveXObject) {
			$('divPesquisaTrabalho').style.left='35%';
			$('divPesquisaTrabalho').style.width='100px';
			$('divPesquisaTrabalho').style.height='100px';
		}
		$('divResultadoPesquisa').style.display='none';
		$('divPromocoesTrabalho').style.display='block';
		my.imoveis=null;
		my.queryString=queryString;
		//my.queryString['teste']=1;
		new ParseXSLT(my.proxy,my.xml,my.xsl,my.destino,queryString,function(request) {my.posCarga(request,my)});
	},
	pagina: function() {
		return this.queryString.pagina;
	},
	organiza:function(coluna,ordena) {
		this.queryString['pagina']=0;
		this.queryString['ordem']=(ordena > 0 ? '' : '-')+coluna;
		this.carrega(this.queryString);
	},
	carregaPagina: function(pagina) {
		this.queryString.pagina=pagina;
		this.carrega(this.queryString);
	},
	getQueryString: function() {
		var queryString=new Object();
		for (var i=0;i<this.objetos.length;i++) {
			if (this.objetos[i].campo=='faixaValor') {
				var faixaValor=null;
				try {
					faixaValor=$(this.objetos[i].campo).value;
					queryString[this.objetos[i].campo]=faixaValor;
					queryString[this.objetos[i].campo]=faixaValor;
					if (faixaValor && faixaValor!="" && FAIXASVALORES && FAIXASVALORES.get(faixaValor)) {
						queryString['valorminimo']=FAIXASVALORES.get(faixaValor).valorminimo;
						queryString['valormaximo']=FAIXASVALORES.get(faixaValor).valormaximo;
					} else {
						queryString['valorminimo']=0;
						queryString['valormaximo']=999999999999999999;
					}
				} catch(semFaixa) {
					if (OPTIONS.modoselecione=1) {
						queryString['valorminimo']=0;
						queryString['valormaximo']=999999999999999999;
					}
				}
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
					try {	queryString[this.objetos[i].campo]="T"} catch(ignore) {}
				}
			} else if (this.objetos[i].campo=='pacote') {
				var valor = 0;
				if ($('pacote').checked) {
					valor=1;
				}	
				try {	queryString['pacote']=valor} catch(ignore) {}
				
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
	exibeOrganizar: function() {
		this.divOrdem.style.left=(MOUSE.getX()+20)+'px';
		this.divOrdem.style.top=MOUSE.getY()+'px';
		this.divOrdem.innerHTML='<center>Clique para Reorganizar</center>'
		this.divOrdem.style.display='block';
		var my=this;
		setTimeout(function() {my.divOrdem.style.display='none';},3000);
	},
	escondeOrganizar: function() {
		this.divOrdem.style.display='none';
	},
	exibirFoto: function(foto) {
		var largura=640;
		var altura=480;
		var div=$('divThumb');
		var cmp=10;
		var my=this;
		
		if (MOSTRARFOTO && MOSTRARFOTO == true) {
			MOUSE.show();
			img=document.createElement('img');
			img.src=encodeURI(foto+'&altura='+altura+'&largura='+largura);
			img.id='imgFoto';
			div.innerHTML='';
			div.appendChild(img);
			div.style.display='none';
			if (window.ActiveXObject) {
				img.onreadystatechange=function() {
					if (img.readyState && img.readyState != 'loaded' && img.readyState != 'complete') return;
					img.onreadystatechange=null;
					my.mostraFoto(my);
				}
			} else {
				img.onload=img.onreadystatechange=function() {
					if (img.readyState && img.readyState != 'loaded' && img.readyState != 'complete') return;
					my.mostraFoto(my);
				}
			}
		}
	},
	mostraFoto: function(myThis) {
		var win = myThis.calculaPosicao(0,240);
		$('divThumb').style.top=(win.y>0?win.y:0)+'px';
		$('divThumb').style.left=win.x-350+'px';
		$('divThumb').style.display='block';
		if (myThis.timeOutFoto!=null) {
			myThis.fecharFoto(myThis);
		}
		myThis.timeOutFoto=setTimeout(function(){myThis.fecharFoto(myThis);},3000);
		MOUSE.hide();
	},
	fecharFoto: function(myThis) {
		clearTimeout(myThis.timeOutFoto);
		myThis.timeOutFoto=null;
		myThis.foto=null;
		$('divThumb').style.display='none';
		$('divThumb').innetHTML='';
		MOUSE.hide();
	},
	exibeResumo: function(ref) {
		var my=this;
		var imo=this.imoveis[ref];
		var divPai=$('divResumoImovel');
		var img=$('imgResumoFoto');
		$('imgResumoFoto').SRC='';
		if (DIVSISPROF==null) {
			divPai.style.top=MOUSE.getY()-80+'px';
			divPai.style.left=MOUSE.getX()+50+'px';
		} else {
			var win = my.calculaPosicao(100,120);
			divPai.style.top=(win.y>0?win.y:0)+'px';
			divPai.style.left=win.x+'px';
		}
		$('divResumoTxt').innerHTML='';
		if (typeof imo.anuncio != "undefined") {
			$('divResumoTxt').appendChild(document.createTextNode(imo.anuncio));
		}
		if (imo.foto && imo.foto.valor) {
			img.src=encodeURI(this.imoveis['pesquisa'].servidor + '/corweb/thumb.php?foto=' + imo.foto.valor +'&altura=154&largura=200');
		} else {
			img.src=encodeURI(this.imoveis['pesquisa'].servidor + '/corweb/thumb.php?foto=&altura=154&largura=200');
		}
		if (window.ActiveXObject) {
			img.onreadystatechange=function() {
				if (img.readyState && img.readyState != 'loaded' && img.readyState != 'complete') return;
				img.onreadystatechange=null;
				divPai.style.display='block';
			}
		} else {
			img.onload=img.onreadystatechange=function() {
				if (img.readyState && img.readyState != 'loaded' && img.readyState != 'complete') return;
				divPai.style.display='block';
			}
		}
	},
	escondeResumo: function() {
		var img=$('imgResumoFoto').src='';
		$('divResumoImovel').style.display='none';
	}
});
