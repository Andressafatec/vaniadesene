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

		<script type="text/javascript" src="js/validation-imovel.js"></script>
		<script type="text/javascript" src="js/jquery.function.js"></script>
		<script type="text/javascript" src="js/functions_admin.js"></script>
      
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

<h1>Informações do Imóvel</h1>

<div class="defaultForm">

<%
id_unidade=LimpaDados(request.QueryString("un"))
%>

<form name="imovelInsere" action="insere-imovel-envia.asp?un=<%=id_unidade%>" method="post" onSubmit="return validaInsereImovel()">

<% if id_unidade="" then %>

<label for="unidade">Unidade:</label>
<select name="un">
<%
sql_unidades="select * from unidades order by nome asc"
set rsUnidade=conn.execute(sql_unidades)

if rsUnidade.eof then
%>
<option>Nenhuma unidade encontrada.</option>
<%
else
while not rsUnidade.eof
%>
<option value="<%=rsUnidade("id_unidade")%>"><%=rsUnidade("nome")%></option>
<%
rsUnidade.movenext
wend
end if
rsUnidade.close
set rsUnidade=nothing
%>
</select>

<%end if%>

<br />

<label for="categoria">Categoria:</label>
<select name="categoria">
<%
sql_categoria="select * from categorias order by nome_categoria asc"
set rsCat=conn.execute(sql_categoria)

if rsCat.eof then
%>
<option>Nenhuma opção encontrada.</option>
<%
else
while not rsCat.eof
%>
<option value="<%=rsCat("id_categoria")%>"><%=rsCat("nome_categoria")%></option>
<%
rsCat.movenext
wend
end if
rsCat.close
set rsCat=nothing
%>
</select>

<br />

<label for="finalidade">Finalidade:</label>
<select name="finalidade">
<%
sql_finalidade="select * from finalidades order by nome_finalidade asc"
set rsFin=conn.execute(sql_finalidade)

if rsFin.eof then
%>
<option>Nenhuma opção encontrada.</option>
<%
else
while not rsFin.eof
%>
<option value="<%=rsFin("id_finalidade")%>"><%=rsFin("nome_finalidade")%></option>
<%
rsFin.movenext
wend
end if
rsFin.close
set rsFin=nothing
%>
</select>

<br />

<label for="txtReferencia">Referência:</label>
<input name="txtReferencia" type="text" />

<br />

<label for="txtBairro">Bairro:</label>
<input name="txtBairro" type="text" />

<br />

<label for="txtValorImovel">Valor do Imóvel:</label>
<input name="txtValorImovel" type="text" onkeypress="return(formatarValor(this,'.',',',event));" class="menor" />

<br />

<label for="txtDescricao">Descrição:</label>
<!--textarea name="txtDescricao" cols="" rows="5"></textarea-->

<textarea cols="45" name="txtDescricao" id="txtDescricao" rows="5" onkeyup="mostrarResultado(this.value,120,'countTxt');contarCaracteres(this.value,120,'countTxtLast')"></textarea><br />
<span id="countTxt"></span><br />
<span id="countTxtLast"></span>

<br />

<input name="enviar" type="submit" id="enviar" value="Incluir" />
<input type="hidden" name="unidade" value="<%=id_unidade%>" />
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