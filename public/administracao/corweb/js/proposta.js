var Proposta = Class.create(Basico, {
	initialize: function(proxy,ref,anchor) {
		this.proxy=proxy;
		this.ref=ref;
		this.anchor=anchor;
		this.xml='registrarproposta.csp';
		this.xmlCtr='contratoproposta.csp';
		this.xsltCtr='contratoproposta.xsl';
	},
	carregaCtr: function() {
		var my=this;
		MOUSE.show();
		new ParseXSLT(this.proxy,this.xmlCtr,this.xsltCtr,'divCtrPropConteudo',{'contrato':IMOVEL.contrato},function(request){
			try {
				$('divTexto').innerHTML=request.responseXML.getElementsByTagName('texto').item(0).firstChild.nodeValue;
				my.showCtr();
			} catch(er) {if (DEBUG && DEBUG == true) {alert(er);}}
		});
	},
	showCtr: function() {
		var my=this;
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					var win = my.calculaPosicao(325,250);
					$('divCtrProposta').style.top=(win.y>0?win.y:0)+'px';
					$('divCtrProposta').style.left=win.x+'px';
					my.dragHandle=new Draggable('divCtrProposta',{handle:'divCtrPropTit'});
					Effect.Appear('divCtrProposta');
					this.visible=true;
				}
			}
		);
		var cmd=$('cmdConfirmar');
		cmd.onclick=function() {my.cmdOk();};
		MOUSE.hide();
	},
	cmdOk: function() {
		var optS=$('optPropS');
		var optN=$('optPropN');
		if (optS.checked==false && optN.checked==false) {
			this.showErro('Por favor selecione a Opção SIM ou Não para depois confirmar.','tdMensCtrProp');
			return;
		}
		if (optS.checked==true) {
			this.show();
		} 
		new Effect.Fade('divCtrProposta');
	},
	hideCtr: function() {
		Effect.Fade('divCtrProposta');
	},
	show: function() {
		var my=this;
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					$('cmdEnviaProp').onclick=function() {if (my.validar()==true) {my.enviar();}};
					$('txtValor').value='';
					$('txtFGTS').value='';
					$('cboTipoBem').selectedIndex=0;
					$('txtBemValor').value='';
					$('txtDesc').value='';
					var win = my.calculaPosicao(210,200);
					$('divProposta').style.top=(win.y>0?win.y:0)+'px';
					$('divProposta').style.left=win.x+'px';
					my.dragHandle=new Draggable('divProposta',{handle: 'spanTitProp'});
					Effect.Appear('divProposta');
					this.visible=true;
				}
			}
		);
	},
	hide: function() {
		Effect.Fade('divProposta');
		this.visible=false;
		MOUSE.hide();
	},
	mouseOut: function() {
		$('imgFecharProp').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	mouseOver: function() {
		$('imgFecharProp').src=encodeURI(URL+'/imagens/fechar-enab.gif');
	},
	ctrMouseOut: function() {
		$('imgFecharCtrProp').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	ctrMouseOver: function() {
		$('imgFecharCtrProp').src=encodeURI(URL+'/imagens/fechar-enab.gif');
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
		if (isNaN(parseFloat($('txtValor').value))) {
			this.showErro('Valor da sua Oferta inválido','tdMensProp');
			return false;
		} else {
			var val=parseFloat($('txtValor').value);
			if (val<=0) {
				this.showErro('Valor da sua Oferta deve ser maior que Zero','tdMensProp');
				return false;
			}
		}
		if ($('txtFGTS').value != '' && isNaN($('txtFGTS').value)) {
			this.showErro('Valor de FGTS inválido','tdMensProp');
			return false;
		}
		return true;
	},
	enviar: function() {
		var queryString=new Object();
		queryString['ref']=IMOVEL.referencia;
		queryString['interessado']=INTERESSADO.key;
		queryString['tipoCliente']=INTERESSADO.tipo;
		queryString['valor']=$('txtValor').value;
		queryString['fgts']=$('txtFGTS').value;
		queryString['tipobem']=$('cboTipoBem').value;
		queryString['bemvalor']=$('txtBemValor').value;
		queryString['desc']=$('txtDesc').value;
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
				new Effect.Fade('divProposta');
				MOUSE.hide();
			},
			onFailure: function() {
				MOUSE.hide();
				if (DEBUG && DEBUG == true) {alert('Erro ao Enviar propostas')};
			}
		});
	}
});