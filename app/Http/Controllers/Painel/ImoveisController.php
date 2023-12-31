<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Caracteristica;
use App\Models\Corretores;
use App\Models\CorretoresImoveis;
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
        $corretor = Corretores::all();
        return view("painel.imoveis.novo", compact('labelcar', 'prefcar', 'contrato', 'corretor'));
    }

    public function upload(Request $request){
        $arrayFiles = array();
    
        foreach($request->file('files') as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n, "-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFiles[] = $fileName;
            $file->move('./upload/imoveis/',$fileName);
        }
    
        return response()->json($arrayFiles);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');

        $data['valor'] = str_replace(',', '.', str_replace('.', '', $data['valor']));
       

        $imovel = Imoveis::create($data);

        $caracteristica = $request->input('caracteristica');

        $corretorId = $request->input('corretor');

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

        CorretoresImoveis::create([
            'imovel_id' => $imovel->id,
            'corretor_id' => $corretorId,
        ]);

        return response()->json(['status' => 'ok']);
    }


    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        
        $imoveis = Imoveis::findOrFail($id);
        
        $imoveis->update($data);

        $imoveis->caracteristicas()->delete();

        $corretorId = $request->input('corretor');

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

        CorretoresImoveis::update([
            'corretor_id' => $corretorId,
        ]);

        return response()->json(['status' => 'ok']);
    }

    public function edit(Request $request,$id)
    {
        $imoveis = Imoveis::find($id);
        $labelcar = Caracteristica::select('label')->distinct()->get();
        $prefcar = Caracteristica::select('pref')->distinct()->get();
        $caracteristicas = Caracteristica::where('imovel_id', $id)->get();
        $fotoimoveis = Fotos::where('imovel_id', $id)->get();
        $todocorretor = Corretores::all();

        $corretoresImoveis = CorretoresImoveis::where('imovel_id', $imoveis->id)->first();

        if ($corretoresImoveis) {
            $corretorId = $corretoresImoveis->corretor_id;
            $corretor = Corretores::find($corretorId);
        } else {
            $corretor = null;
        }

        return view('painel.imoveis.editar',compact('imoveis', 'prefcar', 'labelcar', 'caracteristicas', 'fotoimoveis', 'corretor', 'todocorretor'));
    }

    public function delete($id)
    {
        $imoveis = Imoveis::find($id);
        $imoveis->delete();
    }

}

