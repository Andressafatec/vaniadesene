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
  <strong>Simulação de Financiamento</strong> </div>
</header>

<p>Segue abaixo as informações para simulação de financiamento</p>

<p>Valor do imóvel: <strong>{{$valor}}</strong>  <br>
Renda familiar: <strong>{{$renda}}</strong>  <br>
Entrada: <strong>{{$entrada}}</strong>    <br>
Tipo do imóvel: <strong>{{$tipo}}</strong>   <br>
Estado do imóvel: <strong>{{$estado}}</strong>    <br>
Possui Imóvel: <strong>{{$possui}}</strong> 


Entre em contato com o cliente pelo e-mail <strong>{{$email}}</strong>
</p>

</body>
</html>
