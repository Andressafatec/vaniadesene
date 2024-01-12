<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/popup.css"/>

<title>Contato</title>

<script type="text/javascript">
	function InfoCorretor(){
		//validar nome
		d = document.info_corretor;
		if (d.nome.value == ""){
			alert("Por favor, preencha o campo Nome.");
			d.nome.focus();
			return false;
		}
		
		//validar email
		if (d.email.value == ""){
			alert("Por favor, preencha o campo E-mail.");
			d.email.focus();
			return false;
		}
		//Checando se o endereÃ§o de e-mail Ã© vÃ¡lido
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.info_corretor.email.value))){
		alert("O campo E-mail deve conter um endereço eletônico válido!");
		document.info_corretor.email.focus();
		return false;
		}
		
		if (d.nome.value == ""){
			alert("Por favor, preencha o campo Nome.");
			d.nome.focus();
			return false;
		}

		return true;
		}
		
</script>

</head>

<body>

<%
ref_imovel = request.QueryString("d")
%>
<h2>Solicitar Informações por E-mail</h2>
<p>Preencha os campos abaixo com seus dados:</p>

<form id="info_corretor" name="info_corretor" action="email-envia.php" method="post" onsubmit="return InfoCorretor()">
		<label for="nome">Nome</label>
		<input type="nome" id="nome" name="nome" class="txt">
		<label for="email">E-mail</label>
		<input type="email" id="email" name="email" class="txt">
		<label for="telefone">Telefone</label>
		<input type="telefone" id="telefone" name="telefone" class="txt">
		<label for="msg">Mensagem</label>
		<textarea id="msg" name="msg" class="txtarea"></textarea>
	<input type="hidden" value="<%=ref_imovel%>" name="referencia" />

    <input type="submit" alt="Enviar" value="Enviar" title="Enviar" />
</form>

</body>
</html>
