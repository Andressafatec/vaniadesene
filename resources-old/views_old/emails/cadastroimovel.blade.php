<style>

body{
  background:#ededed;
}

</style>
<div style="width:100%; padding:30px; background:#ededed;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <div style="padding:15px;"></div>
      <table width="600" border="0" align="center" cellpadding="0" cellspacing="10" style="background:#fff;font-family:Arial, Helvetica, sans-serif">
  <tr>
    <td colspan="8" align="center" style="padding:15px;"><h2 style="text-transform:uppercase; color:#006; font-family:Arial, Helvetica, sans-serif">Formulário de Cadastro de Imóvel</h2></td>
    </tr>
  <tr>
    <td width="33%" style="font-family:Arial, Helvetica, sans-serif"><strong>Nome:*</strong></td>
    <td colspan="4" style="font-family:Arial, Helvetica, sans-serif"><strong>E-mail:*</strong></td>
    <td width="33%" colspan="3"><strong> Telefone:*</strong></td>
    </tr>
  <tr>
    <td width="200">{{$nome}}</td>
    <td colspan="4"  width="200">{{$email}}</td>
    <td width="200" colspan="4">{{$telefone}}</td>
  </tr>
  <tr>
    <td colspan="12" bgcolor="#F0F0F0" >
    
    </td>
   
    </tr>
 </table>
 <table width="600" border="0" align="center" cellpadding="0" cellspacing="10" style="background:#fff;font-family:Arial, Helvetica, sans-serif" >
     <tr>
    <td colspan="2"><strong>CEP</strong></td>
    <td colspan="6"><strong>Endereço
    </strong></strong></td>
    <td width="116" ><strong>Nº</strong></td>
    </tr>
  <tr>
    <td colspan="2">{{$cep}}</td>
    <td colspan="6">{{$endereco}}</td>
    <td  width="116">{{$numero}}</td>
    </tr>
  <tr>
    <td width="123"><strong>      Complemento</strong></td>
    <td colspan="4"><strong>Bairro</strong></td>
    <td colspan="3"><strong>      Cidade</strong></td>
    <td><strong>UF</strong></td>
    </tr>
  <tr>
    <td>{{$complemento}}</td>
    <td colspan="4">{{$bairro}}</td>
    <td colspan="3">{{$cidade}}</td>
    <td>{{$uf}}</td>
    </tr>
    </table>
 <table width="600" border="0" align="center" cellpadding="0" cellspacing="10" style="background:#fff;font-family:Arial, Helvetica, sans-serif">
  <tr>
    <td colspan="8"><strong>Descrição</strong></td>
    </tr>
  <tr>
    <td colspan="8">{{$descricao}}</td>
    </tr>
  <tr>
    <td colspan="8"><strong>Opções</strong></td>
    </tr>
  <tr>
    <td colspan="8">  @foreach($caracteristicas as $caracteristica)
      <div style="width: 30%; display: inline-block;">{{$caracteristica}}</div>
    @endforeach</td>
    </tr>
  <tr>
    <td colspan="8" align="center" bgcolor="#114a99" style="padding:15px"><img src="http://localhost:8000/min/img/logo.png" width="232" height="63" class="img-responsive"></td>
    </tr>
</table>

    
    
    
    </td>
  </tr>
</table>
</div>