<!--#include file="conn/connection.asp"-->

<%

'ESTABELECENDO CONEXÃO COM O BANCO DE DADOS----------------------------------------------------------------------
call abreBanco()

'RECUPERANDO E TRATANDO DADOS------------------------------------------------------------------------------------

vUser=LimpaDados(request.Form("username"))
vPass=LimpaDados(request.Form("senha"))

'EVITANDO QUE COPIE E COLE O CÓDIGO DA PÁGINA DE FORM EM OUTRO SERVIDOR SEM A VALIDAÇÃO JAVASCRIPT----------------
if vUser = "" then
    session("msgErro") = "Dados inválidos." 
	response.Redirect("default.asp")
    response.end()
end if

if vPass = "" then
    session("msgErro") = "Dados inválidos." 
	response.Redirect("default.asp")
    response.end()
end if

'CONSULTA---------------------------------------------------------------------------------------------------------
sql="select * from users where usuario='"& vUser &"' and senha='"& vPass & "'"
set rs=conn.execute (sql)

If rs.eof Then
	session("msgErro") = "Dados inválidos." 
	response.Redirect("default.asp")
Else
	Session("autorizado") = True
	session("nomeUser")=rs("nome")
	response.redirect("inicial.asp")
End If

rs.close
set rs=nothing

call fechaBanco()
%>