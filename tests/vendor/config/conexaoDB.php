<?php
function conexaoDB(){

	try{
		$config = include "config.php"; 
		if(!isset($config['db'])){
			throw new InvalidArgumentExeption ("Configuração do banco de dados não existe");
		};	
		$host = (isset($config['db']['host']))?$config['db']['host']:null;
		$dbname = (isset($config['db']['db_name']))?$config['db']['db_name']:null;
		$user = (isset($config['db']['user']))?$config['db']['user']:null;
		$password = (isset($config['db']['password']))?$config['db']['password']:null;
		
		return new PDO("mysql:host={$host};dbname={$dbname};port=3306",$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		
		
	}
	catch (PDOExeption $e){
		echo $e->getMessage() . "<br>";
		echo $e->getTraceAsString() . "<br>";

	}
}

/*SANDBOX*/

$PAGSEGURO_URL='https://ws.sandbox.pagseguro.uol.com.br/v2/sessions';
$PAGSEGURO_URL_SESSION = 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';
$PAGSEGURO_URL_TRANSACTIONS = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions';
$PAGSEGURO_URL_NOTIFICACAO = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/';
$PAGSEGURO_URL_CHECKOUT = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';
$PAGSEGURO_URL_PAYMENT = 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html';
$PAGSEGURO_EMAIL = 'rafaw940@yahoo.com.br';
$PAGSEGURO_TOKEN = 'B1EAD027ABAB940114634FB77D32E501';//'3BD06286D6304CB9A10E257F60449B93';
$PAGSEGURO_NOTIFICATION = '';


/*PRODUCAO

$PAGSEGURO_URL= 'https://ws.pagseguro.uol.com.br/v2/authorizations/request/';
$PAGSEGURO_URL_SESSION = 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';
$PAGSEGURO_URL_TRANSACTIONS = 'https://ws.pagseguro.uol.com.br/v2/transactions';
$PAGSEGURO_URL_NOTIFICACAO = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/';
$PAGSEGURO_URL_CHECKOUT = 'https://ws.pagseguro.uol.com.br/v2/checkout';
$PAGSEGURO_URL_PAYMENT = 'https://pagseguro.uol.com.br/v2/checkout/payment.html';
$PAGSEGURO_EMAIL = 'fimdetarde.eventos@bol.com.br';
$PAGSEGURO_TOKEN = '015317B77A18489CB790A86C1CD6A452';
$PAGSEGURO_ID = 'caminhadaaparecida';

*/

?>