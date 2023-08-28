<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locale;

class LocaleController extends Controller
{
     public function index()
    {
        $locales = Locale::all();
        return view("painel.locale.list",compact('locales'));
    }
   
    public function new()
    {
       return view("painel.locale.novo");
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Locale::create($data);
        return response()->json(['error'=>'0','status'=>'ok']);   
    }
   
    public function edit(Request $request,$id)
    {
        $locale = Locale::find($id);
        return view("painel.locale.editar",compact('locale'));
    }

    public function update(Request $request,$id){
        $data = $request->except('_token');
       
        Locale::where('id',$id)->update($data);
        return response()->json(['error'=>'0','status'=>'ok']);   
    }

    public function delete(Request $request,$id){
        Locale::where('id',$id)->delete();
        return response()->json(['error'=>'0','status'=>'ok']);   
    }


}
