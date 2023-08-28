<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Fotos;
use App\Models\Imoveis;
use App\Models\Caracteristica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;

class LocacaoController extends Controller
{
    public function index()
    {
        $imoveis = Imoveis::with(['caracteristica', 'fotos'])->where('contrato', 'Locacao')->get();

        return view("site.locacao.index", compact('imoveis'));
    }
    public function detalhes($id)
    {
        $imoveis = Imoveis::find($id);
        $caracteristicas = Caracteristica::where('imovel_id', $id)->get();
        $fotos = Fotos::where('imovel_id', $id)->get();
        return view("site.locacao.imoveis_detalhes", compact('imoveis', 'caracteristicas', 'fotos'));
    }
}
