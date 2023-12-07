<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Repositories\ImovelRepository;

class PaginasController extends Controller
{
    public function administracao(){
        
        return view('institucional.administracao');
    }

   
}
