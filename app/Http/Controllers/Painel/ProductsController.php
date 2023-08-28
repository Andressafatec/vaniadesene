<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductCategories;
use App\Models\ProductCategoriesSelected;
use App\Models\Galleries;
use Illuminate\Support\Str;
use App\Models\ProductsBenefits;
use App\Models\ProductsCertifications;
use App\Models\ProductsCertificationsFiles;
use App\Models\ProductsMedia;
use App\Models\ProductsRelated;
use App\Models\ProductsResources;
use App\Models\ProductsResourcesFiles;
use App\Models\ProductsTechnicalFeatures;



class ProductsController extends Controller
{
  public function list(Request $request){
    $products = Products::locale()->where('status','!=', '3');
    $searchTerm = null;
if($request->filter_cat){


      $products =  Products::locale()->where('status','!=', '3')->whereHas('categories', function($q) use ($request){

             return  $q->where('id_products_category',$request->filter_cat);
            })->get();
//dd( $products);
    }else {
      if($request->sort){
             $products->orderBy($request->term,$request->sort);
        }else{
          $products->orderBy('title','asc');
        }

       if($request->q){

            $searchTerm = $request->q;
            if($request->type =="Products"){
              $products = Products::locale()->whereLike(['title', 'text'], $searchTerm)->orderBy('order','asc')->get();
            }else if($request->type == "Category"){
                $categories = ProductCategories::locale()->whereLike(['title'], $searchTerm)->get();
                $categoriesArray = [];
                foreach ($categories as $key => $value) {
                  $categoriesArray[] = $value->id;
                }
                $products = Products::locale()->whereHas('categories',function($q) use ($categoriesArray){
                  return $q->whereIn('id_products_category',$categoriesArray)->orderBy('order','asc');
                })->orderBy('order','asc')->paginate();
              }
            

        }else{
          $products = $products->paginate();
        }
}
      

    return view("painel.products.list",compact('products','searchTerm'));
  }

  public function novo(){
    $categories = ProductCategories::where('status', '1')->whereNull('parent_id')->get();
    return view("painel.products.novo",compact('categories'));
 }

 public function order(Request $request){
   $data = $request->all();
  foreach ($data['order'] as $key => $value) {
   Products::where('id',$key)->update(['order'=>$value]);
  }
 }
 public function store(Request $request){
    $data = $request->all();
   // $chekPart = Products::locale()->where('part_number',$data['part_number'])->count();

   //  if($chekPart > 0){
   //    return response()->json(['error'=>'part_number','msg'=>'Part number already exists.']);
   //  }


    $data['slug'] = Str::slug($data['title'], '-');
    $contCat = Products::locale()->where('title',$data['title'])->count();
    
    
    if($contCat > 0){
      $contCat = $contCat + 1;
      $data['slug'] = $data['slug'] . "-". $contCat;
    }
    $data['locale'] = \App::getLocale();
   
    $product = Products::create($data);
     
      foreach($data['category_id'] as $key => $item){
          ProductCategoriesSelected::create([
            'id_product'=>$product->id,
            'id_products_category'=>$item,
          ]);
      }
     if(isset($data['video_galery'])){
      foreach($data['video_galery'] as $key => $item){
          Galleries::create([
            'product_id'=>$product->id,
            'video'=>$item,
          ]);
        }
    }
   
    if(isset($data['galeria_id'])){
    
      foreach($data['galeria_id'] as $key => $item){
          Galleries::create([
            'product_id'=>$product->id,
            'media_id'=>$item,
            'ordem'=>$data['ordem'][$key],
          ]);
        }
      }

    return response()->json([
      'error'=>'0',
      'msg'=>'Produto criado com sucesso!, Gostaria de criar outro?',
      'url'=>route('admin.products.editar',['id'=>$product->id]),
    ]);
  
 }

 public function editar(Request $request, $id){
  $categories = ProductCategories::where('status', '1')->whereNull('parent_id')->get();
  $product = Products::find($id);

  $arrayCompRelated = [];
  foreach ($product->see_too as $key => $value) {
    $arrayCompRelated[] = $value->id_product_related;
  }
  $arrayCompRelated = array_unique($arrayCompRelated);

  return view("painel.products.editar",compact('categories','product','arrayCompRelated'));
}

public function update(Request $request,$id){
  
    $data = $request->except('_token');
    // $chekPart = Products::locale()->where('part_number',$data['part_number'])->where('id',"!=",$id)->count();

    // if($chekPart > 0){
    //   return response()->json(['error'=>'part_number','msg'=>'Part number already exists.']);
    // }
    $contCat = Products::locale()->where('title',$data['title'])->where('id',"!=",$id)->count();
    $data['slug'] = Str::slug($data['title'], '-');
    
    if($contCat > 0){
      $contCat = $contCat + 1;
      $data['slug'] = $data['slug'] . "-". $contCat;
    }

    $product = Products::where('id',$id)->update([
        'title'=>$data['title'],
        'slug'=>$data['slug'],
        'slogan'=>$data['slogan'],
        'text'=>$data['text'],
        'status'=>$data['status'],
        'featured'=>$data['featured'],
        'text_related'=>$data['text_related'],
        'passos'=>$data['passos']
    ]);
    ProductCategoriesSelected::where('id_product',$id)->delete();
    foreach($data['category_id'] as $key => $item){
          ProductCategoriesSelected::create([
            'id_product'=>$id,
            'id_products_category'=>$item,
          ]);
      }   
    ProductsRelated::where('id_product',$id)->delete();
    if(isset($data['product_relacional'])){
      foreach($data['product_relacional'] as $key => $item){
            ProductsRelated::create([
              'id_product'=>$id,
              'id_product_related'=>$item,
            ]);
      }
    }

    ProductsBenefits::updateOrCreate(
       ['id_product' => $id],
      ['text' => $data['text_benefilts']]
    );

    ProductsTechnicalFeatures::updateOrCreate(
       ['id_product' => $id],
     ['text' => $data['text_technical']]
    );
    ProductsResources::updateOrCreate(
        ['id_product' => $id],
        ['text' => $data['text_resources']]
    );
    ProductsResourcesFiles::where(['id_product'=>$id])->delete();
    if(isset($data['file_resources'])){
    foreach ($data['file_resources'] as $key => $value) {
          ProductsResourcesFiles::create([
              'id_product' => $id,
              'file' => $value
            ]);
    }
    }
    ProductsCertifications::updateOrCreate(
        ['id_product' => $id],
        ['text' => $data['text_certifications']]
    );
    ProductsCertificationsFiles::where(['id_product'=>$id])->delete();
    if(isset($data['file_certifications'])){
      foreach ($data['file_certifications'] as $key => $value) {
          ProductsCertificationsFiles::create([
              'id_product' => $id,
              'file' => $value
            ]);
      }
    }
      Galleries::where(['product_id'=>$id])->where('media_id','!=',null)->delete();
    
      if(isset($data['galeria_id'])){
      
        foreach($data['galeria_id'] as $key => $item){
          Galleries::create([
            'product_id'=>$id,
            'ordem'=>$data['ordem'][$key],
            'media_id'=>$item,
          ]);
        }
      }
  Galleries::where(['product_id'=>$id])->where('video','!=',null)->delete();
       if(isset($data['video_galery'])){
      foreach($data['video_galery'] as $key => $item){
          Galleries::create([
            'product_id'=>$id,
            'video'=>$item,
          ]);
        }
    }
  
}

public function deleteFoto(Request $request,$produto,$id){
   Galleries::where(['product_id'=>$produto,'id'=>$id])->delete();

}
public function delete(Request $request,$id){
  
    ProductsCertificationsFiles::where('id_product',$id)->delete();
    ProductsCertifications::where('id_product',$id)->delete();
    ProductsResourcesFiles::where('id_product',$id)->delete();
    ProductsResources::where('id_product',$id)->delete();
    ProductsTechnicalFeatures::where('id_product',$id)->delete();
    ProductsBenefits::where('id_product',$id)->delete();
    ProductsRelated::where('id_product',$id)->delete();
    ProductCategoriesSelected::where('id_product',$id)->delete();
    Galleries::where(['product_id'=>$id])->delete();
    Products::where('id',$id)->delete();
}


 public function moveFile(Request $request,$type){
        $arrayFile = array();
        $data = $request->all();
        $files = $request->file;
        $folder = 'products';
        $folder_parent = '/';
        foreach($files as $file) {
            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName = Str::slug($n,"-") .".".end($e) ;
            $fileName = time(). "_". $newName;
            $arrayFile[] = $fileName;
            $file->move("uploads/".$folder,$fileName);
            if(@is_array(getimagesize("uploads/".$folder."/".$fileName))){
              Image::configure(array('driver' => 'imagick'));
              
              $image = Image::make("uploads/".$folder."/".$fileName)->resize(1300, null,function ($constraint) {
                  $constraint->aspectRatio();
              });

              $image->save("uploads/".$folder."/".$fileName,100);
              $media = Media::create(['file'=>$fileName,'type'=>end($e),'folder_parent'=>$folder_parent,'folder'=>$folder]);
          }
        }
        return response()->json([
            'type'=>$type,
            'files'=>$arrayFile
        ]);
    }

  public function duplicate(Request $request,$id){    
    $product = Products::find($id);
    $newProduct = $product->replicate();
    $newProduct->title = $newProduct->title . "(copy)";

     
    $contCat = Products::locale()->where('title',$product->title)->count();
    if($contCat > 0){
      $contCat = $contCat + 1;
      $newProduct->slug =  Str::slug($product->title, '-'). "-". $contCat;
    }
    $newProduct->status = 0;
    $newProduct->save();

    $new_id = $newProduct->id;
    
    $a = ProductsCertificationsFiles::where('id_product',$id)->first();
    if($a){
    $na = $a->replicate();
    $na->id_product = $new_id;
    $na->save();
    }
    $b = ProductsCertifications::where('id_product',$id)->first();
    if($b){
    $nb = $b->replicate();
    $nb->id_product = $new_id;
    $nb->save();
    }

    $c = ProductsResourcesFiles::where('id_product',$id)->first();
    if($c){
     $nc = $c->replicate(); 
     $nc->id_product = $new_id;
     $nc->save();
    }
    
    $d = ProductsResources::where('id_product',$id)->first();
    if($d){
    $nd = $d->replicate();
    $nd->id_product = $new_id;
    $nd->save();
    }
    $e = ProductsTechnicalFeatures::where('id_product',$id)->first();
    if($e){
    $ne = $e->replicate();
    $ne->id_product = $new_id;
    $ne->save();
    }
    $f = ProductsBenefits::where('id_product',$id)->first();
    if($f){
    $nf = $f->replicate();
    $nf->id_product = $new_id;
    $nf->save();
    }
    $g = ProductsRelated::where('id_product',$id)->first();
    if($g){
    $ng = $g->replicate();
    $ng->id_product = $new_id;
    $ng->save();
    }
    $h = ProductCategoriesSelected::where('id_product',$id)->first();
    if($h){
    $nh = $h->replicate();
    $nh->id_product = $new_id;
    $nh->save();
    }
    $i = Galleries::where(['product_id'=>$id])->first();
    if($i){
    $ni = $i->replicate();
    $ni->product_id = $new_id;
    $ni->save();
    }


  }
}
