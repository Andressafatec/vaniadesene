var Financiamento = Class.create(Basico, {
	initialize: function(proxy,anchor,ref,valor) {
		this.proxy=proxy;
		this.anchor=anchor;
		this.ref=ref;
		this.valor=valor.replace(this.reg,'');
		this.txAnual=12.68;
		this.reg=/[^0-9]+/ig;
	},
	show: function() {
		$('txtFinValor').value = FormatNumber(this.valor,2,0);
		$('txtFinPrest').value = 0;
		var my=this;
		Effect.ScrollTo(my.anchor,{
				afterFinish:function() {
					var win = my.calculaPosicao(125,100);
					$('divFinanciamento').style.top=(win.y>0?win.y:0)+'px';
					$('divFinanciamento').style.left=win.x+'px';
					my.dragHandle=new Draggable('divFinanciamento',{handle: 'spanTitFin'});
					Effect.Appear('divFinanciamento');
					this.visible=true;
				}
			}
		);
	},
	hide: function() {
		Effect.Fade('divFinanciamento');
		this.visible=false;
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
	calcula: function () {
		var valor = $('txtFinValor').value;
		var prest = $('txtFinPrest').value;
		$('tdMensCalc').innerHTML='';
		valor = parseFloat(valor.replace(this.reg,''));
		prest = parseInt(prest.replace(this.reg,''));
		if (valor <= 0) {
			this.showErro('Você deve definir o valor para o financiamento.','tdMensCalc');
		} else if (prest <= 0) {
			this.showErro('Você deve definir o número de parcelas.','tdMensCalc');
		} else {
			var TX=round4(Math.pow((1+this.txAnual/100),1/12)-1);
			var prestacao=round(valor*parseFloat((Math.pow(1+TX,prest)*TX)/(Math.pow(1+TX,prest)-1)));
			this.showErro('Sua presta&ccedil;&atilde;o ser&aacute; de R$' + FormatNumber(new String(prestacao),2,2),'tdMensCalc');
		}
	},
	mouseOut: function() {
		$('imgFecharFin').src=encodeURI(URL+'/imagens/fechar.gif');
	},
	mouseOver: function() {
		$('imgFecharFin').src=encodeURI(URL+'/imagens/fechar-enab.gif');
	},
	valida: function(field) {
		var campo=$(field);
		var valor = campo.value;
		campo.style.backgroundColor=(isNaN(valor)?'red':'white');
	}
});