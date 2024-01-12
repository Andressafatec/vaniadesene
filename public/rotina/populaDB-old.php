<?php
ini_set('error_reporting', E_ALL);

date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL);
set_time_limit(0);

require_once "config/conexaoDB.php";
$conn = conexaoDB();

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$cacheName = 'cache.xml';
$cacheMaxAge = 3600;

if (!file_exists($cacheName) || (time() - filemtime($cacheName)) > $cacheMaxAge) {
    $url = 'https://vaniadesene.sisprof.srv.br/sisprof/corweb/requisicao.csp?empre=2&conta=6&idsessao=3651651321&op=1';
    $contents = file_get_contents($url);
    file_put_contents($cacheName, $contents);
}

$xml = simplexml_load_file($cacheName);

$finalidades = $xml->dadosbasicos->dados->semempresa->finalidades->finalidade;
$arrayFinalidades = [];

foreach ($finalidades as $key => $value) {
    $arrayFinalidades['finalidade_' . $value->id] = $value->nome;
}

$tipos = $xml->dadosbasicos->dados->comempresa->tiposimoveis;
$tiposArray = [];

foreach ($tipos->tipoimovel as $tipo) {
    $id = (string) $tipo->id;
    $nome = (string) $tipo->nome;
    $tiposArray[$id] = $nome;
}

$arrayContrato = array('contrato_1' => 'Venda', 'contrato_2' => 'Locação', 'contrato_3' => 'Empreendimento');
$countItems = count($xml->imoveis->imovel);
$totalporPagina = 10000;
$totaldePagina = ceil($countItems / $totalporPagina);

$inicio = ($totalporPagina * $pagina) - $totalporPagina;

if ($pagina == 1) {
    $sql = "DELETE FROM imoveis";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM caracteristicas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM edificio";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM fotos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM corretores";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

$conn->beginTransaction();

//try {
    $sql_i = "INSERT INTO corretores (";
	$sql_i .= "id_sistemas,";
	$sql_i .= "nome,";
	$sql_i .= "funcao,";
	$sql_i .= "loja,";
	$sql_i .= "telefone,";
	$sql_i .= "creci,";
	$sql_i .= "email,";
	$sql_i .= "created_at,";
	$sql_i .= "updated_at)";
	
	$sql_i .= "VALUES(";
	$sql_i .= ":id_sistemas,";
	$sql_i .= ":nome,";
	$sql_i .= ":funcao,";
	$sql_i .= ":loja,";
	$sql_i .= ":telefone,";
	$sql_i .= ":creci,";
	$sql_i .= ":email,";
	$sql_i .= ":created_at,";
	$sql_i .= ":updated_at)";


    $stmt_corretores = $conn->prepare( $sql_i);

    $sql_i = "INSERT INTO imoveis (";

                $sql_i .= "anuncio,";
                $sql_i .= "titulo,";
                $sql_i .= "tipoanuncio,";
                $sql_i .= "valor,";
                $sql_i .= "bairro,";
                $sql_i .= "cidade,";
                $sql_i .= "uf,";
                $sql_i .= "contrato,";
                $sql_i .= "detalhes,";
                $sql_i .= "empresa,";
                $sql_i .= "finalidade,";
                $sql_i .= "grupo,";
                $sql_i .= "referencia,";
                $sql_i .= "referencia_original,";
                $sql_i .= "regiao,";
                $sql_i .= "tipo,";
                $sql_i .= "promocao,";
                $sql_i .= "latitude,";
                $sql_i .= "longitude,";
                $sql_i .= "rua,";
                $sql_i .= "cep,";
         
				$sql_i .= "created_at,";
                $sql_i .= "updated_at)";

                $sql_i .= "VALUES(";

                $sql_i .= ":anuncio,";
                $sql_i .= ":titulo,";
                $sql_i .= ":tipoanuncio,";
                $sql_i .= ":valor,";
                $sql_i .= ":bairro,";
                $sql_i .= ":cidade,";
                $sql_i .= ":uf,";
                $sql_i .= ":contrato,";
                $sql_i .= ":detalhes,";
                $sql_i .= ":empresa,";
                $sql_i .= ":finalidade,";
                $sql_i .= ":grupo,";
                $sql_i .= ":referencia,";
                $sql_i .= ":referencia_original,";
                $sql_i .= ":regiao,";
                $sql_i .= ":tipo,";
                $sql_i .= ":promocao,";
                $sql_i .= ":latitude,";
                $sql_i .= ":longitude,";
                $sql_i .= ":rua,";
                $sql_i .= ":cep,";
            
				$sql_i .= ":created_at,";
                $sql_i .= ":updated_at)";

    $stmt_imoveis = $conn->prepare($sql_i);
    $sql_c = "INSERT INTO caracteristicas (";
			                $sql_c .= "imovel_id,";
			                $sql_c .= "pref,";
			                $sql_c .= "label,";
			                $sql_c .= "valor,";
			                $sql_c .= "created_at,";
			                $sql_c .= "updated_at)";
			                
			                $sql_c .= "VALUES(";
			                $sql_c .= ":imovel_id,";
			                $sql_c .= ":pref,";
			                $sql_c .= ":label,";
			                $sql_c .= ":valor,";
			                $sql_c .= ":created_at,";
			                $sql_c .= ":updated_at)";

    $stmt_caracteristicas = $conn->prepare(   $sql_c );

    $sql_c = "INSERT INTO edificio (";
								$sql_c .= "imovel_id,";
								$sql_c .= "pref,";
						
								$sql_c .= "valor,";
								$sql_c .= "created_at,";
								$sql_c .= "updated_at)";
								
								$sql_c .= "VALUES(";
								$sql_c .= ":imovel_id,";
								$sql_c .= ":pref,";
					  
								$sql_c .= ":valor,";
								$sql_c .= ":created_at,";
								$sql_c .= ":updated_at)";
    $stmt_edificio = $conn->prepare(   $sql_c);
    $sql_i = "INSERT INTO fotos (";
    $sql_i .= "imovel_id,";
    $sql_i .= "ordem,";
    $sql_i .= "descricao,";
    $sql_i .= "alterada,";
    $sql_i .= "url,";
    $sql_i .= "arquivo,";
    $sql_i .= "created_at,";
    $sql_i .= "updated_at)";
    
    $sql_i .= "VALUES(";
    $sql_i .= ":imovel_id,";
    $sql_i .= ":ordem,";
    $sql_i .= ":descricao,";
    $sql_i .= ":alterada,";
    $sql_i .= ":url,";
    $sql_i .= ":arquivo,";
    $sql_i .= ":created_at,";
    $sql_i .= ":updated_at)";
    $stmt_fotos = $conn->prepare($sql_i);

    $corretores = $xml->dadosbasicos->dados->comempresa->corretores->corretor;
    foreach (@$corretores as $key => $corretor) {
    $stmt_corretores->bindValue(":id_sistemas", $corretor->id);
    $stmt_corretores->bindValue(":nome", mb_convert_encoding($corretor->nome, 'ISO-8859-1', 'UTF-8'));
    $stmt_corretores->bindValue(":funcao", $corretor->funcao);
    $stmt_corretores->bindValue(":loja", $corretor->loja);
    $stmt_corretores->bindValue(":telefone", $corretor->telefone);
    $stmt_corretores->bindValue(":creci", $corretor->creci);
    $stmt_corretores->bindValue(":email", strtolower($corretor->email));
    $stmt_corretores->bindValue(":created_at", date('Y-m-d H:i:s'));
    $stmt_corretores->bindValue(":updated_at", date('Y-m-d H:i:s'));
    
    $stmt_corretores->execute();
    }

    for ($i = $inicio; $i < $inicio + $totalporPagina; $i++) {
        $contar++;
        $value = $xml->imoveis->imovel[$i];

        if ($arrayFinalidades['finalidade_' . $value->finalidade]) {
            $finalidade = $arrayFinalidades['finalidade_' . $value->finalidade];
        } else {
            $finalidade = $value->finalidade;
        }

        // Processamento dos imóveis

        // Execute as consultas dentro do loop
       
        
        $stmt_imoveis->bindValue(":anuncio", utf8_decode($value->anuncio));
        $stmt_imoveis->bindValue(":titulo", utf8_decode($value->titulo));
        $stmt_imoveis->bindValue(":tipoanuncio", utf8_decode($value->tipoanuncio));
        $stmt_imoveis->bindValue(":valor", @$valorImovel);
        $stmt_imoveis->bindValue(":bairro",@$bairro);
        $stmt_imoveis->bindValue(":cidade", utf8_decode($value->cidade));
        $stmt_imoveis->bindValue(":uf", utf8_decode($value->uf));
        $stmt_imoveis->bindValue(":contrato", $arrayContrato['contrato_' . $value->contrato]);
        $stmt_imoveis->bindValue(":detalhes", utf8_decode($value->detalhes));
        $stmt_imoveis->bindValue(":empresa", @$value->empresa);
        $stmt_imoveis->bindValue(":finalidade", @$finalidade);
        $stmt_imoveis->bindValue(":grupo", @$value->grupo);
        $stmt_imoveis->bindValue(":referencia", @$ref);
        $stmt_imoveis->bindValue(":referencia_original", @$value->referencia);
        $stmt_imoveis->bindValue(":regiao", utf8_decode($value->regiao));
        $stmt_imoveis->bindValue(":tipo", utf8_decode($value->tipo));
        $stmt_imoveis->bindValue(":promocao", @$value->promocao);
        $stmt_imoveis->bindValue(":latitude", @$value->latitude);
        $stmt_imoveis->bindValue(":longitude", @$value->longitude);
        $stmt_imoveis->bindValue(":rua", @$value->logradouro);
        $stmt_imoveis->bindValue(":cep", @$value->cep);
        $stmt_imoveis->bindValue(":created_at", date('Y-m-d H:i:s'));
        $stmt_imoveis->bindValue(":updated_at", date('Y-m-d H:i:s'));
        
        $stmt_imoveis->execute();
        
if($value->variaveis->campo !== null){
        foreach ($value->variaveis->campo as $key => $c) {
            // Execute a consulta de características aqui
            $sql_c = "INSERT INTO caracteristicas (imovel_id, pref, label, valor, created_at, updated_at) ";
            $sql_c .= "VALUES (:imovel_id, :pref, :label, :valor, :created_at, :updated_at)";
            
            $s = $conn->prepare($sql_c);
            $s->bindValue(":imovel_id", $imovelId);
            $s->bindValue(":pref", $c->id);
            $s->bindValue(":label", utf8_decode($c->descricao));
            $s->bindValue(":valor", $c->valor);
            $s->bindValue(":created_at", date('Y-m-d H:i:s'));
            $s->bindValue(":updated_at", date('Y-m-d H:i:s'));
            $s->execute();
            
        }
    }

        if ($value->edificio) {
            // Execute a consulta de edifício aqui
            $sql_c = "INSERT INTO edificio (imovel_id, pref, valor, created_at, updated_at) ";
            $sql_c .= "VALUES (:imovel_id, :pref, :valor, :created_at, :updated_at)";
            
            $s = $conn->prepare($sql_c);
            $s->bindValue(":imovel_id", $imovelId);
            $s->bindValue(":pref", $keyEd);
            $s->bindValue(":valor", $valEd);
            $s->bindValue(":created_at", date('Y-m-d H:i:s'));
            $s->bindValue(":updated_at", date('Y-m-d H:i:s'));
            $s->execute();
            
        }

        foreach (@$value->fotos->foto as $key => $f) {
            // Execute a consulta de fotos aqui
            $sql_i = "INSERT INTO fotos (imovel_id, ordem, descricao, alterada, url, arquivo, created_at, updated_at) ";
            $sql_i .= "VALUES (:imovel_id, :ordem, :descricao, :alterada, :url, :arquivo, :created_at, :updated_at)";

            $stmt = $conn->prepare($sql_i);
            $stmt->bindValue(":imovel_id", $imovelId);
            $stmt->bindValue(":ordem", $f->ordem);
            $stmt->bindValue(":descricao", $f->descricao);
            $stmt->bindValue(":alterada", $f->alterada);
            $stmt->bindValue(":url", $f->url);
            $stmt->bindValue(":arquivo", $f->arquivo);
            $stmt->bindValue(":created_at", date('Y-m-d H:i:s'));
            $stmt->bindValue(":updated_at", date('Y-m-d H:i:s'));
            $stmt->execute();

        }
    }


    $conn->commit();

    if ($pagina < $totaldePagina) {
        ?>
        <script>
        window.location.href = "populaDB.php?pagina=<?php echo $pagina + 1; ?>";
        </script>
        <?php
    }
	/*
} catch (PDOException $e) {
    $conn->rollBack();
    echo "Erro durante a inserção no banco de dados: " . $e->getMessage();
}*/
?>
