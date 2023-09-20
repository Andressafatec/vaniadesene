<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Imoveis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /*public function index()
    {
        $imoveis = Imoveis::with(['caracteristica', 'fotos'])->where('contrato', 'Locacao')->orderByRaw('RAND()')->limit(10)->get();
        $venda = Imoveis::with(['caracteristica', 'fotos'])->where('contrato', 'Venda')->orderByRaw('RAND()')->limit(10)->get();
     
        $contratoimovel = Imoveis::select('contrato')->distinct()->get();

        $cidadeimovel = Imoveis::select('cidade')
            ->distinct()
            ->get();

        $bairroimovel = [];

        foreach ($cidadeimovel as $cidade) {
            $bairros = Imoveis::select('bairro')
                ->distinct()
                ->where('cidade', $cidade->cidade)
                ->get();
            
            $bairroimovel[$cidade->cidade] = $bairros;
        }

        $bairros_sjc = Imoveis::select('bairro')
        ->distinct()
        ->where('cidade', 'SAO JOSE DOS CAMPOS')
        ->get();

        $imoveis_por_bairro = [];
        foreach ($bairros_sjc as $bairro) {
            $numero_imoveis = Imoveis::where('cidade', 'SAO JOSE DOS CAMPOS')
                ->where('bairro', $bairro->bairro)
                ->count();

            $imoveis_por_bairro[$bairro->bairro] = $numero_imoveis;
        }
        return view("site.index", compact('imoveis', 'venda', 'contratoimovel', 'tipoimovel','bairroimovel', 'cidadeimovel', 'imoveis_por_bairro'));
    }*/
    public function index()
    {
        $locacoes = Imoveis::where('contrato', 'Locacao')->orderByRaw('RAND()')->limit(10)->get();
        $vendas = Imoveis::where('contrato', 'Venda')->orderByRaw('RAND()')->limit(10)->get();
        
      
        $cidades = Imoveis::get()->groupBy(function($q){
            return $q->cidade;
        });
        $imoveis_por_bairro = [];
        foreach($cidades as $kCidade => $itensCidade){
           foreach($itensCidade->groupBY('bairro') as $kBairro =>$imovel){
            
            $imoveis_por_bairro[$kCidade][$kBairro] = $imovel->count();
           };
        }
       
        $maiorValor = Imoveis::max('valor');
        
       
        return view("site.index", compact('locacoes', 'vendas','imoveis_por_bairro', 'maiorValor'));
    }
    public function contato()
    {
        return view("site.contato");
    }

    public function quem_somos()
    {
        return view("site.quem-somos");
    }

    public function cadastro_imoveis()
    {
        return view("site.cadastro_imoveis");
    }
    public function mail()
    {
        return view("site.mail");
    }

    public function busca_avancada(Request $request)
    {
        $tipoimovel = Imoveis::select('tipo')->distinct()->get();
        $finalidadeimovel = Imoveis::select('finalidade')->distinct()->get();
        $cidadeimovel = Imoveis::select('cidade')->distinct()->get();
        $bairroimovel = Imoveis::select('bairro')->distinct()->get();
        $contratoimovel = Imoveis::select('contrato')->distinct()->get();
        
        $imoveis = Imoveis::with(['caracteristica', 'fotos']);

        if ($request->filled('codigo')) {
            $imoveis->where('referencia_original', $request->input('codigo'));
        }

        if ($request->filled('contrato')) {
            $imoveis->where('contrato', $request->input('contrato'));
        }
    
        if ($request->filled('tipo')) {
            $imoveis->where('tipo', $request->input('tipo'));
        }
        
        if ($request->filled('finalidade')) {
            $imoveis->where('finalidade', $request->input('finalidade'));
        }
        
        if ($request->filled('cidade')) {
            $imoveis->where('cidade', $request->input('cidade'));
        }
        
        if ($request->filled('bairro')) {
            $imoveis->where('bairro', $request->input('bairro'));
        }
        
        if ($request->filled('valormin') && $request->filled('valormax')) {
            $valormin = str_replace(',', '.', str_replace('.', '', $request->input('valormin')));
            $valormax = str_replace(',', '.', str_replace('.', '', $request->input('valormax')));

            $imoveis->whereBetween('valor', [$valormin, $valormax]);
        }
        
        if ($request->filled('caracteristicas')) {
            $imoveis->whereHas('caracteristica', function($q) use ($request) {
                foreach ($request->input('caracteristicas') as $k => $v) {
                    $q->where('pref', $k);
                    if ($v == 4) {
                        $q->where('valor', '>=', $v);
                    } else {
                        $q->where('valor', $v);
                    }
                }
            });
        }
        
        $imoveis = $imoveis->get();

        return view("site.busca_avancada", compact('imoveis', 'tipoimovel', 'finalidadeimovel', 'cidadeimovel', 'bairroimovel', 'contratoimovel'));
    }

    public function pesquisa(Request $request)
    {
        $imoveis = Imoveis::with(['caracteristica', 'fotos']);

        if ($request->filled('contrato')) {
            $imoveis->where('contrato', $request->input('contrato'));
        }

        if ($request->filled('codigo')) {
            $imovelEncontrado = $imoveis->where('referencia_original', $request->input('codigo'))->first();

            if ($imovelEncontrado) {
                $idDoImovelEncontrado = $imovelEncontrado->id;
                return redirect()->route('admin.locacao.detalhes', ['id' => $idDoImovelEncontrado]);
            }
        }
    
        if ($request->filled('tipo')) {
            $imoveis->where('tipo', $request->input('tipo'));
        }

        if ($request->filled('bairro')) {
            $imoveis->where('bairro', $request->input('bairro'));
        }

        if ($request->filled('cidade')) {
            $imoveis->where('cidade', $request->input('cidade'));
        }
        
        if ($request->filled('valor')) {
            $valor = str_replace(',', '.', str_replace('.', '', $request->input('valor')));

            $imoveis->where('valor', '>=', $request->input('valor'));
        }

        if ($request->filled('valormin') && $request->filled('valormax')) {
            $valormin = str_replace(',', '.', str_replace('.', '', $request->input('valormin')));
            $valormax = str_replace(',', '.', str_replace('.', '', $request->input('valormax')));

            $imoveis->whereBetween('valor', [$valormin, $valormax]);
        }
        
        $imoveis = $imoveis->get();

        return view("site.pesquisa", compact('imoveis'));
    }



    
}
