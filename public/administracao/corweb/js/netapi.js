Ajax.Base = Class.create({
  initialize: function(options) {
    this.options = {
      method:       'post',
      contentType:  'application/x-www-form-urlencoded',
      encoding:     'ISO-8859-1',
      parameters:   '',
      evalJSON:     true,
      evalJS:       true
    };
    Object.extend(this.options, options || { });

    this.options.method = this.options.method.toLowerCase();

    if (Object.isString(this.options.parameters))
      this.options.parameters = this.options.parameters.toQueryParams();
    else if (Object.isHash(this.options.parameters))
      this.options.parameters = this.options.parameters.toObject();
  }
});

var CONTRATOS=null;
var TransformaXSLT = Class.create();
Object.extend(TransformaXSLT.prototype, {
	initialize: function(xmlDoc,xsltDoc,objDestino) {
		this.xmlDoc=xmlDoc;
		this.xsltDoc=xsltDoc;
		this.objDestino=objDestino;
	},
	getXSLTemplate: function() {
		return Try.these(
			function() { return new ActiveXObject("Msxml2.XSLTemplate.5.0"); },
			function() { return new ActiveXObject("Msxml2.XSLTemplate.4.0"); },
			function() { return new ActiveXObject("MSXML2.XSLTemplate.3.0"); },
			function() { return new ActiveXObject("MSXML2.XSLTemplate"); }
			) || false;
	},
	transforma: function() {
		try {
			if (window.ActiveXObject) {
				var template = this.getXSLTemplate();
				if (typeof(template)!="object") {
					throw "Erro ao obter objeto XSLTemplate"
				}
				template.stylesheet = this.xsltDoc;
				var process = template.createProcessor();
				process.input = this.xmlDoc;
				process.transform();
				var obj = $(this.objDestino);
				obj.innerHTML = process.output;
			} else {
				var obj = null;
				if (Object.isElement(this.objDestino)) {
					obj=this.objDestino;
				} else if (Object.isString(this.objDestino)) {
					obj=$(this.objDestino);
				}
				var objXSLTProcessor = new XSLTProcessor();
				objXSLTProcessor.importStylesheet(this.xsltDoc);
				obj.innerHTML = '';
				var zout=objXSLTProcessor.transformToFragment(this.xmlDoc, document);
				obj.appendChild(zout);
			}
		} catch(er) {
			if (DEBUG && DEBUG == true) {
				alert("transformaXSL " + er);
			}
		}
	}
});
var LoaderXSLT = Class.create();
Object.extend(LoaderXSLT.prototype, {
	initialize: function(url) {
		this.http_request = null;
		var myUrl=URL+'/xsl/'+url;
		if (window.ActiveXObject) {
			try {
				this.http_request=this.getFreeThreadedDOMDocument();
				if (typeof(this.http_request)!="object") {
					throw "Erro ao obter objeto DOMDocument"
				}
				this.http_request.async = false;
				this.http_request.resolveExternals = false;
				this.http_request.validateOnParse=false;
				this.http_request.load(encodeURI(myUrl));
			} catch(er) {
				if (DEBUG && DEBUG == true) {
					alert("Sem Obj XSL " + er);
				}
			}
		} else {
			var my=this;
			new Ajax.Request(myUrl, {
				method:'get',
				asynchronous : false,
				onSuccess: function(request) {
					my.http_request = request.responseXML;
				},
				onFailure: function() {
					if (DEBUG && DEBUG == true) {
						alert("Sem Obj XSL");
					}
				}
			});
		}
	},
	getFreeThreadedDOMDocument: function() {
		return Try.these(
			function() { return new ActiveXObject("Msxml2.FreeThreadedDOMDocument.5.0"); },
			function() { return new ActiveXObject("MSXML2.FreeThreadedDOMDocument.4.0"); },
			function() { return new ActiveXObject("MSXML2.FreeThreadedDOMDocument.3.0"); },
			function() { return new ActiveXObject("MSXML2.FreeThreadedDOMDocument"); }
			) || false;
	},
	getContent: function() {
		return this.http_request;
	}
});
var ParseXSLT = Class.create();
Object.extend(ParseXSLT.prototype, {
	initialize: function(proxy,xml,xslt,objetoDestino,queryString,posCarga,argsOPC) {
			this.proxy=proxy;
			this.xml=xml;
			this.xslt=xslt;
			this.destino=objetoDestino;
			this.responseXML=null;
			this.responseXSLT=null;
			this.queryString=queryString;
			this.posCarga=posCarga;
			this.argsOPC=argsOPC;
			var url='';
			
			var query = this.queryString;
			if (Object.isString(this.queryString)) {
				query=this.queryString.toQueryParams();
			}
			if (proxy==true) {
				url=URL+'/proxy/index.'+PROXYTYPE;
			} else {
				url=this.xml;
			}
			if (this.proxy==true) {
				query.url=this.xml;
			}
			var my=this;
			new Ajax.Request(url, {
				parameters: Object.toQueryString(query),
				onSuccess: function(request) {
					my.responseXML=request.responseXML;
					my.responseXSLT=my.getXSLT();
					var objTrans=new TransformaXSLT(my.responseXML,my.responseXSLT,my.destino).transforma();
					if (Object.isFunction(my.posCarga)) {
						my.posCarga(request,my.argsOPC);
					}
				},
				onFailure: function() {
					if (DEBUG && DEBUG == true) {
						alert('Erro no ParseXSLT ' + this.xml + ' ' + this.xslt);
					}
				}
			}
		);
	},
	getXSLT: function() {
		if (Object.isUndefined(CACHEXSL[this.xslt])) {
			var loaderXSLT=new LoaderXSLT(this.xslt);
			var xslt=loaderXSLT.getContent();
			if (xslt) {
				CACHEXSL[this.xslt]=xslt;
			} else {
				return null;
			}
		}
		return CACHEXSL[this.xslt];
	}
});
var ParseXSLTStatic = Class.create();
Object.extend(ParseXSLTStatic.prototype, {
	initialize: function(proxy,xml,xslt,objetoDestino,posCarga,argsOPC) {
		this.proxy=proxy;
		this.xml=xml;
		this.xslt=xslt;
		this.destino=objetoDestino;
		this.responseXSLT=null;
		this.posCarga=posCarga;
		this.argsOPC=argsOPC;
	},
	carrega: function() {
		this.responseXSLT=this.getXSLT();
		var objTrans=new TransformaXSLT(this.xml,this.responseXSLT,this.destino).transforma();
		if (Object.isFunction(this.posCarga)) {
			this.posCarga(this.argsOPC);
		}
	},
	getXSLT: function() {
		if (Object.isUndefined(CACHEXSL[this.xslt])) {
			var loaderXSLT=new LoaderXSLT(this.xslt);
			CACHEXSL[this.xslt]=loaderXSLT.getContent();
		}
		return CACHEXSL[this.xslt];
	}
});
var Inicializado = Class.create();
Object.extend(Inicializado.prototype, {
	initialize: function(proxy,queryString) {
			var url='';
			var parametros='';
			if (! queryString || ! typeof(queryString)=="object") {
				queryString = new Object();
			}
			if (proxy==true) {
				url=URL+'/proxy/index.'+PROXYTYPE;
				queryString.url='contratos.csp';
			} else {
				url='contratos.csp';
			}
			new Ajax.Request(url, {
				parameters:Object.toQueryString(queryString),
				asynchronous: false,
				onSuccess: function(request) {
					INICIALIZADO=true;
					CONTRATOS=request.responseXML;
				},
				onFailure: function() {
					INICIALIZADO=false;
				}
			}
		);
	}
});
