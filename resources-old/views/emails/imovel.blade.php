<style>
body{
  background:#d7d7d7;
}
</style>
<table widtd="100%" border="0" align="center" cellpadding="5" cellspacing="0" style="max-width:500px; width:100%; margin:0 auto; background:#fff; font-family:sans-serif;">
  <tr>
    <td height="79" colspan="2" align="center" bgcolor="#114a99" scope="col"><img src="http://vaniadesene.com.br/min/img/logo.png" style="max-height:60px; widtd:auto"/></td>
  </tr>
  <tr>
    <td colspan="2" align="left" height="10px" widtd="50%" >&nbsp;</td>
  </tr>
   <tr>
    <td colspan="2" align="left" widtd="50%" ><h3 style="color:#f29e38; margin:0;"><strong>CONTATO</strong></h3></td>
  </tr>
  <tr>
    <td width="18%" align="left" widtd="50%" ><strong>Nome:</strong></td>
    <td width="82%" align="left">{{$nome}}</td>
  </tr>
  <tr>
    <td widtd="50%" height="" align="left" ><strong>E-mail:</strong></td>
    <td align="left">{{ $email }}</td>
  </tr>
  <tr>
    <td widtd="50%"  align="left" ><strong>Telefone:</strong></td>
    <td align="left">{{ $telefone }}</td>
  </tr>
  <tr>
    <td widtd="50%" align="left" ><strong>Mensagem:</strong></td>
    <td align="left">{{ $mensagem }}</td>
  </tr>
  <tr>
    <td height="37" colspan="2" align="left" widtd="50%" ><hr /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" widtd="50%" ><h3 style="color:#f29e38; margin:0;"><strong>DETALHES DO IMÓVEL</strong></h3></td>
  </tr>
  <tr>
    <td colspan="2" align="left" widtd="50%" ><p style="margin:0;"><strong>Ref.: {{$imovel[0]->referencia}}</strong></p></td>
  </tr>
  <tr>
    <td colspan="2" align="left" >{{$imovel[0]->tipo}}</td>
  </tr>
  <tr>
    <td colspan="2" align="left" >{{$imovel[0]->bairro}} - {{$imovel[0]->cidade}}</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" height="10px" ></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" ><h4 style="color:#f29e38; margin:0;">VALOR DE VENDA </h4>
    R$ {{number_format($imovel[0]->valor, 2, ',', '.')}}
   </td>
  </tr>
 
  <tr>
    <td colspan="2" >
      <h3 style="margin:0;">Descrição do Imóvel</h3>
      <p class="m-bottom-lg">{{$imovel[0]->detalhes}}      </p>
      <h3 class="title">Características do Imóvel</h3>
                  @foreach($imovel[0]->caracteristicas as $caracteristica)
                  @if($caracteristica->descricao != 'Apto.')
                  <p class="description col-sm-6"><strong>{{$caracteristica->descricao}}:</strong> {{$caracteristica->valor}}</p>
                  @endif
                  @endforeach
    
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" >

    <img src="{{$imovel[0]->fotos[0]['url']}}" style="max-height:300px; widtd:auto"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center" ><a href="http://vaniadesene.com.br/{{$imovel[0]->contrato}}/{{str_slug($imovel[0]->tipo)}}-{{str_slug($imovel[0]->bairro)}}-{{str_slug($imovel[0]->cidade)}}-{{$imovel[0]->referencia}}" style="background:#F90; color:#fff; display:inline-block; text-decoration:none; padding:20px;"><strong>VER IMÓVEL NO SITE</strong></a> </td>
  </tr>
</table>