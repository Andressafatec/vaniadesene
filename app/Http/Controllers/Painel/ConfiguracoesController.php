<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ConfiguracoesRepository;
use Illuminate\Support\Str;
class ConfiguracoesController extends Controller
{
     public function __construct(ConfiguracoesRepository $configuracoesRepository){
        $this->configuracoesRepository = $configuracoesRepository;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuracoes = $this->configuracoesRepository->all();
        return view("painel.configuracoes.index",compact('configuracoes'));
    }
 
    public function store(Request $request)
    {
        $data = $request->all();
        $data['parametro'] = Str::slug($data['titulo'], "-");  
        $check = $this->configuracoesRepository->findWhere(['parametro'=>$data['parametro']])->first();
        if(!$check){
            $this->configuracoesRepository->create($data);
            return response()->json(['status'=>'ok']);   
        }else{
            return response()->json(['status'=>'existe']);   
        }
        //return redirect()->route('admin.configuracoes.index');   
    }
    public function editar($id)
    {
        $configuracoes = $this->configuracoesRepository->all();
        $config = $this->configuracoesRepository->find($id);
        return view("painel.configuracoes.index",compact('configuracoes','config'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['parametro'] = Str::slug($data['titulo'], "-");  
        $check = $this->configuracoesRepository->findWhere(['parametro'=>$data['parametro']])->first();
        if($check->id == $id){
            $this->configuracoesRepository->update($data,$id);
            return response()->json(['status'=>'ok']);   
        }else{
            return response()->json(['status'=>'existe']);   
        }
    }
    public function delete($id)
    {
        $this->configuracoesRepository->delete($id);
    }
}
