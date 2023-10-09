var Mapa = Class.create(Basico, {
	initialize: function(proxy) {
		this.proxy=proxy;
		this.geoposicao=null;
		this.GoogleMaps=false;
		this.div=$('divMapaConteudo');
		this.dragHandle=null;
	},
	obtemGoogleMaps: function() {
		var my=this;
		var url='';
		var parametros=new Object();
		if (this.proxy==true) {
			parametros.url='googlemaps.csp';
			url=URL+'/proxy/index.'+PROXYTYPE;
		} else {
			url='googlemaps.csp';
		}
		new Ajax.Request(url, {
			parameters:Object.toQueryString(parametros),
			asynchronous: true,
			onSuccess: function(request) {
				var gm=request.responseXML.getElementsByTagName('googlemaps').item(0);
				GOOGLEMAPS=my.getNode(gm);
				GOOGLEMAPS['registro']=false;
				my.leScripts(my);
			},
			onFailure: function() {
				if (DEBUG && DEBUG == true) {alert("Erro ao obter as Definições do GoogleMaps");}
			}
		});
	},
	leScripts: function(myThis) {
		if (!GOOGLEMAPS['carregado']) {
			var js=document.createElement('script');
			js.type="text/javascript";
			js.src=GOOGLEMAPS.src+'?file='+GOOGLEMAPS.tipo+'&v='+GOOGLEMAPS.versao+'&key='+GOOGLEMAPS.key+'&async=2&callback=MAPA.continua';
			js.language="JavaScript";
			js.charset='UTF-8';
			var head=document.getElementsByTagName('head')[0];
			head.appendChild(js);
		} else {
			MAPA.continua();
		}
	},
	continua: function() {
		GOOGLEMAPS['carregado']=true;
		var myScripts = new Array();
		if (!TLABEL) {
			myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"gmapa.js"});
			myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"proximidades.js"});
			myScripts.push({type:"text/javascript",language:"JavaScript",charset:"ISO-8859-1",src:"tlabel.2.05.js"});
			var my=this;
			carregaScripts(myScripts,myScripts.length-1,function() {my.carrega()});
		} else {
			MAPA.carrega();
		}
	},
	carrega: function() {
		this.geoposicao=new Object();
		var coor=IMOVEL.geoposicao.coordenadas.split(',');
		this.geoposicao['ref']=IMOVEL.referencia;
		this.geoposicao['latitude']=parseFloat(coor[0]);
		this.geoposicao['longitude']=parseFloat(coor[1]);
		this.geoposicao['icone']=(parseInt(IMOVEL.geoposicao.tipo)==0?URL+'/imagens/casa.gif':URL+'imagens/predio.gif');
		var ponto=new Ponto(this.geoposicao.latitude,this.geoposicao.longitude);
		var gmapa=new GMapa(ponto,this.div);
		gmapa.exibe();
	},
	exibir: function() {
		var win = this.calculaPosicao(375,280);
		$('cardMapa').style.top=(win.y>0?win.y:0)+'px';
		$('cardMapa').style.left=win.x+'px';
		this.dragHandle=new Draggable('cardMapa',{handle: 'spanTitMapa',starteffect: function(){},endeffect: function(){},snap : [20, 20]});
		new Effect.Appear('cardMapa');
		this.visible=true;
	},
	fechar: function () {
		if (this.dragHandle) {
			this.dragHandle.destroy();
		}
		new Effect.Fade('cardMapa');
		GUnload();
		this.div.innerHTML='';
		MAPA.geoposicao=null;
		this.GoogleMaps=true;
		this.visible=false;
	},
	fechar_mouseover: function() {
		var img=$('imgFecharMapa')
		img.src=encodeURI(URL+'/imagens/fechar-enab.gif')
	},
	fechar_mouseout: function() {
		var img=$('imgFecharMapa')
		img.src=encodeURI(URL+'/imagens/fechar.gif')
	}
});
