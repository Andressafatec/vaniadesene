<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Corretores;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CorretorController extends Controller
{

    public function list()
    {
        $corretor = Corretores::orderBy('id','asc')->get();
        return view("painel.corretor.list", compact('corretor'));
    }

    public function novo()
    {
        return view("painel.corretor.novo");
    }

    public function upload(Request $request){
        
            $arrayFile = array();
            $file =  $request->file('file');
        
                $e = explode(".",$file->getClientOriginalName());
                $n = str_replace(end($e), "", $file->getClientOriginalName());
                $newName = Str::slug($n, "-") .".".end($e) ;
                $fileName = time(). "-". $newName;
                $arrayFile[] = $fileName;
                $file->move('./upload/corretor/',$fileName);
            

    
            return response()->json($arrayFile);
    }
    public function deleteImg(Request $request)
    {
        $data = $request->all();

        if (isset($data['name'])) {
            $filePath = "./upload/corretor/" . $data['name'];

            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    return response()->json(['status' => 'success']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Erro ao excluir o arquivo.']);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Arquivo não encontrado.']);
            }
        }

        return response()->json(['status' => 'error', 'message' => 'Dados inválidos.']);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');

       Corretores::create($data);

        return response()->json(['status' => 'ok']);
    }

    public function edit(Request $request,$id)
    {
        $corretor = Corretores::find($id);
        return view('painel.corretor.editar',compact('corretor'));
    }

    public function update(Request $request, $id)
    {  
        $corretor = Corretores::find($id);

        $data = $request->except('_token','_method');        
      
        Corretores::where('id',$corretor->id)->update($data);

        return redirect()->route('admin.corretor.list')->with('success');
    }

    public function delete($id)
    {
        $corretor = Corretor::find($id);
        $corretor->delete();
        return response()->json(['status' => 'ok']);
    }
}
