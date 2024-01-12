<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include file="conn/connection.asp"-->

<%
'VERIFICANDO ACESSO AUTORIZADO-----------------------------------------------------------------------------------
call verifica()

'ESTABELECENDO CONEXãO COM O BANCO DE DADOS----------------------------------------------------------------------
call abreBanco()
%>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
<head>
		<title>Administração - Alterar imóveis</title>
		<meta name="language" content="pt-br" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<link href="../images/ico/mak.ico" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.9.custom.css" />
        <link rel="stylesheet" type="text/css" href="css/uniform.default.css" />

		<script type="text/javascript" src="js/valida-imovel-altera.js"></script>
		<script type="text/javascript" src="js/jquery.function.js"></script>
      
</head>

<body>

<!-- container  -->
<div id="container">
    
<div id="header">
	<div id="userBox">
    <p>Bem-vindo prezado(a), <% response.write session("nomeUser")%><br /><%Response.Write(WeekDayName(WeekDay(Date())))%>, <%Response.Write(Day(Date()))%> de <%Response.Write(MonthName(Month(Date())))%> de <%response.write Year(now)%></p>
    <p><a href="logout.asp">Logout</a></p>
    </div>

	<img src="images/logo.png" alt="" width="300" height="99" />

	<div id="menu">
	<ul>
		<li><a href="inicial.asp">Inicial</a></li>
        <li>
			<a href="#">Unidade Satélite</a>
			<ul>
			<li><a href="imoveis.asp?un=1">Exibir todos</a></li>
				<li><a href="insere-imovel.asp?un=1">Inserir novo</a></li>
			</ul>
        </li>
        <li>
			<a href="#">Unidade Urbanova</a>
			<ul>
			<li><a href="imoveis.asp?un=2">Exibir todos</a></li>
				<li><a href="insere-imovel.asp?un=2">Inserir novo</a></li>
			</ul>
        </li>
        <li>
			<a href="#">Banner Destaque</a>
			<ul>
			<li><a href="banners.asp">Exibir todos</a></li>
				<li><a href="insere-banner.asp">Inserir novo</a></li>
			</ul>
        </li>
	</ul>
	</div>

</div>

<!-- content  -->
<div id="content">

<h1>Informações da Foto</h1>

<div class="defaultForm">

<%
id_imovel = LimpaDados(request.QueryString("id_imovel"))
%>

<form name="fotoInsere" action="insere-foto-envia.asp" method="post" enctype="multipart/form-data" onSubmit="return validaInsereFoto()">

<label for="txtArquivo">Arquivo:</label>
<input name="FILE1" type="File" id="FILE1" size="46" />

<input type="hidden" name="id_imovel" value="<%=id_imovel%>" />
<br />

<input name="enviar" type="submit" id="enviar" value="Incluir" />

</form>

</div>

</div>
</div>
    
<!-- footer -->
		<div id="footer">
		Powered by <a href="http://www.luminabrasil.com.br" title="Lumina Comunicação" rel="external">LuminaComunicação</a></div>
		<!-- /footer -->
		
		<!-- scripts -->
	  <script type="text/javascript" src="js/jquery-1.5.min.js"></script>
	  <script type="text/javascript" src="js/jquery-ui-1.8.9.custom.min.js"></script>
	  <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
	  <script type="text/javascript" src="js/functions_admin.js"></script>
        <!-- /scripts -->

</div>
	<!-- /container -->
    
</body>
</html>