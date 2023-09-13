<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Fotos;
use App\Models\Videos;
use App\Models\Imoveis;
use App\Models\Corretor;
use App\Models\Caracteristica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;
use GuzzleHttp\Psr7\Header;

class ImoveisController extends Controller
{
    public function index(Request $request,$contrato = null)
    {
      
      
        $imoveis = Imoveis::query();
  
        if ($contrato || $request->filled('contrato')) {
            if($request->filled('contrato')){
                $imoveis->whereIn('contrato', $request->input('contrato'));
            }else{
                $imoveis->where('contrato', Helper::corrigiAcento($contrato));
            }
        }
        if ($request->filled('codigo')) {
            $imoveis->where('referencia', $request->input('codigo'));
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
            $imoveis->whereHas('caracteristicas', function($q) use ($request) {
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
        if ($request->filled('are_min') || $request->filled('area_max') ) {
            $area_min = 0;
            $area_max = Imoveis::select('valor')->orderBy('valor','desc')->first()->valor;
            if($request->input('are_min') != ""){
                $area_min = $request->input('are_min');
            }
            if($request->input('area_max') != ""){
                $area_max = $request->input('area_max');
            }
            $imoveis->whereHas('caracteristicas', function($q) use ($request,$area_min,$area_max) {
                $q->where('pref','ARU')->whereBetween('valor',[ $area_min, $area_max]);
            });
        }
        
        $imoveis = $imoveis->orderByRaw('RAND()')->paginate(18);
        if($request->ajax()){
       
            return view("site.imoveis._lista_result", compact('imoveis','contrato'));
        }else{
            return view("site.imoveis.index", compact('imoveis','contrato'));
        }
    }
    public function detalhes($id)
    {
        $imovel = Imoveis::where('referencia',$id)->first();

        return view("site.imoveis.imoveis_detalhes", compact('imovel'));
    }
}
