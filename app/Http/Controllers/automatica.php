<?php 
date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL); 
set_time_limit(0);
require_once "config/conexaoDB.php";
$conn = conexaoDB();
unlink('imoveis_sisprof.xml');
$file = 'http://www.vaniadesene.com.br/xmlparser/dados/imoveis_sisprof.xml';
$newfile = 'imoveis_sisprof.xml';

if (!copy($file, $newfile)) {
    echo "falha ao copiar $file...\n";
    exit;
}else{

	$xml = simplexml_load_file('imoveis_sisprof.xml');

$sql = "DELETE FROM imoveis";
$stmt = $conn->prepare($sql);
$stmt->execute();

foreach ($xml->imoveis->imovel as $key => $value) {
           	$ref = explode("-",$value->referencia);
            	$ref = end($ref);
        
            	$valorImovel = '';
            
   
           
           
                $valorImovel = str_replace(".",'',$value->valor);
                $valorImovel = str_replace(",",'.',$valorImovel);

                if($value->bairro == "BOSQUE DOS EUCALIPTOS FINAL DO BOSQUE BOSQUE DOS EUCALIPTOS" || 
                    $value->bairro == "BOSQUE DOS EUCALIPTOS JARDIM SATELITE BOSQUE DOS EUCALIPTOS"){
                    $bairro = "BOSQUE DOS EUCALIPTOS";
                }else{
                     $bairro =$value->bairro;
                }
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
                $sql_i .= "created_at)";
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
                $sql_i .= ":created_at)";
              
				$stmt = $conn->prepare($sql_i);
				$stmt->bindParam(":anuncio",$value->anuncio);
				$stmt->bindParam(":titulo",$value->titulo);
				$stmt->bindParam(":tipoanuncio",$value->tipoanuncio);
				$stmt->bindParam(":valor",$valorImovel);
				$stmt->bindParam(":bairro",$bairro);
				$stmt->bindParam(":cidade",$value->cidade);
				$stmt->bindParam(":uf",$value->uf);
				$stmt->bindParam(":contrato",$value->contrato);
				$stmt->bindParam(":detalhes",$value->detalhe);
				$stmt->bindParam(":empresa",$value->empresa);
				$stmt->bindParam(":finalidade",$value->finalidade);
				$stmt->bindParam(":grupo",$value->grupo);
				$stmt->bindParam(":referencia",$ref);
				$stmt->bindParam(":referencia_original",$value->referencia);
				$stmt->bindParam(":regiao",$value->regiao);
				$stmt->bindParam(":tipo",$value->tipo);
				$stmt->bindValue(":created_at",date('Y-m-d H:i:s'));
				$stmt->execute();
                 
                    $imovelId = $conn->lastInsertId(); 
                    if(count($value->variaveis->campo) > 0){
                    foreach ($value->variaveis->campo as $key => $c) {

                            $sql_i = "INSERT INTO caracteristicas (";
			                $sql_i .= "imovel_id,";
			                $sql_i .= "pref,";
			                $sql_i .= "label,";
			                $sql_i .= "valor)";
			                
			                $sql_i .= "VALUES(";
			                $sql_i .= ":imovel_id,";
			                $sql_i .= ":pref,";
			                $sql_i .= ":label,";
			                $sql_i .= ":valor)";
			              
							$stmt = $conn->prepare($sql_i);
							$stmt->bindParam(":imovel_id",$imovelId);
							$stmt->bindParam(":pref",$c->id);
							$stmt->bindParam(":label",$c->nome);
							$stmt->bindParam(":valor",$c->valor);
							
							$stmt->execute();
                    }
                    }
                    if(count($value->fotos->foto) == 0){
                            $sql_i = "INSERT INTO fotos (";
			                $sql_i .= "imovel_id,";
			                $sql_i .= "ordem,";
			                $sql_i .= "descricao,";
			                $sql_i .= "alterada,";
			                $sql_i .= "url,";
			                $sql_i .= "arquivo)";
			                
			                $sql_i .= "VALUES(";
			                $sql_i .= ":imovel_id,";
			                $sql_i .= ":ordem,";
			                $sql_i .= ":descricao,";
			                $sql_i .= ":alterada,";
			                $sql_i .= ":url,";
			                $sql_i .= ":arquivo)";
			              
							$stmt = $conn->prepare($sql_i);
							$stmt->bindParam(":imovel_id",$imovelId);
							$stmt->bindValue(":ordem",'1');
							$stmt->bindValue(":descricao",'');
							$stmt->bindValue(":alterada",'0');
							$stmt->bindValue(":url",'/min/img/default.jpg');
							$stmt->bindValue(":arquivo",'default.jpg');
							
							$stmt->execute();

                    }else{
                        
                        foreach ($value->fotos->foto as $key => $f) {
                        
                            $sql_i = "INSERT INTO fotos (";
			                $sql_i .= "imovel_id,";
			                $sql_i .= "ordem,";
			                $sql_i .= "descricao,";
			                $sql_i .= "alterada,";
			                $sql_i .= "url,";
			                $sql_i .= "arquivo)";
			                
			                $sql_i .= "VALUES(";
			                $sql_i .= ":imovel_id,";
			                $sql_i .= ":ordem,";
			                $sql_i .= ":descricao,";
			                $sql_i .= ":alterada,";
			                $sql_i .= ":url,";
			                $sql_i .= ":arquivo)";
			              
							$stmt = $conn->prepare($sql_i);
							$stmt->bindParam(":imovel_id",$imovelId);
							$stmt->bindValue(":ordem",$f->ordem);
							$stmt->bindParam(":descricao",$f->descricao);
							$stmt->bindParam(":alterada",$f->alterada);
							$stmt->bindValue(":url",$f->url);
							$stmt->bindValue(":arquivo",$f->arquivo);
							
							$stmt->execute();
                        }
                    }
            
        
        
	}
	
}

?>

