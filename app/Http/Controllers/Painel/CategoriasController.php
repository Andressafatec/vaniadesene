<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use DB;
use App\Models\Sections;
use App\Models\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Criteria\WhereNoticiasCriteria;
use \Input as Input;
use Illuminate\Support\Str;
class CategoriasController extends Controller
{
    
  
    public function list(Request $request,$slug){
        $section = Sections::where('slug',$slug)->first();
        $categories = Categories::locale()->where('status','1')->where('sessao_id','=',$section->id);
        if($request->sort){
             $categories->orderBy($request->term,$request->sort);
        }else{
          $categories->orderBy('title','asc');
        }
        $categories = $categories->get();
        return view("painel.contents.categories.list",compact('categories','section'));
    }
   
    public function new(Request $request,$slug){
        $section = Sections::where('slug',$slug)->first();
        $categories = Categories::where('sessao_id','=',$section->id)->where('parent_id','=','0')->get();
        return view("painel.contents.categories.novo",compact('categories','section'));
    }

     public function editar(Request $request, $slug, $id){
        $section = Sections::where('slug',$slug)->first();
       
        $category = Categories::find($id);
        $categories = Categories::locale()->where('status','1')->where('id','!=',$id)->where('sessao_id','=',$section->id)->get();

        return view("painel.contents.categories.edit",compact('category','categories','section'));
    }
   
    public function store(Request $request,$slug){
        $section = Sections::where('slug',$slug)->first();
        $data = $request->all();
       
        $data['slug'] = Str::slug($data['title'], '-');

        $contCat = Categories::locale()->where('title',$data['title'])->count();
        
        if($contCat > 0){
            $contCat = $contCat + 1;
            $data['slug'] = $data['slug'] . "-". $contCat;
        }
        
        $data['locale'] = \App::getLocale();
        $data['sessao_id'] = $section->id;
        Categories::create($data);
        $categories = Categories::locale()->where('status','1')->pluck('title','id');
        return response()->json([
            'error'=>'0',
            'msg'=>'Category created with success!, Do you want to create a new?',
            'categories'=> $categories
        ]);
    }
    public function update(Request $request,$slug,$id){
        $data = $request->except('_token'); 
        $data['slug'] = Str::slug($data['title'], '-');

        $contCat = Categories::locale()->where('title',$data['title'])->where('id',"!=",$id)->count();
        
        if($contCat > 0){
            $contCat = $contCat + 1;
            $data['slug'] = $data['slug'] . "-". $contCat;
        }
        Categories::where('id',$id)->update($data);
        
        
       return response()->json([
            'error' => 0,
            'msg' => 'Category updated successfully!',
        ]);  
    }
    public function delete($tipo,$id){
        Categories::where('id',$id)->update(['status'=>'3']);
         return response()->json([
            'error' => 0,
            'msg' => 'Category deleted with successfully!',
        ]);  
    }
    public function move(Request $request){
        $arrayFile = array();
        $files = Input::file('file');
        foreach($files as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n, "-") .".".end($e) ;
            $fileName = time(). "-". $newName;
            $arrayFile[] = $fileName;
            $file->move('img_categorias',$fileName);
        }
        return response()->json($arrayFile);
    }
    public function deleteFoto(Request $request){
        $data = $request->all();
        $del = unlink("./img_categorias/".$data['name']);
        if($del){
            echo 1;
        }
    }
   
    
}
