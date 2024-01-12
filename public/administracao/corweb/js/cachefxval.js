var FaixasValores = Class.create();
Object.extend(FaixasValores.prototype, {
	initialize: function() {
		this.faixas = new Array();
	},
	clear: function() {
		var fx = this.faixas;			
		for (var i=fx.length;i>0;i--) {
			fx[i]=null;
			fx.length = i;
		}
	},
	add: function(faixaValor) {
		var fx = this.faixas;			
		fx[fx.length] = faixaValor;
	},
	remove: function(faixaValor) {
		if (contains(faixaValor.key)) {
			var fx = this.faixas;
			var faixaNova = new Array();
			for (var i=0;i<fx.length;i++) {
				if (fx[i].key != key)
					faixaNova[faixaNova.length]=fx[i];
			}
			this.faixas = faixaNova;
		}
	},
	get: function(key) {
		var fx = this.faixas;
		if (fx.length <= 0 || key == null)
			return null;
		for (var i=0;i<fx.length;i++) {
			if (fx[i].key == key)
				return fx[i];
		}
		return null;
	},
	geti: function(index) {
		var fx = this.faixas;
		if (fx.length >= index || index == null)
			return fx[index];
		return null;
	},
	contains: function(key) {
		var fx = this.faixas;
		if (fx.length <= 0 || key == null)
			return false;
		for (var i=0;i<fx.length;i++) {
			if (fx[i].key == key)
				return true;
		}
		return false;
	},
	size: function() {
		return this.faixas.length;
	}
});
