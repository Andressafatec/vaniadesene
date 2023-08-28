<?php



namespace App\Http\Controllers\Painel;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Textos;

use Illuminate\Support\Str;



class TextosController extends Controller

{

    public function index()

    {

        $tools = Textos::locale()->get();

        return view("painel.textos.list",compact('tools'));

    }

   

    public function new()

    {

       return view("painel.textos.novo");

    }



    public function store(Request $request)

    {

        $data = $request->all();

        $data['param'] = Str::slug($data['title'], "-");  

        $data['locale'] = \App::getLocale();



        $check = Textos::locale()->where(['param'=>$data['param']])->count();

        if($check > 0){

            $count = $check + 1;

            $data['param'] =  $data['param'] ."-". $count;

        }

        Textos::create($data);

        return response()->json(['error'=>'0','status'=>'ok']);   



    }

   

    public function edit(Request $request,$id)

    {

        $tool = Textos::find($id);

        return view("painel.textos.editar",compact('tool'));

    }



    public function update(Request $request,$id){

        $data = $request->except('_token');

        $check = Textos::locale()->where(['param'=>$data['param']])->where('id','!=',$id)->count();

        if($check > 0){

            $count = $check + 1;

            $data['param'] =  $data['param'] ."-". $count;

        }

        Textos::where('id',$id)->update($data);

        return response()->json(['error'=>'0','status'=>'ok']);   

    }



    public function delete(Request $request,$id){

        Textos::where('id',$id)->delete();

        return response()->json(['error'=>'0','status'=>'ok']);   

    }





}

