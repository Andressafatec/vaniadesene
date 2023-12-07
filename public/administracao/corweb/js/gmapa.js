var GMapa = Class.create();
Object.extend(GMapa.prototype, {
	initialize: function(ponto,destino) {
		this.map=null;
		this.destino=destino;
		this.ponto=ponto;
		this.point=new GLatLng(parseFloat(ponto.latitude),parseFloat(ponto.longitude));
		this.nivelZoom=15;
		this.marcadores=null;
	},
	exibe:function() {
		if (GBrowserIsCompatible()) {
			this.map=new GMap2(this.destino);
			if (!this.map) return;
			this.map.setCenter(this.point,this.nivelZoom);
			this.map.addControl(new GSmallMapControl());
			this.map.addControl(new GMapTypeControl());
			this.map.addControl(new GOverviewMapControl()); //Mapinha pequeno no canto
			this.map.clearOverlays();
			this.map.setMapType(G_NORMAL_MAP); 
			if (GOOGLEMAPS.exibirPonto!="0" || (LOGIN && LOGIN.nome && LOGIN.nome!="") || (IMOVEL.contrato == 'Empreendimento') || (IMOVEL.exclusividade && IMOVEL.exclusividade.valor == '1')) {
				this.criaMarcador();
			}
		}
	},
	sobreEscreve: function() {
		Object.extend(GControl.prototype, {
			initialize:function(map) {
				this.largRaios=[0,1,.5,0,.25,0,.1];
				this.poligonos=null;
				var divBot=document.createElement('div');
				divBot.id='divBot';
				this.setButtonStyle_(divBot);
				divBot.appendChild(document.createTextNode("Proximidades"));
				var my=this;
				GEvent.addDomListener(divBot,"click",function() {my.toggleMarcadores(my)});
				map.getContainer().appendChild(divBot);
				this.divBot=divBot;
				this.map=map;
				this.marcadores=null;
				return divBot;
			},
			mostraEscala:function(myThis) {
				for (var i=1;i<7;(i==1?i=2:i+=2)) {
					var ptos=myThis.ponto.drawCircle(myThis.largRaios[i]);
					var div='<div id="divEscala'+i+'" style="color:#ff0000;"><b>'+myThis.largRaios[i]*1000+'m<b></div>';
					var label=new TLabel();
					label.id='label'+i;
					label.anchorLatLng=new GLatLng(parseFloat(ptos[1].latitude),parseFloat(ptos[1].longitude));
					label.anchorPoint='bottomLeft';
					label.markerOffset=new GSize (20,20);
					label.content=div;
					label.percentOpacity='20%';
					myThis.map.addTLabel(label);
				}
			},
			toggleMarcadores: function(myThis) {
				if (!myThis.marcadores) {
					MOUSE.show();
					myThis.calculaProximidades(myThis,myThis.criaMarcadores);
					myThis.mostraEscala(myThis);
					MOUSE.hide();
				} else {
					MOUSE.show();
					for (var i=0; i < myThis.marcadores.length; i++) {
						var marker=myThis.marcadores[i];
						if (marker.isHidden()) {
							marker.show();
						} else {
							marker.hide();
						}
					} 
					for (var i=0; i < myThis.poligonos.length; i++) {
						var poligon=myThis.poligonos[i];
						if (poligon.isHidden()) {
							poligon.show();
						} else {
							poligon.hide();
						}
					} 
					MOUSE.hide();
				}
			},
			getDefaultPosition:function() {
				return new GControlPosition(G_ANCHOR_TOP_RIGHT,new GSize(7,30));
			},
			setButtonStyle_:function(button) {
				button.style.textDecoration="underline";
				button.style.color="#0000cc";
				button.style.backgroundColor="white";
				button.style.font="small Arial";
				button.style.border="2px solid black";
				button.style.padding="2px";
				button.style.marginBottom="3px";
				button.style.textAlign="center";
				button.style.width="8em";
				button.style.cursor="pointer";
			},
			criaPts: function(pontos) {
				var Gpontos=new Array();
				for (var i=0 ;i<pontos.length;i++) {
					Gpontos.push(new GPoint(pontos[i].longitude,pontos[i].latitude)); 
				}
				return Gpontos;
			},
			criaRaios: function() {
				var poligonos=new Array();
				var cores=['#ff7fff','#ffff0','#ff0000','#00ff00','#0000ff','#ffffff','#1d1d1d'];
				for (var i=1;i<7;(i==1?i=2:i+=2)) {
					var polygon=new GPolygon(this.criaPts(this.getPonto().drawCircle(this.largRaios[i])),cores[i],1,.5,cores[i],.05);
					poligonos.push(polygon);
					this.map.addOverlay(polygon);
				}
				return poligonos;
			},
			calculaProximidades:function(myThis,posCarga) {
				this.poligonos=this.criaRaios();
				var prox=this.getPonto().raioDeDistancia(DISTANCIA_PROXIMIDADES);
				var viz=new Visinhos(PROXY,IMOVEL.referencia,prox[0].latitude+','+prox[0].longitude,prox[1].latitude+','+prox[1].longitude);
				viz.carrega(
					function(proximidades) {
						if (posCarga && Object.isFunction(posCarga)) {
							posCarga(myThis, proximidades);
						}
					}
				);
			},
			criaMarcadores: function(myThis, proximidades) {
				if (proximidades && proximidades.ocorrencia && proximidades.ocorrencia.length>0) {
					myThis.marcadores=new Array();
					for (i=0;i<proximidades.ocorrencia.length;i++) {
						var marker=myThis.ocorrencia(myThis, proximidades.ocorrencia[i]);
						myThis.map.addOverlay(marker);
						myThis.marcadores.push(marker);
					}
				}
			},
			ocorrencia: function(myThis, ocorrencia) {
				var c=String(ocorrencia.geoposicao.coordenadas).split(',');
				var point=new GLatLng(parseFloat(c[0]),parseFloat(c[1]));
				var tipo=parseInt(ocorrencia.geoposicao.tipo);
				var html=myThis.geraHTML(ocorrencia);
				var icone=(tipo==0)?ocorrencia.contrato.key=='2'?URL+'/imagens/casa_verm.gif':URL+'/imagens/casa_azul.gif':URL+'/imagens/predio.gif';
				var marcador=myThis.iconeVizinhanca(point,html,icone);
				return marcador;
			},
			iconeVizinhanca: function(point,html,icone) {
				var casaIcon=new GIcon(G_DEFAULT_ICON);
				casaIcon.image=encodeURI(icone);
				var markerOptions={icon:casaIcon};
				var marker=new GMarker(point,markerOptions);
				GEvent.addListener(marker,"click",function() {marker.openInfoWindowHtml(html);});
				return marker;
			},
			geraHTML: function(ocorrencia) {
				var tipo=parseInt(ocorrencia.geoposicao.tipo);
				var icone='';
				var aux=new Array();
				aux.push('<div style="background-color:white;">');
				if (ocorrencia.foto && ocorrencia.foto.valor) {
					aux.push('<p style="align:center;"><img src="'+IMOVEL.servidor+'/corweb/thumb.php?foto='+ocorrencia.foto.valor+'&altura=130&largura=100" alt="'+ocorrencia.foto.descricao+'"></p>');
				}
				aux.push('<table class="tableImoveis">');
				if (tipo==0) {
					icone=ocorrencia.contrato.key=='2'?URL+'/imagens/casa_verm.gif':URL+'/imagens/casa_azul.gif';
					aux.push('<caption>Refer&ecirc;ncia: <b>'+ocorrencia.referencia+'</b></caption>');
					aux.push('<thead><tr><th class="tabelaImoveisTh">Contrato</th><th class="tabelaImoveisTh">Tipo de Im&oacute;vel</th><th class="tabelaImoveisTh">Valor</th></tr></thead>');
					aux.push('<tbody>');
					aux.push('<tr class="tabelaImoveisLinha0"><td class="tabelaImoveisTD">'+ocorrencia.contrato.descricao+'</td><td class="tabelaImoveisTD">'+ocorrencia.tipoimovel+'</td><td class="tabelaImoveisTD tabelaImoveisTDValor">'+ocorrencia.valor+'</td></tr>');
					aux.push('</tbody>');
				}
				if (tipo==1) {
					icone=URL+'/imagens/predio.gif'
					aux.push('<caption>Edif&iacute;cio: <b>'+ocorrencia.edificio+'</b></caption>');
					if (ocorrencia.edificio) {
						aux.push(this.tabelaEdificio(ocorrencia));
					}
				}
				aux.push('</table>');
				aux.push('</div>')
				return aux.join(' ');
			},
			tabelaEdificio: function(ocorrencia) {
				var lista=new Array();
				lista.push('<table><thead><tr><th class="tabelaImoveisTh">Ref.</th><th class="tabelaImoveisTh">Contrato</th><th class="tabelaImoveisTh">Tipo de Im&oacute;vel</th><th class="tabelaImoveisTh">Valor</th></tr></thead>');
				lista.push('<tbody>');
				if (ocorrencia.unidades) {
					for (var i=0; i < ocorrencia.unidades.length; i++) {
						var uni=ocorrencia.unidades[i];
						lista.push('<tr class="tabelaImoveisLinha'+(i%2)+'"><td class="tabelaImoveisTD tabelaImoveisTDValor">'+uni.referencia+'</td><td class="tabelaImoveisTD">'+uni.contrato.descricao+'</td><td class="tabelaImoveisTD">'+uni.tipoimovel+'</td><td class="tabelaImoveisTD tabelaImoveisTDValor">'+FormatNumber(uni.valor,2,0)+'</td></tr>');
					}
				}
				lista.push('</tbody></table>');
				return aux.join(' ');
			},
			setPonto:function(ponto) {
				this.ponto=ponto;
			},
			getPonto:function() {
				return this.ponto?this.ponto:null;
			}
		});
	},
	criaMarcador: function() {
		var my=this;
		this.sobreEscreve();
		var prox=new GControl(this.map);
		this.map.addControl(prox);
		prox.setPonto(this.ponto);
		this.map.addOverlay(this.criaIcone());
		this.map.openInfoWindowHtml(this.map.getCenter(),this.detalhes());
	},
	criaIcone: function() {
		var casaIcon=new GIcon(G_DEFAULT_ICON);
		casaIcon.iconSize=new GSize(45,64);
		casaIcon.iconAnchor=new GPoint(20,64);
		casaIcon.infoWindowAnchor=new GPoint(20,4);
		casaIcon.image=encodeURI(IMOVEL.edificio ?URL+'/imagens/predio.gif':(IMOVEL.contrato.charAt(0)=='L'?URL+'/imagens/casa_verm.gif':URL+'/imagens/casa_azul.gif'));
		var markerOptions={icon:casaIcon,visible:false};
		var marker=new GMarker(this.point,markerOptions);
		var my=this;
		GEvent.addListener(marker,"click",function() {marker.openInfoWindowHtml(my.detalhes());});
		return marker;
	},
	detalhes: function() {
		if (!IMOVEL) return '';
		var aux=new Array();
		var aptblcTit='';
		var aptblc='';
		if (false && IMOVEL.apartamento) {
			aptblcTit='<th class="tabelaImoveisTh">'+IMOVEL.tipoimovel.apartamento+'</th>';
			aptblc='<td class="tabelaImoveisTD">'+IMOVEL.apartamento+'</td>';
			if (IMOVEL.bloco) {
				aptblcTit=aptblcTit+'<th class="tabelaImoveisTh">'+IMOVEL.tipoimovel.bloco+'</th>';
				aptblc=aptblc+'<td class="tabelaImoveisTD">'+IMOVEL.bloco+'</td>';
			}
		}
		aux.push('<div id="divEdi" style="align:center;">');
		aux.push('<table id="tabelaRef" class="tableImoveis">');
		aux.push('<caption>Refer&ecirc;ncia: <b>'+IMOVEL.referencia+'</b></caption>');
		aux.push('<thead><tr><th class="tabelaImoveisTh">Contrato</th><th class="tabelaImoveisTh">Valor</th><th class="tabelaImoveisTh">Tipo Im&oacute;vel</th>'+(aptblcTit != '' ? aptblcTit : '')+'<th class="tabelaImoveisTh">Cidade</th><th class="tabelaImoveisTh">Regi&atilde;o</th></tr></thead>');
		aux.push('<tbody>');
		aux.push('<tr class="tabelaImoveisLinha0"><td class="tabelaImoveisTD">'+IMOVEL.contrato+'</td><td class="tabelaImoveisTD tabelaImoveisTDValor">'+FormatNumber(IMOVEL.valor,2,0)+'</td><td class="tabelaImoveisTD">'+IMOVEL.tipoimovel.descricao+'</td>'+(aptblc != '' ? aptblc : '')+'<td class="tabelaImoveisTD">'+IMOVEL.cidade+'</td><td class="tabelaImoveisTD">'+IMOVEL.regiao+'</td></tr>');
		aux.push('</tbody>');
		aux.push('</table>');
		if (IMOVEL.edificio) {
			aux.push('<table id="tabelaEdi" class="tableImoveis">');
			aux.push('<caption>Edif&iacute;cio: <b>'+IMOVEL.edificio.nome+'</b></caption>');
			if (IMOVEL.edificio.unidades && IMOVEL.edificio.unidades.length>0) {
				aux.push(this.tabelaEdificio(IMOVEL.edificio));
			}
			aux.push('</table>');
		}
		aux.push('</div>')
		return aux.join(' ');
	}
});
