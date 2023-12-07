var MAXIMO=100000000000;
var edificios=new Array();
var imoveis=new Array();
var indice=0;
var geocoder=null;
var edificio=null;
var imovel=null;
function leGoogleMaps(key,sourc,tipo,versao) {
	var js=document.createElement('script');
	js.type='text/javascript';
	js.src=sourc + '?file=' + tipo + '&v=' + versao + '&key=' + key +	'&async=2&callback=carrega';
	var head=document.getElementsByTagName('head')[0];
	head.appendChild(js);
}
function getNode(node) {
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
function inicializar() {
	var bt=$('cmdExec');
	if (bt) {
		$('divExecuta').removeChild(bt);
	}
	$('divTrabalho').style.display='block';
	var queryString=new Object();
	var url='';
	if (PROXY==true) {
		url=URL+'/proxy/index.'+PROXYTYPE;
		queryString.url='googlemaps.csp';
	} else {
		url='googlemaps.csp';
	}
	new Ajax.Request(url, {
		parameters:Object.toQueryString(queryString),
		asynchronous: true,
		onSuccess: function(request) {
			googleMaps=getNode(request.responseXML.getElementsByTagName('googlemaps').item(0));
			leGoogleMaps(googleMaps.key,googleMaps.src,googleMaps.tipo,googleMaps.versao);
		},
		onFailure: function() {
			if (DEBUG && DEBUG == true) {alert('Googlemaps: ' + er);}
		}
	});
}
function carrega() {
	if (GBrowserIsCompatible()) {
		var queryString=new Object();
		queryString['local']=$('cboLocal').value;
		queryString['maximo']=$('cboQtd').value;
		new ParseXSLT(PROXY,'geoposicao.csp','geoposicao.xsl','divImoveis',queryString,function(request) {
			edificios.clear();
			imoveis.clear();
			var edis=request.responseXML.getElementsByTagName('edificio');
			if (edis.length>0) {
				var edi=null;
				for (var i=0; i<edis.length; i++) {
					edificios.push(getNode(edis[i]));
				}
			}
			var imos=request.responseXML.getElementsByTagName('imovel');
			if (imos.length>0) {
				for (var i=0; i<imos.length; i++) {
					imoveis.push(getNode(imos[i]));
				}
			}
			var bt=document.createElement('input');
			bt.id='cmdExec'
			bt.type='button';
			bt.value='Buscar Geoposicionamento';
			bt.onclick=function() {buscar();};
			$('divExecuta').appendChild(bt);
			document.location='#fim';
			$('divTrabalho').style.display='none';
		});
	} else {
		alert('Seu Navegador nao eh compativel com \'Google Maps\', por favor atualize para uma versao mais nova');
	}
}
function resolveEdificios() {
	edificio=edificios[indice];
	var endereco=edificio.endereco + ' - ' + edificio.cidade + ' - ' + edificio.estado;
	geocoder.getLocations(endereco, edificioResolvido);
}
function edificioResolvido(response,endereco) {
	var delay=0;
	if (response.Status.code==G_GEO_TOO_MANY_QUERIES) {
		delay=1500;
	} else {
		document.location='#edificio' + edificio.key;
		if (response.Status.code==G_GEO_SUCCESS) {
			if (response.Placemark && response.Placemark.length>0) {
				var point=response.Placemark[0].Point;
				var queryString=new Object();
				queryString['edificio']=edificio.key;
				queryString['coordenadas']=point.coordinates[1] + ',' + point.coordinates[0];
				var url='';
				if (PROXY==true) {
					url=URL+'/proxy/index.'+PROXYTYPE;
					queryString.url='arqgeoedi.csp';
				} else {
					url='arqgeoedi.csp';
				}
				new Ajax.Request(url, {
					parameters:Object.toQueryString(queryString),
					asynchronous: false,
					onSuccess: function(request) {
						$('tdEdi' + edificio.key).innerHTML=point.coordinates[1] + ',' + point.coordinates[0];
					},
					onFailure: function() {
						$('tdEdi' + edificio.key).innerHTML='Erro!!!';
					}
				});
			} else {
				$('tdEdi' + edificio.key).innerHTML='nao encontrado';
			}
		} else if (response.Status.code==G_GEO_UNKNOWN_ADDRESS
							|| response.Status.code==G_GEO_MISSING_QUERY
							|| response.Status.code==G_GEO_UNAVAILABLE_ADDRESS) {
			$('tdEdi' + edificio.key).innerHTML='nao encontrado';
		}
		indice +=1;
	}
	if (indice<edificios.length && indice<MAXIMO) {
		window.setTimeout(resolveEdificios, delay);
	} else {
		if (imoveis.length>0) {
			indice=0;
			resolveImoveis();
		} else {
			GUnload();
			$('divTrabalho').style.display='none';
		}
	}
}
function resolveImoveis() {
	imovel=imoveis[indice];
	var endereco=((imovel.tipo && imovel.tipo.length>0) ? imovel.tipo + ' ' : '') + imovel.logradouro + ((imovel.numero && imovel.numero.length>0) ? ', ' + imovel.numero : '') +  ' - ' + imovel.cidade + ' - ' + imovel.estado;
	geocoder.getLocations(endereco, imovelResolvido);
}
function imovelResolvido(response) {
	var delay=0;
	if (response.Status.code==G_GEO_TOO_MANY_QUERIES) {
		delay=1500;
	} else {
		document.location='#imovel' + imovel.key;
		if (response.Status.code==G_GEO_SUCCESS) {
			if (response.Placemark && response.Placemark.length>0) {
				var point=response.Placemark[0].Point;
				var queryString=new Object();
				queryString['referencia']=imovel.key;
				queryString['coordenadas']=point.coordinates[1] + ',' + point.coordinates[0];
				queryString['local']=imovel.local;
				var url='';
				if (PROXY==true) {
					url=URL+'/proxy/index.'+PROXYTYPE;
					queryString.url='arqgeoimo.csp';
				} else {
					url='arqgeoimo.csp';
				}
				new Ajax.Request(url, {
					parameters:Object.toQueryString(queryString),
					asynchronous: false,
					onSuccess: function(request) {
						$('tdRef' + imovel.key).innerHTML=point.coordinates[1] + ',' + point.coordinates[0];
					},
					onFailure: function() {
						$('tdRef' + imovel.key).innerHTML='Erro!!!';
					}
				});
			} else {
				$('tdRef' + imovel.key).innerHTML='nao encontrado';
			}
		} else if (response.Status.code==G_GEO_UNKNOWN_ADDRESS || response.Status.code==G_GEO_MISSING_QUERY || response.Status.code==G_GEO_UNAVAILABLE_ADDRESS) {
			$('tdRef' + imovel.key).innerHTML='nao encontrado';
		}
		indice +=1;
	}
	if (indice<imoveis.length && indice<MAXIMO) {
		window.setTimeout(resolveImoveis, delay);
	} else {
		GUnload();
		$('divTrabalho').style.display='none';
		alert('Operacao Concluida');
	}
}
function buscar() {
	$('divTrabalho').style.display='block';
	geocoder=new GClientGeocoder();
	if (geocoder) {
		if (edificios.length>0) {
			indice=0;
			resolveEdificios();
		} else {
			if (imoveis.length>0) {
				indice=0;
				resolveImoveis();
			}
		}
	}
}
