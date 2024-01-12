<table class="table table-hover">
    <tr>
        <th style="width: 20%">Id</th>
        <th style="width: 40%">Título</th>
        <th>Tipo</th>
        <th class="text-right">Ações</th>
    </tr>

    @foreach($imoveis as $key => $imovel)
    <tr>
        <td>
            <p>{{$imovel->id}}</p>
        </td>
        <td>
            <p>{{$imovel->titulo}}</p>
        </td>
        <td>
            <p>{{$imovel->tipo}}</p>
        </td>
        <td class="text-right">
            <a href="{{route('admin.imoveis.delete', $imovel->id)}}" class="btn btn-danger btn-xs btn-flat p-all-sm btn-destroy">
                <i class="fa fa-trash"></i>
            </a>
            <a href="{{route('admin.imoveis.edit', $imovel->id)}}" class="btn btn-primary btn-xs btn-flat p-all-sm">
                <i class="fas fa-pencil-alt"></i>
            </a>
        </td>
    </tr>
    @endforeach
</table>
