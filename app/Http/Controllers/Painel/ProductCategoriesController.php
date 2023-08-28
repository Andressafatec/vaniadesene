<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use App\Models\Galleries;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

	
class ProductCategoriesController extends Controller
{

	
	public function list(Request $request)
	{
		$data = $request->all();
		$categories = ProductCategories::locale()->where('status','!=', '3');
		$categoriesFilter = ProductCategories::locale()->orderby('title','asc')->whereHas('children')->pluck('title','id')->prepend('Family','0');

        if(@$data['id_cat'] !== null){
			
			if($data['id_cat'] == "0"){
				
				$categories->whereNull('parent_id');
			}else{
				
				$categories->where('parent_id',$request->id_cat);
			}
			
        }
        if($request->sort){
             $categories->orderBy($request->term,$request->sort);
        }else if(!$request->id_cat){
          $categories->orderBy('title','asc');
        }else{
        	 $categories->orderBy('order','asc');
        }
        $categories = $categories->get();
       
		return view("painel.products.categories.list", compact('categories','categoriesFilter'));
	}

	public function new()
	{
		$categories = ProductCategories::where('status', '1')->whereNull('parent_id')->get();
		return view("painel.products.categories.novo", compact('categories'));
	}

	 public function order(Request $request){
	   $data = $request->all();
	  foreach ($data['order'] as $key => $value) {
	   ProductCategories::where('id',$key)->update(['order'=>$value]);
	  }
	 }

	public function store(Request $request)
	{
		
		$data = $request->all();
		$data['slug'] = Str::slug($data['title'], '-');

		$contCat = ProductCategories::locale()->where('title',$data['title'])->count();
		
		if($contCat > 0){
			$contCat = $contCat + 1;
			$data['slug'] = $data['slug'] . "-". $contCat;
		}
		$category = ProductCategories::create([
			'locale'=>\App::getLocale(),
			'title' => $data['title'],
			'slug' => $data['slug'],
			'text'=>$data['text'],
			'status'=>$data['status'],
			'parent_id' => @$data['parent_id'],
		]);
		if(isset($data['galeria_id'])){
		foreach($data['galeria_id'] as $key => $item){
				Galleries::create([
					'category_id'=>$category->id,
					'media_id'=>$item,
				]);
			}
		}
		return response()->json([
			'error'=>'0',
			'msg'=>'Category created with success!, Do you want to create a new?'
		]);
	}

	public function edit(Request $request,$id)
	{
		$category = ProductCategories::find($id);
		$categories = ProductCategories::where('status', '1')->whereNull('parent_id')->get();
		
		return view("painel.products.categories.edit", compact('category','categories'));
	}
	public function deleteFoto(Request $request,$category,$id){
	   Galleries::where(['category_id'=>$category,'id'=>$id])->delete();

	}
	public function update(Request $request, $id)
	{

		$data = $request->except('_token');

		
		
		$contCat = ProductCategories::locale()->where('title',$data['title'])->where('id',"!=",$id)->count();
		$data['slug'] = Str::slug($data['title'], '-');
		
		if($contCat > 0){
			$contCat = $contCat + 1;
			$data['slug'] = $data['slug'] . "-". $contCat;
		}
		

		ProductCategories::where('id',$id)->update([
			'title' => $data['title'],
			'slug' => $data['slug'],
			'text' => $data['text'],
			'parent_id' => @$data['parent_id'],

		]);
		if(isset($data['galeria_id'])){
			Galleries::where('category_id',$id)->delete();
			foreach($data['galeria_id'] as $key => $item){
					Galleries::create([
						'category_id'=>$id,
						'media_id'=>$item,
					]);
				}
			}
		return response()->json([
			'error' => 0,
			'msg' => 'Category updated successfully!',
		]);
	}

	public function delete(Request $request, $id)
	{
		ProductCategories::where('id', $id)->update(['status'=>'3']);
	}
}
