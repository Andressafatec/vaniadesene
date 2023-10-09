<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
<head>
		<title>Administração - Vania de Sene</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<meta name="language" content="pt-br" />
		<link href="../images/ico/mak.ico" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.9.custom.css" />
        <link rel="stylesheet" type="text/css" href="css/uniform.default.css" />

<script type="text/javascript" src="js/validation.js"></script>
<%
vMsg=session("msgErro")	  
session("msgErro") = empty
%>
      
</head>

<body class="login">

<!-- container  -->
<div id="container">
<img src="images/logo.png" alt="" width="300" height="99" id="logo" />
	<div id="loginBox">
		<form id="UserLoginForm" method="post" action="validation.asp" accept-charset="utf-8" onSubmit="return UserLogin()">
			<div><strong><%=vMsg%></strong></div>
			<div class="input text required"><label for="UserUsername">Usuário:</label><input name="username" type="text" maxlength="200" id="username" /></div>
			<div class="input password required"><label for="UserPassword">Senha:</label><input type="password" name="senha" id="password" /></div>
			<div class="submit"><input type="submit" value="Entrar" /></div>
		</form>
	</div>		

	<!-- footer -->
	<div id="footer">
    Powered by <a href="http://www.luminabrasil.com.br" title="Lumina Comunicação" rel="external">LuminaComunicação</a>
    </div>
	<!-- /footer -->
		
	<!-- scripts -->
	<script type="text/javascript" src="js/jquery-1.5.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.9.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/functions_admin.js"></script>
	<!-- /scripts -->

</div>
<!-- /container -->
    
</body>
</html>