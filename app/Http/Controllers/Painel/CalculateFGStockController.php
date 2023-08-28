<?php
namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CalculateFGStockController extends Controller
{
    public function index(Request $request){
    	return view("painel.CalculateFGStock.index");
    }
}
