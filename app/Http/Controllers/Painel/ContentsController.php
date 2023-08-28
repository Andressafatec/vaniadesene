<?php
namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Criteria\StatusCriteria;
use Mail;
use App\Models\Sections;
use App\Models\Contents;
use App\Models\ContentsBlocks;
use App\Models\CategoriesContents;
use App\Models\Categories;
use App\Models\Eventos;
use App\Models\Galerias;
use App\Models\MenuAssociacao;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContentsController extends Controller
{

    public function index(Request $request,$slug){
        $section = Sections::where('slug',$slug)->first();
        $contents = Contents::locale()->where('id_section', $section->id);
        if($request->q){
            $contents->whereLike(['title'], $request->q);
        }
        if($request->filter_cat){
            $contents->whereHas('categories', function($q) use ($request){
                return  $q->where('id_categoria',$request->filter_cat);
             });
        }

        if($request->sort){
           $contents->orderBy($request->term,$request->sort);
        }else{
            $contents->orderBy('title','asc');
        }
      
        $contents = $contents->paginate(15);
       
      return view('painel.contents.list',compact('section','contents'));
  }
  public function create(Request $request,$slug){
    $section = Sections::where('slug',$slug)->first();
    $categories = Categories::locale()->where('sessao_id','=',$section->id)->whereNull('parent_id')->pluck('title','id');
    
    return view('painel.contents.novo',compact('section','categories'));
}

public function store(Request $request,$slug){
    $data = $request->all();
    $section = Sections::where('slug',$slug)->first();
    $data['slug'] = Str::slug($data['title'], '-');
    $contContent = Contents::locale()->where('title',$data['title'])->count();

   
    if($contContent > 0){
      $contContent = $contContent + 1;
      $data['slug'] = $data['slug'] . "-". $contContent;
    }
  $data['locale'] = \App::getLocale();
  if(@$data['start_publish'] == ""){
    $data['start_publish'] = date('Y-m-d');
  }else{
  $data['start_publish'] = Carbon::createFromFormat('m/d/Y', $data['start_publish'])->format('Y-m-d');
  }
  if(@$data['finish_publish'] != ""){

        $data['finish_publish'] = Carbon::createFromFormat('m/d/Y', $data['finish_publish'])->format('Y-m-d');
    }else{
        $data['finish_publish'] = null;
    }
$content = Contents::create([
    'locale'=>$data['locale'],
    'title'=>$data['title'],
    'slug'=>$data['slug'],
    'id_section'=>$section->id,
    'status'=>$data['status'],
    'start_publish'=>$data['start_publish'],
    'finish_publish'=>$data['finish_publish'],
     'cover_id'=>@$data['cover_id'],
]);

if (@$data['category']) {
    $categorias = $data['category'];

    foreach ($categorias as $key => $value) {
        CategoriesContents::create([
            'id_categoria' => $value,
            'id_conteudo'  => $content->id,
        ]);
    }
}

$block = $data['block'];

foreach ( $block['id'] as $key => $value) {
 $blockNew = ContentsBlocks::create([
    'id_content'=>$content->id,
    'status'=>$block['status_'.$value][0],
    'media_id'=>@$data['media_id'][$key],
    'text'=>$block['block'][$key],
    'bg_color'=>@$block['bg_color'][$key],
    'order'=>$block['order'][$key],
    'column'=>$block['column'][$key],
    'align_image'=>@$block['align_image_'.$value][$key],
    'column_image'=>$block['column_image'][$key],
    'section_width'=>$block['section_width'][$key],
    'id_row'=>$block['id_row'][$key],
    'class_row'=>$block['class_row'][$key],
]);

if(@$data['galeria_id'][$key] !== null){

    foreach ( $data['galeria_id'][$key] as $k => $value) {
        Galerias::create([
    		'block_id'=> $blockNew->id,
    		'media_id'=>$value,
			'ordem'=>$data['ordemGaleria'][$key][$k] ,
	        ]);
    }
}
}

if(null != @$data['custom']){
    $table = key($data['custom']);

    
    $data['custom'][$table]['id_content'] = $content->id;
    if($table == "eventos"){
        Eventos::create($data['custom'][$table]);
    }
    
   
}
return response()->json([
    'error'=>'0',
    'msg'=>'Content created with success!, Do you want to create a new?',
    'url' => route('admin.contents.edit',['slug'=>$section->slug,'id'=>$content->id])
]);
}

public function edit(Request $request,$slug,$id){
    $section = Sections::where('slug',$slug)->first();
    $categories = Categories::locale()->where('sessao_id','=',$section->id)->whereNull('parent_id')->pluck('title','id');
    $content = Contents::find($id);

    $categoriesContent = $content->categories()->get();
    $arrayComp = [];
    foreach ($categoriesContent as $key => $value) {
        $arrayComp[] = $value->id_categoria;
    }
    return view('painel.contents.editar',compact('section','categories','content','arrayComp'));
}

public function update(Request $request,$slug, $id){
    $data = $request->except('_token');
    $section = Sections::where('slug',$slug)->first();

    $contCat = Contents::locale()->where('title',$data['title'])->where('id',"!=",$id)->count();
    $data['slug'] = Str::slug($data['title'], '-');

    if($contCat > 0){
        $contCat = $contCat + 1;
        $data['slug'] = $data['slug'] . "-". $contCat;
    }
    CategoriesContents::where('id_conteudo', $id)->delete();
    if (@$data['category']) {
        $categorias = $data['category'];
        
        foreach ($categorias as $key => $value) {
            CategoriesContents::create([
                'id_categoria' => $value,
                'id_conteudo'  => $id,
            ]);
        }
    }
 
     if(@$data['start_publish'] == ""){
    $data['start_publish'] = date('Y-m-d');
      }else{
      $data['start_publish'] = Carbon::createFromFormat('m/d/Y', $data['start_publish'])->format('Y-m-d');
      }
  if(@$data['finish_publish'] != ""){
    
        $data['finish_publish'] = Carbon::createFromFormat('m/d/Y', $data['finish_publish'])->format('Y-m-d');
    }else{
        $data['finish_publish'] = null;
    }

    $content = Contents::where('id',$id)->update([
        'title'=>$data['title'],
        'slug'=>$data['slug'],
        'status'=>$data['status'],
        'start_publish'=>$data['start_publish'],
        'finish_publish'=>$data['finish_publish'],
        'cover_id'=>@$data['cover_id'],
       
       

    ]);


    ContentsBlocks::where('id_content',$id)->delete();
    $block = $data['block'];
    foreach ( $block['id'] as $key => $value) {
        $blockNew = ContentsBlocks::create([
        'id_content'=>$id,
        'status'=>$block['status_'.$value][0],
        'media_id'=>@$data['media_id'][$key],
        'text'=>$block['block'][$key],
        'bg_color'=>@$block['bg_color'][$key],
        'order'=>$block['order'][$key],
        'column'=>$block['column'][$key],
        'align_image'=>$block['align_image_'.$value][0],
        'column_image'=>$block['column_image'][$key],
        'section_width'=>$block['section_width'][$key],
        'id_row'=>$block['id_row'][$key],
        'class_row'=>$block['class_row'][$key],
    ]);
  

      
if(isset($data['galeria_id'][$value])){
        foreach ( $data['galeria_id'][$value] as $k => $v) {
           Galerias::create([
                'block_id'=> $blockNew->id,
                'media_id'=>$v,
                'ordem'=>@$data['ordemGaleria'][$value][$k] ,
            ]);
        }
    }
    
  }

  if(null != @$data['custom']){
    $table = key($data['custom']);
    Eventos::where('id_content',$id)->delete();
    
    $data['custom'][$table]['id_content'] = $id;
    if($table == "eventos"){
        Eventos::create($data['custom'][$table]);
    }
}

  return response()->json([
    'error' => 0,
    'msg' => 'Content updated successfully!',
    'url' => route('admin.contents.edit',['slug'=>$section->slug,'id'=>$id])
]);
}

public function delete(Request $request,$slug,$id){

    MenuAssociacao::where('id_conteudo',$id)->delete();
    ContentsBlocks::where('id_content',$id)->delete();
    Contents::where('id',$id)->delete();

}
public function getNewblock(Request $request) {
    $id = $request->input('id');
    $item = null;
    if(null !== $id ){
        $content = Contents::find($id);
        $count = $content->blocks->count();
        $item = ContentsBlocks::create([
            'id_content'=>$id,
            'status'=>'1',
            'order'=> $count,
        ]);
       
        
    }


 return response()->json([
    'html' => view('painel.contents._blocks',compact('item'))->render()
]);
}
}
