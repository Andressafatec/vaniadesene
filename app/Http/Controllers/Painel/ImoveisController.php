<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Caracteristica;
use App\Models\Fotos;
use App\Models\Imoveis;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ImoveisController extends Controller
{

    public function list()
    {
        $imoveis = Imoveis::orderBy('id','desc')->get();
        return view("painel.imoveis.list", compact('imoveis'));
    }

    public function novo()
    {
        $labelcar = Caracteristica::select('label')->distinct()->get();
        $prefcar = Caracteristica::select('pref')->distinct()->get();
        $contrato = Imoveis::select('contrato')->distinct()->get();
        return view("painel.imoveis.novo", compact('labelcar', 'prefcar', 'contrato'));
    }

    public function upload(Request $request){
            
            $arrayFile = array();
            $file =  $request->file('file');
        
                $e = explode(".",$file->getClientOriginalName());
                $n = str_replace(end($e), "", $file->getClientOriginalName());
                $newName = Str::slug($n, "-") .".".end($e) ;
                $fileName = time(). "-". $newName;
                $arrayFile[] = $fileName;
                $file->move('./upload/imoveis/',$fileName);
            


            return response()->json($arrayFile);
    }

    public function deleteImg(Request $request)
    {
        $data = $request->all();

        if (isset($data['name'])) {
            $filePath = "./upload/imoveis/" . $data['name'];

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
        $request->validate([
            "anuncio",
            "label",
            "tipoanuncio",
            "valor",
            "bairro",
            "cidade",
            "uf",
            "contrato",
            "detalhes",
            "empresa",
            "finalidade",
            "grupo",
            "referencia",
            "referencia_original",
            "regiao",
            "tipo"
        ]);

        $imovel = Imoveis::create($data);

        $caracteristica = $request->input('caracteristica');

        foreach ($caracteristica['label'] as $index => $label) {
            $caracteristicas = new Caracteristica();
            $caracteristicas->imovel_id = $imovel->id;
            $caracteristicas->pref = $caracteristica['pref'][$index];
            $caracteristicas->label = $label;
            $caracteristicas->valor = $caracteristica['valor'][$index];
            
            
            $caracteristicas->save();
            
        }

        $foto = $request->input('foto');

        foreach ($foto['descricao'] as $index => $descricao) {
            $fotos = new Fotos();
            $fotos->imovel_id = $imovel->id;
            $fotos->descricao = $descricao;
            $fotos->url = $foto['url'][$index];
            $fotos->arquivo = $foto['arquivo'][$index];
            $fotos->ordem = $foto['ordem'][$index];
            $fotos->save();
        }

        return response()->json(['status' => 'ok']);
    }


    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        
        $imoveis = Imoveis::findOrFail($id);
        
        $imoveis->update($data);

        $imoveis->caracteristicas()->delete();

        $caracteristica = $request->input('caracteristica');

        foreach ($caracteristica['label'] as $index => $label) {
            $caracteristicas = new Caracteristica();
            $caracteristicas->imovel_id = $imoveis->id;
            $caracteristicas->pref = $caracteristica['pref'][$index];
            $caracteristicas->label = $label;
            $caracteristicas->valor = $caracteristica['valor'][$index];

            $caracteristicas->save();
        }

        $imoveis->fotos()->delete();

        $foto = $request->input('foto');

        foreach ($foto['descricao'] as $index => $descricao) {
            $fotos = new Fotos();
            $fotos->imovel_id = $imoveis->id;
            $fotos->descricao = $descricao;
            $fotos->url = $foto['url'][$index];
            $fotos->arquivo = $foto['arquivo'][$index];
            $fotos->ordem = $foto['ordem'][$index];
            $fotos->save();
        }

        return response()->json(['status' => 'ok']);
    }

    public function edit(Request $request,$id)
    {
        $imoveis = Imoveis::find($id);
        $labelcar = Caracteristica::select('label')->distinct()->get();
        $prefcar = Caracteristica::select('pref')->distinct()->get();
        $contrato = Imoveis::select('contrato')->distinct()->get();
        $finalidade = Imoveis::select('finalidade')->distinct()->get();
        $caracteristicas = Caracteristica::where('imovel_id', $id)->get();
        $fotoimoveis = Fotos::where('imovel_id', $id)->get();
        return view('painel.imoveis.editar',compact('imoveis', 'prefcar', 'labelcar','contrato', 'finalidade', 'caracteristicas', 'fotoimoveis'));
    }

    public function delete($id)
    {
        $imoveis = Imoveis::find($id);
        $imoveis->delete();
        return response()->json(['status' => 'ok']);
    }

}

