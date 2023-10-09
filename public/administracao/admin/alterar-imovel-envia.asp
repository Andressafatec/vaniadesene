<!--#include file="conn/connection.asp"-->

<%
call verifica()
call abreBanco()

response.CodePage = 65001

id_imovel=LimpaDados(request.QueryString("cod"))

id_categoria = LimpaDados(request.Form("categoria"))

id_finalidade = LimpaDados(request.Form("finalidade"))

Referencia = LimpaDados(request.Form("txtReferencia"))
'response.write Referencia & "<br>"

Bairro = LimpaDados(request.Form("txtBairro"))
'response.write Bairro & "<br>"

Valor = replace(request.Form("txtValorImovel"), ",","")
Valor = replace(request.Form("txtValorImovel"), ".","")
if valor="" then 	valor=0 end if
'response.write Valor & "<br>"

Descricao = LimpaDados(request.Form("txtDescricao"))
'response.write Descricao & "<br>"

altera="update imoveis set referencia="& Referencia &", bairro='"& Bairro &"', preco='"& Valor &"', descricao='"& Descricao &"', id_categoria="& id_categoria &", id_finalidade="& id_finalidade &" where id_imovel="& id_imovel

conn.execute(altera)
'response.Write altera

call fechaBanco()
%>

<script language="JavaScript" type="text/javascript">
alert ("Cadastro alterado com sucesso.");
document.location = "imoveis.asp";
</script>