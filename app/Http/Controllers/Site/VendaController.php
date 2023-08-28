<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Caracteristica;
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
    public function index()
    {
        $imoveis = Imoveis::with(['caracteristica', 'fotos'])->where('contrato', 'Venda')->get();

        return view("site.venda.index", compact('imoveis'));
    }
    public function detalhes($id)
    {
        $imoveis = Imoveis::find($id);
        $caracteristicas = Caracteristica::where('imovel_id', $id)->get();
        $fotos = Fotos::where('imovel_id', $id)->get();
        return view("site.venda.imoveis_detalhes", compact('imoveis', 'caracteristicas', 'fotos'));
    }
}
