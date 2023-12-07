<%

'ARQUIVOS DE FUNÇÕES E SUBROTINAS

'DECLARAÇÃO VARIÁVEIS-------------------------------------------------------------------------------------------------------

dim conn, lixo, textoOK, i, DynuEncrypt, lEncrypted, lDecrypted, sEncrypted, sDecrypted

'SUBROTINA ABRIR CONEXÃO BANCO----------------------------------------------------------------------------------------------
sub abreBanco()
set conn = Server.CreateObject("ADODB.Connection")
conn.open = ("DRIVER={MySQL ODBC 5.1 Driver};SERVER=186.202.152.110;PORT=3306;DATABASE=vaniadesene;USER=vaniadesene;PASSWORD=loc@73sen4;OPTION=3;")
end sub

'SUBROTINA VERIFICA SE ESTA AUTORIZADO--------------------------------------------------------------------------------------

sub verifica()
	if Session("autorizado") = false then
		response.redirect("default.asp")
	end if
end sub

'SUBROTINA FECHAR CONEXÃO BANCO---------------------------------------------------------------------------------------------

sub fechaBanco()
	conn.close
	set conn = nothing
end sub

'SUBROTINA CRIAR OBJETO CRIPTOGRAFIA COM DYNUENCRYPT------------------------------------------------------------------------

sub cDynu
	'Instancia o componente 
	set DynuEncrypt = Server.Createobject("Dynu.Encrypt")
end sub

' SUBROTINA REMOVE REFERêNCIA OBJETO CRIPTOGRAFIA DYNUENCRYPT NA MEMÓRIA----------------------------------------------------

sub rDynu
	'Remove as referências do objeto na memória
	set DynuEncrypt = nothing
end sub

'FUNÇÃO PARA LIMPAR E TROCAR CARACTERES E PALAVRAS MALICIOSAS POR VAZIO-----------------------------------------------------

Function LimpaDados( input )
    
lixo = array ("select", "drop", "--", "insert", "update", "delete", "xp_", "*", "#", "%", "$", "&", "'", "(", ")", "/", "\", ":", ";", "¨", "<", ">", "=", "[", "]", "?", "|", "declare", "convert", """""", " or ", " and ", "-shutdown", "'or'1'='1'", "script", "iframe")

    textoOK = trim((input))'RETIRANDO ESPAÇOS EM BRANCO DO INÍCIO E FIM E TRANSFORMANDO EM MINÚSCULO PARA COMPARAR
	
	'for i = lBound(lixo) to ubound(lixo)
    'for i = 0 to uBound(lixo)
    'textoOK = replace( textoOK ,  lixo(i) , "")
    'next

    LimpaDados = textoOK

end Function


'FUNÇÃO PARA LIMPAR E TROCAR CARACTERES E PALAVRAS MALICIOSAS POR VAZIO.. EXEÇÃO <BR>-----------------------------------------------------
Function LimpaTexto( input )
    
lixo = array ("select", "drop", "--", "insert", "update", "delete", "xp_", "*", "#", "%", "$", "&", "'", "\", ":", ";", "¨", "=", "[", "]", "|", "declare", "convert", """""", " or ", " and ", "-shutdown", "'or'1'='1'", "script", "iframe")

    textoOK = trim((input))'RETIRANDO ESPAÇOS EM BRANCO DO INÍCIO E FIM E TRANSFORMANDO EM MINÚSCULO PARA COMPARAR
	
	'for i = lBound(lixo) to ubound(lixo)
    'for i = 0 to uBound(lixo)
    'textoOK = replace( textoOK ,  lixo(i) , "")
    'next

    LimpaTexto = textoOK

end Function

'vLogin = Server.HtmlEncode( request.form("login")
%>