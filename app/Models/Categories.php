<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['id','locale','title','slug','text','parent_id','status','sessao_id','media_id'];
   	public function scopeLocale($query){

        $locale = app()->getLocale();

        return $query->where('locale', $locale);

    }

    public function section(){

        return $this->hasOne(Sections::class,'id','sessao_id');

    }

  	public function parent()

	{

	    return $this->belongsTo(Categories::class, 'parent_id');

	}

	public function children()
	{

	    return $this->hasMany(Categories::class, 'parent_id');

	}

	public function conteudos(){

	    return $this->hasMany(CategoriesContents::class, 'id_categoria','id')->whereHas('content');

	}


	public function media(){
        return $this->hasOne(Media::class,'id','media_id');
    }

	public function conteudosOrdem($coluna = 'title',$ordem = 'asc'){
		$conteudos = $this->conteudos()->pluck('id_conteudo');
		return Contents::whereIn('id',$conteudos)->orderBy($coluna,$ordem)->get();

	}

}

