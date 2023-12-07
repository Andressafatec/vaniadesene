<table width="100%" border="1">
  <tr>
    <td bgcolor="#CCCCCC" ><strong>Evento</strong></td>
    <td bgcolor="#CCCCCC" ><strong>Local</strong></td>
    <td bgcolor="#CCCCCC" ><strong>Data</strong></td>
    <td bgcolor="#CCCCCC" ><strong>Horário</strong></td>
    <td bgcolor="#CCCCCC" ><strong>Vagas</strong></td>
    <td bgcolor="#CCCCCC" >&nbsp;</td>
    <td bgcolor="#CCCCCC" >&nbsp;</td>
    <td bgcolor="#CCCCCC" >&nbsp;</td>
  </tr>
  <tr>
    <td>{{$evento->content->title}}</td>
    <td>{{$evento->local}}</td>
    <td>{{$evento->data->format('d/m/Y')}}</td>
    <td>{{$evento->hora}}</td>
    <td>{{$evento->qtd_vagas}}</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" bgcolor="#CCCCCC"><strong>Inscritos</strong></td>
  </tr>
  <tr>
    <td>Nº Inscricao</td>
    <td>Nome</td>
    <td>E-mail</td>
    <td>Telefone</td>
    <td>Tipo</td>
    <td>Quantidade</td>
    <td>Mesa</td>
    <td>Sócio</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
@foreach($inscricoes as $k => $v)
  <tr>
    <td>{{$v->inscricao->id}}</td>
    <td>{{$v->inscricao->nome}}</td>
    <td>{{$v->inscricao->email}}</td>
   
    <td>{{$v->inscricao->telefone}}</td>
    <td>{{$v->descricao}}</td>
    <td> {{$v->quantidade}}</td>
    <td>{{$v->mesa}}</td>
    <td>
    @if($v->inscricao->associado == 1)  
    {{$v->inscricao->numero_socio}}
    @else
    Não sócio
    @endif
  </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>

  
  @endforeach
</table>