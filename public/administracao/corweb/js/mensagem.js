var Mensagem = Class.create(Basico, {
	initialize: function(proxy,ref,anchor,tipoVis) {
		this.proxy=proxy;
		this.ref=ref;
		this.tipoVis=tipoVis;
		this.anchor=anchor;
		this.xml='mensagem.csp';
	},
	show: function() {
		var my=this;
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					var win = my.calculaPosicao(200,220);
					$('divMensagem').style.top=(win.y>0?win.y:0)+'px';
					$('divMensagem').style.left=win.x+'px';
					$('txtMens').value='';
					my.dragHandle=new Draggable('divMensagem',{handle: 'spanTitMensagem'});
					$('cmdEnviaMens').onclick=function() {
						if (my.validar()==true) {
							my.enviar();
						}
					};
					Effect.Appear('divMensagem');
					this.visible=true;
				}
			}
		);
	},
	hide: function() {
		Effect.Fade('divMensagem');
		this.visible=false;
	},
	mouseOut: function() {
		$('imgFecharMensagem').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	mouseOver: function() {
		$('imgFecharMensagem').src=encodeURI(URL+'/imagens/fechar-enab.gif');
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
	validar: function() {
		if ($('txtMens').value=='') {
			this.showErro('Descreva a Mensagem que voc&ecirc; deseja enviar','tdMensErro');
			return false;
		}
		return true;
	},
	enviar: function() {
		MOUSE.show();
		var queryString=new Object();
		queryString['ref']=this.ref;
		queryString['interessado']=INTERESSADO.key;
		queryString['tipo']=INTERESSADO.tipo;
		queryString['mensagem']=$('txtMens').value;
		var url='';
		if (this.proxy==true) {
			queryString.url=this.xml;
			url=URL+'/proxy/index.'+PROXYTYPE;
		} else {
			url=this.xml;
		}
		new Ajax.Request(url, {
			parameters:Object.toQueryString(queryString),
			asynchronous: false,
			onSuccess: function(request) {
				new Effect.Fade('divMensagem');
				MOUSE.hide();
			},
			onFailure: function() {
				MOUSE.hide();
				if (DEBUG && DEBUG == true) {alert('Erro ao Enviar propostas');}
			}
		});
	}
});