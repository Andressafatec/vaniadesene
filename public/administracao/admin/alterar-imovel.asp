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
		<script type="text/javascript" src="../library/jquery/jquery.function.js"></script>
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
vCod=LimpaDados(request.QueryString("cod"))

sql="select * from imoveis where id_imovel="& vCod
set rs=conn.execute(sql)
%>

<form name="imovelAltera" action="alterar-imovel-envia.asp?cod=<%=rs("id_imovel")%>" method="post" onSubmit="return validaAlteraImovel()">

<div class="exibe-fotos">
<h2>Fotos</h2>

<%
sqlFoto="select * from galeria_fotos where id_imovel="& vCod &""
set rsFoto=conn.execute (sqlFoto)
				
if rsFoto.eof then
%>
Nenhuma foto cadastrada.

<%
else
while not rsFoto.eof
%>

<div class="foto">
<img src="../imgs/imoveis/<%=rsFoto("arquivo")%>" width="60" height="50" border="0" />
<a href="alterar-foto.asp?idFoto=<%=rsFoto("id_foto")%>&idImovel=<%=rs("id_imovel")%>">Atualizar</a>
<a href="javascript:if(confirm('Tem certeza que deseja excluir esta foto?')){location.href='remover-foto.asp?idFoto=<%=rsFoto("id_foto")%>&idImovel=<%=rs("id_imovel")%>';}">Apagar</a>
</div>

<%
rsFoto.movenext
wend
end if

session ("id_imovel") = vCod

rsFoto.close
set rsFoto=nothing
%>
</div>

<label for="categoria">Categoria:</label>
<select name="categoria" class="box" id="categoria">
<%
sqlCategoria="select * from categorias order by nome_categoria asc"
set rsCat=conn.execute(sqlCategoria)
				
if rsCat.eof then
%>

<option value="">Nenhuma finalidade de imóvel cadastrada.</option>

<%
else
while not rsCat.eof
%>

<option value="<%=rsCat("id_categoria")%>" <%if rsCat("id_categoria")=rs("id_categoria") then response.write "selected"%>><%=rsCat("nome_categoria")%></option>

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
<select name="finalidade" class="box" id="finalidade">
<%
sqlFinalidade="select * from finalidades order by nome_finalidade asc"
set rsFinalidade=conn.execute(sqlFinalidade)
				
if rsFinalidade.eof then
%>

<option value="">Nenhuma finalidade de imóvel cadastrada.</option>

<%
else
while not rsFinalidade.eof
%>

<option value="<%=rsFinalidade("id_finalidade")%>" <%if rsFinalidade("id_finalidade")=rs("id_finalidade") then response.write "selected"%>><%=rsFinalidade("nome_finalidade")%></option>

<%
rsFinalidade.movenext
wend

end if
				
rsFinalidade.close
set rsFinalidade=nothing
%>

</select>

<br />

<label for="txtReferencia">Referência:</label>
<input name="txtReferencia" type="text" value="<%=rs("referencia")%>" />

<br />

<label for="txtBairro">Bairro:</label>
<input name="txtBairro" type="text" value="<%=rs("bairro")%>" />

<br />

<label for="txtValorImovel">Valor do Imóvel:</label>
<input name="txtValorImovel" type="text" onkeypress="return(formatarValor(this,'.',',',event));" class="menor" value="<%=rs("preco")%>" />

<br />

<label for="txtDescricao">Descrição:</label>
<textarea cols="45" name="txtDescricao" id="txtDescricao" rows="5" onkeyup="mostrarResultado(this.value,123,'countTxt');contarCaracteres(this.value,123,'countTxtLast')"><%=rs("descricao")%></textarea><br />
<span id="countTxt"></span><br />
<span id="countTxtLast"></span>

<br />

<input name="enviar" type="submit" id="enviar" value="Alterar" />

<%
rs.close
set rs=nothing
call fechaBanco()
%>

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