<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MenuAssociacao;
use App\Models\Menu;
use App\Models\ItensMenu;
use App\Models\TipoMenu;
use Illuminate\Support\Str;
class MenuController extends Controller
{
   
   
    public function index()
    {
       $tiposMenu = TipoMenu::all();
       return view("painel.menu.tipos",compact('tiposMenu'));
    }
  
    public function store(Request $request){
        $data = $request->all();
       
        $data['slug_menu'] = Str::slug($data['nome_menu'], "_");
     
        
        TipoMenu::create($data);
        return redirect()->route('admin.tiposMenu.index');   
    }
   
    public function editar($id)
    {
        
        $menu = TipoMenu::find($id);
        $tiposMenu = TipoMenu::all();
        return view("painel.menu.tipos",compact('tiposMenu','menu'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        //dd($data);
        $data['slug_menu'] = Str::slug($data['nome_menu'], "-"); 
        TipoMenu::where('id', $id)->update($data);
               return redirect()->route('admin.tiposMenu.index');   
    }
     public function delete($id){
        $product = TipoMenu::where('id',$id)->delete();
        return redirect()->route('admin.tiposMenu.index');   
    }
    public function associacao(Request $request,$id){
        $tiposMenu = TipoMenu::all();
        $tipo = TipoMenu::findWhere(['id'=>$id])->first();
        $associaco = MenuAssociacao::where('id',$id)->get();
       
        return view("painel.menu.associacao",compact('associaco','tiposMenu','tipo','id'));   
    }
    public function associacaoStore(Request $request,$id){
      
        $data = $request->all();
MenuAssociacao::where(['id_tipo_menu'=>$id])->delete();
        foreach ($data['menu'] as $key => $value) {
            MenuAssociacao::create([
                'id_tipo_menu'=>$id,
                'id_menu'=>$value,
            ]);            
        }
        $associaco = MenuAssociacao::where('id',$id)->get();
       
        return response()->json(['erro'=>'0','msg'=>"Associação realizada com sucesso"]);
    }
}
