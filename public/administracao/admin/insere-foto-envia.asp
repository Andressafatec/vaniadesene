<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<!--#include file="conn/connection.asp"-->

<%
call verifica()
call abreBanco()

'Instancia o componente
SET SaFileUp = Server.CreateObject("SoftArtisans.FileUp") 

'Configura o caminho onde arquivo será salvo
SaFileUp.Path = "e:\home\vaniadesene\Web\imgs\imoveis\"
			
SaFileUp.Form("FILE1").Save
			
arquivo = SaFileUp.Form("File1")
'response.write Foto1 & "<br>"

arquivo_nome = mid(arquivo,38)
'response.write "Endereço imagem: " & imagem

id_imovel = LimpaDados(SaFileUp.form("id_imovel")) 
			
'## ATIVA O TRATAMENTO DE ERRO ##
'Caso o usuário não indique um arquivo para upload, informa erro.
If SaFileUp.IsEmpty Then
response.write "<center>Por favor, indique um arquivo para upload.</center><br>"
Else
'Salva o arquivo no servidor
SaFileUp.Save
	'response.write "<center>Total de Bytes Enviados: " & SaFileUp.TotalBytes & "</center>"
End if
			
'Declara as variáveis a serem utilizadas no script
Dim AspJpeg, imagem
 
'Instancia o componente na memória
SET AspJpeg = Server.CreateObject("Persits.Jpeg")
 
'Define o caminho da imagem a ser redimensionada
imagem = "e:\home\vaniadesene\web\imgs\imoveis\"&arquivo_nome&""
'response.write imagem
 
'Carrega a imagem
AspJpeg.Open imagem
 
'Define o novo tamanho da imagem que neste caso, definimos que ela será 50% menor que o normal.
AspJpeg.Width = AspJpeg.OriginalWidth / 2
AspJpeg.Height = AspJpeg.OriginalHeight / 2
 
'Esse método é opcional, usado para melhorar o visual da imagem.
AspJpeg.Sharpen 1, 150
 
'Cria um Thumbnail e o grava no caminho abaixo.
AspJpeg.Save "e:\home\vaniadesene\web\imgs\imoveis\"&arquivo_nome&""
 
'Para enviar o thumbnail para o browser do visitante, utilize o método SendBinary .
'Response.Write AspJpeg.SendBinary

insere="insert into galeria_fotos (id_imovel, arquivo) values ("& id_imovel &", '"& arquivo_nome &"')"
conn.execute(insere)
'response.write insere
 
'Remove as referências do componente da memória
SET AspJpeg = Nothing
 
Set SaFileUp = Nothing

sql_verifica="select * from imoveis where id_imovel="& id_imovel &""
set rsVerifica=conn.execute(sql_verifica)

if rsVerifica.eof then
response.Redirect("imoveis.asp")
else

if rsVerifica("id_unidade")="1" then
response.Redirect("imoveis.asp?un=1")
end if
if rsVerifica("id_unidade")="2" then
response.Redirect("imoveis.asp?un=2")
end if
end if

call fechaBanco()
%>