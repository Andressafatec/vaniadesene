<?php 
$newfile = 'imoveis_sisprof-copy.xml';

 $contents = file_get_contents('http://vaniadesene.sisprof.srv.br/sisprof/corweb/requisicao.csp?empre=2&conta=6&idsessao=3651651321&op=1');
  file_put_contents($newfile, $contents);

?>