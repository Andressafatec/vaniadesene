<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<!--#include file="conn/connection.asp"-->

<%
call verifica()
call abreBanco()

'Instancia o componente
		SET SaFileUp = Server.CreateObject("SoftArtisans.FileUp") 
 
			'Configura o caminho onde arquivo será salvo
			SaFileUp.Path = "e:\home\vaniadesene\Web\imgs\banner\"
			
			SaFileUp.Form("FILE1").Save
			
			descricao = LimpaDados(SaFileUp.Form("descricao"))
			
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
AspJpeg.Width = AspJpeg.OriginalWidth / 2
AspJpeg.Height = AspJpeg.OriginalHeight / 2
 
'Esse método é opcional, usado para melhorar o visual da imagem.
AspJpeg.Sharpen 1, 150
 
'Cria um Thumbnail e o grava no caminho abaixo.
AspJpeg.Save "e:\home\vaniadesene\web\imgs\banner\"&arquivo_nome&""
 
'Para enviar o thumbnail para o browser do visitante, utilize o método SendBinary .
'Response.Write AspJpeg.SendBinary

insere="insert into banners (arquivo, descricao) values ("& arquivo_nome &", '"& descricao &"')"
conn.execute(insere)
'response.write insere
 
'Remove as referências do componente da memória
SET AspJpeg = Nothing
 
			'Gera um link html para retornar a pagina anterior
			response.write "<center><a href='javascript:history.go(-1)'>Voltar</a></center>"
 
		Set SaFileUp = Nothing 
%>