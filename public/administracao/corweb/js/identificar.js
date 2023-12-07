var Indentificacao = Class.create(Basico, {
	initialize: function(proxy,objOrigem,ref,tipoVIS,anchor) {
		this.proxy=proxy;
		this.objOrigem=$(objOrigem);
		this.ref=ref;
		this.tipoVis=tipoVIS;
		this.destino=$('divIdent');
		this.anchor=anchor;
		this.xml='imovel.csp';
		this.xslt='imovel.xsl';
		this.TIMEOUTERRO=null;
		this.IDENTIFICACAO={};
		this.prepara();
		this.dragHandle=null;
		if (DEBUG==true) {
			$('txtNome').value='Jefferson';
			$('txtTelefone').value='(11) 1111-1111';
			$('txtEmail').value='jefferson@sisprof.com.br';
		}
	},
	fechar: function(myThis) {
		if (this.dragHandle) {
			this.dragHandle.destroy();
		}
		this.visible=false;
		new Effect.Fade(myThis.destino);
		exibeImovel(myThis.objOrigem.id,myThis.ref,myThis.tipoVis,myThis.anchor);
	},
	fechar_mouseover: function() {
		$('imgFecharIdent').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	fechar_mouseout: function() {
		$('imgFecharIdent').src=encodeURI(URL+'/imagens/fechar-enab.gif');
	},
	exibeCampos: function(myThis) {
		$('divIdentQ').style.display='none';
		$('divIdentNada').style.display='block';
	},
	identificar: function(myThis) {
		if (myThis.valida()==true) {
			myThis.enviaIdentificacao(false);
		}
	},
	prepara: function() {
		var my=this;
		if (PROMOCOESV && (typeof(PROMOCOESV)=="object")) {
			PROMOCOESV.congela();
		}
		if (PROMOCOESL && (typeof(PROMOCOESL)=="object")) {
			PROMOCOESL.congela();
		}
		if (PROMOCOESE && (typeof(PROMOCOESE)=="object")) {
			PROMOCOESE.congela();
		}
		$('imgFecharIdent').onclick=function() {my.fechar(my)};
		var inputIdent1=$('optIndentN');
		inputIdent1.onclick=function() {my.fechar(my)};
		inputIdent1.checked=false;
		var inputIdent2=$('optIndentS');
		inputIdent2.onclick=function() {my.exibeCampos(my)};
		inputIdent2.checked=false;
		$('cmdEnvia').onclick=function() {my.identificar(my)};
		new MaskedInput('txtTelefone','(##) ####-####');
	},
	exibe: function() {
		var my=this;
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					var win = my.calculaPosicao(200,100);
					my.destino.style.top=(win.y>0?win.y:0)+'px';
					my.destino.style.left=win.x+'px';
					$('divIdentNada').style.display='none';
					$('divIdentQ').style.display='block';
					my.dragHandle=new Draggable(my.destino,{handle:'spanTitIdent'});
					new Effect.Appear(my.destino);
					my.visible=true;
				}
			}
		);
	},
	exibeErro: function(msg,obj) {
		if ($(obj)) {
			$(obj).innerHTML=msg;
			if (msg !='')	this.TIMEOUTERRO = setTimeout('this.exibeErro("","'+obj+'")',5000);
		}
	},
	checkMail: function(mail) {
		var er=/^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
		if(typeof(mail)=="string") {
			if(er.test(mail)) return true; 
		} else if(typeof(mail)=="object") {
			if(er.test(mail.value)) return true; 
		}
		return false;
	},
	checkCPFCNPJ: function(cpf) {
		if (unformatNumber(cpf).length>11) return isCnpj(cpf);
		else return isCpf(cpf);
	},
	getTelefone: function() {
		var tel='';
		if ($('txtTelefone').value!='(__) ____-____') {
			tel=$('txtTelefone').value;
		}
		return tel;
	},
	valida: function() { return true;
		if ($('txtNome').value=='') {
			this.exibeErro('Voc&ecirc; deve informar seu Nome','tdMens');
			return false;
		}
		if ($('txtEmail').value=='') {
			this.exibeErro('Voc&ecirc; deve informar seu E-mail','tdMens');
			return false;
		} else if (!this.checkMail($('txtEmail'))) {
			this.exibeErro('Seu E-mail n&atilde;o parece v&aacute;lido','tdMens');
			return false;
		}
		return true;
	},
	enviaIdentificacao: function(ignoraPesquisa) {
		var nome=$('txtNome').value;
		var tel=this.getTelefone();
		var email=$('txtEmail').value;
		if (this.dragHandle) {
			this.dragHandle.destroy();
		}
		new Effect.Fade(this.destino);
		var queryString = new Object();
		queryString['nome']=nome;
		queryString['tel']=tel;
		queryString['email']=email;
		queryString['tipoVis']=this.tipoVIS;
		$('divIdent').style.display='none';
		var ident=new IndentificaCliente(this.proxy,this.ref,this.tipoVis,this.anchor,queryString,ignoraPesquisa);
		ident.carrega();
	}
});
var IndentificaCliente = Class.create(Basico, {
	initialize: function(proxy,ref,tipoVis,anchor,queryString,ignoraPesquisa) {
		this.proxy=proxy;
		this.ref=ref;
		this.tipoVis=tipoVis;
		this.anchor=anchor;
		this.queryString=queryString;
		this.ignoraPesquisa=ignoraPesquisa;
		this.xml='identificar.csp';
		this.interessados=null;
		this.preinteressados=null;
	},
	preparaLista: function(xmlDoc) {
		var a=xmlDoc.getElementsByTagName('identificacao').item(0);
		this.interessados = new Array();
		var ints=a.getElementsByTagName('interessado');
		if (ints.length>0) {
			for (var i=0;i<ints.length;i++) {
				var z=this.getNode(ints[i]);
				this.interessados.push(z);
			}
		}
		this.preinteressados = new Array();
		var preints=a.getElementsByTagName('preinteressado');
		if (preints.length>0) {
			for (var i=0;i<preints.length;i++) {
				var z=this.getNode(preints[i]);
				this.preinteressados.push(z);
			}
		}
	},
	continua: function(myThis) {
		MOUSE.hide();
		var query=null;
		if ((myThis.interessados.length<=0) && (myThis.preinteressados.length==1 && myThis.preinteressados[0].tipo=='0')) {
			var sel=new SelecionaCliente(myThis.proxy,{codigo:myThis.preinteressados[0].key,tipo:'preinteressado'},$('divCliente'),myThis.ref,myThis.tipoVis,myThis.anchor);
			sel.carrega();
		} else {
			var zargs=new Object();
			if (myThis.interessados && myThis.interessados.length > 0) {
				zargs.interessados = new Array();
				try {
				for (var i=0; i<myThis.interessados.length; i++) {
					zargs.interessados[i]=myThis.interessados[i].key;
				}
				} catch(er) {
					alert(er);
				}
			}
			if (myThis.preinteressados && myThis.preinteressados.length > 0) {
				zargs.preinteressados = new Array();
				for (var i=0; i<myThis.preinteressados.length; i++) {
					zargs.preinteressados[i]=myThis.preinteressados[i].key;
				}
			}
			var lista=new ListaInteressados(myThis.proxy,zargs,myThis.ref,myThis.tipoVis,myThis.anchor,$('divInts'));
			lista.carrega();
		}
	},
	carrega: function() {
		MOUSE.show();
		var my=this;
		var url='';
		this.queryString['ignorapesquisa']=0;
		if (this.ignoraPesquisa==true) {
			this.queryString['ignorapesquisa']=1;
		}
		if (this.proxy==true) {
			url=URL+'/proxy/index.'+PROXYTYPE;
			this.queryString.url=this.xml;
		} else {
			url=this.xml;
		}
		new Ajax.Request(url, {
			parameters:Object.toQueryString(my.queryString),
			asynchronous: false,
			onSuccess: function(request) {
				my.preparaLista(request.responseXML);
				my.continua(my);
			},
			onFailure: function() {
				MOUSE.hide();
				if (DEBUG && DEBUG == true) {alert('Erro ao identificar');}
			}
		});
	}
});
var ListaInteressados = Class.create(Basico, {
	initialize: function(proxy,queryString,ref,tipoVis,anchor,destino) {
		this.proxy=proxy;
		this.destino=destino;
		this.ref=ref;
		this.tipoVis=tipoVis;
		this.anchor=anchor;
		this.queryString=queryString;
		this.xml='listainteressados.csp';
		this.xslt='listainteressados.xsl';
	},
	getTelefone: function() {
		var tel='';
		if ($('txtTelefone').value!='(__) ____-____') {
			tel=$('txtTelefone').value;
		}
		return tel;
	},
	clickNenhum: function(myThis) {
		var nome=$('txtNome').value;
		var tel=myThis.getTelefone();
		var email=$('txtEmail').value;
		var queryString = new Object();
		queryString['nome']=nome;
		queryString['tel']=tel;
		queryString['email']=email;
		queryString['tipoVis']=myThis.tipoVIS;
		$('divIdent').style.display='none';
		var ident=new IndentificaCliente(myThis.proxy,myThis.ref,myThis.tipoVis,myThis.anchor,queryString,true);
		ident.carrega();
		Effect.Fade(myThis.destino);
	},
	posCarga: function(request,myThis) {
		MOUSE.hide();
		var win = myThis.calculaPosicao(430,250);
		myThis.destino.style.top=(win.y>0?win.y:0)+'px';
		myThis.destino.style.left=win.x+'px';
		myThis.dragHandle=new Draggable(myThis.destino);
		$('radioNenhum').onclick=function(){myThis.clickNenhum(myThis);};
		Effect.Appear(myThis.destino);
	},
	carrega: function() {
		MOUSE.show();
		var args = '';
		if (this.queryString) {
			if (this.queryString.interessados && this.queryString.interessados.length > 0 ) {
				args = 'interessados=' + this.queryString.interessados.flatten();
			}
			if (this.queryString.preinteressados && this.queryString.preinteressados.length > 0 ) {
				if (args != '') {
					args = args + '&';
				}
				args = args + 'preinteressados=' + this.queryString.preinteressados.flatten();
			}
		}
		new ParseXSLT(this.proxy,this.xml,this.xslt,this.destino,args,this.posCarga,this);
	}	
});
var SelecionaCliente = Class.create(Basico, {
	initialize: function(proxy,queryString,destino,ref,tipoVis,anchor) {
		this.proxy=proxy;
		this.queryString=queryString;
		this.destino=destino;
		this.ref=ref;
		this.tipoVis=tipoVis;
		this.anchor=anchor;
		this.xml='carregaint.csp';
		this.xslt='carregaInteressado.xsl';
	},
	posCarga: function(request,myThis) {
		var cli=request.responseXML.getElementsByTagName('identificacao').item(0).getElementsByTagName('cliente').item(0);
		try {
			INTERESSADO=myThis.getNode(cli);
		} catch(er) {alert(er);}
		try{
			exibeImovel(myThis.anchor,myThis.ref,myThis.tipoVis,myThis.anchor);
		}catch(er) {alert(er);}
		Effect.Fade('divInts');
	},
	carrega: function() {
		MOUSE.show();
		new ParseXSLT(this.proxy,this.xml,this.xslt,this.destino,this.queryString,this.posCarga,this);
	}	
});
