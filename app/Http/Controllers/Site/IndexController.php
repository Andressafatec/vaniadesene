<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Imoveis;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $imoveis = Imoveis::with(['caracteristica', 'fotos'])->where('contrato', 'Locacao')->limit(10)->get();
        $venda = Imoveis::with(['caracteristica', 'fotos'])->where('contrato', 'Venda')->limit(10)->get();
        return view("site.index", compact('imoveis', 'venda'));
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
    
}
