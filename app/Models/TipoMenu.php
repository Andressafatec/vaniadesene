<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use DB;
use Illuminate\Http\Request;

use Config;
use App\Models\ItensMenu;
use App\Models\Locale;

use App\Models\ProductCategories;
use Illuminate\Support\Facades\Session;

class TipoMenu extends Model
{
  protected $table = 'tipo_menus';

  protected $fillable = ['nome_menu','slug_menu','status','locale'];
  public function scopeLocale($query){
    $locale = \app()->getLocale();
    return $query->where('locale', $locale);
  }
  public function menu(){
    $locale = app()->getLocale();
    return $this->belongsTo(Menu::class)->where('locale', $locale)->orderby('ordem','asc');
  }
  public function ItensMenu(){

    return $this->hasMany(ItensMenu::class,'tipo_menu_id','id')->where('id_menu_pai','0')->where('locale', $locale)->orderby('ordem','asc');
  }
  public function mainMenu(){
    $id = $this->id;
    $locale = \App::getLocale();

    //print_r(Session::all());

    $menu =  $this->hasMany(ItensMenu::class,'tipo_menu_id','id')->where('id_menu_pai','0')->locale()->orderby('ordem','asc')->get();
    //dd($menu);
    // inicia a saida html;

    $html = '<ul class="menu row"> <div class="col-1"></div>';

    //loop primeiro nivel inicial
    foreach ($menu as $key => $value) {
        // li da lsita
    
      $html .= '<li class="col">';


    if($value->link_custom != ""){
      if (filter_var($value->link_custom, FILTER_VALIDATE_URL)) {
        $url = $value->link_custom;
      }else{
        if($value->link_custom == "#"){
          $url = "#";
        }else{
          $url = \Request::root()."/".$value->link_custom;
        }
      }
    }else{
      $url = \Request::root()."/".$value->slug_menu;
    }

        // link primeiro nivel
        if($value->new_window == 1){
          $html .= '<a href="'.$url.'" target="_blank" class="'.$value->class_custom.'">';
        }else{
           $html .= '<a href="'.$url.'" class="'.$value->class_custom.'">';
        }
    if($value->media_id != ""){
      $html .= '<img src="'.$value->media->fullpatch().'" alt="">';
    }
    $html .= $value->titulo;
    $html .= '</a>';
        //verifica se é do tipo produto setado no model ItensMenu tabela menu
    if($value->tipo_produtos == '1'){
    	if($value->children->count() > 0){
    		 $html .= '<div  class="container-sub" id="'.$value->tipo_produtos.'">' ;
				      $html .= '<ul class="submenu">';
    			 foreach ($value->children as $k => $v) {
    			 	 $html .= '<li class="col">';
    			 	$cat = ProductCategories::locale()->where('status','1')
    			 	->where('id',$v->id_categoria)->first();
    			 	$html .= '<h4 class="m-all-0"><a href="#">'. $cat->title.'</a></h4>';
    			 	 foreach ($cat->products as $key => $prod) {
				                      // pego o item do relacionamento e lá ele tem mais um que é o produto final pois aqui é só os produtos selecionados daquela categoria.
				        $html .='<div><a href="'. request()->root()."/product/". $prod->product->slug.'">'.$prod->product->title.'</a></div>';
				      }
				       $html .= '</li>';
				      
    			 }
  				$html .= '</ul>';
				$html .= '</div>';
    	}else{
    				 //busca as categorias dos produtos ativas do locale setado
				      $categorias = ProductCategories::locale()->where('status','1')->orderby('order','asc')->get();
				          // inicia a concatenação html saida

				      $html .= '<div  class="container-sub" >' ;
				      $html .= '<ul class="submenu">';
				           // laço das categorias ativas
				      foreach ($categorias  as $kCat => $cat) {
				             // aqui considero que cada grupo de categorias é um LI
				       $html .= '<li class="col">';
				                 // dentro do li coloco o nome da categoria em destaque
				       $html .= '<h4 class="m-all-0"><a href="#">'. $cat->title.'</a></h4>';
				                    // pego os produtos no relacimento ver em Model/ProductCategories tem um metodo products
				       foreach ($cat->products as $key => $prod) {
				                      // pego o item do relacionamento e lá ele tem mais um que é o produto final pois aqui é só os produtos selecionados daquela categoria.
				        $html .='<div><a href="'. request()->root()."/product/". $prod->product->slug.'">'.$prod->product->title.'</a></div>';
				      }

				      $html .= '</li>';
				    }

				    $html .= '</ul>';
				    $html .= '</div>';
    	}



         
        }else{ // se não or produto verifica se existe submenu e monta o html do submentu
          if($value->children->count() > 0){

            $html .= '<div class="container-sub" id="">' ;
                  //submenus de conteudo
            foreach ($value->children as $k => $v) {
              if($v->id_categoria !== null){
               $categorias = ProductCategories::locale()->where('status','1')->where('id',$v->id_categoria)->orderby('order','asc')->first();


             }
             if($k == 0){
               $html .= '<ul class="submenu">';
             }
             if($v->new_window == 1){
            
              $html .= '<li class="col"> <a href="'. request()->root()."/". $v->slug_menu.'"  target="_blank" class="'.$v->class_custom.'">  '. $v->titulo.' </a>  </li>';
            }else{
              
               $html .= '<li class="col"> <a href="'. request()->root()."/". $v->slug_menu.'" class="'.$v->class_custom.'" >  '. $v->titulo.' </a>  </li>';
            }
            
             if($k == $value->children->count() - 1){

              $html .= '</ul>';
            }

          }

          $html .= '</div>';
          
        }
      }

      $html .= '</li>';
    }
    $html .= '<div class="col-1 d-sm-block d-none"><button type="button" class="iconSearch" style="border: none; background: transparent;" data-toggle="modal" data-target="#SearchModal"><i class="fa fa-search"></i></button></div>';
    
    $html .= "</ul>";

    


    return $html;
  }
}
