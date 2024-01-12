<?php 
$newfile = 'imoveis_sisprof-copy.xml';
/*
 $contents = file_get_contents('https://vaniadesene.sisprof.srv.br/sisprof/corweb/requisicao.csp?empre=2&conta=6&idsessao=3651651321&op=1');
  file_put_contents($newfile, $contents);
*/
/*
  $myfile=fopen('https://vaniadesene.sisprof.srv.br/sisprof/corweb/requisicao.csp?empre=2&conta=6&idsessao=3651651321&op=1','rt');
flock($myfile,LOCK_SH);
$read=file_get_contents($newfile);
fclose($myfile);

*/

$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://vaniadesene.sisprof.srv.br/sisprof/corweb/requisicao.csp?empre=2&conta=6&idsessao=3651651321&op=1');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $data = curl_exec($curl);

    //check if the curl_exec was successful.
    if (curl_errno($curl) === 0) {
    	
    	$data = file_put_contents ('data.xml', $data); 
    	if($data){
    		header('Location: populaDB.php');
    	}	
        //success - file could be downloaded.
        //write the content of $data in database here...
    } else {
        //error - file could not be downloaded.
    }

    //close the curl session.
    curl_close($curl);
?>