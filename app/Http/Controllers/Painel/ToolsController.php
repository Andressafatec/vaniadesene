<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tools;
use Illuminate\Support\Str;

class ToolsController extends Controller
{
    public function index()
    {
        $tools = Tools::locale()->get();
        return view("painel.tools.list",compact('tools'));
    }
   
    public function new()
    {
       return view("painel.tools.novo");
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['param'] = Str::slug($data['title'], "-");  
        $data['locale'] = \App::getLocale();

        $check = Tools::locale()->where(['param'=>$data['param']])->count();
        if($check > 0){
            $count = $check + 1;
            $data['param'] =  $data['param'] ."-". $count;
        }
        Tools::create($data);
        return response()->json(['error'=>'0','status'=>'ok']);   

    }
   
    public function edit(Request $request,$id)
    {
        $tool = Tools::find($id);
        return view("painel.tools.editar",compact('tool'));
    }

    public function update(Request $request,$id){
        $data = $request->except('_token');
        $check = Tools::locale()->where(['param'=>$data['param']])->where('id','!=',$id)->count();
        if($check > 0){
            $count = $check + 1;
            $data['param'] =  $data['param'] ."-". $count;
        }
        Tools::where('id',$id)->update($data);
        return response()->json(['error'=>'0','status'=>'ok']);   
    }

    public function delete(Request $request,$id){
        Tools::where('id',$id)->delete();
        return response()->json(['error'=>'0','status'=>'ok']);   
    }


}
