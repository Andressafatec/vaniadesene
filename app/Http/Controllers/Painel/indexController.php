<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Reservas;
use App\Models\Sections;
use Carbon\Carbon;
use \utilphp\util;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function __construct(){     
     	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo'); 
    }
    public function index()
    {
    	setlocale(LC_TIME, 'America/Sao_Paulo');
        // $hr = date(" H ");
        // if($hr >= 12 && $hr<18) {
        //     $resp = "Boa tarde";
        // }else if ($hr >= 0 && $hr <12 ){
        //     $resp = "Bom dia!";
        // }else {
        //     $resp = "Boa noite";
        // }
        $sections = Sections::orderBy('title','asc')->get();
        return view("painel.dashboard.index",compact('sections'));
    }
    
}
