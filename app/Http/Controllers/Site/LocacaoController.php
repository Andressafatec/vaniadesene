<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Fotos;
use App\Models\Imoveis;
use App\Models\Corretor;
use App\Models\Caracteristica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;

class LocacaoController extends Controller
{
    public function index(Request $request)
    {
        $tipoimovel = Imoveis::select('tipo')->distinct()->get();
        $finalidadeimovel = Imoveis::select('finalidade')->distinct()->get();
        $cidadeimovel = Imoveis::select('cidade')->distinct()->get();
        $bairroimovel = Imoveis::select('bairro')->distinct()->get();
        $imoveis = Imoveis::with(['caracteristica', 'fotos'])->where('contrato', 'Locacao');

        if ($request->filled('codigo')) {
            $imoveis->where('referencia', $request->input('codigo'));
        }

        if ($request->filled('tipo','finalidade','cidade', 'bairro')) {
            $imoveis->whereLike(['tipo','finalidade','cidade', 'bairro'], $request->input('tipo','finalidade','cidade', 'bairro'));
        }
        if ($request->filled('valormin', 'valormax')) {

            $valormin = floatval(str_replace(['.', ','], '',$request->input('valormin')));
            $valormax = floatval(str_replace(['.', ','], '', $request->input('valormax')));
        
            $imoveis->whereBetween('valor', [$valormin, $valormax])->get();
        }
        if ($request->filled('caracteristicas')) {
            $imoveis->whereHas('caracteristica', function($q) use ($request) {

               $pref = [];
               $valor = [];
                foreach ($request->input('caracteristicas') as $k => $v) {
                    /*$q->whereI('pref', $k);
                    if ($v == 4) {
                        $q->where('valor', '>=', $v);
                    } else {
                        $q->where('valor', $v);
                    }*/

                    $pref[] = $k;
                    $valor[] = $v;
                }
                $q->where('pref',$pref)->whereIn('valor',$valor);
            });
        }

        //dd($imoveis->toSql());
        $imoveis = $imoveis->get();
        return view("site.locacao.index", compact('imoveis', 'tipoimovel', 'finalidadeimovel', 'cidadeimovel', 'bairroimovel'));
    }
    public function detalhes($id)
    {
        $imoveis = Imoveis::find($id);
        $caracteristicas = Caracteristica::where('imovel_id', $id)->get();
        $fotos = Fotos::where('imovel_id', $id)->get();
        $corretor = Corretor::find($imoveis->corretor_id);
        return view("site.locacao.imoveis_detalhes", compact('imoveis', 'caracteristicas', 'fotos', 'corretor'));
    }
}
