<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PDOException;

class RotinaCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rotina:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rotina atualizar imóveis';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Configurar a conexão com o banco de dados
        $conn = DB::connection('mysql'); // Substitua 'mysql' pelo nome da conexão em seu arquivo de configuração

        // Coloque o restante do seu código aqui, adaptando conforme necessário

        $pagina = 1;
        $cacheName = 'cache.xml';
        $cacheMaxAge = 1800; // 30 min

        
if (!file_exists($cacheName) || (time() - filemtime($cacheName)) > $cacheMaxAge) {
    $url = 'https://vaniadesene.sisprof.srv.br/sisprof/corweb/requisicao.csp?empre=2&conta=6&idsessao=3651651321&op=1';

    // Tenta fazer a solicitação HTTP
    $contents = @file_get_contents($url);

    // Verifica se a solicitação HTTP foi bem-sucedida
    if ($contents !== false) {
        // Salva o conteúdo no arquivo de cache
        file_put_contents($cacheName, $contents);
    } else {
        // Tratamento de erro em caso de falha na solicitação HTTP
        echo 'Erro ao recuperar os dados da URL.';
    }
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
$totalporPagina = 100;
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

try {
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
                $sql_i .= "valorcondominio,";
                $sql_i .= "valoriptu,";
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
                $sql_i .= ":valorcondominio,";
                $sql_i .= ":valoriptu,";
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
    $stmt_corretores->bindParam(":id_sistemas", $corretor->id);
    $stmt_corretores->bindParam(":nome", mb_convert_encoding($corretor->nome, 'ISO-8859-1', 'UTF-8'));
    $stmt_corretores->bindParam(":funcao", $corretor->funcao);
    $stmt_corretores->bindParam(":loja", $corretor->loja);
    $stmt_corretores->bindParam(":telefone", $corretor->telefone);
    $stmt_corretores->bindParam(":creci", $corretor->creci);
    $stmt_corretores->bindParam(":email", strtolower($corretor->email));
    $stmt_corretores->bindParam(":created_at", date('Y-m-d H:i:s'));
    $stmt_corretores->bindParam(":updated_at", date('Y-m-d H:i:s'));
    
    $stmt_corretores->execute();
    }

    for ($i = $inicio; $i < $inicio + $totalporPagina; $i++) {
        //$contar++;
        $value = $xml->imoveis->imovel[$i];
if(!$value){
    print_r($value);
   
}
        if ($arrayFinalidades['finalidade_' . $value->finalidade]) {
            $finalidade = $arrayFinalidades['finalidade_' . $value->finalidade];
        } else {
            $finalidade = $value->finalidade;
        }

        // Processamento dos imóveis

        // Execute as consultas dentro do loop
       $valorImovel = '';
       $valoriptu = '';
       $valorcondominio = '';

            
   if($value->bairro == "BOSQUE DOS EUCALIPTOS FINAL DO BOSQUE BOSQUE DOS EUCALIPTOS" || 
                    $value->bairro == "BOSQUE DOS EUCALIPTOS JARDIM SATELITE BOSQUE DOS EUCALIPTOS"){
                    $bairro = "BOSQUE DOS EUCALIPTOS";
                }else{
                     $bairro =$value->bairro;
                }
           
           
                $valorImovel = str_replace(".",'',$value->valor);
                $valorImovel = str_replace(",",'.',$valorImovel);
                $valoriptu = str_replace(".",'',$value->valoriptu);
                $valoriptu = str_replace(",",'.',$valoriptu);
                $valorcondominio = str_replace(".",'',$value->valorcondominio);
                $valorcondominio = str_replace(",",'.',$valorcondominio);
        
        
            $ref = explode("-",$value->referencia);
                $ref = end($ref);

        $stmt_imoveis->bindValue(":anuncio", utf8_decode($value->anuncio));
        $stmt_imoveis->bindValue(":titulo", utf8_decode($value->titulo));
        $stmt_imoveis->bindValue(":tipoanuncio", utf8_decode($value->tipoanuncio));
        $stmt_imoveis->bindValue(":valor", $valorImovel);
        $stmt_imoveis->bindValue(":valoriptu", $valoriptu);
        $stmt_imoveis->bindValue(":valorcondominio", $valorcondominio);
        $stmt_imoveis->bindValue(":bairro", $bairro);
        $stmt_imoveis->bindValue(":cidade", utf8_decode($value->cidade));
        $stmt_imoveis->bindValue(":uf", utf8_decode($value->uf));
        $stmt_imoveis->bindValue(":contrato", $arrayContrato['contrato_' . $value->contrato]);
        $stmt_imoveis->bindValue(":detalhes", utf8_decode($value->detalhes));
        $stmt_imoveis->bindValue(":empresa", @$value->empresa);
        $stmt_imoveis->bindValue(":finalidade", $finalidade);
        $stmt_imoveis->bindValue(":grupo", $value->grupo);
        $stmt_imoveis->bindValue(":referencia", $ref);
        $stmt_imoveis->bindValue(":referencia_original", $value->referencia);
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
         $imovelId = $conn->lastInsertId(); 
if($value->variaveis->campo !== null){
        foreach ($value->variaveis->campo as $key => $c) {
            // Execute a consulta de características aqui
            //$sql_c = "INSERT INTO caracteristicas (imovel_id, pref, label, valor, created_at, updated_at) ";
            //$sql_c .= "VALUES (:imovel_id, :pref, :label, :valor, :created_at, :updated_at)";
            
            //$s = $conn->prepare($sql_c);
            $stmt_caracteristicas->bindParam(":imovel_id", $imovelId);
            $stmt_caracteristicas->bindParam(":pref", $c->id);
            $stmt_caracteristicas->bindParam(":label", utf8_decode($c->descricao));
            $stmt_caracteristicas->bindParam(":valor", $c->valor);
            $stmt_caracteristicas->bindParam(":created_at", date('Y-m-d H:i:s'));
            $stmt_caracteristicas->bindParam(":updated_at", date('Y-m-d H:i:s'));
            $stmt_caracteristicas->execute();
            
        }
    }

        if ($value->edificio) {
            // Execute a consulta de edifício aqui
            //$sql_c = "INSERT INTO edificio (imovel_id, pref, valor, created_at, updated_at) ";
            //$sql_c .= "VALUES (:imovel_id, :pref, :valor, :created_at, :updated_at)";
            
            //$s = $conn->prepare($sql_c);
            $stmt_edificio->bindParam(":imovel_id", $imovelId);
            $stmt_edificio->bindParam(":pref", $keyEd);
            $stmt_edificio->bindParam(":valor", $valEd);
            $stmt_edificio->bindParam(":created_at", date('Y-m-d H:i:s'));
            $stmt_edificio->bindParam(":updated_at", date('Y-m-d H:i:s'));
            $stmt_edificio->execute();
            
        }
if($value->fotos->foto !== null){
        foreach (@$value->fotos->foto as $key => $f) {
           
            // Execute a consulta de fotos aqui
            //$sql_i = "INSERT INTO fotos (imovel_id, ordem, descricao, alterada, url, arquivo, created_at, updated_at) ";
            //$sql_i .= "VALUES (:imovel_id, :ordem, :descricao, :alterada, :url, :arquivo, :created_at, :updated_at)";

            //$stmt = $conn->prepare($sql_i);
            $stmt_fotos->bindValue(":imovel_id", $imovelId);
            $stmt_fotos->bindValue(":ordem", $f->ordem);
            $stmt_fotos->bindValue(":descricao", $f->descricao);
            $stmt_fotos->bindValue(":alterada", $f->alterada);
            $stmt_fotos->bindValue(":url", $f->url);
            $stmt_fotos->bindValue(":arquivo", $f->arquivo);
            $stmt_fotos->bindValue(":created_at", date('Y-m-d H:i:s'));
            $stmt_fotos->bindValue(":updated_at", date('Y-m-d H:i:s'));
            $stmt_fotos->execute();
             //var_dump($stmt_fotos);

        }
        }
    }
    

    $conn->commit();

    if ($pagina < $totaldePagina) {
          echo $pagina;
        echo '/';
        echo $totaldePagina;
        ?>
        <script>
        window.location.href = "populaDB.php?pagina=<?php echo $pagina + 1; ?>";
        </script>
        <?php
    }
    echo "Rotina executada com sucesso!";
} catch (PDOException $e) {
    $conn->rollBack();
    echo "Erro durante a inserção no banco de dados: " . $e->getMessage();
}

        $this->info('Rotina executada com sucesso!');
    }
}
