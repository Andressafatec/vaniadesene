var Aguarde = Class.create();
Object.extend(Aguarde.prototype, {
	initialize: function(queryString) {
		this.ampulheta=$('apDiv1');
	},
	show: function() {
		this.ampulheta.style.display='block';
		this.ampulheta.style.zIndex=1;
	},
	hide: function() {
		this.ampulheta.style.display='none';
	}
});
