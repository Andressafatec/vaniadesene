var IndicacaoImovel = Class.create(Basico, {
	initialize: function(proxy,ref,anchor) {
		this.proxy=proxy;
		this.ref=ref;
		this.destino=$('divIdentAmigo');
		this.anchor=anchor;
		this.xml='indicarimovel.csp';
		this.xslt='preparabasicos.xsl';
		this.xsltCtr='preparabasicos.xsl';
		this.TIMEOUTERRO=null;
		this.prepara();
		this.dragHandle=null;
		if (DEBUG==true) {
			$('txtNomeIndicador').value='Jefferson';			
			$('txtEmailIndicado').value='jefferson@sisprof.com.br';
		}		
	},
	fechar: function(myThis) {
		if (this.dragHandle) {
			this.dragHandle.destroy();
		}
		this.visible=false;
		new Effect.Fade(myThis.destino);
	},
	fechar_mouseover: function() {
		$('imgFecharIdentAmigo').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	fechar_mouseout: function() {
		$('imgFecharIdentAmigo').src=encodeURI(URL+'/imagens/fechar-enab.gif');
	},
	exibeCampos: function(myThis) {
		$('divIdentAmigoNada').style.display='block';
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
		$('imgFecharIdentAmigo').onclick=function() {my.fechar(my)};
		my.exibeCampos(my)
		$('cmdEnvia').onclick=function() {my.identificar(my)};
	},
	show: function() {
		var my=this;
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					$('cmdEnviaInd').onclick=function() {if (my.validar()==true) {my.enviar();}};
					if (INTERESSADO) {
						$('txtNomeIndicador').value = INTERESSADO.nome;
					}
					else {
						$('txtNomeIndicador').value='';
					}
					$('txtEmailIndicado').value='';
					var win = my.calculaPosicao(210,100);
					$('divIdentAmigo').style.top=(win.y>0?win.y:0)+'px';
					$('divIdentAmigo').style.left=win.x+'px';
					my.dragHandle=new Draggable('divIdentAmigo',{handle: 'spanTitIdentAmigo'});
					Effect.Appear('divIdentAmigo');
					this.visible=true;
				}
			}
		);
	},	
	showCtr: function() {
		var my=this;
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					var win = my.Posicao(200,100);
					my.destino.style.top=(win.y>0?win.y:0)+'px';
					my.destino.style.left=win.x+'px';
					my.dragHandle=new Draggable(my.destino,{handle:'spanTitIdentAmigo'});
					new Effect.Appear(my.destino);					
					$('divIdentAmigo').style.display='table';
					my.visible=true;
				}
			}
		);
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
	checkMail: function(mail) {
		var er=/^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
		if(typeof(mail)=="string") {
			if(er.test(mail)) return true; 
		} else if(typeof(mail)=="object") {
			if(er.test(mail.value)) return true; 
		}
		return false;
	},
	validar: function() {
		if ($('txtNomeIndicador').value=='') {
			this.showErro('Voc&ecirc; deve informar seu Nome','tdMensInd');
			return false;
		}
		if ($('txtEmailIndicado').value=='') {
			this.showErro('Voc&ecirc; deve informar o E-mail do(a) Amigo(a)','tdMensInd');
			return false;
		} else if (!this.checkMail($('txtEmailIndicado'))) {
			this.showErro('O E-mail informado n&atilde;o parece v&aacute;lido','tdMensInd');
			return false;
		}
		return true;
	},
	enviar: function(ignoraPesquisa) {
		var my = this;
		var nomeindicador=$('txtNomeIndicador').value;
		var emailindicado=$('txtEmailIndicado').value;
		var url='';
		var queryString = new Object();
		my.validar();
		if (my.dragHandle) {
			my.dragHandle.destroy();
		}		
		queryString['nomeindicador']=nomeindicador;
		queryString['emailindicado']=emailindicado;
		queryString['ref']=my.ref;
		if (this.proxy==true) {
			queryString.url=my.xml;
			url=URL+'/proxy/index.'+PROXYTYPE;
		} else {
			url=my.xml;
		}
		new Ajax.Request(url, {
			parameters:Object.toQueryString(queryString),
			asynchronous: false,
			onSuccess: function(request) {				
				my.showErro(request.responseXML.getElementsByTagName('retorno').item(0).firstChild.nodeValue,'tdMensInd');
				if (request.responseXML.getElementsByTagName('key').item(0).firstChild.nodeValue == 1) {					
					setTimeout('MOUSE.hide();new Effect.Fade("divIdentAmigo");',3000);
				}
			},
			onFailure: function(request) {
				MOUSE.hide();
				if (DEBUG && DEBUG == true) {alert('Erro ao Indicar Imóvel')};				
			}			
		});	
	}
});
