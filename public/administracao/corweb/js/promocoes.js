var Promocoes = Class.create(Basico, {
	initialize: function(proxy,timeOut,xslt,queryString,destino,aguarde) {
		this.proxy=proxy;
		this.timeOut=timeOut;
		this.queryString=queryString;
		this.destino=destino;
		this.aguarde=aguarde;
		this.xml='promocoes.csp';
		this.xslt=xslt;
		this.timeHandle=null;
		this.congelado=false;
		//this.queryString['teste']=1;
		this.queryString['pagina']=0;
		this.promocao=null;
		$(this.destino).style.display='block';
	},
	getAnchor: function() {
		return this.destino;
	},
	posCarga: function(request,myThis) {
		if (myThis.congelado==false && myThis.timeHandle==null) {
			myThis.timeHandle=setTimeout(function() {
			myThis.timeHandle=null;
			myThis.queryString.pagina++;
			if (parseInt(myThis.queryString.pagina)>=parseInt(myThis.promocao.ultima)) {
				myThis.queryString.pagina=0;
			}
			myThis.carrega();
			},
			myThis.timeOut);
		}
		
		var nav=request.responseXML.getElementsByTagName('navegacao').item(0);
		myThis.promocao=myThis.getNode(nav);
		$(myThis.destino).style.display='block';
		MOUSE.hide();
		$$('#'+myThis.destino+' .divPromocoes')[0].style.display='block';
		$$('#'+myThis.destino+' .divPromocoesPg')[0].style.display='block';
		$$('#'+myThis.destino+' .divPromocoesTrabalho')[0].style.display='none';
		//Effect.ScrollTo(myThis.destino);
	},
	carrega: function() {
		MOUSE.show();
		var my=this;
		$$('#'+my.destino+' .divPromocoesTrabalho')[0].style.display='block';
		$$('#'+my.destino+' .divPromocoesPg')[0].style.display='none';
		$$('#'+my.destino+' .divPromocoes')[0].style.display='none';
		new ParseXSLT(my.proxy,my.xml,my.xslt,my.destino,my.queryString,my.posCarga,my);
	},
	pagina: function() {
		return this.queryString.pagina;
	},
	carregaPagina: function(pagina) {
		this.congela();
		this.queryString.pagina=pagina;
		this.congelado=false;
		this.carrega();
	},
	hide: function() {
		Effect.BlindUp(this.destino);
	},
	show: function() {
		Effect.BlindDown(this.destino);
	},
	congela: function() {
		if (this.congelado==true) return;
		this.congelado=true;
		clearInterval(this.timeHandle);
		this.timeHandle=null;
	},
	descongela: function() {
		if (this.congelado==false) return;
		this.congelado=false;
		var my=this;
		my.timeHandle=setTimeout(function() {
			my.timeHandle=null;
			my.queryString.pagina++;
			my.carrega();
		},
		my.timeOut);
	}
});
