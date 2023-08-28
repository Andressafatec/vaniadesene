<?php
namespace App\Models;

use DOMDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contents extends Model
{
    protected $table = 'contents';
    protected $dates = ['start_publish','finish_publish'];

    protected $fillable = [
        'locale',
        'title',
        'slug', 
        'id_section', 
        'parent_id',
        'status',
        'start_publish',
        'finish_publish',
        'cover_id'
    ];
     public function media(){
            return $this->hasOne(Media::class,'id','cover_id');
    }
    public function cover(){
            return $this->hasOne(Media::class,'id','cover_id');
    }
    public function evento(){
            return $this->hasOne(Eventos::class,'id_content','id');
    }
    public function scopeLocale($query){
        $locale = app()->getLocale();
        return $query->where('locale', $locale);
    }
    public function section(){
        return $this->hasOne(Sections::class,'id','id_section');
    }
    public function blocks(){
        return $this->hasMany(ContentsBlocks::class,'id_content','id')->orderBy('order','asc');
    }
    public function categories(){
      return $this->hasMany(CategoriesContents::class, 'id_conteudo', 'id');
    }
    public function intro($limit = 15){
        $blocks = $this->hasMany(ContentsBlocks::class,'id_content','id')->orderBy('order','asc')->get();       
        $text = "";    
        foreach ($blocks as $key => $value) {
            $text .= strip_tags($value->text) . " ";
        }
        return Str::words($text, $limit,'...');
    }
    public function thumb(){
        $blocks = $this->hasMany(ContentsBlocks::class,'id_content','id')->orderBy('order','asc')->get();       
        
        if($this->cover_id != ""){
            return $this->cover->fullpatch();
        }
        $img = [];   

        foreach ($blocks as $key => $value) {
            if(@$value->media_id !== null && @$value->media !== null){
              
                $img[] = $value->media->fullpatch(); 
            }
            foreach( $value->galeria as $k => $v){
                $img[] = $v->media->fullpatch(); 
            }
        }
       
        if(count($img) > 0){
            return $img[0];
        }else{
            return null;
        }
    }
    

  
}
