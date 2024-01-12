<!-- 
/* Arquivo de Configuração para PROXY de CHAMADA para páginas CSP
* Este arquivo consiste no endereço de IP onde está o LINK ADSL do cliente
* NOTA 1:
* Caso o Cliente responda a por um LINK de IP DINAMICO, deve-se instalar algum serviço de DNS dinâmico
* este serviço deve ser configurado e fornecido exclusivamente pelo cliente.
* Caso não conheçam: www.noip.com, www.dyndns.com
* Após obter o endereço da REDE substitua pelo conteúdo da variável $servidor
* NOTA 2: 
* Alguns provedores de xDSL/CABO bloqueiam totalmente as portas baixas, portanto será necessário outras
* portas para fornecer o serviço de servidor WEB. Ex: $porta = 8080
* NOTA 3: 
* Todo o serviço de configuração de PORTAS/ROTAS, necessárias para servir as páginas WEB, são de TOTAL
* responsabilidade do CLIENTE. A SistemasProfissionais apenas fornecer o SOFTWARE e não faz nenhuma configuração
* nas instalações do Cliente
*/ -->
<script runat="server">
    public String servidor = "localhost";
    public String porta = "80";
    public String aplicacao = "corweb";
</script>