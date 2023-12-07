var Detalhes = Class.create();
Object.extend(Detalhes.prototype, {
	initialize: function(proxy,queryString,destino) {
		this.proxy=proxy;
		this.queryString=queryString;
		this.destino=destino;
		this.xml='imovel.csp';
		this.xslt='imovel.xsl';
	}
});