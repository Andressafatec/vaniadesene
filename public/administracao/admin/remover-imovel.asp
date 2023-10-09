<!--#include file="conn/connection.asp"-->

<%
'VERIFICANDO ACESSO AUTORIZADO-----------------------------------------------------------------------------------
call verifica()

'ESTABELECENDO CONEXãO COM O BANCO DE DADOS----------------------------------------------------------------------
call abreBanco()
%>

<%
'recupera o id do tipo que será excluído
id_imovel=LimpaDados(request.QueryString("cod"))
%>

<% if id_imovel="" then %>
<script language="JavaScript" type="text/javascript">
alert ("Código do imóvel inválido.");
document.location = "imoveis.asp";
</script>

<% end if %>

<%
apaga_imovel="delete from imoveis where id_imovel="& id_imovel &""
conn.execute(apaga_imovel)

apaga_foto="delete from galeria_fotos where id_imovel="& id_imovel &""
conn.execute(apaga_foto)
'response.write apaga
%>

<script language="JavaScript" type="text/javascript">
//exibe mensagem sucesso
alert ("Registro excluído com sucesso.");
document.location = "imoveis.asp";
</script>

<%call fechaBanco()%>