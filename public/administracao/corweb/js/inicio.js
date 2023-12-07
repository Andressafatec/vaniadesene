var DEBUG=false;
var TIMEOUT=60000;
var CACHEXSL = null;
var URL="";
var DOMAIN="";
var MOUSE=null;
var AGUARDE=null;
var INICIALIZADO=null;
var INTERESSADO=null;
var IDENTIFICADO=false;
var PROXY=true;
var PROXYTYPE='php';
var PROMOCOESV=null;
var PROMOCOESL=null;
var PROMOCOESE=null;
var CADASTRO=null;
var PESQUISAR=null;
var IMO=null;
var IMOVEL=null;
var INDENT=null;
var REFERENCIA=null;
var GOOGLEMAPS=null;
var TLABEL=null;
var MAPA=null;
var LOGIN=null;
var CTRLOGIN=null;
var COMBOS=null;
var FAIXASVALORES=null;
var OPTIONS=null;
var SISPROFLOAD=false;
var DIVSISPROF=null;
var PEDIRIDENTIFICACAO=0;
var MAXIMOPEDIRIDENTIFICACAO=99999;
var MOSTRARFOTO=false;
var JUNTO=false;
var Rico={
	initialize: function() {},
	includeLoaded:function(script) {},
	loadModule:function(module){},
	onLoad:function() {}
};
var Basico=null;
function converteArgumentos(args) {
	ret=new Object();
	t=args.split('&'); 
	for (i=0;i<t.length;i++) {
		g=t[i].split('=');
		ret[g[0]]=g[1];
	}
	return ret;
}
function getArgumentos(args) {
	var myArgs = new Array();
	if (!args) return myArgs; // return empty object
	var Pairs = args.split(/[;&]/);
	for ( var i = 0; i < Pairs.length; i++ ) {
		var KeyVal = Pairs[i].split('=');
		if ( ! KeyVal || KeyVal.length != 2 ) continue;
		var key = unescape( KeyVal[0] );
		var val = unescape( KeyVal[1] );
		val = val.replace(/\+/g, ' ');
		myArgs[key] = val;
	}
	return myArgs;
}
function proximoScript(indice,myScripts,onLoaded) {
	indice=indice-1;
	if ( indice >= 0 ) {
		carregaScripts(myScripts, indice,onLoaded);
	} else {
		onLoaded(this);
	}
}
function carregaScripts(myScripts, indice, onLoaded) {
	if (!myScripts[indice]) return;
	var js=document.createElement('script');
	js.type=myScripts[indice].type;
	if (myScripts[indice].direto && myScripts[indice].direto==true) {
		js.src=(myScripts[indice].src);
	} else {
		js.src=(URL +'js/'+ myScripts[indice].src);
	}
	js.language=myScripts[indice].language;
	js.charset=myScripts[indice].charset;
	if (window.ActiveXObject) {
		js.onreadystatechange=function() {
			if (js.readyState && js.readyState != 'loaded' && js.readyState != 'complete') return;
			js.onreadystatechange=null;
			if (myScripts[indice].posCarga && typeof(myScripts[indice].posCarga)=='function') {
				myScripts[indice].posCarga();
			}
			proximoScript(indice,myScripts,onLoaded);
		}	
	} else {
		js.onload=function() {
			if (myScripts[indice].posCarga && typeof(myScripts[indice].posCarga)=='function') {
				myScripts[indice].posCarga();
			}
			proximoScript(indice,myScripts,onLoaded);
		}
	}
	var head=document.getElementsByTagName('head')[0];
	head.appendChild(js);
}
function carregaStylesBasicos(onLoaded) {
	var myStyle=new Array();
	myStyle.push({type:"text/css",rel:"stylesheet",src:"estilo.css",media:"screen"});
	myStyle.push({type:"text/css",rel:"stylesheet",src:"promo.css",media:"screen"});
	for (var i=0;i<myStyle.length;i++) {
		var st=document.createElement('link');
		st.type=myStyle[i].type;
		st.rel=myStyle[i].rel;
		st.media=myStyle[i].media;
		st.href=(URL + myStyle[i].src);
		var head=document.getElementsByTagName('head')[0];
		head.appendChild(st);
	}
	onLoaded(this);
}
function carregaScriptsBasicos(onLoaded) {
	var myScripts = new Array();
	
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"rico/ricoBehaviors.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"rico/ricoEffects.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"rico/ricoComponents.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"ricoutil.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"dragdrop.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"effects.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"aguarde.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"cadastro.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"promocoes.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"detalhes.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"cpfcnpj.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"inputmask.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"formatNumber.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"identificar.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"indicarimovel.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"visita.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"mensagem.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"proposta.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"financiamento.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"login.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"imovel.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"ponto.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"combos.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"pesquisa.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"mapas.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"cachefxval.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"mouse.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"netapi.js"});
	myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"prototype.js",posCarga:posPrototype});
	carregaScripts(myScripts,myScripts.length-1,onLoaded);
}
function posPrototype() {
	/*var Browser = Class.create({
	  initialize: function() {
		var userAgent = navigator.userAgent.toLowerCase();
		this.version = (userAgent.match( /.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [])[1];
		this.safari = /webkit/.test( userAgent );
		this.opera = /opera/.test( userAgent );
		this.msie = /msie/.test( userAgent ) && !/opera/.test( userAgent );
		this.mozilla = /mozilla/.test( userAgent ) && !/(compatible|webkit)/.test( userAgent );
	  }
	});
	alert(Object.toJSON(new Browser()) + 'url:  http://www.uol.com.br');*/	
	Basico=Class.create();
	Object.extend(Basico.prototype, {
		getWinSize: function() {
			var winW = 0;
			var winH = 0;
			if (window.ActiveXObject) {
				winW = document.body.offsetWidth-20;
				winH = document.body.offsetHeight-20;
			} else {
				winW = window.innerWidth-16;
				winH = window.innerHeight-16;
			}
			return {width: winW>0?winW:0, height: winH>0?winH:0};
		},
		calculaPosicao: function(w,h) {
			var win = this.getWinSize();
			var x = 0;
			var y = 0;
			if (DIVSISPROF==null) {
				x = (win.width/2)-w;
				y = (win.height/2)-h+RicoUtil.docScrollTop();
			} else {
				x = (DIVSISPROF.x/2)-w;
				y = (DIVSISPROF.y/2)-h;
			}
			return {'x': x, 'y': y};
		},
		getNode: function(node) {
			if (!node) return;
			var obj=new Object();
			for (var i=0;i<node.childNodes.length;i++) {
				var no=node.childNodes.item(i);
				if (no.nodeType!=1) continue;
				if (no.firstChild && no.firstChild.nodeValue) {
					obj[no.nodeName]=no.firstChild.nodeValue.replace(/[\n\r\t]/g,'')
				}
			}
			return obj;
		}
	});
}
function resolveArgumentos() {
	var scripts = document.getElementsByTagName('script');
	var myScript = scripts[ scripts.length - 1 ];
	var params = getArgumentos(myScript.src.replace(/^[^\?]+\??/,''));
	URL=params["url"];
	SERVER=params["server"];
	PROXY=(params["proxy"] && params["proxy"]=='true');
	if (PROXY==true) {
		if (params["proxyType"]) PROXYTYPE=params["proxyType"];
	}
	START=params["start"];
	if (params["options"] != '') {
		eval('OPTIONS='+params["options"]+';');
	}
	if (params["divsisprof"] != '') {
		eval('DIVSISPROF='+params["divsisprof"]+';');
	}
	if (params["maximoPedirIdentificacao"]) {
		MAXIMOPEDIRIDENTIFICACAO=params["maximoPedirIdentificacao"];
	}
	if (OPTIONS && OPTIONS["junto"]){
		JUNTO=OPTIONS["junto"];
	}
}
function scriptsLidos() {
	Event.observe($('divSisprof'),'mousemove',getMouseXY);
	CACHEXSL=new Object();
	var params = converteArgumentos(window.location.search.substring(1));
	if (OPTIONS && OPTIONS['empre']) {
			params['empre']=OPTIONS['empre'];
	}
	new Inicializado(PROXY, params);
	if (START=='pesquisa') {
		iniciaPesquisa();
	} else if (START=='promocao') {
		iniciaPromocoes();
	} else if (START=='cadastro') {
		iniciaCadastro();
	} else if (START=='imovel') {
		iniciaImovel();
	} else if (START=='geocadastro') {
		iniciaGeoCad();
	}
	SISPROFLOAD=false;
}
function iniciaGeoCad() {
	var params = converteArgumentos(window.location.search.substring(1));
	var preparaGeo=new ParseXSLTStatic(PROXY,CONTRATOS,'preparageocad.xsl','divSisprof',function() {
		MOUSE=new Mouse();
		AGUARDE=new Aguarde();
		var myScripts = new Array();
		myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"geocadastro.js"});
		carregaScripts(myScripts,myScripts.length-1,function() {inicializar();});
	});
	preparaGeo.carrega();
}
function iniciaImovel() {
	var params = converteArgumentos(window.location.search.substring(1));
	var preparaBas=new ParseXSLTStatic(PROXY,CONTRATOS,'preparabasicos.xsl','divSisprof',function() {
		MOUSE=new Mouse();
		exibeImovel('divSisprof',params.ref,6,'divSisprof');
	});
	preparaBas.carrega();
}
function iniciaCadastro() {
	var preparaCadastro=new ParseXSLTStatic(PROXY,CONTRATOS,'preparacadimovel.xsl','divSisprof',function() {
		var args=new Object();
		if (OPTIONS && OPTIONS['empre']) {
			args['empre']=OPTIONS['empre'];
		}
		if (OPTIONS && OPTIONS['ctr']) {
			args['ctr']=OPTIONS['ctr'];
		}
		if (OPTIONS && OPTIONS['tipo']) {
			args['tipo']=OPTIONS['tipo'];
		}
		if (OPTIONS && OPTIONS['estado']) {
			args['estado']=OPTIONS['estado'];
		} else {
			args['estado']='SP';
		}
		MOUSE=new Mouse();
		AGUARDE=new Aguarde();
		CADASTRO=new Cadastro(PROXY, args);
		CADASTRO.carrega();
		CADASTRO.proprietario.show();
	});
	preparaCadastro.carrega();
}
function iniciaPromocoes() {
	var dst = (JUNTO == true ? 'divSisprof1' : 'divSisprof');
	var prepara = (JUNTO == true ? 'preparapromocoes-junto.xsl' : 'preparapromocoes.xsl');
	var preparaProm=new ParseXSLTStatic(PROXY,CONTRATOS,prepara,dst,function() {
		MOUSE=new Mouse();
		AGUARDE=new Aguarde();
		var offset=OPTIONS.offset ? OPTIONS.offset : 3;
		if (OPTIONS.venda==true) {
			PROMOCOESV=new Promocoes(PROXY,TIMEOUT,'promocao.xsl',{ctr:1,offset:offset},'divPromocoesVenda','divTrabVenda');
			PROMOCOESV.carrega();
		}
		if (OPTIONS.locacao==true) {
			PROMOCOESL=new Promocoes(PROXY,TIMEOUT,'promocao2.xsl',{ctr:2,offset:offset},'divPromocoesLocacao','divTrabLocacao');
			PROMOCOESL.carrega();
		}
		if (OPTIONS.empreendimento==true) {
			PROMOCOESE=new Promocoes(PROXY,TIMEOUT,'promocao3.xsl',{ctr:3,offset:offset},'divPromocoesEmpreendimento','divTrabEmpreendimento');
			PROMOCOESE.carrega();
		}
	});
	preparaProm.carrega();
}
function iniciaPesquisa() {
	var prepara = (JUNTO == true ? 'preparapesquisa-junto.xsl' : 'preparapesquisa.xsl');
	var preparaPesq=new ParseXSLTStatic(PROXY,CONTRATOS,prepara,'divSisprof',function() {
		MOUSE=new Mouse();
		COMBOS=new Combos(PROXY);
		COMBOS.inicia(0,OPTIONS);
		$('txtRef').observe('keypress',function(evt) {
			var e = evt || event;
			var code = e.keyCode || e.which || e.charCode;
			if (code==Event.KEY_RETURN) {
				exibirDetalhes($('txtRef'),$('txtRef').value,4,$('txtRef'));
			}
		});
		if (JUNTO && JUNTO==true) {
			iniciaPromocoes();
		}
	});
	preparaPesq.carrega();
}
function getMouseXY(e) {
	try {
		MOUSE.setX(parseInt((e)?e.pageX:event.clientX));
		MOUSE.setY(parseInt((e)?e.pageY:event.clientY));
	} catch(er) {}
}
function carregaBasicos(onLoaded) {
	carregaStylesBasicos(
		function() {
			carregaScriptsBasicos(onLoaded);
		}
	);
}
function inicializaSistema() {
	var userAgent=window.navigator.userAgent;
	var loc=null;
	var locVer=null;
	var nav=null;
	var navVer=null;
	var body=document.body;
	if (userAgent.search('Firefox')>0){
	  loc=userAgent.search('Firefox');
	  locVer=loc+8;
	  nav='Firefox';
	  navVer=userAgent.substring(locVer,locVer+6);
	} 
	if (userAgent.search('MSIE')>0){
	  loc=userAgent.search('MSIE');
	  locVer=loc+5;
	  nav='MSIE';
	  navVer=userAgent.substring(locVer,locVer+3);
	} 
	if (userAgent.search('Chrome')>0){
	  loc=userAgent.search('Chrome');
	  locVer=loc+7;
	  nav='Chrome';
	  navVer=userAgent.substring(locVer,locVer+3);
	}
	if (nav=='MSIE' && navVer=='6.0'){
		var body=document.body;
		var backNav=document.createElement('div');
		backNav.id='backNav';
		backNav.style.cssText='position:absolute;left:0px;top:0px;width:100%;height:100%;background-image:url("imagens/nada.gif");';
		body.appendChild(backNav);
		var newNav=document.createElement('div');
		newNav.id='newNav';
		newNav.style.cssText='width:400px;height:150px;margin-left:'+ (body.clientWidth-400)/2 +'px;margin-top:'+ (body.clientHeight-150)/2 +'px;background-color:white;border:1px solid rgb(204, 204, 204);text-align:center;';
		newNav.innerHTML='<div style="width:100%;text-align:right;background-color:rgb(102,102,102);"><span id="fechar" style="cursor:pointer;color:white;">fechar(x)</span></div><span style="padding:10px;display:block;">Seu navegador atual é o Internet Explorer 6 e precisa ser atualizado. Pois esse site pode não funcionar corretamente. Para isso acesse o site oficial de atualização.</span><p><a href="http://www.microsoft.com/brasil/windows/internet-explorer/worldwide-sites.aspx" target="_blank">Página de Download do Internet Explorer</a></p>';
		backNav.appendChild(newNav);
		document.getElementById('fechar').onclick=function(){
			body.removeChild(document.getElementById('backNav'));
			carregaBasicos(scriptsLidos);
			if (TM) {
				clearTimeout(TM);
			}
		};
		TM=setTimeout(function(){
			if (backNav){
				document.getElementById('fechar').onclick();
			}
		},10000);
	} else {
		carregaBasicos(scriptsLidos);
	}
	SISPROFLOAD=true;
}
function pesquisar() {
	PESQUISAR=new Pesquisa(PROXY);
	PESQUISAR.carrega(PESQUISAR.getQueryString());
}
function exibirDetalhes(objOrigem,ref,tipoVis,anchor) {
	if (LOGIN==null && INTERESSADO == null && PEDIRIDENTIFICACAO<MAXIMOPEDIRIDENTIFICACAO) {
		pedirIdentificacao(objOrigem,ref,tipoVis,anchor);
	} else {
		exibeImovel(objOrigem,ref,tipoVis,anchor);
	}
}
function pedirIdentificacao(objOrigem,ref,tipoVis,anchor) {
	PEDIRIDENTIFICACAO++;
	INDENT=new Indentificacao(PROXY,objOrigem,ref,tipoVis,anchor);
	INDENT.exibe();
}
function exibeImovel(objOrigem,ref,tipoVis,anchor) {
	IMO=new Imovel(PROXY,ref,tipoVis,objOrigem);
	IMO.carrega();
}
function selecionaCliente(codigo,tipo,fecha) {
	var arg={'codigo':codigo,'tipo':tipo};
	var sel=new SelecionaCliente(PROXY,arg,'divCliente');
	sel.carrega();
}
function visualizarMapa(ref,coordenadas,tipoIco) {
	MAPA=new Mapa(PROXY);
	MAPA.obtemGoogleMaps();
	MAPA.exibir();
}
function mostrarLogin() {
	if (CTRLOGIN==null) {
		CTRLOGIN=new Login(PROXY,'divMenu');
	}
	CTRLOGIN.show();
}

resolveArgumentos();
window.onload=function() {inicializaSistema();};
