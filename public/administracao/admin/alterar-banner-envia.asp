<!--#include file="conn/connection.asp"-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<%
'VERIFICANDO ACESSO AUTORIZADO-----------------------------------------------------------------------------------
call verifica()

'ESTABELECENDO CONEXãO COM O BANCO DE DADOS----------------------------------------------------------------------
call abreBanco()
%>

<%
id_banner=LimpaDados(request.QueryString("id_banner"))

if id_banner="" then
%>

<script language="JavaScript" type="text/javascript">
alert ("Dados não conferem.");
document.history.back(-1);
</script>

<% end if %>

<%
'Instancia o componente
SET SaFileUp = Server.CreateObject("SoftArtisans.FileUp") 
 
'Configura o caminho onde arquivo será salvo
SaFileUp.Path = "e:\home\vaniadesene\Web\imgs\banner\"

SaFileUp.Form("FILE1").Save

arquivo = SaFileUp.Form("File1")
'response.write Foto1 & "<br>"

arquivo_nome = mid(arquivo,37)
'response.write "Endereço imagem: " & imagem

'## ATIVA O TRATAMENTO DE ERRO ##
'Caso o usuário não indique um arquivo para upload, informa erro.
If SaFileUp.IsEmpty Then
	response.write "<center>Por favor, indique um arquivo para upload.</center><br>"
Else
	'Salva o arquivo no servidor
	SaFileUp.Save
	response.write "<center>Total de Bytes Enviados: " & SaFileUp.TotalBytes & "</center>"
End if			

'Declara as variáveis a serem utilizadas no script
Dim AspJpeg, imagem
 
'Instancia o componente na memória
SET AspJpeg = Server.CreateObject("Persits.Jpeg")
 
'Define o caminho da imagem a ser redimensionada
imagem = "e:\home\vaniadesene\web\imgs\banner\"&arquivo_nome&""
'response.write imagem
 
'Para quem utiliza serviços da REVENDA conosco
'imagem = "E:\vhosts\DOMINIO_COMPLETO\httpdocs\AspJpeg\imagem.jpg"
 
'Carrega a imagem
AspJpeg.Open imagem
 
'Define o novo tamanho da imagem que neste caso, definimos que ela será 50% menor que o normal.
AspJpeg.Width = 680
AspJpeg.Height = 330
 
'Esse método é opcional, usado para melhorar o visual da imagem.
AspJpeg.Sharpen 1, 150
 
'Cria um Thumbnail e o grava no caminho abaixo.
AspJpeg.Save "e:\home\vaniadesene\web\imgs\banner\"&arquivo_nome&""
 
'Para enviar o thumbnail para o browser do visitante, utilize o método SendBinary .
'Response.Write AspJpeg.SendBinary

atualiza="update banners set arquivo='"& arquivo_nome &"' where id_banner="& id_banner &""
conn.execute(atualiza)
 
'Remove as referências do componente da memória
SET AspJpeg = Nothing
 
'Gera um link html para retornar a pagina anterior
response.write "<center><a href='javascript:history.go(-1)'>Voltar</a></center>"
 
Set SaFileUp = Nothing 

call fechaBanco()
%>

<% Set upl = Nothing %>

<script language="JavaScript" type="text/javascript">
alert ("Banner alterado com sucesso.");
document.location = "banners.asp";
</script>