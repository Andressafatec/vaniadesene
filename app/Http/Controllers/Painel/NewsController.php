<?php
namespace App\Http\Controllers\Painel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class NewsController extends Controller
{
    public function list(Request $request){
        return view("painel.news.list");
    }
    public function create()
    {
         return view('painel.news.novo');
    }
    public function store(UsersRequest $request)
    {
    }
    public function edit($id)
    {
         return view('painel.news.editar');
    }
    public function update(Request $request, $id)
    {
    }
    public function delete($id)
    {
    }
}
