<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use URL;
class Menu extends Model {
    protected $table = 'menu';
    protected $fillable = [
        'locale',
    	'titulo',
        'slug_menu',
        'ordem',
        'id_conteudo',
        'status',
        'ocultar_texto',
        'icone_texto',
        'class_custom',
        'id_custom',
        'id_menu_pai',
        'tipo_menu_id',
        'link_custom',
        'new_window',
        'tipo_produtos',
        'id_categoria',
		];
        public function scopeLocale($query){

            $locale = app()->getLocale();

            return $query->where('locale', $locale);

        }
    public function conteudo(){
        return $this->hasOne(Conteudo::class,'id','id_conteudo');
    }
    public function children(){
       return $this->hasMany(ItensMenu::class, 'id_menu_pai');
     }
  
    public function checkAssociacao($tipoMenu){
        $check = MenuAssociacao::where(['id_tipo_menu'=>$tipoMenu,'id_menu'=>$this->id])->count();
        if($check > 0){
            return 'checked="checked"';
        }else{
            return null;
        }
    }
    public function getLinkCustomAttribute($value) {
           if(substr($value,0,4) == "http"){
                return $value;
           }
           if(substr($value,0,4) != "http" && substr($value,0,1) == "/"){
            return URL::to('/').$value;
           }
           if(substr($value,0,4) != "http" && substr($value,0,1) != "/" && $value !== null){
            return URL::to('/')."/".$value;
           }
           return $value;
        }


}
