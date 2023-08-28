<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use DB;
use App\Models\Sections;
use App\Models\DownloadsCategories;
use App\Models\Downloads;
use App\Models\DownloadsFiles;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Criteria\WhereNoticiasCriteria;
use \Input as Input;
use Illuminate\Support\Str;
class DownloadsCategoriasController extends Controller
{
    
  
    public function list(Request $request){
       
        $categories = DownloadsCategories::locale()->where('status','!=','3');
       
        $categories = $categories->get();
        return view("painel.downloads.categories.list",compact('categories'));
    }
   
    public function new(Request $request){
      
        $categories = DownloadsCategories::all();
        return view("painel.downloads.categories.new",compact('categories'));
    }

    public function editar(Request $request, $id){
      
       
        $category = DownloadsCategories::find($id);
        $categories = DownloadsCategories::locale()->where('status','1')->where('id','!=',$id)->get();

        return view("painel.downloads.categories.edit",compact('category','categories','section'));
    }
   
    public function store(Request $request){
      
        $data = $request->all();
       
        $data['slug'] = Str::slug($data['title'], '-');

        $contCat = DownloadsCategories::locale()->where('title',$data['title'])->count();
        
        if($contCat > 0){
            $contCat = $contCat + 1;
            $data['slug'] = $data['slug'] . "-". $contCat;
        }
        
        $data['locale'] = \App::getLocale();
       
        DownloadsCategories::create($data);
        $categories = DownloadsCategories::locale()->where('status','1')->pluck('title','id');
        return response()->json([
            'error'=>'0',
            'msg'=>'Category created with success!, Do you want to create a new?',
            'categories'=> $categories
        ]);
    }
    public function update(Request $request,$id){
        $data = $request->except('_token'); 
        $data['slug'] = Str::slug($data['title'], '-');

        $contCat = DownloadsCategories::locale()->where('title',$data['title'])->where('id',"!=",$id)->count();
        
        if($contCat > 0){
            $contCat = $contCat + 1;
            $data['slug'] = $data['slug'] . "-". $contCat;
        }
        DownloadsCategories::where('id',$id)->update($data);
        
        
       return response()->json([
            'error' => 0,
            'msg' => 'Category updated successfully!',
        ]);  
    }
    public function delete($id){
        DownloadsCategories::where('id',$id)->update(['status'=>'3']);
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
