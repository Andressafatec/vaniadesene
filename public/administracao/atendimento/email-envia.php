<link rel="stylesheet" type="text/css" href="../css/popup.css"/>
<?php
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("../inc/class.phpmailer.php");
 
$nome = utf8_decode($_POST['nome']);
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$referencia = $_POST['referencia'];
$mensagem = utf8_decode($_POST['msg']);

$conteudo =  '<b>Nome: </b>' . $nome . '<br />';
$conteudo .= "<b>E-mail: </b>" . $email . '<br />';
$conteudo .= "<b>Telefone: </b>" . $telefone . '<br />';
$conteudo .= "<b>Refer�ncia do Im�vel: </b>" . $referencia . '<br />';
$conteudo .= "<b>Mensagem: </b>" . $mensagem;
 
// Inicia a classe PHPMailer
$mail = new PHPMailer();

// Define os dados do servidor e tipo de conex�o
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem ser� SMTP
$mail->Host = "smtp.vaniadesene.com.br"; // Endere�o do servidor SMTP (caso queira utilizar a autentica��o, utilize o host smtp.seudom�nio.com.br)
$mail->SMTPAuth = true; // Usar autentica��o SMTP (obrigat�rio para smtp.seudom�nio.com.br)
$mail->Username = 'auth@vaniadesene.com.br'; // Usu�rio do servidor SMTP (endere�o de email)
$mail->Password = 'authique2'; // Senha do servidor SMTP (senha do email usado)
 
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->SetFrom($email, $nome);
$mail->Sender = "auth@vaniadesene.com.br"; // Seu e-mail
$mail->FromName = $nome; // Seu nome
 
// Define os destinat�rio(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress("esdras@luminabrasil.com.br", "Vania de Sene");
$mail->AddAddress("michelle@vaniadesene.com.br", "Vania de Sene");
$mail->AddAddress("deborah@vaniadesene.com.br", "Vania de Sene");

// Define os dados t�cnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail ser� enviado como HTML
$mail->CharSet = 'uft-8'; // Charset da mensagem (opcional)
 
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Informa��es de Im�vel - Site Vania de Sene"; // Assunto da mensagem
$mail->MsgHTML($conteudo);

// Envia o e-mail
$enviado = $mail->Send();
 
// Limpa os destinat�rios e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

?>


			<?php 
			if ($enviado) { ?>
			<p><strong>Mensagem enviada com sucesso!</strong></p>
			<p>Obrigado por entrar em contato conosco.<br />
			Em breve retornaremos sua mensagem.</p>
			<?php
			} else {
			echo "N�o foi poss�vel enviar o e-mail, por favor tente novamente.";
			}
			?>