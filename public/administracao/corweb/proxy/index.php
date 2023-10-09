<?php
	require_once("config.php");
	$arquivo = $_REQUEST['url'];
	$proxy_fp = fsockopen($servidor, $porta);
	if ($proxy_fp) {
		$valores = "hj=".date('Y-m-d');
		foreach($_GET as $chave => $valor) {
			if ($chave=="url") continue;
			$valores .= "&".urlencode($chave)."=".urlencode($valor);
		}
		foreach($_POST as $chave => $valor) {
			if ($chave=="url") continue;
			$valores .= "&".urlencode($chave)."=".urlencode($valor);
		}
		$requisicao = "POST /".$aplicacao."/".$arquivo." HTTP/1.0\r\n";
		$requisicao .= "Host: ".$servidor."\r\n";
		$requisicao .= "User-Agent: ".$_SERVER['HTTP_USER_AGENT']."\r\n";
		$requisicao .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$requisicao .= "Content-Length: ".strlen($valores)."\r\n";
		$requisicao .= "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n";
		$requisicao .= "Accept-Language: pt-br,pt;q=0.8,en-us;q=0.5,en;q=0.3\r\n";
		$requisicao .= "Accept-Encoding: gzip,deflate\r\n";
		$requisicao .= "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\r\n";
		$requisicao .= "Keep-Alive: 300\r\n";
		$requisicao .= "Connection: keep-alive\r\n";
		$requisicao .= "Cache-Control: max-age=0\r\n";
		/*************************************************************
		*if (sizeof($_COOKIE)) {
		*	$cookies = array();
		*	foreach($_COOKIE as $chave => $valor) {
		*		$cookies[] = $chave."=".$valor;
		*	}
		*	$requisicao .= "Cookie: ".join("; ",$cookies)."\r\n";
		*}
		**************************************************************/
		if (isset($_COOKIE['CSPSESSIONID'])) {
			$requisicao .= "Cookie: CSPSESSIONID=".$_COOKIE['CSPSESSIONID']."\r\n";
		}
		$requisicao .= "\r\n".$valores;
		/*************************************************************
		*$requisicao .= "\r\n";
		*echo "<pre>$requisicao</pre>";
		*exit(0);
		**************************************************************/
		fputs($proxy_fp, $requisicao);
		$buffer = "";
		while (!feof($proxy_fp)) {
				$buffer .= fread($proxy_fp, 4096);
		}
		fclose($proxy_fp);
		$campos = preg_split("/\r\n/",$buffer);
		$html = false;
		foreach($campos as $valor) {
			if (!$html && !$valor) {
				$html = true;
			} else if (!$html) {
				header($valor);
			} else {
				echo $valor."\r\n";
			}
		}
	}
?>