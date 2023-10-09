<%
Rem
Rem Arquivo de Configuração para PROXY de CHAMADA para páginas CSP
Rem Este arquivo consiste no endereço de IP onde está o LINK ADSL do cliente
Rem NOTA 1:
Rem Caso o Cliente responda a por um LINK de IP DINAMICO, deve-se instalar algum serviço de DNS dinâmico
Rem este serviço deve ser configurado e fornecido exclusivamente pelo cliente.
Rem Caso não conheçam: www.noip.com, www.dyndns.com
Rem Após obter o endereço da REDE substitua pelo conteúdo da variável $servidor
Rem NOTA 2:
Rem Alguns provedores de xDSL/CABO bloqueiam totalmente as portas baixas, portanto será necessário outras
Rem portas para fornecer o serviço de servidor WEB. Ex: $porta = 8080
Rem NOTA 3:
Rem Todo o serviço de configuração de PORTAS/ROTAS, necessárias para servir as páginas WEB, são de TOTAL
Rem responsabilidade do CLIENTE. A SistemasProfissionais apenas fornecer o SOFTWARE e não faz nenhuma configuração
Rem nas instalações do Cliente
Rem
	Dim servidor, porta, aplicacao
	servidor = "vaniasene.ddns.com.br"
	'servidor = "online.sistemasprofissionais.com.br"
	porta = 8080
	aplicacao = "corweb"
%>

