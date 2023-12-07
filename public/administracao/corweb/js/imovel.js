var Imovel = Class.create(Basico, {
	initialize: function(proxy,ref,tipoVis,anchor) {
		this.proxy=proxy;
		this.ref=ref;
		this.tipoVis=tipoVis;
		this.anchor=anchor;
		this.xml='imovel.csp';
		this.xslt='imovel.xsl';
		this.ctrPai='divCards';
		this.destino=null;
		this.criaDestino();	
		this.imgFechar=null;
		this.dragHandle=null;
		this.visible=false;
		this.financiamento=null;
		this.visita=null;
		this.proposta=null;
		this.mensagem=null;
		this.indicacaoimovel=null;
		IMOVEL=null;
		IDENTAMIGO=null;
	},
	criaDestino: function() {
		var divImovel=document.createElement('div');
		divImovel.className='divImovel';
		divImovel.id='divImovel';
		if ($(this.ctrPai)) {
			$(this.ctrPai).innerHTML='';
			$(this.ctrPai).appendChild(divImovel);
		} else {
			$('divSisprof').appendChild(divImovel);
		}
		this.destino=divImovel;
	},
	posCarga: function(request,myThis) {
		MOUSE.hide();
		myThis.destino.style.top="10px";
		myThis.destino.style.left="10px";
		myThis.imgFechar=$('imgFechar');
		REFERENCIA=myThis.ref;
		var subaux=new Array();
		subaux.push('tipoimovel');
		subaux.push('geoposicao');
		subaux.push('observacoes');
		subaux.push('exclusividade');
		subaux.push('edificio');
		subaux.push('filmes');
		var imo=request.responseXML.getElementsByTagName('imovel').item(0);
		IMOVEL=myThis.getNode(imo);
		for (var i=0; i<subaux.length; i++) {
			var node=imo.getElementsByTagName(subaux[i]).item(0);
			if (node) {
				IMOVEL[subaux[i]]=myThis.getNode(node);
			}
		}
		if (IMOVEL.edificio) {
			var edi=imo.getElementsByTagName('edificio').item(0);
			var unidades=edi.getElementsByTagName('unidade');
			if (unidades && unidades.length > 0) {
				var myUnis=new Array();
				for (var t=0; t < unidades.length; t++) {
					uni=unidades.item(t);
					if (uni.nodeType==3) continue;
					var myUni=myThis.getNode(uni);
					for (var y=0; y < uni.childNodes.length; y++) {
						var u=uni.childNodes.item(y);
						if (u.nodeName=='contrato')
							myUni[u.nodeName]=myThis.getNode(u);
					}
					myUnis.push(myUni);
				}
				IMOVEL.edificio['unidades']=myUnis;
			}
		}
		if (IMOVEL.filmes) {
			var filme=imo.getElementsByTagName('filmes').item(0);
			var fil=filme.getElementsByTagName('filme');
			if (fil && fil.length > 0) {
				var myFils=new Array();
				for (var t=0; t < fil.length; t++) {
					f=fil.item(t);
					if (f.nodeType==3) continue;
					var myFil=myThis.getNode(f);
					myFils.push(myFil);
				}
				IMOVEL['filmes']=myFils;
			}
		}
		if (IMOVEL!=null && IMOVEL.referencia) {
			if (IMOVEL.contrato=='Empreendimento') {
				myThis.financiamento=new Financiamento(myThis.proxy,'divImovel',IMOVEL.referencia,IMOVEL.valor);
			}
			myThis.visita=new Visita(myThis.proxy,IMOVEL.referencia,'divImovel');
			myThis.proposta=new Proposta(myThis.proxy,IMOVEL.referencia,'divImovel');
			myThis.mensagem=new Mensagem(myThis.proxy,IMOVEL.referencia,'divImovel');			
			myThis.indicacaoimovel=new IndicacaoImovel(myThis.proxy,IMOVEL.referencia,'divImovel');
			myThis.exibe();
		} else {
			if (DEBUG && DEBUG == true) {alert('Referência não consta no Cadastro');}
		}
	},
	exibe: function() {
		var my=this;
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					var win = my.calculaPosicao(390,210);
					$('divImovel').style.top=(win.y>0?win.y:0)+'px';
					$('divImovel').style.left=win.x+'px';
					my.dragHandle=new Draggable('divImovel',{handle: 'spanTitImovel'});
					Effect.Appear(my.ctrPai);
					this.visible=true;
				}
			}
		);
	},
	carrega: function() {
		MOUSE.show();
		//AGUARDE.show();
		var queryString={'ref':this.ref,'tipoVis':this.tipoVis};
		new ParseXSLT(this.proxy,this.xml,this.xslt,this.destino,queryString,this.posCarga,this);
	},
	fechar: function() {
		var my=this;
		if (PROMOCOESV && (typeof(PROMOCOESV)=="object")) {
			PROMOCOESV.descongela();
		}
		if (PROMOCOESL && (typeof(PROMOCOESL)=="object")) {
			PROMOCOESL.descongela();
		}
		if (this.dragHandle) {
			this.dragHandle.destroy();
		}
		new Effect.Fade(this.ctrPai);
		$('divFotoG').innerHTML='<img alt="" src="" class="imgFoto" id="imgFoto">';
		$(my.ctrPai).innerHTML='';
		this.visible=false;
	},
	fechar_mouseover: function() {
		this.imgFechar.src=encodeURI(URL+'/imagens/fechar-enab.gif');
	},
	fechar_mouseout: function() {
		this.imgFechar.src=encodeURI(URL+'/imagens/fechar.gif');
	},
	trocarImagem: function(servidor,pasta,thumb,foto,largura,altura) {
		MOUSE.show();
		var img=$('imgFoto');
		if (img==null) {
			var div=$('divFotoG');
			div.innerHTML='<img alt="" src="" class="imgFoto" id="imgFoto">';
			img=$('imgFoto');
		}
		img.src=servidor+pasta+thumb+'?foto='+foto+'&largura='+largura+'&altura='+altura;
		img.onload=img.onreadystatechange=function() {
			if (img.readyState && img.readyState != 'loaded' && img.readyState != 'complete') return;
			img.onreadystatechange=null;
			MOUSE.hide();
		}
	},
	tocarFilme: function(filme,tipo) {
		var filme=IMOVEL.filmes[parseInt(filme)-1];
		if (tipo=='youtube') {
			$('divFotoG').innerHTML=filme.valor;
		} else if (tipo=='urlext') {
			var emb="<object id='mediaPlayer' width=486 height=374 classid='CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95' CODEBASE='http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701' STANDBY='Loading Microsoft Windows Media Player components...' TYPE='application/x-oleobject'><param name='fileName' VALUE='"+filme.valor+"'><param name='animationatStart' VALUE='true'><param name='transparentatStart' VALUE='true'><param name='autoStart' VALUE='true'><param name='showControls' VALUE='true'><embed id='mediaPlayerFirefox' name='mediaPlayerFirefox' width=486 height=374 src='"+filme.valor+"' autostart='' transparentatstart='0' showcontrols='-1' showdisplay='0' showstatusbar='-1' animationatstart='-1'></embed></object>"
			$('divFotoG').innerHTML=emb;
		} else {
			var emb="<object id='mediaPlayer' width=486 height=374 classid='CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95' CODEBASE='http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701' STANDBY='Loading Microsoft Windows Media Player components...' TYPE='application/x-oleobject'><param name='fileName' VALUE='"+SERVER+'/fotos/'+filme.valor+"'><param name='animationatStart' VALUE='true'><param name='transparentatStart' VALUE='true'><param name='autoStart' VALUE='true'><param name='showControls' VALUE='true'><embed id='mediaPlayerFirefox' name='mediaPlayerFirefox' width=486 height=374 src='"+SERVER+'/fotos/'+filme.valor+"' autostart='' transparentatstart='0' showcontrols='-1' showdisplay='0' showstatusbar='-1' animationatstart='-1'></embed></object>"
			$('divFotoG').innerHTML=emb;
		}
	},
	indicarImovel: function(ref) {
		IDENTAMIGO = new IndicacaoImovel(this.proxy,this.ref,this.anchor);		
		IDENTAMIGO.show();
	}
});
