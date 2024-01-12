<?php
/*
* Arquivo de Configura��o para PROXY de CHAMADA para p�ginas CSP
* Este arquivo consiste no endere�o de IP onde est� o LINK ADSL do cliente
* NOTA 1:
* Caso o Cliente responda a por um LINK de IP DINAMICO, deve-se instalar algum servi�o de DNS din�mico
* este servi�o deve ser configurado e fornecido exclusivamente pelo cliente.
* Caso n�o conhe�am: www.noip.com, www.dyndns.com
* Ap�s obter o endere�o da REDE substitua pelo conte�do da vari�vel $servidor
* NOTA 2:
* Alguns provedores de xDSL/CABO bloqueiam totalmente as portas baixas, portanto ser� necess�rio outras
* portas para fornecer o servi�o de servidor WEB. Ex: $porta = 8080
* NOTA 3:
* Todo o servi�o de configura��o de PORTAS/ROTAS, necess�rias para servir as p�ginas WEB, s�o de TOTAL
* responsabilidade do CLIENTE. A SistemasProfissionais apenas fornecer o SOFTWARE e n�o faz nenhuma configura��o
* nas instala��es do Cliente
*/
$servidor = "vaniasene.ddns.com.br";
$porta = 8080;
$aplicacao = "corweb";
?>
