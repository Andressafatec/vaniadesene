<%
Session.LCID = 1046

'vData= now()

Set up1 = Server.CreateObject("SoftArtisans.FileUp")
up1.Path = Server.MapPath("../curriculos")
up1.Save

'recupera nome do arquivo
sImagem=up1.Form("arquivo")
'response.write sImagem & "<br>"

experiencia=replace(up1.Form("exp_venda"), "'","")
'response.write experiencia & "<br>"

area_atuacao=replace(up1.Form("area_atuacao"), "'","")
'response.write area_atuacao & "<br>"

nome=replace(up1.Form("nome"), "'","")
'response.write Nome & "<br>"

profissao=replace(up1.Form("profissao"), "'","")
'response.write profissao & "<br>"

cpf=replace(up1.Form("cpf"), "'","")
'response.write cpf & "<br>"

dt_nascimento=replace(up1.Form("dt_nascimento"), "'","")
'response.write dt_nascimento & "<br>"

sexo=replace(up1.Form("sexo"), "'","")
'response.write sexo & "<br>"

estado_civil=replace(up1.Form("estado_civil"), "'","")
'response.write estado_civil & "<br>"

n_filho=replace(up1.Form("n_filho"), "'","")
'response.write n_filho & "<br>"

endereco=replace(up1.Form("endereco"), "'","")
'response.write endereco & "<br>"

bairro=replace(up1.Form("bairro"), "'","")
'response.write bairro & "<br>"

cidade=replace(up1.Form("cidade"), "'","")
'response.write cidade & "<br>"

estado=replace(up1.Form("estado"), "'","")
'response.write estado & "<br>"

cep=replace(up1.Form("cep"), "'","")
'response.write cep & "<br>"

email=replace(up1.Form("email"), "'","")
'response.write Email & "<br>"

tel_fixo=replace(up1.Form("tel_fixo"), "'","")
'response.write tel_fixo & "<br>"

tel_celular=replace(up1.Form("tel_celular"), "'","")
'response.write tel_celular & "<br>"

form_academica=replace(up1.Form("form_academica"), "'","")
'response.write form_academica & "<br>"

instituicao=replace(up1.Form("instituicao"), "'","")
'response.write instituicao & "<br>"

curso=replace(up1.Form("curso"), "'","")
'response.write curso & "<br>"

ano_conclusao=replace(up1.Form("ano_conclusao"), "'","")
'response.write ano_conclusao & "<br>"

creci=replace(up1.Form("creci"), "'","")
'response.write creci & "<br>"

n_creci=replace(up1.Form("n_creci"), "'","")
'response.write n_creci & "<br>"

automovel=replace(up1.Form("automovel"), "'","")
'response.write automovel & "<br>"

imagem=mid(sImagem,35)
'response.write imagem & "<br>"

Arquivo="curriculos/" & Imagem
'response.write Arquivo & "<br>"

Set Mailer = Server.CreateObject("Persits.MailSender")
Mailer.Host = "smtp2.locaweb.com.br"
Mailer.FromName = vNome
Mailer.From = "michelle@vaniadesene.com.br"
Mailer.MailFrom = "michelle@vaniadesene.com.br"
Mailer.AddReplyTo vEmail
Mailer.AddAddress "michelle@vaniadesene.com.br"
Mailer.Subject = "Seja Nosso Corretor - Vania de Sene"
Mailer.IsHTML = True
Mailer.Body = "<font-family:Arial><a href=http://www.vaniadesene.com.br><img src=http://www.vanidesene.com.br/images/topo.jpg border=0></a><br><br><br>Contato gerado atrav�s do site <a href=http://www.vaniadesene.com.br><strong>Vania de Sene</strong></a>.<br><br>"
Mailer.Body = Mailer.body & "<br><strong>Possui experi�ncia em vendas:</strong> "& experiencia &" <br><br>"
Mailer.Body = Mailer.body & "<strong>�rea de atua��o pretendida:</strong> "& area_atuacao &"<br><br>"
Mailer.Body = Mailer.body & "<strong>Dados pessoais</strong><br><br>"
Mailer.Body = Mailer.body & "<strong>Nome:</strong> "& nome & "<br>"
Mailer.Body = Mailer.body & "<strong>Profiss�o:</strong> "& profissao & "<br>"
Mailer.Body = Mailer.body & "<strong>CPF:</strong> "& cpf & "<br>"
Mailer.Body = Mailer.body & "<strong>Data de nascimento:</strong> "& dt_nascimento & "<br>"
Mailer.Body = Mailer.body & "<strong>Sexo:</strong> "& sexo & "<br>"
Mailer.Body = Mailer.body & "<strong>Profiss�o:</strong> "& profissao & "<br>"
Mailer.Body = Mailer.body & "<strong>Estado Civil:</strong> "& estado_civil & "<br>"
Mailer.Body = Mailer.body & "<strong>N�mero de filhos:</strong> "& n_filho & "<br><br>"
Mailer.Body = Mailer.body & "<strong>Contato</strong><br><br>"
Mailer.Body = Mailer.body & "<strong>Endere�o:</strong> "& endereco & "<br>"
Mailer.Body = Mailer.body & "<strong>Bairro:</strong> "& bairro & "<br>"
Mailer.Body = Mailer.body & "<strong>Cidade:</strong> "& cidade & "<br>"
Mailer.Body = Mailer.body & "<strong>UF:</strong> "& estado & "<br>"
Mailer.Body = Mailer.body & "<strong>CEP:</strong> "& cep & "<br>"
Mailer.Body = Mailer.body & "<strong>E-mail:</strong> "& email & "<br>"
Mailer.Body = Mailer.body & "<strong>Telefone:</strong> "& tel_fixo & "<br>"
Mailer.Body = Mailer.body & "<strong>Telefone Celular:</strong> "& tel_celular & "<br><br>"
Mailer.Body = Mailer.body & "<strong>Escolaridade</strong><br><br>"
Mailer.Body = Mailer.body & "<strong>Forma��o Acad�mica:</strong> "& form_academica & "<br>"
Mailer.Body = Mailer.body & "<strong>Institui��o:</strong> "& instituicao & "<br>"
Mailer.Body = Mailer.body & "<strong>Curso:</strong> "& curso & "<br>"
Mailer.Body = Mailer.body & "<strong>Ano conclus�o:</strong> "& ano_conclusao & "<br><br>"
Mailer.Body = Mailer.body & "<strong>Informa��es adicionais</strong><br><br>"
Mailer.Body = Mailer.body & "<strong>J� possui CRECI?</strong> "& creci & "<br>"
Mailer.Body = Mailer.body & "<strong>Registro do CRECI:</strong> "& n_creci & "<br>"
Mailer.Body = Mailer.body & "<strong>Possui autom�vel?</strong> "& automovel & "<br><br>"
Mailer.Body = Mailer.body & "<strong>Visualizar curr�culo:</strong> <a href=http://www.vaniadesene.com.br/"&Arquivo&">"& imagem &"</a>" & "<br>"
Mailer.Body = Mailer.body & "</font>" 
'Mailer.Body = "Nome: " & nome & "<br>" & "E-mail: " & email & "<br>" & "Telefone: " & tel_residencial & "<br>" & "Curr�culo: <a href=http://www.vaniadesene.com.br/"&Arquivo&">"& imagem &"</a>" & "<br>" & "Descri��o: " & Descricao
If Mailer.Send Then

Set up1 = Nothing
%>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
	<title>Seja Nosso Corretor | Vania de Sene - Neg&oacute;cios Imobili&aacute;rios</title>
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
				<li><a href="quem-somos">Quem Somos</a></li>
				<li><a href="unidades">Nossas Unidades</a></li>
				<li><a href="seja-nosso-corretor">Seja Nosso Corretor</a></li>
				<li><a href="anuncie-seu-imovel">Anuncie Seu Im�vel</a></li>
				<li><a href="fale-conosco">Fale Conosco</a></li>
			</ul>
		</div>
	</div>
	<div class="bgFixed">
	<div class="conteudoInterna">
		<div class="mioloInterna">
			<h1>Seja Nosso Corretor</h1>
			<p>Informa��es enviadas com sucesso.<br />
			Agradecemos o interesse em trabalhar conosco.</p>
            <p><strong>Equipe Vania de Sene</strong></p>
		</div>
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