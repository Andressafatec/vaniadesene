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

        //if ($request->has('codigo')) {
            /*$imoveis->whereLike(['referencial'], $request->input('codigo'));
        }*/

        if ($request->has('tipo','finalidade','cidade', 'bairro')) {
            $imoveis->whereLike(['tipo','finalidade','cidade', 'bairro'], $request->input('tipo','finalidade','cidade', 'bairro'));
        }
        if ($request->has('valormin', 'valormax')) {



            $valormin = str_replace(',', '', $request->input('valormin'));
            $valormax = str_replace(',', '', $request->input('valormax'));

            $valormin = floatval(str_replace('.', '', $valormin));
            $valormax = floatval(str_replace('.', '', $valormax));
        
            $imoveis->whereBetween('valor', [$valormin, $valormax])->get();
        }
        if($request->has('caracteristicas')) {
            $imoveis->whereHas('caracteristica',function($q) use($request){
                foreach($request->input('caracteristicas') as $k => $v){
                    return $q->where('pref',$k)->where('valor',$v);
                }
                
            });
        }
        
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
