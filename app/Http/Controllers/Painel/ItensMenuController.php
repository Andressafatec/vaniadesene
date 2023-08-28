<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\CategoriesContents;
use BCA\FontAwesomeIterator\Iterator as FontAwesomeIterator;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\ItensMenu;
use App\Models\ProductCategories;
use App\Models\TipoMenu;
use App\Models\Contents;
use App\Models\MenuAssociacao;
use App\Models\Sections;

class ItensMenuController extends Controller
{
    
   
    public function index($id){
       $tipo_menu_id = $id;
       $itensMenu = ItensMenu::locale()->where(['tipo_menu_id'=>$id,'id_menu_pai'=>'0'])->orderBy('ordem','asc')->get();
       $contents = Contents::locale()->where(['status'=>'1'])->pluck('title','id')->prepend('Select', "")->all();
       $categorias = Categories::where('status','1')->orderBy('title','asc')->get();
       $parentMenu = ItensMenu::locale()->where(['tipo_menu_id'=>$id,'id_menu_pai'=>'0'])->orderBy('ordem','asc')->pluck('titulo','id')->prepend('Select', "0")->all();
    
     $sessoes = Sections::orderBy('title','asc')->get();
       return view("painel.menu.menus",compact('itensMenu','contents','tipo_menu_id','parentMenu','sessoes','categorias'));
    }
  
    public function store(Request $request,$id)
    {
        $data = $request->all();
      
        $data['tipo_menu_id'] = $id;
        $data['slug_menu'] = Str::slug($data['titulo'], "-");  
        $data['locale'] = app()->getLocale();
      
        ItensMenu::create($data);
        return redirect()->route('admin.menu.index',['id'=>$data['tipo_menu_id']]);   
    }
   
    public function editar($idMenu,$idItemMenu){

      $tipo_menu_id = $idMenu;
       $itensMenu = ItensMenu::locale()->where(['tipo_menu_id'=>$idMenu,'id_menu_pai'=>'0'])->orderBy('ordem','asc')->get();
       $parentMenu = ItensMenu::locale()->where(['tipo_menu_id'=>$idMenu,'id_menu_pai'=>'0'])->where('id','!=',$idItemMenu)->orderBy('ordem','asc')->pluck('titulo','id')->prepend('Select', "0")->all();

      $contents = Contents::locale()->where(['status'=>'1'])->pluck('title','id')->prepend('Select', " ")->all();
      $categorias = Categories::where('status','1')->orderBy('title','asc')->get();
      
      $menu = ItensMenu::find($idItemMenu);
      $sessoes = Sections::orderBy('title','asc')->get();
      return view("painel.menu.menus",compact('itensMenu','categorias','contents','tipo_menu_id','menu','parentMenu','sessoes'));
    }
    public function update(Request $request, $idMenu,$idItemMenu)
    {
        $data = $request->except('_token');  
      
        $data['slug_menu'] = Str::slug($data['titulo'], "-"); 
        ItensMenu::where('id',$idItemMenu)->update([
        'titulo'=>$data['titulo'],
        'slug_menu'=>$data['slug_menu'],
        'id_conteudo'=>$data['id_conteudo'],
        'status'=>$data['status'],
        'class_custom'=>$data['class_custom'],
        'link_custom'=>$data['link_custom'],
        'id_menu_pai'=>$data['id_menu_pai'],
        'new_window'=>$data['new_window'],
        
        ]);
        return redirect()->route('admin.menu.index',['id'=>$idMenu]);   
    }
     public function ordem(Request $request)
    {
        $data = $request->all();    
        foreach ($data['ordem'] as $key => $value) {
          ItensMenu::where('id',$key)->update(['ordem'=>$value]);
        }
       
        
    }
     public function delete($idMenu,$idItemMenu){
        ItensMenu::where('id',$idItemMenu)->delete();
       // return redirect()->route('admin.tiposMenu.index',['id'=>$idMenu]);   
    }


    public function modalConteudos(Request $request,$idMenu,$idItemMenu){
      $itens = MenuAssociacao::where('id_item_menu',$idItemMenu)->pluck('id_conteudo');
      $sessoes = Sections::orderBy('title','asc')->get();

      return response()->json($itens);
    }
    public function assocaicaoConteudo(Request $request,$idMenu,$idItemMenu){
      $data = $request->all();
      MenuAssociacao::where('id_item_menu',$idItemMenu)->delete();
      foreach($data['item_menu'] as $k => $v){
        MenuAssociacao::create([
          'id_item_menu'=>$idItemMenu,
          'id_conteudo'=>$v,
        ]);
      }
      return response()->json(['error'=>0]);
    }
}
