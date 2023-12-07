var Ponto = Class.create();
Object.extend(Ponto.prototype, {
	initialize: function(latitude,longitude) {
		this.latitude=latitude;
		this.longitude=longitude;
		this.radius=6356.78;
	},
	toRadius: function(graus) { 
		return graus*Math.PI/180;
	},
	toGradiano: function(radius) { 
		return radius*180/Math.PI;
	},
	endPoint: function(raio,cabec) {
		var lat=this.toRadius(this.latitude);
		var lng=this.toRadius(this.longitude);
		var heading=this.toRadius(cabec);
		var end_lat=Math.asin(Math.sin(lat)*Math.cos(raio/this.radius)+Math.cos(lat)*Math.sin(raio/this.radius)*Math.cos(heading));
		var end_lng=lng+Math.atan2(Math.sin(heading)*Math.sin(raio/this.radius)*Math.cos(lat),Math.cos(raio/this.radius)-Math.sin(lat)*Math.sin(end_lat));
		return new Ponto(this.toGradiano(end_lat),this.toGradiano(end_lng));
	},
	raioDeDistancia: function(raio) {
		var p0=this.endPoint(raio,0);
		var p90=this.endPoint(raio,90);
		var p180=this.endPoint(raio,180);
		var p270=this.endPoint(raio,270);
		var sw=new Ponto(p180.latitude,p270.longitude);
		var ne=new Ponto(p0.latitude,p90.longitude);
		var matriz=new Array();
		matriz.push(ne);
		matriz.push(sw);
		return matriz;
	},
	drawCircle: function(raio) {
		var d2r=Math.PI/180; 
		var r2d=180/Math.PI; 
		var Clat=(raio/this.radius)*r2d; 
		var Clng=Clat/Math.cos(this.latitude*d2r); 
		var pontos=new Array(); 
		for (var i=0; i < 33; i++) { 
			var theta=Math.PI*(i/16); 
			pontos.push(new Ponto(this.latitude+(Clat*Math.sin(theta)),this.longitude+(Clng*Math.cos(theta)))); 
		}
		return pontos;
	}
});
