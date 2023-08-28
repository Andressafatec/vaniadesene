<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItensMenu;
use App\Models\Contents;
use App\Models\Categories;
use App\Models\Products;
use Response;
use Image;
class ContentsController extends Controller
{
    public function content(Request $request, $slug){
        $isMenu = null;
        $isMenu = ItensMenu::where(['slug_menu'=>$slug])->first();
       
        if ($isMenu) {
             $content =  $isMenu->content()->where('status','1')->first();
             
        } else {
            $content =  Contents::where(['slug'=>$slug])
            ->where('status','1')
            ->first();
        }

        if (!$content) {
            return response()->view('errors.' . '404', [], 404);
        }
      
        if (view()->exists('site.'.$slug)) {
            $view = 'site.'.$slug;
        } else {
            $view = 'site.interno';
        }
        $categoriasArray = [];
        $categorias = null;
        $contAssociado = [];
        if($isMenu !== null && $isMenu->conteudos->count() > 0){
           
            foreach($isMenu->conteudos as $key => $value){
                array_push($contAssociado,$value->conteudo->id);
               foreach($value->conteudo->categories as $k => $v){
               
                    array_push($categoriasArray,$v->id_categoria);
                   
                }
                
            }   
  
    $categoriasArray = (array_unique($categoriasArray));
       $categorias = Categories::whereIn('id',$categoriasArray)->get();
    }
        return view( $view, compact('content','isMenu','categorias','contAssociado'));
    }
    public function galeriaFotos(Request $request){
        $slug = 'galeria-de-fotos';
        $isMenu = null;
        $isMenu = ItensMenu::where(['slug_menu'=>$slug])->first();
       
        if ($isMenu) {
             $content =  $isMenu->content()->where('status','1')->first();
             
        } else {
            $content =  Contents::where(['slug'=>$slug])
            ->where('status','1')
            ->first();
        }

        $galerias = Contents::locale()->where('id_section','3')
        ->where('status', '1')->orderBy('start_publish', 'desc')->limit(4)->get();

        return view("site.galerias", compact('galerias','content','isMenu'));
    }

    public function search(Request $request){

        if($request->q){
            $result = [];
            $searchTerm = $request->q;
            $result['contents'] = Contents::locale()->whereLike(['title', 'blocks.text'], $searchTerm)->get();
            $result['products'] = Products::locale()->whereLike(['title', 'text'], $searchTerm)->get();
        }

        return view("site.search", compact('result','searchTerm'));
    }
    


   
}
