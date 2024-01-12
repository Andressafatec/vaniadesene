<!--#include file="admin/conn/connection.asp"-->

<%
'ESTABELECENDO CONEXãO COM O BANCO DE DADOS----------------------------------------------------------------------
call abreBanco()
%>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
	<title>Vania de Sene - Negócios Imobiliários</title>
	<base href="http://www.vaniadesene.com.br/" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Language" content="pt-br" />
	<meta name="robots" content="index,follow" />

	<meta name="author" content="Lumina Comunicação – Desenvolvimento e criação digital." />
	<meta name="keywords" content="Vania de Sene, negócios imobiliários, venda, imóveis, imobiliária, financiamento, apartamento, lançamentos, revenda, casa, terreno, são josé dos campos, sjc, sp, são paulo, prontos para morar, reserva, sala comercial, usados, novos" />
	<meta name="description" content="" />
	<meta property="og:url" content="http://www.vaniadesene.com.br/" />
	<meta property="og:site_name" content="Vania de Sene - Negócios Imobiliários" />
	<meta property="og:title" content="Vania de Sene - Negócios Imobiliários" />
	<meta property="og:image" content="http://www.vaniadesene.com.br.com.br/imgs/master/logo.jpg" />
	<meta property="og:description" content="" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/popup.css"/>
	<link rel="shortcut icon" type="image/png" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="library/plugins/jquery/fancybox/fancybox.css">
	<link rel="stylesheet" type="text/css" media="all" href="library/plugins/jquery/fancybox/jquery.fancybox.css">
    
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="library/plugins/jquery/fancybox/jquery.fancybox.js?v=2.0.6"></script>
	<script language="javascript" type="text/javascript" src="js/funcoes.js"></script>
	<script language="javascript" type="text/javascript" src="js/geral.js"></script>
	<script type="text/javascript" src="library/plugins/jquery/nivo/jquery.slider.js"></script>
    
	<script type="text/javascript" language="javascript" src="library/plugins/jquery/lytebox/lytebox.js"></script>
	<link rel="stylesheet" href="library/plugins/jquery/lytebox/lytebox.css" type="text/css" media="screen" />
    
    <style type="text/css" media="all"> @import "library/plugins/jquery/nivo/slider.css"; </style>
	<link rel="stylesheet" type="text/css" media="screen" href="library/plugins/jquery/nivo/slider.css" />
    
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-35720712-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>

</head>

<body>

<div id="tudo">

	<div class="topo">
		<div class="areaTopo">
			<div class="rightTopo">
				<a href="http://www.facebook.com/vaniadeseneimoveis" target="_blank"><img src="imgs/geral/midias/facebook.png" alt="Facebook" title="Facebook" class="icones-midias" /></a>
				<!--img src="imgs/geral/midias/twitter.png" alt="Twitter" title="Twitter" class="icones-midias" /-->
				<br class="clear" />
				<img src="imgs/geral/solicita-ligacao.jpg" alt="Solicite uma ligação!" title="Solicite uma ligação!" class="box-tel" />
				<img src="imgs/geral/tel-unidades.jpg" alt="Telefones Unidades Vania de Sene" title="Telefones Unidades Vania de Sene" class="box-tel" />
				<br class="clear" />
				<ul class="botoes-midias">
					<li class="facebook"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fvaniadeseneimoveis&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=202497919817168" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></li>
					<!--li class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://twitter.com/vaniadesene" data-via="vaniadesene">Tweet</a></li-->
					<li class="googlePlus"><g:plusone size="medium"></g:plusone></li>
				</ul>
			</div>
			<img id="logo" src="imgs/geral/logo.png" alt="Vania de Sene - Negócios Imobiliários" title="Vania de Sene - Negócios Imobiliários" />
			<ul class="menu">
				<li><a href="http://www.vaniadesene.com.br/">Inicial</a></li>
				<li><a href="quem-somos/">Quem Somos</a></li>
				<li><a href="unidades/">Nossas Unidades</a></li>
				<li><a href="seja-nosso-corretor/">Seja Nosso Corretor</a></li>
				<li><a href="anuncie-seu-imovel/">Anuncie Seu Imóvel</a></li>
				<li><a href="fale-conosco/">Fale Conosco</a></li>
			</ul>
		</div>
	</div>
    
	<div class="fundo-banner">
		<div>
			<div class="servicos">
				<h3>O que você procura?</h3>
				<div class="box-servico">
					<span class="locacao"><a href="locacao.html">Locação</a></span>
				</div>
				<div class="box-servico">
					<span class="venda"><a href="venda.html">Venda</a></span>
				</div>
				<div class="box-servico">
					<span class="adm"><a href="administracao.html">Administração</a></span>
				</div>
			</div>
			<div class="banner">
            <div id="slider">
				<%
				sql_banner="select * from banners order by RAND()"
				set rsBanner=conn.execute(sql_banner)

				if rsBanner.eof then
				%>
				<img src="" alt="" title="" />
				<%
				else
				while not rsBanner.eof
				%>
				<img src="imgs/banner/<%=rsBanner("arquivo")%>" alt="<%=rsBanner("descricao")%>"  />
				<%
				rsBanner.movenext
				wend
				rsBanner.close
				set rsBanner=nothing
				end if
				%>
			</div>
				
			</div>
		<br class="clear" />
		</div>
	</div>
    
	<div class="conteudo" style="background-position:bottom; height:auto !important;">
		<div class="imoveis-destaque">
			<%
			sql_imoveis="select imoveis.*, categorias.*, finalidades.* FROM imoveis INNER JOIN categorias ON imoveis.id_categoria = categorias.id_categoria INNER JOIN finalidades ON imoveis.id_finalidade = finalidades.id_finalidade where finalidades.id_finalidade=1 order by imoveis.id_imovel desc"
			set rsImovel=conn.execute(sql_imoveis)
			
			if rsImovel.eof then
			%>
			<% else	%>
			<h2>Destaque | Imóveis para Venda</h2>
			<% while not rsImovel.eof %>
			<div class="box-imovel">
				<%
				'SELECIONA AS FOTOS DO IMÓVEL PARA EXIBIÇÃO EM DESTAQUE
				sqlFoto="select * from galeria_fotos where id_imovel=" & rsImovel("id_imovel") &""
				set rsFoto=conn.execute(sqlFoto)
				%>
				<%
				if rsFoto.eof then
				%>
				<img src="imgs/imoveis/sem-imagem.jpg" width="170" height="150" alt="" title="" />
				<%else%>
				<img src="imgs/imoveis/<%=rsFoto("arquivo")%>" width="170" height="150" alt="" title="" />
				<%end if%>
				<div>
					<span class="bairro"><%=rsImovel("bairro")%></span>
					<span class="tipoCategoria"><%=rsImovel("nome_categoria")%> | <%=rsImovel("nome_finalidade")%></span>
					<span class="descricao"><%=rsImovel("descricao")%></span>
					<span class="preco"><%=formatcurrency(rsImovel("preco"))%></span>
					<span class="faleCorretor">Fale com corretor online:</span>
				</div>
				<ul class="botoesCorretor">
					<li><a onClick="window.open('https://www.chatcomercial.com.br/livehelp/www/visitor/index.php?COMPANY_ID=17860&SITE_ID=21099&ssl=1&ahrefmode=true','mywindow','width=500,height=500')"><img src="imgs/home/btChat.png" alt="Atendimento Online" /></a></li>
					<li><a href="http://www.vaniadesene.com.br/atendimento/email.asp?d=<%=rsImovel("referencia")%>" class="lytebox" 
   data-lyte-options="width:400 height:455 scrollbars:yes"><img src="imgs/home/btEmail.png" alt="Solicite informações" /></a></li>
				</ul>
			</div>
			<%
			rsImovel.movenext
			wend
			rsImovel.close
			set rsImovel=nothing
			rsFoto.close
			set rsFoto=nothing
			end if
				
			%>
            
			<br class="clear" />

			<%
			sql_imoveis_locacao="select imoveis.*, categorias.*, finalidades.* FROM imoveis INNER JOIN categorias ON imoveis.id_categoria = categorias.id_categoria INNER JOIN finalidades ON imoveis.id_finalidade = finalidades.id_finalidade where finalidades.id_finalidade=2 order by imoveis.id_imovel desc"
			set rsImovelLoc=conn.execute(sql_imoveis_locacao)
			
			if rsImovelLoc.eof then
			%>
			<% else %>
			<h2>Destaque | Imóveis para Locação</h2>
			<% while not rsImovelLoc.eof %>
			<div class="box-imovel">
				<%
				'SELECIONA AS FOTOS DO IMÓVEL PARA EXIBIÇÃO EM DESTAQUE
				sqlFoto="select * from galeria_fotos where id_imovel=" & rsImovelLoc("id_imovel") &""
				set rsFoto=conn.execute(sqlFoto)
				%>
				<%
				if rsFoto.eof then
				%>
				<img src="imgs/imoveis/sem-imagem.jpg" width="170" height="150" alt="" title="" />
				<%else%>
				<img src="imgs/imoveis/<%=rsFoto("arquivo")%>" width="170" height="150" alt="" title="" />
				<%end if%>
				<div>
					<span class="bairro"><%=rsImovelLoc("bairro")%></span>
					<span class="tipoCategoria"><%=rsImovelLoc("nome_categoria")%> | <%=rsImovelLoc("nome_finalidade")%></span>
					<span class="descricao"><%=rsImovelLoc("descricao")%></span>
					<span class="preco"><%=formatcurrency(rsImovelLoc("preco"))%></span>
					<span class="faleCorretor">Fale com corretor online:</span>
				</div>
				<ul class="botoesCorretor">
					<li><a onClick="window.open('https://www.chatcomercial.com.br/livehelp/www/visitor/index.php?COMPANY_ID=17860&SITE_ID=21099&ssl=1&ahrefmode=true','mywindow','width=500,height=500')"><img src="imgs/home/btChat.png" alt="Atendimento Online" /></a></li>
					<li><a href="http://www.vaniadesene.com.br/atendimento/email.asp?d=<%=rsImovelLoc("referencia")%>" class="lytebox" 
   data-lyte-options="width:400 height:455 scrollbars:yes"><img src="imgs/home/btEmail.png" alt="Solicite informações" /></a></li>
				</ul>
			</div>
			<%
			rsImovelLoc.movenext
			wend
			rsImovelLoc.close
			set rsImovel=nothing
			rsFoto.close
			set rsFoto=nothing
			end if
			call fechaBanco()						
			%>
            
			<br class="clear" />
			
		</div>
		<div class="miolo">
			<div class="box-destaque">
				<h1>Sobre Vania de Sene</h1>
				<hr />
				<div id="slideshow">
					<img src="imgs/home/destaque/fachada-satelite.jpg" alt="Unidade Satélite" title="Unidade Satélite" class="active" />
					<img src="imgs/home/destaque/fachada-urbanova.jpg" alt="Unidade Urbanova" title="Unidade Urbanova" />
				</div>
				<p>Sua atuação em venda, locação, lançamentos, imóveis de terceiros e administração de bens é marcada pela inovação e criatividade, sempre antecipando as tendências do mercado imobiliário regional.</p>
				<a href="quem-somos/"><img src="imgs/home/destaque/bt-institucional.jpg" alt="Institucional" title="Institucional" class="btMais" name="btinst" onmouseover="MM_swapImage('btinst','','imgs/home/destaque/bt-institucional_ovr.jpg',1)" onmouseout="MM_swapImgRestore()" /></a>
			</div>
	  <div class="box-destaque">
				<h1>Seja Nosso Corretor</h1>
				<hr />
                <a href="seja-nosso-corretor/"><img src="imgs/home/destaque/seja-corretor.jpg" alt="Seja corretor da Vania de Sene" title="Fachada Unidade Satélite" /></a>
		<p>Faça parte da equipe Vania de Sene. Uma empresa diferenciada e inovadora, comprometida com a ética, o respeito, a transparência, a qualidade e o meio ambiente.<br /><br /></p>
        <a href="seja-nosso-corretor/"><img src="imgs/home/destaque/bt-saiba-mais.jpg" alt="Saiba mais" title="Saiba mais" class="btMais" name="btsaibamais" onmouseover="MM_swapImage('btsaibamais','','imgs/home/destaque/bt-saiba-mais_ovr.jpg',1)" onmouseout="MM_swapImgRestore()" /></a>
		</div>
	  <div class="box-destaque">
				<h1>Anuncie Seu Imóvel</h1>
				<hr />
                <a href="anuncie-seu-imovel/"><img src="imgs/home/destaque/anuncie-imovel.jpg" alt="Anuncie seu imóvel" title="Anuncie seu imóvel" /></a>
		<p>Anuncie com a imobiliária Vania de Sene e conheça as vantagens de ter seu imóvel vendido com exclusividade e visibilidade nos principais veículos de comunicação da região.<br /><br /><br /></p>
        <a href="anuncie-seu-imovel/"><img src="imgs/home/destaque/bt-cadastre-imovel.jpg" alt="Cadastre seu imóvel" title="Cadastre seu imóvel" class="btMais" name="btcadastre" onmouseover="MM_swapImage('btcadastre','','imgs/home/destaque/bt-cadastre-imovel_ovr.jpg',1)" onmouseout="MM_swapImgRestore()" /></a>
		</div>
		</div>
		
		<div class="rodape">
		<div class="areaRodape">
		<img src="imgs/geral/base/logo.png" class="logo" alt="Vania de Sene - Negócios Imobiliários" title="Vania de Sene - Negócios Imobiliários" />
		<div class="unidade">
			<img src="imgs/geral/base/unidade-satelite.png" class="foto" alt="Unidade Satélite" title="Unidade Satélite" />
			<span class="info"><strong>UNIDADE I</strong><br />
			Av. Andrômeda, 2320 - Jardim Satélite<br />
			São José dos Campos - SP<br />
			Tel.: (12) 3935.8000</span>
		<br class="clear" />
		</div>
		<div class="unidade">
			<img src="imgs/geral/base/unidade-urbanova.png" class="foto" alt="Unidade Urbanova" title="Unidade Urbanova" />
			<span class="info"><strong>UNIDADE II</strong><br />
			Av. Lineu de Moura, 1920 - Urbanova<br />
			São José dos Campos - SP<br />
			Tel.: (12) 3949.6000</span>
		<br class="clear" />
		</div>
	<br class="clear" />
	<div class="direitos">© 2012 Vania de Sene Negócios Imobiliários - Todos os Direitos Reservados | CRECI: J-19068 | <a href="http://www.luminabrasil.com.br" target="_blank">Desenvolvimento Web: Lumina Comunicação</a></div>
	</div>
</div>
	</div>

</div>

<!-- hidden inline form -->
<!--div id="inline">
	<h2>Fale com o Corretor</h2>

	<form id="contact" name="contact" action="#" method="post">
		<label for="nome">Nome</label>
		<input type="nome" id="nome" name="nome" class="txt">
		<br>
		<label for="email">E-mail</label>
		<input type="email" id="email" name="email" class="txt">
		<br>
		<label for="telefone">Telefone</label>
		<input type="telefone" id="telefone" name="telefone" class="txt">
		<br>
		<label for="msg">Mensagem</label>
		<textarea id="msg" name="msg" class="txtarea"></textarea>
		
		<button id="send">Enviar</button>
	</form>
</div-->

<!-- basic fancybox setup -->
<!--script type="text/javascript">
	function validateEmail(email) { 
		var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return reg.test(email);
	}

	$(document).ready(function() {
		$(".modalbox").fancybox();
		$("#contact").submit(function() { return false; });

		
		$("#send").on("click", function(){
			var nomeval  = $("#nome").val();
			var emailval  = $("#email").val();
			var msgval    = $("#msg").val();
			var msglen    = msgval.length;
			var mailvalid = validateEmail(emailval);
			
			
			if(nome == false ) {
				$("#email").addClass("error");
			}
			else if(nome > 0){
				$("#nome").removeClass("error");
			}
			if(mailvalid == false) {
				$("#email").addClass("error");
			}
			else if(mailvalid == true){
				$("#email").removeClass("error");
			}
			
			if(msglen < 4) {
				$("#msg").addClass("error");
			}
			else if(msglen >= 4){
				$("#msg").removeClass("error");
			}

			
			if(mailvalid == true && msglen >= 4) {
				// if both validate we attempt to send the e-mail
				// first we hide the submit btn so the user doesnt click twice
				$("#send").replaceWith("<em>sending...</em>");
				
				$.ajax({
					type: 'POST',
					url: 'sendmessage.php',
					data: $("#contact").serialize(),
					success: function(data) {
						if(data == "true") {
							$("#contact").fadeOut("fast", function(){
								$(this).before("<p><strong>Success! Your feedback has been sent, thanks :)</strong></p>");
								setTimeout("$.fancybox.close()", 1000);
							});
						}
					}
				});
			}
		});
	});
</script-->

</body>
</html>