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
  <strong>Formulário de Cadastro de Imóvel</strong> </div>
</header>

<p>Segue abaixo as informações</p>

<p>Nome: <strong>{{$nome}}</strong>  <br>
Email: <strong>{{$email}}</strong>  <br>
Telefone: <strong>{{$telefone}}</strong>    <br>
Endereço: <strong>{{$endereco}}, {{$numero}}</strong>   <br>
Bairro: <strong>{{$bairro}}</strong>    <br>
Cidade: <strong>{{$cidade}}</strong>    <br>
Estado:<strong>{{$uf}}</strong> <br>
Tipo Imóvel:<strong>{{$tipo}}</strong>  <br>
Valor:<strong>{{$valor}}</strong>   <br>
Finalidade:<strong>{{$finalidade}}</strong> <br>
Descrição: <strong>{{$descricao}}</strong>  <br>

</p>

Características:
<strong>
    @foreach($caracteristicas as $caracteristica)
        <li>{{ $caracteristica }}</li>
    @endforeach
</strong>

Abaixo está os anexos das fotos:

</body>
</html>
