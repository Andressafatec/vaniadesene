var Login = Class.create(Basico, {
	initialize: function(proxy,anchor) {
		this.proxy=proxy;
		this.anchor=anchor;
		this.xmlLogout='logout.csp';
		this.xmlLogin='login.csp';
	},
	login: function() {
		MOUSE.show();
		var usu = $('txtUsu').value;
		var senha = $('txtSenha').value;
		$('divPesquisaTrabalho').style.display='block';
		var queryString=new Object();
		queryString['usuario']=usu;
		queryString['senha']=senha;
		var my=this;
		var url='';
		if (this.proxy==true) {
			queryString.url=this.xmlLogin;
			url=URL+'/proxy/index.'+PROXYTYPE;
		} else {
			url=this.xmlLogin;
		}
		new Ajax.Request(url, {
				parameters:Object.toQueryString(queryString),
				asynchronous: true,
				onSuccess: function(request) {
					try {
						var a=request.responseXML.getElementsByTagName('login').item(0);
						LOGIN=my.getNode(a);
						if (LOGIN.erro) {
							my.showErro(LOGIN.erro,'tdMensLogin');
						} else {
							IDENTIFICADO=true;
							INTERESSADO=null;
							PREINTERESSADO=null;
							$('spanMenuUsu').innerHTML=LOGIN.nome;
							$('spanMenuLogin').style.display='none';
							$('divCliente').style.display='none';
							$('divCliente').innerHTML='';
							$('spanMenuLogout').style.display='inline';
							new Effect.Fade('divLogin');
							MOUSE.hide();
						}
					} catch(er) {if (DEBUG && DEBUG == true) {alert(er);}}
					new Effect.Fade('divPesquisaTrabalho');
				},
				onFailure: function() {
					if (DEBUG && DEBUG == true) {alert('Erro ao fazer Login');}
				}
			}
		);
	}, 
	logout: function() {
		$('divPesquisaTrabalho').style.display='block';
		this.escodeObjetos();
		MOUSE.show();
		var queryString={'usuario':(LOGIN!=null ? LOGIN.usuario : '')};
		var my=this;
		var url='';
		if (this.proxy==true) {
			queryString.url=this.xmlLogout;
			url=URL+'/proxy/index.'+PROXYTYPE;
		} else {
			url=this.xmlLogout;
		}
		new Ajax.Request(url, {
				parameters:Object.toQueryString(queryString),
				asynchronous: true,
				onSuccess: function(request) {
					LOGIN=null;
					IDENTIFICADO=false;
					$('spanMenuUsu').innerHTML='';
					$('spanMenuLogin').style.display='inline';
					$('spanMenuLogout').style.display='none';
					new Effect.Fade('divPesquisaTrabalho');
					MOUSE.hide();
				},
				onFailure: function() {
					alert('Erro ao fazer Logout');
				}
			}
		);
	},
	show: function() {
		var my=this;
		$('txtUsu').value='';
		$('txtSenha').value='';
		$('txtUsu').observe('keypress', function(evt) {
			var e = evt || event;
			var code = e.keyCode || e.which || e.charCode;
			if (code==Event.KEY_RETURN) {
				my.login();
			}
		});
		$('txtSenha').observe('keypress', function(evt) {
			var e = evt || event;
			var code = e.keyCode || e.which || e.charCode;
			if (code==Event.KEY_RETURN) {
				my.login();
			}
		});
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					var win = my.calculaPosicao(100,100);
					$('divLogin').style.top=(win.y>0?win.y:0)+'px';
					$('divLogin').style.left=win.x+'px';
					my.escodeObjetos();
					my.dragHandle=new Draggable('divLogin',{handle: 'spanTitLogin'});
					Effect.Appear('divLogin');
				}
			}
		);
	},
	escodeObjetos: function() {
		if (IMO!=null && IMO.visible==true) {
			IMO.fechar();
			if (MAPA!=null && MAPA.visible==true) {
				MAPA.fechar();
			}
		}
		if (INDENT!=null && INDENT.visible==true) {
			INDENT.fechar(INDENT);
		}
	},
	hide: function() {
		MOUSE.hide();
		Effect.Fade('divLogin');
	},
	mouseOut: function() {
		$('imgFecharLogin').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	mouseOver: function() {
		$('imgFecharLogin').src=encodeURI(URL+'/imagens/fechar-enab.gif');
	},
	showErro: function(msg,obj) {
		if ($(obj)) {
			$(obj).innerHTML=msg;
			if (msg !='') {
				var my=this;
				setTimeout(function() {my.showErro('',obj);},5000);
			}
		}
	}
});