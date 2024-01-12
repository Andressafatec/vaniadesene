<!--#include file="conn/connection.asp"-->

<%
'VERIFICANDO ACESSO AUTORIZADO-----------------------------------------------------------------------------------
call verifica()

'ESTABELECENDO CONEXãO COM O BANCO DE DADOS----------------------------------------------------------------------
call abreBanco()
%>

<%
'recupera o id do tipo que será excluído
id_banner=LimpaDados(request.QueryString("cod"))
%>

<% if id_banner="" then %>
<script language="JavaScript" type="text/javascript">
alert ("Código do banner inválido.");
document.location = "banners.asp";
</script>

<% end if %>

<%
apaga="delete from banners where id_banner="& id_banner&""
conn.execute(apaga)
%>

<script language="JavaScript" type="text/javascript">
//exibe mensagem sucesso
alert ("Registro excluído com sucesso.");
document.location = "banners.asp";
</script>

<%call fechaBanco()%>