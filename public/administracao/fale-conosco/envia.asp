<%
Session.LCID = 1046


nome=replace(request.Form("nome"), "'","")
'response.write experiencia & "<br>"

email=replace(request.Form("email"), "'","")
'response.write cpf & "<br>"

telefone=replace(request.Form("tel"), "'","")
'response.write endereco & "<br>"

msg=replace(request.Form("mensagem"), "'","")
'response.write endereco & "<br>"

Set Mailer = Server.CreateObject("Persits.MailSender")
Mailer.Host = "smtp2.locaweb.com.br"
Mailer.FromName = vNome
Mailer.From = "michelle@vaniadesene.com.br"
Mailer.MailFrom = "lumina@vaniadesene.com.br"
Mailer.AddReplyTo vEmail
Mailer.AddAddress "michelle@vaniadesene.com.br"
Mailer.Subject = "Fale Conosco - Vania de Sene"
Mailer.IsHTML = True
Mailer.Body = "<font-family:Arial><br><br>Contato gerado atrav�s do site <a href=http://www.vaniadesene.com.br><strong>Vania de Sene</strong></a>.<br><br>"
Mailer.Body = Mailer.body & "<strong>Dados do usu�rio</strong><br><br>"
Mailer.Body = Mailer.body & "<strong>Nome:</strong> "& nome & "<br>"
Mailer.Body = Mailer.body & "<strong>E-mail:</strong> "& email & "<br>"
Mailer.Body = Mailer.body & "<strong>Telefone:</strong> "& telefone & "<br>"
Mailer.Body = Mailer.body & "<strong>Mensagem:</strong> "& msg & "<br>"
Mailer.Body = Mailer.body & "</font>"
If Mailer.Send Then

%>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
	<title>Fale Conosco | Vania de Sene - Neg&oacute;cios Imobili&aacute;rios</title>
	<base href="http://www.vaniadesene.com.br/" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Language" content="pt-br" />
	<meta name="robots" content="index,follow" />

	<meta name="author" content="Lumina Comunica��o � Desenvolvimento e cria��o digital." />
	<meta name="keywords" content="Vania de Sene, neg�cios imobili�rios, venda, im�veis, imobili�ria, financiamento, apartamento, lan�amentos, revenda, casa, terreno, s�o jos� dos campos, sjc, sp, s�o paulo, prontos para morar, reserva, sala comercial, usados, novos" />
	<meta name="description" content="" />
	<meta property="og:url" content="http://www.vaniadesene.com.br/" />
	<meta property="og:site_name" content="Vania de Sene - Neg�cios Imobili�rios" />
	<meta property="og:title" content="Vania de Sene - Neg�cios Imobili�rios" />
	<meta property="og:image" content="http://www.vaniadesene.com.br.com.br/imgs/master/logo.jpg" />
	<meta property="og:description" content="" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../css/interna.css"/>
	<link rel="shortcut icon" type="image/png" href="../favicon.ico" />
    
	<script language="javascript" type="text/javascript" src="../js/funcoes.js"></script>
    
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

  <div class="topoInterna">
		<div class="areaTopo">
			<div class="rightTopo">
				<!--img src="../imgs/geral/midias/twitter.png" alt="Twitter" title="Twitter" class="icones-midias" /-->
				<a href="http://www.facebook.com/vaniadeseneimoveis" target="_blank"><img src="../imgs/geral/midias/facebook.png" alt="Facebook" title="Facebook" class="icones-midias" /></a>
				<br class="clear" />
				<img src="../imgs/geral/solicita-ligacao.jpg" alt="Solicite uma liga��o!" title="Solicite uma liga��o!" class="box-tel" />
				<img src="../imgs/geral/tel-unidades.jpg" alt="Telefones Unidades Vania de Sene" title="Telefones Unidades Vania de Sene" class="box-tel" />
				<br class="clear" />
				<ul class="botoes-midias">
					<li class="facebook"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fvaniadeseneimoveis&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=202497919817168" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></li>
					<!--li class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://twitter.com/vaniadesene" data-via="vaniadesene">Tweet</a></li-->
					<li class="googlePlus"><g:plusone size="medium"></g:plusone></li>
				</ul>
			</div>
			<img id="logo" src="../imgs/geral/logo.png" alt="Vania de Sene - Neg�cios Imobili�rios" title="Vania de Sene - Neg�cios Imobili�rios" />
			<ul class="menu">
				<li><a href="http://www.vaniadesene.com.br/">Inicial</a></li>
				<li><a href="../quem-somos">Quem Somos</a></li>
				<li><a href="../unidades">Nossas Unidades</a></li>
				<li><a href="../seja-nosso-corretor">Seja Nosso Corretor</a></li>
				<li><a href="../anuncie-seu-imovel">Anuncie Seu Im�vel</a></li>
				<li><a href="../fale-conosco">Fale Conosco</a></li>
			</ul>
		</div>
	</div>
	<div class="bgFixed">
	<div class="conteudoInterna">
		<div class="mioloInterna">
			<h1>Fale Conosco</h1>
            <p><strong>Mensagem enviada com sucesso!</strong></p>
			<p>Obrigado por entrar em contato.<br />
			Em breve sua mensagem ser� respondida.</p>
		</div>

	<div class="rodape">
  <div class="areaRodape">
		<img src="../imgs/geral/base/logo.png" class="logo" alt="Vania de Sene - Neg�cios Imobili�rios" title="Vania de Sene - Neg�cios Imobili�rios" />
		<div class="unidade">
			<img src="../imgs/geral/base/unidade-satelite.png" class="foto" alt="Unidade Sat�lite" title="Unidade Sat�lite" />
			<span class="info"><strong>UNIDADE I</strong><br />
			Av. Andr�meda, 2320 - Jardim Sat�lite<br />
			S�o Jos� dos Campos - SP<br />
			Tel.: (12) 3935.8000</span>
		<br class="clear" />
		</div>
		<div class="unidade">
			<img src="../imgs/geral/base/unidade-urbanova.png" class="foto" alt="Unidade Urbanova" title="Unidade Urbanova" />
			<span class="info"><strong>UNIDADE II</strong><br />
			Av. Lineu de Moura, 1920 - Urbanova<br />
			S�o Jos� dos Campos - SP<br />
			Tel.: (12) 3949.6000</span>
		<br class="clear" />
		</div>
	<br class="clear" />
	<div class="direitos">� 2012 Vania de Sene Neg�cios Imobili�rios - Todos os Direitos Reservados | CRECI: J-19068 | <a href="http://www.luminabrasil.com.br" target="_blank">Desenvolvimento Web: Lumina Comunica��o</a></div>
	</div>
</div>

	</div>
	</div>
    <!-- bg fixed -->
</div>

</body>
</html>
<%
Else
Response.Write "Erro " & Mailer.Response
End If

Set Mailer = Nothing
%>