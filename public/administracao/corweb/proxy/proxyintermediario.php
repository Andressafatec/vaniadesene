<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Resultado - Exemplo</title>
</head>
<body>
<?php
    $c = $_GET['cidade'];
    $d = $_GET['dormitorio'];
    $tpo = $_GET['tipo'];
    $gar = $_GET['garagens'];
    $ctr = $_GET['ctr'];
    $ste = $_GET['suites'];
	$v = $_GET['faixavalor'];
	$reg = $_GET['regiao'];
	$pagina = $_GET['pagina'];
	$offset = $_GET['offset'];
	    
    $url = "pesquisar.csp";
	$parameters="cidade=$c&ctr=$ctr&dormitorios=$d&garagens=$gar&suites=$ste&tipo=$tpo&valormaximo=999999999999&valorminimo=0&offset=$offset&pagina=$pagina";
	$xml=myProxy("$url","$parameters");
	
	if($xml ===  FALSE){//se der erro ao carregar o XML
		exit ("<script type=\"text/javascript\">alert(\"Erro ao carregar os dados dos imóveis.\");</script>\n");
	} else { 
		echo "<pre>resultado-exemplo2.php?ctr=1&tipo=AP&cidade=1&regiao=T&faixavalor=&dormitorios=0&suites=0&garagens=0&valorminimo=0&valormaximo=99999999999999999&offset=10&pagina=1</pre>";
		foreach ($xml as $i) {
			$referencia = $i->referencia;
			if ($referencia == "") continue;
			$cidade = $i->cidade;
			$regiao = $i->regiao;
			$tipoimovel = $i->tipoimovel;
			$valor = number_format($i->valor, 2, ',', '.');
			$condominio = number_format($i->condominio->valor, 2, ',', '.');
			$dormitorio = $i->dormitorio->campo->valor;
			$suite = $i->suite->campo->valor;
			$garagem = $i->garagem->campo->valor;
			echo "<pre>$referencia\r\n\t$cidade\r\n\t$regiao\r\n\t$tipoimovel\r\n\t$valor\r\n\t$condominio\r\n</pre>";
			/*foreach ($i as $campos) {
				$camposA = $campos->campo->descricao;
				$camposV = $campos->campo->valor;
				echo "<pre>\t\t$camposV\r\n\t\t$camposA</pre>";
			}*/
		}
	}
function myProxy($url,$parameters) {
	$servidor="online.focoimoveis.com.br";
	$porta="8090";
	//Prepara Header
	$requisicao = "POST /corweb/".$url." HTTP/1.0\r\n";
	$requisicao .= "Host: ".$servidor.":".$porta."\r\n";
	$requisicao .= "User-Agent: ".$_SERVER['HTTP_USER_AGENT']."\r\n";
	$requisicao .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$requisicao .= "Content-Length: ".strlen($parameters)."\r\n";
	$requisicao .= "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n";
	$requisicao .= "Accept-Language: pt-br,pt;q=0.8,en-us;q=0.5,en;q=0.3\r\n";
	$requisicao .= "Accept-Encoding: gzip,deflate\r\n";
	$requisicao .= "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\r\n";
	$requisicao .= "Keep-Alive: 300\r\n";
	$requisicao .= "Connection: keep-alive\r\n";
	$requisicao .= "Cache-Control: max-age=0\r\n";
	if (isset($_COOKIE['CSPSESSIONID'])) {
		$requisicao .= "Cookie: CSPSESSIONID=".$_COOKIE['CSPSESSIONID']."\r\n";
	}
	$requisicao .= "\r\n".$parameters;
	//Abrir Servidor
	$proxy_fp = fsockopen($servidor, $porta);
	if ($proxy_fp) {
		fputs($proxy_fp, $requisicao);
		$buffer = "";
		$xml="";
		while (!feof($proxy_fp)) {
			$buffer .= fread($proxy_fp, 4096);
		}
		fclose($proxy_fp);
		$campos = split("\r\n",$buffer);
		$html = false;
		foreach($campos as $valor) {
			if (!$html && !$valor) {
				$html = true;
			} else if (!$html) {
				//Set-Cookie: CSPSESSIONID=
				if (substr($valor,0,25) == "Set-Cookie: CSPSESSIONID=") {
					header($valor);
				}
			} else {
				$xml=$xml.trim($valor);
			}
		}
	}
	return simplexml_load_string($xml);
}
?>
</body>
</html>