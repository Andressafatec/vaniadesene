<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include file="conn/connection.asp"-->
<%call verifica()%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
<head>
		<title>Administração - Imóveis</title>
		<meta name="language" content="pt-br" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<link href="../images/ico/mak.ico" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.9.custom.css" />
        <link rel="stylesheet" type="text/css" href="css/uniform.default.css" />

<script type="text/javascript" src="js/validation.js"></script>
      
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

<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="defaultTable">

<%
call abreBanco()

id_unidade=LimpaDados(request.QueryString("un"))

if id_unidade <> "" then
	sql="select * from imoveis where id_unidade = "& id_unidade &" order by id_imovel desc"
	set rs=server.createobject("adodb.recordset")
else
	sql="select * from imoveis order by id_imovel desc"
	set rs=server.createobject("adodb.recordset")
end if
  
rs.PageSize = 10
rs.CursorLocation = 3
rs.CursorType = 1
rs.Open sql,conn,3,1

if rs.eof then

response.write "Nenhum cadastro encontrado."

else
		
if request.querystring("pagina")="" then
			intpagina=1
		else
			if cint(request.querystring("pagina"))<1 then
				intpagina=1
			else
				if cint(request.querystring("pagina"))> rs.pagecount then
					intpagina=rs.pagecount
				else
					intpagina=Request.QueryString("pagina")
				end if
			end if
		end if

RS.AbsolutePage=intpagina
			
cont=0
%>

<tr>
	<th>Editar</th>
    <th>Referência</th>
	<th>Descrição</th>
	<th>Bairro</th>
	<th>Valor</th>
	</tr>

<%			
while cont < RS.PageSize and not RS.EOF
%>
        
          
<tr>
	<td align="center" valign="middle"><a href="javascript:if(confirm('Tem certeza que deseja excluir este imóvel?')){location.href='remover-imovel.asp?cod=<%=rs("id_imovel")%>';}"><img src="images/ic-excluir.png" alt="Excluir imóvel" title="Excluir imóvel" width="20" height="20" border="0"></a> <a href="alterar-imovel.asp?cod=<%=rs("id_imovel")%>"><img src="images/ic-alterar.png" alt="Alterar informações" title="Alterar informações" width="20" height="20" border="0"></a> <a href="fotos.asp?id_imovel=<%=rs("id_imovel")%>"><img src="images/ic-fotos.png" alt="Alterar foto" title="Alterar foto" width="20" height="20" /></a></td>
	<td width="75" align="center" valign="middle"><%=rs("referencia")%></td>
	<td align="center" valign="middle"><%=rs("descricao")%></td>
	<td align="center" valign="middle"><%=rs("bairro")%></td>
    <td align="center" valign="middle"><%=formatnumber(rs("preco"))%></td>
	</tr>

<%
rs.movenext
cont=cont+1
wend

end if
%>

<tr class="footer">
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>

</table>

<%
vPag=request.QueryString("pagina")

session("vPagina")=request.QueryString("pagina")
%>

<div id="cont-paginas">

<div id="pagination">
<%for x=1 to rs.PageCount%>

<%if id_unidade <> "" then%>
	<a href="imoveis.asp?un=<%=id_unidade%>&pagina=<%=x%>"><%=x%></a>
<%else%>
	<a href="imoveis.asp?pagina=<%=x%>"><%=x%></a>
<%end if%>
<%next%>
</div>  

</div>
<%
rs.close
set rs=nothing
call fechaBanco()
%>


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