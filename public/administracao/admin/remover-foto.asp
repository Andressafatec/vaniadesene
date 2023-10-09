<!--#include file="conn/connection.asp"-->

<%
'VERIFICANDO ACESSO AUTORIZADO-----------------------------------------------------------------------------------
call verifica()

'ESTABELECENDO CONEXãO COM O BANCO DE DADOS----------------------------------------------------------------------
call abreBanco()
%>

<%
'recupera o id do registro que será excluído
id_foto=LimpaDados(request.QueryString("idFoto"))

'recupera o id do imovel referente ao registro que será excluído
id_imovel=LimpaDados(request.QueryString("idImovel"))
%>

<% if id_imovel="" then %>
<script language="JavaScript" type="text/javascript">
alert ("Código da foto inválido.");
document.location = "imoveis.asp";
</script>

<% end if %>

<%
apaga="delete from galeria_fotos where id_foto="& id_foto&""
conn.execute(apaga)
'response.Write apaga

'Seleciona o imovel para verificar qual unidade pertence
sql_verifica_imovel="select * from imoveis where id_imovel="& id_imovel &""
set rsVerifica=conn.execute (sql_verifica_imovel)

'Caso não encontrar o imovel redireciona para todos imoveis
if rsVerifica.eof then
	response.Redirect("imoveis.asp")
else

'Caso for unidade URBANOVA redireciona para todos imoveis especificos
if rsVerifica("id_unidade")="1" then
	response.Redirect("imoveis.asp?un=1")
end if
'Caso for unidade SATELITE redireciona para todos imoveis especificos
if rsVerifica("id_unidade")="2" then
	response.Redirect("imoveis.asp?un=2")
end if

end if
%>

<%call fechaBanco()%>