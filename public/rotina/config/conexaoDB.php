<?php
error_reporting(E_ALL ^ E_NOTICE);
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
		$port = (isset($config['db']['port']))?$config['db']['port']:null;
		
		return new PDO("mysql:host={$host};dbname={$dbname};port={$port}",$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		
		
	}
	catch (PDOExeption $e){
			echo $e->getMessage() . "<br>";
			echo $e->getTraceAsString() . "<br>";

	}
}

?>