<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
*{
	font-family:sans-serif;
	
}
header{
	max-width:800px;
	margin:0 auto;
	background:#333333;	
	padding:10px;
	margin-bottom:20px;
}
.titulo{
	color:#EEAC0A;
	font-size:30px;
	
	margin-top:30px;
}
.clearfix{
	clear:both;
}
</style>	
</head>

<body>
<header>
<div class="titulo">
  <strong>Corretor</strong> </div>
<div class="clearfix"></div>
</header>

<p>Cliente <strong>{{$name}}</strong> quer entrar em contato para falar sobre o imóvel com valor de referência<strong> {{$imoveis_id}}</strong> de título <strong>{{$imoveis_titulo}}</strong></p> <br>
<p>Entre em contato pelo número de telefone <strong>{{$tel}}</strong></p>
</body>
</html>
