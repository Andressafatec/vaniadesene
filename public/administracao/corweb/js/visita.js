var Visita = Class.create(Basico, {
	initialize: function(proxy,ref,anchor) {
		this.proxy=proxy;
		this.ref=ref;
		this.anchor=anchor;
		this.xml='agendarvisita.csp';
	},
	show: function() {
		var my=this;
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					var win = my.calculaPosicao(125,100);
					$('divVisit').style.top=(win.y>0?win.y:0)+'px';
					$('divVisit').style.left=win.x+'px';
					my.dragHandle=new Draggable('divVisit',{handle: 'spanTitVisit'});
					Effect.Appear('divVisit');
					this.visible=true;
				}
			}
		);
	},
	hide: function() {
		Effect.Fade('divVisit');
		this.visible=false;
		MOUSE.hide();
	},
	mouseOut: function() {
		$('imgFecharVisit').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	mouseOver: function() {
		$('imgFecharVisit').src=encodeURI(URL+'/imagens/fechar-enab.gif');
	},
	enviar: function() {
		var my=this;
		var queryString=new Object();
		MOUSE.show();
		queryString['ref']=this.ref;
		queryString['interessado']=INTERESSADO.key;
		queryString['tipoCliente']=INTERESSADO.tipo;
		var url='';
		if (this.proxy==true) {
			url=URL+'/proxy/index.'+PROXYTYPE;
			queryString.url=this.xml;
		} else {
			url=this.xml;
		}
		new Ajax.Request(url, {
			parameters:Object.toQueryString(queryString),
			asynchronous: false,
			onSuccess: function(request) {
				my.show();
			},
			onFailure: function() {
				MOUSE.hide();
				if (DEBUG && DEBUG == true) {alert('Erro ao Enviar pedido de Visitas');}
			}
		});
	}
});