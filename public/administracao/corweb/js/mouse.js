var Mouse = Class.create();
Object.extend(Mouse.prototype, {
	initialize: function(queryString) {
		this.x=0;
		this.y=0;
		this.ampulheta=$('divAmpulheta');
	},
	setX: function(x) {
		this.x=x;
		this.ampulheta.style.left=(x-15)+'px';
	},
	getX: function() {
		return this.x;
	},
	setY: function(y) {
		this.y=y;
		this.ampulheta.style.top=y-10+'px';
	},
	getY: function() {
		return this.y;
	},
	show: function() {
		this.ampulheta.style.display='block';
		this.ampulheta.style.zIndex=1;
	},
	hide: function() {
		this.ampulheta.style.display='none';
	}
});
