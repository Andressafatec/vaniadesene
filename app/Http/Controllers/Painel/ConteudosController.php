<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ConteudosController extends Controller{
    public function paginas(){
        return view("painel.conteudos.paginas");
    }
    public function noticias(){
        return view("painel.conteudos.noticias");
    }
}
