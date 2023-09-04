<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Caracteristica;
use App\Models\Corretor;
use App\Models\Imoveis;
use App\Models\Fotos;
use Illuminate\Http\Request;
use App\Models\Contents;

use App\Models\Banners;
use App\Models\Eventos;
use App\Models\locale;

use App\Models\Media;
use Carbon\Carbon;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $tipoimovel = Imoveis::select('tipo')->distinct()->get();
        $finalidadeimovel = Imoveis::select('finalidade')->distinct()->get();
        $cidadeimovel = Imoveis::select('cidade')->distinct()->get();
        $bairroimovel = Imoveis::select('bairro')->distinct()->get();
        
        $imoveis = Imoveis::with(['caracteristica', 'fotos'])->where('contrato', 'Venda');

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

        return view("site.venda.index", compact('imoveis', 'tipoimovel', 'finalidadeimovel', 'cidadeimovel', 'bairroimovel'));
    }
    public function detalhes($id)
    {
        $imoveis = Imoveis::find($id);
        $caracteristicas = Caracteristica::where('imovel_id', $id)->get();
        $fotos = Fotos::where('imovel_id', $id)->get();
        $corretor = null;
        if ($imoveis) {
            $corretor = Corretor::find($imoveis->corretor_id);
        }
        return view("site.venda.imoveis_detalhes", compact('imoveis', 'caracteristicas', 'fotos', 'corretor'));
    }
}
