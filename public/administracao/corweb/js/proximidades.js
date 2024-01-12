var DISTANCIA_PROXIMIDADES=1;
var Visinhos = Class.create(Basico, {
	initialize: function(proxy,ref,pontoNordeste,pontoSudoeste) {
		this.proxy=proxy;
		this.xml='proximidades.csp';
		this.pontoNordeste=pontoNordeste;
		this.pontoSudoeste=pontoSudoeste;
		this.ref=ref;
		this.proximidades=null;
	},
	carrega: function(posCarga) {
		var my=this;
		var url='';
		var args=new Object();
		args.ref=this.ref;
		args.pontoNordeste=this.pontoNordeste;
		args.pontoSudoeste=this.pontoSudoeste;
		if (this.proxy==true) {
			args.url=this.xml;
			url=URL+'/proxy/index.'+PROXYTYPE;
		} else {
			url=this.xml;
		}
		new Ajax.Request(url, {
			parameters:Object.toQueryString(args),
			asynchronous: true,
			onSuccess: function(request) {
				var docXML=request.responseXML;
				var vis=docXML.getElementsByTagName('proximidades').item(0);
				var ocors=vis.getElementsByTagName('ocorrencia');
				if (ocors.length>0) {
					var subaux=new Array();
					subaux.push('contrato');
					subaux.push('foto');
					subaux.push('geoposicao');
					subaux.push('unidade');
					//
					my.proximidades=new Object();
					my.proximidades['ocorrencia']=new Array();
					for (var i=0;i<ocors.length;i++) {
						var oco=ocors.item(i);
						var o=my.getNode(oco);
						for (var y=0;y<subaux.length;y++) {
							var node=oco.getElementsByTagName(subaux[y]).item(0);
							if (node) {
								o[subaux[y]]=my.getNode(node);
							}
						}
						my.proximidades.ocorrencia.push(o);
					}
				}
				if (posCarga && Object.isFunction(posCarga)) {
					posCarga(my.getProximidades());
				}
			},
			onFailure: function() {
				if (DEBUG && DEBUG == true) {
					alert("Erro ao obter as Definições das Proximidades");
				}
			}
		});
	},
	getProximidades: function() {
		return this.proximidades;
	}
});
