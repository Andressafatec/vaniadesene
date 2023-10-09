<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<!--#include file="conn/connection.asp"-->

<%
call verifica()
call abreBanco()

response.CodePage = 65001

id_unidade = LimpaDados(request.QueryString("un"))

id_categoria = LimpaDados(request.Form("categoria"))

id_finalidade = LimpaDados(request.Form("finalidade"))

Referencia = LimpaDados(request.Form("txtReferencia"))
'response.write Referencia & "<br>"

Bairro = LimpaDados(request.Form("txtBairro"))
'response.write Bairro & "<br>"

Valor = replace(request.Form("txtValorImovel"), ",","")
if valor="" then valor=0 end if
'response.write Valor & "<br>"

Descricao = LimpaDados(request.Form("txtDescricao"))
'response.write Descricao & "<br>"

insere="insert into imoveis (referencia, bairro, preco, descricao, id_unidade, id_categoria, id_finalidade) values ('"& Referencia &"', '"& Bairro &"', '"& Valor &"', '"& Descricao &"', "& id_unidade &", "& id_categoria &", "& id_finalidade &")"

conn.execute(insere)
'response.Write insere

call fechaBanco()
%>

<script language="JavaScript" type="text/javascript">
alert ("Cadastro inserido com sucesso.");
document.location = "imoveis.asp";
</script>