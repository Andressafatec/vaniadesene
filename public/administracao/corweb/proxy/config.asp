<%
Rem
Rem Arquivo de Configura��o para PROXY de CHAMADA para p�ginas CSP
Rem Este arquivo consiste no endere�o de IP onde est� o LINK ADSL do cliente
Rem NOTA 1:
Rem Caso o Cliente responda a por um LINK de IP DINAMICO, deve-se instalar algum servi�o de DNS din�mico
Rem este servi�o deve ser configurado e fornecido exclusivamente pelo cliente.
Rem Caso n�o conhe�am: www.noip.com, www.dyndns.com
Rem Ap�s obter o endere�o da REDE substitua pelo conte�do da vari�vel $servidor
Rem NOTA 2:
Rem Alguns provedores de xDSL/CABO bloqueiam totalmente as portas baixas, portanto ser� necess�rio outras
Rem portas para fornecer o servi�o de servidor WEB. Ex: $porta = 8080
Rem NOTA 3:
Rem Todo o servi�o de configura��o de PORTAS/ROTAS, necess�rias para servir as p�ginas WEB, s�o de TOTAL
Rem responsabilidade do CLIENTE. A SistemasProfissionais apenas fornecer o SOFTWARE e n�o faz nenhuma configura��o
Rem nas instala��es do Cliente
Rem
	Dim servidor, porta, aplicacao
	servidor = "vaniasene.ddns.com.br"
	'servidor = "online.sistemasprofissionais.com.br"
	porta = 8080
	aplicacao = "corweb"
%>

